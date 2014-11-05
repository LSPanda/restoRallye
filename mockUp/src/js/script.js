/* Resto-Rally
 *
 * Script for my website
 *
 * Started @ 04/11/2014
 */

( function( $ ) {
    "user strict";

    $( function() {
        //Detect scroll for stick and reduce my nav-menu
        $( "body" ).scroll( function() {
            $( "header nav" ).addClass( "stick" );
        } );
    } );

} ) (jQuery);
