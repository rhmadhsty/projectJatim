<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <!-- site metas -->
    <title>SMAN 1 LENTENG</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('capiclean/css/bootstrap.min.css') }} ">

    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('capiclean/css/style.css') }}">

    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('capiclean/css/responsive.css') }}">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/logo-1.png') }}" rel="icon">

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('capiclean/css/jquery.mCustomScrollbar.min.css') }}">

    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{ asset('capiclean/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('capiclean/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

    {{-- icon tab --}}
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-1.png') }}">

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <!--header section start -->
    <div class="header_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        <a href="/">
                            <img src="{{ asset('assets/img/logo-1.png') }}" width="80">
                        </a>
                    </div>
                    {{-- <div class="menu_text">
                        <ul>
                            <div class="togle_3">
                                <div class="menu_main">
                                    About Us
                                </div>
                            </div>
                        </ul>
                    </div> --}}
                </div>
                {{-- <div class="col-md-3">
                    <h1 class="banner_taital">SPP NEKAT</h1>
                </div> --}}
                <div class="col-md-8">
                    <div class="menu_text">
                        <ul>
                            <div class="togle_3">
                                <div class="menu_main">
                                    @if (Route::has('login'))
                                        @auth
                                            @if (Auth::user()->level == 1)
                                                <a href="{{ url('/home') }}" class="">Home</a>
                                            @elseif(Auth::user()->level == 2)
                                                <a href="{{ url('/home') }}" class="">{{ Auth::user()->name }}</a>
                                            @else
                                                <a href="{{ url('/home') }}" class="">Home</a>
                                            @endif
                                        @else
                                            {{-- <a class="text-sm text-gray-700 dark:text-gray-500 underline"
                                                data-bs-toggle="modal" data-bs-target="#tambah" href="#"> Login</a> --}}
                                            <a class="text-sm text-gray-700 dark:text-gray-500 underline"
                                                href="{{ route('login') }}"> Login</a>
                                        @endauth

                                    @endif
                                </div>
                                <div class="shoping_bag">
                                </div>
                            </div>
                            {{-- <div id="myNav" class="overlay">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                <div class="overlay-content">
                                    <a href="index.html">Home</a>
                                    <a href="services.html">Services</a>
                                    <a href="about.html">About</a>
                                    <a href="choose.html">Choose</a>
                                    <a href="team.html">Team</a>
                                    <a href="contact.html">Contact Us</a>
                                </div>
                            </div> --}}
                            <span class="navbar-toggler-icon"></span>
                            {{-- <span onclick="openNav()"><img src="{{ asset('capiclean/images/toggle-icon.png') }}"
                                    class="toggle_menu"></span> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner section start -->
        <div class="banner_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="banner_taital">Selamat Datang di Website SMA NEGERI 1 LENTENG</h1>
                        <h1 class="">Sumanep</h1>
                        {{-- <p class="banner_text">Serahkan segala urusan Pembayaran SPP anda kepada kami. Kami Siap
                            Melayani anda.</p> --}}
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3">
                        <div><img src="{{ asset('assets/img/read.png') }}" class="image_1"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner section end -->
    </div>

    {{-- @include('sweetalert::alert') --}}

    <!-- Javascript files-->
    <script src="{{ asset('capiclean/js/jquery.min.js') }}"></script>
    <script src="{{ asset('capiclean/js/popper.min.js') }}"></script>
    <script src="{{ asset('capiclean/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('capiclean/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('capiclean/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('capiclean/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('capiclean/js/custom.js') }}"></script>
    <!-- javascript -->
    <script src="{{ asset('capiclean/js/owl.carousel.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
    <script>
        function openNav() {
            document.getElementById("myNav").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }
    </script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");
    </script>
</body>

</html>
