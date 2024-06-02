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
                <div class="row border rounded overflow-hidden shadow-sm align-items-center">
                    <div class="col-3 text-center fw-bold">
                        Tempat Wisata
                    </div>
                    <div class="col-3 text-center fw-bold">
                        Tanggal Tiket
                    </div>
                    <div class="col-3 text-center fw-bold">
                        Jumlah Orang
                    </div>
                    <div class="col-3 text-center fw-bold">
                        Status
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
                                {{ $transaction->place->nama }}
                            </div>
                            <div class="col-3 text-center">
                                {{ $transaction->tanggal_tiket }}
                            </div>
                            <div class="col-3 text-center">
                                {{ $transaction->jumlah_orang }}
                            </div>
                            <div class="col-3 d-flex justify-content-center flex-wrap gap-1">
                                @if ($transaction->status == 'Paid')
                                    <button type="button" class="btn btn-success btn-qr" data-bs-toggle="modal" data-bs-target="#modalTiket" data-code="{{ $transaction->code }}" data-title="{{ $transaction->place->nama }}" data-date="{{ $transaction->tanggal_tiket }}">
                                        Tampilkan QRCode
                                    </button>
                                @elseif ($transaction->status == 'Cancelled')
                                    <span class="fst-italic">Cancelled</span>
                                @else
                                    <form method="POST" action="/bayar/{{ $transaction->id }}/cancel">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="event.preventDefault(); confirm('Batalkan transaksi?') ? this.closest('form').submit() : false;">Cancel</button>
                                    </form>
                                    <a href="/bayar/{{ $transaction->id }}" class="btn btn-primary">Bayar</a>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row mb-2 mt-3">
                <div class="col-md-8 mx-auto">
                    <div class="fw-bold text-center fs-5">Anda belum memiliki tiket</div>
                </div>
            </div>
        @endif
        <div class="row mt-4 mb-2">
            <div class="col-md-8 mx-auto px-0">
                {{ $transactions->withQueryString()->links() }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalTiket" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTiketLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5 fw-bold" id="modalTiketLabel"></h1>
                    <span id="modalTiketDate"></span>
                </div>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <canvas id="canvas" class="d-block mx-auto"></canvas>
                <div class="fw-bold fs-5 text-center" id="code"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", (e) => {
            document.addEventListener("click", (e) => {
                if (e.target.classList.contains('btn-qr')) {
                    let data = e.target.dataset;
                    const canvas = document.getElementById('canvas')
                    const code = document.getElementById('code')
                    const modalTiketLabel = document.getElementById('modalTiketLabel')
                    const modalTiketDate = document.getElementById('modalTiketDate')

                    QRCode.toCanvas(canvas, data.code, {
                        width: 250
                    }, function (error) {
                        if (error) console.error(error)
                    });

                    code.innerHTML = data.code
                    modalTiketLabel.innerHTML = data.title
                    modalTiketDate.innerHTML = data.date
                }
            })

            
        });
    </script>
@endsection
