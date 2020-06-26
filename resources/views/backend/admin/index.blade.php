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
                                +5
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
            <div class="col-md-4">
                <a class="block block-rounded block-link-shadow bg-warning" href="#">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <p class="text-white font-size-h3 font-w300 mb-0">
                                + NRs.100/-
                            </p>
                            <p class="text-white-75 mb-0">
                                Today Expenses
                            </p>
                        </div>
                        <div>
                            <i class="fa fa-info-circle text-dark"></i>
                        </div>
                    </div>
                </a>
            </div>

        </div>
        <!-- END Cards -->
    </div>
    <!-- END Page Content -->

@endsection