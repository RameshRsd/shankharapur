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
                    <div id="map"></div>
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