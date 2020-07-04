@extends('backend.admin.layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Cards -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Dashboard
        </h2>
        <div class="row">
            @include('layouts.notification')
            <div class="col-sm-12">
                <div class="p-2 bg-white border mb-2">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th colspan="10">Room Status</th>
                            </tr>
                            @foreach($floors as $floor)
                                @if(count($floor->rooms)>0)
                                    <tr>
                                        <th style="width: 15%;">{{$floor->name}}</th>
                                        @foreach($floor->rooms as $room)
                                            <td>
                                                @if($room->room_status=='CheckedIn')
                                                    @if($checkRoom = $room->roomChecked()->orderBy('id','DESC')->first())
                                                        @php
                                                            $roomCheckId= $checkRoom->id;
                                                        @endphp
                                                    @endif
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-danger btn-sm" title="Checked In">{{$room->room_no}}</button>
                                                        <button type="button" class="btn btn-danger btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(82px, -2px, 0px);">
                                                            <a class="dropdown-item" href="{{url('admin/work-flows/room-check').'/'.$roomCheckId.'/checkout'}}"  onclick="return confirm('Are you sure to checked out this room?')">
                                                                <i class="fa fa-pen-square mr-1"></i> Check Out
                                                            </a>
                                                        </div>
                                                    </div>
                                                @elseif($room->room_status=='Booked')
                                                    @if($checkBook = $room->PendingRoomBooks()->orderBy('id','DESC')->first())
                                                        @php
                                                            $roomBookId= $checkBook->id;
                                                        @endphp
                                                        @if($checkBook->type=='internal')
                                                            @php
                                                                $full_name = $checkBook->guest->first_name.' '.$checkBook->guest->last_name;
                                                            @endphp
                                                        @else
                                                            @php
                                                                $full_name = $checkBook->full_name;
                                                            @endphp
                                                        @endif
                                                        @else
                                                        @php
                                                            $roomBookId='';
                                                        @endphp
                                                    @endif
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-warning btn-sm" title="Booked">{{$room->room_no}}</button>
                                                        <button type="button" class="btn btn-warning btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(82px, -2px, 0px);">
                                                            <a class="dropdown-item text-warning" href="#">
                                                                <i class="fa fa-check-double mr-1"></i> <span class="text-warning badge badge-light">Booked By: {{$full_name}}</span>
                                                            </a>
                                                            @if($roomBookId>0)
                                                            <a  class="dropdown-item text-danger" href="{{url('admin/work-flows/room-book').'/'.$roomBookId.'/remove'}}" onclick="return confirm('Are you sure to remove this booking?')">
                                                                <i class="fa fa-pen-square mr-1"></i> Cancel Book
                                                            </a>
                                                            @endif
                                                            <a class="dropdown-item text-success" href="{{url('admin/work-flows/room-check/add-new?room_id='.$room->id)}}">
                                                                <i class="fa fa-check-circle mr-1"></i>Make Checked in
                                                            </a>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-success btn-sm" title="Available">{{$room->room_no}}</button>
                                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(82px, -2px, 0px);">
                                                            <a class="dropdown-item" href="{{url('admin/rooms'.'/'.$room->id.'/book')}}">
                                                                <i class="fa fa-pen-square mr-1"></i> Book
                                                            </a>
                                                            <a class="dropdown-item" href="{{url('admin/work-flows/room-check/add-new?room_id='.$room->id)}}">
                                                                <i class="fa fa-check-circle mr-1"></i> Check
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                                <span class="badge badge-dark">{{$room->accommodation->name}}</span>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="p-2 bg-white border">
                    <div class="row">
                        <div class="col-md-4">
                            <a class="block block-rounded block-link-shadow bg-warning" href="#">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div class="mr-3">
                                        <p class="text-white font-size-h3 font-w300 mb-0">
                                            {{$checkedin}}
                                        </p>
                                        <p class="text-white-75 mb-0">
                                            Today Checked In
                                        </p>
                                    </div>
                                    <div>
                                        <i class="fa fa-info-circle text-dark"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a class="block block-rounded block-link-shadow bg-primary" href="#">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fa fa-2x fa-info-circle text-primary-lighter"></i>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <p class="text-white font-size-h3 font-w300 mb-0">
                                            +{{$roomBooked}}
                                        </p>
                                        <p class="text-white-75 mb-0">
                                            Room Booked
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a class="block block-rounded block-link-shadow bg-success" href="#">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="far fa-2x fa fa-info-circle text-success-light"></i>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <p class="text-white font-size-h3 font-w300 mb-0">
                                            +{{$availableRoom}}
                                        </p>
                                        <p class="text-white-75 mb-0">
                                            Room Available
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a class="block block-rounded block-link-shadow bg-danger" href="#">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="far fa-2x fa fa-users text-white"></i>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <p class="text-white font-size-h3 font-w300 mb-0">
                                            +{{$guests}}
                                        </p>
                                        <p class="text-white-75 mb-0">
                                            Total Guests
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a class="block block-rounded block-link-shadow bg-success" href="#">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="far fa-2x fa fa-money text-success-light"></i>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <p class="text-white font-size-h3 font-w300 mb-0">
                                            + NRs.{{number_format($rupees)}}/-
                                        </p>
                                        <p class="text-white-75 mb-0">
                                            Today Sales
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END Cards -->
    </div>
    <!-- END Page Content -->

@endsection