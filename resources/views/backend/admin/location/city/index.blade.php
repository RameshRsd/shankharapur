@extends('backend.admin.layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Cards -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Location Management | Cities
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
                                            <label for="">Filter City <i class="fa fa-search"></i></label>
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
                                            <span class="input-group-text" id="inputGroup-sizing-default">State</span>
                                        </div>
                                        <select name="state_id" id="state_id" class="form-control" onchange="javascript:this.form.submit();">
                                            <option value="">--Choose--</option>
                                            @foreach($states as $state)
                                                <option value="{{$state->id}}" @if(request('state_id')==$state->id) selected @endif>{{$state->name}}</option>
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
                                <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#addCity"><i class="fa fa-plus-circle"></i> Add City</button>
                            </div>
                            <table class="table table-striped table-bordered table-vcenter">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cities as $key=>$city)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$city->name}}</td>
                                            <td>{{$city->district->name}}</td>
                                            <td>{{$city->district->state->name}}</td>
                                            <td>{{$city->district->state->country->name}}</td>
                                            <td>
                                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editCity{{$city->id}}"><i class="fa fa-edit"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="5">
                                            {{$cities->appends(['per_page'=>request('per_page')])->appends(['order'=>request('order')])->appends(['state_id'=>request('state_id')])->links()}}
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

    <div class="modal fade" id="addCity" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Add District</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-1">

                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full bg-white">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Add District</p>
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
                                                <select name="country_id" id="country_id_add" class="form-control" required="">
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
                                                        State<span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <select name="state_id" id="state_id_add" class="form-control" required>
                                                    <option value="">--Choose--</option>
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}">{{$state->name}}</option>
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
                                                        District Name<span class="text-danger">*</span>
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
@section('script')
    <script>
        $('#country_id_add').on('change', function(e){
            console.log(e);
            var district_id = e.target.value;
            $.get('{{url('admin')}}/get_state?country_id=' + district_id,function(data) {
                console.log(data);
                $('#state_id_add').empty();
                $('#state_id_add').append('<option value="0" disable="true" selected="true">--Choose--</option>');

                $.each(data, function(index, state){
                    $('#state_id_add').append('<option value="'+ state.id +'">'+ state.name +'</option>');
                })
            });
        });
    </script>

    <script>
        $('#country_id_edit').on('change', function(e){
            console.log(e);
            var district_id = e.target.value;
            $.get('{{url('admin')}}/get_state?country_id=' + district_id,function(data) {
                console.log(data);
                $('#country_id_edit').empty();
                $('#country_id_edit').append('<option value="0" disable="true" selected="true">--Choose--</option>');

                $.each(data, function(index, state){
                    $('#country_id_edit').append('<option value="'+ state.id +'">'+ state.name +'</option>');
                })
            });
        });
    </script>

@endsection