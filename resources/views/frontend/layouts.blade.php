<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    @if(isset($title))
        <title>{{$title}}</title>
        <meta property="og:title" content="{{$title}}">
    @else
        <title>Hotel Shankharapur | Best Memories start here</title>
        <meta property="og:title" content="Hotel Shankharapur | Best Memories start here">
    @endif
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(isset($description))
        <meta name="description" content="{{$description}} | Hotel Shankharapur | Best Memories start here"/>
    @else
        <meta property='og:description' content='Hotel Shankharapur | Best Memories start here'/>
    @endif
    @if(isset($image))
        <meta property='og:image' content='{{url($image)}}'/>
    @else
        <meta property='og:image' content='{{asset('property/main_banner.jpg')}}'/>
    @endif
    @if(isset($tag))
        <meta name="keywords" content="{{$tag}} | Hotel Shankharapur | Best Memories start here | @if(isset($title)) {{$title}} |  @else Hotel Shankharapur | Best Memories start here @endif"/>
    @else
        <meta name="keywords" content="Hotel Shankharapur | Best Memories start here"/>
    @endif
    @if(isset($author))
        <meta name="author" content="{{$author}}"/>
    @else
        <meta name="author" content="Hotel Shankharapur | Best Memories start here"/>
    @endif
    <meta property='og:url' content='{{url()->current()}}'>
    <meta property="og:type" content="website"/>
    <link rel="shortcut icon" href="{{asset('property/favicon.png')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('themes')}}/styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('themes')}}/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('themes')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{asset('themes')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{asset('themes')}}/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('themes')}}/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('themes')}}/styles/responsive.css">

`@yield('style')
</head>
<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">
        <div class="header_content">

            <!-- Logo -->
            <div class="logo_container d-flex flex-column align-items-center justify-content-center">
                <div class="logo">
                    <a href="{{url('')}}" class="text-center">
                        <img src="{{asset('property/logo-white.png')}}" alt="" style="width: 100%;">
                    </a>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_inner d-flex flex-row align-items-center justify-content-start">
                            <nav class="main_nav">
                                <ul class="d-flex flex-row align-items-center justify-content-start">
                                    <li class="active"><a href="{{url('')}}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>home</span></div></a></li>
                                    <li><a href="{{url('about-us')}}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>about us</span></div></a></li>
                                    <li><a href="{{url('rooms')}}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>rooms</span></div></a></li>
                                    <li><a href="{{url('news')}}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>news</span></div></a></li>
                                    <li><a href="{{url('contact-us')}}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>contact</span></div></a></li>
                                    <li><a href="{{url('login')}}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span title="Login"><i class="fa fa-sign-in"></i></span></div></a></li>
                                </ul>
                            </nav>
                            <a href="#" class="button_container header_button"><div class="button text-center"><span>Book Your Stay</span></div></a>
                            <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            <div class="header_review"><a href="#">Add your review</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Menu -->

    <div class="menu">
        <div class="background_image" style="background-image:url({{url('themes')}}/images/menu.jpg)"></div>
        <div class="menu_content d-flex flex-column align-items-center justify-content-center">
            <ul class="menu_nav_list text-center">
                <li><a href="javascript:void(0)">Home</a></li>
                <li><a href="javascript:void(0)">About us</a></li>
                <li><a href="{{url('rooms')}}">Rooms</a></li>
                <li><a href="{{url('news')}}">News</a></li>
                <li><a href="javascript:void(0)">Contact</a></li>
                <li><a href="{{url('login')}}"><i class="fa fa-sign-in"></i> Login</a></li>
            </ul>
            <div class="menu_review"><a href="#">Add your review</a></div>
        </div>
    </div>

    @yield('body')

    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">

                <!-- Footer Logo -->
                <div class="col-lg-3 footer_col">
                    <div class="footer_logo_container">
                        <div class="footer_logo">
                            <a href="{{url('')}}" class="text-center">
                                <img src="{{asset('property/logo_long.png')}}" alt="" style="width: 100%;">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Footer Menu -->
                <div class="col-lg-5 footer_col">
                    <div class="footer_menu">
                        <ul class="d-flex flex-row align-items-start justify-content-start">
                            <li><a href="{{url('')}}">Home</a></li>
                            <li><a href="javascript:void(0)">About us</a></li>
                            <li><a href="javascript:void(0)">Rooms</a></li>
                            <li><a href="javascript:void(0)">News</a></li>
                            <li><a href="javascript:void(0)">Contact</a></li>
                        </ul>
                        <div class="footer_menu_text">
                            <p>Praesent fermentum ligula in dui imperdiet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
                        </div>
                        <div class="social_link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Footer Contact -->
                <div class="col-lg-4 footer_col">
                    <div class="footer_contact clearfix">
                        <div class="footer_contact_content float-lg-right">
                            @php
                            $contactDetail = \App\Model\Admin::find(1);
                            @endphp
                            <ul>
                                <li>
                                    <span class="text-primary">{{$contactDetail->name}}</span>
                                    @if(\Illuminate\Support\Facades\Auth::check())
                                        @if(\Illuminate\Support\Facades\Auth::user()->type=='admin')
                                            <a href="{{url('admin/profile-manage/edit-profile')}}" class="badge badge-info"><i class="fa fa-edit"></i> Edit Info</a>
                                        @endif
                                    @endif
                                </li>
                                <li><i class="fa fa-map text-danger"></i> <span>{{$contactDetail->address}}</span></li>
                                <li><i class="fa fa-phone text-danger"></i> <span>{{$contactDetail->tel1}} {{$contactDetail->tel2}}</span></li>
                                <li><i class="fa fa-phone-square text-danger"></i> <span>{{$contactDetail->mobile1}}</span></li>
                                <li><i class="fa fa-envelope text-danger"></i> <span>{{$contactDetail->email1}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="copyright text-lg-center pt-5"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>&copy;{{date('Y')}} Hotel Shankharapur. All Rights Reserved. <b>Design By:</b> <a href="#">Genius Nepal</a></p>
                    </div>
                </div>
                            </div>
        </div>
    </footer>
</div>
@yield('script')
<script src="{{asset('themes')}}/js/jquery-3.2.1.min.js"></script>
<script src="{{asset('themes')}}/styles/bootstrap-4.1.2/popper.js"></script>
<script src="{{asset('themes')}}/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="{{asset('themes')}}/plugins/greensock/TweenMax.min.js"></script>
<script src="{{asset('themes')}}/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{asset('themes')}}/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{asset('themes')}}/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{asset('themes')}}/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{asset('themes')}}/plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="{{asset('themes')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{asset('themes')}}/plugins/easing/easing.js"></script>
<script src="{{asset('themes')}}/plugins/parallax-js-master/parallax.min.js"></script>
<script src="{{asset('themes')}}/js/custom.js"></script>



</body>
</html>