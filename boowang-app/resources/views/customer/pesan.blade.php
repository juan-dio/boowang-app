@extends('layouts.customer')

@section('content')
    <div class="container py-5 mb-5">
        <div class="row justify-content-center mb-3">
            <div class="col-md-10">
                <h1 class="fw-bold">{{ $place->nama }}</h1>
                <div class="d-flex align-items-center">
                    <i data-feather="map-pin" class="me-1"></i>
                    {{ $place->alamat }}
                </div>
                <div class="d-flex align-items-center">
                    <i data-feather="clock" class="me-1"></i>
                    Setiap hari, {{  date("H:i", strtotime($place->jam_buka)) }}-{{  date("H:i", strtotime($place->jam_tutup)) }}
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 p-2">
                <div class="overflow-hidden rounded" style="max-height: 350px">
                    <img src="{{ '/storage/' . $place->image }}" class="img-fluid w-100 object-fit-cover" alt="{{ $place->nama }}">
                </div>
            </div>
        </div>
        <form method="POST" action="/pesan/{{ $place->id }}"  role="form" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" id="user_id">
            <input type="hidden" name="place_id" value="{{ $place->id }}" id="place_id">
            <div class="row p-1">
                <div class="col-md-10 mx-auto">
                    <div class="form-group mb-2">
                        <label for="tanggal_tiket" class="form-label">{{ __('Tanggal Tiket') }}</label>
                        <input type="date" name="tanggal_tiket" class="form-control @error('tanggal_tiket') is-invalid @enderror" value="{{ old('tanggal_tiket') }}" id="tanggal_tiket" placeholder="Tanggal Tiket">
                        {!! $errors->first('tanggal_tiket', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
                    <div class="form-group mb-2">
                        <label for="sisa_tiket" class="form-label">{{ __('Sisa Tiket') }}</label>
                        <input type="text" name="sisa_tiket" class="form-control" value="{{ old('sisa_tiket') }}" id="sisa_tiket" placeholder="Pilih tanggal terlebih dahulu" readonly>
                    </div>
                    <div class="form-group mb-2">
                        <label for="jumlah_orang" class="form-label">{{ __('Jumlah Orang') }}</label>
                        <input type="number" name="jumlah_orang" class="form-control @error('jumlah_orang') is-invalid @enderror" value="{{ old('jumlah_orang') }}" id="jumlah_orang" placeholder="Jumlah Orang">
                        {!! $errors->first('jumlah_orang', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
                    <div class="form-group mb-2">
                        <label for="metode" class="form-label">{{ __('Metode Pembayaran') }}</label>
                        <select class="form-select" name="metode" id="metode">
                            <option value="BRI" @if(old('metode') == 'BRI') selected @endif>BRI</option>
                            <option value="BCA" @if(old('metode') == 'BCA') selected @endif>BCA</option>
                            <option value="BNI" @if(old('metode') == 'BNI') selected @endif>BNI</option>
                            <option value="DANA" @if(old('metode') == 'DANA') selected @endif>DANA</option>
                            <option value="Gopay" @if(old('metode') == 'Gopay') selected @endif>Gopay</option>
                        </select>
                        {!! $errors->first('metode', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
            
                </div>
                <div class="col-md-10 mt-2 mx-auto">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Pesan
                    </button>
                </div>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="konfirmasiPesan" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="konfirmasiPesan">Konfirmasi Pemesanan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah tiket yang anda pesan sudah benar?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">{{ __('Konfirmasi') }}</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <div class="row justify-content-center">
            <div class="col-md-10 p-2">
                <a href="/wisata/{{ $place->id }}" class="icon-link icon-link-hover">
                    <i data-feather="arrow-left"></i>
                    Kembali ke halaman detail wisata
                </a>
            </div>
        </div>
        
        
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", (e) => {
            flatpickr("#tanggal_tiket", {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
                minDate: "today",
                maxDate: new Date().fp_incr(7)
            });
        });

        // generate sisa tiket
        const place_id = document.querySelector('#place_id');
        const tanggal_tiket = document.querySelector('#tanggal_tiket');
        const sisaTiket = document.querySelector('#sisa_tiket');

        tanggal_tiket.addEventListener('input', function() {
            fetch('/cektiket?id=' + place_id.value + '&tgl=' + tanggal_tiket.value, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => sisaTiket.value = data.sisa)
        });
    </script>
@endsection
