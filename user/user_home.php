<?php
session_start();
include("common/connect.php");

if (!isset($_SESSION['userSession'])) {
	header("Location:../user_login.php"); 
}

$query = $con->query("SELECT * FROM users WHERE id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$con->close();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Welcome - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="mainbox">
<div class="header">
<div class="headercar"><img src="img/headercar.png"style="height:100px;"/></div>
<div class="linksheader">
<div class="link" align="center" style="width:13.4%;"><a href="user_home.php">HOME</a></div>
<div class="link" align="center" style="width:15%;"><a href="book_car.php">BOOK CAR</a></div>
<div class="link" align="center" style="width:15%;"><a href="car_listing.php">CARS LIST</a></div>
<div style="width:25%; height:35px; float:left; padding-top:14px;border:1px solid #5E0000;" align="center">
<div class="dropdown">
<span class="fa fa-user-circle"></span>&nbsp; <?php echo $userRow['email']; ?>
<div class="dropdown-content">
<p><a href="user_booking_details.php">BOOKING DETAILS</a></p>
<p><a href="#">CHANGE PASSWORD</a></p>
</div>
</div>
</div>
<div class="link" align="center" style="width:12%; "><a href="logout.php?logout"><span class="fa fa-sign-out"></span>LOGOUT</a></div>
<div style="width:18.3%; height:35px; float:left; padding-top:14px;border:1px solid #5E0000;">
<div style="width:40%; float:left;"><input type="search" name="search" placeholder="Search"/></div>
<div style="width:30%; height:10px; padding-top:1px;  float:right;"><img src="img/search.jpg" style="width:50%; height:19px; float:left;"/></div></div>
</div>
</div>
<div class="maincar"><?php include("standard.php");?></div>
<div class="cars">
<div class="heading">OUR LUXARIES CARS</div><hr/>
<?php include("common/connect.php");
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