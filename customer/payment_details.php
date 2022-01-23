<?php include("includes/head.php"); ?>
	<body class="app">
	<?php include("includes/header.php"); ?>

	<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<div class="position-relative mb-0">
					<div class="row g-3 justify-content-center">
						<div class="col-auto">
							<h1 class="app-page-title text-uppercase">Ticket Summary</h1>
						</div>
					</div>
				</div>

				<div class="container justify-content-center">
					<form action="payment_details_form_handler.php" method="post">
						<?php
						$flight_no = $_SESSION['flight_no'];
						$journey_date = $_SESSION['journey_date'];
						$no_of_pass = $_SESSION['no_of_pass'];
						$total_no_of_meals = $_SESSION['total_no_of_meals'];
						$payment_id = rand(100000000, 999999999);
						$pnr = $_SESSION['pnr'];
						$_SESSION['payment_id'] = $payment_id;
						$payment_date = date('Y-m-d');
						$_SESSION['payment_date'] = $payment_date;


						require_once('../Database Connection file/mysqli_connect.php');
						if ($_SESSION['class'] == 'economy') {
							$query = "SELECT price_economy FROM Flight_Details where flight_no=? and departure_date=?";
							$stmt = mysqli_prepare($dbc, $query);
							mysqli_stmt_bind_param($stmt, "ss", $flight_no, $journey_date);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_bind_result($stmt, $ticket_price);
							mysqli_stmt_fetch($stmt);
						} else if ($_SESSION['class'] == 'business') {
							$query = "SELECT price_business FROM Flight_Details where flight_no=? and departure_date=?";
							$stmt = mysqli_prepare($dbc, $query);
							mysqli_stmt_bind_param($stmt, "ss", $flight_no, $journey_date);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_bind_result($stmt, $ticket_price);
							mysqli_stmt_fetch($stmt);
						}
						mysqli_stmt_close($stmt);
						mysqli_close($dbc);
						$total_ticket_price = $no_of_pass * $ticket_price;
						$total_meal_price = 250 * $total_no_of_meals;
						if ($_SESSION['insurance'] == 'yes') {
							$total_insurance_fee = 100 * $no_of_pass;
						} else {
							$total_insurance_fee = 0;
						}
						if ($_SESSION['priority_checkin'] == 'yes') {
							$total_priority_checkin_fee = 200 * $no_of_pass;
						} else {
							$total_priority_checkin_fee = 0;
						}
						if ($_SESSION['lounge_access'] == 'yes') {
							$total_lounge_access_fee = 300 * $no_of_pass;
						} else {
							$total_lounge_access_fee = 0;
						}
						$total_discount = 0;
						$total_amount = $total_ticket_price + $total_meal_price + $total_insurance_fee + $total_priority_checkin_fee + $total_lounge_access_fee + $total_discount;
						$_SESSION['total_amount'] = $total_amount;

						echo "<table cellpadding=\"5\"	style='margin-left: 50px'>";
						echo "<tr>";
						echo "<td class=\"fix_table\">Base Fare, Fuel and Transaction Charges (Fees & Taxes included):</td>";
						echo "<td class=\"fix_table\">K " . $total_ticket_price . "</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td class=\"fix_table\">Meal Combo Charges:</td>";
						echo "<td class=\"fix_table\">K " . $total_meal_price . "</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td class=\"fix_table\">Priority Checkin Fees:</td>";
						echo "<td class=\"fix_table\">K " . $total_priority_checkin_fee . "</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td class=\"fix_table\">Lounge Access Fees:</td>";
						echo "<td class=\"fix_table\">K " . $total_lounge_access_fee . "</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td class=\"fix_table\">Insurance Fees:</td>";
						echo "<td class=\"fix_table\">K " . $total_insurance_fee . "</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td class=\"fix_table\">Discount:</td>";
						echo "<td class=\"fix_table\">K " . $total_discount . "</td>";
						echo "</tr>";

						echo "</table>";

						echo "<hr style='margin-right:900px; margin-left: 50px'>";
						echo "<table cellpadding=\"5\" style='margin-left: 50px'>";
						echo "<tr>";
						echo "<td class=\"fix_table\"><strong>Total:</strong></td>";
						echo "<td class=\"fix_table\">K " . $total_amount . "</td>";
						echo "</tr>";
						echo "</table>";
						echo "<hr style='margin-right:900px; margin-left: 50px'>";
						echo "<br>";
						echo "<p style=\"margin-left:50px\">Your Payment/Transaction ID is <strong>" . $payment_id . ".</strong> Please note it down for future reference.</p>";
						echo "<br>";
						?>
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
						<br>
						<input type="submit" value="Pay Now" name="Pay_Now" class="btn btn-primary">
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