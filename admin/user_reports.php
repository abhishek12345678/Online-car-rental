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
<?php
include("common/connect.php");
$did=$_REQUEST['did'];
if($did!=''){
mysqli_query($con,"delete from users where id='$did'") or die(mysqli_error());
header("location:user_reports.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Car-Rental</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="mainbox" style="height:740px;">
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
<div class="tablebox">
<div class="heading">USER REPORTS</div><hr/>
<table border="1">
<tr>
<th style="width:4%;">Sr.No.</th>
<th style="width:8%;">Name</th>
<th style="width:10%;">Mobile</th>
<th style="width:12%;">Email</th>
<th style="width:8%;">Date of Birth</th>
<th style="width:10%;">Action</th>
</tr>
<?php
$select="select * from users";
$sql=mysqli_query($con,$select) or die("error");
$i=1;
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['mobile']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['dob']; ?></td>
<td><a href="add_users.php?eid=<?php echo $row['id'];?>"><span style="color:#999999;">Edit</span></a>&nbsp; | &nbsp;<a href="user_reports.php?did=<?php echo $row['id'];?>"><span style="color:#999999;">Delete</span></a></td>
</tr>
<?php $i++;} ?>
</table>
</div>
</div>
<div class="heading" align="right">@ Online Car Rental System Designed and developed by Harman singh</div>
</body>
</html>