<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "azzidaco", "M@tchF1xing");
// Selecting Database
$db = mysql_select_db("azzidaco_wp_lf1u", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select FirstName from Azzida_Users where Username ='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row["FirstName"];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>