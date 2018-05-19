<?php include("common/connect.php");
$name=$_POST['Name'];
$company=$_POST['Company'];
$email=$_POST['Email'];
$phone=$_POST['Phone'];
$message=$_POST['Message'];
$insert="insert into contact set
			name='$name',
			company='$company',
			email='$email',
			phone='$phone',
			message='$message'";
			mysqli_query($con,$insert) or die(mysqli_error());
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Car-Rental</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="mainbox" style="height:750px;">
<div class="header">
<div class="headercar"><img src="img/headercar.png"style="height:100px;"/></div>
<div class="linksheader">
<div class="link" align="center"><a href="index.php">HOME</a></div>
<div class="link" align="center"><a href="about.php">ABOUT US</a></div>
<div class="link" align="center"><a href="book_car.php">BOOK CAR</a></div>
<div class="link" align="center"><a href="car_listing.php">CARS LIST</a></div>
<div class="link" align="center"><a href="user_login.php">USER LOGIN</a></div>
<div class="link" style="width:15%; height:35px;" align="center"><a href="admin_login.php"> ADMIN LOGIN</a></div>
<div style="width:15%; height:35px; float:left; padding-top:14px;border:1px solid #5E0000;" align="center"><a href="contact_us.php">CONTACT US</a></div>
<div style="width:18.3%; height:35px; float:left; padding-top:14px;border:1px solid #5E0000;">
<div style="width:30%; float:left;"><input type="text" name="search" placeholder="Search"/></div>
<div style="width:30%; height:10px; padding-top:1px;  float:right;"><img src="img/search.jpg" style="width:50%; height:19px; float:left;"/></div></div>
</div>
</div>
<div class="bar"></div>
<div class="cars" style="height:450px;">
<div class="heading">CONTACT US</div><hr/>
<div style="width:100%;height:500px;">
<p>Thank you for cotacting us.We will get back to you soon !!!!</p>
</div>
</div>
<div class="advertise" style="height:450px;">
<div class="heading">WHERE TO FIND US</div><hr/>
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=https://maps.googleapis.com/maps/api/js?key=AIzaSyBm4LZUX0U54db0TmIsSlNlJh4gzlExp64&callback=initMap'></script><div style='overflow:hidden;height:400px;width:520px;'><div id='gmap_canvas' style='height:400px;width:520px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://embed-map.org/'>embed google maps in wordpress</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=8d6a1bebac7fa3fe2f9eb614ea5b497c1deb840a'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(30.8820495,75.79324050000002),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(30.8820495,75.79324050000002)});infowindow = new google.maps.InfoWindow({content:'<strong>Ghawaddi,Punjab,India</strong><br>2<br> Ludhiana<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBm4LZUX0U54db0TmIsSlNlJh4gzlExp64&callback=initMap">
    </script>

<div calss="heading" style="color:#666666; font-size:20px;">Get in touch</div>
<p>You'll find us,offices sitting right in<br/>the town centre in the middle of Guildford,surrey.</p>
<p>171 abc Street<br/>Lipsum<br/>Lorem<br/>GU5 3AB</p>
<p>+44(0)2563 586215<br/>info@lipsum.com</p>
</div>
</div>
<div class="heading" align="right">@ Online Car Rental System Designed and developed by Harman singh</div>
</body>
</html>