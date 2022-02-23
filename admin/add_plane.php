<?php

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php");

?>

<?php
			if(isset($_POST['Submit']))
			{
					$jet_type=$_POST['jet_type'];
					$total_capacity=$_POST['total_capacity'];
					$active = 'Yes';

					$query="INSERT INTO Jet_Details (jet_type,total_capacity,active) VALUES ('$jet_type','$total_capacity','$active')";
					$stmt=mysqli_query($dbc,$query);
					
					if($stmt)
					{
						echo "Successfully Submitted";
						header("location: all_planes.php?msg=success");
					}
					else
					{
						echo "Submit Error";
						//echo mysqli_error();
						header("location: add_plane.php?msg=failed");
					}
				
			}
			else
			{
				echo "Submit request not received";
			}
		?>

<body class="app">
    <?php include("includes/header.php"); ?>

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="position-relative mb-3">
                    <div class="row g-3 justify-content-center">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-0 text-uppercase">Add Plane Details</h1>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">

                <div class="container mt-4" style="max-width: 550px;">
		<form action="" method="post">
			<?php
			if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
				echo "<strong style='color: green; text-align: center'>The Aircraft has been successfully added.</strong>
						<br><br>";
			} else if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
				echo "<strong style='color:red'>*Jet ID already exists, please enter a new Jet ID.</strong>
						<br><br>";
			}
			?>
			<!-- Password input -->
			<div class="form-outline mb-3">
				<label class="form-label" for="">Enter Plane Type/Model</label>
				<input type="text" name="jet_type" class="form-control" required />
			</div>

			<div class="form-outline mb-3">
				<label class="form-label" for="">Enter Plane Capacity</label>
				<input type="number" name="total_capacity" class="form-control" required />
			</div>

			<!-- Submit button -->

			<div class="d-grid gap-2">
				<input type="submit" value="Add" name="Submit" class="btn btn-primary" />
			</div>
		</form>
	</div>
            </div>
            <!--//app-content-->
            <?php include("includes/footer.php") ?>