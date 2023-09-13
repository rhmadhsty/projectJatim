<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Bootstrap Components &rsaquo; Modal &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/assets/modules/fontawesome/css/all.min.css') }}">

    {{-- CDN JQUERY --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> --}}


    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/modules/prism/prism.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    @yield('search')
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('stisla/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger">
                                <a href="#" class="dropdown-item has-icon text-danger"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/">SMA NEGERI 1 LENTENG</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html"><img src="{{ asset('assets/img/logo-1.png') }}" alt="logo"
                                class="img-fluid"></a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="{{ request()->is('home') ? 'active' : '' }}">
                            <a href="/home" class="nav-link active"><i
                                    class="fas fa-fire"></i><span>Beranda</span></a>
                        </li>
                        <li class="{{ request()->is('data_guru') ? 'active' : '' }}">
                            <a href="{{ route('data_guru.index') }}" class="nav-link"><i class="far fa-user"></i>
                                <span>Data Guru</span></a>
                        </li>
                        <li class="{{ request()->is('data_siswa') ? 'active' : '' }}">
                            <a href="{{ route('data_siswa.index') }}" class="nav-link"><i class="fa fa-user"></i>
                                <span>Data Siswa</span></a>
                        </li>
                        <li class="{{ request()->is('data_kelas') ? 'active' : '' }}">
                            <a href="{{ route('data_kelas.index') }}" class="nav-link"><i class="fa fa-user"></i>
                                <span>Data Kelas</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            {{-- <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div> --}}
            @yield('content')

            {{-- end Main Content --}}
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
                        Nauval Azhar</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('stisla/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('stisla/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('stisla/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('stisla/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('stisla/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('stisla/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('stisla/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('stisla/assets/modules/prism/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('stisla/assets/js/page/bootstrap-modal.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('stisla/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('stisla/assets/js/custom.js') }}"></script>

    {{-- Template Modal --}}
    {{-- <script src="{{ asset('assets/js/modal.js') }}"></script> --}}
</body>

</html>
