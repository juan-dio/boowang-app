@extends('layouts.customer')

@section('content')
    <div class="container py-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white text-center fs-4 fw-semibold" style="background-color: var(--bs-green)">{{ __('Profil') }}</div>
                    <div class="card-body">
                        @if (session()->has('success'))  
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input type="nama" class="form-control" id="nama" value="{{ $user->name }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" id="nama" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ route('password') }}" class="btn btn-success">Ubah Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
