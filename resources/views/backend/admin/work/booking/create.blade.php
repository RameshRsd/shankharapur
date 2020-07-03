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
                    <div class="table-responsive">
                    </div>
                </div>
            </div>

        </div>
        <!-- END Cards -->
    </div>
    <!-- END Page Content -->

@endsection