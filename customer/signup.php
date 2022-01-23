<?php
	require_once('../Database Connection file/mysqli_connect.php');
			if(isset($_POST['Submit']))
			{
				$data_missing=array();
				if(empty($_POST['username']))
				{
					$data_missing[]='User Name';
				}
				else
				{
					$user_name=trim($_POST['username']);
				}
				if(empty($_POST['password']))
				{
					$data_missing[]='Password';
				}
				else
				{
					$password=$_POST['password'];
				}
				if(empty($_POST['email']))
				{
					$data_missing[]='Email ID';
				}
				else
				{
					$email_id=trim($_POST['email']);
				}

				if(empty($_POST['name']))
				{
					$data_missing[]='Name';
				}
				else
				{
					$name=$_POST['name'];
				}
				if(empty($_POST['phone_no']))
				{
					$data_missing[]='Phone No.';
				}
				else
				{
					$phone_no=trim($_POST['phone_no']);
				}
				if(empty($_POST['address']))
				{
					$data_missing[]='Address';
				}
				else
				{
					$address=$_POST['address'];
				}

				if(empty($data_missing))
				{
					$query="INSERT INTO Customer (customer_id,pwd,name,email,phone_no,address) VALUES (?,?,?,?,?,?)";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ssssss",$user_name,$password,$name,$email_id,$phone_no,$address);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
					//echo $affected_rows."<br>";
					// mysqli_stmt_bind_result($stmt,$cnt);
					// mysqli_stmt_fetch($stmt);
					// echo $cnt;
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					/*
					$response=@mysqli_query($dbc,$query);
					*/
					if($affected_rows==1)
					{
						header('location:login.php');
					}
					else
					{
						echo "Submit Error";
						//echo mysqli_error();
					}
				}
				else
				{
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
				}
			}
		?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    
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

<body class="app app-signup p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-1 mt-0"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Register</h2>					
	
					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form" method="POST" action="">         
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Full Name</label>
								<input id="signup-name" name="name" type="text" class="form-control signup-name" placeholder="Full name" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Email Address</label>
								<input id="signup-name" name="email" type="email" class="form-control signup-name" placeholder="Enter Email" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Phone Number</label>
								<input id="signup-name" name="phone_no" type="number" class="form-control signup-name" placeholder="Enter Phone Number" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Address</label>
								<input id="signup-name" name="address" type="text" class="form-control signup-name" placeholder="Enter Home Address" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Username</label>
								<input id="signup-email" name="username" type="text" class="form-control signup-email" placeholder="Enter Username" required="required">
							</div>
							<div class="password mb-3">
								<label class="sr-only" for="signup-password">Password</label>
								<input id="signup-password" name="password" type="password" class="form-control signup-password" placeholder="Create a password" required="required">
							</div>
							<div class="extra mb-3">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
									<label class="form-check-label" for="RememberPassword">
									I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and <a href="#" class="app-link">Privacy Policy</a>.
									</label>
								</div>
							</div><!--//extra-->
							
							<div class="text-center">
								<input type="submit" value="Register" name="Submit" class="btn app-btn-primary w-100 theme-btn mx-auto">
							</div>
							<div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="login.php" >Log in</a></div>
						</form><!--//auth-form-->
						
					</div><!--//auth-form-container-->	
					
					
				    
			    </div><!--//auth-body-->
		    
			    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
			        <h4 class="copyright ">All Rights Reserved!</h4>
				    </div>
			    </footer><!--//app-auth-footer-->		
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">			    
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-4 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title text-center">Explore Portal Admin Template</h5>
					    <div class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia cupiditate incidunt suscipit ullam eum, accusamus vitae aperiam nostrum accusantium omnis animi architecto optio dolorem vero commodi dolorum quidem. Consectetur dolor repellendus nihil laboriosam eum nobis delectus tempore dolores aliquam blanditiis! </div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

