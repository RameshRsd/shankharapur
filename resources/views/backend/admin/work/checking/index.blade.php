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
                    <button class="btn btn-primary mb-1" style="float: right;" data-toggle="modal" data-target="#importBook"><i class="fa fa-plus-circle"></i> New Checked In</button>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Room No</th>
                                    <th>Guest Name</th>
                                    <th>Checkedin</th>
                                    <th>Checked Out</th>
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
                                        {{$room->guest->first_name}}  {{$room->guest->last_name}}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-light">{{date('d M, Y',strtotime($room->checked_in_date))}}</span>
                                    </td>
                                    <td>
                                        @if(isset($room->checked_out_date))
                                            <span class="badge badge-light">{{date('d M, Y',strtotime($room->checked_out_date))}}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-success">Total:{{$room->numbers}}</span>
                                    </td>
                                    <td>
                                        @php
                                            $latestGuest = \App\Model\RoomCheck::where('room_id',$room->room_id)->orderBy('id','DESC')->first();
                                        @endphp
                                        @if(isset($room->checked_out_date) && $room->room->room_status=='CheckedOut' &&  $latestGuest->guest_id==$room->guest_id)
                                            <span class="badge badge-success">Checked Out</span>
                                        @elseif(!(isset($room->checked_out_date)) && $room->checked_in_date==date('Y-m-d') &&  $latestGuest->guest_id==$room->guest_id)
                                        <span class="badge badge-success">Checked in</span>
                                        <a class="badge badge-danger" href="{{url()->current().'/'.$room->id.'/checkout'}}" onclick="return confirm('Are you sure to checked out this room?')">Make Checked Out</a>
                                        @elseif($room->checked_in_date>date('Y-m-d') &&  $latestGuest->guest_id==$room->guest_id)
                                            <span class="badge badge-dark">Will be stay from : {{date('d M, Y',strtotime($room->checked_in_date))}}</span>
                                            <a href="{{url()->current().'/'.$room->id.'/remove'}}"  onclick="return confirm('Are you sure to cancel this checked in room?')" class="badge badge-danger" title="Cancel Book">Cancel Booking</a>
                                        @else
                                            <a class="badge badge-info" href="{{url()->current().'/'.$room->id.'/continue'}}">Make continue checked in</a>
                                            {{--<a class="badge badge-danger" href="{{url()->current().'/'.$room->id.'/checkout'}}" onclick="return confirm('Are you sure to checked out this room?')">Make Checked Out</a>--}}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url()->current().'/'.$room->id.'/edit'}}" class="btn btn-info btn-sm" title="Edit Details"><i class="fa fa-edit"></i></a>
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
    <div class="modal fade" id="importBook" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Choose Action</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-1">

                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full bg-white">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Choose Action</p>
                            </div>
                            <!-- END Header -->

                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group text-center">
                                            {{--<a class="btn btn-primary" href="#">Import From Booking List</a>--}}
                                            <a class="btn btn-info" href="{{url('admin/work-flows/room-check/add-new')}}">New Entry</a>
                                        </div>
                                    </div>
                                </div>
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