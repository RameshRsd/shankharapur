@extends('backend.admin.layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Cards -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Location Management
        </h2>
        <div class="row">
                @include('layouts.notification')

                <div class="col-sm-12 form-group">
                    <div class="border p-2 bg-white">
                        <form action="" method="get">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="">Filter Locations</label>
                                @if(request('order') || request('per_page') || request('year') || request('name') || request('country_id') || request('state_id') || request('district_id'))
                                    <br>
                                    <a href="{{url()->current()}}" class="badge badge-light"><i class="fa fa-times-circle"></i> Clear Search</a>
                                @endif
                            </div>
                            <div class="col-sm-2 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">#</span>
                                    </div>
                                    <select name="country_id" id="country_id" class="form-control" onchange="javascript:this.form.submit();">
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}" @if(request('country_id')==$country->id) selected @endif>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="badge badge-light">Countries</span>
                            </div>
                            <div class="col-sm-2 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">#</span>
                                    </div>
                                    <select name="state_id" id="state_id" class="form-control" onchange="javascript:this.form.submit();">
                                        <option value="">States</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}" @if(request('state_id')==$state->id || (request('state_id')=='' && $state->id==1)) selected @endif>{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="badge badge-light">States</span>
                            </div>
                            <div class="col-sm-3 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">#</span>
                                    </div>
                                    <select name="district_id" id="district_id" class="form-control" onchange="javascript:this.form.submit();">
                                        <option value="">Districs</option>
                                        @foreach($districts as $district)
                                            <option value="{{$district->id}}" @if(request('district_id')==$district->id || (request('district_id')=='' && $district->id==1)) selected @endif>{{$district->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="badge badge-light">Districts</span>
                            </div>
                            <div class="col-sm-3 form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">City Name</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{request('name')}}" name="name" onchange="javascript:this.form.submit();" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="col-md-2 form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">#</span>
                                    </div>
                                    <select name="per_page" id="" class="form-control" onchange="javascript:this.form.submit();">
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
                                <button class="btn btn-danger btn-sm pull-right"><i class="fa fa-plus-circle"></i> Add Country</button>
                                <button class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus-circle"></i> Add State</button>
                                <button class="btn btn-success btn-sm pull-right"><i class="fa fa-plus-circle"></i> Add District</button>
                                <button class="btn btn-info btn-sm pull-right"><i class="fa fa-plus-circle"></i> Add City</button>
                            </div>
                            <table class="table table-bordered table-vcenter">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Ciy</th>
                                        <th>District</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cities as $key=>$city)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$city->name}} <span class="badge badge-light">{{$city->type}}</span></td>
                                            <td>{{$city->district->name}}</td>
                                            <td>{{$city->district->state->name}}</td>
                                            <td>{{$city->district->state->country->name}}</td>
                                            <td></td>
                                        </tr>
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

@endsection