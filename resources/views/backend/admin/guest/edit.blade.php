@extends('backend.admin.layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Cards -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Guest Management | Edit Guest ({{$guest->first_name}})
        </h2>
        <div class="row">
            @include('layouts.notification')

            <div class="col-sm-12">
                <div class="border p-2 bg-white">
                    <div class="button-section mb-2 text-right">
                        <a href="{{url('admin/guest-manage')}}" class="btn btn-danger pull-right"><i class="fa fa-backward"></i> Back</a>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <div class="row">
                                    <div  style="width: 50%; margin: 0 auto;">
                                        <table>
                                            <tr class="text-center">
                                                <th class="text-center">
                                                    <div class="text-center mb-2 p2 bg-white">
                                                        <img class="img-avatar img-avatar-thumb bg-white" id="photoDisplay" src="{{asset('guest/photos'.'/'.$guest->photo)}}" alt="">
                                                    </div>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Choose Photo
                                                    </span>
                                                        </div>
                                                        <input type="file" onchange="photoURL(this);" class="form-control" id="example-group1-input1" name="photo">
                                                    </div>

                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <div class="form-wrapp p-2 mb-2" style="border: 1px solid rebeccapurple;">
                                    <span class="font-weight-bold font-size-h5" style="border-bottom: 1px solid rebeccapurple;">Contact Details</span>

                                    <div class="row mt-2">
                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Country <span class="text-danger">*</span></span>
                                                </div>
                                                <select name="country_id" id="country_id" class="form-control">
                                                    <option value="">--Choose--</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}" @if($guest->country_id==$country->id) selected @endif>{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <small class="text-danger">Not Found? </small><a href="javascript:void(0)" data-toggle="modal" data-target="#addCountry" class="badge badge-info"><i class="fa fa-plus-circle"></i> Add New</a>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">State <span class="text-danger">*</span></span>
                                                </div>
                                                <select name="state_id" id="state_id" class="form-control">
                                                    <option value="">--Choose--</option>
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}" @if($guest->state_id==$state->id) selected @endif>{{$state->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <small class="text-danger">Not Found? </small><a href="javascript:void(0)" data-toggle="modal" data-target="#addState" class="badge badge-info"><i class="fa fa-plus-circle"></i> Add New</a>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">District <span class="text-danger">*</span></span>
                                                </div>
                                                <select name="district_id" id="district_id" class="form-control">
                                                    <option value="">--Choose--</option>
                                                        @foreach($districts as $district)
                                                            <option value="{{$district->id}}" @if($guest->district_id==$district->id) selected @endif>{{$district->name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <small class="text-danger">Not Found? </small><a href="javascript:void(0)" data-toggle="modal" data-target="#addDistrict" class="badge badge-info"><i class="fa fa-plus-circle"></i> Add New</a>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">City</span>
                                                </div>
                                                <select name="city_id" id="city_id" class="form-control">
                                                    <option value="">--Choose--</option>
                                                        @foreach($cities as $city)
                                                            <option value="{{$city->id}}" @if($guest->city_id==$city->id) selected @endif>{{$city->name}} {{$city->type}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <small class="text-danger">Not Found? </small><a href="javascript:void(0)" data-toggle="modal" data-target="#addCity" class="badge badge-info"><i class="fa fa-plus-circle"></i> Add New</a>
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Tole</span>
                                                </div>
                                                <input type="text" name="tole" value="{{$guest->tole}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Ward No.</span>
                                                </div>
                                                <input type="number" name="ward_no" value="{{$guest->ward_no}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Mobile No. <span class="text-danger">*</span></span>
                                                </div>
                                                <input type="number" name="mobile1" value="{{$guest->mobile1}}" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Mobile No.</span>
                                                </div>
                                                <input type="number" name="mobile2" value="{{$guest->mobile2}}" class="form-control" placeholder="(Optional)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 form-group">
                                <div class="form-wrapp p-2 mb-2" style="border: 1px solid rebeccapurple;">
                                    <span class="font-weight-bold font-size-h5" style="border-bottom: 1px solid rebeccapurple;">Personal Details</span>

                                    <div class="row mt-2">
                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">First Name <span class="text-danger">*</span></span>
                                                </div>
                                                <input type="text" name="first_name" value="{{$guest->first_name}}" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Middle Name</span>
                                                </div>
                                                <input type="text" name="middle_name" value="{{$guest->middle_name}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Last Name <span class="text-danger">*</span></span>
                                                </div>
                                                <input type="text" name="last_name" value="{{$guest->last_name}}" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Father Name</span>
                                                </div>
                                                <input type="text" name="father_name" value="{{$guest->father_name}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">ID No. <span class="text-danger">*</span></span>
                                                </div>
                                                <input type="text" name="id_no" value="{{$guest->id_no}}" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">ID Type <span class="text-danger">*</span></span>
                                                </div>
                                                <select name="id_type" id="id_type" class="form-control">
                                                    <option value="Citizenship" @if($guest->id_type=='Citizenship') selected @endif>Citizenship</option>
                                                    <option value="Driving" @if($guest->id_type=='Driving') selected @endif>Driving License</option>
                                                    <option value="Pan-Card" @if($guest->id_type=='Pan-Card') selected @endif>Pan-Card</option>
                                                    <option value="Passport" @if($guest->id_type=='Passport') selected @endif>Passport</option>
                                                    <option value="Voter-Card" @if($guest->id_type=='Voter-Card') selected @endif>Voter-Card</option>
                                                    <option value="Vehicle-No" @if($guest->id_type=='Vehicle-No') selected @endif>Vehicle-No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 form-group">
                                            <div class="form-wrapp p-2 mb-2" style="border: 1px solid cornflowerblue; background-color: lightgrey;">
                                                <span class="font-weight-bold font-size-h5" style="border-bottom: 1px solid rebeccapurple; ">Social Link</span>
                                                <div class="row mt-2">
                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Facebook Link.</span>
                                                            </div>
                                                            <input type="url" name="facebook_link" value="{{$guest->facebook_link}}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Twitter Link.</span>
                                                            </div>
                                                            <input type="url" name="twitter_link" value="{{$guest->twitter_link}}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Instagram Link.</span>
                                                            </div>
                                                            <input type="url" name="instagram_link" value="{{$guest->instagram_link}}" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END Cards -->
    </div>
    <!-- END Page Content -->
    <div class="modal fade" id="addCountry" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Add Country</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-1">

                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full bg-white">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Add Country</p>
                            </div>
                            <!-- END Header -->

                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signin" action="{{url('admin/location-manage/countries')}}" method="POST">{{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Country Name<span class="text-danger">*</span>
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
                            <form class="js-validation-signin" action="{{url('admin/location-manage/states')}}" method="POST">{{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Country<span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <select name="country_id" class="form-control" required="">
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

    <div class="modal fade" id="addDistrict" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
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
                            <form class="js-validation-signin" action="{{url('admin/location-manage/districts')}}" method="POST">{{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Country<span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <select name="country_id" id="country_id_add1" class="form-control" required="">
                                                    <option value="">--Choose--</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
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
                                                <select name="state_id" id="state_id_add1" class="form-control" required>
                                                    <option value="">--Choose--</option>
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

    <div class="modal fade" id="addCity" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Add City</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-1">

                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full bg-white">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Add City</p>
                            </div>
                            <!-- END Header -->

                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signin" action="{{url('admin/location-manage/cities')}}" method="POST">{{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Country<span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <select name="country_id" id="country_id_add2" class="form-control" required>
                                                    <option value="">--Choose--</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
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
                                                <select name="state_id" id="state_id_add2" class="form-control" required>
                                                    <option value="">--Choose--</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        District<span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <select name="district_id" id="district_id_add2" class="form-control" required>
                                                    <option value="">--Choose--</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        City Name<span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Type<span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <select name="type" class="form-control" required>
                                                    <option value="">--Choose--</option>
                                                    <option value="Metropolitan City">Metropolitan City</option>
                                                    <option value="Sub-Metropolitan City">Sub-Metropolitan City</option>
                                                    <option value="Municipality">Municipality</option>
                                                    <option value="Rural Municipality">Rural Municipality</option>
                                                    <option value="VDC">VDC</option>
                                                </select>
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
        function photoURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photoDisplay')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        $('#country_id').on('change', function(e){
            console.log(e);
            var district_id = e.target.value;
            $.get('{{url('admin')}}/get_state?country_id=' + district_id,function(data) {
                console.log(data);
                $('#state_id').empty();
                $('#district_id').empty();
                $('#city_id').empty();
                $('#state_id').append('<option value="0" disable="true" selected="true">--Choose--</option>');

                $.each(data, function(index, state){
                    $('#state_id').append('<option value="'+ state.id +'">'+ state.name +'</option>');
                })
            });
        });
    </script>

    <script>
        $('#state_id').on('change', function(e){
            console.log(e);
            var state_id = e.target.value;
            $.get('{{url('admin')}}/get_district?state_id=' + state_id,function(data) {
                console.log(data);
                $('#district_id').empty();
                $('#city_id').empty();
                $('#district_id').append('<option value="0" disable="true" selected="true">--Choose--</option>');

                $.each(data, function(index, district){
                    $('#district_id').append('<option value="'+ district.id +'">'+ district.name +'</option>');
                })
            });
        });
    </script>

    <script>
        $('#district_id').on('change', function(e){
            console.log(e);
            var district_id = e.target.value;
            $.get('{{url('admin')}}/get_city?district_id=' + district_id,function(data) {
                console.log(data);
                $('#city_id').empty();
                $('#city_id').append('<option value="0" disable="true" selected="true">--Choose--</option>');

                $.each(data, function(index, city){
                    $('#city_id').append('<option value="'+ city.id +'">'+ city.name +' '+ city.type +' </option>');
                })
            });
        });
    </script>

    <script>
        $('#country_id_add2').on('change', function(e){
            console.log(e);
            var district_id = e.target.value;
            $.get('{{url('admin')}}/get_state?country_id=' + district_id,function(data) {
                console.log(data);
                $('#state_id_add2').empty();
                $('#district_id_add2').empty();
                $('#state_id_add2').append('<option value="0" disable="true" selected="true">--Choose--</option>');

                $.each(data, function(index, state){
                    $('#state_id_add2').append('<option value="'+ state.id +'">'+ state.name +'</option>');
                })
            });
        });
    </script>

    <script>
        $('#state_id_add2').on('change', function(e){
            console.log(e);
            var state_id = e.target.value;
            $.get('{{url('admin')}}/get_district?state_id=' + state_id,function(data) {
                console.log(data);
                $('#district_id_add2').empty();
                $('#district_id_add2').append('<option value="0" disable="true" selected="true">--Choose--</option>');

                $.each(data, function(index, district){
                    $('#district_id_add2').append('<option value="'+ district.id +'">'+ district.name +'</option>');
                })
            });
        });
    </script>

    <script>
        $('#country_id_add1').on('change', function(e){
            console.log(e);
            var district_id = e.target.value;
            $.get('{{url('admin')}}/get_state?country_id=' + district_id,function(data) {
                console.log(data);
                $('#state_id_add1').empty();
                $('#state_id_add1').append('<option value="0" disable="true" selected="true">--Choose--</option>');

                $.each(data, function(index, state){
                    $('#state_id_add1').append('<option value="'+ state.id +'">'+ state.name +'</option>');
                })
            });
        });

    </script>


@endsection