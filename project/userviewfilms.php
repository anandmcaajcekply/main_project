<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
$q=$_SESSION['username'];
//echo $q;
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
<video id="bgVideo" autoplay loop="videos/poster.mp4">
    <source src="images1/ultra.mp4" type="video/mp4"/>
    <!--<source src="videos/test-640x368-webmvp8-miro.webm" type="video/webm"/> -->
    <!--<source src="videos/test-640x368-theora-miro.ogv" type="video/ogg"/>    -->
</video>
<h2 style="margin-left:45%; color:white;"> select location</h2>
<form name="myform" action="#" method="post">
 <select style="margin-left:45%;" name="loc" required>
	<option value="">Location</option>
	<?php
	$sql12="select * FROM `addplace`";
	$result1=mysqli_query($con,$sql12);
	while($row1=mysqli_fetch_array($result1)){
	?>
	<option><?php echo $row1['pname'];?></option>
	<?php
	}
	?>
</select>
<input type="submit"class="button button2" name="submit1"  value="veiw">
</form>
<?php
if(isset($_POST['submit1']))
    { 
$sl=$_POST['loc'];
//echo($sl);
		?>
<?php 
//$tid=$_SESSION['id'];
$sql="select * from filmadd,theaterreg,theatershowadd where filmadd.filmid=theatershowadd.filmid and theatershowadd.theaterids=theaterreg.theaterid and theaterreg.location='$sl' and theatershowadd.status='0'";
$result=mysqli_query($con,$sql);

$i=0;
while($row=mysqli_fetch_array($result))
{
	?>
	
	<div class="col-md-3 col-md-offset-1" style="background-color:transparent;margin-top:10px; border-style: solid; border-color: white;border-radius: 5px;""> 	
	<form name="myform" action="demo.php" method="post">
	<img src="<?php echo $row['filmpic']?>" style="width:50px; height:50px; margin-left:30%;" ><br>
	
	<input style="margin-top:5px;margin-left:15%" type="text" name="Name" value="<?php echo $row['filmname']?>">
	
	<input style="margin-top:5px;margin-left:15%" type="text" name="Actor" value="<?php echo $row['actor']?>">
	
	<input style="margin-top:5px;margin-left:15%" type="text" name="Actress" value="<?php echo $row['actress']?>">
	
	<input style="margin-top:5px;margin-left:15%" type="text" name="Producer" value="<?php echo $row['producer']?>">
	
	<input style="margin-top:5px;margin-left:15%" type="text" name="Cat" value="<?php echo $row['category']?>">
	
	<input style="margin-top:5px;margin-left:15%" type="text" name="Language" value="<?php echo $row['language']?>">
	
	<input style="margin-top:5px;margin-left:15%" type="hidden" name="sid" value="<?php echo $row['filmid']?>"/> <br>
	<input type="hidden" name="sid" value="<?php echo $row['theaterid']?>"/>
	<input style="margin-top:10px;margin-left:20%; background-color: #4CAF50; 
    border: none;
	color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: bold;
    display: inline-block;
    font-size: 16px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;" type="submit" name="submit"  value="book">
	<br/>
	<!--<input type="hidden" name="sid" value="<?php echo $row['theaterid']?>"/>
	<tr><td><span><input type="submit" name="submit"  value="book"></span></td>
	<!--  <td><input type="button" name="delete" value="Delete"></td>
	</tr>  -->
	</form>
	</div>
	<?php
}
}
?>


</body>
<script src="public/js/bootstrap.min.js">
</html>