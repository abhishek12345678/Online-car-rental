<!DOCTYPE HTML>
<html>
<head>
<title>Car-Rental</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="mainbox" style="height:1230px;">
<div class="header">
<div class="headercar"><img src="img/headercar.png"style="height:100px;"/></div>
<div class="linksheader">
<div class="link" align="center"><a href="index.php">HOME</a></div>
<div class="link" align="center"><a href="about.php">ABOUT US</a></div>
<div class="link" align="center" style="width:15%;"><a href="car_listing.php">CARS LIST</a></div>
<div class="link" align="center" style="width:15%;"><a href="user_login.php">USER LOGIN</a></div>
<div class="link" style="width:15%; height:35px;" align="center"><a href="admin_login.php"> ADMIN LOGIN</a></div>
<div style="width:15%; height:35px; float:left; padding-top:14px;border:1px solid #5E0000;" align="center"><a href="contact_us.php">CONTACT US</a></div>
<div style="width:18.3%; height:35px; float:left; padding-top:14px;border:1px solid #5E0000;">
<div style="width:30%; float:left;"><input type="text" name="search" placeholder="Search"/></div>
<div style="width:30%; height:10px; padding-top:1px;  float:right;"><img src="img/search.jpg" style="width:50%; height:19px; float:left;"/></div></div>
</div>
</div>
<div class="maincar"><?php include("standard.php");?></div>
<div class="bar"></div>
<div class="cars">	
<div class="heading">OUR LUXARIES CARS</div><hr/>
<?php require_once("common/connect.php");
$select="select * from cars";
$sql=mysqli_query($con,$select) or die("error");
$i=1;
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
?>
<div class="leftbox" style="margin-right:0.5%; margin-left:1%; padding-left:2%; padding-right:2%; width:44%;">
<div class="heading"><?php echo $row['cname'];?></div>
<img src="img/<?php echo $row['image'];?>" style="width:100%; height:50%;"/>
<?php echo $row['description'];?>
</div>
<?php $i++;}?>
</div>
<div class="advertise">
<div class="heading">ADVERTISEMENTS</div><hr/>
<div class="adv"><img src="img/adv1.jpg" style="width:100%; height:98%;"/></div>
<div class="adv"><img src="img/adv2.jpg" style="width:100%; height:100%;"/></div>
</div>
</div>
<div class="heading" align="right">@ Online Car Rental System Designed and developed by Harman singh</div>
</body>
</html>