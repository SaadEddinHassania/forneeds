@extends('layouts.app')

@push('styles')
<link href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css"/>

@endpush
@section('content')
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="/">Home</a>
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
    <h3 class="page-title"> New User Profile | Account
        <small>user account page</small>
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
                        <img src="{{url('/profile_image')}}" class="img-responsive" alt=""></div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{$user->name}}</div>
                        <div class="profile-usertitle-job"> Service Provider</div>
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
                            <li class="{!! Request::is('profile*') ? 'active' : '' !!}">
                                <a href="{!! url('/profile') !!}">
                                    <i class="icon-home"></i> Profile </a>
                            </li>
                            <li class="{!! Request::is('profile*') ? 'active' : '' !!}">
                                <a href="{!! url('/settings') !!}">
                                    <i class="icon-settings"></i> Account Settings </a>
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
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        @if ($errors->any())
                                            <ul class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    <li data-name="">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        @endif

                                        <div id="account-message-div">

                                        </div>
                                        {!! Form::model($user, [
                                            'url' => "#",
                                            'id' =>"account-form",
                                            'data-url'=>action('ProfilePageController@postUpdate')
                                        ]) !!}
                                        {{--<form id="account-form"--}}
                                        {{--data-url="{{action('ProfilePageController@postUpdate')}}" role="form"--}}
                                        {{--action="#">--}}

                                        {!! csrf_field() !!}
                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                            {!! Form::label('name', 'Name:') !!}
                                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                        </div>

                                        <!-- Email Field -->
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                            {!! Form::label('email', 'Email:') !!}
                                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                        </div>

                                        <div class="form-group {{ $errors->has('mission_statement') ? 'has-error' : ''}}">
                                            {!! Form::label('mission_statement', 'Mission Statement:') !!}
                                            {{--<input type="text" class="form-control" name="mission_statement"--}}
                                            {{--value="{!! old('mission_statement') !!}"--}}
                                            {{--placeholder="Mission Statement">--}}
                                            {!! Form::text('serviceProvider[mission_statement]', null, ['class' => 'form-control','placeholder'=>'Mission Statement']) !!}
                                        </div>

                                        <div class="form-group {{ $errors->has('service_provider_type_id') ? 'has-error' : ''}}">
                                            {!! Form::label('service_provider_type_id', 'Type:') !!}
{{--                                            {{Form::select('serviceProvider[service_provider_type_id]', $types,$user->serviceProvider->service_provider_type_id,['class'=>'form-control'])}}--}}
                                        </div>
                                        <div class="form-group {{ $errors->has('sector_id') ? 'has-error' : ''}}">
                                            {!! Form::label('sector_id', 'Sector:') !!}
{{--                                            {{Form::select('serviceProvider[sector_id]', $sectors,$user->serviceProvider->sector_id,['class'=>'form-control'])}}--}}
                                        </div>
                                        <div class="margiv-top-10">
                                            <input type="submit" value="Save Changes" class="btn green"/>
                                            <a href="javascript:;" class="btn default"> Cancel </a>
                                        </div>
                                        {{--</form>--}}
                                        {{form::close()}}
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum
                                            eiusmod. </p>

                                        <div id="image-message-div">

                                        </div>
                                        <form action="#" role="form" id="image-form"
                                              data-url="{{action('ProfilePageController@postImage')}}"
                                              enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail"
                                                         style="width: 200px; height: 150px;">
                                                        <img src="{{url('/profile_image')}}"
                                                             alt="No image"/></div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                                         style="max-width: 200px; max-height: 150px;">

                                                    </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Select image </span>
                                                        <span class="fileinput-exists"> Change </span>
                                                        <input type="file" name="file"> </span>
                                                            <a href="javascript:;" class="btn default fileinput-exists"
                                                               data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                                <div class="clearfix margin-top-10">
                                                    <span class="label label-danger">NOTE! </span>
                                                    <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                </div>
                                            </div>
                                            <div class="margin-top-10">
                                                <input type="submit" value="Save Changes" class="btn green"/>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>

                                        {{--<div class="row">--}}
                                            {{--<div class="col-md-12">--}}
                                                {{--<div class="m-heading-1 border-green m-bordered">--}}
                                                    {{--<h3>Dropzone</h3>--}}
                                                    {{--<p> DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews. It’s lightweight, doesn’t depend on any other library (like jQuery) and is highly customizable. </p>--}}
                                                    {{--<p> For more info please check out--}}
                                                        {{--<a class="btn red btn-outline" href="http://www.dropzonejs.com/" target="_blank">the official documentation</a>--}}
                                                    {{--</p>--}}
                                                    {{--<p>--}}
                                                        {{--<span class="label label-danger">NOTE:</span> &nbsp; This plugins works only on Latest Chrome, Firefox, Safari, Opera & Internet Explorer 10. </p>--}}
                                                {{--</div>--}}
                                                {{--{!! Form::open(['url' => url('profile_image'),'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone','style'=>"width: 500px; margin-top: 50px;"]) !!}--}}

                                                {{--<div class="dz-message">--}}

                                                {{--</div>--}}

                                                {{--<div class="fallback">--}}
                                                    {{--<input name="file" type="file" multiple />--}}
                                                {{--</div>--}}

                                                {{--<div class="dropzone-previews" id="dropzonePreview"></div>--}}

                                                {{--<h4 style="text-align: center;color:#428bca;">Drop images in this area  <span class="glyphicon glyphicon-hand-down"></span></h4>--}}

                                                {{--{!! Form::close() !!}--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                    <!-- END CHANGE AVATAR TAB -->
                                    <!-- CHANGE PASSWORD TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                        <form action="#">
                                            <div class="form-group">
                                                <label class="control-label">Current Password</label>
                                                <input type="password" class="form-control"/></div>
                                            <div class="form-group">
                                                <label class="control-label">New Password</label>
                                                <input type="password" class="form-control"/></div>
                                            <div class="form-group">
                                                <label class="control-label">Re-type New Password</label>
                                                <input type="password" class="form-control"/></div>
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn green"> Change Password </a>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE PASSWORD TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
@endsection
@push('styles')
<link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css"/>
@endpush

@push('scripts')
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="/assets/survey_widget.js" type="text/javascript"></script>
<script src="/assets/pages/scripts/form-wizard.min.js"></script>
<script src="/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-validation/js/jquery.validate.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>


<script src="/assets/pages/scripts/components-date-time-pickers.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>

<script src="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>



<script src="/assets/pages/scripts/profile.min.js" type="text/javascript"></script>
<script src="/assets/pages/scripts/timeline.min.js" type="text/javascript"></script>

<script>
    $('#account-form').on('submit', function (e) {
        e.preventDefault();
        var url = $(this).data('url');
        $.ajax({
            url: url,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $('#account-form').serialize(),
            error: function (data) {
                var errors = data.responseJSON;
//                console.log(JSON.parse(errors));
                var errorString = '<ul class="alert alert-danger">';
                $.each(errors, function (key, value) {
                    errorString += '<li>' + value + '</li>';
                });
                errorString += '</ul>';

                $('#account-message-div').html(errorString);
                console.log(errorString);
                // Render the errors with js ...
            }
        }).done(function (data) {
            var errorString = '<ul class="alert alert-success">';
            $.each(data, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $('#account-message-div').html(errorString);
        }).always(function (data) {
        });
    });
</script>

<script>
    $('#image-form').on('submit', function (e) {
        e.preventDefault();
        var url = $(this).data('url');
        $.ajax({
            url: url,
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: new FormData(this),
            async: false,
            cache: false,
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            error: function (data) {
                var errors = data.responseJSON;
                var errorString = '<ul class="alert alert-danger">';
                $.each(errors, function (key, value) {
                    errorString += '<li>' + value + '</li>';
                });
                errorString += '</ul>';

                $('#image-message-div').html(errorString);
                console.log(errorString);
                // Render the errors with js ...
            }
        }).done(function (data) {
            var errorString = '<ul class="alert alert-success">';
            $.each(data, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $('#image-message-div').html(errorString);
        });
    });
</script>
@endpush

@push('styles')

<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush