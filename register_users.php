<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
	header("Location: user_home.php");
}
require_once 'common/connect.php';

if(isset($_POST['btn-signup'])) {
	$name=strip_tags($_POST['Name']);
    $email=strip_tags($_POST['Email']);
    $password=strip_tags($_POST['Password']);
    $mobile=strip_tags($_POST['Mobile']);
    $dob=strip_tags($_POST['DOB']);
    $address=strip_tags($_POST['Address']);
    $city=strip_tags($_POST['City']);
    $state=strip_tags($_POST['State']);
    $country=strip_tags($_POST['Country']);

	$name = $con->real_escape_string($name);
	$email = $con->real_escape_string($email);
	$password = $con->real_escape_string($password);
	$mobile = $con->real_escape_string($mobile);
	$dob = $con->real_escape_string($dob);
	$address = $con->real_escape_string($address);
	$city = $con->real_escape_string($city);
	$state = $con->real_escape_string($state);
	$country = $con->real_escape_string($country);
	
	$hashed_password = password_hash($password, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
	
	$check_email = $con->query("SELECT email FROM users WHERE email='$email'");
	$count=$check_email->num_rows;
	
	if ($count==0) {
		
		$query = "INSERT INTO users(name,email,password,mobile,dob,address,city,state,country) VALUES('$name','$email','$hashed_password','$mobile','$dob','$address','$city','$state','$country')";

		if ($con->query($query)) {
			$msg = "<div class='alert alert-success' style='width:50%;'>
						<span class='fa fa-thumbs-o-up'></span> &nbsp; Successfully registered !
					</div>";
		}else {
			$msg = "<div class='alert alert-danger' style='width:50%;'>
						<span class='fa fa-thumbs-o-down'></span> &nbsp; Error while registering !
					</div>";
		}
		
	} else {
		
		
		$msg = "<div class='alert alert-danger' style='width:50%;'>
					<span class='fa fa-thumbs-o-down'></span> &nbsp; Sorry email already taken !
				</div>";
			
	}

	$con->close();
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Car-Rental</title>
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="mainbox" style="height:830px;">
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
<div class="bar"></div>
<div class="cars" style="height:450px;" align="center">
<form method="post">
<div class="heading">USER REGISTRATION (FILL YOUR DETAILS)</div><hr/>
<?php
		if (isset($msg)) {
			echo $msg;
		}
?>
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
<input type="date" name="DOB" value="<?php echo $fetch['dob'];?>" style="margin-left:7.7%; background-color:#F5F5F5;  width:30%;" required/><br/><br/>
<label>Address</label>
<input type="text" name="Address" value="<?php echo $fetch['address'];?>" style="margin-left:12.7%; height:50px; background-color:#F5F5F5; width:30%;" required/><br/><br/>
<label>City</label>
<input type="text" name="City" value="<?php echo $fetch['city'];?>" style="margin-left:16.7%; background-color:#F5F5F5;  width:30%;" required/><br/><br/>
<label>State</label>
<input type="text" name="State" value="<?php echo $fetch['state'];?>" style="margin-left:16%; background-color:#F5F5F5;  width:30%;" required/><br/><br/>
<label>Country</label>
<input type="text" name="Country" value="<?php echo $fetch['country'];?>" style="margin-left:12.7%; background-color:#F5F5F5;  width:30%;" required/><br/><br/>
<div class="button"align="right"style="margin-left:31%;">
<input type="submit" name="btn-signup" value="Submit" style="width:56%; height:30px; background-color:#9F0000; color:#FFFFFF; border:1px solid #530000;"/>
</div>
<div class="button"align="left">
<a href="user_login.php">
<input type="button" value="Login" style="width:56%; height:30px; background-color:#2D2D2D; color:#FFFFFF; border:1px solid #333333;"/>
</a>
</div>
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