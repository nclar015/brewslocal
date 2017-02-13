<!doctype html>
<html>
<head>
<?php
include("config.php");
include("header.php");
?>
</head>
  <body >
<?php

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_parts = parse_url($url);
parse_str($url_parts['query'], $query_parts);
$breweryid = $query_parts["id"];


$sql="SELECT * FROM Breweries WHERE id='$breweryid'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);



$name = $row["name"];
$street = $row['street'];
$city = $row['city'];
$state = $row['state'];
$zip = $row['zip'];
$lat = $row["lat"];
$lng = $row["lng"];
$type = $row["type"];
$logo = $row["logo"];
$facebook = $row["facebook"];
$instagram = $row["instagram"];
$twitter = $row["twitter"];
$website = $row["website"];
$monday = $row["monday"];
$tuesday = $row["tuesday"];
$wednesday = $row["wednesday"];
$thursday = $row["thursday"];
$friday = $row["friday"];
$saturday = $row["saturday"];
$sunday = $row["sunday"];




?>


<body>
<div class='container'>
 <form method = "post" action = "update.php/<?php echo "?id=";echo $breweryid;?>" enctype="multipart/form-data">
<h1>Info</h1>
    <h3>Name:  </h3><input type="text" class="form-control" name="namefield" value="<?php echo $name?>"/> 
    <h3>Street:   </h3><input type="text" class="form-control" name="streetfield" value="<?php echo $street?>"/> 
    <h3>City:   </h3><input type="text" class="form-control" name="cityfield" value="<?php echo $city?>"/>  
    <h3>State:   </h3><input type="text" class="form-control" name="statefield" value="<?php echo $state?>"/> 
    <h3>Zip Code:   </h3><input type="text" class="form-control" name="zipfield" value="<?php echo $zip?>"/> 
    <h3>Latitude:   </h3><input type="text" class="form-control" name="latfield" value="<?php echo $lat?>"/> 
    <h3>Longitude:   </h3><input type="text" class="form-control" name="lngfield" value="<?php echo $lng?>"/> 
    <h3>type: </h3><input type="text" class="form-control" name="typefield" value="<?php echo $type?>"/>
<h1 >Social</h1>
    <p style="display: block; margin: auto;"><img style="display:block;margin: 20px auto 10px;width: 140px; height: auto;" src="<?php echo $logo?>"/><input type="text" class="form-control" name="logofield" style="display:none !important;" value="<?php echo $logo?>" readonly/></p> <label class="fileclass">Update the logo<input type="file" class="form-control" id="fileToUpload"  name="fileToUpload" /></label>
    <h3>facebook:  </h3><input type="text" class="form-control" name="facebookfield" value="<?php echo $facebook?>"/>
    <h3>instagram: </h3><input type="text" class="form-control" name="instagramfield" value="<?php echo $instagram?>"/>
    <h3>twitter: </h3><input type="text" class="form-control" name="twitterfield" value="<?php echo $twitter?>"/>
    <h3>website: </h3><input type="text" class="form-control" name="websitefield" value="<?php echo $website?>"/>
<h1 class="hoursdrop">Hours<span class="caret"></span></h1>
   <div class="thedrop">
    <h3>monday:  </h3><input type="text" class="form-control" name="mondayfield" value="<?php echo $monday?>"/>
    <h3>tuesday: </h3><input type="text" class="form-control" name="tuesdayfield" value="<?php echo $tuesday?>"/>
    <h3>wednesday:  </h3><input type="text" class="form-control" name="wednesdayfield" value="<?php echo $wednesday?>"/>
    <h3>thursday: </h3><input type="text" class="form-control" name="thursdayfield" value="<?php echo $thursday?>"/>
    <h3>friday: </h3><input type="text" class="form-control" name="fridayfield" value="<?php echo $friday?>"/>
    <h3>saturday: </h3><input type="text" class="form-control" name="saturdayfield" value="<?php echo $saturday?>"/>
    <h3>sunday: </h3><input type="text" class="form-control" name="sundayfield" value="<?php echo $sunday?>"/>
   </div>

<br>   
  <input name = "update" type = "submit" 
                              class="btn btn-primary btn-lg btn-block" value = "Update" >
</form> 
</div>









</body>
  </body>

</html>