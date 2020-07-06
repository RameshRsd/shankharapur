@extends('frontend.layouts')
@section('body')
    <link rel="stylesheet" type="text/css" href="{{asset('public/themes/styles/rooms_custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/themes/styles/rooms_responsive.css')}}">
    <!-- Rooms -->
    <div class="room_sty  bg-white-50">
        <!-- Image credit: https://unsplash.com/@christoph -->
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('public/themes/images/rooms.jpg')}}" data-speed="0.8"></div>
        <div class="home_content_deT">
            <div class="home_title text-danger">{{$heading}}</div>
        </div>
    </div>
    <!-- Contact -->
    <div class="contact">
        <div class="container">
            <div class="row">

                <!-- Contact Content -->
                <div class="col-lg-4">
                    <div class="contact_content">
                        <div class="contact_info">
                            <ul>
                                <li><i class="fa fa-map"></i> <span>Shankharapur, Kathmandu, Nepal</span></li>
                                <li><i class="fa fa-phone"></i> <span>+977-1-XXXXXX1 +977-1-XXXXXX2</span></li>
                                <li><i class="fa fa-phone-square"></i> <span>+977-XXXXXXXXX1</span></li>
                                <li><i class="fa fa-envelope"></i> <span>info@hotelshankharapur.com</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-8">
                    <div class="contact_form_container">
                        <span class="text-danger font-size-base">Page under construction</span>
                        <hr>
                        <form action="#" id="contact_form" class="contact_form clearfix">
                            <div>
                                <input type="text" class="contact_input" placeholder="Your Name" required="required">
                            </div>
                            <div><input type="email" class="contact_input" placeholder="Your E-mail" required="required"></div>
                            <input type="text" class="contact_input" placeholder="Subject">
                            <textarea class="contact_input contact_textarea" placeholder="Message" required="required"></textarea>
                            <button class="contact_button"><span>Submit</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map -->

    <div class="contact_map">
        <!-- Google Map -->
        <div class="map">
            <div id="google_map" class="google_map">
                <div class="map_container">
                    <div id="map">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection