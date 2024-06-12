<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BooWang | {{ $page }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" class="position-relative">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: var(--bs-green)">
                <div class="container-fluid px-5">
                    <a class="navbar-brand fs-4 fw-semibold" href="#">Boo<span class="text-warning">Wang</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav ms-4 me-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('wisata*') ? 'active' : '' }}" href="{{ route('wisata') }}">Wisata</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('tiket*') ? 'active' : '' }}" href="{{ route('tiket') }}">Tiket saya</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('transaksi*') ? 'active' : '' }}" href="{{ route('transaksi') }}">Transaksi</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Welcome, {{ auth()->user()->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('profil') }}">
                                                <i data-feather="user" class="bi me-2" style="width: 18px; height: 18px"></i> Profil
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        @can('admin')
                                            <li>
                                                <a class="dropdown-item" href="/manage/places">
                                                    <i data-feather="folder" class="bi me-2" style="width: 18px; height: 18px"></i> Manage
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                        @endcan
                                        <li>
                                            <form action="{{ route('logout') }}" method="post" id="form-logout">
                                                @csrf
                                                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-logout" id="btn-logout">
                                                    <i data-feather="log-out" class="bi me-2" style="width: 18px; height: 18px"></i> Log Out
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <a href="{{ route('login') }}" class="nav-link d-flex align-items-center" >
                                    <i data-feather="log-in" class="bi me-2" style="width: 18px; height: 18px"></i>
                                    Log In
                                </a>
                            @endauth
                        </ul>
                        
                    </div>
                </div>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <div class="modal fade" id="modal-logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="konfirmasiLogout" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="konfirmasiLogout">Konfirmasi Log Out</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin log out?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" onclick="document.getElementById('form-logout').submit()">{{ __('Konfirmasi') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <footer class="container position-absolute bottom-0 start-0 end-0">
            <p class="float-end"><a href="#app">Back to top</a></p>
            <p>&copy; 2024 BooWang.</p>
        </footer>
    </div>

</body>
</html>
