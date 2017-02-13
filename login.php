
<?php
include("header.php");
session_start();
if(isset($_SESSION['login_user'])){
header("location: profile");
}
?>





<body>

<form action="login-post.php" method="post" id="breweryform" class="col-sm-4" enctype="multipart/form-data">
    <div class="form-group">
<label>UserName :</label>
<input type="text" name="username" id="username" class="form-control"/></div>
    <div class="form-group">
<label>Password :</label>
<input type="password" name="password"  id="password" class="form-control"/></div>
    <div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg btn-block"/></div>
<span><?php echo $error; ?></span>
</form>


</body>


