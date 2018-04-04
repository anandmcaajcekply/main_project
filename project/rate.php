<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');

}
  if(isset($_POST['submit']))
  {
	  $a=$_POST['sid'];
  }

//echo $a;
$m=$_SESSION['lid'];
//echo $m;
if(isset($_POST['sub']))
    {   
$id=$_POST['id'];
$msg=$_POST["msg"];
$rate=$_POST["rate"];
$sql="INSERT INTO `rating`(`msg`, `rate`, `fid`, `userid`) VALUES ('$msg', '$rate', '$id','$m')";
$result=mysqli_query($con,$sql);
}
?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="public/css/bootstrap.min.css">
<title>Universal Cinemas</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="js/modernizr.js"></script>
<script src='js/jquery.min.js'></script>
<script src='js/jquery.color-RGBa-patch.js'></script>
<script src='js/example.js'></script>
          
<script async="async" src="https://www.google.com/adsense/search/ads.js"></script>

<!-- other head elements from your page -->
        
<!-- jQuery -->
<!-- FlexSlider -->
  <!-- DC Tabs CSS -->
<link type="text/css" rel="stylesheet" href="http://www.dreamtemplate.com/dreamcodes/tabs/css/tsc_tabs.css" />
 <!-- jQuery Library (skip this step if already called on page ) -->
<script type="text/javascript" src="http://www.dreamtemplate.com/dreamcodes/jquery.min.js"></script> <!-- (do not call twice) -->
 <!-- DC Tabs JS -->
<!--<script type="text/javascript" src="http://www.dreamtemplate.com/dreamcodes/tabs/js/tsc_tabs.js"></script>-->
<link rel="stylesheet" href="css/tsc_tabs.css" type="text/css" media="all" />
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="validation.js"></script>
<style>
.dropdown {
    position: relative;
    display: inline-block;
	color: white;
	margin-top:1.2%;
	
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #ddd;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 50;
	color:red;
}

.dropdown:hover .dropdown-content {
	color:black;
    display: block;
}
#bgVideo{ 
    position: absolute;
    top: 0;
    left: 0px;
    border: 0;
	width:120%;
	
    z-index: -2;
    background-size: cover;
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
	border-radius: 15px;
	box-shadow: 0 9px #999;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}
.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
} 
</style>
</head>
<body>
<div class="header">
	<div class="header-top">
		<div class="wrap">
			<div class="banner-no">
		  		<img src="images/universal.png" style="width:70px;height:70px;" alt=""/>
		    </div>
			  <div class="nav-wrap">
					<ul class="group" id="example-one">
			           <li class="current_page_item"><a href="userhome.php">Home</a></li>
			          
					   <li><a href="profileview.php">Profile</a></li>
						<li><a href="userviewfilms.php">Book My Show </a></li>
						<li><a href="cancel.php">Cancel Ticket </a></li>
						<li><a href="userviewfilms.php">View films </a></li>
						<li><a href="newrelease.php">New Release </a></li>
						<li><a href="upcomming.php">Upcoming </a></li>
						<li><a href="userchangepass.php">Change Password</a></li>
						<li><a href="rating.php">Rate Film </a></li>
			  		   <li><a href="movies_events.html">Movies & Events</a></li>
			  		   <li><a href="contact.php">Contact</a></li>
					     <li><div class="dropdown">
  <a href="#">BANK  </a>
  <div class="dropdown-content">
  <a href="wal.php">Add bank</a>
  <a href="mywallet.php">view my Wallet</a>
   </div>
</div> </li>
 <li><a href="logout.php">Logout</a></li>
  <?php $mid=$_SESSION['fname'];?>
  <p style="color:white; margin-left:90%; margin-top:-18px">hai...!!!<?php echo $mid;?></p>
			        </ul>
			  </div>
 			<div class="clear"></div>
   		</div>
    </div>
	</div>
  <video id="bgVideo" autoplay loop="videos/poster.mp4">
    <source src="images1/ultra.mp4" type="video/mp4"/>
    <!--<source src="videos/test-640x368-webmvp8-miro.webm" type="video/webm"/> -->
    <!--<source src="videos/test-640x368-theora-miro.ogv" type="video/ogg"/>    -->
</video>
<div>
<form name="rate" action="#" method="post">
<h2 style="color:red;">RATE YOUR FAVORATE FILM</h2><br/>
<input type="textarea" placeholder="Enter your comments" name="msg" id="msg" value=""style="border-radius:5px; margin-left:70%; height:10%;"><br/><br/>
<select name="rate" class="form-control" style="margin-left:70%; border-radius:5px;">
							<option style="color:red;" value=5>excellent</option>
							<option style="color:red;" value=4>very good</option>
							<option style="color:red;" value=3>good</option>
							<option style="color:red;" value=2>fair</option>						
							<option style="color:red;" value=1>poor</option>
				        </select></br></br>
						<input type="hidden" value="<?php echo $a?>" name="id" >
  <input type='submit' value='Send' name="sub" style="border-radius:5px; margin-left:70%;">
  </form>
</div>
</body>
</html>