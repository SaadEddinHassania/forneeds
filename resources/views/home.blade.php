@extends('auth.layout')
@push('styles')
<link rel="stylesheet" type="text/css" href="/assets/home.css">
@endpush
@section('content')

    <div id="googlemaps"></div>
    <div class="popup_result">
        <div class="arod_wdith">
            <form class="login-form" action="{!! url('/login') !!}" method="post">
                {!! csrf_field() !!}
                <div class="form-title">
                    <span class="form-title">Welcome.</span>
                    <span class="form-subtitle">Please login.</span>
                </div>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
                           placeholder="Username" name="email"/></div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
                           placeholder="Password" name="password"/></div>
                <div class="form-actions">
                    <button type="submit" class="btn btn red btn-block btn-flat">Sign In</button>
                </div>
                <div class="form-actions">
                    <div class="pull-left">
                        <label class="rememberme check">
                            <input type="checkbox" name="remember" value="1"/>Remember me </label>
                    </div>
                    <div class="pull-right forget-password-block">
                        <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                    </div>
                </div>
                <div class="create-account">
                    <p>
                        <a href="javascript:;" class="btn-primary btn" id="register-btn">Create an account</a>
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="{!! url('/password/reset') !!}" method="post">
                <div class="form-title">
                    <span class="form-title">Forget Password ?</span>
                    <span class="form-subtitle">Enter your e-mail to reset it.</span>
                </div>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"
                           name="email"/></div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn btn-default">Back</button>
                    <button type="submit" class="btn btn-primary uppercase pull-right">Submit</button>
                </div>
            </form>

            <form class="register-form" method="post" action="{!! url('/register') !!}">

                {!! csrf_field() !!}
                <div class="form-title">
                    <span class="form-title">Sign Up</span>
                </div>
                <p class="hint"> Enter your personal details below: </p>

                <div class="form-group ">
                    <input type="text" class="form-control" name="name" value="{!! old('name') !!}" placeholder="Full Name">
                </div>

                <div class="form-group ">
                    <input type="email" class="form-control" name="email" value="{!! old('email') !!}" placeholder="Email">
                </div>

                <div class="form-group ">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="form-group ">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                </div>

                <div class="form-group margin-top-20 margin-bottom-20">
                    <label class="check">
                        <input type="checkbox"> I agree to the <a href="#">terms</a>
                    </label>
                </div>

                <!-- /.col -->
                <div class="form-group ">
                    <button type="submit" class="btn btn red btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->

            </form>

        </div>
    </div>
@endsection
@push('scripts')
<!-- Include the Google Maps API library - required for embedding maps -->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAaNuex0pQrp9Kv2AiYwZOdMACBQ64Nl3g&sensor=false"></script>

<script type="text/javascript">
    // The latitude and longitude of your business / place
    var position = [31.898043, 35.204269];

    function showGoogleMaps() {

        var latLng = new google.maps.LatLng(position[0], position[1]);

        var mapOptions = {
            zoom: 16, // initialize zoom level - the max value is 21
            streetViewControl: false, // hide the yellow Street View pegman
            scaleControl: true, // allow users to zoom the Google Map
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: latLng
        };

        map = new google.maps.Map(document.getElementById('googlemaps'),
                mapOptions);

        // Show the default red marker at the location
        marker = new google.maps.Marker({
            position: latLng,
            map: map,
            draggable: false,
            animation: google.maps.Animation.DROP
        });
    }

    google.maps.event.addDomListener(window, 'load', showGoogleMaps);
</script>
@endpush