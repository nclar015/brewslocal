<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="icon" href="beer-128.png"  >
<title>Brewery Add - BrewsLocal</title>
</head>


<body>


<?php include("header.php"); 
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_parts = parse_url($url);
parse_str($url_parts['query'], $query_parts);
$breweryid = $query_parts["id"];?>
<div id="maincontainer" >


<div id="insidecontainer">

            
               <form action="add-beer.php" method="post" id="breweryform" class="col-sm-4" enctype="multipart/form-data">
                 
                                      <div class="form-group">
                        <label> Image</label>
                       <input type="file" name="fileToUpload" id="fileToUpload"  class="form-control"></div>

                           
                             <div class="form-group">
                        <label>Name</label>
                        <input name = "name" type = "text" 
                           id = "name" class="form-control" required></div>
                           

                             <div class="form-group">
                        <label>ABV</label>
                       <input name = "abv" type = "text" 
                           id = "abv" class="form-control"> </div>

                             <div class="form-group">
                        <label>IBU</label>
                        <input name = "ibu" type = "text" 
                           id = "ibu" class="form-control"></div>



<div class="form-group">
                        <label>Color</label>
                        <select name = "color" 
                           id = "color" class="form-control">
  <option value="ffff45" style="background: #ffff45; line-height: 20px;">Pale Straw</option>
  <option value="ffe93e" style="background: #ffe93e; line-height: 20px;">Straw</option>
  <option value="fed849" style="background: #fed849; line-height: 20px;">Pale Gold</option>
  <option value="ffa846" style="background: #ffa846; line-height: 20px;">Deep Gold</option>
  <option value="f49f44" style="background: #f49f44; line-height: 20px;">Pale Amber</option>
  <option value="d77f59" style="background: #d77f59; line-height: 20px;">Medium Amber</option>
  <option value="94523a" style="background: #94523a; line-height: 20px; color: #fff;">Deep Amber</option>
  <option value="804541" style="background: #804541; line-height: 20px; color: #fff;">Amber-Brown</option>
  <option value="5b342f" style="background: #5b342f; line-height: 20px; color: #fff;">Brown</option>
  <option value="4c3b2b" style="background: #4c3b2b; line-height: 20px; color: #fff;">Ruby Brown</option>
  <option value="38302e" style="background: #38302e; line-height: 20px; color: #fff;">Deep Brown</option>
  <option value="31302c" style="background: #31302c; line-height: 20px; color: #fff;">Black</option>
</select></div>

                             <div class="form-group">
                        <label>Style</label>
                        <input name = "style" type = "text" 
                           id = "style" class="form-control"></div>

                             
                           
    <div class="form-group">
                        <label>Description</label>
                       <textarea name = "description" type = "textarea" 
                           id = "description" class="form-control" required></textarea></div>
                           
                     <div class="form-group">
                        <label>ID</label>
                        <input name = "id" type = "text" 
                           id = "id" class="form-control" readonly value="<?php echo htmlspecialchars($breweryid);  ?>"></div>

                           
                                   
                           <input name = "submit" type = "submit" id = "add" 
                              value = "Add A Beer" class="btn btn-primary btn-lg btn-block">
               
                   <a class="btn btn-danger btn-lg btn-block" href="http://brewslocal.com/brewery?id=<?php echo htmlspecialchars($breweryid);  ?>">Back To The Brewery</a>
                  
                 
               </form>
             
     
        
</div>
</div></div>


</body>



</html>