<!doctype html>
<html>
<head>
<meta charset="UTF-8"  >
<meta name="viewport"content="user-scalable=0"/>
<link href="https://brewslocal.com/CSS/localbeer.css" rel="stylesheet" type="text/css">
<link rel="icon" href="beer-128.png"  >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald" />
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script type="text/javascript" src="https://rawgithub.com/nwcell/ics.js/master/ics.deps.min.js"></script>
<script type="text/javascript" src="https://rawgithub.com/nwcell/ics.js/master/demo/demo.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="javascript/analytics.js"></script>
</head>


<body>

    <div class="topnav">
        <a href="/" class="logo"><img src="http://brewslocal.com/images/main-logo.png" /></a>
        <ul class="main-menu">
            </li>
            <li style="display: none">
                <a href="#" data-toggle="modal" data-target="#login-modal">
                    <img src="https://maxcdn.icons8.com/Color/PNG/96/User_Interface/enter_2-96.png" title="Enter" style="width: 30px;
    vertical-align: top;
    padding: 0 5px;">Login
                </a>
            </li>
            <li>
                <a href="/" style="color:#fff;">
                    <img src="https://maxcdn.icons8.com/Color/PNG/96/Very_Basic/search-96.png" title="Search" width="96" style="width: 30px;
    vertical-align: top;
    padding: 0 5px;">Search
                </a>
            </li>
            <li>
<li>
                <a href="/brewlanding" style="color:#fff;">
                    <img src="https://maxcdn.icons8.com/Color/PNG/96/Very_Basic/plus-96.png" title="Plus" style="width: 30px;
    vertical-align: top;
    padding: 0 5px;">Brewery
                </a>
            </li>
            <li>
                <a href="/events" style="color:#fff;">
                    <img src="https://maxcdn.icons8.com/Color/PNG/96/Time_And_Date/calendar-96.png" title="Calendar" style="width: 30px;
    vertical-align: top;
    padding: 0 5px;">Events
                </a>
        </ul>
        <a href="#" id="filter" class="pull-right" style="color:#fff;">
            <span class="glyphicon glyphicon-menu-hamburger" style="font-size: 80px !important;line-height: 150px !important;"></span>
        </a>


        <div class="collapse" id="filterbar">
            <div class="collapse navbar-collapse" id="myNavbar style=" background #fff">
                <ul class="nav navbar-nav" style="background: #2d4452; width: 100%;padding: 50px 0 0 0;margin-top: -50px;">
                    <li style="display: block;width: 100%;">
                        <a href="/brewlanding" style="font-size:70px;line-height: 90px;color: #fff;">
                            <img src="https://maxcdn.icons8.com/Color/PNG/96/Very_Basic/plus-96.png" title="Plus" style="width: 80px;
    vertical-align: top;
    padding: 0 5px;font-size:80px;color: #fff;">Brewery
                        </a>
                    </li>
                    <li style="display: block;width: 100%;">
                        <a href="/events" style="font-size:70px;line-height: 90px;color: #fff;">
                            <img src="https://maxcdn.icons8.com/Color/PNG/96/Time_And_Date/calendar-96.png" title="Calendar" style="width: 80px;
    vertical-align: top;
    padding: 0 5px;font-size:80px;color: #fff;">Events
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>


<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>BrewsLocal Login</h1><br>
				  <form style="width:90%">
					<input type="text" name="user" placeholder="Username">
					<input type="password" name="pass" placeholder="Password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
				  </form>
					
				  <div class="login-help">
					<a href="/register">Register</a> - <a href="/forgot-password">Forgot Password</a>
				  </div>
				</div>
			</div>
		  </div>




</body>


<script>




$( "#filter" ).click(function() {
  $( "#filterbar" ).slideToggle( "slow", function() {
    // Animation complete.
  });
});
$( "#typeOption" ).val();



</script>


</html>