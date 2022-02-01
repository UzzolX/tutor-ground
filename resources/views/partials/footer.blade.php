<footer class="site-footer">
    <div class="container">


        <div class="row">
            <div class="col-md-4">
                <h3 class="footer-heading mb-4 text-white">About</h3>
                <p>A Platform designed to make the process of finding a tution and teachers easier for the user.</p>
                <p><a href="#" class="btn btn-primary pill text-white px-4">Read More</a></p>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
                        <ul class="list-unstyled">
                            <li><a href="">Contact</a></li>
                            <li><a href="">For Student</a></li>
                            <li><a href="">For Teacher</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h3 class="footer-heading mb-4 text-white">Quick Menu 2</h3>
                        <ul class="list-unstyled">
                            <li><a href="">All Tutions</a></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-md-2">
                <div class="col-md-12">
                    <h3 class="footer-heading mb-4 text-white">Social Icons</h3>
                </div>
                <div class="col-md-12">
                    <p>
                        <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                        <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                        <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                        <a href="#" class="p-2"><span class="icon-vimeo"></span></a>

                    </p>
                </div>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All Rights Reserved <br> This website a final year project submitted in partial fulfillment of the requirement for the award of the Degree of BSc in CSE.
                </p>
            </div>

        </div>
    </div>
</footer>

<script src="{{asset('frontend-assets/external/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('frontend-assets/external/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('frontend-assets/external/js/jquery-ui.js')}}"></script>
<script src="{{asset('frontend-assets/external/js/popper.min.js')}}"></script>
<script src="{{asset('frontend-assets/external/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend-assets/external/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend-assets/external/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('frontend-assets/external/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend-assets/external/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend-assets/external/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('frontend-assets/external/js/aos.js')}}"></script>
<script src="{{asset('frontend-assets/external/js/mediaelement-and-player.min.js')}}"></script>
<script src="{{asset('frontend-assets/external/js/main.js')}}"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var mediaElements = document.querySelectorAll('video, audio'),
            total = mediaElements.length;

        for (var i = 0; i < total; i++) {
            new MediaElementPlayer(mediaElements[i], {
                pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                shimScriptAccess: 'always',
                success: function() {
                    var target = document.body.querySelectorAll('.player'),
                        targetTotal = target.length;
                    for (var j = 0; j < targetTotal; j++) {
                        target[j].style.visibility = 'visible';
                    }
                }
            });
        }
    });
</script>


<script>
    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */
            (document.getElementById('autocomplete')), {
                types: ['geocode']
            });

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4ulk5EmMtvj-hH5MydHwOwSIlGTbHHD8&libraries=places&callback=initAutocomplete" async defer></script>