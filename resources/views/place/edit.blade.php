@extends('layouts.admin')

@section('template_title')
    {{ __('Update') }} Place
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Place</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('places.update', $place->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('place.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
