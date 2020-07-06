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
                            <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#addImages"><i class="fa fa-plus-circle"></i> Add Images <i class="fa fa-images"></i></button>
                            <button class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus-circle"></i> Add Category <i class="fa fa-tags"></i></button>
                        </div>
                        <!-- Advanced Gallery -->

                        <div class="row">
                            <div class="col-sm-12">
                                <form action="" method="get">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">Filter Images <i class="fa fa-search"></i></label>
                                                    @if(request('order') || request('per_page') || request('category_id'))
                                                        <br>
                                                        <a href="{{url()->current()}}" class="badge badge-light"><i class="fa fa-times-circle"></i> Clear Search</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Choose Category</span>
                                                </div>
                                                <select name="category_id" id="category_id" class="form-control" onchange="javascript:this.form.submit();">
                                                    <option value="">--Choose Category--</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" @if(request('category_id')==$category->id) selected @endif>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Order</span>
                                                </div>
                                                <select name="order" id="" class="form-control" onchange="javascript:this.form.submit();">
                                                    <option value="DESC" @if(request('order')=='DESC') selected @endif>Newest</option>
                                                    <option value="ASC" @if(request('order')=='ASC') selected @endif>Oldest</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">No.</span>
                                                </div>
                                                <select name="per_page" id="" class="form-control" onchange="javascript:this.form.submit();">
                                                    {{--<option value="{{$total_users}}" @if(request('per_page')== $total_users) selected @endif>All</option>--}}
                                                    <option value="8" @if(request('per_page')=='') selected @endif>8</option>
                                                    <option value="15" @if(request('per_page')=='15') selected @endif>15</option>
                                                    <option value="30" @if(request('per_page')=='30') selected @endif>30</option>
                                                    <option value="50" @if(request('per_page')=='50') selected @endif>50</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-12 mt-1 mb-1 text-center">
                                {{$galleries->withQueryString()->links() }}
                            </div>
                        </div>
                        <div class="row items-push js-gallery">
                            @foreach($galleries as $key=>$gallery)
                                <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
                                    <div class="options-container fx-item-zoom-in fx-overlay-zoom-out">
                                        <img class="img-fluid options-item" src="{{asset('public/gallery'.'/'.$gallery->image)}}" alt="">
                                        <div class="options-overlay bg-black-75">
                                            <div class="options-overlay-content text-center">
                                                <h3 class="h4 text-white mb-1">{{$gallery->title}}</h3>
                                                <h4 class="h6 text-white-75 mb-3">More Info</h4>
                                                <a class="btn btn-sm btn-primary img-lightbox" href="{{asset('public/gallery'.'/'.$gallery->image)}}">
                                                    <i class="fa fa-search-plus mr-1"></i> View
                                                </a>
                                                <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#editImages{{$gallery->id}}" href="javascript:void(0)">
                                                    <i class="fa fa-edit mr-1"></i> Edit
                                                </a>
                                                <hr>
                                                @foreach($gallery->galleryCategories as $category)
                                                    <a href="{{url()->current().'?category_id='.$category->category_id}}" class="badge badge-light">{{$category->category->name}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="editImages{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white">Add Images</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body pb-1">

                                                <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                                                    <div class="block-content block-content-full bg-white">
                                                        <!-- Header -->
                                                        <div class="text-center">
                                                            <p class="text-uppercase font-w700 font-size-sm text-muted">Add Images</p>
                                                        </div>
                                                        <!-- END Header -->

                                                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                                        <form class="js-validation-signin" action="{{url()->current().'/'.$gallery->id.'/update'}}" method="POST" enctype="multipart/form-data">{{csrf_field()}}
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    Images Title
                                                                                </span>
                                                                            </div>
                                                                            <input type="text" multiple class="form-control" id="example-group1-input1" value="{{$gallery->title}}" name="title">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <span>Choose Category <span class="text-danger">*</span></span><br>
                                                                        <select name="category_id[]"  multiple class="js-select2 form-control full-width" style="width: 100%;" required>
                                                                            <option value="">--Choose Category--</option>
                                                                            @foreach($categories as $category)
                                                                                @php
                                                                                    $category_values = \App\Model\GalleryCategory::where('gallery_id',$gallery->id)->where('category_id',$category->id)->get();
                                                                                @endphp
                                                                                @if(count($category_values)>0)
                                                                                    @foreach($category_values as $category_value)
                                                                                        <option value="{{$category_value->category_id}}" selected>{{$category_value->category->name}}</option>
                                                                                    @endforeach
                                                                                @else
                                                                                    <option value="{{$category->id}}" @if(old('category_id')==$category->id) selected @endif>{{$category->name}}</option>
                                                                                @endif
                                                                            @endforeach


                                                                            {{--@foreach($categories as $category)--}}
                                                                                {{--<option value="{{$category->id}}" @if(old('category_id')==$category->id) selected @endif>{{$category->name}}</option>--}}
                                                                            {{--@endforeach--}}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group text-center mb-0">
                                                                <button type="submit" class="btn btn-hero-primary">
                                                                    <i class="fa fa-fw fa-plus-circle mr-1"></i> Update Now
                                                                </button>
                                                                <a href="{{url()->current().'/'.$gallery->id.'/delete'}}" class="btn btn-hero-danger">
                                                                    <i class="fa fa-fw fa-trash mr-1"></i> Delete Now
                                                                </a>
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
                            <div class="col-sm-12 mt-2 mb-2 text-center">
                                {{$galleries->withQueryString()->links() }}
                            </div>

                        </div>
                        <!-- END Advanced Gallery -->
                    </div>
                </div>
        </div>
        <!-- END Cards -->
    </div>
    <!-- END Page Content -->

    <div class="modal fade" id="addImages" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Add Images</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-1">

                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full bg-white">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Add Images</p>
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
                                                        Images Title
                                                    </span>
                                                </div>
                                                <input type="text" multiple class="form-control" id="example-group1-input1" name="title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Choose Images<span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <input type="file" multiple class="form-control" id="example-group1-input1" name="image[]" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <span>Choose Category <span class="text-danger">*</span></span><br>
                                        <select name="category_id[]" id="category_id" multiple class="js-select2 form-control full-width" style="width: 100%;" required>
                                            <option value="">--Choose Category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if(old('category_id')==$category->id) selected @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center mb-0">
                                    <button type="submit" class="btn btn-hero-primary">
                                        <i class="fa fa-fw fa-plus-circle mr-1"></i> Upload Now
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

    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
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
                            <form class="js-validation-signin" action="{{url()->current().'/categories'}}" method="POST">{{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Category Name<span class="text-danger">*</span>
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
    <link rel="stylesheet" href="{{asset('')}}assets/js/plugins/magnific-popup/magnific-popup.css">
@endsection

@section('script')
    <!-- Page JS Plugins -->
    <script src="{{asset('')}}assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Page JS Helpers (Magnific Popup Plugin) -->
    <script>jQuery(function(){ Dashmix.helpers('magnific-popup'); });</script>

@endsection