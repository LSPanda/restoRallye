!function(a){"user strict";function b(){d=new google.maps.LatLng(50.85045,4.34878),e={center:d,zoom:17,disableDefaultUI:!0,scrollwheel:!1,draggable:!1,mapTypeId:google.maps.MapTypeId.ROADMAPx},i={url:"../css/images/marker.png",size:new google.maps.Size(55,60),origin:new google.maps.Point(0,0),anchor:new google.maps.Point(20,60)},g=new google.maps.Geocoder,c(),f=new google.maps.Map(document.getElementById("slideMap"),e)}function c(){g.geocode({address:myAddress},function(a,b){b==google.maps.GeocoderStatus.OK&&(f.setCenter(a[0].geometry.location),h=new google.maps.Marker({map:f,position:a[0].geometry.location,icon:i}))})}var d,e,f,g,h,i;a(function(){a("body").scroll(function(){a("header nav").addClass("stick")}),b()})}(jQuery);