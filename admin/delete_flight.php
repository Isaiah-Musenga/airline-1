<?php 

require_once('../Database Connection file/mysqli_connect.php');
include("includes/head.php"); 

?>

<?php

$id = $_GET['id']; // get id through query string

$del = mysqli_query($dbc,"delete from flight_details where id = '$id'"); // delete query
//$query="DELETE FROM Flight_Details WHERE flight_no=? AND departure_date=?";

if($del)
{
    mysqli_close($dbc); // Close connection
    header("location:all_flights.php?msg=success"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>