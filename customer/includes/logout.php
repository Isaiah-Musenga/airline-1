<html>
	<head>
		<title>Logout | Admin</title>
	</head>
	<body>
		<?php
			session_start();
			session_destroy();
			header("location: ../../index.php");
		?>
	</body>
</html>