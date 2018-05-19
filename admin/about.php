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
<body>
<div class="mainbox" style="height:700px;">
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
<div class="heading">ABOUT ONLINE CAR RENTAL SYSTEM</div><hr/>
<p>Wheel Car Rental operates in more than 12 countries and has been customized to meet legal requirements and reporting as set by the respective tax authority.As art of our commitment to you,our software assurance policy guarantees that any current or future legal requirements imposed by your country will be implemented.</p>
<p>Wheels Car Rental is a complete front office and back office solution designed for car rental,franchise management and long term rental companies.Using our system you will be able to manage,book,invoice and perform all functions all from one place.In addition,wehave currently linked to over 30 accounting systems such as SAP,Microsoft Navision and others to post your transactions.</p>
<p>Wheels Car Rental reports can be customized with the addition of filters,columns i order to meet your needs.Customized reports can be saved and refused at any time.All reports can be exported to Microsoft Excel,PDF or e-mailed.</p>
<p>Using our  standard XML interface ,your partners can send new reservations,cancel reservations,poll for reservation status,request instant prices with rates & avaiability including insurance and counter products such as Navigation or Baby seats.Reservations can be confirmed automatically or reviewed by your staff.</p>
<p>Wheels Car Rental Fleet Maintenance includes all the tools to effectively monitor your inventory's state.Sundry expenses,regular maintenance,repairs,inspections and garage inventory are blended together to give you accurate expense o a vehicle,model,group station level.</p> 
</div>
<div class="advertise" style="height:450px;">
<div class="heading">ADVERTISEMENTS</div><hr/>
<img src="img/adv1.jpg" style="width:100%; height:400px;"/>
</div>
</div>
<div class="heading" align="right">@ Online Car Rental System Designed and developed by Harman singh</div>
</body>
</html>