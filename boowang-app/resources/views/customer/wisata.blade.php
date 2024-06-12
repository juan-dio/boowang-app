@extends('layouts.customer')

@section('content')
    <div class="container py-5 mb-5">
        <div class="row mb-4">
            <div class="col-md-6 mx-auto">
                <form action="/wisata">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="flex">
                        <div class="input-group input-group-lg mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Cari wisata" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-success"><i data-feather="search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (request('category'))
            <div class="row mb-2">
                <div class="col-md-10 mx-auto d-flex align-items-center gap-2">
                    <span class="ms-2 fw-semibold">Category: </span>
                    <span class="badge d-flex p-2 align-items-center text-success-emphasis bg-success-subtle border border-success-subtle rounded-pill fs-6">
                        <span class="px-1 text-success">{{ request('category') }}</span>
                        <a href="@if (request('search')) /wisata?search={{ request('search') }} @else /wisata @endif"><i data-feather="x-circle" class="bi ms-1 text-success" style="width: 18px; height: 18px;"></i></a>
                    </span>
                </div>
            </div>
        @endif
        @if ($places->count())
            @foreach ($places as $place)
                <div class="row mb-2">
                    <div class="col-md-10 mx-auto">
                        <div class="row g-0 border rounded overflow-hidden mb-4 shadow-sm position-relative">
                            <div class="col-md-5 order-md-1" style="height: 250px">
                                <img src="{{ '/storage/' . $place->image }}" alt="{{ $place->nama }}" class="w-100 h-100 object-fit-cover">
                            </div>
                            <div class="col-md-7 order-md-0 p-4 d-flex flex-column">
                                <a href="@if (request('search')) /wisata?category={{ $place->category->nama }}&search={{ request('search') }} @else /wisata?category={{ $place->category->nama }} @endif" class="z-2"><strong class="d-inline-block mb-2 text-primary-emphasis">{{ $place->category->nama }}</strong></a>
                                <h3 class="mb-0">{{ $place->nama }}</h3>
                                <div class="mb-1 text-body-secondary">{{ $place->alamat }}</div>
                                <div class="mb-1 text-body-secondary">Rp {{ number_format($place->harga_tiket, 2, ',','.') }}</div>
                                <a href="/wisata/{{ $place->id }}" class="icon-link gap-1 icon-link-hover stretched-link">
                                    Detail
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row mb-2">
                <div class="col-md-10 mx-auto text-center fs-5 fw-bold">
                    Tempat wisata tidak ditemukan
                </div>
            </div>
        @endif
        <div class="row my-2">
            <div class="col-md-10 mx-auto">
                {{ $places->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
