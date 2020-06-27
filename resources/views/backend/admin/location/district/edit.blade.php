@extends('backend.admin.layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Cards -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Location Management | Edit Districts
        </h2>
        <div class="row">
                @include('layouts.notification')

                <div class="col-sm-12">
                    <div class="border p-2 bg-white">
                        <div class="button-section mb-2 text-right">
                            <a href="{{url('admin/location-manage/districts')}}" class="btn btn-danger btn-sm pull-right"><i class="fa fa-backward"></i> Back</a>
                        </div>
                        <form class="js-validation-signin" action="{{url()->current()}}" method="POST">{{csrf_field()}}
                            <div class="row">
                                <div class="col-sm-6">
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
                                                    <option value="{{$country->id}}" @if($district->state->country_id==$country->id) selected @endif>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
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
                                                    <option value="{{$state->id}}" @if($district->state_id==$state->id) selected @endif>{{$state->name}}</option>
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
                                            <input type="text" class="form-control" id="example-group1-input1" name="name" value="{{$district->name}}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <button type="submit" class="btn btn-hero-primary">
                                    <i class="fa fa-fw fa-save mr-1"></i> Update Now
                                </button>
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

@endsection