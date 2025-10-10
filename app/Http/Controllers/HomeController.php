<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joki;
use App\Models\User;

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
        $totalUsers = User::count();
        $totalPaid = Joki::sum('dp_amount');
        $totalUnpaid = Joki::sum('price') - Joki::sum('dp_amount');
        
        // Get completed jokis (status = completed)
        $completedJokis = Joki::where('status', 'completed')->latest()->take(5)->get();
        
        // Get pending jokis (status = pending, in_progress)
        $pendingJokis = Joki::whereIn('status', ['pending', 'in_progress'])->latest()->take(5)->get();
        
        return view('welcome', compact('totalJokis', 'totalUsers', 'totalPaid', 'totalUnpaid', 'completedJokis', 'pendingJokis'));
    }
}
