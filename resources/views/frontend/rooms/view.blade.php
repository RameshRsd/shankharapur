@extends('frontend.layouts')
@section('body')
    <link rel="stylesheet" type="text/css" href="{{asset('public/themes/styles/rooms_custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/themes/styles/rooms_responsive.css')}}">
    <!-- Rooms -->
    <div class="room_sty bg-white-50">
    <!-- Image credit: https://unsplash.com/@christoph -->
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('public/themes/images/rooms.jpg')}}" data-speed="0.8"></div>
        <div class="home_content_deT">
            <div class="home_title text-danger">{{$room->name}}</div>
        </div>
    </div>
    <div class="rooms">
        <div class="container">
            <div class="row room_row">
                <!-- Room -->
                @include('layouts.notification')
                <div class="col-lg-8 room_col magic_up">
                    <div class="room">
                        <div class="room_image">
                            @if(is_file(public_path('accommodations/photos'.'/'.$room->image)) && file_exists(public_path('accommodations/photos'.'/'.$room->image)))
                                <img src="{{asset('public/accommodations/photos'.'/'.$room->image)}}" alt="{{$info->name}}">
                            @else
                                <img src="{{asset('default/default.jpg')}}" alt="{{$info->name}}">
                            @endif
                        </div>
                        <div class="room_content text-center">
                            <div class="room_price">@if($room->rate_type=='Rupees')NRs.@else$@endif {{number_format($room->rate)}} / <span>Night</span></div>
                            <div class="font-weight-bold"><h4>{{$room->name}}</h4></div>
                            <div class="room_text">
                                {!! $room->details !!}
                                <hr>
                                <table class="table">
                                    <tr>
                                        <th colspan="3">Rooms Featurs:</th>
                                    </tr>
                                    @if(count($room->rooms)>0)
                                        @foreach($room->rooms as $key=>$foundRoom)
                                                <tr>
                                                    <th class="text-center">
                                                        {{$foundRoom->accommodation->name}}: <span class="badge badge-light">{{$foundRoom->room_no}}</span>
                                                    </th>
                                                    <td class="text-left">
                                                        @if(count($foundRoom->features)>0)
                                                            @foreach($foundRoom->features as $feature)
                                                            <span class="badge badge-info mr-1">{{$feature->name}}</span>
                                                            @endforeach
                                                        @else
                                                            <i class="text-warning">Features Not Found !</i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($foundRoom->room_status=='CheckedOut')
                                                            <a href="{{url()->current().'/'.$foundRoom->id.'/book'}}" class="btn btn-primary btn-sm">Book Now</a>
                                                        @else
                                                            <a href="javascript:void(0)" class="btn btn-warning btn-sm">Not Available</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="text-warning">Room not found in {{$room->name}}</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                            {{--<a href="{{url()->current().'/book'}}" class="button_container room_button"><div class="button text-center"><span>Book Now</span></div></a>--}}
                        </div>
                    </div>
                </div>

                <!-- Room -->
                <div class="col-lg-4 room_col magic_up">
                    <div class="room">
                        <ul class="list-group">
                            <li class="list-group-item text-danger font-weight-bold"><i class="fa fa-heart"></i> You May Like</li>
                            @foreach($rooms as $accom)
                            <li class="list-group-item">
                                <div class="card" style="max-width: 540px;">
                                    <a href="{{url('rooms'.'/'.$accom->slug)}}">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            @if(is_file(public_path('accommodations/photos'.'/'.$accom->image)) && file_exists(public_path('accommodations/photos'.'/'.$accom->image)))
                                                <img src="{{asset('public/accommodations/photos'.'/'.$accom->image)}}" alt="{{$info->name}}">
                                            @else
                                                <img src="{{asset('default/default.jpg')}}" alt="{{$info->name}}">
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body p-0 pt-2 pl-2">
                                                {{$accom->name}}<br>
                                                @if(count($accom->availableRooms)>0)
                                                    <span class="badge badge-success">{{count($accom->availableRooms)}} Room Avialable</span>
                                                @else
                                                    <span class="badge badge-danger">All Room Booked</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection