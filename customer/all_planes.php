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
							<h1 class="app-page-title mb-0 text-uppercase">All Planes</h1>
						</div>
					</div>
				</div>
                <hr class="mb-4">

                <?php
                    if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                        echo "
                        <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                            <strong style='color: green'>The Aircraft has been successfully Updated.</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    } else if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
                        echo "
                        <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                            <strong style='color: green'>Updated Failed! Invalid Plane ID.</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
				?>
				<div class="tab-content" id="orders-table-tab-content">
					<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
						<div class="app-card app-card-orders-table shadow-sm mb-5">
							<div class="app-card-body">
								<div class="table-responsive">
									<table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">#</th>
												<th class="cell">Plane ID</th>
												<th class="cell">Plane Type</th>
												<th class="cell">Total Capacity</th>
												<th class="cell">Active</th>
												<th class="cell">Action</th>
											</tr>
										</thead>
										<tbody>
										<?php
												$query = "SELECT * FROM jet_Details";
												$result = mysqli_query($dbc, $query);
												$count = 1;
												while ($row = mysqli_fetch_array($result)) {
													$jet_id = $row['jet_id'];
													$jet_type = $row['jet_type'];
													$total_capacity = $row['total_capacity'];
													$active = $row['active'];
													echo "<tr>
														<td>$count</td>
														<td>$jet_id</td>
														<td>$jet_type</td>
														<td>$total_capacity</td>
														<td>$active</td> ";
                                                        if($active == 'Yes'){
                                                            echo "
                                                                <td>					
                                                                    <a href='plane_deactivate.php?id=$jet_id' class='btn btn-danger' >Deactivate</a>
                                                                </td>";
                                                        } else {
                                                            echo "
                                                                <td>					
                                                                    <a href='plane_activate.php?id=$jet_id' class='btn btn-primary'>Activate</a>
                                                                </td>";
                                                        }
														
													$count++;} ; ?>
										</tbody>
									</table>
								</div>

							</div>
							<!--//app-card-body-->
						</div>

					</div>

				</div>
				<!--//tab-content-->
			</div>
			<!--//app-content-->
				<?php include("includes/footer.php") ?>