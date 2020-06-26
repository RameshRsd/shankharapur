@extends('backend.admin.layouts.master')
@section('content')
    <!-- Page Content -->
    <div class="content">

        <!-- Cards -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Edit Profile
        </h2>
        <div class="row">

            @include('layouts.notification')

            <div class="col md-12">
                <div class="js-wizard-simple block block-rounded block-bordered">
                    <!-- Step Tabs -->
                    <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#wizard-simple-step1" data-toggle="tab">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple-step4" data-toggle="tab">Description</a>
                        </li>
                    </ul>
                    <!-- END Step Tabs -->

                    <!-- Form -->
                    <form action="" method="post" enctype="multipart/form-data">{{csrf_field()}}
                    <!-- Steps Content -->
                        <div class="block-content block-content-full tab-content" style="min-height: 290px;">
                            <!-- Step 1 -->
                            <div class="tab-pane active" id="wizard-simple-step1" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Company Name (En) <span class="text-danger">*</span></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$admin->name}}" id="name" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Company Name (Np)</span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$admin->name_np}}" id="name_np"  name="name_np" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Company Regd No. <span class="text-danger">*</span></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$admin->regd_no}}" name="regd_no" id="regd_no" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">PAN No.</span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$admin->vat_no}}" name="vat_no" id="vat_no">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Address <span class="text-danger">*</span></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$admin->address}}" name="address" id="address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Telephone</span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$admin->tel1}}" name="tel1" id="tel1">
                                                <input type="text" class="form-control" value="{{$admin->tel2}}" name="tel2" id="tel2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Email <span class="text-danger">*</span></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$admin->email1}}" name="email1" id="email1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h5>
                                            <hr>
                                            Owner Details
                                            <hr>
                                        </h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">Owner Name <span class="text-danger">*</span></span>
                                                        </div>
                                                        <input type="text" class="form-control" value="{{$admin->company_head}}" id="company_head"  name="company_head" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">Owner Position <span class="text-danger">*</span></span>
                                                        </div>
                                                        <input type="text" class="form-control" value="{{$admin->head_position}}" id="head_position"  name="head_position" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">Mobile</span>
                                                        </div>
                                                        <input type="text" class="form-control" value="{{$admin->mobile1}}" id="mobile1"  name="mobile1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">Mobile</span>
                                                        </div>
                                                        <input type="text" class="form-control" value="{{$admin->mobile2}}" id="mobile2"  name="mobile2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-cent">
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch custom-control-success mb-1">
                                                        <label for="">Display Owner Details in Website?</label>
                                                        <input type="checkbox" class="custom-control-input" id="example-sw-custom-success{{$admin->id}}" name="owner_detail" @if($admin->owner_detail=='yes') checked @endif>
                                                        <label class="custom-control-label" for="example-sw-custom-success{{$admin->id}}">Yes</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Step 1 -->


                            <!-- Step 4 -->
                            <div class="tab-pane" id="wizard-simple-step4" role="tabpanel">
                                <div id="validation-errors"></div>
                                <div style="clear: both;"></div>

                                <div class="form-group">
                                    <!-- CKEditor Container -->
                                    <textarea id="js-ckeditor" name="description" class="form-control" placeholder="Short Description About Company">{!! $admin->description !!}</textarea>
                                </div>
                            </div>
                            <!-- END Step 4 -->
                        </div>
                        <!-- END Steps Content -->

                        <!-- Steps Navigation -->
                        <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-secondary disabled" data-wizard="prev">
                                        <i class="fa fa-angle-left mr-1"></i> Previous
                                    </button>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-secondary" data-wizard="next">
                                        Next <i class="fa fa-angle-right ml-1"></i>
                                    </button>
                                    <button type="submit" class="btn btn-primary d-none" data-wizard="finish">
                                        <i class="fa fa-save mr-1"></i> Update
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- END Steps Navigation -->
                    </form>
                    <!-- END Form -->
                </div>
            </div>
        </div>
        <!-- END Cards -->
    </div>
    <!-- END Page Content -->

@endsection
@section('script')
    <!-- Page JS Plugins -->
    <script src="{{asset('')}}assets/js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js"></script>
    <script src="{{asset('')}}assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{asset('')}}assets/js/plugins/jquery-validation/additional-methods.js"></script>

    <!-- Page JS Code -->
    <script src="{{asset('')}}assets/js/pages/be_forms_wizard.min.js"></script>
    <script src="{{asset('')}}assets/js/plugins/ckeditor/ckeditor.js"></script>
    <script>jQuery(function(){ Dashmix.helpers(['ckeditor']); });</script>
@endsection