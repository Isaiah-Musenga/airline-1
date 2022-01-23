<?php

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php");

?>


<body class="app">
	<?php include("includes/header.php"); ?>

	<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<div class="position-relative mb-0">
					<div class="row g-3 justify-content-center">
						<div class="col-auto">
							<h1 class="app-page-title text-uppercase">Available Flights</h1>
						</div>
					</div>
				</div>

				<?php
				if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
					echo "<strong class='text-center' style='color: green'>The Flight Schedule has been successfully added.</strong>
						<br>
						<br>";
				} else if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
					echo "<strong class='text-center' style='color: red'>*Invalid Flight Schedule Details, please enter again.</strong>
						<br>
						<br>";
				}
				?>

				<div class="app-content pt-3 p-md-3 p-lg-4">
					<div class="container-xl">
						<div class="row g-4 settings-section">
							<div class="col-12 col-md-12">
								<div class="app-card app-card-settings shadow-sm p-4">
									<div class="app-card-body">
                                    <?php
			if(isset($_POST['Search']))
			{
				$data_missing=array();
				if(empty($_POST['origin']))
				{
					$data_missing[]='Origin';
				}
				else
				{
					$origin=$_POST['origin'];
				}
				if(empty($_POST['destination']))
				{
					$data_missing[]='Destination';
				}
				else
				{
					$destination=$_POST['destination'];
				}

				if(empty($_POST['dep_date']))
				{
					$data_missing[]='Departure Date';
				}
				else
				{
					$dep_date=trim($_POST['dep_date']);
				}
				if(empty($_POST['no_of_pass']))
				{
					$data_missing[]='No. of Passengers';
				}
				else
				{
					$no_of_pass=trim($_POST['no_of_pass']);
				}

				if(empty($_POST['class']))
				{
					$data_missing[]='Class';
				}
				else
				{
					$class=trim($_POST['class']);
				}

				if(empty($data_missing))
				{
					$_SESSION['no_of_pass']=$no_of_pass;
					$_SESSION['class']=$class;
					$count=1;
					$_SESSION['count']=$count;
					$_SESSION['journey_date']=$dep_date;

					if($class=="economy")
					{
						$query="SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_economy FROM Flight_Details where from_city=? and to_city=? and departure_date=? and seats_economy>=? ORDER BY  departure_time";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"sssi",$origin,$destination,$dep_date,$no_of_pass);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$flight_no,$from_city,$to_city,$departure_date,$departure_time,$arrival_date,$arrival_time,$price_economy);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt)==0)
						{
							echo "<h4 class='text-center'>No flights are available !</h4>";
						}
						else
						{
							echo "<form action=\"ticket_details.php\" method=\"post\">";
							echo "<table class='table-responsive table' ";
							echo "<tr>
							<th class='cell'>Flight No.</th>
							<th class='cell'>Origin</th>
							<th class='cell'>Destination</th>
							<th class='cell'>Departure Date</th>
							<th class='cell'>Arrival Date</th>
							<th class='cell'>Price(Economy)</th>
							<th class='cell'>Select</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
        						echo "<tr>
        						<td>".$flight_no."</td>
        						<td>".$from_city."</td>
								<td>".$to_city."</td>
								<td>".$departure_date."</td>
								<td>".$arrival_date."</td>
								<td>K ".$price_economy."</td>
								<td><input type=\"radio\" name=\"select_flight\" value=\"".$flight_no."\"></td>
        						</tr>";
    						}
    						echo "</table> <br>";
    						echo "<input type='submit' value='Select Flight' name='select' class='btn btn-primary'>";
    						echo "</form>";
    					}
					}
					else if($class="business")
					{
						$query="SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_business FROM Flight_Details where from_city=? and to_city=? and departure_date=? and seats_business>=? ORDER BY  departure_time";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"sssi",$origin,$destination,$dep_date,$no_of_pass);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$flight_no,$from_city,$to_city,$departure_date,$departure_time,$arrival_date,$arrival_time,$price_business);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt)==0)
						{
							echo "<h3>No flights are available !</h3>";
						}
						else
						{
							echo "<form action=\"book_tickets2.php\" method=\"post\">";
							echo "<table cellpadding=\"10\"";
							echo "<tr><th>Flight No.</th>
							<th>Origin</th>
							<th>Destination</th>
							<th>Departure Date</th>
							<th>Arrival Date</th>
							<th>Price(Business)</th>
							<th>Select</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
        						echo "<tr>
        						<td>".$flight_no."</td>
        						<td>".$from_city."</td>
								<td>".$to_city."</td>
								<td>".$departure_date."</td>
								<td>".$arrival_date."</td>
								<td>K ".$price_business."</td>
								<td><input type=\"radio\" name=\"select_flight\" value=".$flight_no."></td>
        						</tr>";
    						}
    						echo "</table> <br>";
							echo "<input type='submit' value='Select Flight' name='select' class='btn btn-primary'>";
    						echo "</form>";
    					}
					}	
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					// else
					// {
					// 	echo "Submit Error";
					// 	echo mysqli_error();
					// }
				}
				else
				{
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
				}
			}
			else
			{
				echo "Search request not received";
			}
		?>
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