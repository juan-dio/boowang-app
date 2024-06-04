<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function transactions(Request $request)
    {
        $transactions = Transaction::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->paginate(5);
        $transactionsPerMonths = Transaction::select(DB::raw('SUM(jumlah_orang) as jumlah'), DB::raw('MONTH(created_at) as month'))->where('status', 'Paid')->whereYear('created_at', Carbon::today()->year)->groupBy('month')->get();
        $periods = Transaction::select(DB::raw('MONTH(created_at) month, YEAR(created_at) year'))->distinct()->get();
        $month = date('m');
        $year = date('Y');
        
        if($request->date) {
            $period = explode('-', $request->date);
            $transactions = Transaction::whereMonth('created_at', $period[0])->whereYear('created_at', $period[1])->paginate(5);
            $transactionsPerMonths = Transaction::select(DB::raw('SUM(jumlah_orang) as jumlah'), DB::raw('MONTH(created_at) as month'))->where('status', 'Paid')->whereYear('created_at', $period[1])->groupBy('month')->get();
            $month = $period[0];
            $year = $period[1];
        }

        return view('admin.transactions', [
            'page' => 'Transaksi',
            'transactions' => $transactions,
            'transactionsPerMonths' => $transactionsPerMonths,
            'periods' => $periods,
            'month' => $month,
            'year' => $year
        ])->with('i', ($request->input('page', 1) - 1) * $transactions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function customers(Request $request)
    {
        $customers = User::where('is_admin', false)->paginate(10);
        return view('admin.customers', [
            'page' => 'Customers',
            'customers' => $customers,
        ])->with('i', ($request->input('page', 1) - 1) * $customers->perPage());
    }
}
