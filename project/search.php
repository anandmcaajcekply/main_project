<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
function decrypt($string, $key) {
                        $result = '';
                        $string = base64_decode($string);
                        for($i=0; $i<strlen($string); $i++) {
                        $char = substr($string, $i, 1);
                        $keychar = substr($key, ($i % strlen($key))-1, 1);
                        $char = chr(ord($char)-ord($keychar));
                        $result.=$char;
                        }
                        return $result;
                    }
					
$n =mysqli_real_escape_string($con,$_GET['fid']);
$n=decrypt($n,"anand");
echo $n;
$sql="select * from filmadd,theaterreg,theatershowadd where filmadd.filmid=theatershowadd.filmid and theatershowadd.theaterids=theaterreg.theaterid and theatershowadd.status='0' and filmadd.filmid='$n'";
$result=mysqli_query($con,$sql);
?>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="profileview.php">Profile</a>
  <a href="userviewfilms.php">Book My Show </a>
  <a href="userviewfilms.php">View films </a>
  <a href="newrelease.php">New Release </a>
  <a href="upcomming.php">Upcoming </a>
  <a href="userchangepass.php">Change Password</a>
  <a href="rating.php">Rate Film </a>
  <div class="dropdown">
  <span>Bank</span>
  <div class="dropdown-content">
  <a href="wal.php">Add bank</a>
  <a href="mywallet.php">view my Wallet</a>
   </div>
</div> 
  <a href="logout.php">Logout</a>
  <?php $mid=$_SESSION['fname'];?>
  <p style="color:white; margin-left:90%; margin-top:-18px">hai...!!!<?php echo $mid;?></p>
  </div>

  <div class="container-fluid" >
	
	
<?php
while($row=mysqli_fetch_array($result))
		 {
			 ?>
	
	<div class="col-md-3 col-md-offset-1" style="background-color:transparent;margin-top:70px;margin-left:30%; border-style: solid; border-color: white;border-radius: 5px;"> 
	<form name="myform" action="demo.php" method="post">
	<img src="<?php echo $row['filmpic']?>" style="width:170px; height:120px; margin-left:50%;" ><br>
	
	<input style="margin-top:5px;margin-left:40%; border-style:none;" type="text" name="Name" value=" Film Name       :   <?php echo $row['filmname']?>">
	
	<input style="margin-top:5px;margin-left:40%;border-style:none;" type="text" name="Actor" value=" Actor           :   <?php echo $row['actor']?>">
	
	<input style="margin-top:5px;margin-left:40%;border-style:none;" type="text" name="Actress" value=" Actress       :   <?php echo $row['actress']?>">
	
	<input style="margin-top:5px;margin-left:40%;border-style:none;" type="text" name="Producer" value=" Producer     :   <?php echo $row['producer']?>">
	
	<input style="margin-top:5px;margin-left:40%;border-style:none;" type="text" name="Cat" value=" Category          :   <?php echo $row['category']?>">
	
	<input style="margin-top:5px;margin-left:40%;border-style:none;" type="text" name="Language" value="Language      :   <?php echo $row['language']?>">
	
	<input style="margin-top:5px;margin-left:40%" type="hidden" name="sid" value="<?php echo $row['filmid']?>"/> <br>
	<input type="hidden" name="sid" value="<?php echo $row['theaterid']?>"/>
	<input style="margin-top:10px;margin-left:50%; background-color: #4CAF50; 
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
	</form>
	</div>
	<?php
		 }
		 ?>
		 
		 
	</div>
</body>
</html>