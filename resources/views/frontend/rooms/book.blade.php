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
                <div class="col-lg-5 room_col magic_up">
                    <div class="room">
                        <div class="room_image">
                            @if(is_file(public_path('rooms/photos'.'/'.$room->image)) && file_exists(public_path('rooms/photos'.'/'.$room->image)))
                                <img src="{{asset('public/rooms/photos'.'/'.$room->image)}}" alt="{{$info->name}}">
                            @else
                                <img src="{{asset('default/default.jpg')}}" alt="{{$info->name}}">
                            @endif
                        </div>
                        <div class="room_content text-center">
                            <div class="room_price">@if($room->rate_type=='Rupees')NRs.@else$@endif {{number_format($room->rate)}} / <span>Night</span></div>
                            <div class="font-weight-bold"><h4>Room No.: {{$room->room_no}} | {{$accomodation->name}}</h4></div>
                            <div class="room_text">
                                {!! $room->details !!}
                                <hr>
                                @if(isset($accomodation->details))
                                    <span class="font-weight-bold">About Accommodation</span><br>
                                    {!! $accomodation->details !!}
                                @endif
                                <hr>
                                @if(count($room->features)>0)
                                    @foreach($room->features as $feature)
                                    <span class="badge badge-info mr-1">{{$feature->name}}</span>
                                    @endforeach
                                @else
                                    <i class="text-warning">Features Not Found !</i>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Room -->
                <div class="col-lg-7 room_col magic_up">
                    <div class="">
                        <h4 class="p-2 font-size-base bg-light text-dark text-center">Book Now
                            <a href="{{url('sign-up'.'?redirectTo='.'rooms'.'/'.$accomodation->slug.'/'.$room->id.'/book')}}" class="btn btn-danger btn-sm pull-right push"><i class="fa fa-user-plus"></i> Sign Up</a>
                        </h4>
                        <form action="" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label class="font-weight-bold text-dark">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="full_name" class="form-control" value="{{old('full_name')}}" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="font-weight-bold text-dark">Mobile No. <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control" value="{{old('mobile')}}" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="font-weight-bold text-dark">Arrival Date <span class="text-danger">*</span><small class="badge badge-light">(YYYY-MM-DD)</small></label>
                                    <input type="text" name="check_in_date" class="form-control" value="{{old('check_in_date')}}" placeholder="2020-01-25" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="font-weight-bold text-dark">Departure Date <span class="text-danger">*</span><small class="badge badge-light">(YYYY-MM-DD)</small></label>
                                    <input type="text" name="check_out_date" class="form-control" value="{{old('check_out_date')}}"  placeholder="2020-01-25"  required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label class="font-weight-bold text-dark">Child <span class="text-danger">*</span></label>
                                    <input type="number" name="child_numbers" id="child" class="form-control" onkeyup="sum();" value="{{old('child_numbers')}}" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label class="font-weight-bold text-dark">Adults <span class="text-danger">*</span></label>
                                    <input type="number" name="adult_numbers" id="adult" class="form-control" onkeyup="sum();" value="{{old('adult_numbers')}}" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label class="font-weight-bold text-dark">Total</label>
                                    <input type="number" name="total" id="totalNo" class="form-control" value="{{old('total')}}" required>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <button type="submit" class="button_container room_button button text-center text-white">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
@endsection
@section('script')
    <script type="text/javascript">
        function sum() {
            var txtFirstNumberValue = document.getElementById('child').value;
            var txtSecondNumberValue = document.getElementById('adult').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('totalNo').value = result;
            }
        }

    </script>


@endsection