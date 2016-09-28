<!DOCTYPE html>
<html>

<head>
    <title>ForNeeds</title>
    <link rel="stylesheet" type="text/css" href="/assets/home.css">
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Hege Refsnes">

</head>

<body>

<div id="googlemaps"></div>
<div class="popup_result">
    <div class="arod_wdith">
        <div class="welcomemessage">Start stating Your needs using ForNeeds</div>
        <div class="loginInput">

            <div>
                <style scoped>
                    .button-success,
                    .button-error,
                    .button-warning,
                    .button-secondary {
                        color: white;
                        border-radius: 4px;
                        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
                        text-decoration: none;

                    }

                    .button-xsmall {
                        font-size: 70%;
                    }

                    .button-small {
                        font-size: 85%;
                    }

                    .button-large {
                        font-size: 110%;
                        padding: 10px;
                        outline: 0;
                        border: 0;

                    }

                    .button-xlarge {
                        font-size: 125%;
                    }

                    .button-success {
                        background: rgb(28, 184, 65);
                        /* this is a green */
                    }

                    .button-error {
                        background: rgb(202, 60, 60);
                        /* this is a maroon */
                    }

                    .button-warning {
                        background: rgb(223, 117, 20);
                        /* this is an orange */
                    }

                    .button-secondary {
                        background: rgb(66, 184, 221);
                        /* this is a light blue */
                    }
                </style>
                <span class="register-wrapper">

                    <a href="{{url("/register")}}" class="button-large pure-button button-success">Register</a>
                </span>
                <span class="spacer">

                </span>

                <span class="login-wrapper">
                <a href="{{url("/login")}}" class="button-large pure-button button-error">Login</a>
                <span>

            </div>

        </div>
    </div>
</div>

</body>
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

</html>