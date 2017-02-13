<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="CSS/localbeer.css" rel="stylesheet" type="text/css">
<title>Brews Local</title>
<link rel="icon" href="beer-128.png"  >
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta charset="ISO-8859-1">
    <title>Google Maps AJAX + mySQL/PHP Example</title>
  </head>

  <body >

<?php

include("config.php");
include("header.php");

echo '<div style="display: block; margin: 100px auto; padding: 0 10%;"><a href="event-add-submit-form" type="button" class="btn btn-primary">+ Add An Event</a><div id="results" style="margin-top: 25px;"></div><div class="main-container">';



$sql="SELECT *, DATE_FORMAT(EventDate,'%b %d %Y') AS niceDate  FROM Events AS BO JOIN Breweries AS TBT ON TBT.id = BO.EventBreweryId WHERE BO.EventDate > CURDATE() ORDER BY BO.EventDate ASC ";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

$id = $row["BO.GUID"];
$name = $row["BO.EventName"];
$logo = $row["BO.EventLogo"];
$description = $row["BO.EventDescription"];
$date = $row["BO.EventDate"];
$link = $row["BO.EventLink"];
$brewery = $row["id"];
$breweryid = $row["BO.EventBreweryId"];



$breweryname = $row2["breweryname"];

while ($row = @mysql_fetch_assoc($result)){
  echo '<div class="masonblock"><img src="';
  echo $row["EventLogo"];
  echo '"/><h4>';
  echo $row["EventName"];
  echo '</h4><h4>';
  echo $row["niceDate"];
  echo '</h4><a href="';
  echo $row["EventLink"];
  echo '" type="button" class="btn btn-primary" target="_blank" style="display: block;border-radius: 0;">View The Event';
  echo '</a>';
  echo '<a href="brewery?id=';
  echo $row["EventBreweryId"];
  echo '" type="button" class="btn btn-primary" target="_blank" style="display: block;border-radius: 0; opacity: .8;">';
  echo $row["name"];
  echo '</a>';
  echo '</div>';
}



?>
</div></div>
  </body>

</html>