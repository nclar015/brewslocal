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
$logo = mysqli_real_escape_string($link, $_POST['logo']);
$description = mysqli_real_escape_string($link, $_POST['description']);
$dateevent =  mysqli_real_escape_string($link, $_POST['date']);
$linkevent = mysqli_real_escape_string($link, $_POST['link']);
$brewery = mysqli_real_escape_string($link, $_POST['brewery']);

 

$sql = "INSERT INTO Events (EventName, EventLogo, EventDescription, EventDate, EventLink, EventBrewery) VALUES ('$name', '$logo', '$description', '$dateevent', '$linkevent', '$brewery');";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    echo '<a href="business" style="color: blue; display: block; margin: 10px auto; font-size: 18px;">Enter Another Event</a>';
    echo '<a href="/" style="color: blue; display: block;margin: 10px auto; font-size: 18px;">View The Page Where It Went</a>';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>