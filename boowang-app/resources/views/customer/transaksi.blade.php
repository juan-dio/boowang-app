@extends('layouts.customer')

@section('content')
    <div class="container py-5 mb-5">
        @if (session()->has('success'))
        <div class="row mb-3">
            <div class="col-md-8 mx-auto p-0">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif
        <div class="row p-2 mb-2">
            <div class="col-md-8 mx-auto">
                <div class="row p-2 border rounded overflow-hidden shadow-sm align-items-center">
                    <div class="col-3 text-center fw-bold">
                        Tanggal Pembelian
                    </div>
                    <div class="col-3 text-center fw-bold">
                        Tempat Wisata
                    </div>
                    <div class="col-2 text-center fw-bold">
                        Tanggal Tiket
                    </div>
                    <div class="col-2 text-center fw-bold">
                        Jumlah Orang
                    </div>
                    <div class="col-2 text-center fw-bold">
                        Total
                    </div>
                </div>
            </div>
        </div>
        @if ($transactions->count())
            @foreach ($transactions as $transaction)
                <div class="row px-2 mb-2">
                    <div class="col-md-8 mx-auto">
                        <div class="row px-2 py-4 border rounded overflow-hidden shadow-sm align-items-center">
                            <div class="col-3">
                                {{ $transaction->created_at }}
                            </div>
                            <div class="col-3 text-center">
                                {{ $transaction->place->nama }}
                            </div>
                            <div class="col-2 text-center">
                                {{ $transaction->tanggal_tiket }}
                            </div>
                            <div class="col-2 text-center">
                                {{ $transaction->jumlah_orang }}
                            </div>
                            <div class="col-2 text-center">
                                @if ($transaction->status === 'Cancelled' )
                                    <span class="fst-italic">Cancelled</span>
                                @else
                                    {{ $transaction->total }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row mb-2 mt-3">
                <div class="col-md-8 mx-auto">
                    <div class="fw-bold text-center fs-5">Anda belum memiliki transaksi</div>
                </div>
            </div>
        @endif
        <div class="row mt-4 mb-2">
            <div class="col-md-8 mx-auto px-0">
                {{ $transactions->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
