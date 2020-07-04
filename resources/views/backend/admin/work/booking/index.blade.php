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
                <div class="p-2 bg-white border mb-2">
                    <a href="{{url('admin/work-flows/room-book/add-new')}}" class="btn btn-primary mb-1" style="float: right;"><i class="fa fa-plus-circle"></i> New Booking</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Room No</th>
                                    <th>Booked By</th>
                                    <th>Arrival Date</th>
                                    <th>Departure Date</th>
                                    <th class="text-center">Perosn</th>
                                    <th>Remarks</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($rooms as $key=>$room)
                                <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td class="text-center">
                                        <span class="badge badge-primary">{{$room->room->room_no}}</span><br>
                                        <span class="badge badge-dark">{{$room->room->accommodation->name}}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-light">
                                        @if($room->type=='internal')
                                            {{$room->guest->first_name}}  {{$room->guest->last_name}}
                                        @else
                                            {{$room->full_name}}
                                        @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-light">{{date('d M, Y',strtotime($room->check_in_date))}}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-light">{{date('d M, Y',strtotime($room->check_out_date))}}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-info">Child: {{$room->child_numbers}}</span>
                                        <span class="badge badge-info">Adult: {{$room->adult_numbers}}</span>
                                        <span class="badge badge-success">Total:{{$room->child_numbers+$room->adult_numbers}}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-light">{{$room->number_of_room}} Room Needed</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url()->current().'/'.$room->id.'/edit'}}" class="btn btn-info btn-sm" title="Edit Details"><i class="fa fa-edit"></i></a>
                                        <a href="{{url()->current().'/'.$room->id.'/checked'}}" class="btn btn-success btn-sm" title="Make Checked in"><i class="fa fa-check-circle"></i></a>
                                        <a href="{{url()->current().'/'.$room->id.'/remove'}}" onclick="return confirm('Are you sure to remove this book?')" class="btn btn-danger btn-sm" title="Cancel Book"><i class="fa fa-times"></i></a>
                                    </td>
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