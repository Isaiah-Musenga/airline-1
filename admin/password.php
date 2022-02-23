<?php
require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php");
?>

<body class="app">
	<?php include("includes/header.php"); ?>
	<div class="app-wrapper">
		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<h1 class="app-page-title">Change your password</h1>
				            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row">
                        	<div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Password
                            </div>
                        	<div class="card mb-4 mt-4 col-sm-3">
							  <img class="card-img-top rounded mt-3" src="../img/img1.png" alt="Card image cap">
							  <div class="card-body">
							    <p class="card-text">Welcome : <?php echo $_SESSION['name']; ?></p>
							  </div>
							</div>
						
                        <div class="card mb-4 mt-4 col-sm-9">
                            <div class="card-body">
                            	<form action="change_password.php" method="POST">
                            		<div class="form-group mb-4">
                            		<input type="email" name="email" placeholder="Email Address" required class="form-control">
	                            	</div>
                            		<div class="form-group mb-4">
                            		<input type="password" name="curr_pass" placeholder="Current Password" required class="form-control">
	                            	</div>
	                            	<div class="form-group mb-4">
	                            		<input type="password" name="new_pass" placeholder="New Password" required class="form-control">
	                            	</div>
	                            	<div class="form-group">
	                            		<input type="password" name="confirm_pass" placeholder="Confirm Password" required class="form-control">
	                            	</div>
	                            	<div class="mt-3">
	                            		<button class="btn btn-primary w-100" name="submit">Change Pasword</button>
	                            	</div>
                            	</form>

                            </div>
                        </div>

                        </div>
                    </div>
                </main>
            </div>

			</div>
			<!--//container-fluid-->
		</div>
		<!--//app-content-->

		<?php include("includes/footer.php") ?>