<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Brewery Add - BrewsLocal</title>
</head>


<body>


<?php include("header.php"); ?>

<div id="maincontainer" >


<div id="insidecontainer">

            
               <form action="add-brew.php" method="post" id="breweryform" class="col-sm-4"  enctype="multipart/form-data">

<h1>Info</h1>
                  <div class="form-group">
      <label>  Brewery Name</label> <input name = "name" type = "text" id = "name" class="form-control" required> </div>
                  
                                      <div class="form-group">
                        <label> Street</label>
                        <input name = "street" type = "text" 
                           id = "street" class="form-control" required></div>
                           
                             <div class="form-group">
                        <label>City</label>
                        <input name = "city" type = "text" 
                           id = "city" class="form-control" required></div>
                           
    <div class="form-group">
                        <label>State</label>
                        <select name = "state" 
                           id = "type" class="form-control">
	<option value="AL" selected="selected">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select></div>
                           
    <div class="form-group">
                        <label>Zip Code</label>
                       <input name = "zip" type = "text" 
                           id = "zip" class="form-control" required></div>
                           
                     
                           
                     <div class="form-group">
                        <label>Type</label>
                        <select name = "type" 
                           id = "type" class="form-control">
  <option value="Brewery">Brewery</option>
  <option value="Brewpub">Brewpub</option>
  <option value="Cidery">Cidery</option>
</select></div>

                           
     <h1>Social</h1>
                              
  <div class="form-group">
                        <label> Image</label>
                       <input type="file" name="fileToUpload" id="fileToUpload"  class="form-control"></div>


    <div class="form-group">
                        <label>Facebook</label>
                       <input name = "facebook" type = "text" 
                           id = "facebook" class="form-control" ></div>


    <div class="form-group">
                        <label>Instagram</label>
                       <input name = "instagram" type = "text" 
                           id = "instagram" class="form-control" ></div>

    <div class="form-group">
                        <label>Twitter</label>
                       <input name = "twitter" type = "text" 
                           id = "twitter" class="form-control" ></div>

    <div class="form-group">
                        <label>Website</label>
                       <input name = "website" type = "text" 
                           id = "website" class="form-control" ></div>


   <h1>Hours</h1>

    <div class="form-group">
                        <label>Monday</label>
                       <input name = "monday" type = "text" 
                           id = "monday" class="form-control" ></div>

    <div class="form-group">
                        <label>Tuesday</label>
                       <input name = "tuesday" type = "text" 
                           id = "tuesday" class="form-control" ></div>

    <div class="form-group">
                        <label>Wednesday</label>
                       <input name = "wednesday" type = "text" 
                           id = "wednesday" class="form-control" ></div>


    <div class="form-group">
                        <label>Thursday</label>
                       <input name = "thursday" type = "text" 
                           id = "thursday" class="form-control" ></div>


    <div class="form-group">
                        <label>Friday</label>
                       <input name = "friday" type = "text" 
                           id = "friday" class="form-control" ></div>


    <div class="form-group">
                        <label>Saturday</label>
                       <input name = "saturday" type = "text" 
                           id = "saturday" class="form-control" ></div>


    <div class="form-group">
                        <label>Sunday</label>
                       <input name = "sunday" type = "text" 
                           id = "sunday" class="form-control" ></div>


                           <input name = "add" type = "submit" id = "add" 
                              value = "Add Brewery" class="btn btn-primary btn-lg btn-block">
                
                  
                 
               </form>
             


        
</div>
</div></div>


</body>



</html>