@extends('layouts.customer')

@section('content')
    <div class="container py-5 mb-5">
        <div class="row justify-content-center mb-3">
            <div class="col-md-10">
                <h1 class="fw-bold">{{ $place->nama }}</h1>
                <div class="d-flex align-items-center">
                    <i data-feather="map-pin" class="me-1"></i>
                    <span>
                        {{ $place->alamat }}
                    </span>
                </div>
                <div class="d-flex align-items-center">
                    <i data-feather="clock" class="me-1"></i>
                    <span>
                        Setiap hari, {{  date("H:i", strtotime($place->jam_buka)) }}-{{  date("H:i", strtotime($place->jam_tutup)) }}
                    </span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 p-2">
                <div class="overflow-hidden rounded" style="max-height: 350px">
                    <img src="{{ Vite::asset('storage/' . $place->image) }}" class="img-fluid w-100 object-fit-cover" alt="{{ $place->nama }}">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3 p-2">
                <a href="" class="d-flex align-items-center p-2 text-decoration-none link-dark rounded" style="background-color: #ddd">
                    <div class="rounded-circle p-2 bg-primary text-white me-2">
                        <i data-feather="grid" style="width: 25px; height: 25px"></i>
                    </div>
                    <div>
                        <div class="fw-semibold text-primary d-flex align-items-center">
                            Kategori<i data-feather="chevron-right"></i>
                        </div>
                        <div class="fs-5">
                            {{ $place->category->nama }}
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 p-2">
                <a href="{{ $place->gmaps_link }}" target="_blank" class="d-flex align-items-center p-2 text-decoration-none link-dark rounded" style="background-color: #ddd">
                    <div class="rounded-circle p-2 bg-primary text-white me-2">
                        <i data-feather="map" style="width: 25px; height: 25px"></i>
                    </div>
                    <div>
                        <div class="fw-semibold text-primary d-flex align-items-center">
                            Lihat di maps<i data-feather="chevron-right"></i>
                        </div>
                        <div class="fs-5">
                            Kabupaten Bangkalan
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 p-2">
                <div class="d-flex justify-content-between align-items-center p-2 text-decoration-none link-dark bg-success-subtle rounded">
                    <div class="ms-1">
                        <div style="font-size: 14px">Harga tiket</div>
                        <div class="text-success fs-5 fw-semibold">Rp {{ number_format($place->harga_tiket, 2, ',','.') }}</div>
                    </div>
                    <div class="p-2">
                        <a href="/pesan/{{ $place->id }}" class="btn btn-success text-white fw-semibold">Pesan Tiket</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 p-2">
                <div class="rounded p-3" style="background-color: #ddd;">
                    <div class="fs-5">
                        {!! $place->deskripsi !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 p-2">
                <a href="{{ route('wisata') }}" class="icon-link icon-link-hover">
                    <i data-feather="arrow-left"></i>
                    Kembali ke halaman list wisata
                </a>
            </div>
        </div>
        
    </div>
@endsection
