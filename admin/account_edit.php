<?php
require_once('../Database Connection file/mysqli_connect.php');;

if (isset($_POST['update'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];

			$sql = mysqli_query($dbc, "UPDATE admin SET name = '$name', email = '$email' WHERE email = '$email'");

			echo "<script>alert('Update successful');</script>";
			echo "<script>window.location.replace('account.php');</script>";
			}
			else{
				echo "<script>alert('Failed to update');</script>";
				echo "<script>window.location.replcace('edit_account.php');</script>";
			}
?>