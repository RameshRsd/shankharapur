@extends('backend.admin.layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Cards -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Room Management | Add New
        </h2>
        <div class="row">
            @include('layouts.notification')

            <div class="col-sm-12">
                <div class="border p-2 bg-white">
                    <div class="button-section mb-2 text-right">
                        <a href="{{url('admin/room-manage/room-list')}}" class="btn btn-danger pull-right"><i class="fa fa-backward"></i> Back</a>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Room No <span class="text-danger">*</span></span>
                                    </div>
                                    <input type="text" name="room_no" value="{{old('room_no')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Accommodation</span>
                                    </div>
                                    <select name="accommodation_id" id="accommodation_id" class="form-control">
                                        <option value="">--Choose--</option>
                                        @foreach($accoms as $accom)
                                            <option value="{{$accom->id}}" @if(old('accommodation_id')==$accom->id) selected @endif>{{$accom->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Rate <span class="text-danger">*</span></span>
                                    </div>
                                    <select name="RoomRateType" id="RoomRateType" class="form-control">
                                        <option value="same" @if(old('RoomRateType')=='same') selected @endif>Same as Accommodation</option>
                                        <option value="different" @if(old('RoomRateType')=='different') selected @endif>Different as Accommodation</option>
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
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Floor <span class="text-danger">*</span></span>
                                    </div>
                                    <select name="floor_id" id="floor_id" class="form-control">
                                        @foreach($floors as $floor)
                                            <option value="{{$floor->id}}" @if(old('floor_id')==$floor->id) selected @endif>{{$floor->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="badge badge-light">Not Found? </span> <a data-toggle="modal" data-target="#addFloor" href="javascript:void(0)" class="badge badge-info">Add Floor</a>
                            </div>

                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Feature Image
                                        </span>
                                    </div>
                                    <input type="file" class="form-control" id="example-group1-input1" name="image">
                                </div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <span class="font-weight-bold">About Room</span>
                                <textarea name="details"  id="js-ckeditor"  class="form-control">{{old('details')}}</textarea>
                            </div>
                            <div class="col-sm-12 form-group">
                                <span>Room Features</span>
                                <select name="feature_id[]" multiple id="feature_id" class="form-control js-select2" placeholder="Choose Features">
                                    @foreach($features as $feature)
                                        <option value="{{$feature->id}}">{{$feature->name}}</option>
                                    @endforeach
                                </select>
                                <span class="badge badge-light">Not Found? </span> <a data-toggle="modal" data-target="#addFeature" href="javascript:void(0)" class="badge badge-info">Add Feature</a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END Cards -->
    </div>
    <!-- END Page Content -->
    <div class="modal fade" id="addFeature" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Add Feature</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-1">

                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full bg-white">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Add Feature</p>
                            </div>
                            <!-- END Header -->

                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signin" action="{{url('admin/room-manage/room-features')}}" method="POST">{{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Feature Title<span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center mb-0">
                                    <button type="submit" class="btn btn-hero-primary">
                                        <i class="fa fa-fw fa-plus-circle mr-1"></i> Add Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addFloor" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Add Floor</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-1">

                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full bg-white">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Add Floor</p>
                            </div>
                            <!-- END Header -->

                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signin" action="{{url('admin/room-manage/floors')}}" method="POST">{{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Floor Name<span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center mb-0">
                                    <button type="submit" class="btn btn-hero-primary">
                                        <i class="fa fa-fw fa-plus-circle mr-1"></i> Add Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('style')
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
    {{--<script>--}}
        {{--$('#accommodation_id').on('change', function(e){--}}
            {{--console.log(e);--}}
            {{--var accommodation_id = e.target.value;--}}
            {{--$.get('{{url('admin/room-manage')}}/get_Data?accommodation_id=' + accommodation_id,function(data) {--}}
                {{--console.log(data);--}}
                {{--$('#rate').empty();--}}
                {{--$('#rate_type').empty();--}}

                {{--$('#rate_type').append('<option value="'+ accom.rate_type +'">'+ accom.rate_type +'</option>');--}}
                {{--$('#rate_type').append('<option value="'+ accom.rate_type +'">'+ accom.rate_type +'</option>');--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
    <!-- Page JS Code -->
    <script src="{{asset('')}}assets/js/pages/be_forms_wizard.min.js"></script>
    <script src="{{asset('')}}assets/js/plugins/ckeditor/ckeditor.js"></script>
    <script src="{{asset('')}}assets/js/plugins/select2/js/select2.full.min.js"></script>
    <script>jQuery(function(){ Dashmix.helpers(['ckeditor','select2']); });</script>

@endsection