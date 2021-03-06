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
                                                @foreach($roomTypes as $roomType)
                                                    <option value="{{$roomType->id}}" @if($room->accommodation->id==$roomType->id) selected @endif>{{$roomType->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Room No <span class="text-danger">*</span></span>
                                            </div>
                                            <select name="room_section" id="room_section" class="form-control">
                                                <option value="">--Choose--</option>
                                                @foreach($rooms as $roomValue)
                                                    @if($roomValue->room_status=='CheckedOut' || $roomValue->id==$room->id)
                                                    <option value="{{$roomValue->id}}" @if($roomBook->room_id==$roomValue->id) selected @endif>{{$roomValue->room_no}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--<div class="col-sm-4 form-group">--}}
                                        {{--<div class="input-group">--}}
                                            {{--<div class="input-group-prepend">--}}
                                                {{--<span class="input-group-text" id="inputGroup-sizing-default">Room Status <span class="text-danger">*</span></span>--}}
                                            {{--</div>--}}
                                            {{--<select name="status" id="status" class="form-control">--}}
                                                {{--<option value="">--Choose--</option>--}}
                                                {{--<option value="pending" @if($roomBook->status=='pending') selected @endif>Pending</option>--}}
                                                {{--<option value="approved" @if($roomBook->status=='approved') selected @endif>Approved</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-sm-4 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Guest Type <span class="text-danger">*</span></span>
                                            </div>
                                            <select name="type" id="type" class="form-control">
                                                <option value="">--Choose--</option>
                                                <option value="internal" @if($roomBook->type=='internal') selected @endif>Already Exist</option>
                                                <option value="external" @if($roomBook->type=='external') selected @endif>New</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 form-group" id="guest_area" @if($roomBook->type=='external') @else style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Booking By <span class="text-danger">*</span></span>
                                                    </div>
                                                    <input title="text" name="full_name" class="form-control" value="{{$roomBook->full_name}}" placeholder="Full Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Mobile No. <span class="text-danger">*</span></span>
                                                    </div>
                                                    <input title="text" name="mobile" class="form-control" value="{{$roomBook->mobile}}" placeholder="Mobile Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 form-group" id="exist_guest_area" @if($roomBook->type=='internal') @else style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Choose Guest <span class="text-danger">*</span></span>
                                                    </div>
                                                    <select name="guest_id" id="guest_id" class="form-control">
                                                        <option value="">--Choose--</option>
                                                        @foreach($guests as $guest)
                                                            <option value="{{$guest->id}}" @if($roomBook->guest_id==$guest->id) selected @endif>{{$guest->first_name}} {{$guest->middle_name}} {{$guest->last_name}} (ID: {{$guest->id_no}} | Mob: {{$guest->mobile1}}) </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Arrival Date <span class="text-danger">*</span></span>
                                    </div>
                                    <input type="text" name="check_in_date" value="{{$roomBook->check_in_date}}" class="js-flatpickr form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Departure Date</span>
                                    </div>
                                    <input type="text" name="check_out_date" value="{{$roomBook->check_out_date}}" class="js-flatpickr form-control">
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">No of Rooms <span class="text-danger">*</span></span>
                                    </div>
                                    <input type="number" name="number_of_room" value="{{$roomBook->number_of_room}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">No of Child <span class="text-danger">*</span></span>
                                    </div>
                                    @if($roomBook->child_numbers)
                                        @php
                                            $chilNo = $roomBook->child_numbers;
                                        @endphp
                                    @else
                                        @php
                                            $chilNo = 0;
                                        @endphp
                                    @endif
                                    <input type="number" id="child" name="child_numbers" value="{{$chilNo}}" class="form-control" onkeyup="sum();">
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">No of Adult <span class="text-danger">*</span></span>
                                    </div>
                                    @if($roomBook->adult_numbers)
                                        @php
                                            $adult = $roomBook->adult_numbers;
                                        @endphp
                                    @else
                                        @php
                                            $adult = 0;
                                        @endphp
                                    @endif
                                    <input type="number" id="adult" name="adult_numbers" value="{{$adult}}" class="form-control" onkeyup="sum();">
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Total</span>
                                    </div>
                                    <input type="number" id="totalNo" name="total_number" value="{{$chilNo+$adult}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Now</button>
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

    <script>
        $(document).ready(function(){
            $('#type').on('change', function() {
                if ( this.value == 'external')
                {
                    $("#guest_area").show();
                    $("#exist_guest_area").hide();
                }
                if ( this.value == 'internal')
                {
                    $("#exist_guest_area").show();
                    $("#guest_area").hide();
                }
                if ( this.value == '')
                {
                    $("#exist_guest_area").hide();
                    $("#guest_area").hide();
                }
            });
        });
    </script>
    <script src="{{asset('')}}assets/js/plugins/flatpickr/flatpickr.min.js"></script>
    <script>jQuery(function(){ Dashmix.helpers(['flatpickr']); });</script>
    <script>
        $('#room_type').on('change', function(e){
            console.log(e);
            var room_type = e.target.value;
            $.get('{{url('')}}/getRoom?room_type=' + room_type,function(data) {
                console.log(data);
                $('#room_section').empty();
                $('#room_section').append('<option value="0" disable="true" selected="true">--Choose--</option>');

                $.each(data, function(index, room){
                    $('#room_section').append('<option value="'+ room.id +'">'+ room.room_no +'</option>');
                })
            });
        });
    </script>

@endsection