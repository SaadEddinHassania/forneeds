@extends('layouts.app')

@push('styles')
    <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css"/>
@endpush
@section('content')

    <div class="theme-panel hidden-xs hidden-sm">
        <div class="toggler"></div>
        <div class="toggler-close"></div>
        <div class="theme-options">
            <div class="theme-option theme-colors clearfix">
                <span> THEME COLOR </span>
                <ul>
                    <li class="color-default current tooltips" data-style="default" data-container="body"
                        data-original-title="Default"></li>
                    <li class="color-darkblue tooltips" data-style="darkblue" data-container="body"
                        data-original-title="Dark Blue"></li>
                    <li class="color-blue tooltips" data-style="blue" data-container="body"
                        data-original-title="Blue"></li>
                    <li class="color-grey tooltips" data-style="grey" data-container="body"
                        data-original-title="Grey"></li>
                    <li class="color-light tooltips" data-style="light" data-container="body"
                        data-original-title="Light"></li>
                    <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true"
                        data-original-title="Light 2"></li>
                </ul>
            </div>
            <div class="theme-option">
                <span> Theme Style </span>
                <select class="layout-style-option form-control input-sm">
                    <option value="square" selected="selected">Square corners</option>
                    <option value="rounded">Rounded corners</option>
                </select>
            </div>
            <div class="theme-option">
                <span> Layout </span>
                <select class="layout-option form-control input-sm">
                    <option value="fluid" selected="selected">Fluid</option>
                    <option value="boxed">Boxed</option>
                </select>
            </div>
            <div class="theme-option">
                <span> Header </span>
                <select class="page-header-option form-control input-sm">
                    <option value="fixed" selected="selected">Fixed</option>
                    <option value="default">Default</option>
                </select>
            </div>
            <div class="theme-option">
                <span> Top Menu Dropdown</span>
                <select class="page-header-top-dropdown-style-option form-control input-sm">
                    <option value="light" selected="selected">Light</option>
                    <option value="dark">Dark</option>
                </select>
            </div>
            <div class="theme-option">
                <span> Sidebar Mode</span>
                <select class="sidebar-option form-control input-sm">
                    <option value="fixed">Fixed</option>
                    <option value="default" selected="selected">Default</option>
                </select>
            </div>
            <div class="theme-option">
                <span> Sidebar Menu </span>
                <select class="sidebar-menu-option form-control input-sm">
                    <option value="accordion" selected="selected">Accordion</option>
                    <option value="hover">Hover</option>
                </select>
            </div>
            <div class="theme-option">
                <span> Sidebar Style </span>
                <select class="sidebar-style-option form-control input-sm">
                    <option value="default" selected="selected">Default</option>
                    <option value="light">Light</option>
                </select>
            </div>
            <div class="theme-option">
                <span> Sidebar Position </span>
                <select class="sidebar-pos-option form-control input-sm">
                    <option value="left" selected="selected">Left</option>
                    <option value="right">Right</option>
                </select>
            </div>
            <div class="theme-option">
                <span> Footer </span>
                <select class="page-footer-option form-control input-sm">
                    <option value="fixed">Fixed</option>
                    <option value="default" selected="selected">Default</option>
                </select>
            </div>
        </div>
    </div>
    <!-- END THEME PANEL -->
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>User</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown">
                    Actions
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">
                            <i class="icon-bell"></i> Action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-shield"></i> Another action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-user"></i> Something else here</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <i class="icon-bag"></i> Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> User Profile
        <small></small>
    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{url('/profile/image')}}" class="img-responsive" alt=""></div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{$user->name}}</div>
                        <div class="profile-usertitle-job"> User</div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                        <button type="button" class="btn btn-circle red btn-sm">Message</button>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="page_user_profile_1.html">
                                    <i class="icon-home"></i> Overview </a>
                            </li>
                            <li>
                                <a href="page_user_profile_1_account.html">
                                    <i class="icon-settings"></i> Account Settings </a>
                            </li>
                            <li>
                                <a href="page_user_profile_1_help.html">
                                    <i class="icon-info"></i> Help </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->
                <div class="portlet light ">
                    <!-- STAT -->
                    <div class="row list-separated profile-stat">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 37</div>
                            <div class="uppercase profile-stat-text"> Projects</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 51</div>
                            <div class="uppercase profile-stat-text"> Tasks</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 61</div>
                            <div class="uppercase profile-stat-text"> Uploads</div>
                        </div>
                    </div>
                    <!-- END STAT -->
                    <div>
                        <h4 class="profile-desc-title">About Marcus Doe</h4>
                        <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <a href="http://www.keenthemes.com">www.keenthemes.com</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-twitter"></i>
                            <a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-facebook"></i>
                            <a href="http://www.facebook.com/keenthemes/">keenthemes</a>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption caption-md">
                                <i class="icon-bar-chart theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Your Services Requests</span>
                                <span class="caption-helper hide">weekly stats...</span>
                            </div>

                        </div>
                        <div class="portlet-body">
                            @include("service_requests.create")
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PORTLET -->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption caption-md">
                                    <i class="icon-bar-chart theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Your Services Requests</span>
                                    <span class="caption-helper hide">weekly stats...</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                            <input type="radio" name="options" class="toggle" id="option1">Today</label>
                                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                            <input type="radio" name="options" class="toggle" id="option2">Week</label>
                                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                            <input type="radio" name="options" class="toggle" id="option2">Month</label>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row number-stats margin-bottom-30">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="stat-left">
                                            <div class="stat-chart">
                                                <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                <div id="sparkline_bar"></div>
                                            </div>
                                            <div class="stat-number">
                                                <div class="title"> Total</div>
                                                <div class="number"> 2460</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="stat-right">
                                            <div class="stat-chart">
                                                <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                <div id="sparkline_bar2"></div>
                                            </div>
                                            <div class="stat-number">
                                                <div class="title"> New</div>
                                                <div class="number"> 719</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-scrollable table-scrollable-borderless">
                                    <table class="table table-hover table-light">
                                        <thead>
                                        <tr class="uppercase">
                                            <th > id </th>
                                            <th> service type</th>
                                            <th> location</th>
                                            <th> state</th>
                                        </tr>
                                        </thead>
                                        @foreach ($sRequests as $sRequest)
                                        <tr>
                                            <td>
                                                {{$sRequest->id}}
                                            </td>
                                            <td> {{$sRequest->serviceType->name}}</td>
                                            <td> {{$sRequest->location_meta_id}}</td>
                                            <td> {{$sRequest->state}}</td>
                                        </tr>
                                        @endforeach

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END PORTLET -->
                    </div>

                </div>

            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
    {{--</div>--}}
    <!-- END CONTENT BODY -->
    {{--</div>--}}

@endsection


@push('scripts')

<script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script src="../assets/global/plugins/gmaps/gmaps.min.js" type="text/javascript"></script>


<script src="../assets/pages/scripts/profile.min.js" type="text/javascript"></script>
<script src="../assets/pages/scripts/timeline.min.js" type="text/javascript"></script>
@endpush