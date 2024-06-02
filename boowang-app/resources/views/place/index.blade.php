@extends('layouts.admin')

@section('template_title')
    Places
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Places') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('places.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <span>{{ $message }}</span>
                        </div>
                    @endif

                    @if ($message = Session::get('failed'))
                        <div class="alert alert-danger m-4">
                            <span>{{ $message }}</span>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead text-center">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        
									<th rowspan="2">Nama</th>
									<th rowspan="2">Harga</th>
									<th colspan="2">Jam</th>
									<th colspan="2">Jumlah Tiket</th>

                                        <th rowspan="2">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th>Buka</th>
                                        <th>Tutup</th>
                                        <th>Weekday</th>
                                        <th>Weekend</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($places as $place)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $place->nama }}</td>
                                            <td class="text-center">{{ $place->harga_tiket }}</td>
                                            <td class="text-center">{{ $place->jam_buka }}</td>
                                            <td class="text-center">{{ $place->jam_tutup }}</td>
                                            <td class="text-center">{{ $place->jumlah_tiket_weekday }}</td>
                                            <td class="text-center">{{ $place->jumlah_tiket_weekend }}</td>

                                            <td>
                                                <form action="{{ route('places.destroy', $place->id) }}" method="POST" class="d-flex justify-content-center gap-1">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('places.show', $place->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('places.edit', $place->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="my-1">
                            {!! $places->withQueryString()->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
