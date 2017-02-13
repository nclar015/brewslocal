<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Brews Local</title>
   

  <body>

<?php
include("config.php");
include("header.php");
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_parts = parse_url($url);
parse_str($url_parts['query'], $query_parts);
$stateid = $query_parts["state"];
if(empty($stateid)) { $stateid = 'Choose A State';};

echo '</br>
<a href="business" class="btn btn-primary pull-right" style="margin-right: 10%;" >+ Add A Brewery</a><div style="margin: 100px auto -50px; display: block;width: 500px;">
                        <label>State</label>
                        <select name = "state" 
                           id = "type" class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
         <option value="1" selected="selected">';
echo $stateid;
echo '</option>
	<option value="brewlanding?state=AL">Alabama</option>
	<option value="brewlanding?state=AK">Alaska</option>
	<option value="brewlanding?state=AZ">Arizona</option>
	<option value="brewlanding?state=AR">Arkansas</option>
	<option value="brewlanding?state=CA">California</option>
	<option value="brewlanding?state=CO">Colorado</option>
	<option value="brewlanding?state=CT">Connecticut</option>
	<option value="brewlanding?state=DE">Delaware</option>
	<option value="brewlanding?state=DC">District of Columbia</option>
	<option value="brewlanding?state=FL">Florida</option>
	<option value="brewlanding?state=GA">Georgia</option>
	<option value="brewlanding?state=HI">Hawaii</option>
	<option value="brewlanding?state=ID">Idaho</option>
	<option value="brewlanding?state=IL">Illinois</option>
	<option value="brewlanding?state=IN">Indiana</option>
	<option value="brewlanding?state=IA">Iowa</option>
	<option value="brewlanding?state=KS">Kansas</option>
	<option value="brewlanding?state=KY">Kentucky</option>
	<option value="brewlanding?state=LA">Louisiana</option>
	<option value="brewlanding?state=ME">Maine</option>
	<option value="brewlanding?state=MD">Maryland</option>
	<option value="brewlanding?state=MA">Massachusetts</option>
	<option value="brewlanding?state=MI">Michigan</option>
	<option value="brewlanding?state=MN">Minnesota</option>
	<option value="brewlanding?state=MS">Mississippi</option>
	<option value="brewlanding?state=MO">Missouri</option>
	<option value="brewlanding?state=MT">Montana</option>
	<option value="brewlanding?state=NE">Nebraska</option>
	<option value="brewlanding?state=NV">Nevada</option>
	<option value="brewlanding?state=NH">New Hampshire</option>
	<option value="brewlanding?state=NJ">New Jersey</option>
	<option value="brewlanding?state=NM">New Mexico</option>
	<option value="brewlanding?state=NY">New York</option>
	<option value="brewlanding?state=NC">North Carolina</option>
	<option value="brewlanding?state=ND">North Dakota</option>
	<option value="brewlanding?state=OH">Ohio</option>
	<option value="brewlanding?state=OK">Oklahoma</option>
	<option value="brewlanding?state=OR">Oregon</option>
	<option value="brewlanding?state=PA">Pennsylvania</option>
	<option value="brewlanding?state=RI">Rhode Island</option>
	<option value="brewlanding?state=SC">South Carolina</option>
	<option value="brewlanding?state=SD">South Dakota</option>
	<option value="brewlanding?state=TN">Tennessee</option>
	<option value="brewlanding?state=TX">Texas</option>
	<option value="brewlanding?state=UT">Utah</option>
	<option value="brewlanding?state=VT">Vermont</option>
	<option value="brewlanding?state=VA">Virginia</option>
	<option value="brewlanding?state=WA">Washington</option>
	<option value="brewlanding?state=WV">West Virginia</option>
	<option value="brewlanding?state=WI">Wisconsin</option>
	<option value="brewlanding?state=WY">Wyoming</option>
</select></div>';
echo '';
echo '';
echo '<div class="container">';
echo '<div class="table-responsive" style="background: #fff;">
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>City</th>
        <th>State</th>
        <th>Type</th>
        <th><span class="glyphicon glyphicon-user" style="text-align: center;"></span></th>
        <th><span class="glyphicon glyphicon-edit" style="text-align: center;"></span></th>
      </tr>
    </thead>
    <tbody>';

$sql="SELECT * FROM Breweries WHERE state = '$stateid' ORDER BY city ASC, name ASC";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

$id = $row["id"];
$name = $row["name"];
$street = $row["street"];
$city = $row["city"];
$state = $row["state"];
$zip = $row["zip"];
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

while ($row = @mysql_fetch_assoc($result)){
  echo '<tr><td>';
  echo $row["name"];
  echo '</td><td>';
  echo $row["city"];
  echo '</td><td>';
  echo $row["state"];
  echo '</td><td>';
  echo $row["type"];
  echo '</td><td>';
  echo '<a href="/brewery?id=';
  echo $row["id"];
  echo '" class="btn btn-primary">View</a></td><td>';
  echo '<a href="/edit-brew?id=';
  echo $row["id"];
  echo '" class="btn btn-success">Edit</a></td></tr>';
}




?>

</tbody>
</table
</div>
  </body>

</html>