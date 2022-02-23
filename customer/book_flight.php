<?php

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php");

?>


<body class="app">
	<?php include("includes/header.php"); ?>

	<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<div class="position-relative mb-0">
					<div class="row g-3 justify-content-center">
						<div class="col-auto">
							<h1 class="app-page-title text-uppercase">SEARCH FOR AVAILABLE FLIGHTS</h1>
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
                                    <form class="settings-form" action="view_flights.php" method="post">
										<div class="container">
											<div class="row g-5">
												<div class="col">
													<!-- Name input -->
													<div class="form-outline">
														<label class="form-label" for="form9Example3">Departure Airport</label>
														<input list="origins" name="origin" placeholder="From" class="form-control" required>
														<datalist id="origins">
															<option value="bangalore">
														</datalist>
													</div>
												</div>
												<div class="col">
													<!-- Email input -->
													<div class="form-outline">
														<label class="form-label" for="form9Example4">Destination Airport</label>
														<input list="destinations" name="destination" placeholder="To" class="form-control" required>
														<datalist id="destinations">
															<option value="mumbai">
															<option value="mysore">
															<option value="mangalore">
															<option value="chennai">
															<option value="hyderabad">
														</datalist>
													</div>
												</div>
											</div>
											<div class="row g-5 mt-0 mb-0">
												<div class="col">
													<!--  input -->
													<div class="form-outline">
														<label class="form-label" for="form9Example3">Date of Departure</label>
														<input type="date" class="form-control" name="dep_date" min=<?php
																$todays_date = date('Y-m-d');
																echo $todays_date;
																?> max=<?php
																		$max_date = date_create(date('Y-m-d'));
																		date_add($max_date, date_interval_create_from_date_string("90 days"));
																		echo date_format($max_date, "Y-m-d");
																		?> required>
													</div>
												</div>
												<div class="col">
													<!--  input -->
													<div class="form-outline">
														<label class="form-label" for="form9Example4">Number of Passengers</label>
														<input type="number" name="no_of_pass" placeholder="Number of passengers" class="form-control" required>
													</div>
												</div>
											</div>
											<div class="row g-5 mt-0 mb-0">
												<div class="col">
													<div class="form-outline">
														<label class="form-label" for="form9Example3">Choose Class</label>
														<select name="class" class="form-control">
															<option value="economy">Economy Class</option>
															<option value="business">Business Class</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row g-5">
												<div class="col">
													<input type="submit" value="Search Flights" name="Search" class="form-control ms-0 btn btn-success mt-3">
												</div>
											</div>
											</div>
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