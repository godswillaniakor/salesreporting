<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        $totalAmount = $sales->sum('amount');
        $currentVolumeSold = $sales->last()->volume_after_sales;
        $lastFive = $sales->take(-5);
        $totalVolumeSold = $sales->where('created_at', '>=',date('Y-m-d').' 00:00:00')
            ->sum('volume_sold');
        $data['totalAmount'] = $totalAmount;
        $data['currentVolumeSold'] = $currentVolumeSold;
//        $data['lastFive'] = $lastFive;
        $data['totalVolumeSold'] = $totalVolumeSold;
        return view('home', [
            'data' => $data,
            'sales' => $lastFive
        ]);
    }
}
