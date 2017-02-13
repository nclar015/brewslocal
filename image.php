<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Brewery Add - BrewsLocal</title>
</head>

<?php include("header.php");
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_parts = parse_url($url);
parse_str($url_parts['query'], $query_parts);
$breweryid = $query_parts["id"];?>

<body>


<div id="maincontainer" >


<div id="insidecontainer">

            
               <form action="add-image.php" method="post" id="breweryform" class="col-sm-4" enctype="multipart/form-data">
                 
                                      <div class="form-group">
                        <label> Image</label>
                       <input type="file" name="fileToUpload" id="fileToUpload"  class="form-control" multiple></div>

                           
                             
                           
   
                           
   
                           
                     <div class="form-group">
                        <label>ID</label>
                        <input name = "id" type = "text" 
                           id = "id" class="form-control" readonly value="<?php echo htmlspecialchars($breweryid);  ?>"></div>

                           
                                   
                           <input name = "submit" type = "submit" id = "add" 
                              value = "Add An Image" class="btn btn-primary btn-lg btn-block">
               
                   <a class="btn btn-danger btn-lg btn-block" href="http://brewslocal.com/brewery?id=<?php echo htmlspecialchars($breweryid);  ?>">Back To The Brewery</a>
                  
                 
               </form>
             
     
        
</div>
</div></div>


</body>



</html>