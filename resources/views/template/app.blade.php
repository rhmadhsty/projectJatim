<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>SMAN 1 LENTENG</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/assets/modules/fontawesome/css/all.min.css') }}">

    {{-- CHARTS --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/modules/prism/prism.css') }}">

    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">
    <!-- Start GA -->
    @stack('css')
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
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
                    {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
>>>>>>> dev-rhma
                            class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Template update is available now!
                                        <div class="time text-primary">2 Min Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-success text-white">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-danger text-white">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Low disk space. Let's clean it!
                                        <div class="time">17 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Welcome to Stisla template!
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
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
                                <i class="fas fa-sign-out-alt"></i> Logout
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
                        <li class="{{ request()->is('rekap') ? 'active' : '' }}">
                            <a href="{{ route('rekap.index') }}" class="nav-link"><i class="far fa-file-alt"></i>
                                <span>Rekap Laporan</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            {{-- Main Content --}}
            @yield('content')
            {{-- /Main Content --}}


            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2023 <div class="bullet"></div> Design By <a
                        href="https://smanlenteng.sch.id/">SMAN 1 LENTENG</a>
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

    {{-- Modal Js Costum --}}
    <script src="{{ asset('assets/js/modal.js') }}"></script>
{{-- <<<<<<< HEAD
=======
<<<<<<< HEAD
======= --}}
    {{-- <script src="{{ asset('assets/js/script.js') }}"></script> --}}
{{-- >>>>>>> dev-rhma
>>>>>>> 9b64a56c6e68bd83319d935a2ab64b45b930dea3 --}}
    <script src="{{ asset('assets/js/script.js') }}"></script>

    {{-- Dropzone --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script> --}}

    {{-- memanggil ajax untuk search --}}
    {{-- @yield('script') --}}

    @stack('js')

</body>

</html>
