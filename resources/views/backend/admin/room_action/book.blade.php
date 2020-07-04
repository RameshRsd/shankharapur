@extends('backend.admin.layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Cards -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Room No.: {{$pageHead}} <span class="badge badge-light">Booking</span>
        </h2>
        <div class="row">
            @include('layouts.notification')

            <div class="col-sm-12">
                <div class="border p-2 bg-white">
                    <div class="button-section mb-2 text-right">
                        <a href="{{url('admin')}}" class="btn btn-danger pull-right"><i class="fa fa-backward"></i> Back</a>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Guest Type <span class="text-danger">*</span></span>
                                            </div>
                                            <select name="type" id="type" class="form-control">
                                                <option value="">--Choose--</option>
                                                <option value="internal" @if(old('type')=='internal') selected @endif>Already Exist</option>
                                                <option value="external" @if(old('type')=='external') selected @endif>New</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 form-group" id="guest_area" @if(old('type')=='external') @else style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Booking By <span class="text-danger">*</span></span>
                                                    </div>
                                                    <input title="text" name="full_name" class="form-control" value="{{old('full_name')}}" placeholder="Full Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Mobile No. <span class="text-danger">*</span></span>
                                                    </div>
                                                    <input title="text" name="mobile" class="form-control" value="{{old('mobile')}}" placeholder="Mobile Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 form-group" id="exist_guest_area" @if(old('type')=='internal') @else style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Choose Guest <span class="text-danger">*</span></span>
                                                    </div>
                                                    <select name="guest_id" id="guest_id" class="form-control">
                                                        <option value="">--Choose--</option>
                                                        @foreach($guests as $guest)
                                                        <option value="{{$guest->id}}" @if(old('guest_id')==$guest->id) selected @endif>{{$guest->first_name}} {{$guest->middle_name}} {{$guest->last_name}} (ID: {{$guest->id_no}} | Mob: {{$guest->mobile1}}) </option>
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
                                    <input type="text" name="check_in_date" value="{{old('check_in_date')}}" class="js-flatpickr form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Departure Date</span>
                                    </div>
                                    <input type="text" name="check_out_date" value="{{old('check_out_date')}}" class="js-flatpickr form-control">
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">No of Rooms <span class="text-danger">*</span></span>
                                    </div>
                                    <input type="number" name="number_of_room" value="{{old('number_of_room')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">No of Child <span class="text-danger">*</span></span>
                                    </div>
                                    @if(old('child_numbers'))
                                        @php
                                            $chilNo = old('child_numbers');
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
                                    @if(old('child_numbers'))
                                        @php
                                            $adult = old('adult_numbers');
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
                                    <input type="number" id="totalNo" name="total_number" value="{{old('total_number')}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Book Now</button>
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

@endsection