<?php 

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php"); 

$id = $_GET['id'];
?>

<?php
			if(isset($_POST['Activate']))
			{
				$data_missing=array();
				if(empty($_POST['id']))
				{
					$data_missing[]='Jet ID';
				}
				else
				{
					$jet_id=trim($_POST['id']);
				}

				if(empty($data_missing))
				{
					// $query="UPDATE jet_details SET active='Yes' WHERE jet_id=?";
					$query="UPDATE jet_details SET active='Yes' WHERE id='$id'";
					$affected_rows=mysqli_query($dbc,$query);
					/*
					$response=@mysqli_query($dbc,$query);
					*/
					if($affected_rows==1)
					{
						echo "Successfully Activated";
						header("location: all_planes.php?msg=success");
					}
					else
					{
						echo "Submit Error";
						echo ($affected_rows);
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
				echo "Activate request not received";
			}
					mysqli_close($dbc);
		?>
<body class="app">
	<?php include("includes/header.php"); ?>

	<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<div class="position-relative mb-3">
					<div class="row g-3 justify-content-center">
						<div class="col-auto">
							<h1 class="app-page-title mb-0 text-uppercase">Activate Plane</h1>
						</div>
					</div>
				</div>
                <hr class="mb-4">
                <div class="container mt-4" style="max-width: 550px;">
		<form action="" method="post">
			<div class="container">
				<div class="form-outline mb-3">
					<label class="form-label" for="">Enter a valid Jet ID</label>
					<input type="text" name="id" class="form-control" value="<?php echo $id; ?>" required />
				</div>
			</div>
			<div class="d-grid gap-2">
				<input type="submit" value="Activate" name="Activate" class="btn btn-primary" />
			</div>
		</form>
	</div>
			</div>
			<!--//app-content-->
				<?php include("includes/footer.php") ?>