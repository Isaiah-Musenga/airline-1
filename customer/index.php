<?php 

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php"); 

?>

<body class="app">
	<?php include("includes/header.php"); ?>
	<div class="app-wrapper">
		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<h1 class="app-page-title text-center">Dashboard</h1>
				<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
					<div class="inner">
						<div class="app-card-body p-3 p-lg-4">
							<h3 class="mb-3 text-center">Welcome, <?php echo $_SESSION['login_user']; ?>!</h3>
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
					<div class="col-6">
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<div class="mb-4">
									<span class="nav-icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="4em" height="4em" fill="#15a362" class="bi bi-bank" viewBox="0 0 16 16">
											<path d="M8 .95 14.61 4h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.379l.5 2A.5.5 0 0 1 15.5 17H.5a.5.5 0 0 1-.485-.621l.5-2A.5.5 0 0 1 1 14V7H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 4h.89L8 .95zM3.776 4h8.447L8 2.05 3.776 4zM2 7v7h1V7H2zm2 0v7h2.5V7H4zm3.5 0v7h1V7h-1zm2 0v7H12V7H9.5zM13 7v7h1V7h-1zm2-1V5H1v1h14zm-.39 9H1.39l-.25 1h13.72l-.25-1z"/>
										</svg>
									</span>
								</div>
								<h4 class="stats-type mb-1">Book A Flight</h4>
							</div>
							<a class="app-card-link-mask" href="book_flight.php"></a>
						</div>
					</div>
					<!--//col-->
					<div class="col-6">
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<div class="mb-4">
									<span class="nav-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="4em" height="4em" fill="#15a362" class="bi bi-file-earmark-check" viewBox="0 0 16 16">
  <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
</svg>
									</span>
								</div>
								<h4 class="stats-type mb-1">View Booked Tickets</h4>
							</div>
							<a class="app-card-link-mask" href="booked_tickets.php"></a>
						</div>
					</div>
				</div>
				<!--//row-->
				<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
					<div class="inner">
						<div class="app-card-body p-3 p-lg-4">
							<h3 class="mb-3 text-center">Ticket Management Made Easy</h3>
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
