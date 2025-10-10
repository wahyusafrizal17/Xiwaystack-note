<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all();

        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('foto')) {
            $documentName = strtolower(str_replace(' ', '_', $request->name));
            $fileName = $documentName . '_foto_' . date('YmdHis') . '.png';
            $path = public_path('foto');
            $request->file('foto')->move($path, $fileName);
            $input['foto'] = $fileName;
        }
        $input['password'] = Hash::make($request->password);
        User::create($input);

        alert()->success('Data berhasil disimpan', 'Berhasil');
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $model = User::find($id);
        $input = $request->all();
        if ($request->hasFile('foto')) {
            $documentName = strtolower(str_replace(' ', '_', $request->name));
            $fileName = $documentName . '_foto_' . date('YmdHis') . '.png';
            $path = public_path('foto');
            $request->file('foto')->move($path, $fileName);
            $input['foto'] = $fileName;
        }
        if($request->password != ''){
            $input['password'] = Hash::make($request->password);
        } else {
            // Remove password from input array if it's empty to avoid updating it
            unset($input['password']);
        }
        
        $model->update($input);

        alert()->success('Data berhasil diubah', 'Berhasil');
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = User::find($id);
        $model->delete();

        alert()->success('Data berhasil dihapus', 'Berhasil');
        return redirect('users');
    }

    public function delete(Request $request)
    {
        $category = User::find($request->id);
        $category->delete();

        return 'success';
    }
}
