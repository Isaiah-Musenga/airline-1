<?php 

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php"); 

$id = $_GET['id'];
?>
<?php
			if(isset($_POST['Deactivate']))
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

				if(empty($data_missing))
				{
					$query="UPDATE Jet_Details SET active='No' WHERE id=?";
					$stmt=mysqli_prepare($dbc,$query) or die(mysqli_error($dbc));
					mysqli_stmt_bind_param($stmt,"s",$id);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);

					if($affected_rows==1)
					{
						echo "Successfully Deactvated";
						header("location: all_planes.php?msg=success");
					}
					else
					{
						echo "Submit Error";
						echo mysqli_error($dbc);
						header("location: all_planes.php?msg=failed");
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
				echo "Deactivate request not received";
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
							<h1 class="app-page-title mb-0 text-uppercase">Deactivate Plane</h1>
						</div>
					</div>
				</div>
                <hr class="mb-4">
                <div class="container mt-4" style="max-width: 550px;">
		<form action="" method="post">
			<div class="container">
				<div class="form-outline mb-3">
					<label class="form-label" for="">Enter a valid Plane ID</label>
					<input type="text" name="jet_id" class="form-control" value="<?php echo $id; ?>" required />
				</div>
			</div>
			<div class="d-grid gap-2">
				<input type="submit" value="Deactivate" name="Deactivate" class="btn btn-primary btn-block" />
			</div>
		</form>
	</div>
			</div>
			<!--//app-content-->
				<?php include("includes/footer.php") ?>