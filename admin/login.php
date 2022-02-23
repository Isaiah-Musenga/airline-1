<?php

require_once('../Database Connection file/mysqli_connect.php');
session_start();
session_destroy();
session_start();

if (isset($_POST['Login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "SELECT * FROM admin WHERE email='$email' and password='$password'";
	$stmt = mysqli_query($dbc, $query);

	if (isset($_POST['Login'])) {

		$email = $_POST['email'];
		$password = $_POST['password'];
	
		$query = "select * from admin where email='$email' and password='$password'";
		$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
		if (mysqli_num_rows($result) == 1) {
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$_SESSION['loggedin'] = true;
				$_SESSION['id'] = $row['id'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['login_user']=$email;
			}
			header("Location:index.php");
		} else {
				session_destroy();
				header('location:login.php?msg=failed');
				
			}
	}
	
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Login - Air Ticket Managent System</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
	<meta name="author" content="Xiaoying Riley at 3rd Wave Media">
	<link rel="shortcut icon" href="favicon.ico">

	<!-- FontAwesome JS-->
	<script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head>

<body class="app app-login p-0">
	<div class="row g-0 app-auth-wrapper">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto">
					<div class="app-auth-branding mb-4"><a class="app-logo" href="#"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<?php
					if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
						echo "<br>
                                    <strong style='color:red'>Invalid Username/Password</strong>
                                    <br><br>";
					}
					?>
					<h2 class="auth-heading text-center mb-5">Admin Login</h2>
					<div class="auth-form-container text-start">
						<form class="auth-form login-form" action="" method="POST">
							<div class="username mb-3">
								<label class="sr-only" for="email">Email</label>
								<input id="email" name="email" type="text" class="form-control email" placeholder="Enter Email" required="required">
							</div>
							<!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="password">Password</label>
								<input id="password" name="password" type="password" class="form-control password" placeholder="Password" required="required">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
												Remember me
											</label>
										</div>
									</div>
								</div>
								<!--//extra-->
							</div>
							<!--//form-group-->
							<div class="text-center">
								<input type="submit" name="Login" value="Login" class="btn app-btn-primary w-100 theme-btn mx-auto" />
							</div>
						</form>
						<a href="../index.php">Go back home</a>
					</div>
					<!--//auth-form-container-->

				</div>
				<!--//auth-body-->

				<footer class="app-auth-footer">
					<div class="container text-center py-3">
						<h4 class="copyright ">All Rights Reserved!</h4>
					</div>
				</footer>
				<!--//app-auth-footer-->
			</div>
			<!--//flex-column-->

		</div>
		<!--//auth-main-col-->
		<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
			<div class="auth-background-holder">
			</div>
			<div class="auth-background-mask"></div>
			<div class="auth-background-overlay p-3 p-lg-5">
				<div class="d-flex flex-column align-content-end h-100">
					<div class="h-100"></div>
					<div class="overlay-content p-3 p-lg-4 rounded">
						<h1 class="mb-3 overlay-title text-center">Air Ticket Managent System</h1>
						<div class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
					</div>
				</div>
			</div>
			<!--//auth-background-overlay-->
		</div>
		<!--//auth-background-col-->

	</div>
	<!--//row-->


</body>

</html>