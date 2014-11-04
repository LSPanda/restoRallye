/* Resto-Rally
 *
 * Script for my website
 *
 * Started @ 04/11/2014
 */

 ( function( $ ) {
     "user strict";

     $( function() {
         //Detect scroll for stick my nav-menu
         $( "body" ).scroll( function() {
             console.log( "prout" );
             $( "header nav" ).addClass( "stick" );
         } );
     } );

 } ) (jQuery);
