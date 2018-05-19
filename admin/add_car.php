<?php
session_start();
include("common/connect.php");

if (!isset($_SESSION['userSession'])) {
	header("Location:../admin_login.php"); 
}

$query = $con->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$con->close();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Car-Rental</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
</head>
<?php
require_once("common/connect.php");
$eid=$_REQUEST['eid'];
$submit=$_POST['Submit'];
$cname=$_POST['Cname'];
$cnumber=$_POST['Cnumber'];
$company=$_POST['Company'];
$city=$_POST['City'];
$type=$_POST['Type'];
$seats=$_POST['Seats'];
$price=$_POST['Price'];
$image=$_POST['Image'];
$description=$_POST['Description'];
if($eid!=''){

$button="Edit";
$pagetitle="EDIT CAR DETAILS";
$seld="select * from cars where id='$eid'";
$sql=mysqli_query($con,$seld) or die(mysqli_error());
$fetch=mysqli_fetch_array($sql,MYSQLI_ASSOC) or die(mysqli_error());

}
else{
$button="Submit";
$pagetitle="ADD NEW CAR";

}
if($submit=='Submit')
	{
	$insert="insert into cars set
			cname='$cname',
			cnumber='$cnumber',
			company='$company',
			city='$city',
			type='$type',
			seats='$seats',
			price='$price',
			image='$image',
			description='$description'";
			mysqli_query($con,$insert) or die(mysqli_error());
			header("Location:car_reports.php");
	}
	
	if($submit=="Edit"){
	$update="update cars set
			cname='$cname',
			cnumber='$cnumber',
			company='$company',
			city='$city',
			type='$type',
			seats='$seats',
			price='$price',
			image='$image',
			description='$description' where id='$eid'";
			mysqli_query($con,$update) or die(mysqli_error());
			header("Location:car_reports.php");
			
	}		
?>
<body>
<div class="mainbox" style="height:750px;">
<div class="header">
<div class="headercar"><img src="img/headercar.png"style="height:100px;"/></div>
<div class="linksheader">
<div class="link" align="center"><a href="home.php">HOME</a></div>
<div class="link" align="center"><a href="about.php">ABOUT US</a></div>
<div class="link" align="center"><a href="car_listing.php">CARS LIST</a></div>
<div style="width:20%; height:35px; float:left; padding-top:14px;border:1px solid #5E0000;" align="center">
<div class="dropdown">
<span class="fa fa-user-circle"></span>&nbsp;<?php echo $userRow['email']; ?>
<div class="dropdown-content">
<p><a href="add_car.php">ADD NEW CAR</a></p>
<p><a href="add_users.php">ADD SYSTEM USER</a></p>
</div>
</div>
</div>
<div class="link" align="center">
<div class="dropdown">
<span>REPORTS</span>
<div class="dropdown-content">
<p><a href="car_reports.php">CAR REPORTS</a></p>
<p><a href="booking_reports.php">BOOKING REPORTS</a></p>
<p><a href="user_reports.php">USER REPORTS</a></p>
<p><a href="contact_reports.php">CONTACT REPORTS</a></p>
</div>
</div>
</div>
<div class="link" align="center"><a href="logout.php?logout"><span class="fa fa-sign-out"></span>LOGOUT</a></div>
<div style="width:18.3%; height:35px; float:left; padding-top:14px;border:1px solid #5E0000;">
<div style="width:40%; float:left;"><input type="search" name="search" placeholder="Search"/></div>
<div style="width:30%; height:10px; padding-top:1px;  float:right;"><img src="img/search.jpg" style="width:50%; height:19px; float:left;"/></div></div>
</div>
</div>
<div class="bar"></div>
<div class="cars" style="height:450px;">
<form method="post">
<div class="heading"><?php echo $pagetitle;?></div><hr/>
<div style="width:100%;height:500px;">
<label>Name</label>
<input type="text" name="Cname" value="<?php echo $fetch['cname'];?>" style="margin-left:14%; background-color:#F5F5F5;  width:28.8%;" required/><br/><br/>
<label>Car Number</label>
<input type="text" name="Cnumber" value="<?php echo $fetch['cnumber'];?>" style="margin-left:8%; background-color:#F5F5F5;  width:28.8%;" required/><br/><br/>
<label>Company</label>&nbsp;
<input type="text" name="Company" value="<?php echo $fetch['company'];?>" style="margin-left:10%; background-color:#F5F5F5;  width:28.8%;" required/><br/><br/>
<label>City</label>
<input type="text" name="City" value="<?php echo $fetch['city'];?>" style="margin-left:15.6%; background-color:#F5F5F5;  width:28.8%;" required/><br/><br/>
<label>Type</label>
<input type="text" name="Type" value="<?php echo $fetch['type'];?>" style="margin-left:15%; background-color:#F5F5F5;  width:28.8%;" required/><br/><br/>
<label>Number of seats</label>
<input type="number" name="Seats" value="<?php echo $fetch['seats'];?>"style="margin-left:4.3%; background-color:#F5F5F5;  width:28.8%;" required/><br/><br/>
<label>Price Per Day</label>
<input type="number" name="Price" value="<?php echo $fetch['price'];?>"style="margin-left:6.5%; background-color:#F5F5F5; width:28.8%;" required/><br/><br/>
<label>Image</label>
<input type="file" name="Image" value="<?php echo $fetch['image'];?>"style="margin-left:13.5%; background-color:#F5F5F5; width:29%; border:1px solid #CCCCCC;" required/><br/><br/>
<label>Description</label>
<textarea type="text" name="Description" style="margin-left:8.5%; width:40%; height:20%;  background-color:#F5F5F5;" required><?php echo $fetch['description'];?></textarea><br/><br/>
<div class="button"align="right"style="margin-left:9%;">
<input type="submit" name="Submit" value="<?php echo $button;?>" style="width:60%; height:30px; background-color:#9F0000; color:#FFFFFF; border:1px solid #530000;" required/>
</div>
<div class="button"align="left">
<input type="reset" value="Reset" style="width:60%; height:30px; background-color:#2D2D2D; color:#FFFFFF; border:1px solid #333333;"/></div>
</div>
</form>
</div>
<div class="advertise" style="height:450px;">
<div class="heading">ADVERTISEMENTS</div><hr/>
<img src="img/adv1.jpg" style="width:100%; height:400px;"/>
</div>
</div>
<div class="heading" align="right">@ Online Car Rental System Designed and developed by Harman singh</div>
</body>
</html>