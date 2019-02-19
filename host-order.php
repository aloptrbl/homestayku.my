<?php
ob_start();
session_start();
$host_id = $_SESSION['host_id'];
require_once 'config.php';
if(!isset($_SESSION['logged_ins'])){
	header('Location: index.php');
}
?>
<?php	$user = new Cl_User();	$hd = $user->hostdata(); ?>
<?php	$user = new Cl_User();	$bn = $user->bookno(); ?>
<?php
include("connection.php");
$query = "SELECT * FROM booking";
$result = mysqli_query($connection, $query);
$output = '';
while($row = mysqli_fetch_array($result))
{
 $output .= '<option value="'.$row["customer_id"].'">'.$row["name"].'</option>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 <link rel="icon" href="images/home.png" type="image/gif" sizes="32x32">
    <title>HOMESTAYKU.MY</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
    <link href="css/animate.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
<link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link href="css/host-style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<link href="https://fonts.googleapis.com/css?family=Pacifico|Questrial" rel="stylesheet">
<style>
.img {
	  background-image: url('data:image/jpg;base64, <?php echo base64_encode($hd["picture"]); ?>'),url('images/avatar.jpeg');
}
.background-blur {
	background: url('data:image/jpg;base64, <?php echo base64_encode($hd["picture"]); ?>'),url('images/avatar.jpeg');
	background-size: cover;
		display: block;
		filter: blur(50px);
		-webkit-filter: blur(50px);
		height: 800px;
		left: 0;
		position: fixed;
		right: 0;
		z-index: 0;
		margin: -50px;
}
.box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
	 .table {
	 	text-shadow: 1px 1px 1px #000000;
	 }
</style>

</head>

<body>
  <div class="background-blur"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-4 sidebar1">
                <div class="logo">
                    <div  src="images/aa.jpg" class="img img-responsive center-block"></div>
                </div>

                <br>
                <div class="left-navigation">
                    <ul class="list">
                        <h5><strong><?php echo $hd['name']; ?> (HOST)</strong></h5>
                        <h5><strong>DASHBOARD</strong></h5>
                        <li><a class="nav-li" href="host-home.php"><i class="fa fa-user" aria-hidden="true"></i>   Home</a></li>
                        <li><a class="nav-li" href="host-homestay.php"><i class="fa fa-home" aria-hidden="true"></i>  Homestay</a></li>
                          <li><a class="nav-li active" href="host-order.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Booking <?php $a = $bn['no'];   if($a>0){echo '<span class="badge badge-danger badge-md">'; echo $bn['no']; echo '</span>';}else {echo "";} ?> </a></li>
                        <li><a class="nav-li" href="host-setting.php"><i class="fa fa-cog" aria-hidden="true"></i>  Setting</a></li>
                        <li><a class="nav-li" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  Sign Out</a></li>
                    </ul>

                    <br>

                </div>
            </div>
            <div class="col-md-10 col-sm-8 main-content">
              <br><br>
            <!--Main content code to be written here -->
              <div ng-view class="animated zoomIn">
                <div class="panel panels ">
                     <div class="panel-heading panel-redpink header-title"><h4><b>BOOKING<b></h4></div>
                     <div class="panel-body">
											 <div class="table-responsive">
										    <table id="product_data" class="table table-bordered">
										     <thead>
										      <tr>
										       <th data-column-id="booking_id" data-type="numeric">ID</th>
										       <th data-column-id="name">Name</th>
										       <th data-column-id="payment">Payment (RM)</th>
										       <th data-column-id="status">Status</th>
													  <th data-column-id="check_in">Check In</th>
														 <th data-column-id="check_out">Check Out</th>
														  <th data-column-id="homestay_name">Homestay Name</th>
										       <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
										      </tr>
										     </thead>
										    </table>
										   </div>
                   </div>
                   </div>

                </div>
              </div>

</div>


    </div>




</body>

</html>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#product_form')[0].reset();
  $('.modal-title').text("Add Product");
  $('#action').val("Add");
  $('#operation').val("Add");
 });

 var productTable = $('#product_data').bootgrid({
  ajax: true,
  rowSelect: true,
  post: function()
  {
   return{
    id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
   };
  },
  url: "fetch.php",
  formatters: {
   "commands": function(column, row)
   {
    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.booking_id+"'>Update</button>" +
    "&nbsp; <button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.booking_id+"'>Remove</button>";
   }
  }
 });

 $(document).on('submit', '#product_form', function(event){
  event.preventDefault();
  var category_id = $('#category_id').val();
  var product_name = $('#product_name').val();
  var product_price = $('#product_price').val();
  var form_data = $(this).serialize();
  if(category_id != '' && product_name != '' && product_price != '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     alert(data);
     $('#product_form')[0].reset();
     $('#productModal').modal('hide');
     $('#product_data').bootgrid('reload');
    }
   });
  }
  else
  {
   alert("All Fields are Required");
  }
 });

 $(document).on("loaded.rs.jquery.bootgrid", function()
 {
  productTable.find(".update").on("click", function(event)
  {
   var booking_id = $(this).data("row-id");
    $.ajax({
    url:"fetch_single.php",
    method:"POST",
    data:{booking_id:booking_id},
    dataType:"json",
    success:function(data)
    {
     $('#productModal').modal('show');
     $('#category_id').val(data.customer_id);
     $('#product_name').val(data.booking_id);
     $('#product_price').val(data.status);
     $('.modal-title').text("Edit Reservation");
     $('#booking_id').val(booking_id);
     $('#action').val("Update");
     $('#operation').val("Edit");
    }
   });
  });
 });

 $(document).on("loaded.rs.jquery.bootgrid", function()
 {
  productTable.find(".delete").on("click", function(event)
  {
   if(confirm("Are you sure you want to remove this?"))
   {
    var booking_id = $(this).data("row-id");
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{booking_id:booking_id},
     success:function(data)
     {
      alert(data);
      $('#product_data').bootgrid('reload');
     }
    })
   }
   else{
    return false;
   }
  });
 });
});
</script>
<div id="productModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="product_form">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4  class="modal-title black">Add Product</h4>
    </div>
    <div class="modal-body">
     <br />
     <label class="black">Enter Product Name</label>
     <input type="text" name="product_name" id="product_name" class="form-control" readonly="" />
     <br />
     <label class="black">Enter Product Price</label>
		 <select name="product_price" id="product_price" class="form-control">
  <option value="">Choose Status</option>
  <option value="reserved">Reserved</option>
  <option value="checkin">Check In</option>
  <option value="checkout">Check Out</option>
</select>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="booking_id" id="booking_id" />
		 <input type="hidden" name="host_id" id="host_id" value="<?php echo $host_id; ?>"/>
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
    </div>
   </div>
  </form>
 </div>
</div>
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>
