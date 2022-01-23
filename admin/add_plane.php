<?php

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php");

?>

<?php
			if(isset($_POST['Submit']))
			{
				$data_missing=array();
				if(empty($_POST['jet_id']))
				{
					$data_missing[]='Jet ID';
				}
				else
				{
					$jet_id=trim($_POST['jet_id']);
				}

				if(empty($_POST['jet_type']))
				{
					$data_missing[]='Jet Type';
				}
				else
				{
					$jet_type=$_POST['jet_type'];
				}

				if(empty($_POST['jet_capacity']))
				{
					$data_missing[]='Jet Capacity';
				}
				else
				{
					$jet_capacity=$_POST['jet_capacity'];
				}

				if(empty($data_missing))
				{
					$query="INSERT INTO Jet_Details (jet_id,jet_type,total_capacity,active) VALUES (?,?,?,'Yes')";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ssi",$jet_id,$jet_type,$jet_capacity);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
					//echo $affected_rows."<br>";
					// mysqli_stmt_bind_result($stmt,$cnt);
					// mysqli_stmt_fetch($stmt);
					// echo $cnt;
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					/*
					$response=@mysqli_query($dbc,$query);
					*/
					if($affected_rows==1)
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
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
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
			<!-- Email input -->
			<div class="form-outline mb-3">
				<label class="form-label" for="">Enter a Plane ID</label>
				<input type="text" name="jet_id" class="form-control" required />
			</div>

			<!-- Password input -->
			<div class="form-outline mb-3">
				<label class="form-label" for="">Enter Plane Type/Model</label>
				<input type="text" name="jet_type" class="form-control" required />
			</div>

			<div class="form-outline mb-3">
				<label class="form-label" for="">Enter Plane Capacity</label>
				<input type="number" name="jet_capacity" class="form-control" required />
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