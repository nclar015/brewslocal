<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "azzidaco", "M@tchF1xing", "azzidaco_wp_lf1u");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_POST['name']);
$street = mysqli_real_escape_string($link, $_POST['street']);
$city = mysqli_real_escape_string($link, $_POST['city']);
$state = mysqli_real_escape_string($link, $_POST['state']);
$zip = mysqli_real_escape_string($link, $_POST['zip']);
$lat = mysqli_real_escape_string($link, $_POST['lat']);
$lng = mysqli_real_escape_string($link, $_POST['lng']);
$type = mysqli_real_escape_string($link, $_POST['type']);
 

$sql = "INSERT INTO Breweries (name, street, city, state, zip, lat, lng, type) VALUES ('$name', '$street', '$city', '$state', '$zip', '$lat', '$lng', '$type')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    echo '<a href="business" style="color: blue; display: block; margin: 10px auto; font-size: 18px;">Enter Another Brewery</a>';
    echo '<a href="/" style="color: blue; display: block;margin: 10px auto; font-size: 18px;">View The Page Where It Went</a>';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>