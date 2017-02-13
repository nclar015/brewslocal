<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Add Events - BrewsLocal</title>
</head>


<?php include("header.php"); 
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_parts = parse_url($url);
parse_str($url_parts['query'], $query_parts);
$breweryid = $query_parts["id"];?>
<div id="maincontainer" >

<body>




<div id="maincontainer" >


<div id="insidecontainer">

            
               <form action="add-event.php" method="post" id="breweryform" class="col-sm-4"  enctype="multipart/form-data">
               <div class="form-group">
                  
                        <label>Event Name</label>
                        <input name = "name" type = "text" 
                           id = "name" class="form-control" required></div>
                   
                                      <div class="form-group">
                        <label> Image</label>
                       <input type="file" name="fileToUpload" id="fileToUpload"  class="form-control"></div>

                           
                     <div class="form-group">
                        <label>Description</label>
                        <input name = "description" type = "text" 
                           id = "description" class="form-control" required></div>
                           
                          
   <div class="form-group">
                        <label>Date</label>
                        <input name = "date" type = "date" 
                           id = "date" class="form-control" required></div>
                           
                      <div class="form-group">
                        <label>Link</label>
                        <input name = "link" type = "text" 
                           id = "link" class="form-control" required></div>

 <div class="form-group">
                        <label>ID</label>
                        <input name = "id" type = "text" 
                           id = "id" class="form-control" readonly value="<?php echo htmlspecialchars($breweryid);  ?>"></div>

                    
                           <input name = "add" type = "submit" id = "add" 
                              value = "Add Event" class="btn btn-primary btn-lg btn-block">
                           <a class="btn btn-danger btn-lg btn-block" href="http://brewslocal.com/brewery?id=<?php echo htmlspecialchars($breweryid);  ?>">Back To The Brewery</a>
                  
                 
               </form>
             
     
        
</div>
</div>


</body>



</html>