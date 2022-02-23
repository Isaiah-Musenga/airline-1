<?php

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php");

?>

<?php
			if(isset($_POST['Submit']))
			{

				$jet_id=$_POST['jet_id'];
				$origin=$_POST['origin'];
				$destination=$_POST['destination'];
				$departure_date=$_POST['departure_date'];
				$arrival_date=$_POST['arrival_date'];
				$seats_eco=$_POST['seats_eco'];
				$seats_bus=$_POST['seats_bus'];
				$price_eco=$_POST['price_eco'];
				$price_bus=$_POST['price_bus'];
	
					$cnt=-1;
					$query="SELECT count(*) FROM Jet_Details WHERE id='$jet_id' and active='Yes'";
					$res=mysqli_query($dbc,$query);

					$query="INSERT INTO Flight_Details (jet_id,from_city,to_city,departure_date,arrival_date,seats_economy,seats_business,price_economy,price_business) VALUES ('$jet_id','$origin','$destination','$departure_date','$arrival_date','$seats_eco','$seats_bus','$price_eco','$price_bus')";
					$stmt=mysqli_query($dbc,$query);

					if($stmt)
					{
						echo "Successfully Submitted";
						header("location: all_flights.php?msgs=success");
					}
					else
					{
						echo "Submit Error";
						echo mysqli_error($dbc);
						//header("location: add_flight.php?msg=failed");
					}
				
			}
			else
			{
				echo "Submit request not received";
			}
		?>

<body class="app">
	<?php include("includes/header.php"); ?>

	<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<div class="position-relative mb-3">
					<div class="row g-3 justify-content-center">
						<div class="col-auto">
							<h1 class="app-page-title text-uppercase">Add Flight Details</h1>
						</div>
					</div>
				</div>

				<?php
				if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
					echo "<strong class='text-center' style='color: green'>The Flight Schedule has been successfully added.</strong>
						<br>
						<br>";
				} else if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
					echo "<strong class='text-center' style='color: red'>*Invalid Flight Schedule Details, please enter again.</strong>
						<br>
						<br>";
				}
				?>

				<div class="app-content pt-3 p-md-3 p-lg-4">
					<div class="container-xl">
						<div class="row g-4 settings-section">
							<div class="col-12 col-md-12">
								<div class="app-card app-card-settings shadow-sm p-4">
									<div class="app-card-body">
										<form class="settings-form" action="" method="post">
											<div class="row mb-3">
												<div class="col-6">
												<label for="setting-input-1" class="form-label">Plane No.</label>
													<input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="jet_id" required />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col">
												<label for="setting-input-1" class="form-label">Origin</label>
													<input type="text" class="form-control" placeholder="First name" aria-label="First name" name="origin" required />
												</div>
												<div class="col">
												<label for="setting-input-1" class="form-label">Destination</label>
													<input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="destination" required />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col">
												<label for="setting-input-1" class="form-label">Departure Date</label>
													<input type="date" class="form-control" placeholder="First name" aria-label="First name" name="departure_date" required />
												</div>
												<div class="col">
												<label for="setting-input-1" class="form-label">Arrival Date</label>
													<input type="date" class="form-control" placeholder="Last name" aria-label="Last name" name="arrival_date" required />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col">
												<label for="setting-input-1" class="form-label">Number of seats - Economy</label>
													<input type="number" class="form-control" placeholder="First name" aria-label="First name" name="seats_eco" required />
												</div>
												<div class="col">
												<label for="setting-input-1" class="form-label">Number of seats - Business</label>
													<input type="number" class="form-control" placeholder="Last name" aria-label="Last name" name="seats_bus" required />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col">
												<label for="setting-input-1" class="form-label">Ticket Price (Economy)</label>
													<input type="number" class="form-control" placeholder="First name" aria-label="First name" name="price_eco" required />
												</div>
												<div class="col">
												<label for="setting-input-1" class="form-label">Ticket Price (Business)</label>
													<input type="number" class="form-control" placeholder="Last name" aria-label="Last name" name="price_bus" required>
												</div>
											</div>
											<input type="submit" value="Submit" name="Submit" class="btn app-btn-primary btn-block">
										</form>
									</div>
									<!--//app-card-body-->

								</div>
								<!--//app-card-->
							</div>
						</div>
					</div>
					<!--//container-fluid-->
				</div>
			</div>
					<!--//app-content-->
					<?php include("includes/footer.php") ?>