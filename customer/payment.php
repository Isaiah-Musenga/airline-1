<?php

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php");

?>

<?php
$i = 1;
if (isset($_POST['Submit'])) {
	$pnr = rand(1000000, 9999999);
	$date_of_res = date("Y-m-d");
	$flight_no = $_SESSION['flight_no'];
	$journey_date = $_SESSION['journey_date'];
	$class = $_SESSION['class'];
	$booking_status = "PENDING";
	$no_of_pass = $_SESSION['no_of_pass'];
	$lounge_access = $_POST['lounge_access'];
	$priority_checkin = $_POST['priority_checkin'];
	$insurance = $_POST['insurance'];
	$total_no_of_meals = 0;
	$_SESSION['pnr'] = $pnr;

	$_SESSION['lounge_access'] = $lounge_access;
	$_SESSION['priority_checkin'] = $priority_checkin;
	$_SESSION['insurance'] = $insurance;

	$payment_id = NULL;
	$customer_id = $_SESSION['login_user'];

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
	$ff_mileage = $ticket_price / 10;

	$query = "INSERT INTO Ticket_Details (pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,lounge_access,priority_checkin,insurance,payment_id,customer_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt = mysqli_prepare($dbc, $query);
	mysqli_stmt_bind_param($stmt, "ssssssisssss", $pnr, $date_of_res, $flight_no, $journey_date, $class, $booking_status, $no_of_pass, $lounge_access, $priority_checkin, $insurance, $payment_id, $customer_id);
	mysqli_stmt_execute($stmt);
	$affected_rows = mysqli_stmt_affected_rows($stmt);
	echo $affected_rows . '<br>';
	// mysqli_stmt_bind_result($stmt,$cnt);
	// mysqli_stmt_fetch($stmt);
	// echo $cnt;
	/*
				$response=@mysqli_query($dbc,$query);
				*/
	if ($affected_rows == 1) {
		echo "Successfully Submitted<br>";
	} else {
		echo "Submit Error";
		echo mysqli_error($dbc);
	}

	for ($i = 1; $i <= $no_of_pass; $i++) {
		echo "frequent_flier_no=" . $_POST['pass_ff_id'][$i - 1] . '<br>';
		if ($_POST['pass_ff_id'][$i - 1] == '')
			$_POST['pass_ff_id'][$i - 1] = NULL;
		else {
			$query = "SELECT count(*) from Customer c, Frequent_Flier_Details f WHERE c.name=? and f.frequent_flier_no=? and c.customer_id=f.customer_id";
			$stmt = mysqli_prepare($dbc, $query);
			mysqli_stmt_bind_param($stmt, "ss", $_POST['pass_name'][$i - 1], $_POST['pass_ff_id'][$i - 1]);
			mysqli_stmt_execute($stmt);
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			mysqli_stmt_bind_result($stmt, $cnt);
			mysqli_stmt_fetch($stmt);
			echo "cnt=" . $cnt . "<br>";
			mysqli_stmt_close($stmt);

			if ($cnt == 1) {
				$query = "UPDATE Frequent_Flier_Details SET mileage=mileage+? where frequent_flier_no=?";
				$stmt = mysqli_prepare($dbc, $query);
				mysqli_stmt_bind_param($stmt, "is", $ff_mileage, $_POST['pass_ff_id'][$i - 1]);
				mysqli_stmt_execute($stmt);
				$affected_rows = mysqli_stmt_affected_rows($stmt);
				echo $affected_rows . '<br>';
				mysqli_stmt_close($stmt);
			}
		}

		$query = "INSERT INTO Passengers (passenger_id,pnr,name,age,gender,meal_choice,frequent_flier_no) VALUES (?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($dbc, $query);

		if ($_POST['pass_meal'][$i - 1] == 'yes')
			$total_no_of_meals++;
		mysqli_stmt_bind_param($stmt, "ississs", $i, $pnr, $_POST['pass_name'][$i - 1], $_POST['pass_age'][$i - 1], $_POST['pass_gender'][$i - 1], $_POST['pass_meal'][$i - 1], $_POST['pass_ff_id'][$i - 1]);
		mysqli_stmt_execute($stmt);
		$affected_rows = mysqli_stmt_affected_rows($stmt);
		echo 'Passenger added ' . $affected_rows . '<br>';
		// mysqli_stmt_bind_result($stmt,$cnt);
		// mysqli_stmt_fetch($stmt);
		// echo $cnt;
	}
	$_SESSION['total_no_of_meals'] = $total_no_of_meals;
	mysqli_stmt_close($stmt);
	mysqli_close($dbc);

	header("location: payment.php");
} else {
	echo "Submit request not received";
}
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

				<div class="container">
					<form action="payment_details_form_handler.php" method="post">
						<h2>ENTER THE PAYMENT DETAILS</h2>
						<h3 style="margin-left: 30px"><u>Payment Summary</u></h3>

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
						<input type="submit" value="Pay Now" name="Pay_Now">
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