<?php
	session_start();
	require_once('../Database Connection file/mysqli_connect.php');
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
				$date_of_res=date("Y-m-d");
				$flight_no=$_SESSION['flight_no'];
				$journey_date=$_SESSION['journey_date'];
				$class=$_SESSION['class'];
				$booking_status="PENDING";
				$no_of_pass=$_SESSION['no_of_pass'];
				$lounge_access=$_POST['lounge_access'];
				$priority_checkin=$_POST['priority_checkin'];
				$insurance=$_POST['insurance'];
				$total_no_of_meals=0;
				$_SESSION['pnr']=$pnr;

				$_SESSION['lounge_access']=$lounge_access;
				$_SESSION['priority_checkin']=$priority_checkin;
				$_SESSION['insurance']=$insurance;

				$payment_id=NULL;
				$customer_id=$_SESSION['login_user'];

				

				if($_SESSION['class']=='economy')
				{	
					$query="SELECT price_economy FROM Flight_Details where flight_no=? and departure_date=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ss",$flight_no,$journey_date);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$ticket_price);
					mysqli_stmt_fetch($stmt);
				}
				else if($_SESSION['class']=='business')
				{
					$query="SELECT price_business FROM Flight_Details where flight_no=? and departure_date=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ss",$flight_no,$journey_date);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$ticket_price);
					mysqli_stmt_fetch($stmt);
				}
				mysqli_stmt_close($stmt);
				$ff_mileage=$ticket_price/10;

				$query="INSERT INTO Ticket_Details (pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,lounge_access,priority_checkin,insurance,payment_id,customer_id) VALUES ($pnr,$date_of_res,$flight_no,$journey_date,$class,$booking_status,$no_of_pass,$lounge_access,$priority_checkin,$insurance,$payment_id,$customer_id)";

				$stmt=mysqli_query($dbc,$query);

				if($stmt)
				{
					echo "Successfully Submitted<br>";
				}
				else
				{
					echo "Submit Error";
					echo mysqli_error($dbc);
				}
				
				$_SESSION['total_no_of_meals']=$total_no_of_meals;
				mysqli_close($dbc);

				header("location: payment_details.php");

// 						else
// 						{
// 							echo "Submit Error";
// 							echo mysqli_error();
// 						}
// 					}
// 					else
// 					{
// 						echo "The following data fields were empty! <br>";
// 						foreach($data_missing as $missing)
// 						{
// 							echo $missing ."<br>";
// 						}
// 					}
// 				}
			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>