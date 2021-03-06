@extends('backend.admin.layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Cards -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Location Management | States
        </h2>
        <div class="row">
                @include('layouts.notification')

                <div class="col-sm-12">
                    <div class="border p-2 bg-white">
                        <div class="table-responsive">
                            <div class="button-section mb-2 text-right">
                                <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#addState"><i class="fa fa-plus-circle"></i> Add State</button>
                            </div>
                            <table class="table table-striped table-bordered table-vcenter">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($states as $key=>$state)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$state->name}}</td>
                                            <td>{{$state->country->name}}</td>
                                            <td>
                                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editState{{$state->id}}"><i class="fa fa-edit"></i></button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editState{{$state->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-popout" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info">
                                                        <h5 class="modal-title text-white">Edit State</h5>
                                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body pb-1">

                                                        <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                                                            <div class="block-content block-content-full bg-white">
                                                                <!-- Header -->
                                                                <div class="text-center">
                                                                    <p class="text-uppercase font-w700 font-size-sm text-muted">Edit State</p>
                                                                </div>
                                                                <!-- END Header -->

                                                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                                                <form class="js-validation-signin" action="{{url()->current().'/'.$state->id.'/update'}}" method="POST">{{csrf_field()}}
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                            Country<span class="text-danger">*</span>
                                                                                        </span>
                                                                                    </div>
                                                                                    <select name="country_id" id="country_id" class="form-control" required="">
                                                                                        <option value="">--Choose--</option>
                                                                                        @foreach($countries as $country)
                                                                                            <option value="{{$country->id}}" @if($state->country_id==$country->id) selected @endif>{{$country->name}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                            State Name<span class="text-danger">*</span>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control" id="example-group1-input1" name="name" value="{{$state->name}}" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group text-center mb-0">
                                                                        <button type="submit" class="btn btn-hero-info">
                                                                            <i class="fa fa-fw fa-save mr-1"></i> Update Now
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
        </div>
        <!-- END Cards -->
    </div>
    <!-- END Page Content -->

    <div class="modal fade" id="addState" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Add State</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-1">

                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full bg-white">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Add State</p>
                            </div>
                            <!-- END Header -->

                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signin" action="{{url()->current()}}" method="POST">{{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Country<span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <select name="country_id" id="country_id" class="form-control" required="">
                                                    <option value="">--Choose--</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}" @if(1==$country->id) selected @endif>{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        State Name<span class="text-danger">*</span>
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