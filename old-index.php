<!DOCTYPE html>
<head>
<link rel="icon" href="beer-128.png"  >
<title>BrewsLocal - Find Local Breweries From Across The Country</title>
<meta name="description" content="BrewsLocal - Mapping all of the breweries from across the USA. Find their beers, images & events. If you don't see one you know add it!">
<meta name="keywords" content="brewslocal, brewery, local, beer, craft beer, beer website">
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCxa6PdHbdFzqspKzd3BXIWqFimEpk3l2E" type="text/javascript"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=places&sensor=false"></script>
</head>
<body>
      <?php  include("header.php"); ?>
   <div class="main-container">
    <div class="inside-container">
      <div class="jumbotron">
         <h1>Find A Brewery Near You</h1>
             <div style=" margin: 30px auto;" ><input type="text" name="location" id="location" class="main-input" placeholder="Enter A Location"><button type="submit"  onclick="testlocation()" class="btn" id="location-button" >Locate</button><h2 id="error"></h2></div>

                       
                    </div>
                </div>

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