<?php
//fetch_single.php
include("connection.php");
if(isset($_POST["booking_id"]))
{
 //$output = array();
 $query = "SELECT * FROM booking WHERE booking_id = '".$_POST["booking_id"]."'";
 $result = mysqli_query($connection, $query);
 while($row = mysqli_fetch_array($result))
 {
  $output["booking_id"] = $row["booking_id"];
  $output["payment"] = $row["payment"];
  $output["status"] = $row["status"];
 }
 echo json_encode($output);
}

?>
