<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Place;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;

class CustomerController extends Controller
{
    public function index(Request $request): View
    {
        Transaction::where(function ($query) { 
            $query->where('tanggal', '<', Carbon::now()->subDay())
                ->orWhere('tanggal_tiket', '<', Carbon::today());
        })->where('status', 'Unpaid')->update(['status' => 'Cancelled']);
        
        $places = Place::all()->random(3);

        return view('customer.index', [
            'page' => 'Home',
            'places' => $places,
        ]);
    }

    public function showProfil(Request $request): View
    {
        return view('customer.profil', [
            'page' => 'Profil',
            'user' => auth()->user()
        ]);
    }
    
    public function show(Request $request): View
    {
        $places = Place::orderBy('nama')->filter(request(['search', 'category']))->paginate(5);

        return view('customer.wisata', [
            'page' => 'Wisata',
            'places' => $places
        ]);
    }

    public function detail(Place $place): View
    {
        return view('customer.detail', [
            'page' => 'Detail Wisata',
            'place' => $place
        ]);
    }

    public function pesan(Place $place): View
    {
        return view('customer.pesan', [
            'page' => 'Pesan Tiket',
            'place' => $place
        ]);
    }

    public function makePesan(Request $request) : RedirectResponse
    {   
        $pesan = $request->validate([
            'user_id' => 'required',
            'place_id' => 'required',
            'jumlah_orang' => 'required|numeric|integer|gte:1|lte:sisa_tiket',
            'tanggal_tiket' => 'required|date',
        ]);

        $place = Place::find($pesan['place_id']);

        $pesan['total'] = $pesan['jumlah_orang'] * $place->harga_tiket;

        Transaction::create($pesan);

        $newTransaction = Transaction::where('user_id', $pesan['user_id'])->where('place_id', $pesan['place_id'])->orderBy('tanggal', 'desc')->first();

        return redirect('/bayar/' . $newTransaction->id);
    }

    public function bayar(Transaction $transaction): View
    {
        return view('customer.pembayaran', [
            'page' => 'Bayar Tiket',
            'transaction' => $transaction
        ]);
    }

    public function payBayar(Transaction $transaction) : RedirectResponse
    {   
        Transaction::where('id', $transaction->id)->update(['status' => 'Paid']);

        return Redirect::route('tiket')->with('success', 'Pembayaran tiket berhasil!');
    }

    public function cancelBayar(Transaction $transaction) : RedirectResponse
    {   
        Transaction::where('id', $transaction->id)->update(['status' => 'Cancelled']);

        return Redirect::route('tiket')->with('success', 'Pembelian tiket dibatalkan!');
    }

    public function showTiket(Request $request): View
    {
        Transaction::where(function ($query) { 
            $query->where('tanggal', '<', Carbon::now()->subDay())
                ->orWhere('tanggal_tiket', '<', Carbon::today());
        })->where('status', 'Unpaid')->update(['status' => 'Cancelled']);

        $transactions = Transaction::where('user_id', auth()->user()->id)->where('tanggal_tiket', '>=', Carbon::today())->orderBy('tanggal_tiket', 'asc')->paginate(10);
        return view('customer.tiket', [
            'page' => 'Tiket Saya',
            'transactions' => $transactions
        ]);
    }

    public function showRiwayat(Request $request): View
    {
        $transactions = Transaction::where('user_id', auth()->user()->id)->where('tanggal_tiket', '<', Carbon::today())->where('status', 'Paid')->orderBy('tanggal_tiket', 'asc')->paginate(10);
        return view('customer.riwayat', [
            'page' => 'Riwayat Pembelian',
            'transactions' => $transactions
        ]);
    }

    public function cekTiket(Request $request)
    {
        $place_id = $request->id;
        $tanggal_tiket = $request->tgl;

        $sisa = $this->cekSisaTiket($place_id, $tanggal_tiket);

        return response()->json(['sisa' => $sisa]);
    }

    public function cekSisaTiket($place_id, $tanggal_tiket) : int
    {
        $place = Place::find($place_id);
        $day = date('w', strtotime($tanggal_tiket));

        if ($day == 0 || $day == 6) {
            $jumlahtiket = $place->jumlah_tiket_weekend;
        } else {
            $jumlahtiket = $place->jumlah_tiket_weekday;
        } 

        $transaksi = Transaction::where('place_id', $place_id)->where('tanggal_tiket', $tanggal_tiket)->whereNot('status', 'Cancelled')->sum('jumlah_orang');

        return $jumlahtiket - $transaksi;
    }
}
