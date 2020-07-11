@extends('frontend.layouts')
@section('body')
    <link rel="stylesheet" type="text/css" href="{{asset('public/themes/styles/rooms_custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/themes/styles/rooms_responsive.css')}}">
    <!-- Rooms -->
    <div class="room_sty bg-white-50">
        <!-- Image credit: https://unsplash.com/@christoph -->
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('public/themes/images/rooms.jpg')}}" data-speed="0.8"></div>
        <div class="home_content_deT">
            <div class="home_title">{{$heading}}</div>
        </div>
    </div>
    <!-- Intro -->

    <div class="intro">
        <div class="container">
            <div class="row">
                <!-- Intro Content -->
                <div class="col-lg-5 intro_col">
                    <div class="intro_container d-flex flex-column align-items-start justify-content-center magic_up">
                        <div class="intro_content">
                            <div class="section_title_container">
                                <div class="section_subtitle">{{$info->name}}</div>
                                {{--<div class="section_title"><h2>About Us</h2></div>--}}
                            </div>
                            <div class="intro_text">
                                {!! $info->description !!}
                            </div>
                            <div class="intro_link"><a href="{{url('rooms')}}">View Rooms</a></div>
                            {{--<a href="#" class="button_container intro_button"><div class="button text-center"><span>Book Your Stay</span></div></a>--}}
                        </div>
                    </div>
                </div>
                <!-- Intro Image -->
                <div class="col-lg-7 intro_col">
                    <div class="intro_image magic_up">
                        <img src="{{asset('public/themes/images/about_intro.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Milestones -->

    <div class="milestones">
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('public/themes/images/milestones.jpg')}}" data-speed="0.8"></div>
        <div class="milestones_background_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="milestones_title"><h2>Some Fun Facts About Us</h2></div>
                    {{--<div class="milestones_text">--}}
                        {{--<p>Praesent fermentum ligula in dui imperdiet, vel tempus nulla ultricies. Phasellus at commodo ligula. Nullam molestie volutpat sapien, a dignissim tortor laoreet quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="row milestones_row">

                <!-- Milestone -->
                <div class="col-lg-3 col-md-6 milestone_col">
                    <div class="milestone d-flex flex-row align-items-center justify-content-md-center justify-content-start">
                        <div class="milestone_content">
                            <div class="milestone_counter" data-end-value="25">{{$accoms}}</div>
                            <div class="milestone_text">Suites</div>
                        </div>
                    </div>
                </div>

                <!-- Milestone -->
                <div class="col-lg-3 col-md-6 milestone_col">
                    <div class="milestone d-flex flex-row align-items-center justify-content-md-center justify-content-start">
                        <div class="milestone_content">
                            <div class="milestone_counter" data-end-value="80">{{$rooms}}</div>
                            <div class="milestone_text">Rooms</div>
                        </div>
                    </div>
                </div>

                <!-- Milestone -->
                <div class="col-lg-3 col-md-6 milestone_col">
                    <div class="milestone d-flex flex-row align-items-center justify-content-md-center justify-content-start">
                        <div class="milestone_content">
                            <div class="milestone_counter" data-end-value="3">2</div>
                            <div class="milestone_text">Pools</div>
                        </div>
                    </div>
                </div>

                <!-- Milestone -->
                <div class="col-lg-3 col-md-6 milestone_col">
                    <div class="milestone d-flex flex-row align-items-center justify-content-md-center justify-content-start">
                        <div class="milestone_content">
                            <div class="milestone_counter" data-end-value="52">15</div>
                            <div class="milestone_text">Employees</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="newsletter_content">
                        <div class="section_title_container">
                            <div class="section_subtitle">{{$info->name}}</div>
                            <div class="section_title"><h2>Our Newsletter</h2></div>
                        </div>
                        <div class="newsletter_text">
                            <p>Subscribe newsletter for new updates about us</p>
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

@section('script')
    <script src="{{asset('public/themes/js/about.js')}}"></script>
    @endsection