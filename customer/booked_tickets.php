<?php 

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php"); 

$email = $_SESSION['login_user'];
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
                <?php
                    if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                        echo "
                        <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                            <strong style='color: green'>The Flight Ticket has been Booked Successfully.</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    } else if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
                        echo "
                        <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                            <strong style='color: green'>Failed To Book Flight!</strong>
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
                                                <th class="cell">PNR</th>
                                                <th class="cell">Date</th>
                                                <th class="cell">Flight No,</th>
                                                <th class="cell">Travel Date</th>
                                                <th class="cell">Class</th>
                                                <th class="cell">Passengers</th>
                                                <th class="cell">Status</th>
                                                <th class="cell">Actions</th>
											</tr>
										</thead>
										<tbody>
                                        <?php

                                            $query = "SELECT * FROM ticket_details WHERE customer_email='$email' AND booking_status='CONFIRMED'";
                                            $result = mysqli_query($dbc, $query) or die( mysqli_error($dbc));
                                            $count = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $id = $row['id'];
                                                $pnr = $row['pnr'];
                                                $date_of_reservation = $row['date_of_reservation'];
                                                $flight_no = $row['flight_no'];
                                                $journey_date = $row['journey_date'];
                                                $class = $row['class'];
                                                $no_of_passengers = $row['no_of_passengers'];
                                                //$payment_id = $row['payment_id'];
                                                $booking_status = $row['booking_status'];

                                                echo "<tr>
                                                    <td>$count</td>
                                                    <td>$pnr</td>
                                                    <td>$date_of_reservation</td>
                                                    <td>$flight_no</td>
                                                    <td>$journey_date</td>
                                                    <td>$class</td>
                                                    <td class='text-center'>$no_of_passengers</td>
                                                    <td>$booking_status</td>
                                                    <td>					
                                                        <a href='cancel_flight.php?id=$id' class='btn btn-danger'>Cancel</a>
                                                        <a href='print.php?pnr=$pnr' class='btn btn-primary'>Print</a>
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

						<!--//app-pagination-->

					</div>
				</div>
				<!--//tab-content-->
			</div>

				<?php include("includes/footer.php") ?>