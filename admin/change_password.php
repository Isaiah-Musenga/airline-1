<?php
require_once('../Database Connection file/mysqli_connect.php');

if (isset($_POST['submit'])) {

	$email = $_POST['email'];
	$curr_pass = $_POST['curr_pass'];
	$new_pass = $_POST['new_pass'];
	$confirm_pass = $_POST['confirm_pass'];

	$query1 = mysqli_query($dbc, "SELECT password FROM admin WHERE email = '$email'");
	$row=mysqli_fetch_array($query1);
	$check_password = $row['password'];
	if ($curr_pass != $check_password ) 
	{
		echo "<script>alert('Current Password is wrong');</script>";
		echo "<script>window.location.href='password.php';</script>";
	}
	else
	{
		if ($new_pass != $confirm_pass) 
		{
			echo "<script>alert('New password does not match confirmed password');</script>";
			echo "<script>window.location.href='password.php';</script>";
		}
		else
		{
			$query2 = mysqli_query($dbc, "UPDATE admin SET password = '$confirm_pass' WHERE email = '$email'");
			echo "<script>alert('Password Changed..!');</script>";
			echo "<script>window.location.href='password.php';</script>";
		}
	}

}

?>