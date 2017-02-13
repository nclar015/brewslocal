<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="CSS/localbeer.css" rel="stylesheet" type="text/css">
<link rel="icon" href="beer-128.png"  >
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta charset="ISO-8859-1">
</head>

  <body >
<?php

include("config.php");
include("header.php");
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_parts = parse_url($url);
parse_str($url_parts['query'], $query_parts);
$breweryid = $query_parts["id"];


$sql="SELECT * FROM Breweries WHERE id='$breweryid'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);


$conn = new mysqli($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

$sql1="SELECT * FROM brewery_images WHERE id='$breweryid' ORDER BY GUID DESC";
$result1 = $conn->query($sql1);

$sql2="SELECT * FROM beers WHERE brewery_id='$breweryid' ORDER BY GUID DESC";
$result2 = $conn->query($sql2);


$sql3="SELECT *, DATE_FORMAT(EventDate,'%b %d %Y') AS niceDate  FROM Events WHERE EventBreweryId='$breweryid' AND EventDate > CURDATE() ORDER BY EventDate ASC ";
$result3 = $conn->query($sql3);


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



echo '<head><title>BrewsLocal - ';
echo $name;
echo ' - ';
echo $city;
echo ', ';
echo $state;
echo '</title><meta name="description" content="';
echo $name;
echo ' - ';
echo $city;
echo ', ';
echo $state;
echo ' - Visit the brewery page to see their images, beers, events and more. Check out if they are open and see how close you are to them."><meta name="keywords" content="';
echo $name;
echo ',craft beer,';
echo $city;
echo ',';
echo $state;
echo ',beer,';
echo $city;
echo ',brewery"></head>';

echo "<div class='spacer'></div><div class='breweryblock'><div class='column1'><div class='brewerylogo'><img src='";
echo $logo;
echo "'/></div><h1>";
echo $name;
echo "</h1>";
echo "<h2>";
echo $street;
echo ", ";
echo $city;
echo " ";
echo $state;
echo " ";
echo $zip;
echo "</h2>";
echo "<div class='socialicon'><a href='";
echo $facebook;
echo "' target='_blank'><img src='https://maxcdn.icons8.com/Color/PNG/96/Social_Networks/facebook-96.png' title='Facebook' width='96'></a><a href='";
echo $twitter;
echo "' target='_blank'><img src='https://maxcdn.icons8.com/Color/PNG/96/Social_Networks/twitter-96.png' title='Twitter' width='96'></a><a href='";
echo $instagram;
echo "' target='_blank'><img src='https://maxcdn.icons8.com/Color/PNG/96/Social_Networks/instagram-96.png' title='Instagram' width='96'></a><a href='http://";
echo $website;
echo "' target='_blank'><img src='https://maxcdn.icons8.com/Color/PNG/96/Network/domain-96.png' title='Domain' width='96'></a></div></div>";
echo "<div class='column2'><div class='hours'><div class='hourblock'><h2>Open Times</h2></div>";
echo "<div class='hourblock'><h4>Monday</h4><h4 style='text-align:right;'>";
echo $monday;
echo "</h4></div>";
echo "<div class='hourblock'><h4>Tuesday</h4><h4 style='text-align:right;'>";
echo $tuesday;
echo "</h4></div>";
echo "<div class='hourblock'><h4>Wednesday</h4><h4 style='text-align:right;'>";
echo $wednesday;
echo "</h4></div>";
echo "<div class='hourblock'><h4>Thursday</h4><h4 style='text-align:right;'>";
echo $thursday;
echo "</h4></div>";
echo "<div class='hourblock'><h4>Friday</h4><h4 style='text-align:right;'>";
echo $friday;
echo "</h4></div>";
echo "<div class='hourblock'><h4>Saturday</h4><h4 style='text-align:right;'>";
echo $saturday;
echo "</h4></div>";
echo "<div class='hourblock'><h4>Sunday</h4><h4 style='text-align:right;'>";
echo $sunday;
echo "</h4></div></div></div>";

echo "</div>";

echo "</div>";



echo "</div>";
echo "</div>";


echo "<div class='breweryblock'>";

echo "<div style='width: 100%;height: 80px;'><a href='image?id=";
echo $breweryid;
echo "' class='btn btn-primary pull-right' target='_blank' >+ Add An Image</a></div><div class='heightcontain'>";
if ($result1->num_rows > 0) {
    while($row1 = $result1 ->fetch_assoc()) {
           echo "<div class='card2'><img src='";
    echo $row1["image"];
    echo "'height='100%' width='auto'/></div>";
    }
} else {
    echo "0 results";
}


echo "</div>";
echo "</div>";



echo "<div class='breweryblock'>";

echo "<div style='width: 100%;height: 80px;'><a href='beer?id=";
echo $breweryid;
echo "' class='btn btn-primary pull-right'target='_blank' >+ Add A Beer</a></div><div class='heightcontain'>";
if ($result2->num_rows > 0) {
    while($row2 = $result2 ->fetch_assoc()) {
            echo "<div class='card'><img src='";
    echo $row2["beer_image"];
    echo "'height='auto' width='120%' /><div class='insidecard'><h4>";
    echo $row2["beer_name"];
    echo "</h4><div style='margin-bottom: -4px;'><h3 style='padding: 20px 0 ;width: 15%; display: inline-block;margin: 0;background:#";
    echo $row2["color"];
    echo ";'></h3><h3 style='width: 84.5%;display: inline-block;text-align: left;margin: 0;text-indent: 5px;line-height: 40px;vertical-align: top;'>";
    echo $row2["style"];
    echo "</h3></div><div class='acrossblock'>ABV - ";
    echo $row2["abv"];
    echo "%</div><div class='acrossblock'>IBU - ";
    echo $row2["ibu"];
    echo "</div></div></div>";
    }
} else {
    echo "0 results";
}


echo "</div>";
echo "</div>";

echo "<div class='breweryblock'>";

echo "<div style='width: 100%;height: 80px;'><a href='event-add-submit-form?id=";
echo $breweryid;
echo "' class='btn btn-primary pull-right'target='_blank' >+ Add An Event</a></div><div class='heightcontain'>";
if ($result3->num_rows > 0) {
    // output data of each row
    while($row3 = $result3 ->fetch_assoc()) {
    echo "<div class='smallevent'><img src='";
    echo $row3["EventLogo"];
    echo "'/><div class='insidecard'><h4>";
    echo $row3["EventName"];
    echo "</h4><h3>";
    echo $row3["niceDate"];
    echo "</h3><a class='btn btn-primary' href='";
    echo $row3["EventLink"];
   echo "'>Check It Out</a></div></div>";

    }
} else {
    echo "0 results";
}


echo "</div>";
echo "</div>";
$conn->close();


?>

  </body>

</html>