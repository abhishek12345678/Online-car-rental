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
<?php include("common/connect.php");
$bidf=$_REQUEST['bidf'];
$select="select * from cars where id='$bidf'";
$sql=mysqli_query($con,$select) or die("error");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
?>
<?php 
$cname=$row['cname'];
$eid=$_REQUEST['eid'];
$submit=$_POST['Submit'];
$name=$_POST['Name'];
$mobile=$_POST['Mobile'];
$email=$_POST['Email'];
$paddress=$_POST['Paddress'];
$daddress=$_POST['Daddress'];
$pdatec=$_POST['cpdate'];
$ddatec=$_POST['cddate'];
if($submit)
	{
	$insert="insert into bookcar set
	        cname='$cname',
			name='$name',
			mobile='$mobile',
			email='$email',
			paddress='$paddress',
			daddress='$daddress',
			pdate='$pdatec',
			ddate='$ddatec'";
			mysqli_query($con,$insert) or die(mysqli_error());
	}
			
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
<div class="mainbox" style="height:1280px;">
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
<p>Your booking was successfull.We will contact you soon regrding your booking.<br/>Your booking details are as beow:</p>
<div class="cars">
<div class="heading">YOUR BOOKING DETAILS AND RECEIPT</div><hr/>
<div class="leftbox" style="width:85%; height:190px; background-color:#F5F5F5;border:1px solid #A4A4A4; padding-left:2%;">
<br/>
<img src="img/<?php echo $row['image'];?>" style="width:35%; height:77%; border:1px solid #A4A4A4;"/>
<div class="desc" style="width:60%;">
<div calss="heading" style="color:#666666;"><?php echo $row['cname'];?></div>Company : <?php echo $row['company'];?><br/>Seats : <?php echo $row['seats'];?> Seaters<br/>Price Per Day : <?php echo $row['price'];?> Rs.
</div>
</div>
<div class="rightbox" style="width:100%; height:445px;">
<div class="heading">PICK UP/DROP OFF ADDRESS DETAILS</div><hr/>
<label>Name:</label><span style="margin-left:5%; color:#A60000;"><?php echo $name;?></span>
<br/><br/>
<label>Mobile:</label><span style="margin-left:5%; color:#A60000;"><?php echo $mobile;?></span>
<br/><br/>
<label>Email:</label><span style="margin-left:5%; color:#A60000;"><?php echo $email;?></span>
<br/><br/>
<label>Pick Up Address:</label><span style="margin-left:5%; color:#A60000;"><?php echo $paddress;?></span>
<br/><br/>
<label>Drop Off Address:</label><span style="margin-left:5%; color:#A60000;"><?php echo $daddress;?></span>
<br/><br/>
<div class="button"align="right"style="margin-left:8%;">
<input type="button" value="Print Details" style="width:60%; height:30px; background-color:#9F0000; color:#FFFFFF; border:1px solid #530000;"/>
</div>
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