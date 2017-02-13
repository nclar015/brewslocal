<!DOCTYPE html>
<html lang="en">
<head>
  <title>Brewery Added</title>
  <meta charset="utf-8">
<?php include("header.php"); ?>
</head>
<body>

<?php
$bd = mysqli_connect("localhost", "azzidaco", "M@tchF1xing", "azzidaco_wp_lf1u");

// Check connection
if($bd === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$target_dir = "images/brewerylogos/";
$target_file = $target_dir . "logo-" . rand(1000,10000) . "-" . basename( $_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<h2 style='width: 80%;margin: auto;display: block;'>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</h2>";
    } else {
        echo "<h2 style='width: 80%;margin: auto;display: block;'>Sorry, there was an error uploading your file.</h2>";
    }
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($bd, $_POST['name']);
$street = mysqli_real_escape_string($bd, $_POST['street']);
$city = mysqli_real_escape_string($bd, $_POST['city']);
$state = mysqli_real_escape_string($bd, $_POST['state']);
$zip = mysqli_real_escape_string($bd, $_POST['zip']);
$type = mysqli_real_escape_string($bd, $_POST['type']);
$facebook = mysqli_real_escape_string($bd, $_POST['facebook']);
$instagram = mysqli_real_escape_string($bd, $_POST['instagram']);
$twitter = mysqli_real_escape_string($bd, $_POST['twitter']);
$website = mysqli_real_escape_string($bd, $_POST['website']);
$monday = mysqli_real_escape_string($bd, $_POST['monday']);
$tuesday = mysqli_real_escape_string($bd, $_POST['tuesday']);
$wednesday = mysqli_real_escape_string($bd, $_POST['wednesday']);
$thursday = mysqli_real_escape_string($bd, $_POST['thursday']);
$friday = mysqli_real_escape_string($bd, $_POST['friday']);
$saturday = mysqli_real_escape_string($bd, $_POST['saturday']);
$sunday = mysqli_real_escape_string($bd, $_POST['sunday']);

$address = $street . ", " . $city . " " . $state . " " . $zip;


$geocode = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=" . urlencode($address) . "&sensor=false");

$output = json_decode($geocode);

$lat = $output->results[0]->geometry->location->lat;
$lng = $output->results[0]->geometry->location->lng;

 

$sql = "INSERT INTO Breweries (name, street, city, state, zip, longAddress, lat, lng, type, logo, facebook, instagram, twitter, website, monday, tuesday, wednesday, thursday, friday, saturday, sunday) VALUES ('$name','$street','$city','$state','$zip','$address','$lat','$lng','$type','$target_file','$facebook','$instagram','$twitter','$website','$monday','$tuesday','$wednesday','$thursday','$friday','$saturday','$sunday')";
if(mysqli_query($bd, $sql)){
    echo '<div class="container"><div class="jumbotron"><h1>Records added successfully.</h1>';
    echo '<a href="business" type="button" class="btn btn-success">Enter Another Brewery</a>';
    echo '&nbsp;<a href="/" type="button" class="btn btn-danger"">Back To The Map</a></div></div>';
} else{
    echo "<h2 style='width: 80%;margin: auto;display: block;'>ERROR: Could not able to execute $sql. " . mysqli_error($bd) . "<h2>";
}
 
// close connection
mysqli_close($bd);
?>
</body>
</html>