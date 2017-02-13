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
$query = "SELECT * FROM Breweries";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
header("Content-type: text/xml; charset=ISO-8859-1");
// Start XML file, echo parent node
echo '<markers>';
// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  echo '<marker ';
  echo 'id="' . parseToXML($row['id']) . '" ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  echo 'logo="' . parseToXML($row['logo']) . '" ';
  echo 'address="' . parseToXML($row['street']) . ', ' . parseToXML($row['city']) . ' ' . parseToXML($row['state']) . ' ' . parseToXML($row['zip']) . '" ';
  echo 'lat="' . parseToXML($row['lat']) . '" ';
  echo 'lng="' . parseToXML($row['lng']) . '" ';
  echo 'monday="' . parseToXML($row['monday']) . '" ';
  echo 'tuesday="' . parseToXML($row['tuesday']) . '" ';
  echo 'wednesday="' . parseToXML($row['wednesday']) . '" ';
  echo 'thursday="' . parseToXML($row['thursday']) . '" ';
  echo 'friday="' . parseToXML($row['friday']) . '" ';
  echo 'saturday="' . parseToXML($row['saturday']) . '" ';
  echo 'sunday="' . parseToXML($row['sunday']) . '" ';
  echo 'facebook="' . parseToXML($row['facebook']) . '" ';
  echo 'twitter="' . parseToXML($row['twitter']) . '" ';
  echo 'instagram="' . parseToXML($row['instagram']) . '" ';
  echo 'website="' . parseToXML($row['website']) . '" ';
  echo 'type="' . parseToXML($row['type']) . '" ';
  echo '/>';
}
// End XML file
echo '</markers>';
?>