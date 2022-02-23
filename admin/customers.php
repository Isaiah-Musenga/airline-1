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
							<h1 class="app-page-title mb-0 text-uppercase">Passangers</h1>
						</div>
					</div>
				</div>

				<div class="tab-content" id="orders-table-tab-content">
					<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
						<div class="app-card app-card-orders-table shadow-sm mb-5">
							<div class="app-card-body">
								<div class="table-responsive">
									<table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
                                                <th class="cell">#</th>
                                                <th class="cell">Id</th>
                                                <th class="cell">Full Name</th>
                                                <th class="cell">Phone Number</th>
                                                <th class="cell">Home Address</th>
                                                <th class="cell">Email Address</th>
											</tr>
										</thead>
										<tbody>
                                        <?php

                                            $query = "SELECT * FROM customer";
                                            $result = mysqli_query($dbc, $query);
                                            $count = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $id = $row['id'];
                                                $name = $row['name'];
                                                $phone = $row['phone'];
                                                $address = $row['address'];
                                                $email = $row['email'];

                                                echo "<tr>
                                                    <td>$count</td>
                                                    <td>$id</td>
                                                    <td>$name</td>
                                                    <td>0$phone</td>
                                                    <td>$address</td>
                                                    <td>$email</td>
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
						<!--//app-card-->
						<nav class="app-pagination">
							<ul class="pagination justify-content-center">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
								</li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</nav>
						<!--//app-pagination-->

					</div>
				</div>
				<!--//tab-content-->
			</div>

				<?php include("includes/footer.php") ?>