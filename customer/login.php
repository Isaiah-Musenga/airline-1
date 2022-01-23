<?php

require_once('../Database Connection file/mysqli_connect.php');
			session_start();
			session_destroy();
			session_start();

			if(isset($_POST['Login']))
			{
				$data_missing=array();
				if(empty($_POST['username']))
				{
					$data_missing[]='Username';
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
					$pass_word=$_POST['password'];
				}

				if(empty($data_missing))
				{
					$query="SELECT count(*) FROM Customer where customer_id=? and pwd=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ss",$user_name,$pass_word);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$cnt);
					mysqli_stmt_fetch($stmt);
					//echo $cnt;
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					/*$affected_rows=mysqli_stmt_affected_rows($stmt);
					$response=@mysqli_query($dbc,$query);
					echo $affected_rows;
					*/
					if($cnt==1)
					{
						echo "Logged in <br>";
						$_SESSION['login_user']=$user_name;
						echo $_SESSION['login_user']." is logged in";
						header("location: index.php");
					}
					else
					{
						echo "Login Error";
						session_destroy();
						header('location:login.php?msg=failed');
					}
					
				}
				else
				{
					echo "The following data fields were empty<br>";
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
    <title>Login - Airline Reservation System</title>
    
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
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
                    <?php
                        if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
                            echo "<br>
                                    <strong style='color:red'>Invalid Username/Password</strong>
                                    <br><br>";
                        }
                    ?>
					<h2 class="auth-heading text-center mb-5">Login</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" action="" method="POST">         
							<div class="username mb-3">
								<label class="sr-only" for="username">username</label>
								<input id="username" name="username" type="text" class="form-control username" placeholder="Enter Username" required="required">
							</div><!--//form-group-->
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
									</div><!--//col-6-->
									<div class="col-6">
										<div class="forgot-password text-end">
											<a href="#">Forgot password?</a>
										</div>
									</div><!--//col-6-->
								</div><!--//extra-->
							</div><!--//form-group-->
							<div class="text-center">
								<input type="submit" name="Login" value="Login" class="btn app-btn-primary w-100 theme-btn mx-auto"/>
							</div>
						</form>
					</div><!--//auth-form-container-->	
					<div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="signup.php" >here</a>.</div>
	
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
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h1 class="mb-3 overlay-title text-center">Online Air Ticket Reservation System</h1>
					    <div class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia cupiditate incidunt suscipit ullam eum, accusamus vitae aperiam nostrum accusantium omnis animi architecto optio dolorem vero commodi dolorum quidem. Consectetur dolor repellendus nihil laboriosam eum nobis delectus tempore dolores aliquam blanditiis! </div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

