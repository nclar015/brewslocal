<?php

header('Access-Control-Allow-Origin: *');


$username = "azzidaco";
$password = "M@tchF1xing";

function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&#39;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 


// Opens a connection to a MySQL server
$connection=mysql_connect (localhost, $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}
// Set the active MySQL database
$db_selected = mysql_select_db('azzidaco_wp_lf1u', $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}






// Select all the rows in the markers table
$query = "SELECT * FROM brewery_images ORDER BY date DESC";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
header("Content-type: text/xml; charset=ISO-8859-1");
// Start XML file, echo parent node
echo '<images>';
// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  echo '<image ';
  echo 'id="' . parseToXML($row['id']) . '" ';
  echo 'imageurl="' . parseToXML($row['image']) . '" ';
  echo 'date="' . parseToXML($row['date']) . '" ';

  echo '/>';
}
// End XML file
echo '</images>';
?>