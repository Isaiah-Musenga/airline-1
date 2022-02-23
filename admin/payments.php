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
							<h1 class="app-page-title mb-0 text-uppercase">Tickets Payments</h1>
						</div>
					</div>
				</div>
                <?php
                    if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                        echo "
                        <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                            <strong style='color: green'>The Flight Ticket has been Canceled.</strong>
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
                                                <th class="cell">Payment Id</th>
                                                <th class="cell">PNR</th>
                                                <th class="cell">Date</th>
                                                <th class="cell">Amount</th>
                                                <th class="cell">Payment Mode</th>
                                                <th class="cell">Action</th>
											</tr>
										</thead>
										<tbody>
                                        <?php

                                            $query = "SELECT * FROM payment_details";
                                            $result = mysqli_query($dbc, $query) or die( mysqli_error($dbc));
                                            $count = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $payment_id = $row['payment_id'];
                                                $pnr = $row['pnr'];
                                                $payment_date = $row['payment_date'];
                                                $payment_amount = $row['payment_amount'];
                                                $payment_mode = $row['payment_mode'];

                                                echo "<tr>
                                                    <td>$count</td>
                                                    <td>$payment_id</td>
                                                    <td>$pnr</td>
                                                    <td>$payment_date</td>
                                                    <td>$payment_amount</td>
                                                    <td>$payment_mode</td>
                                                    <td>					
                                                        <a href='cancel_flight.php?payment_id=$payment_id' class='btn btn-primary'>Action</a>
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