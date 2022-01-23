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
							<h1 class="app-page-title mb-0 text-uppercase">All Booked Tickets</h1>
						</div>
					</div>
				</div>

				<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Confirmed</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Cancelled</a>
				</nav>


				<div class="tab-content" id="orders-table-tab-content">
					<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
						<div class="app-card app-card-orders-table shadow-sm mb-5">
							<div class="app-card-body">
								<div class="table-responsive">
									<table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
                                                <th class="cell">#</th>
                                                <th class="cell">PNR No.</th>
                                                <th class="cell">Date</th>
                                                <th class="cell">Flight No,</th>
                                                <th class="cell">Travel Date</th>
                                                <th class="cell">Class</th>
                                                <th class="cell">Passengers</th>
                                                <th class="cell">Payment Id</th>
                                                <th class="cell">Customer Id</th>
                                                <th class="cell">Status</th>
                                                <th class="cell">Actions</th>
											</tr>
										</thead>
										<tbody>
                                        <?php

                                            $query = "SELECT * FROM ticket_details";
                                            $result = mysqli_query($dbc, $query);
                                            $count = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $pnr = $row['pnr'];
                                                $date_of_reservation = $row['date_of_reservation'];
                                                $flight_no = $row['flight_no'];
                                                $journey_date = $row['journey_date'];
                                                $class = $row['class'];
                                                $no_of_passengers = $row['no_of_passengers'];
                                                $payment_id = $row['payment_id'];
                                                $customer_id = $row['customer_id'];
                                                $booking_status = $row['booking_status'];

                                                echo "<tr>
                                                    <td>$count</td>
                                                    <td>$pnr</td>
                                                    <td>$date_of_reservation</td>
                                                    <td>$flight_no</td>
                                                    <td>$journey_date</td>
                                                    <td>$class</td>
                                                    <td class='text-center'>$no_of_passengers</td>
                                                    <td>$payment_id</td>
                                                    <td>$customer_id</td>
                                                    <td>$booking_status</td>
                                                    <td>					
                                                        <a href='#' class='btn btn-primary'>Action</a>
                                                    </td>
                                                </tr>";
                                                $count++;
                                            }

                                            ?>
										</tbody>
									</table>
								</div>

							</div>
							<!--//app-card-body-->
						</div>
						<!--//app-card-->
						<nav class="app-pagination">
							<ul class="pagination justify-content-center">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
								</li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</nav>
						<!--//app-pagination-->

					</div>
					<!--//tab-pane-->

					<div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
						<div class="app-card app-card-orders-table mb-5">
							<div class="app-card-body">
								<div class="table-responsive">
									<table class="table mb-0 text-left">
										<thead>
                                            <tr>
                                                <th class="cell">#</th>
                                                <th class="cell">PNR No.</th>
                                                <th class="cell">Date</th>
                                                <th class="cell">Flight No,</th>
                                                <th class="cell">Travel Date</th>
                                                <th class="cell">Class</th>
                                                <th class="cell">Passengers</th>
                                                <th class="cell">Payment Id</th>
                                                <th class="cell">Customer Id</th>
                                                <th class="cell">Status</th>
											</tr>
										</thead>
										<tbody>
                                        <?php

                                            $query = "SELECT * FROM ticket_details WHERE booking_status = 'CONFIRMED'";
                                            $result = mysqli_query($dbc, $query);
                                            $count = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $pnr = $row['pnr'];
                                                $date_of_reservation = $row['date_of_reservation'];
                                                $flight_no = $row['flight_no'];
                                                $journey_date = $row['journey_date'];
                                                $class = $row['class'];
                                                $no_of_passengers = $row['no_of_passengers'];
                                                $payment_id = $row['payment_id'];
                                                $customer_id = $row['customer_id'];
                                                $booking_status = $row['booking_status'];

                                                echo "<tr>
                                                    <td>$count</td>
                                                    <td>$pnr</td>
                                                    <td>$date_of_reservation</td>
                                                    <td>$flight_no</td>
                                                    <td>$journey_date</td>
                                                    <td>$class</td>
                                                    <td class='text-center'>$no_of_passengers</td>
                                                    <td>$payment_id</td>
                                                    <td>$customer_id</td>
                                                    <td>$booking_status</td>
                                                </tr>";
                                                $count++;
                                            }

                                            ?>
										</tbody>
									</table>
								</div>
								<!--//table-responsive-->
							</div>
							<!--//app-card-body-->
						</div>
						<!--//app-card-->
					</div>
					<!--//tab-pane-->
					<div class="tab-pane fade" id="orders-cancelled" role="tabpanel" aria-labelledby="orders-cancelled-tab">
						<div class="app-card app-card-orders-table mb-5">
							<div class="app-card-body">
								<div class="table-responsive">
									<table class="table mb-0 text-left">
										<thead>
											<tr>
                                                <th class="cell">#</th>
                                                <th class="cell">PNR No.</th>
                                                <th class="cell">Date</th>
                                                <th class="cell">Flight No,</th>
                                                <th class="cell">Travel Date</th>
                                                <th class="cell">Class</th>
                                                <th class="cell">Passengers</th>
                                                <th class="cell">Payment Id</th>
                                                <th class="cell">Customer Id</th>
                                                <th class="cell">Status</th>
											</tr>
										</thead>
										<tbody>
                                        <?php

                                            $query = "SELECT * FROM ticket_details WHERE booking_status = 'CANCELED'";
                                            $result = mysqli_query($dbc, $query);
                                            $count = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $pnr = $row['pnr'];
                                                $date_of_reservation = $row['date_of_reservation'];
                                                $flight_no = $row['flight_no'];
                                                $journey_date = $row['journey_date'];
                                                $class = $row['class'];
                                                $no_of_passengers = $row['no_of_passengers'];
                                                $payment_id = $row['payment_id'];
                                                $customer_id = $row['customer_id'];
                                                $booking_status = $row['booking_status'];

                                                echo "<tr>
                                                    <td>$count</td>
                                                    <td>$pnr</td>
                                                    <td>$date_of_reservation</td>
                                                    <td>$flight_no</td>
                                                    <td>$journey_date</td>
                                                    <td>$class</td>
                                                    <td class='text-center'>$no_of_passengers</td>
                                                    <td>$payment_id</td>
                                                    <td>$customer_id</td>
                                                    <td>$booking_status</td>
                                                </tr>";
                                                $count++;
                                            }

                                            ?>

										</tbody>
									</table>
								</div>
								<!--//table-responsive-->
							</div>
							<!--//app-card-body-->
						</div>
						<!--//app-card-->
					</div>
					<!--//tab-pane-->
				</div>
				<!--//tab-content-->
			</div>

				<?php include("includes/footer.php") ?>