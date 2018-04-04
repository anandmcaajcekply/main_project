<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
?>
<html>
<head>
<style>
.topnav {
  background-color: #333;
  height:50px;
  
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
    background-color: #4CAF50;
    color: white;
}
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
</style>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="toreg.php">Add Owner</a>
  <a href="filmadd.php">Add Film</a>
  <a href="viewfilm.php">View Film</a>
  <a href="adminownerview.php">View Owners</a>
  <a href="addcountry.php">Add Places/ Category</a>
  <a href="admintheaterview.php">View Theater</a>
  <a href="changepass.php">password change</a>
  <a href="countofusers.php">visitors</a>
  <div class="dropdown">
  <span>Bank</span>
  <div class="dropdown-content">
  <a href="adminwal.php">Add Bank</a>
   <a href="adminmywal.php">My Wallet</a>
  </div>
</div> 
  <a href="adminlogout.php">Logout</a>
</div>
<div class="container-fluid" >
	
	
<?php
$sql="SELECT * FROM `complaint`";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
		 {
			 ?>
	
	<div class="col-md-3 col-md-offset-1" style="background-color:transparent;margin-top:10px; border-style: solid; border-color: black;border-radius: 5px;"> 
	<form name="myform" action="comment.php" method="post">
	<img src="images1\user.png" style="width:50px; height:50px; margin-left:30%;" >
	
	<h6>Name:<input style="margin-top:5px;margin-left:15%;width:70%;" type="text" name="Name" value="<?php echo $row['name']?>"> </h5>
	
	<h6>Email<input style="margin-top:5px;margin-left:15%;width:70%;" type="text" name="Email" value="<?php echo $row['email']?>"></h5>
	
	<h6>Mobile<input style="margin-top:5px;margin-left:15%;width:70%;" type="text" name="Mobile" value="<?php echo $row['mob']?>"></h5>
	
	<h6>Subject<input style="margin-top:5px;margin-left:15%;width:70%;" type="text" name="Subject" value="<?php echo $row['sub']?>"></h5>
	
	</form>
	</div>
	<?php
		 }
		 ?>
		 </div>
</body>
</html>