<!DOCTYPE html>
<html lang="en">
<head>
  <title>Brewery Added</title>
<link rel="icon" href="beer-128.png"  >
  <meta charset="utf-8">
<?php include("header.php"); ?>
</head>
<body>
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
$description = mysqli_real_escape_string($link, $_POST['description']);
$dateevent =  mysqli_real_escape_string($link, $_POST['date']);
$linkevent = mysqli_real_escape_string($link, $_POST['link']);
$id = mysqli_real_escape_string($link, $_POST['id']);

 $target_dir = "images/eventimages/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$sql = "INSERT INTO Events (EventName, EventLogo, EventDescription, EventDate, EventLink, EventBreweryId) VALUES ('$name', '$target_file', '$description', '$dateevent', '$linkevent', '$id');";
if(mysqli_query($link, $sql)){
    echo '<div class="container"><div class="jumbotron"><h1>Event Added!</h1>';
    echo '<a href="event-add-submit-form?id=';
    echo $id;
    echo '" type="button" class="btn btn-success"">Enter Another Event</a>';
    echo '&nbsp;<a href="brewery?id=';
    echo $id;
    echo '" type="button" class="btn btn-danger"">Back To The Brewery</a></div></div>';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// close connection
mysqli_close($link);
?>
</div>
</body></html>