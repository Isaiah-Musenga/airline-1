<?php

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php");

?>

<?php
			if(isset($_POST['Submit']))
			{
				$data_missing=array();
				if(empty($_POST['flight_no']))
				{
					$data_missing[]='Flight No.';
				}
				else
				{
					$flight_no=trim($_POST['flight_no']);
				}

				if(empty($_POST['origin']))
				{
					$data_missing[]='Origin';
				}
				else
				{
					$origin=$_POST['origin'];
				}
				if(empty($_POST['destination']))
				{
					$data_missing[]='Destination';
				}
				else
				{
					$destination=$_POST['destination'];
				}

				if(empty($_POST['dep_date']))
				{
					$data_missing[]='Departure Date';
				}
				else
				{
					$dep_date=$_POST['dep_date'];
				}
				if(empty($_POST['arr_date']))
				{
					$data_missing[]='Arrival Date';
				}
				else
				{
					$arr_date=$_POST['arr_date'];
				}
				
				if(empty($_POST['dep_time']))
				{
					$data_missing[]='Departure Time';
				}
				else
				{
					$dep_time=$_POST['dep_time'];
				}
				if(empty($_POST['arr_time']))
				{
					$data_missing[]='Arrival Time';
				}
				else
				{
					$arr_time=$_POST['arr_time'];
				}

				if(empty($_POST['seats_eco']))
				{
					$data_missing[]='Seats(Economy)';
				}
				else
				{
					$seats_eco=$_POST['seats_eco'];
				}
				if(empty($_POST['seats_bus']))
				{
					$data_missing[]='Seats(Business)';
				}
				else
				{
					$seats_bus=$_POST['seats_bus'];
				}

				if(empty($_POST['price_eco']))
				{
					$data_missing[]='Price(Economy)';
				}
				else
				{
					$price_eco=$_POST['price_eco'];
				}
				if(empty($_POST['price_bus']))
				{
					$data_missing[]='Price(Business)';
				}
				else
				{
					$price_bus=$_POST['price_bus'];
				}

				if(empty($_POST['jet_id']))
				{
					$data_missing[]='Jet ID';
				}
				else
				{
					$jet_id=$_POST['jet_id'];
				}

				if(empty($data_missing))
				{
					$cnt=-1;

					$query="SELECT count(*) FROM Jet_Details WHERE jet_id=? and active='Yes'";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"s",$jet_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$cnt);
					mysqli_stmt_fetch($stmt);
					mysqli_stmt_close($stmt);

					if($cnt==1)
					{
						$query="INSERT INTO Flight_Details (flight_no,jet_id,from_city,to_city,departure_date,arrival_date,departure_time,arrival_time,seats_economy,seats_business,price_economy,price_business) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"sssssssiiiis",$flight_no,$jet_id,$origin,$destination,$dep_date,$arr_date,$dep_time,$arr_time,$seats_eco,$seats_bus,$price_eco,$price_bus);
						mysqli_stmt_execute($stmt);
						$affected_rows=mysqli_stmt_affected_rows($stmt);
						mysqli_stmt_close($stmt);
					}
					else
					{
						$affected_rows=0;
					}
					mysqli_close($dbc);
					if($affected_rows==1)
					{
						echo "Successfully Submitted";
						header("location: add_flight.php?msg=success");
					}
					else
					{
						echo "Submit Error";
						//echo mysqli_error(Error);
						header("location: add_flight.php?msg=failed");
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
												<div class="col">
												<label for="setting-input-1" class="form-label">Flight No.</label>
													<input type="text" class="form-control" placeholder="First name" aria-label="First name" name="flight_no" required/>
												</div>
												<div class="col">
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
													<input type="date" class="form-control" placeholder="First name" aria-label="First name" name="dep_date" required />
												</div>
												<div class="col">
												<label for="setting-input-1" class="form-label">Arrival Date</label>
													<input type="date" class="form-control" placeholder="Last name" aria-label="Last name" name="arr_date" required />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col">
												<label for="setting-input-1" class="form-label">Departure Time</label>
													<input type="time" class="form-control" placeholder="First name" aria-label="First name" name="dep_time" required />
												</div>
												<div class="col">
												<label for="setting-input-1" class="form-label">Arrival Time</label>
													<input type="time" class="form-control" placeholder="Last name" aria-label="Last name" name="arr_time" required />
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