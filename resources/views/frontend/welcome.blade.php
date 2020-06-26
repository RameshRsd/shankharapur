@extends('frontend.layouts')
@section('body')
    <!-- Home -->
    <div class="home">

        <!-- Home Slider -->
        <div class="home_slider_container">
            <div class="owl-carousel owl-theme home_slider">

                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image" style="background-image:url({{asset('themes')}}/images/home_slider_1.jpg)"></div>
                    <div class="home_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_content text-center">
                                        <div class="home_subtitle">luxury resort</div>
                                        <div class="home_title">Amazing Services, Location & Facilities</div>
                                        <a href="#" class="button_container home_button"><div class="button text-center"><span>Book Your Stay</span></div></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image" style="background-image:url({{asset('themes')}}/images/home_slider_1.jpg)"></div>
                    <div class="home_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_content text-center">
                                        <div class="home_subtitle">luxury resort</div>
                                        <div class="home_title">Amazing Services, Location & Facilities</div>
                                        <a href="#" class="button_container home_button"><div class="button text-center"><span>Book Your Stay</span></div></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide -->
                <div class="owl-item">
                <!-- Image credit: https://unsplash.com/@santtd -->
                    <div class="background_image" style="background-image:url({{asset('themes')}}/images/home_slider_1.jpg)"></div>
                    <div class="home_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_content text-center">
                                        <div class="home_subtitle">luxury resort</div>
                                        <div class="home_title">Amazing Services, Location & Facilities</div>
                                        <a href="#" class="button_container home_button"><div class="button text-center"><span>Book Your Stay</span></div></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Home Slider Dots -->

            <div class="home_slider_dots">
                <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                    <li class="home_slider_custom_dot active">01</li>
                    <li class="home_slider_custom_dot">02</li>
                    <li class="home_slider_custom_dot">03</li>
                </ul>
            </div>

        </div>
    </div>

    <!-- Search Bar -->

    <div class="search_bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="search_bar_container">
                        <form action="#" id="search_bar_form" class="search_bar_form d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-between clearfix">
                            <div>
                                <input type="text" class="search_form_select" placeholder="Select Arrival Date">
                            </div>
                            <div>
                                <select class=" search_form_select">
                                    <option disabled selected>Select Departure Date</option>
                                    <option>07/15/2018</option>
                                    <option>07/22/2018</option>
                                    <option>07/29/2018</option>
                                </select>
                            </div>
                            <div>
                                <select class="search_form_select">
                                    <option disabled selected>Select Rooms</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div><button class="search_bar_button">Request a Quote</button></div>
                        </form>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Intro -->

    <div class="intro">
        <div class="container">
            <div class="row row-lg-eq-height">

                <!-- Intro Content -->
                <div class="col-lg-12">
                    <div style="width:50%; margin:0 auto;">
                        <div class="row">
                            @include('layouts.notification')
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 intro_col">
                    <div class="intro_container d-flex flex-column align-items-start justify-content-center magic_up">
                        <div class="intro_content">
                            <div class="section_title_container">
                                <div class="section_subtitle">luxury resort</div>
                                <div class="section_title"><h2>Relax in our Hotel</h2></div>
                            </div>
                            <div class="intro_text">
                                <p>Praesent fermentum ligula in dui imperdiet, vel tempus nulla ultricies. Phasellus at commodo ligula. Nullam molestie volutpat sapien, a dignissim tortor laoreet quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                            </div>
                            <div class="intro_link"><a href="rooms.html">View Rooms</a></div>
                            <a href="#" class="button_container intro_button"><div class="button text-center"><span>Book Your Stay</span></div></a>
                        </div>
                    </div>
                </div>

                <!-- Intro Image -->
                <div class="col-lg-7 intro_col">
                    <div class="intro_images magic_up">
                        <div class="intro_1 intro_img"><img src="{{asset('themes')}}/images/intro_1.jpg" alt=""></div>
                        <div class="intro_2 intro_img"><img src="{{asset('themes')}}/images/intro_2.jpg" alt=""></div>
                        <div class="intro_3 intro_img"><img src="{{asset('themes')}}/images/intro_3.jpg" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Big Room -->

    <div class="big_room">
        <div class="container-fluid">
            <div class="row row-xl-eq-height">
                <div class="col-xl-6 order-xl-1 order-2">
                    <div class="big_room_slider_container">

                        <!-- Big Room SLider -->
                        <div class="owl-carousel owl-theme big_room_slider">

                            <!-- Slide -->
                            <div class="owl-item">
                                <div class="background_image" style="background-image:url({{asset('themes')}}/images/img_1.jpg)"></div>
                            </div>

                            <!-- Slide -->
                            <div class="owl-item">
                                <div class="background_image" style="background-image:url({{asset('themes')}}/images/img_1.jpg)"></div>
                            </div>

                            <!-- Slide -->
                            <div class="owl-item">
                                <div class="background_image" style="background-image:url({{asset('themes')}}/images/img_1.jpg)"></div>
                            </div>

                        </div>

                        <div class="big_room_slider_nav_container d-flex flex-row align-items-start justify-content-start">
                            <div class="big_room_slider_prev big_room_slider_nav"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                            <div class="big_room_slider_next big_room_slider_nav"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 order-xl-2 order-1">
                    <div class="big_room_content">
                        <div class="big_room_content_inner magic_up">
                            <div class="section_title_container">
                                <div class="section_subtitle">luxury resort</div>
                                <div class="section_title"><h2>Rooms with private swimming pool</h2></div>
                            </div>
                            <div class="big_room_text">
                                <p>Praesent fermentum ligula in dui imperdiet, vel tempus nulla ultricies. Phasellus at commodo ligula. Nullam molestie volutpat sapien, a dignissim tortor laoreet quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra. Phasellus at commodo ligula. Nullam molestie volutpat sapien, a dignissim tortor  per inceptos himenaeos laoreet quis. Class aptent taciti soci osqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                            </div>
                            <div class="testimonial">
                                <div class="testimonial_stars">
                                    <ul class="d-flex flex-row align-items-start justfy-content-start">
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    </ul>
                                </div>
                                <div class="testimonial_text">“ Praesent fermentum ligula in dui imperdiet, vel tempus nulla ultricies. Phasellus at commodo ligula. Nullam molestie volutpat sapien, a dignissim tortor laoreet quis.</div>
                                <div class="testimonial_author d-flex flex-row align-items-center justify-content-start">
                                    <div class="testimonial_author_image"><img src="{{asset('themes')}}/images/testimonial.png" alt=""></div>
                                    <div class="testimonial_author_name"><a href="#">Michael Smith</a><span>, Client</span></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Room -->

    <div class="rooms">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center magic_up">
                        <div class="section_subtitle">luxury resort</div>
                        <div class="section_title"><h2>Choose a Room</h2></div>
                    </div>
                </div>
            </div>
            <div class="row room_row magic_up">

                <!-- Room -->
                <div class="col-lg-4 room_col">
                    <div class="room">
                        <div class="room_image"><img src="{{asset('themes')}}/images/room_1.jpg" alt=""></div>
                        <div class="room_content text-center">
                            <div class="room_price">From $90 / <span>Night</span></div>
                            <div class="room_type">double</div>
                            <div class="room_title"><a href="#">Deluxe Suite</a></div>
                            <div class="room_text">
                                <p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
                            </div>
                            <a href="#" class="button_container room_button"><div class="button text-center"><span>Book Now</span></div></a>
                        </div>
                    </div>
                </div>

                <!-- Room -->
                <div class="col-lg-4 room_col">
                    <div class="room">
                        <div class="room_image"><img src="{{asset('themes')}}/images/room_2.jpg" alt=""></div>
                        <div class="room_content text-center">
                            <div class="room_price">From $90 / <span>Night</span></div>
                            <div class="room_type">single</div>
                            <div class="room_title"><a href="#">Luxury Suite</a></div>
                            <div class="room_text">
                                <p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
                            </div>
                            <a href="#" class="button_container room_button"><div class="button text-center"><span>Book Now</span></div></a>
                        </div>
                    </div>
                </div>

                <!-- Room -->
                <div class="col-lg-4 room_col">
                    <div class="room">
                        <div class="room_image"><img src="{{asset('themes')}}/images/room_3.jpg" alt=""></div>
                        <div class="room_content text-center">
                            <div class="room_price">From $90 / <span>Night</span></div>
                            <div class="room_type">double</div>
                            <div class="room_title"><a href="#">Deluxe Suite</a></div>
                            <div class="room_text">
                                <p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
                            </div>
                            <a href="#" class="button_container room_button"><div class="button text-center"><span>Book Now</span></div></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Gallery -->

    <div class="gallery">
        <div class="gallery_slider_container">

            <!-- Gallery Slider -->
            <div class="owl-carousel owl-theme gallery_slider magic_up">
                <div class="owl-item gallery_item">
                    <div class="gallery_select d-flex flex-column align-items-center justify-content-center"><div>+</div></div>
                    <a class="colorbox" href="{{asset('themes')}}/images/gallery_1.jpg"><img src="{{asset('themes')}}/images/gallery_1.jpg" alt=""></a>
                </div>
                <div class="owl-item gallery_item">
                    <div class="gallery_select d-flex flex-column align-items-center justify-content-center"><div>+</div></div>
                    <a class="colorbox" href="{{asset('themes')}}/images/gallery_2.jpg"><img src="{{asset('themes')}}/images/gallery_2.jpg" alt=""></a>
                </div>
                <div class="owl-item gallery_item">
                    <div class="gallery_select d-flex flex-column align-items-center justify-content-center"><div>+</div></div>
                    <a class="colorbox" href="{{asset('themes')}}/images/gallery_3.jpg"><img src="{{asset('themes')}}/images/gallery_3.jpg" alt=""></a>
                </div>
                <div class="owl-item gallery_item">
                    <div class="gallery_select d-flex flex-column align-items-center justify-content-center"><div>+</div></div>
                    <a class="colorbox" href="{{asset('themes')}}/images/gallery_4.jpg"><img src="{{asset('themes')}}/images/gallery_4.jpg" alt=""></a>
                </div>
                <div class="owl-item gallery_item">
                    <div class="gallery_select d-flex flex-column align-items-center justify-content-center"><div>+</div></div>
                    <a class="colorbox" href="{{asset('themes')}}/images/gallery_5.jpg"><img src="{{asset('themes')}}/images/gallery_5.jpg" alt=""></a>
                </div>
            </div>

        </div>

        <!-- Nav -->
        <div class="gallery_slider_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col clearfix">
                        <div class="gallery_slider_nav_content d-flex flex-row align-items-start justify-content-start">
                            <div class="gallery_slider_prev gallery_slider_nav"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                            <div class="gallery_slider_next gallery_slider_nav"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="newsletter_content">
                        <div class="section_title_container">
                            <div class="section_subtitle">luxury resort</div>
                            <div class="section_title"><h2>Our Newsletter</h2></div>
                        </div>
                        <div class="newsletter_text">
                            <p>Praesent fermentum ligula in dui imperdiet, vel tempus nulla ultricies. Phasellus at commodo ligula. Nullam molestie volutp at sapien.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="newsletter_form_container">
                        <form action="#" id="newsletter_form" class="newsletter_form">
                            <input type="email" class="newsletter_input" placeholder="Your e-mail" required="required">
                            <button class="newsletter_button"><span>Subscribe</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="newsletter_border_container"><div class="container"><div class="row border_row"><div class="col"><div class="newsetter_border"></div></div></div></div></div>
    </div>

@endsection