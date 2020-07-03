@extends('backend.admin.layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Cards -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> {{$heading}}
        </h2>
        <div class="row">
            @include('layouts.notification')
            <div class="col-sm-12">
                <div class="border p-2 bg-white">
                    <div class="button-section mb-2 text-right">
                        <a href="{{$previousPage}}" class="btn btn-danger pull-right"><i class="fa fa-backward"></i> Back</a>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Room Type <span class="text-danger">*</span></span>
                                            </div>
                                            <select name="room_type" id="room_type" class="form-control">
                                                <option value="">--Choose--</option>
                                                @if(request('room_id'))
                                                    @php
                                                        $roomValue = \App\Model\Room::find(request('room_id'));
                                                    @endphp
                                                    @foreach($roomTypes as $roomType)
                                                        <option value="{{$roomType->id}}" @if($roomValue->id==$roomValue->accommodation_id) selected @endif>{{$roomType->name}}</option>
                                                    @endforeach
                                                @else
                                                    @foreach($roomTypes as $roomType)
                                                        <option value="{{$roomType->id}}">{{$roomType->name}}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Room No <span class="text-danger">*</span></span>
                                            </div>
                                            <select name="room_id" id="room_id" class="form-control">
                                                @if(request('room_id'))
                                                    @php
                                                        $roomValue = \App\Model\Room::find(request('room_id'));
                                                    @endphp
                                                    <option value="{{$roomValue->id}}" selected>{{$roomValue->room_no}}</option>
                                                @endif
                                                <option value="">--Choose--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Choose Guest<span class="text-danger">*</span></span>
                                            </div>
                                            <select name="guest_id" id="guest_id" class="js-select2 form-control">
                                                <option value="">--Choose--</option>
                                                @foreach($guests as $guest)
                                                    <option value="{{$guest->id}}" @if(old('guest_id')==$guest->id) selected @endif>{{$guest->first_name}} {{$guest->middle_name}} {{$guest->last_name}} (ID: {{$guest->id_no}} | Mob: {{$guest->mobile1}}) </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="badge badge-light">Not Found? <a class="badge badge-info" href="{{url('admin/guest-manage/add-guest')}}" target="_blank">Add Guest</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Arrival Date <span class="text-danger">*</span></span>
                                    </div>
                                    <input type="text" name="checked_in_date" value="{{old('checked_in_date')}}" class="js-flatpickr form-control" required>
                                </div>
                            </div>
                            {{--<div class="col-sm-4 form-group">--}}
                                {{--<div class="input-group">--}}
                                    {{--<div class="input-group-prepend">--}}
                                        {{--<span class="input-group-text" id="inputGroup-sizing-default">Departure Date <span class="text-danger">*</span></span>--}}
                                    {{--</div>--}}
                                    {{--<input type="text" name="checked_out_date" value="{{old('checked_out_date')}}" class="js-flatpickr form-control" required>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Total Person <span class="text-danger">*</span></span>
                                    </div>
                                    <input type="number" id="numbers" name="numbers" value="{{old('numbers')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Rate <span class="text-danger">*</span></span>
                                    </div>
                                    <select name="RoomRateType" id="RoomRateType" class="form-control">
                                        <option value="same" @if(old('RoomRateType')=='same') selected @endif>Same as Room Rate</option>
                                        <option value="different" @if(old('RoomRateType')=='different') selected @endif>Custom Rate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8" id="rate_area" @if(old('RoomRateType')=='different') @else style="display: none;" @endif>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Rate <span class="text-danger">*</span></span>
                                            </div>
                                            <input type="text" name="rate" id="rate" value="{{old('rate')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Rate Type</span>
                                            </div>
                                            <select name="rate_type" id="rate_type" class="form-control">
                                                <option value="Rupees" @if(old('rate_type')=='Rupees') selected @endif>Rupees</option>
                                                <option value="Dollor" @if(old('rate_type')=='Dollor') selected @endif>Dollor</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Checked In Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- END Cards -->
    </div>
    <!-- END Page Content -->

@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('')}}assets/js/plugins/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/js/plugins/select2/css/select2.min.css">
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#RoomRateType').on('change', function() {
                if ( this.value == 'different')
                {
                    $("#rate_area").show();
                }
                else
                {
                    $("#rate_area").hide();
                }
            });
        });
    </script>
    <script src="{{asset('')}}assets/js/plugins/flatpickr/flatpickr.min.js"></script>
    <script src="{{asset('')}}assets/js/plugins/select2/js/select2.full.min.js"></script>


    <script>jQuery(function(){ Dashmix.helpers(['flatpickr','select2']); });</script>
    <script>
        $('#room_type').on('change', function(e){
            console.log(e);
            var room_type = e.target.value;
            $.get('{{url('')}}/getRoom?room_type=' + room_type,function(data) {
                console.log(data);
                $('#room_id').empty();
                $('#room_id').append('<option value="0" disable="true" selected="true">--Choose--</option>');

                $.each(data, function(index, room){
                    $('#room_id').append('<option value="'+ room.id +'">'+ room.room_no +'</option>');
                })
            });
        });
    </script>

@endsection