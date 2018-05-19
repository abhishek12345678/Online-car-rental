<?php
session_start();

if (!isset($_SESSION['userSession'])) {
	header("Location:../admin_login.php");
} else if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['userSession']);
	header("Location:../admin_login.php");
}
?>
