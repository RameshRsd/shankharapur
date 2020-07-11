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
                            <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus-circle"></i> Add Category <i class="fa fa-tag"></i></button>
                        </div>

                        <div class="row items-push js-gallery">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Category Name</th>
                                                <th>Associates Images</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $key=>$category)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$category->name}}</td>
                                                    <td>
                                                        @if(count($category->gallery)>0)
                                                            <a href="{{url('admin/gallery-manage/images?category_id='.$category->id)}}" title="View Images">{{count($category->gallery)}} Image Found !</a>
                                                        @else
                                                            <span class="text-danger">Not Found Images</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($category->type=='lock')
                                                        <button class="btn btn-danger btn-sm" title="Not Allowed" disabled><i class="fa fa-edit"></i> Edit</button>
                                                        @else
                                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editCategory{{$category->id}}"><i class="fa fa-edit"></i> Edit</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="editCategory{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h5 class="modal-title text-white">Edit Category</h5>
                                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body pb-1">

                                                                <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                                                                    <div class="block-content block-content-full bg-white">
                                                                        <!-- Header -->
                                                                        <div class="text-center">
                                                                            <p class="text-uppercase font-w700 font-size-sm text-muted">Edit Category</p>
                                                                        </div>
                                                                        <!-- END Header -->

                                                                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                                                        <form class="js-validation-signin" action="{{url()->current().'/'.$category->id.'/update'}}" method="POST" enctype="multipart/form-data">{{csrf_field()}}
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group">
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-prepend">
                                                                                                <span class="input-group-text">
                                                                                                    Category Name <span class="text-danger">*</span>
                                                                                                </span>
                                                                                            </div>
                                                                                            <input type="text" multiple class="form-control" id="example-group1-input1" value="{{$category->name}}" name="name" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group text-center mb-0">
                                                                                <button type="submit" class="btn btn-hero-primary">
                                                                                    <i class="fa fa-fw fa-plus-circle mr-1"></i> Update Now
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
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Advanced Gallery -->
                    </div>
                </div>
        </div>
        <!-- END Cards -->
    </div>
    <!-- END Page Content -->

    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Add Category</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-1">

                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full bg-white">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Add Category</p>
                            </div>
                            <!-- END Header -->

                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signin" action="{{url()->current()}}" method="POST" enctype="multipart/form-data">{{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Category Name <span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <input type="text" multiple class="form-control" id="example-group1-input1" name="name" required>
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
    <link rel="stylesheet" href="{{asset('')}}assets/js/plugins/magnific-popup/magnific-popup.css">
@endsection

@section('script')
    <!-- Page JS Plugins -->
    <script src="{{asset('')}}assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Page JS Helpers (Magnific Popup Plugin) -->
    <script>jQuery(function(){ Dashmix.helpers('magnific-popup'); });</script>

@endsection