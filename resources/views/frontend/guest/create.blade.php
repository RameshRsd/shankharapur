@extends('frontend.layouts')
@section('body')
    <link rel="stylesheet" type="text/css" href="{{asset('public/themes/styles/rooms_custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/themes/styles/rooms_responsive.css')}}">
    <!-- Rooms -->
    <div class="room_sty bg-white-50">
        <!-- Image credit: https://unsplash.com/@christoph -->
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('public/themes/images/rooms.jpg')}}" data-speed="0.8"></div>
        <div class="home_content_deT">
            <div class="home_subtitle">{{$info->name}}</div>
            <div class="home_title text-dark">{{$heading}}</div>
        </div>
    </div>
    <div class="rooms">
        <div class="container">
            <div class="row room_row">
                <!-- Room -->
                @include('layouts.notification')
                <div class="col-lg-12 room_col magic_up">
                    <div class="room">

                        <div class="room_content text-center">
                            <div class="font-weight-bold"><h5>{{$heading}}</h5>
                                <hr>
                            </div>
                            <div class="room_text">
                                <form action="" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="row">
                                                <div  style="width: 50%; margin: 0 auto;">
                                                    <table>
                                                        <tr class="text-center">
                                                            <th class="text-center">
                                                                <div class="text-center mb-2 p2 bg-white">
                                                                    <img class="img-avatar img-avatar-thumb bg-white" id="photoDisplay" src="{{asset('default/avatar.jpg')}}" alt="">
                                                                </div>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                Choose Photo
                                                            </span>
                                                                    </div>
                                                                    <input type="file" onchange="photoURL(this);" class="form-control" id="example-group1-input1" name="photo">
                                                                </div>

                                                            </th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <div class="form-wrapp p-2 mb-2" style="border: 1px solid rebeccapurple;">
                                                <span class="font-weight-bold font-size-h5" style="border-bottom: 1px solid rebeccapurple;">Contact Details</span>

                                                <div class="row mt-2">
                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">State <span class="text-danger">*</span></span>
                                                            </div>
                                                            <select name="state_id" id="state_id" class="form-control">
                                                                <option value="">--Choose--</option>
                                                                @foreach($states as $state)
                                                                    <option value="{{$state->id}}" @if(old('state_id')==$state->id) selected @endif>{{$state->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">District <span class="text-danger">*</span></span>
                                                            </div>
                                                            <select name="district_id" id="district_id" class="form-control">
                                                                <option value="">--Choose--</option>
                                                                @if(old('state_id') && old('district_id'))
                                                                    @php
                                                                        $state = \App\Model\State::find(old('state_id'));
                                                                        $districts = $state->districts;
                                                                    @endphp
                                                                    @foreach($districts as $district)
                                                                        <option value="{{$district->id}}" @if(old('district_id')==$district->id) selected @endif>{{$district->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">City</span>
                                                            </div>
                                                            <select name="city_id" id="city_id" class="form-control">
                                                                <option value="">--Choose--</option>
                                                                @if(old('city_id') && old('district_id'))
                                                                    @php
                                                                        $district = \App\Model\District::find(old('district_id'));
                                                                        $cities = $district->cities;
                                                                    @endphp
                                                                    @foreach($cities as $city)
                                                                        <option value="{{$city->id}}" @if(old('city_id')==$city->id) selected @endif>{{$city->name}} {{$city->type}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Tole</span>
                                                            </div>
                                                            <input type="text" name="tole" value="{{old('tole')}}" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Ward No.</span>
                                                            </div>
                                                            <input type="number" name="ward_no" value="{{old('ward_no')}}" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Mobile No. <span class="text-danger">*</span></span>
                                                            </div>
                                                            <input type="number" name="mobile1" value="{{old('mobile1')}}" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Mobile No.</span>
                                                            </div>
                                                            <input type="number" name="mobile2" value="{{old('mobile2')}}" class="form-control" placeholder="(Optional)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 form-group">
                                            <div class="form-wrapp p-2 mb-2" style="border: 1px solid rebeccapurple;">
                                                <span class="font-weight-bold font-size-h5" style="border-bottom: 1px solid rebeccapurple;">Personal Details</span>

                                                <div class="row mt-2">
                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">First Name <span class="text-danger">*</span></span>
                                                            </div>
                                                            <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Middle Name</span>
                                                            </div>
                                                            <input type="text" name="middle_name" value="{{old('middle_name')}}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Last Name <span class="text-danger">*</span></span>
                                                            </div>
                                                            <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Father Name</span>
                                                            </div>
                                                            <input type="text" name="father_name" value="{{old('father_name')}}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">ID No. <span class="text-danger">*</span></span>
                                                            </div>
                                                            <input type="text" name="id_no" value="{{old('id_no')}}" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">ID Type <span class="text-danger">*</span></span>
                                                            </div>
                                                            <select name="id_type" id="id_type" class="form-control">
                                                                <option value="Citizenship" @if(old('id_type')=='Citizenship') selected @endif>Citizenship</option>
                                                                <option value="Driving" @if(old('id_type')=='Driving') selected @endif>Driving License</option>
                                                                <option value="Pan-Card" @if(old('id_type')=='Pan-Card') selected @endif>Pan-Card</option>
                                                                <option value="Passport" @if(old('id_type')=='Passport') selected @endif>Passport</option>
                                                                <option value="Voter-Card" @if(old('id_type')=='Voter-Card') selected @endif>Voter-Card</option>
                                                                <option value="Vehicle-No" @if(old('id_type')=='Vehicle-No') selected @endif>Vehicle-No</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 form-group">
                                                        <div class="form-wrapp p-2 mb-2" style="border: 1px solid cornflowerblue; background-color:lightgoldenrodyellow;">
                                                            <span class="font-weight-bold font-size-h5" style="border-bottom: 1px solid rebeccapurple; ">Login Details</span>
                                                            <div class="row mt-2">
                                                                <div class="col-sm-4 form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroup-sizing-default">Email ID <span class="text-danger">*</span></span>
                                                                        </div>
                                                                        <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Valid Email Address" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroup-sizing-default">Password <span class="text-danger">*</span></span>
                                                                        </div>
                                                                        <input type="password" name="password" value="{{null}}" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroup-sizing-default">Password Confirm <span class="text-danger">*</span></span>
                                                                        </div>
                                                                        <input type="password" name="password_confirmation" value="{{null}}" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 form-group">
                                                        <div class="form-wrapp p-2 mb-2" style="border: 1px solid cornflowerblue; background-color: lightgrey;">
                                                            <span class="font-weight-bold font-size-h5" style="border-bottom: 1px solid rebeccapurple; ">Social Link</span>
                                                            <div class="row mt-2">
                                                                <div class="col-sm-4 form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroup-sizing-default">Facebook Link.</span>
                                                                        </div>
                                                                        <input type="url" name="facebook_link" value="{{old('facebook_link')}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroup-sizing-default">Twitter Link.</span>
                                                                        </div>
                                                                        <input type="url" name="twitter_link" value="{{old('twitter_link')}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroup-sizing-default">Instagram Link.</span>
                                                                        </div>
                                                                        <input type="url" name="instagram_link" value="{{old('instagram_link')}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            @if(request('redirectTo'))
                                                <input type="hidden" name="redirectTo" value="{{$redirectTo}}">
                                                <a href="{{$redirectTo}}" class="btn btn-danger"><i class="fa fa-backward"></i> Back</a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Room -->
                {{--<div class="col-lg-4 room_col magic_up">--}}
                    {{--<div class="room">--}}
                        {{--<ul class="list-group">--}}
                            {{--<li class="list-group-item text-danger font-weight-bold"><i class="fa fa-heart"></i> You May Like</li>--}}
                            {{--@foreach($rooms as $accom)--}}
                                {{--<li class="list-group-item">--}}
                                    {{--<div class="card" style="max-width: 540px;">--}}
                                        {{--<a href="{{url('rooms'.'/'.$accom->slug)}}">--}}
                                            {{--<div class="row no-gutters">--}}
                                                {{--<div class="col-md-4">--}}
                                                    {{--@if(is_file(public_path('accommodations/photos'.'/'.$accom->image)) && file_exists(public_path('accommodations/photos'.'/'.$accom->image)))--}}
                                                        {{--<img src="{{asset('public/accommodations/photos'.'/'.$accom->image)}}" alt="{{$info->name}}">--}}
                                                    {{--@else--}}
                                                        {{--<img src="{{asset('default/default.jpg')}}" alt="{{$info->name}}">--}}
                                                    {{--@endif--}}
                                                {{--</div>--}}
                                                {{--<div class="col-md-8">--}}
                                                    {{--<div class="card-body p-0 pt-2 pl-2">--}}
                                                        {{--{{$accom->name}}<br>--}}
                                                        {{--@if(count($accom->availableRooms)>0)--}}
                                                            {{--<span class="badge badge-success">{{count($accom->availableRooms)}} Room Avialable</span>--}}
                                                        {{--@else--}}
                                                            {{--<span class="badge badge-danger">All Room Booked</span>--}}
                                                        {{--@endif--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        function photoURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photoDisplay')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        $('#state_id').on('change', function(e){
            console.log(e);
            var state_id = e.target.value;
            $.get('{{url('')}}/get_district?state_id=' + state_id,function(data) {
                console.log(data);
                $('#district_id').empty();
                $('#city_id').empty();
                $('#district_id').append('<option value="0" disable="true" selected="true">--Choose--</option>');

                $.each(data, function(index, district){
                    $('#district_id').append('<option value="'+ district.id +'">'+ district.name +'</option>');
                })
            });
        });
    </script>

    <script>
        $('#district_id').on('change', function(e){
            console.log(e);
            var district_id = e.target.value;
            $.get('{{url('')}}/get_city?district_id=' + district_id,function(data) {
                console.log(data);
                $('#city_id').empty();
                $('#city_id').append('<option value="0" disable="true" selected="true">--Choose--</option>');

                $.each(data, function(index, city){
                    $('#city_id').append('<option value="'+ city.id +'">'+ city.name +' '+ city.type +' </option>');
                })
            });
        });
    </script>

@endsection