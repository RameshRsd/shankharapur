@extends('backend.admin.layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Cards -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Room Management | Rooms List
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
                                        <label for="">Filter Rooms <i class="fa fa-search"></i></label>
                                        @if(request('order') || request('per_page') || request('name'))
                                            <br>
                                            <a href="{{url()->current()}}" class="badge badge-light"><i class="fa fa-times-circle"></i> Clear Search</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                    </div>
                                    <input type="text" name="name" value="{{request('name')}}" class="form-control" onchange="javascript:this.form.submit();">
                                </div>
                            </div>
                            <div class="col-sm-3 form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Order By</span>
                                    </div>
                                    <select name="order" id="" class="form-control" onchange="javascript:this.form.submit();">
                                        <option value="DESC" @if(request('order')=='DESC') selected @endif>Newest</option>
                                        <option value="ASC" @if(request('order')=='ASC') selected @endif>Oldest</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
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
                            <a href="{{url('admin/room-manage/add-room')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                        <table class="table table-striped table-bordered table-vcenter">
                            <thead>
                            <tr>
                                <th class="text-center">SN</th>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th class="text-center">Rate</th>
                                <th class="text-center">Update By</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rooms as $key=>$room)
                                <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td class="text-center">
                                        @if(is_file(public_path('rooms/photos'.'/'.$room->image)) && file_exists(public_path('rooms/photos'.'/'.$room->image)))
                                            <img class="img-avatar img-avatar48" src="{{asset('public/rooms/photos'.'/'.$room->image)}}" alt="">
                                        @else
                                            <img class="img-avatar img-avatar48" src="{{asset('default/avatar.jpg')}}" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        {{$room->accommodation->name}}<br>
                                        <span class="badge badge-dark">Room No. :{{$room->room_no}}</span>
                                    </td>
                                    <td class="text-center">
                                        @if($room->rate_type=='Rupees')
                                            Rs.
                                            @else
                                            $
                                        @endif
                                            {{number_format($room->rate)}}/-
                                    </td>
                                    <td class="text-center">
                                        {{$room->user->name}}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url()->current().'/'.$room->id.'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="7">
                                    {{$rooms->appends(['per_page'=>request('per_page')])->appends(['order'=>request('order')])->appends(['name'=>request('name')])->links()}}
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