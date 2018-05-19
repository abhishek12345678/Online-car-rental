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
</head>
<body>
<div class="mainbox" style="height:740px;">
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
<p><a href="#">EDIT PROFILE</a></p>
</div>
</div>
</div>
<div class="link" align="center" style="width:12%; "><a href="logout.php?logout"><span class="fa fa-sign-out"></span>LOGOUT</a></div><div style="width:18.3%; height:35px; float:left; padding-top:14px;border:1px solid #5E0000;">
<div style="width:40%; float:left;"><input type="search" name="search" placeholder="Search"/></div>
<div style="width:30%; height:10px; padding-top:1px;  float:right;"><img src="img/search.jpg" style="width:50%; height:19px; float:left;"/></div></div>
</div>
</div>
<div class="bar"></div>
<div class="tablebox">
<div class="heading">BOOKING DETAILS</div><hr/>
<table border="1">
<tr>
<th style="width:6%;">Id</th>
<th style="width:10%;">Car name</th>
<th style="width:10%;">Pick up Date</th>
<th style="width:10%;">Drop off Date</th>
<th style="width:10%;">Name</th>
<th style="width:10%;">Mobile</th>
<th style="width:16%;">Email</th>
<th style="width:10%;">Action</th>
<tr/>
<?php include("common/connect.php");
$select="select * from bookcar" ;
$sql=mysqli_query($con,$select) or die("error");
$i=1;
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['cname'];?></td>
<td><?php echo $row['pdate']; ?></td>
<td><?php echo $row['ddate']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['mobile']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><a href="booking_detail.php?eid=<?php echo $row['id'];?>"><span style="color:#999999;">Edit</span></a>&nbsp; | &nbsp;<a href="user_booking_details.php?did=<?php echo $row['id'];?>"><span style="color:#999999;">Delete</span></a></td>
</tr>
<?php $i++;} ?>
</table>
</div>
</div>
<div class="heading" align="right">@ Online Car Rental System Designed and developed by Harman singh</div>
</body>
</html>