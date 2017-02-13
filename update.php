<head>
<title>Brewery Added</title>
<meta charset="utf-8">
</head>
<?php include("header.php"); ?>

<body>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "azzidaco", "M@tchF1xing", "azzidaco_wp_lf1u");
 
// Check connection
if($bd === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_parts = parse_url($url);
parse_str($url_parts['query'], $query_parts);
$breweryid = $query_parts["id"];



 
	
			 		$name= mysqli_real_escape_string($link, $_POST['namefield'] );
					$street = mysqli_real_escape_string($link, $_POST['streetfield']);
                                        $city = mysqli_real_escape_string($link, $_POST['cityfield']);
                                        $state = mysqli_real_escape_string($link, $_POST['statefield']);
                                        $zip = mysqli_real_escape_string($link, $_POST['zipfield']);				
					$lat = mysqli_real_escape_string($link, $_POST['latfield'] );
					$lng = mysqli_real_escape_string($link, $_POST['lngfield'] );
					$type = mysqli_real_escape_string($link, $_POST['typefield'] );					
					$logo = mysqli_real_escape_string($link, $_POST['logofield'] );
					$facebook = mysqli_real_escape_string($link, $_POST['facebookfield'] );
                                        $instagram = mysqli_real_escape_string($link, $_POST['instagramfield']);
                                        $twitter = mysqli_real_escape_string($link, $_POST['twitterfield']);
                                        $website = mysqli_real_escape_string($link, $_POST['websitefield']);
                                        $monday = mysqli_real_escape_string($link, $_POST['mondayfield']);
                                        $tuesday = mysqli_real_escape_string($link, $_POST['tuesdayfield']);
                                        $wednesday = mysqli_real_escape_string($link, $_POST['wednesdayfield']);
                                        $thursday = mysqli_real_escape_string($link, $_POST['thursdayfield']);
                                        $friday = mysqli_real_escape_string($link, $_POST['fridayfield']);
                                        $saturday = mysqli_real_escape_string($link, $_POST['saturdayfield']);
                                        $sunday = mysqli_real_escape_string($link, $_POST['sundayfield']);

$target_dir = "images/brewerylogos/";
$filename = $_FILES["fileToUpload"]["name"];
if ($filename === ""){
  $target_file = $logo;
}
else{
$target_file = $target_dir . "logo-" . rand(1000,10000) . "-" . $filename;
};
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
};
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
};
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
};



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<h2 style='width: 80%;margin: auto;display: block;'>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</h2>";
    } else {
        echo "<h2 style='width: 80%;margin: auto;display: block;color: #DEDEE0;'>Sorry, there was an error uploading your file.</h2>";

    }
};	

								

$sql = "UPDATE Breweries SET  name='$name', street='$street',city='$city',state='$state',zip='$zip', lat='$lat', lng='$lng', type='$type',logo='$target_file',facebook='$facebook',instagram='$instagram',twitter='$twitter',website='$website',monday='$monday',tuesday='$tuesday',wednesday='$wednesday',thursday='$thursday',friday='$friday',saturday='$saturday', sunday='$sunday' WHERE id='$breweryid'";
if(mysqli_query($link, $sql)){
    echo '<div class="container"><div class="jumbotron"><h1 style="color: #333;margin-bottom: 20px;">Brewery Updated!</h1>';
    echo '<a class="btn btn-primary" href="/edit-brew?id=';
    echo $breweryid;
    echo '">Edit Brewery</a>';
    echo '&nbsp;<a class="btn btn-success" href="/brewery?id=';
    echo $breweryid;
    echo '">View Brewery</a></div></div>';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?></body>