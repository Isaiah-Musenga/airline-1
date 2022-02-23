<?php
require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php");
?>

<body class="app">
	<?php include("includes/header.php"); ?>
	<div class="app-wrapper">
		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<h1 class="app-page-title">My Profile Detials</h1>
				            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row">
                        	<div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Profile
                            </div>
                        	<div class="card mb-4 mt-4 col-sm-3">
							  <img class="card-img-top rounded mt-3" src="../img/img1.png" alt="Card image cap">
							  <div class="card-body">
							    <p class="card-text">Welcome : <?php echo $_SESSION['name']; ?></p>
							  </div>
							</div>
						
                        <div class="card mb-4 mt-4 col-sm-9">
                            <div class="card-body">
                            	<form action="edit_admin.php" method="POST">
                            		<?php
                            			$name = $_SESSION['name'];
										$query = mysqli_query($dbc, "SELECT * FROM admin WHERE name='$name'");
											$rows = mysqli_fetch_array($query);
									
									?>
                            		<div class="form-group mb-4">
                            		<p>Full Name : <?php echo $rows['name']; ?></p>
	                            	</div>
	                            	<div class="form-group">
	                            		Email Address : <?php echo $rows['email']; ?>
	                            	</div>
	                            	<div class="mt-3">
	                            		<a href="edit_account.php" class="btn btn-primary text-light">Edit Profile</a>
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
