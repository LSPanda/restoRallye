/* Resto-Rally
 *
 * Script for my website
 *
 * Started @ 04/11/2014
 */

( function( $ ) {
    "user strict";

    var gMap,
        gMarker,
        oPosition;


    var generateGoogleMap = function() {
        oPosition = new google.maps.LatLng( long, lat );

        gMap = new google.maps.Map( document.getElementById("slideMap"), {
            center: oPosition,
            zoom: 17,
            disableDefaultUI: true,
            scrollwheel: false,
            draggable: false,
            mapTypeId: google.maps.MapTypeId.ROADMAPx
        } );

        gMarker = new google.maps.Marker( {
            position: oPosition,
            map: gMap
        } );
    }

    $( function() {
        //Detect scroll for stick and reduce my nav-menu
        $( "body" ).scroll( function() {
            $( "header nav" ).addClass( "stick" );
        } );

        //Generate google map for event
        generateGoogleMap();
    } );

} ) (jQuery);
