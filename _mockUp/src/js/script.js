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
    gMarker,
    image;

    function generateGoogleMap() {
        //Set position to Bruxelle
        defaultPosition = new google.maps.LatLng( 50.8504500, 4.3487800 );
        //Init mapOptions
        mapOptions = {
            center: defaultPosition,
            zoom: 14,
            disableDefaultUI: true,
            scrollwheel: false,
            draggable: true,
            mapTypeId: google.maps.MapTypeId.ROADMAPx
        };
        //Marker rendez-vous
        imageRdv = {
            url: '../css/images/gMap/markerRdv.png',
            size: new google.maps.Size( 55,60 ),
            origin: new google.maps.Point( 0,0 ),
            anchor: new google.maps.Point( 20, 60 )
        };
        //Marker restaurant
        imageRsts = {
            url: '../css/images/gMap/markerRst.png',
            size: new google.maps.Size( 55,60 ),
            origin: new google.maps.Point( 0,0 ),
            anchor: new google.maps.Point( 20, 60 )
        };
        //Init Geocoder
        Geocoder = new google.maps.Geocoder();
        selectedAdress();
        //Set defaultGmap
        gMap = new google.maps.Map( document.getElementById( "slideMap" ), mapOptions );
    }

    function selectedAdress() {
        //Stick rendez-vous marker on gMap
        Geocoder.geocode( { 'address': addressRdv}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                gMap.setCenter(results[0].geometry.location);
                gMarker = new google.maps.Marker( {
                    map: gMap,
                    position: results[0].geometry.location,
                    icon: imageRdv
                } );
            }
        } );
        //Stick restaurants marker on gMap
        for( var i = 0; i < addressRsts.length; i++ ) {
            Geocoder.geocode( { 'address': addressRsts[i]}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    gMarker = new google.maps.Marker( {
                        map: gMap,
                        position: results[0].geometry.location,
                        icon: imageRsts
                    } );
                }
            } );
        }
    }

    $( function() {
        //Show login
        $("span#loginButton").click( function() {
            $("div.header__nav").toggleClass( "header__nav--conn" );
        } );
        //Fluide scroll for my anchor
        $( "a.fluidScroll" ).click( function( evt ) {
            evt.preventDefault();
            var target = $( this ).attr( "href" );

            $( "html, body" )
                .stop()
                .animate( { scrollTop: $( target ).offset().top }, 1000 );

            return false
        } );
        //Generate google gMap for event
        generateGoogleMap();
    } );

} ) (jQuery);
