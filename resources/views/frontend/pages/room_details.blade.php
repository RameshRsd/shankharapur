@extends('frontend.layouts')
@section('body')
    <link rel="stylesheet" type="text/css" href="{{asset('public/themes/styles/rooms_custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/themes/styles/rooms_responsive.css')}}">
    <!-- Rooms -->
    <div class="room_sty">
        <!-- Image credit: https://unsplash.com/@christoph -->
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('public/themes/images/rooms.jpg')}}" data-speed="0.8"></div>
        <div class="home_content_deT">
            <div class="home_subtitle">luxury resort</div>
            <div class="home_title">Choose a Room</div>
        </div>
    </div>
    <div class="rooms">
        <div class="container">
            <div class="row room_row">
                <!-- Room -->
                <div class="col-lg-8 room_col magic_up">
                    <div class="room">
                        <div class="room_image"><img src="{{asset('public/themes/images/room_1.jpg')}}" alt="https://unsplash.com/@jonathan_percy"></div>
                        <div class="room_content text-center">
                            <div class="room_price">From $90 / <span>Night</span></div>
                            <div class="room_type">double</div>
                            <div class="room_title"><a href="{{url('room-details')}}">Deluxe Suite</a></div>
                            <div class="room_text">
                                <p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
                            </div>
                            <a href="{{url('room-details')}}" class="button_container room_button"><div class="button text-center"><span>Book Now</span></div></a>
                        </div>
                    </div>
                </div>

                <!-- Room -->
                <div class="col-lg-4 room_col magic_up">
                    <div class="room">
                        <div class="room_image"><img src="{{asset('public/themes/images/room_2.jpg')}}" alt="https://unsplash.com/@ultralinx"></div>
                        <div class="room_content text-center">
                            <div class="room_price">From $90 / <span>Night</span></div>
                            <div class="room_type">single</div>
                            <div class="room_title"><a href="{{url('room-details')}}">Luxury Suite</a></div>
                            <div class="room_text">
                                <p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
                            </div>
                            <a href="{{url('room-details')}}" class="button_container room_button"><div class="button text-center"><span>Book Now</span></div></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection