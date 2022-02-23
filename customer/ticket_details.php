<?php

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php");


$email = $_SESSION['login_user'];
?>

<?php

	$no_of_pass=$_SESSION['no_of_pass'];
	$class=$_SESSION['class'];
	$count=$_SESSION['count'];
	$flight_id=$_POST['select_flight'];
	//$id = $_SESSION['id'];
	$_SESSION['flight_id'] = $flight_id;
?>

<body class="app">
	<?php include("includes/header.php"); ?>

	<div class="app-wrapper">
		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<div class="row g-4 settings-section">
					<div class="col-auto">
						<h1 class="app-page-title text-uppercase text-center">Add Ticket Details</h1>
					</div>

					<div class="col-12 col-md-12">
						<div class="app-card app-card-settings shadow-sm p-4">
							<div class="app-card-body">
								<form class="settings-form" action="add_ticket_details_form_handler.php" method="post">
									<div class="row mb-3">
										<div class="col">
											<label for="setting-input-1" class="form-label">Passenger Name.</label>
											<input type="text" class="form-control" placeholder="Passenger Name" aria-label="" name="name" required />
										</div>
										<div class="col">
											<label for="" class="form-label">Passenger Age</label>
											<input type="number" class="form-control" placeholder="Passeger Age" aria-label="Last name" name="age" required />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col">
											<label for="" class="form-label">Select Gender</label>
											<select name="pass_gender[]" class="form-control">
												<option value="male">Male</option>
												<option value="female">Female</option>
												<option value="other">Other</option>
											</select>
										</div>
										<div class="col">
											<label for="setting-input-1" class="form-label">In-Flight Meal</label>
											<select name="pass_meal[]" class="form-control">
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<input type="submit" value="Submit Travel/Ticket Details" name="Submit" class="btn app-btn-primary btn-block">
								</form>
							</div>

						</div>
						<!--//app-card-->
					</div>
				</div>
			</div>
			<!--//container-fluid-->
		</div>
	</div>
	<!--//container-fluid-->
	</div>
	</div>
	<!--//app-content-->
	<?php include("includes/footer.php") ?>