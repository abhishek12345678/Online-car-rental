<?php include("common/connect.php");
$pdate=$_POST['Pdate'];
$ddate=$_POST['Ddate'];
?>
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
<div class="mainbox" style="height:1230px;">
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
<div style="width:30%; float:left;"><input type="text" name="search" placeholder="Search"/></div>
<div style="width:30%; height:10px; padding-top:1px;  float:right;"><img src="img/search.jpg" style="width:50%; height:19px; float:left;"/></div></div>
</div>
</div>
<div class="maincar"><?php include("standard.php");?></div>
<div class="bar"></div>
<div class="cars">
<div class="heading">BOOK YOUR CAR</div><hr/>
<form method="post" action="booking_car.php">
<div style="width:100%;height:150px;">
<label>Pick Up Date</label>&nbsp;&nbsp;
<input type="date" name="Pdate" style="width:30%; height:25px; background-color:#E9E9E9;border:1px solid #9F9F9F;" value="<?php echo $pdate;?>"required/><br/><br/>
<label>Drop Off Date</label>
<input type="date" name="Ddate" style="width:30%; height:25px; background-color:#E9E9E9;border:1px solid #9F9F9F;" value="<?php echo $ddate;?>"required/><br/><br/>
<div class="button"align="right">
<input type="button" value="Search Car" style="width:53%; height:35px; background-color:#9F0000; color:#FFFFFF; border:1px solid #530000;"required/>
</div>
<div class="button"align="left">
<input type="reset" value="Reset" style="width:53%; height:35px; background-color:#2D2D2D; color:#FFFFFF; border:1px solid #333333;"/>
</div>
</div>
</form>
<div class="heading">CHOOSE YOUR CAR</div><hr/>
<div class="leftbox" style="height:450px;">
<?php include("common/connect.php");
$select="select * from cars";
$sql=mysqli_query($con,$select) or die("error");
$i=1;
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
?>
<div class="heading"></div>
<img src="img/<?php echo $row['image'];?>" style="width:30%; height:18%;"/>
<div class="desc">
<?php echo $row['cname'];?><br/>Company : <?php echo $row['company'];?><br/>Seats :<?php echo $row['seats'];?> Seaters<br/>Price Per Day : <?php echo $row['price'];?>Rs.<br> <input type="hidden" name="pdate" value="<?php echo $pdate; ?>"> <br><input type="hidden" name="ddate" value="<?php echo $ddate; ?>">
</div>
<?php $i++; }?>
</div>
<div class="rightbox" style="height:450px;">
<?php 
$select="select * from cars";
$sql=mysqli_query($con,$select) or die("error");
$i=1;
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
?>
<div class="desc" style="padding-top:33px;">
<a href="booking_detail.php?bid=<?php echo $row['id'];?>&pd=<?php echo $pdate;?>&dd=<?php echo $ddate;?>">
<input type="button" value="Book Your Car Now" style="width:70%; height:40px; background-color:#9F0000; border:1px solid #5E0000; color:#FFFFFF;"/></a>
</div>
<?php $i++; }?>
</div>
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