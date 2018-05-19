<?php
session_start();
require_once 'common/connect.php';

if (isset($_SESSION['userSession'])!="") {
	header("Location: user/user_home.php");
	exit;
}

if (isset($_POST['btn-login'])) {
	
    $uemail = strip_tags($_POST['email']);
    $upassword = strip_tags($_POST['password']);
	
	$email = $con->real_escape_string($uemail);
	$password = $con->real_escape_string($upassword);
	
	$query = $con->query("SELECT id, email, password FROM users WHERE email='$email'");
	$row=$query->fetch_array();
	
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	
	if (password_verify($password, $row['password']) && $count==1) {
		$_SESSION['userSession'] = $row['id'];
		header("Location:user/user_home.php");
	} else {
		$msg = "<div class='alert alert-danger' style='width:42%;'>
					<span class='fa fa-thumbs-o-down'></span> &nbsp; Invalid Username or Password !
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
<div class="mainbox" style="height:670px;">
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
<div class="heading">USER LOGIN</div><hr/>
<?php
		if(isset($msg)){
			echo $msg;
		}
?>
<div style="width:100%;height:150px;">
<label>Username</label>
<input type="email" name="email" placeholder="Email Address" style="width:33%; height:25px; background-color:#FFFFB9;border:1px solid #9F9F9F; margin-left:2%;" required/><br/><br/>
<label>Password</label>&nbsp;
<input type="password" name="password" placeholder="Password" style="width:33%; height:25px; background-color:#FFFFB9;border:1px solid #9F9F9F; margin-left:2%;" required/><br/><br/>
<div class="button" align="right" style="margin-left:26.5%;">
<input type="submit" name="btn-login" value="Login" style="width:60%; height:30px; background-color:#9F0000; color:#FFFFFF; border:1px solid #530000;"/>
</div>
<div class="button" align="left">
<a href="register_users.php"><input type="button" value="SignUp" style="width:55%; height:30px; background-color:#2D2D2D; color:#FFFFFF; border:1px solid #333333;"/></a>
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