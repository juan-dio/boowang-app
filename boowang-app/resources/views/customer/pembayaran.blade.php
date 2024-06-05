@extends('layouts.customer')

@section('content')
    <div class="container py-5 mb-5">
        <div class="row">
            <div class="col-md-6 mx-auto mb-3">
                <div class="fw-bold fs-5 text-center mb-1">
                    Lakukan pembayaran sebelum:
                </div>
                <div class="fw-bold fs-5 text-center mb-1" id="countdown">
                    
                </div>
                {{-- <canvas id="canvas" class="d-block mx-auto"></canvas> --}}
                <div class="w-50 mx-auto my-3">
                    @if ($transaction->metode === 'BRI')
                        <img src="{{ Vite::asset('storage/logo-bayar/bri.png') }}" class="object-fit-cover w-100" alt="BRI">
                    @elseif ($transaction->metode === 'BCA')
                        <img src="{{ Vite::asset('storage/logo-bayar/bca.png') }}" class="object-fit-cover w-100" alt="BCA">
                    @elseif ($transaction->metode === 'BNI')
                        <img src="{{ Vite::asset('storage/logo-bayar/bni.png') }}" class="object-fit-cover w-100" alt="BNI">
                    @elseif ($transaction->metode === 'DANA')
                        <img src="{{ Vite::asset('storage/logo-bayar/dana.png') }}" class="object-fit-cover w-100" alt="DANA">
                    @elseif ($transaction->metode === 'GOPAY')
                        <img src="{{ Vite::asset('storage/logo-bayar/gopay.png') }}" class="object-fit-cover w-100" alt="GOPAY">
                    @endif
                </div>
                <div class="fw-bold fs-5 text-center" id="total">
                    Rp {{ number_format($transaction->total, 2, ',','.') }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mx-auto p-1">
                <form method="POST" action="/bayar/{{ $transaction->id }}">
                    @csrf
                    <button type="submit" class="btn btn-success w-100">Bayar</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mx-auto p-1">
                <a href="/tiket" class="btn btn-primary w-100">Bayar nanti</a>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", (e) => {
            // const canvas = document.getElementById('canvas')
            // const text = "Pembayaran sebesar Rp {{ $transaction->total }} berhasil."
            let tanggalTransaksi = "{{ $transaction->tanggal }}"
            tanggalTransaksi = tanggalTransaksi.split(" ")
            let countDownDate = new Date(tanggalTransaksi[0] + "T" + tanggalTransaksi[1])
            countDownDate.setDate(countDownDate.getDate() + 1)

            // QRCode.toCanvas(canvas, text, {
            //     width: 250
            // }, function (error) {
            //     if (error) console.error(error)
            // });

            const countdown = setInterval(function() {
                let now = new Date().getTime();

                let distance = countDownDate - now;

                let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

                if (distance < 0) {
                    clearInterval(countdown);
                    document.getElementById("countdown").innerHTML = "Cancelled";
                }
            }, 1000);
        });
    </script>
@endsection
