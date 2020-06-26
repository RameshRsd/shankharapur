@extends('backend.front')
@section('body')
    <div id="page-container" class="sidebar-o sidebar-dark side-scroll page-header-fixed page-header-dark main-content-boxed">

        <!-- Sidebar -->
        <!--
            Sidebar Mini Mode - Display Helper classes

            Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
            Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

            Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
            Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
            Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
        -->
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header (mini Sidebar mode) -->
            <div class="smini-visible-block">
                <div class="content-header bg-header-dark">
                    <!-- Logo -->
                    <a class="link-fx font-size-lg text-white" href="{{url('')}}">
                        <img src="{{asset('property/logo-white.png')}}" alt="hotelshankharpur.com" style="width: 200px;">
                    </a>
                    <!-- END Logo -->
                </div>
            </div>
            <!-- END Side Header (mini Sidebar mode) -->

            <!-- Side Header (normal Sidebar mode) -->
            <div class="smini-hidden">
                <div class="content-header justify-content-lg-center bg-header-dark">
                    <!-- Logo -->
                    <a class="link-fx font-size-lg text-white" href="{{url('')}}">
                        <img src="{{asset('property/logo-white.png')}}" alt="hotelshankharpur.com" style="width: 200px;">
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div class="d-lg-none">
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-times-circle"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
            </div>
            <!-- END Side Header (normal Sidebar mode) -->

            <!-- Side Actions -->
            <div class="content-side content-side-full text-center bg-dark">
                <div class="smini-hide">
                    <img class="img-avatar img-avatar-thumb bg-white" data-toggle="modal" data-target="#updatePhoto" src="{{asset('default'.'/'.\Illuminate\Support\Facades\Auth::user()->photo)}}" alt="">
                    <div class="mt-3 font-w600">{{\Illuminate\Support\Facades\Auth::user()->admin->company_head}}</div>
                    <span class="link-fx text-muted" ><small class="badge badge-success">{{\Illuminate\Support\Facades\Auth::user()->admin->head_position}}</small></span>
                </div>
            </div>
            <!-- END Side Actions -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link @if(request()->segment('2')=='') active @endif" href="{{url('login')}}">
                            <i class="nav-main-link-icon fa fa-dashboard"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Profile Manage</li>
                    <li class="nav-main-item  @if(request()->segment('2')=='profile-manage') open @endif">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{url('admin/profile-manage')}}">
                            <i class="nav-main-link-icon fa fa-user"></i>
                            <span class="nav-main-link-name">Profile</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link @if(request()->segment('3')=='edit-profile') active @endif" href="{{url('admin/profile-manage/edit-profile')}}">
                                    <i class="nav-main-link-icon fa fa-user-edit"></i>
                                    <span class="nav-main-link-name">Edit Profile</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="javascript:void(0)" data-toggle="modal" data-target="#changePassword">
                                    <i class="nav-main-link-icon fa fa-exchange"></i>
                                    <span class="nav-main-link-name">Change Password</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-heading">Guest Manage</li>
                    <li class="nav-main-item @if(request()->segment('2')=='guests') open @endif">
                        <a class="nav-main-link @if(request()->segment('2')=='guests') active @endif" href="{{url('admin/guests')}}">
                            <i class="nav-main-link-icon fa fa-user"></i>
                            <span class="nav-main-link-name">Guests</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Room Manage</li>
                    <li class="nav-main-item @if(request()->segment('2')=='accommodations') open @endif">
                        <a class="nav-main-link @if(request()->segment('3')=='accommodations') active @endif" href="{{url('admin/room-manage/accommodations')}}">
                            <i class="nav-main-link-icon fa fa-arrow-alt-circle-right"></i>
                            <span class="nav-main-link-name">Accommodations</span>
                        </a>
                    </li>
                    <li class="nav-main-item @if(request()->segment('2')=='rooms') open @endif">
                        <a class="nav-main-link @if(request()->segment('3')=='rooms') active @endif" href="{{url('admin/room-manage/rooms')}}">
                            <i class="nav-main-link-icon fa fa-arrow-alt-circle-right"></i>
                            <span class="nav-main-link-name">Room List</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Location Manage</li>
                    <li class="nav-main-item  @if(request()->segment('2')=='location-manage') open @endif">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{url('admin/profile-manage')}}">
                            <i class="nav-main-link-icon fa fa-map"></i>
                            <span class="nav-main-link-name">Locations</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link @if(request()->segment('3')=='countries') active @endif" href="{{url('admin/location-manage/countries')}}">
                                    <i class="nav-main-link-icon fa fa-arrow-alt-circle-right"></i>
                                    <span class="nav-main-link-name">Country</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div>
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-stream fa-flip-horizontal"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Open Search Section -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                {{--<button type="button" class="btn btn-dual" data-toggle="layout" data-action="header_search_on">--}}
                {{--<i class="fa fa-fw fa-search"></i> <span class="ml-1 d-none d-sm-inline-block">Search..</span>--}}
                {{--</button>--}}
                <!-- END Open Search Section -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div>

                    <!-- Notifications Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-info-circle"></i>
                            <span class="badge badge-danger badge-pill">1</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                            <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                Notifications

                            </div>
                            <ul class="nav-items my-2">
                                <a href="#" class="badge badge-light" style="float: right;"><i class="fa fa-check"></i> Mark all as Read</a>
                                <div style="clear: both;"></div>
                                <li>
                                    <a class="text-dark media py-2" href="3">
                                        <div class="mx-3">
                                            <i class="fa fa-fw fa-check-circle text-warning"></i>
                                        </div>
                                        <div class="media-body font-size-sm pr-2">
                                            <div class="font-w600">Someone message you</div>
                                            <div class="text-muted font-italic">3 min ago</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p-2 border-top">
                                <a class="btn btn-light btn-block text-center" href="{{url('admin/notifications?status=unseen')}}">
                                    <i class="fa fa-fw fa-eye mr-1"></i> View All
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END Notifications Dropdown -->
                @php
                    $userImg = asset('default'.'/'.\Illuminate\Support\Facades\Auth::user()->photo);
                    $full_name = \Illuminate\Support\Facades\Auth::user()->admin->company_head;
                    $position = \Illuminate\Support\Facades\Auth::user()->admin->head_position;
                    $profile_link = url('admin/profile-manage/edit-profile');
                @endphp
                <!-- User Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-dual dropdown-toggle" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="img-avatar img-avatar32 img-avatar-thumb bg-white" src="{{$userImg}}" alt="{{$full_name}}">
                            <span class="d-none d-sm-inline ml-1">{{$full_name}}</span>
                            <span class="badge badge-pill badge-warning ml-1">Admin</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg p-0" aria-labelledby="page-header-user-dropdown">
                            <div class="rounded-top font-w600 text-white text-center bg-image" style="background-image: url('{{asset('property/banner.png')}}');">
                                <div class="p-3">
                                    <img class="img-avatar img-avatar-thumb bg-white" data-toggle="modal" data-target="#updatePhoto" src="{{$userImg}}" alt="{{$full_name}}">
                                </div>
                                <div class="p-3 bg-black-75">
                                    <a class="text-white font-w600" href="{{url('login')}}">{{$full_name}}</a><br>
                                    <div class="text-white-75 badge badge-warning">{{$position}}</div>
                                </div>
                            </div>
                            <div class="p-2">
                                <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{$profile_link}}">
                                    Edit Profile
                                    <i class="fa fa-fw fa-user text-black-50 ml-1"></i>
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{url('logout?link='.url(''))}}">
                                    Sign Out
                                    <i class="fa fa-fw fa-sign-out-alt text-danger ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-primary">
                <div class="content-header">
                    <form class="w-100" action="be_pages_generic_search.html" method="POST">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                                    <i class="fa fa-fw fa-times-circle"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control border-0" placeholder="Search.." id="page-header-search-input" name="page-header-search-input">
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-primary-dark">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body">
            <div class="content py-0">
                <div class="row font-size-sm">
                    <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                        Developed <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://www.facebook.com/gsn.np" target="_blank">Genius Service Nepal Pvt. Ltd.</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                        <a class="font-w600" href="{{url('')}}">Admin</a> &copy; <span>{{date('Y')}}</span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- changePassword Modal -->
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Change Password</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-1">

                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full bg-white">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Change Password</p>
                            </div>
                            <!-- END Header -->

                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signin" action="{{url('admin/profile-manage/changePassword')}}" method="POST">{{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        New Password <span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Re-Type New Password <span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="password_confirmation" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center mb-0">
                                    <button type="submit" class="btn btn-hero-primary">
                                        <i class="fa fa-fw fa-save mr-1"></i> Change Now
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
    <!-- changePassword Modal -->

    <!-- Update Photo Modal -->
    <div class="modal fade" id="updatePhoto" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Update Photo</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-1">

                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full bg-white">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Update Photo</p>
                            </div>
                            <!-- END Header -->

                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signin" action="{{url('admin/profile-manage/updatePhoto')}}" method="POST" enctype="multipart/form-data">{{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center mb-2 p2 bg-white" style="width: 40%; margin: 0 auto;">
                                            <img class="img-avatar img-avatar-thumb bg-white" id="logoDisplay" src="{{asset('default'.'/'.\Illuminate\Support\Facades\Auth::user()->photo)}}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Choose File <span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <input type="file" onchange="logoURL(this);" class="form-control" id="example-group1-input1" name="photo" required>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Update Photo Modal -->

@endsection
@section('script')
    <script>
        function logoURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#logoDisplay')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection