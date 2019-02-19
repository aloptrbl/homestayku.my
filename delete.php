<?php
//delete.php
include("connection.php");
if(isset($_POST["booking_id"]))
{
 $query = "DELETE FROM booking WHERE booking_id = '".$_POST["booking_id"]."'";
 if(mysqli_query($connection, $query))
 {
  echo 'Data Deleted';
 }
}
?>
