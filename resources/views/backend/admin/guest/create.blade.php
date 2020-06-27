@extends('backend.admin.layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Cards -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Guest Management | New Guest
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
                                                        <img class="img-avatar img-avatar-thumb bg-white" id="photoDisplay" src="{{asset('default/avatar.jpg')}}" alt="">
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
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">State <span class="text-danger">*</span></span>
                                                </div>
                                                <select name="state_id" id="state_id" class="form-control">
                                                    <option value="">--Choose--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">District <span class="text-danger">*</span></span>
                                                </div>
                                                <select name="district_id" id="district_id" class="form-control">
                                                    <option value="">--Choose--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">City</span>
                                                </div>
                                                <select name="city_id" id="city_id" class="form-control">
                                                    <option value="">--Choose--</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Tole</span>
                                                </div>
                                                <input type="text" name="tole" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Ward No.</span>
                                                </div>
                                                <input type="text" name="ward_no" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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

@endsection