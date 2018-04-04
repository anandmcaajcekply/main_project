<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
function encrypt($string, $key) {
		$result = '';
		for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
		}
return base64_encode($result);
        }
$sql="select * from filmadd,theaterreg,theatershowadd where filmadd.filmid=theatershowadd.filmid and theatershowadd.theaterids=theaterreg.theaterid and theatershowadd.status='0' order by filmadd.filmid desc limit 4";
$result=mysqli_query($con,$sql);

$sql2="select * from filmadd order by filmid desc LIMIT 12";
$res=mysqli_query($con,$sql2);
?>

<!DOCTYPE HTML>
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
          
<script async="async" src="https://www.google.com/adsense/search/ads.js"></script>

<!-- other head elements from your page -->

<script type="text/javascript" charset="utf-8">
(function(g,o){g[o]=g[o]||function(){(g[o]['q']=g[o]['q']||[]).push(
  arguments)},g[o]['t']=1*new Date})(window,'_googCsa');
</script>

        
<!-- jQuery -->
<!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>
  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
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
			           <li><a href="about.html">About</a></li>
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
<div class="block">
	<div class="wrap">
		<div class="h-logo">
			<!--<a href="index.php"><img src="images/universal.png" style="width:70px;height:70px;" alt=""/></a> -->
			<h3 style="color:white;">UniversalCinemas</h3>
		</div>
        <form action="#" id="reservation-form">
		       <fieldset>
		                <div class="field">
			                 <label>Find a Movie:</label>
			                  <select class="select2" id="movie_list_select">
			                    <option>Movie list</option>
								<?php
								//$q="select * from filmadd,theatershowadd where filmadd.filmid =theatershowadd.filmid and theatershowadd.status='0'";
								$q="select * from filmadd,theaterreg,theatershowadd where filmadd.filmid=theatershowadd.filmid and theatershowadd.theaterids=theaterreg.theaterid and theatershowadd.status='0'";
								$w=mysqli_query($con,$q);
								while($r1=mysqli_fetch_array($w)){
								?>
								
								<option value="<?php echo encrypt($r1['filmid'],'anand'); ?>"><?php echo $r1['filmname'];?></option>
	
	<?php
	}
	?>
			                  </select>
			            </div>
		                <div class="field1">
			                   <label>Search</label>
			                  <select class="select1">
			                    <option>Movies or Actors</option>
			                  </select>
		                </div>
		       </fieldset>
            </form>
            <div class="clear"></div>
   </div>
</div>
<div class="banner">
 <div class="wrap">
      <section class="slider">
        <div class="flexslider">
          <ul class="slides">
            <li>
  	    	    <img src="images/banner1.jpg" alt=""/>
  	    	</li>
  	    	<li>
  	    	    <img src="images/qw.jpg"  alt=""/>
  	    	</li>
  	    	<li>
  	    	    <img src="images/qu.jpg"  alt=""/>
  	    	</li>
  	    	<li>
  	    	    <img src="images/123.jpg"  alt=""/>
  	    	</li>
          </ul>
        </div>
      </section>
   </div>
</div>
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="listview_1_of_3 images_1_of_3">
					<h3>Movie News</h3>
				<div class="content-left">
					<div class="listimg listimg_1_of_2">
						 <img src="images/pic.jpg" alt=""/>
					</div>
					<div class="text list_1_of_2">
						  <div class="extra-wrap">
                                          
<div id='afscontainer1'></div>
<script type="text/javascript" charset="utf-8">

  var pageOptions = {
    "pubId": "pub-9616389000213823", // Make sure this the correct client ID!
    "query": "movie trailers",
    "adPage": 1
  };

  var adblock1 = {
    "container": "afscontainer1",
    "width": "270",
    "number": 3
  };

  _googCsa('ads', pageOptions, adblock1);

