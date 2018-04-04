<?php
include 'connection.php';
$lid1=$_SESSION['lid'];
$sql1="select * from wallet where wallet.logid='$lid1'";
$result1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($result1);
$ds=$row1['w_id'];
//echo $ds;
if($ds!='')
{
	echo "<script>if(confirm('account already exists!!!!')){document.location.href='userhome.php'}else{document.location.href='userhome.php'};</script>";
   
}
//SELECT `w_id`, `logid`, `w_acc_no`, `cvv`, `bank_name`, `balance`, `w_passwd`, `status` FROM `wallet` WHERE 1
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
if(isset($_POST['submit']))
{
	$lid=$_SESSION['lid'];
$amount=$_POST['amount'];
$cvv=$_POST['cvv'];
$cardno=$_POST['cardno'];
$bank=$_POST['bank'];
$psw=$_POST['psw'];
//INSERT INTO `wallet`(`w_id`, `logid`, `w_acc_no`, `cvv`, `bank_name`, `balance`, `status`) 
//VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])
$sql="INSERT INTO `wallet`(`logid`, `w_acc_no`, `cvv`, `bank_name`, `balance`, `w_passwd`, `status`) VALUES ('$lid', '$cardno', '$cvv', '$bank', '$amount', '$psw','0')";
$result=mysqli_query($con,$sql);
header("location:userhome.php");
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

<?php
$lid=$_SESSION['lid'];
//INSERT INTO `wallet`(`w_id`, `logid`, `w_acc_no`, `cvv`, `bank_name`, `balance`, `status`) VALUES
$sql1="SELECT * FROM `wallet` WHERE `logid`='$lid'";
$result1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($result1);
$r=$row1['logid'];
	?>
<div style="width:35%; float:right; position:absolute;margin-left:52%;margin-top:8%;z-index:100;">
<img src="images1/b1.jpg" alt="Icon" style="width:130%;height:90%;">
</div>
      
			<div style="width:35%; height:100%; margin-top:0%;  z-index:100; margin-left:10%;">
			<h2 style="color:pink;margin-left:90%; margin-top:4%;">WALLET</h2><br />								
			<form action="#" method="post" enctype="multipart/form-data" name="form1" id="form1">
			<span style="color:pink;"><b>Amount</b></span><span style="color:red;">*</span>:<input type="text" name="amount" id="am" onchange="naa()" required style="z-index:50px; width:120%; height:50px; background-color: white; color:#F59024;" >
			<span style="color:pink;"><b>cvv</b></span><span style="color:red;">*</span>:<input type="text" name="cvv" id="cv" onchange="na2()" required style="z-index:50px; width:120%; height:50px;  color:red; background-color: white; color:#F59024;" >
		<span style="color:pink;"><b>Card no</b></span><span style="color:red;">*</span>:<input type="text" name="cardno" id="cd" onchange="na3()"required style="z-index:50px; width:120%; height:50px;  color:red; background-color: white; color:#F59024;" >
		<span style="color:pink;"><b>Bank</b></span><span style="color:red;">*</span>:<select name="bank"  required style="z-index:50px; width:120%; height:50px; color:red; background-color: white; color:#F59024;">
		<option>select</option>
		<option>SBI</option>
		<option>Canara Bank</option>
		<option>Vijaya Bank</option>
		<option>Axis Bank</option>
		<option>Federal Bank</option>
		</select>
			<span style="color:pink;">Password</span><span style="color:red;">*</span>:<input type="password" name="psw" id="loc" required style="z-index:50px; width:120%; height:50px;  color:red; background-color: white; color:#F59024;" >
		
			
			<table style="width:-5%; margin-left:50%;	28%;margin-top:10%;"><tr><td><button class="btn btn-primary btn-block" name="submit">ADD</button></td></tr></table>	
			</form>			
			</div>
			

		<?php
?>
</div>
</body>
</html>