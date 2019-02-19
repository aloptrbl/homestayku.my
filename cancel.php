<?php
//delete.php
include("connection.php");
if(isset($_GET["id"]))
{
 $query = "update booking set status = 'cancel' where booking_id = '".$_GET["id"]."'";
 if(mysqli_query($connection, $query))
 {
header('Location: status.php');
 }
}
?>
