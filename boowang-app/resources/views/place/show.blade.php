@extends('layouts.admin')

@section('template_title')
    {{ $place->name ?? __('Show') . " " . __('Place') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Place</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('places.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Category:</strong>
                                    {{ $place->category->nama }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nama:</strong>
                                    {{ $place->nama }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Alamat:</strong>
                                    {{ $place->alamat }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Link Gmaps:</strong>
                                    {{ $place->gmaps_link }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Deskripsi:</strong>
                                    {!! $place->deskripsi !!}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Image:</strong>
                                    <div class="border border-dark-subtle rounded p-1" style="width: 250px">
                                        <img src="{{ Vite::asset('storage/' . $place->image) }}" class="img-fluid" alt="{{ $place->nama }}">
                                    </div>
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Harga Tiket:</strong>
                                    {{ $place->harga_tiket }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Jam Buka:</strong>
                                    {{ $place->jam_buka }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Jam Tutup:</strong>
                                    {{ $place->jam_tutup }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Jumlah Tiket Weekday:</strong>
                                    {{ $place->jumlah_tiket_weekday }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Jumlah Tiket Weekend:</strong>
                                    {{ $place->jumlah_tiket_weekend }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
