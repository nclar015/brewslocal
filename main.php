<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="CSS/localbeer.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image/png"  href="/brewslocal/favicon.png">
<title>Brews Local</title>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlvYsccij3PXmDbBbPHS_cUYI312mRl50&callback=initMap" async defer></script>
<!-- Google Maps and Places API -->
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
 
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 


    <script src="http://maps.google.com/maps/api/js?sensor=false"
            type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[
    var customIcons = {
      Brewery: {
        icon: '/HopMarker.png'

      },
      Brewpub: {
        icon: '/BlueBrewpubMarker.png'        
       
      }
    };

var gmarkers1 = [];



    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(currentlat, currentlng),
        zoom: 15,
        mapTypeId: 'roadmap'
       });
 var geocoder = new google.maps.Geocoder();

   var address = 'Tappahannock,VA';


   geocoder.geocode({'address': address}, function(results, status) {
                                            if(status == google.maps.GeocoderStatus.OK) 
                                            {
                                                var bounds = new google.maps.LatLngBounds();
                                                document.write(bounds.extend(results[0].geometry.location));
                                                map.fitBounds(bounds);
                                                new google.maps.Marker(
                                            {
                                               position:results[0].geometry.location,
                                               map: map
                                             }
                                             );

                                         }

                                      }
                    );






      var infoWindow = new google.maps.InfoWindow;
      // Change this depending on the name of your PHP file
      downloadUrl("phpsqlajax_genxml.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var id = markers[i].getAttribute("id");
          var lat = markers[i].getAttribute("lat");
          var lng = markers[i].getAttribute("lng");
          var type = markers[i].getAttribute("type");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<div class='infoblock'><h1>" + name + "</h1> <a href='/brewery?id=" + id + "'><img src='https://maxcdn.icons8.com/Color/PNG/96/Business/shop-96.png' title='Shop' width='96'></a><a href='http://www.google.com/maps/?q=" + point + "' target='_blank'><img src='https://maxcdn.icons8.com/Color/PNG/96/Maps/map_marker-96.png' title='Map Marker' width='96'></a></div>";
          var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon,
            type: type,
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(0, 0),
            shadow: icon.shadow
          });
    gmarkers1.push(markers);

filterMarkers = function (type) {
    for (i = 0; i < markers.length; i++) {
        marker = gmarkers1[i];
        // If is same category or category not picked
        if (marker.type == type || type.length === 0) {
            marker.setVisible(true);
        }
        // Categories don't match 
        else {
            marker.setVisible(false);
        }
    }
}
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });


    }
    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }


    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;
      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };
      request.open('GET', url, true);
      request.send(null);
    }





    function doNothing() {}
    //]]>


  </script>



  </head>

  <body onload="load()">
   <?php 
   include("header.php");
$typeOption = $_POST['typeOption'];

?>






 <div class="filterbar" id="filterbar">
    <div class="filterblock">
 <input type="checkbox" id="checkone">
<select id="type" onchange="filterMarkers(this.value);">
<option selected="true" disabled="disabled">All Types</option>  
  <option value="Brewery">Brewery</option>
  <option value="Brewpub">Brewpub</option>
  <option value="Cidery">Cidery</option>
 </select>



</div></div>
   
<div id="choice"><div id="main-container"><h1 onclick="fb_login()">Login w/ Facebook</h1></div></div>
<div id="map" style="    height: 100%;
    width: 100%;
    left: 0;
    position: absolute;
    z-index: 1;
    top: 0;"></div>
  </body>
<script>
$( "#clickmap" ).click(function() {
  $( "#choice" ).slideUp(  function() {

  });

});

var googleapisearch = document.getElementById('txtvarInput').value;
var xhReq = new XMLHttpRequest();
xhReq.open("GET", 'https://maps.googleapis.com/maps/api/geocode/json?address=Richmond,+VA', false);
xhReq.send(null);
var jsonObject = JSON.parse(xhReq.responseText);
var currentlat = JSON.stringify(jsonObject.results[0]["geometry"]["location"]["lat"]);
var currentlng = JSON.stringify(jsonObject.results[0]["geometry"]["location"]["lng"]);


</script>
</html>