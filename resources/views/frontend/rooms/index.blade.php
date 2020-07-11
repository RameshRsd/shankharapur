@extends('frontend.layouts')
@section('body')
    <link rel="stylesheet" type="text/css" href="{{asset('public/themes/styles/rooms_custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/themes/styles/rooms_responsive.css')}}">
    <!-- Rooms -->
    <div class="room_sty bg-white-50">
        <!-- Image credit: https://unsplash.com/@christoph -->
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('public/themes/images/rooms.jpg')}}" data-speed="0.8"></div>
        <div class="home_content_deT">
            <div class="home_title">Choose a Room</div>
        </div>
    </div>
    <div class="rooms">
        <div class="container">
            <div class="row room_row">
                <!-- Room -->
                @foreach($rooms as $room)
                <div class="col-lg-4 room_col magic_up">
                    <div class="room">
                        <div class="room_image">
                            <a href="{{url('rooms'.'/'.$room->slug)}}">
                            @if(is_file(public_path('accommodations/photos'.'/'.$room->image)) && file_exists(public_path('accommodations/photos'.'/'.$room->image)))
                                <img src="{{asset('public/accommodations/photos'.'/'.$room->image)}}" alt="{{$info->name}}">
                            @else
                                <img src="{{asset('default/default.jpg')}}" alt="{{$info->name}}">
                            @endif
                            </a>
                        </div>
                        <div class="room_content text-center">
                            <div class="room_price">From @if($room->rate_type=='Rupees')NRs.@else$@endif {{number_format($room->rate)}} / <span>Night</span></div>
                            <div class="room_title"><a href="{{url('rooms'.'/'.$room->slug)}}">{{$room->name}}</a></div>
                            <div class="room_text">
                                @if(count($room->availableRooms)>0)
                                <span class="badge badge-success">{{count($room->availableRooms)}} Room Avialable</span>
                                @else
                                    <span class="badge badge-danger">All Room Booked</span>
                                @endif
                            </div>
                            <a href="{{url('rooms'.'/'.$room->slug)}}" class="button_container room_button"><div class="button text-center"><span>Book Now</span></div></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection