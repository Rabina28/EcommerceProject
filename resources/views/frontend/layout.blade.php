<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- CSRF Token -->
    <!--<meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <title>
        @yield('title')
    </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/responsive.css')}}">
    <link rel="icon" href="{{asset('frontend_assets/images/fevicon.png')}}" type="image/gif" />

    <link rel="stylesheet" href="{{asset('frontend_assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/owl.carousel.min.css')}}">




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body class="main-layout">
<div class="loader_bg">
    <div class="loader"><img src="{{asset('frontend_assets/images/loading.gif')}}" alt="#" /></div>
</div>
<div class="wrapper">
    <div class="sidebar">
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fa fa-arrow-left"></i>
            </div>
            <ul class="list-unstyled components">
                <li class=""> <a href="/">Home</a></li>
                <li> <a href="{{url('product')}}">Product</a></li>
                <li> <a href="{{url('category')}}">Category</a></li>
                <li> <a href="{{url('contactus')}}">Contact us</a></li>
                <li> <a href="{{url('my-order')}}">My orders</a></li>
                <li> <a href="{{url('wishlist')}}">Wishlist</a></li>
            </ul>
        </nav>
    </div>
    <div id="content">
        <header>
            <div class="header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 logo_section">
                            <div class="full">
                                <div class="center-desk">
                                    <div class="logo">
                                        <ul>
                                            <li>
                                                <a href="/"><h1>Furniture</h1></a>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="md-3">
                                        <ul>
                                            <li> <a href="{{url('cart')}}"><h2>Cart</h2></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="right_header_info">
                                <ul>
                                    <li>
                                        <button type="button" id="sidebarCollapse">
                                            <img src="{{asset('frontend_assets/images/menu_icon.png')}}" alt="#" />
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->

@section('container')
    @show

        <!--  footer -->
        <footer>
            <div class="footer">
                <div class="container-fluid">
                    <div class="border1">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <ul class="sociel">
                                    <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="copyright">
                    <p>Copyright 2019 All Right Reserved By <a href="/">the Furniture.com</a></p>
                </div>
            </div>

        </footer>
        <!-- end footer -->
    </div>

</div>

<div class="overlay"></div>

<!-- Javascript files-->

<script src="{{asset('frontend_assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('frontend_assets/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/popper.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/jquery-3.0.0.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/custom.js')}}"></script>
<script src="{{asset('frontend_assets/js/customs.js')}}"></script>

<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function() {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });

    });
</script>
<script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: {lat: 40.645037, lng: -73.880224},
        });

        var image = 'images/maps-and-flags.png';
        var beachMarker = new google.maps.Marker({
            position: {lat: 40.645037, lng: -73.880224},
            map: map,
            icon: image
        });
    }
</script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
<!-- end google map js -->
@yield('scripts')

</body>

</html>
