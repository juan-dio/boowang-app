<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin | {{ $page }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" class="d-flex">

        <nav>
            <div class="fixed-top d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px; height:100vh; background-color:var(--bs-green);">
                <div class="text-center text-white">
                    <span class="fs-4">Menu Admin</span>
                </div>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('places.index') }}" class="nav-link link-light {{ Request::is('manage/places*') ? 'active' : '' }}">
                            <i data-feather="list" class="bi me-2"></i>
                            Daftar Wisata
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link link-light {{ Request::is('manage/categories*') ? 'active' : '' }}">
                            <i data-feather="grid" class="bi me-2"></i>
                            Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('transactions') }}" class="nav-link link-light {{ Request::is('manage/transactions*') ? 'active' : '' }}">
                            <i data-feather="dollar-sign" class="bi me-2"></i>
                        Data Transaksi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('customers') }}" class="nav-link link-light {{ Request::is('manage/customers*') ? 'active' : '' }}">
                            <i data-feather="user" class="bi me-2"></i>
                        Data Customer
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    @auth
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a href="{{ route('home') }}" class="dropdown-item">
                                        <i data-feather="home" class="bi me-2" style="width: 24px; height: 24px"></i>
                                        Main Page
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i data-feather="log-out" class="bi me-2" style="width: 24px; height: 24px"></i> Log Out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="nav-link d-flex align-items-center" >
                            <i data-feather="log-in" class="bi me-2" style="width: 24px; height: 24px"></i>
                            Log In
                        </a>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="container px-3" style="margin-left: 280px;">
            @yield('content')
        </main>
    </div>
</body>
</html>
