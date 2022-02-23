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
				<div class="position-relative mb-0">
					<div class="row g-3 justify-content-center">
						<div class="col-auto">
							<h1 class="app-page-title text-uppercase">Payment Details</h1>
						</div>
					</div>
				</div>
				<!--//app-card-body-->
				<div class="col-12 col-md-12">
					<div class="app-card app-card-settings shadow-sm p-4">
						<div class="app-card-body">
							<?php //echo $flight_no; 
							?>


							<?php
							$flight_id = $_SESSION['flight_id'];
							$journey_date = $_SESSION['journey_date'];
							$no_of_pass = $_SESSION['no_of_pass'];
							$email = $_SESSION['login_user'];
							//$total_no_of_meals = $_SESSION['total_no_of_meals'];
							$payment_id = rand(100000000, 999999999);
							//$pnr = $_SESSION['pnr'];
							$_SESSION['payment_id'] = $payment_id;
							$payment_date = date('Y-m-d');
							$_SESSION['payment_date'] = $payment_date;


							require_once('../Database Connection file/mysqli_connect.php');
							if ($_SESSION['class'] == 'economy') {
								$query = "SELECT price_economy FROM Flight_Details where id=? and departure_date=?";
								$stmt = mysqli_prepare($dbc, $query) or die(mysqli_error($dbc));
								mysqli_stmt_bind_param($stmt, "ss", $flight_id, $journey_date);
								mysqli_stmt_execute($stmt);
								mysqli_stmt_bind_result($stmt, $ticket_price);
								mysqli_stmt_fetch($stmt);
							} else if ($_SESSION['class'] == 'business') {
								$query = "SELECT price_business FROM Flight_Details where id=? and departure_date=?";
								$stmt = mysqli_prepare($dbc, $query);
								mysqli_stmt_bind_param($stmt, "ss", $flight_id, $journey_date);
								mysqli_stmt_execute($stmt);
								mysqli_stmt_bind_result($stmt, $ticket_price);
								mysqli_stmt_fetch($stmt);
							}
							mysqli_stmt_close($stmt);
							mysqli_close($dbc);
							$total_ticket_price = $no_of_pass * $ticket_price;
							//$total_meal_price = 250 * $total_no_of_meals;
							$total_discount = 0;
							$total_amount = $total_ticket_price + $total_discount;
							$_SESSION['total_amount'] = $total_amount;

							?>
							<form class="settings-form" action="payment_details_form_handler.php" method="post">
								<table class="table table-bordered">
									<tr>
										<td>Base Fare, Fuel and Transaction Charges (Fees & Taxes included):</td>
										<td>K<?php echo $total_ticket_price; ?></td>
									</tr>
									<tr>
										<td>Meal Combo Charges:</td>
										<td>K<?php //echo $total_meal_price; ?></td>
									</tr>
									<tr>
										<td>Discount:</td>
										<td>K<?php echo $total_discount; ?></td>
									</tr>
									<tr>
										<td><strong>Total:</strong></td>
										<td>K<?php echo $total_amount; ?></td>
									</tr>

								</table>
								<p style="margin-left:50px">Your Payment/Transaction ID is <strong>" <?php echo $payment_id; ?> ".</strong> Please note it down for future reference.</p>
								<table cellpadding="5" style='margin-left: 50px'>
									<tr>
										<td class="fix_table"><strong>Enter the Payment Mode:-</strong></td>
									</tr>
									<tr>
										<td class="fix_table"><i class="fa fa-credit-card" aria-hidden="true"></i> Credit Card <input type="radio" name="payment_mode" value="credit card" checked></td>
										<td class="fix_table"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Debit Card <input type="radio" name="payment_mode" value="debit card"></td>
										<td class="fix_table"><i class="fa fa-desktop" aria-hidden="true"></i> Net Banking <input type="radio" name="payment_mode" value="net banking"></td>
									</tr>
								</table>
								<input type="submit" value="Pay Now" name="Pay_Now" class="btn app-btn-primary btn-block">
							</form>

						</div>

					</div>
					<!--//app-card-->
				</div>
			</div>
		</div>
	</div>
	</div>
	<!--//container-fluid-->
	</div>
	</div>
	<!--//app-content-->
	<?php include("includes/footer.php") ?>