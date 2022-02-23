<?php
	session_start();
?>
<html>
	<head>
		<title>Add Ticket Details</title>
	</head>
	<body>
		<?php
			$i=1;
			if(isset($_POST['Submit']))
			{

				$pnr=rand(1000000,9999999);
				$_SESSION['pnr'] = $pnr;
				$date_of_res=date("Y-m-d");
				$flight_id=$_SESSION['flight_id'];
				$journey_date=$_SESSION['journey_date'];
				$class=$_SESSION['class'];
				$booking_status="CONFIRMED";
				$no_of_pass=$_SESSION['no_of_pass'];
				$total_no_of_meals=0;
				$email=$_SESSION['login_user'];

				require_once('../Database Connection file/mysqli_connect.php');

				$query="INSERT INTO Ticket_Details (pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,customer_email) VALUES ('$pnr','$date_of_res','$flight_id','$journey_date','$class','$booking_status','$no_of_pass','$email')";
				$stmt=mysqli_query($dbc,$query);
				
				if($stmt)
				{
					echo "Successfully Submitted <br>";
					header("location: payment.php");
				}
				else
				{
					echo "Submitted Error";
					echo mysqli_error($dbc);
				}
			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>