<!DOCTYPE html>
<head>
<link rel="icon" href="beer-128.png"  >
<title>BrewsLocal - Find More Local Breweries</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=places&sensor=false"></script>
<script type="text/javascript">

    //<![CDATA[

    var customIcons = {

      Brewery: {
        icon: '/brew-marker.png',
anchor: new google.maps.Point(30,0),
scale: 1

      },
      Brewpub: {
        icon: '/pub-marker.png',
anchor: new google.maps.Point(30,0),
scale: 1

      }

    };

var gmarkers1 = [];

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

var currentlat = getParameterByName('lat');
var currentlng = getParameterByName('lng');



    function initialize() {

      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(currentlat , currentlng),
        zoom: 13,
        mapTypeId: 'roadmap',
        disableDefaultUI: true,
        gestureHandling: 'greedy',
        styles: [
    {
        "featureType": "administrative",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },

    {
        "featureType": "administrative.neighborhood",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative.land_parcel",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "-100"
            },
            {
                "lightness": "35"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape.natural.terrain",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.medical",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.place_of_worship",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "0"
            },
            {
                "lightness": "34"
            }
        ]
    },

]
  });


      var infoWindow = new google.maps.InfoWindow;
      // Change this depending on the name of your PHP file
      downloadUrl("http://brewslocal.com/phpsqlajax_genxml.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var id = markers[i].getAttribute("id");
          var address = markers[i].getAttribute("longAddress");
          var lat = markers[i].getAttribute("lat");
          var lng = markers[i].getAttribute("lng");
          var type = markers[i].getAttribute("type");
          var logo = markers[i].getAttribute("logo");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<div class='infoblock'><img style='display: block; margin: auto;'src='" + logo + "' height='120px' width='auto'/><h2>" + name + "</h2><a href='/brewery?id=" +
              id + "'>Brewery Page</a><a href='http://www.google.com/maps/?q=" + point
              + "' target='_blank' style='opacity: .8;'>Location</a></div>";
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
          new ActiveXObject('http://brewslocal.com/phpsqlajax_genxml.php') :
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

    <body onload="initialize()">
        <?php include("header.php"); ?>

  
            <div id="map"></div>


                       
                    </div>


  <script>

var wage = document.getElementById("location");
wage.addEventListener("keydown", function (e) {
    if (e.keyCode === 13) {
        validate(e);
    }
});

function validate(e) {
    testlocation();
}
  function testlocation() {
    var location = document.getElementById("location").value;
    var finallocation = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + location;
     var xhReq = new XMLHttpRequest();
      xhReq.open("GET",finallocation,false);
     xhReq.send(null);
    var jsonObject = JSON.parse(xhReq.responseText);
    var status = JSON.stringify(jsonObject.status[0]);
    var error;
    switch(status){
            case '"I"': error = "Please Enter A Location";
            break;
            case '"Z"': error = "Please Enter A Valid Location";
            break;
            default: error = "Bon Voyage";
     }
     document.getElementById("error").innerHTML = error;

    var currentlat = JSON.stringify(jsonObject.results[0]["geometry"]["location"]["lat"]);
    var currentlng = JSON.stringify(jsonObject.results[0]["geometry"]["location"]["lng"]);  
    var maplink = 'map?lat=' + currentlat + '&lng=' + currentlng;
    window.location.href = "http://www.brewslocal.com/" + maplink;

 
};

            </script>
        </body>
</html>