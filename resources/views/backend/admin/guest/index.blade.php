@extends('backend.admin.layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Cards -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Guest Management | Guest
        </h2>
        <div class="row">
            @include('layouts.notification')

            <div class="col-sm-12">
                <div class="border p-2 bg-white mb-2">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Filter Guest <i class="fa fa-search"></i></label>
                                        @if(request('order') || request('per_page') || request('name'))
                                            <br>
                                            <a href="{{url()->current()}}" class="badge badge-light"><i class="fa fa-times-circle"></i> Clear Search</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Guest Name</span>
                                    </div>
                                    <input type="text" name="name" class="form-control" onchange="javascript:this.form.submit();">
                                </div>
                            </div>
                            <div class="col-sm-3 form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">District</span>
                                    </div>
                                    <select name="district_id" id="district_id" class="form-control" onchange="javascript:this.form.submit();">
                                        <option value="">--Choose--</option>
                                        @foreach($districts as $district)
                                            <option value="{{$district->id}}" @if(request('district_id')==$district->id) selected @endif>{{$district->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Order By</span>
                                    </div>
                                    <select name="order" id="" class="form-control" onchange="javascript:this.form.submit();">
                                        <option value="ASC" @if(request('order')=='ASC') selected @endif>A-Z</option>
                                        <option value="DESC" @if(request('order')=='DESC') selected @endif>Z-A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">No.</span>
                                    </div>
                                    <select name="per_page" id="" class="form-control" onchange="javascript:this.form.submit();">
                                        {{--<option value="{{$total_users}}" @if(request('per_page')== $total_users) selected @endif>All</option>--}}
                                        <option value="10" @if(request('per_page')=='') selected @endif>10</option>
                                        <option value="20" @if(request('per_page')=='20') selected @endif>20</option>
                                        <option value="30" @if(request('per_page')=='30') selected @endif>30</option>
                                        <option value="50" @if(request('per_page')=='50') selected @endif>50</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="border p-2 bg-white">
                    <div class="table-responsive">
                        <div class="button-section mb-2 text-right">
                            <a href="{{url('admin/guest-manage/add-guest')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> New Guest</a>
                        </div>
                        <table class="table table-striped table-bordered table-vcenter">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Guest Name</th>
                                <th>ID No.</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($guests as $key=>$guest)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$guest->first_name}} {{$guest->middle_name}} {{$guest->last_name}}</td>
                                    <td>{{$guest->id_no}} <span class="badge badge-light">{{$guest->id_type}}</span></td>
                                    <td><span class="badge badge-light">{{$guest->city->name}}-{{$guest->ward_no}},{{$guest->district->name}}</span></td>
                                    <td></td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-user-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="6">
                                    {{$guests->appends(['per_page'=>request('per_page')])->appends(['order'=>request('order')])->appends(['name'=>request('name')])->appends(['district_id'=>request('district_id')])->links()}}
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Cards -->
    </div>
    <!-- END Page Content -->

@endsection
@section('script')

@endsection