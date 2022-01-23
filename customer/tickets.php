<?php 

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php"); 

$customer_id = $_SESSION['login_user'];
?>

<body class="app">
	<?php include("includes/header.php"); ?>

	<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<div class="position-relative mb-3">
					<div class="row g-3 justify-content-center">
						<div class="col-auto">
							<h1 class="app-page-title mb-0 text-uppercase">Booked Tickets</h1>
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
												<th>#</th>
												<th>PNR</th>
												<th>Date of Reservation</th>
												<th>Flight No.</th>
												<th>Journey Date</th>
												<th>Class</th>
												<th>Booking Status</th>
												<th>No. of Passengers</th>
												<th>Payment ID</th>
												<th>Customer ID</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php
												$query = "SELECT * FROM Ticket_Details where customer_id='$customer_id' ORDER BY journey_date";
												$result = mysqli_query($dbc, $query);
												$count = 1;
												while ($row = mysqli_fetch_array($result)) {
													$pnr = $row['pnr'];
													$date_of_reservation = $row['date_of_reservation'];
													$flight_no = $row['flight_no'];
													$journey_date = $row['journey_date'];
													$class = $row['class'];
													$booking_status = $row['booking_status'];
													$no_of_passengers = $row['no_of_passengers'];
													$payment_id = $row['payment_id'];
													$customer_id = $row['customer_id'];

													echo "<tr>
														<td>$count</td>
														<td>$pnr</td>
														<td>$date_of_reservation</td>
														<td>$flight_no</td>
														<td>$journey_date</td>
														<td>$class</td>
														<td>$booking_status</td>
														<td>$no_of_passengers</td>
														<td>$payment_id</td>
														<td>$customer_id</td>
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