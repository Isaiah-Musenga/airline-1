<?php 

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php"); 

?>

<body class="app">
	<?php include("includes/header.php"); ?>

	<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<div class="position-relative mb-3">
					<div class="row g-3 justify-content-center">
						<div class="col-auto">
							<h1 class="app-page-title mb-0 text-uppercase">All Flights</h1>
						</div>
					</div>
				</div>
				<hr class="mb-4">

				<?php
                    if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                        echo "
                        <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                            <strong style='color: green'>The Flight has been successfully Deleted.</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    } else if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
                        echo "
                        <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                            <strong style='color: green'>Failed To Delete Flight!</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
				?>
				<div class="tab-content" id="orders-table-tab-content">
					<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
						<div class="app-card app-card-orders-table shadow-sm mb-5">
							<div class="app-card-body">
								<div class="table-responsive">
									<table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">#</th>
												<th class="cell">Flight No.</th>
												<th class="cell">Jet ID</th>
												<th class="cell">From Destination</th>
												<th class="cell">To Destination</th>
												<th class="cell">Start Date</th>
												<th class="cell">Arrive Date</th>
												<th class="cell">Start Time</th>
												<th class="cell">Arrive Tine</th>
												<th class="cell">Seat Economy</th>
												<th class="cell">Seat Business</th>
												<th class="cell">Price Economy</th>
												<th class="cell">Price Business</th>
												<th class="cell">Actions</th>
											</tr>
										</thead>
										<tbody>
										<?php
												$query = "SELECT * FROM Flight_Details";
												$result = mysqli_query($dbc, $query);
												$count = 1;
												while ($row = mysqli_fetch_array($result)) {
													$flight_no = $row['flight_no'];
													$jet_id = $row['jet_id'];
													$from_city = $row['from_city'];
													$to_city = $row['to_city'];
													$departure_date = $row['departure_date'];
													$arrival_date = $row['arrival_date'];
													$departure_time = $row['departure_time'];
													$arrival_time = $row['arrival_time'];
													$seats_economy = $row['seats_economy'];
													$seats_business = $row['seats_business'];
													$price_economy = $row['price_economy'];
													$price_business = $row['price_business'];

													echo "<tr>
														<td>$count</td>
														<td>$flight_no</td>
														<td>$jet_id</td>
														<td>$from_city</td>
														<td>$to_city</td>
														<td>$departure_date</td>
														<td>$arrival_date</td>
														<td>$departure_time</td>
														<td>$arrival_time</td>
														<td>$seats_economy</td>
														<td>$seats_business</td>
														<td>$price_economy</td>
														<td>$price_business</td>
														<td>					
															<a href='delete_flight.php?id=$flight_no' class='btn btn-danger'>Delete</a>
														</td>
													</tr>";
													$count++;} ; ?>
										</tbody>
									</table>
								</div>

							</div>
							<!--//app-card-body-->
						</div>

					</div>

				</div>
				<!--//tab-content-->
			</div>
			<!--//app-content-->
				<?php include("includes/footer.php") ?>