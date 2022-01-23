<?php 

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php"); 

?>

<body class="app">
	<?php include("includes/header.php"); ?>
	<div class="app-wrapper">
		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<h1 class="app-page-title">Dashboard</h1>
				<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
					<div class="inner">
						<div class="app-card-body p-3 p-lg-4">
							<h3 class="mb-3 text-center">Welcome, Admin!</h3>
							<div class="row gx-5 gy-3">
								<div class="col-12 col-lg-12">
									<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit sit saepe mollitia esse assumenda pariatur sequi ratione similique rerum facere? Quasi velit eum debitis dolorum accusamus, aliquam ipsa aperiam corrupti?
									</div>
								</div>
								<!--//col-->
							</div>
							<!--//row-->
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						<!--//app-card-body-->

					</div>
					<!--//inner-->
				</div>
				<!--//app-card-->

				<div class="row g-4 mb-4">
					<div class="col-6 col-lg-3">
					<?php

						$query = "SELECT * FROM flight_Details";
						$result = mysqli_query($dbc, $query);
						$flights = mysqli_num_rows($result);

					?>
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Flights</h4>
								<div class="stats-figure"><?php echo $flights; ?></div>
								<div class="stats-meta">
									Booked</div>
							</div>
							<a class="app-card-link-mask" href="#"></a>
						</div>
					</div>
					<!--//col-->

					<div class="col-6 col-lg-3">
						<?php

							$query = "SELECT * FROM ticket_Details";
							$result = mysqli_query($dbc, $query);
							$tickets = mysqli_num_rows($result);

						?>
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Tickets</h4>
								<div class="stats-figure"><?php echo $tickets; ?></div>
								<div class="stats-meta">
									Reserved</div>
							</div>
							<!--//app-card-body-->
							<a class="app-card-link-mask" href="#"></a>
						</div>
						<!--//app-card-->
					</div>
					<!--//col-->
					<div class="col-6 col-lg-3">
						<?php

							$query = "SELECT * FROM jet_Details";
							$result = mysqli_query($dbc, $query);
							$planes = mysqli_num_rows($result);

						?>
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Planes</h4>
								<div class="stats-figure"><?php echo $planes; ?></div>
								<div class="stats-meta">
									Available</div>
							</div>
							<!--//app-card-body-->
							<a class="app-card-link-mask" href="#"></a>
						</div>
						<!--//app-card-->
					</div>
					<!--//col-->
					<div class="col-6 col-lg-3">
						<?php

						$query = "SELECT * FROM Flight_Details";
						$result = mysqli_query($dbc, $query);
						$users = mysqli_num_rows($result);

						?>
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Users</h4>
								<div class="stats-figure"><?php echo $users; ?></div>
								<div class="stats-meta">Registered</div>
							</div>
							<!--//app-card-body-->
							<a class="app-card-link-mask" href="#"></a>
						</div>
						<!--//app-card-->
					</div>
					<!--//col-->
				</div>
				<!--//row-->
				<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
					<div class="inner">
						<div class="app-card-body p-3 p-lg-4">
							<h3 class="mb-3 text-center">Lets Confuse the customers!!!</h3>
							<div class="row gx-5 gy-3">
								<div class="col-12 col-lg-12">
									<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit sit saepe mollitia esse assumenda pariatur sequi ratione similique rerum facere? 
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--//inner-->
				</div>
			</div>
			<!--//container-fluid-->
		</div>
		<!--//app-content-->

		<?php include("includes/footer.php") ?>
