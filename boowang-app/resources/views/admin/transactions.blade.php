@extends('layouts.admin')

@section('template_title')
    Places
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mx-auto mb-2">
                <canvas id="myChart" class="w-100" height="250px"></canvas>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Transactions') }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <form method="GET">
                            <div class="row mb-2">
                                <label for="date" class="col-form-label col-1 text-end">Bulan</label>
                                <div class="col-2">
                                    <select class="form-select" name="date" id="date" onchange="this.form.submit()">
                                        @foreach ($periods as $period)
                                            <option @if ($period->month == $month && $period->year == $year) selected @endif value="{{ $period->month }}-{{ $period->year }}">{{ date("F", mktime(0, 0, 0, $period->month, 10)) }} {{ $period->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="col-1">
                                    <button type="submit" class="btn btn-success">Filter</button>
                                </div> --}}
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Tempat Wisata</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Tanggal Tiket</th>
                                        <th>Jumlah Orang</th>
                                        <th>Total</th>
                                        <th>Metode</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $transaction->user->name }}</td>
                                            <td>{{ $transaction->place->nama }}</td>
                                            <td>{{ $transaction->created_at }}</td>
                                            <td>{{ $transaction->tanggal_tiket }}</td>
                                            <td>{{ $transaction->jumlah_orang }}</td>
                                            <td>{{ $transaction->total }}</td>
                                            <td>{{ $transaction->metode }}</td>
                                            <td>{{ $transaction->status }}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="my-1">
                            {!! $transactions->withQueryString()->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const currentYear = new Date().getFullYear();
        document.addEventListener("DOMContentLoaded", (e) => {
            const ctx = document.getElementById("myChart").getContext('2d');
            const transactionsPerMonths = {!! json_encode($transactionsPerMonths) !!}.map(transactionsPerMonth => transactionsPerMonth.jumlah);
            const transactionsMonths = {!! json_encode($transactionsPerMonths) !!}.map(transactionsPerMonth => monthNames[transactionsPerMonth.month-1]);
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: transactionsMonths,
                    datasets: [{
                        label: `Grafik Penjualan Tiket Tahun ${currentYear}`,
                        data: transactionsPerMonths,
                        borderWidth: 1,
                        borderColor: '#198754',
                        backgroundColor: '#20C997'
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
    </script>
@endsection
