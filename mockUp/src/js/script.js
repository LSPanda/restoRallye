/* Resto-Rally
 *
 * Script for my website
 *
 * Started @ 04/11/2014
 */

( function( $ ) {
    "user strict";

    var generateGoogleMap = function() {
        gMap = new google.maps.Map( document.getElementById("slideMap"), {
            center: new google.maps.LatLng( 50.846686, 4.352425 ),
            zoom: 12,
            disableDefaultUI: true,
            scrollwheel: false,
            draggable: false,
            mapTypeId: google.maps.MapTypeId.ROADMAPx
        } );
    }

    $( function() {
        //Detect scroll for stick and reduce my nav-menu
        $( "body" ).scroll( function() {
            $( "header nav" ).addClass( "stick" );
        } );

        generateGoogleMap();
    } );

} ) (jQuery);
