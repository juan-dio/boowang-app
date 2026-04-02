@extends('layouts.customer')

@section('content')
    <div class="container py-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white text-center fs-4 fw-semibold" style="background-color: var(--bs-green)">{{ __('Tentang kami') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col" style="text-align: justify">
                                <h4 class="card-title">Latar Belakang</h4>
                                <p>
                                    Kami adalah kelompok mahasiswa dari program studi Teknik Informatika, yang sedang menempuh mata kuliah Rekayasa Perangkat Lunak di Universitas Trunojoyo Madura. Kelompok ini dibentuk dengan tujuan untuk mengerjakan project akhir yang diberikan sebagai bagian dari penilaian mata kuliah ini. Anggota kelompok kami terdiri dari 4 mahasiswa dengan keahlian yang beragam, namun dengan semangat yang sama dalam mengembangkan perangkat lunak yang bermanfaat.
                                </p>
                                <p>
                                    Sejak awal semester, kami telah belajar banyak tentang prinsip-prinsip dasar dan metodologi dalam rekayasa perangkat lunak, termasuk analisis kebutuhan, perancangan sistem, pengembangan, dan pengujian. Dengan bekal ilmu tersebut, kami bertekad untuk mengaplikasikan semua yang telah kami pelajari dalam sebuah proyek nyata yang dapat memberikan solusi atas permasalahan yang ada di masyarakat.
                                </p>
                                <p>
                                    Untuk proyek ini, kami memutuskan untuk mengembangkan sebuah aplikasi booking tiket yang dapat memudahkan wisatawan yang sedang berkunjung ke Kabupaten Bangkalan. Ide ini muncul dari sulitnya mencari apa saja wisata yang ada di Kabupaten Bangkalan dan bagaimana agar pembelian tiket tempat wisata tersebut dapat dipermudah, dan kami yakini dapat memberikan dampak positif bagi para wisatawan dan para pelaku usaha tempat wisata yang ada di Kabupaten Bangkalan.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title">Anggota Kelompok</h4>
                                <ol class="list-group list-group-numbered">
                                    <li class="list-group-item d-flex">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Muhammad Rif’an Afandi - 210411100128</div>
                                            Merancang antarmuka pengguna khususnya customer pada bagian daftar wisata, detail wisata, dan profil.
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Rizkyan Dwi Prasetiawan - 220411100026</div>
                                            Merancang antarmuka pengguna khususnya admin.
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Moh. Samsul Arifin - 220411100054</div>
                                            Merancang antarmuka pengguna khususnya customer pada bagian halaman utama, tiket, dan transaksi.
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Juan Axl Ronaldio Zaka Putra - 220411100066</div>
                                            Merancang dan mengembangkan basis data dan logika aplikasi. Bertanggung jawab atas keamanan data dan sistem backend.
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
