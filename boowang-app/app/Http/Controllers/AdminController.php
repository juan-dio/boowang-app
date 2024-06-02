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
        $transactions = Transaction::latest()->paginate(5);
        $transactionsPerMonths = Transaction::select(DB::raw('SUM(jumlah_orang) as jumlah'), DB::raw('MONTH(tanggal) as month'))->where('status', 'Paid')->where(DB::raw('YEAR(tanggal)'), Carbon::today()->year)->groupBy('month')->get();
        // ddd($transactionsPerMonths);
        return view('admin.transactions', [
            'page' => 'Transaksi',
            'transactions' => $transactions,
            'transactionsPerMonths' => $transactionsPerMonths
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
