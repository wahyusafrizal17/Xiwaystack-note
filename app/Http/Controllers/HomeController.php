<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joki;
use App\Models\User;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get statistics
        $totalJokis = Joki::count();
        $totalExpenses = Expense::sum('amount');
        $totalPaid = Joki::sum('dp_amount');
        $totalUnpaid = Joki::sum('price') - Joki::sum('dp_amount');
        
        // Get completed jokis (status = completed)
        $completedJokis = Joki::where('status', 'completed')->latest()->take(5)->get();
        
        // Get pending jokis (status = pending, in_progress)
        $pendingJokis = Joki::whereIn('status', ['pending', 'in_progress'])->latest()->take(5)->get();
        
        // Get monthly data for chart (last 12 months)
        $monthlyData = $this->getMonthlyData();
        
        return view('welcome', compact('totalJokis', 'totalExpenses', 'totalPaid', 'totalUnpaid', 'completedJokis', 'pendingJokis', 'monthlyData'));
    }
    
    private function getMonthlyData()
    {
        $months = [];
        $income = [];
        $expenses = [];
        
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthName = $date->format('M Y');
            $months[] = $monthName;
            
            // Get income from jokis (dp_amount) for this month
            $monthIncome = Joki::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->sum('dp_amount');
            $income[] = (int) $monthIncome;
            
            // Get expenses for this month
            $monthExpenses = Expense::whereYear('expense_date', $date->year)
                ->whereMonth('expense_date', $date->month)
                ->sum('amount');
            $expenses[] = (int) $monthExpenses;
        }
        
        return [
            'months' => $months,
            'income' => $income,
            'expenses' => $expenses
        ];
    }
}
