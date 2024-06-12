@extends('layouts.admin')

@section('template_title')
    Categories
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categories') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										    <td >{{ $category->nama }}</td>

                                            <td>
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-warning" href="{{ route('categories.edit', $category->id) }}">{{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {!! $categories->withQueryString()->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
