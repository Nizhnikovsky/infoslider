@extends('layout.main')
@section('title',setting('site.title'). " - Contacts")
@section('content')
<div class="offset"></div>
<div id="map"></div>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-1d0TKwmMNlSWA3PGU8AT6TqkujrVU40&amp;callback=initMap"></script>
<script> google.maps.event.addDomListener(window, 'load', init);
    var map;

    function init() {
        var mapOptions = {
            center: new google.maps.LatLng(59.938851, 30.350845),
            zoom: 13,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.DEFAULT,
            },
            disableDoubleClickZoom: false,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
            },
            scaleControl: true,
            scrollwheel: false,
            streetViewControl: true,
            draggable: true,
            overviewMapControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{stylers: [{saturation: -100}, {gamma: 1}]}, {
                elementType: "labels.text.stroke",
                stylers: [{visibility: "off"}]
            }, {
                featureType: "poi.business",
                elementType: "labels.text",
                stylers: [{visibility: "off"}]
            }, {
                featureType: "poi.business",
                elementType: "labels.icon",
                stylers: [{visibility: "off"}]
            }, {
                featureType: "poi.place_of_worship",
                elementType: "labels.text",
                stylers: [{visibility: "off"}]
            }, {
                featureType: "poi.place_of_worship",
                elementType: "labels.icon",
                stylers: [{visibility: "off"}]
            }, {
                featureType: "road",
                elementType: "geometry",
                stylers: [{visibility: "simplified"}]
            }, {
                featureType: "water",
                stylers: [{visibility: "on"}, {saturation: 50}, {gamma: 0}, {hue: "#50a5d1"}]
            }, {
                featureType: "administrative.neighborhood",
                elementType: "labels.text.fill",
                stylers: [{color: "#333333"}]
            }, {
                featureType: "road.local",
                elementType: "labels.text",
                stylers: [{weight: 0.5}, {color: "#333333"}]
            }, {featureType: "transit.station", elementType: "labels.icon", stylers: [{gamma: 1}, {saturation: 50}]}]
        }

        var mapElement = document.getElementById('map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var locations = [
            ['Boudewijn Ostenstraat 2', 59.938851, 30.350845]
        ];
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                icon: 'images/map-pin.png',
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });
        }
    }
</script>
<div class="light-wrapper">
    <div class="container inner">
        <div class="row">
            <div class="col-sm-8">
                <h2 class="section-title">Форма для связи</h2>
                <p>{!! $contacts->form_description !!}</p>
                <div class="divide10"></div>
                <div class="form-container">
                    <form class="vanilla vanilla-form"  novalidate="novalidate" id="myContactsForm">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-field">
                                    <label>
                                        <input type="text" name="name" placeholder="Your name" id="contactName">
                                    </label>
                                </div>
                                <!--/.form-field -->
                            </div>
                            <!--/column -->
                            <div class="col-sm-6">
                                <div class="form-field">
                                    <label>
                                        <input type="email" name="email" placeholder="Your e-mail" id="contactEmail">
                                    </label>
                                </div>
                                <!--/.form-field -->
                            </div>
                            <!--/column -->
                            <div class="col-sm-6">
                                <div class="form-field">
                                    <label>
                                        <input type="tel" name="phone" placeholder="Phone" id="contactPhone">
                                    </label>
                                </div>
                                <!--/.form-field -->
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                        <textarea name="message" placeholder="Type your message here..." id="messageBody"></textarea>
                        <input type="button" class="btn" value="Send" data-error="Fix errors"
                               data-processing="Sending..." data-success="Thank you!" id="sendMessage">
                        <footer class="notification-box" >
                            <div class="alert" id="alertMessage" hidden>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                 </div>
                        </footer>
                    </form>
                    <!--/.vanilla-form -->
                </div>
                <!--/.form-container -->

            </div>
            <!--/column -->

            <aside class="col-sm-4">
                <div class="sidebox widget">
                    <h3 class="widget-title">Адрес</h3>
                    <p>{!! $contacts->description !!}</p>
                    <address>
                        <strong>{{$contacts->country.",".$contacts->city}}</strong><br>
                        {{$contacts->address}}<br>
                        <abbr title="Телефон">P:</abbr> {{$contacts->phone}} <br>
                        <abbr title="Email">E:</abbr> <a href="mailto:#">{{$contacts->email}}</a>
                    </address>
                </div>
                <!-- /.widget -->

            </aside>
            <!--/column -->

        </div>
        <!--/.row -->

    </div>
    <!--/.container -->
</div>
<!--/.light-wrapper -->
@stop
{{--@section('scripts')--}}
{{--    @parent--}}
{{--    <script src="{{asset("/js/form.js")}}"></script>--}}
{{--@stop--}}