</script>

        
                          </div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="content-left">
					<div class="listimg listimg_1_of_2">
						 <img src="images/pic1.jpg" alt=""/>
					</div>
					<div class="text list_1_of_2">
						  <div class="extra-wrap">
                               <div class="data">August. 05. 2013</div>
                               <a href="#" class="color"><strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</strong></a><br>
                               <span class="text-top">iam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,</span>
                          </div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="content-left">
					<div class="listimg listimg_1_of_2">
						 <img src="images/pic2.jpg" alt=""/>
					</div>
					<div class="text list_1_of_2">
						  <div class="extra-wrap">
                               <div class="data">August. 05. 2013</div>
                               <a href="#" class="color"><strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</strong></a><br>
                               <span class="text-top">iam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,</span>
                          </div>
					</div>
					<div class="clear"></div>
				</div>
			<a href="#" class="link2">See all</a>
		</div>				
		<div class="listview_1_of_3 images_1_of_3">
					<h3 style="margin-left:42%;">Trailers</h3>
					<div class="middle-list"> 
					
						<?php
					while($row1=mysqli_fetch_array($res))
						{
						?>
	
			<div class="col-md-4 col-md-offset-1" style="background-color:transparent;margin-top:10px; border-style: solid; border-color: white;border-radius: 5px;""> 	
			<!--<form name="myform" action="#" method="post">  -->
			<a  href="<?php echo $row1['teaser']?>"><img src="<?php echo $row1['filmpic']?>" style="width:100px; height:80px; margin-left:30%;" ></a><br>  
			<!--</form> -->
	
					</div>
					<?php
						}
						?>
						</div>
						
						
				<a href="#" class="link2">See all</a>
		</div>			
		<div class="listview_1_of_3 images_1_of_3" style="margin-left:70px";>
					<h3>&nbsp&nbsp&nbsp Films in Theaters</h3>
					<div class="content-left" >
			<?php
					while($row=mysqli_fetch_array($result))
{
	?>
	
	<div class="col-md-4 col-md-offset-1" style="background-color:transparent;margin-top:10px; border-style: solid; border-color: white;border-radius: 5px;""> 	
	<form name="myform" action="demo.php" method="post">
	<img src="<?php echo $row['filmpic']?>" style="width:50px; height:50px; margin-left:30%;" ><br>
	
	<input style="margin-top:5px;margin-left:25%; border-style:none;" type="text" name="Name" value="<?php echo $row['filmname']?>">
	
	<input style="margin-top:5px;margin-left:25%;border-style:none;" type="text" name="Actor" value="<?php echo $row['actor']?>">
	
	<input style="margin-top:5px;margin-left:25%;border-style:none;" type="text" name="Actress" value="<?php echo $row['actress']?>">
	
	<input style="margin-top:5px;margin-left:25%;border-style:none;" type="text" name="Producer" value="<?php echo $row['producer']?>">
	
	<input style="margin-top:5px;margin-left:25%;border-style:none;" type="text" name="Cat" value="<?php echo $row['category']?>">
	
	<input style="margin-top:5px;margin-left:25%;border-style:none;" type="text" name="Language" value="<?php echo $row['language']?>">
	
	<input style="margin-top:5px;margin-left:25%" type="hidden" name="sid" value="<?php echo $row['filmid']?>"/> <br>
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
?>
					<div class="clear"></div>
				</div>
				<a href="#" class="link2">See all</a>
				</div>		
				<div class="clear"></div>		
			</div>
	</div>
</div>
<div class="footer">
	<div class="wrap">
			<div class="footer-top">
				<div class="col_1_of_4 span_1_of_4">
					<div class="footer-nav">
		                <ul>
		                  <!-- <li><a href="#">Our Tips of gallery Template diam</a></li>
		                    <li><a href="#">Our Tips of gallery Template diam</a></li>
		                     <li><a href="#">Our Tips of gallery Template diam</a></li>
		                       <li><a href="#">Our Tips of gallery Template diam</a></li>  -->
		                   </ul>
		              </div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<div class="textcontact">
						<p>UniversalCinemas,<br>
						explore Us<br>
						Ph:+91-9946636083.<br>
						Email : <a href="anand.siv31@gmail.com">anand.siv31@gmail.com</a><br>
						</p>
					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<div class="call_info">
						<p class="txt_3">Call us toll free:</p>
						<p class="txt_4">+91 9946636083</p>
					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<div class=social>
						<a href="https://www.facebook.com/"><img src="images/fb.png" alt=""/></a>
						<a href="#"><img src="images/tw.png" alt=""/></a>
						<a href="#"><img src="images/dribble.png" alt=""/></a>
						<a href="#"><img src="images/pinterest.png" alt=""/></a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
	<div class="wrap">
	<div class="copy">
		<p>© 2013 Theater. All Rights Reserved | Design by <a href="http://w3layouts.com">W3Layouts</a></p>
	</div>
 	</div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
		$("#movie_list_select").change(function(){
			$val=$(this).val();
		//	$encrypted = encrypt($val, "check");
			window.location.href="search.php?fid="+$val;
		});
    });
  </script>
</html>
