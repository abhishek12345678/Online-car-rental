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
<title>Welcome to Admin-<?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<?php include("common/connect.php");
$eid=$_REQUEST['eid'];
$submit=$_POST['Submit'];
$name=$_POST['Name'];
$email=$_POST['Email'];
$password=$_POST['Password'];
$mobile=$_POST['Mobile'];
$dob=$_POST['DOB'];
$address1=$_POST['Address1'];
$address2=$_POST['Address2'];
$city=$_POST['City'];
$state=$_POST['State'];
$country=$_POST['Country'];
if($eid!=''){

$button="Edit";
$pagetitle="EDIT USER DETAILS";
$seld="select * from users where id='$eid'";
$sql=mysqli_query($con,$seld) or die(mysqli_error());
$fetch=mysqli_fetch_array($sql,MYSQLI_ASSOC) or die(mysqli_error());

}
else{
$button="Submit";
$pagetitle="USER REGISTRATION";

}
if($submit=='Submit')
	{
	$insert="insert into users set
			name='$name',
	        email='$email',
			password='$password',
			mobile='$mobile',
			dob='$dob',
			address1='$address1',
			address2='$address2',
			city='$city',
			state='$state',
			country='$country'";
			mysqli_query($con,$insert) or die(mysqli_error());
			header("Location:user_reports.php");
	}
	
	if($submit=="Edit"){
	$update="update users set
			name='$name',
			email='$email',
			password='$password',
			mobile='$mobile',
			dob='$dob',
			address1='$address1',
			address2='$address2',
			city='$city',
			state='$state',
			country='$country' where id='$eid'";
			mysqli_query($con,$update) or die(mysqli_error());
			header("Location:user_reports.php");
			
	}		
?>
<body>
<div class="mainbox" style="height:830px;">
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
<input type="text" name="Name" value="<?php echo $fetch['name'];?>" style="margin-left:15%; background-color:#F5F5F5;  width:30%;" required/><br/><br/>
<label>Email</label>
<input type="email" name="Email" value="<?php echo $fetch['email'];?>" style="margin-left:15%; background-color:#F5F5F5;  width:30%;" required/><br/><br/>
<label>Password</label>
<input type="password" name="Password" value="<?php echo $fetch['password'];?>" style="margin-left:11.5%; background-color:#F5F5F5;  width:30%;" required/><br/><br/>
<label>Mobile</label>
<input type="number" name="Mobile" value="<?php echo $fetch['mobile'];?>" style="margin-left:13.8%; background-color:#F5F5F5;  width:30%;" required/><br/><br/>
<label>Date of Birth</label>
<input type="date" name="DOB" value="<?php echo $fetch['dob'];?>" style="margin-left:8%; background-color:#F5F5F5;  width:30%;" required/><br/><br/>
<label>Address Line 1</label>
<input type="text" name="Address1" value="<?php echo $fetch['address1'];?>" style="margin-left:6%; background-color:#F5F5F5; width:30%;" required/><br/><br/>
<label>Address Line 2</label>
<input type="text" name="Address2" value="<?php echo $fetch['address2'];?>" style="margin-left:6%; background-color:#F5F5F5; width:30%;" required/><br/><br/>
<label>City</label>
<input type="text" name="City" value="<?php echo $fetch['city'];?>" style="margin-left:16.2%; background-color:#F5F5F5;  width:30%;" required/><br/><br/>
<label>State</label>
<input type="text" name="State" value="<?php echo $fetch['state'];?>" style="margin-left:15.7%; background-color:#F5F5F5;  width:30%;" required/><br/><br/>
<label>Country</label>
<input type="text" name="Country" value="<?php echo $fetch['country'];?>" style="margin-left:13%; background-color:#F5F5F5;  width:30%;" required/><br/><br/>
<div class="button"align="right"style="margin-left:8%;">
<input type="submit" name="Submit" value="<?php echo $button;?>" style="width:56%; height:30px; background-color:#9F0000; color:#FFFFFF; border:1px solid #530000;"/>
</div>
<div class="button"align="left">
<input type="reset" value="Reset" style="width:56%; height:30px; background-color:#2D2D2D; color:#FFFFFF; border:1px solid #333333;"/></div>
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