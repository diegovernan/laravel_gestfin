<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

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
        $month = 11;
        $year = 2019;

        $transactions = Transaction::where('id', auth()->user()->id)->whereMonth('date', $month)->whereYear('date', $year)->get();

        // dd($transactions);

        return view('home', compact('transactions'));
    }
}
