@extends('backend.admin.layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Cards -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Accommodations | Add New
        </h2>
        <div class="row">
            @include('layouts.notification')

            <div class="col-sm-12">
                <div class="border p-2 bg-white">
                    <div class="button-section mb-2 text-right">
                        <a href="{{url('admin/accommodations/accommodation-list')}}" class="btn btn-danger pull-right"><i class="fa fa-backward"></i> Back</a>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Name <span class="text-danger">*</span></span>
                                    </div>
                                    <input type="text" name="name" value="{{old('name')}}" placeholder="Deluxe Room" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Rate <span class="text-danger">*</span></span>
                                    </div>
                                    <input type="text" name="rate" value="{{old('rate')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
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

@endsection
@section('script')
    <!-- Page JS Code -->
    <script src="{{asset('')}}assets/js/pages/be_forms_wizard.min.js"></script>
    <script src="{{asset('')}}assets/js/plugins/ckeditor/ckeditor.js"></script>
    <script>jQuery(function(){ Dashmix.helpers(['ckeditor']); });</script>

@endsection