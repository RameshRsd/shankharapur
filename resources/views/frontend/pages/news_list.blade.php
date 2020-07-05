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
            <div class="home_title">Latest News & Blog</div>
        </div>
    </div>
    <div class="rooms">
        <div class="container">
            <div class="row room_row">
                <!-- News -->
                <div class="col-lg-4 news_col magic_up">
                    <div class="room">
                        <div class="news_image"><img src="{{asset('public/themes/images/room_1.jpg')}}" alt=""></div>
                        <div class="news_content text-center">
                            <div class="news_title"><a href="{{url('#')}}">A new Swimming Pool</a></div>
                            <div class="news_text">
                                <p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
                            </div>
                            <a href="#" class="button_container room_button"><div class="button text-center"><span>Read More</span></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 news_col magic_up">
                    <div class="room">
                        <div class="news_image"><img src="{{asset('public/themes/images/room_1.jpg')}}" alt=""></div>
                        <div class="news_content text-center">
                            <div class="news_title"><a href="{{url('#')}}">A new Swimming Pool</a></div>
                            <div class="news_text">
                                <p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
                            </div>
                            <a href="#" class="button_container room_button"><div class="button text-center"><span>Read More</span></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 news_col magic_up">
                    <div class="room">
                        <div class="news_image"><img src="{{asset('public/themes/images/room_1.jpg')}}" alt=""></div>
                        <div class="news_content text-center">
                            <div class="news_title"><a href="{{url('#')}}">A new Swimming Pool</a></div>
                            <div class="news_text">
                                <p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
                            </div>
                            <a href="#" class="button_container room_button"><div class="button text-center"><span>Read More</span></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 news_col magic_up">
                    <div class="room">
                        <div class="news_image"><img src="{{asset('public/themes/images/room_1.jpg')}}" alt=""></div>
                        <div class="news_content text-center">
                            <div class="news_title"><a href="{{url('#')}}">A new Swimming Pool</a></div>
                            <div class="news_text">
                                <p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
                            </div>
                            <a href="#" class="button_container room_button"><div class="button text-center"><span>Read More</span></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 news_col magic_up">
                    <div class="room">
                        <div class="news_image"><img src="{{asset('public/themes/images/room_1.jpg')}}" alt=""></div>
                        <div class="news_content text-center">
                            <div class="news_title"><a href="{{url('#')}}">A new Swimming Pool</a></div>
                            <div class="news_text">
                                <p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
                            </div>
                            <a href="#" class="button_container room_button"><div class="button text-center"><span>Read More</span></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 news_col magic_up">
                    <div class="room">
                        <div class="news_image"><img src="{{asset('public/themes/images/room_1.jpg')}}" alt=""></div>
                        <div class="news_content text-center">
                            <div class="news_title"><a href="{{url('#')}}">A new Swimming Pool</a></div>
                            <div class="news_text">
                                <p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
                            </div>
                            <a href="#" class="button_container room_button"><div class="button text-center"><span>Read More</span></div></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection