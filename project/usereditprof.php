<!DOCTYPE html>
<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
$username=$_SESSION['username'];
$tid=$_SESSION['lid'];
//echo $username;
$sql="SELECT * FROM `userlogin` WHERE userlogin.lid='$tid'";
$result=mysqli_query($con,$sql);

if(isset($_POST['edit'])){
	$a=$_POST['name'];
	$b=$_POST['lname'];
	$c=$_POST['contact'];
	$d=$_POST['address'];
	//$sql2="UPDATE `staffreg` set `name`='$a' ,`lname`='$b' ,`contact`='$c'`address`='$d' where staffreg.lid='$tid'";
	$sql2="UPDATE `userlogin` set `fname`='$a' where userlogin.lid='$tid'";
	$result2=mysqli_query($con,$sql2);
	$sql3="UPDATE `userlogin` set`lname`='$b' where userlogin.lid='$tid'";
	$result3=mysqli_query($con,$sql3);
	$sql4="UPDATE `userlogin` set`phone`='$c' where userlogin.lid='$tid'";
	$result4=mysqli_query($con,$sql4);
	$sql5="UPDATE `userlogin` set`address`='$d' where userlogin.lid='$tid'";
	$result5=mysqli_query($con,$sql5);
}
?>
<html>
<head>
<title>Universal Cinemas</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="js/modernizr.js"></script>
<script src='js/jquery.min.js'></script>
<script src='js/jquery.color-RGBa-patch.js'></script>
<script src='js/example.js'></script>
          

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
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 400px;
  max-height: 500px;
  margin: auto;
  text-align: center;
  font-family: arial;
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
			           <li class="current_page_item"><a href="index.php">Home</a></li>
			          
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
<h2 style="text-align:center">User Profile Card</h2>

<div class="card">
<form name="myform" action="usereditprof.php" method="post">
<?php
$i=0;
while($row=mysqli_fetch_array($result))
{
	?>
	<table>
  <img src="11.jpg" alt="John" style="width:50%">
  <tr><td><h3 style="margin-left:20%;"><?php echo $username ?></h3></td></tr>
  <tr><td><i>FNAME:</i><input type="text" name="name" value="<?php echo $row['fname']?> " style="margin-left:10%;"></td></tr><tr> <td><i> LNAME:</i><input type="text" name="lname" value="<?php echo $row['lname']?>" style="margin-left:10%;"></td></tr>
  <p></p>
  <tr><td><p><i>PHONE:</i><input type="text" name="contact" value="<?php echo $row['phone']?>"style="margin-left:10%;"></p></td></tr>
  <tr><td><p><i>ADDRESS:</i><input type="text" name="address" value="<?php echo $row['address']?>"style="margin-left:4%;"></p></td></tr>
  </table>
 <!--
  <p class="title">CEO & Founder, Example</p>
  <p>Harvard University</p>-->
  <div style="margin: 24px 0;">
    <!--<a href=""><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> -->
<?php
}
?>	
 </div>
 <div style="background-color:black;">
 <p><input type="submit" name="edit" value="Edit"></p>
</div>
</form>
</div>

</body>
</html>
