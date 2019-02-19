<?php
ob_start();
session_start();
$host_id = $_SESSION['host_id'];
//fetch.php
require_once 'config.php';
$db = new Cl_DBclass();
$query = '';
$data = array();
$records_per_page = 10;
$start_from = 0;
$current_page_number = 0;
if(isset($_POST["rowCount"]))
{
 $records_per_page = $_POST["rowCount"];
}
else
{
 $records_per_page = 10;
}
if(isset($_POST["current"]))
{
 $current_page_number = $_POST["current"];
}
else
{
 $current_page_number = 1;
}
$start_from = ($current_page_number - 1) * $records_per_page;
$query .= "
 SELECT
  booking.booking_id,
  customer.name,
  booking.payment,
  booking.check_in,
  booking.check_out,
  homestay.homestay_name,
  booking.status FROM booking
  INNER JOIN customer
  ON customer.customer_id = booking.customer_id join homestay on booking.homestay_id = homestay.id where homestay.host_id = '$host_id' ";
if(!empty($_POST["searchPhrase"]))
{
 $query .= 'OR (booking.booking_id LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR customer.name LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR booking.payment LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR   booking.status LIKE "%'.$_POST["searchPhrase"].'%" ) ';
}
$order_by = '';
if(isset($_POST["sort"]) && is_array($_POST["sort"]))
{
 foreach($_POST["sort"] as $key => $value)
 {
  $order_by .= " $key $value, ";
 }
}
else
{
 $query .= 'ORDER BY booking.status ASC ';
}
if($order_by != '')
{
 $query .= ' ORDER BY ' . substr($order_by, 0, -2);
}

if($records_per_page != -1)
{
 $query .= " LIMIT " . $start_from . ", " . $records_per_page;
}
//echo $query;
$result = mysqli_query($db->con, $query);
while($row = mysqli_fetch_assoc($result))
{
 $data[] = $row;
}

$query1 = "SELECT * FROM booking join homestay on booking.homestay_id = homestay.id where homestay.host_id = '$host_id' ";
$result1 = mysqli_query($db->con, $query1);
$total_records = mysqli_num_rows($result1);

$output = array(
 'current'  => intval($_POST["current"]),
 'rowCount'  => 10,
 'total'   => intval($total_records),
 'rows'   => $data
);

echo json_encode($output);

?>
