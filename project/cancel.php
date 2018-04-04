<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
if(isset($_POST['edit']))
    {   
		$sprice=100;
		$price =100;
		$eml=$_POST['em'];
		echo $eml;
		$dm=$_POST['tj'];
		echo $dm;
		$qh=$_POST['tn'];
		$jj=$_POST['Actress'];
		$qa=$_POST['Name'];
		$nq=$_SESSION['fname'];
		$t=$_POST['tt'];
		echo $t;
		$h=$_POST['sid'];
		$tid=$_SESSION['lid'];
		$p=$_POST['sh'];
		echo $h;
		echo $tid;
		echo $p;
		date_default_timezone_set('Asia/Kolkata');
		$date3 = date('Y-m-d', time());
		$time2=date('h:i:s a', time());
		$v=date("H:i", strtotime($time2));
		echo $v;
		$b=$_POST['book'];
		echo $b;
		$sql4="SELECT * FROM `wallet` WHERE `logid`='$tid'";
		$result4=mysqli_query($con,$sql4);
		$row4=mysqli_fetch_array($result4);
		$r1=$row4['balance'];
		echo $r1;
		
		$tq=0;
		$tq=$r1+$price;
		echo $tq;
		$sq="select * from staffreg where theaterid='$t'";
		$res=mysqli_query($con,$sq);
		$roww=mysqli_fetch_array($res);
		$r2=$roww['lid'];
		echo $r2;
		
		$sql8="SELECT * FROM `wallet` WHERE `logid`='$r2'";
		$result8=mysqli_query($con,$sql8);
		$row8=mysqli_fetch_array($result8);
		$r3=$row8['balance'];
		
		echo $r3;
		$tw=0;
		$tw=$r3-$sprice;
		echo $tw;
		$sql="delete from seat_book where bookid='$b' ";
		$result=mysqli_query($con,$sql);
		$sql6="UPDATE `wallet` SET `balance`='$tq' WHERE `logid`='$tid'";
        $result6=mysqli_query($con,$sql6);
		$sql7="UPDATE `wallet` SET `balance`='$tw' WHERE `logid`='$r2'";
        $result7=mysqli_query($con,$sql7);
		
	$to = $eml;
			$subject = "Universal Cinema";
			$message ="<html>
			<head>
			<title>Movie Ticket Cancelation</title>
			</head>
			<body>
			<h2><b><i>Movie Ticket Cancelation</i><b></h2>
			<h3><b><i>Theatre:$qh</i><b></h3>
			<h3><b><i>Film: $dm</i><b></h3>
			<h3><b><i>Show Date: $jj</i><b></h3>
			<table>
			<tr>
			<th>CUSTOMER NAME:</th>
			<th>SHOW NAME&nbsp;</th>
			<th>SEAT NO&nbsp;</th>
			<th>&nbsp;&nbsp; PRICE</th>
			</tr>
			<tr>
			<td>$nq</td>
			<td>$p</td>
			<td>$qa</td>
			<td>Rs: 100 is refunded to your Account</td>
			<td></td>
			</tr>
			<tr>
			</tr>
			<tr>
			
			<td>*Note::Amount is refounded to your account</td>
			</tr>
			</table>
			</body>
			</html>";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <anands@mca.ajce.in>' . "\r\n";
			$headers .= 'Cc: anands@mca.ajce.in' . "\r\n";
			mail($to,$subject,$message,$headers);
		
				
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
  <script src="js/bootstrap.min.js"></script>
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
.myclass {
        height: 20px;
        position: relative;
        border: 2px solid #cdcdcd;
        border-color: rgba(0,0,0,.14);
        background-color: AliceBlue ;   ;
        font-size: 14px;
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
  <h1 style="marign-left:50%;color:black;"> Booked Seats </h1>
<?php
$tid=$_SESSION['lid'];
//$sql1="select * from staffreg where lid= $tid";
//$res=mysqli_query($con,$sql1);
//$row1=mysqli_fetch_array($res);
//$s1=$row1['theaterid'];
//echo $s1;
//if(isset($_POST['ok']))
  //  {   
//$s=$_POST['loc'];
//echo $s;
//$p=$_POST['date2'];
//echo $p;
//$tid=$_SESSION['lid'];
//echo $tid;
 //$sql22="SELECT * from `seat_book`,`theatershowadd`,`filmadd`,`theaterreg` WHERE seat_book.userid='$tid'and theatershowadd.filmid=filmadd.filmid and theaterreg.theaterid=seat_book.theaterid and seat_book.date>CURRENT_DATE";
//$sql22="SELECT * from `seat_book` WHERE `userid`='$tid' and seat_book.date>CURRENT_DATE";
$sql22="select * from seat_book , theatershowadd, filmadd, theaterreg, login where seat_book.userid='$tid' and seat_book.userid=login.lid and seat_book.theaterid=theatershowadd.theaterids and theatershowadd.filmid=filmadd.filmid and theatershowadd.status='0' and seat_book.theaterid=theaterreg.theaterid and seat_book.date>CURRENT_DATE";
$result22=mysqli_query($con,$sql22) or die(mysqli_error($con));
$i=0;
while($row=mysqli_fetch_array($result22))
{
	?>
		<div class="col-md-3 col-md-offset-1" style="background-color:transparent;margin-top:10px; border-style: solid; border-color: black;border-radius: 5px; width:25%; height:50%"> 
	<form name="myform" action="cancel.php" method="post">
	
	<h4> Booking Id<input type="text"  name="book"   value="<?php echo $row['bookid']?>" readonly></h4>
	<h4>  Seat NO &nbsp;&nbsp;<input type="text" name="Name" value="<?php echo $row['seatid']?>" readonly></h4>
	<h4>Show No &nbsp;<input type="text" name="Actor" value="<?php echo $row['show_num']?>" readonly> </h4>
	<h4> Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Actress" value="<?php echo $row['date']?>" readonly></h4>
	<input type="hidden" name="na" value="<?php echo $row['filmid']?>" readonly>
	<input type="hidden"name="tt" value="<?php echo $row['theaterid']?>">
	<h4>Film &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"name="tj" value="<?php echo $row['filmname']?>"></h4>
	<h4>Theater &nbsp;&nbsp;&nbsp;<input type="text"name="tn" value="<?php echo $row['tname']?>">
	<input type="hidden" name="sh" value="<?php echo $row['show_num']?>">
	<input type="hidden" name="sid" value="<?php echo $row['userid']?>">
	<input type="hidden" name="em" value="<?php echo $row['username']?>">
	<!--<input type="submit" name="edit"  value="Cancel Ticket ">  -->
	<input style="margin-top:10px;margin-left:15%; background-color: #4CAF50; 
    border: none;
	color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: bold;
    display: inline-block;
    font-size: 16px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;" type="submit" name="edit"  value="Cancel Ticket">
	<br/>
	</form>
	</div>
	<?php
	
}
?>
</body>
</html>