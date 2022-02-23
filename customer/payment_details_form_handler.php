<?php
	session_start();
	require_once('../Database Connection file/mysqli_connect.php');
?>
<html>
	<head>
		<title>Submit Payment Details</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Pay_Now']))
			{
				$no_of_pass=$_SESSION['no_of_pass'];
				$flight_id=$_SESSION['flight_id'];
				$journey_date=$_SESSION['journey_date'];
				$class=$_SESSION['class'];
				$pnr=$_SESSION['pnr'];
				$payment_id=$_SESSION['payment_id'];
				$total_amount=$_SESSION['total_amount'];
				$payment_date=$_SESSION['payment_date'];
				$payment_mode=$_POST['payment_mode'];			
	
				echo $payment_date ."<br>";
				echo $payment_id."<br>";
				echo $payment_mode."<br>";
				echo $no_of_pass."<br>";
				echo $pnr."<br>";

				$query="INSERT INTO payment_details (payment_id,pnr,payment_date,payment_amount,payment_mode) VALUES ('$payment_id','$pnr','$payment_date','$total_amount','$payment_mode')";
					
				if (mysqli_query($dbc, $query)) {
					echo "New record created successfully";
					header('location:booked_tickets.php?msg=success');

				  } else {
					echo "Error: " . $query . "<br>" . mysqli_error($dbc);
				  }
			}
		?>
	</body>
</html>