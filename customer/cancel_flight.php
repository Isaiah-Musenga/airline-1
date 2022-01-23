<?php 

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php"); 

?>

<?php

$id = $_GET['id']; // get id through query string

$cancel = mysqli_query($dbc,"UPDATE ticket_details SET booking_status = 'CANCELED' WHERE pnr='$id'"); 


if($cancel)
{
    mysqli_close($dbc); // Close connection
    header("location:booked_tickets.php?msg=success"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>