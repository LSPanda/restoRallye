/* Resto-Rally
 *
 * Script for my website
 *
 * Started @ 04/11/2014
 */

( function( $ ) {
    "user strict";

    var defaultPosition,
        mapOptions,
        gMap,
        Geocoder,
        gMarker;

    function generateGoogleMap() {
        //Set position to Bruxelle
        defaultPosition = new google.maps.LatLng( 50.8504500, 4.3487800 );
        //Init mapOptions
        mapOptions = {
            center: defaultPosition,
            zoom: 17,
            disableDefaultUI: true,
            scrollwheel: false,
            draggable: false,
            mapTypeId: google.maps.MapTypeId.ROADMAPx
        }
        //Init Geocoder
        Geocoder = new google.maps.Geocoder();
        selectedAdress();
        //Set defaultGmap
        gMap = new google.maps.Map( document.getElementById( "slideMap" ), mapOptions );
    }

    function selectedAdress() {
        Geocoder.geocode( { 'address': myAddress}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                gMap.setCenter(results[0].geometry.location);
                gMarker = new google.maps.Marker( {
                    map: gMap,
                    position: results[0].geometry.location
                } );
            }
        } );
    }

    $( function() {
        //Detect scroll for stick and reduce my nav-menu
        $( "body" ).scroll( function() {
            $( "header nav" ).addClass( "stick" );
        } );

        //Generate google gMap for event
        generateGoogleMap();
    } );

} ) (jQuery);
