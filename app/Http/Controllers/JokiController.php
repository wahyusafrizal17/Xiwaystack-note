<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joki;
use App\Models\BankAccount;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JokiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jokis = Joki::with('bankAccount')->latest()->get();
        return view('jokis.index', compact('jokis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $joki = new Joki();
        $bankAccounts = BankAccount::where('is_active', true)->get();
        return view('jokis.create', compact('joki', 'bankAccounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        if ($request->hasFile('photo')) {
            $validated['photo_path'] = $request->file('photo')->store('jokis', 'public');
        }

        $joki = Joki::create($validated);

        return redirect()->route('jokis.index')->with('success', 'Jokian berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $joki = Joki::with('bankAccount')->findOrFail($id);
        return view('jokis.show', compact('joki'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $joki = Joki::findOrFail($id);
        $bankAccounts = BankAccount::where('is_active', true)->get();
        return view('jokis.edit', compact('joki', 'bankAccounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $joki = Joki::findOrFail($id);
        $validated = $this->validateRequest($request, $joki->id);

        if ($request->hasFile('photo')) {
            if ($joki->photo_path) {
                Storage::disk('public')->delete($joki->photo_path);
            }
            $validated['photo_path'] = $request->file('photo')->store('jokis', 'public');
        }

        $joki->update($validated);

        return redirect()->route('jokis.index')->with('success', 'Jokian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $joki = Joki::findOrFail($id);
        if ($joki->photo_path) {
            Storage::disk('public')->delete($joki->photo_path);
        }
        $joki->delete();
        return redirect()->route('jokis.index')->with('success', 'Jokian berhasil dihapus.');
    }

    protected function validateRequest(Request $request, $ignoreId = null): array
    {
        $rules = [
            'app_name' => ['required', 'string', 'max:255'],
            'photo' => [$ignoreId ? 'nullable' : 'nullable', 'image', 'max:2048'],
            'domain' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'customer_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'dp_amount' => ['required', 'integer', 'min:0'],
            'bank_account_id' => ['nullable', 'exists:bank_accounts,id'],
            'status' => ['required', 'in:pending,in_progress,completed,cancelled'],
            'notes' => ['nullable', 'string'],
        ];

        $validator = Validator::make($request->all(), $rules);
        $validator->after(function ($v) use ($request) {
            $price = (int) $request->input('price', 0);
            $dp = (int) $request->input('dp_amount', 0);
            if ($price > 0 && $dp < (int) floor(0.5 * $price)) {
                $v->errors()->add('dp_amount', 'DP minimal 50% dari harga.');
            }
        });

        return $validator->validate();
    }

    public function whatsapp($id)
    {
        $joki = Joki::findOrFail($id);
        $phone = preg_replace('/[^0-9]/', '', $joki->phone);
        $message = urlencode(
            "Kwitansi Jokian\n" .
            "Aplikasi: {$joki->app_name}\n" .
            (empty($joki->domain) ? '' : "Domain: {$joki->domain}\n") .
            "Harga: Rp " . number_format($joki->price, 0, ',', '.') . "\n" .
            "DP: Rp " . number_format($joki->dp_amount, 0, ',', '.') . "\n" .
            "Sisa: Rp " . number_format(max(0, $joki->remaining_balance), 0, ',', '.') . "\n" .
            "Status: {$joki->status}"
        );
        $url = "https://wa.me/{$phone}?text={$message}";
        return redirect()->away($url);
    }
}
