<?php
ob_start();
session_start();
$customer_id = $_SESSION['customer_id'];
require_once 'config.php';
if(!isset($_SESSION['logged_in'])){
	header('Location: index.php');
}
?>
<?php	$user = new Cl_User();	$cd = $user->customerdata(); ?>
<?php
 $connect = mysqli_connect("localhost", "root", "", "homestayku.my");
 $query = "SELECT DISTINCT homestay.id, homestay.homestay_name,homestay.homestay_address, homestay.discount, homestay_gallery.album FROM homestay join homestay_gallery on homestay.id = homestay_gallery.homestay_id GROUP BY (homestay.id)";
 $result = mysqli_query($connect, $query);
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
 <link rel="icon" href="images/home.png" type="image/gif" sizes="32x32">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
			<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		 <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <!-- Include Date Range Picker -->



<link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<link href="https://fonts.googleapis.com/css?family=Pacifico|Questrial" rel="stylesheet">
<style>
.active {
  color: white;
  text-shadow:1px 1px 10px #fff, 1px 1px 10px #ccc;
}
.img {
	  background-image: url('data:image/jpg;base64, <?php echo base64_encode($cd["picture"]); ?>'),url('images/avatar.jpeg');
}
.background-blur {
	background: url('data:image/jpg;base64, <?php echo base64_encode($cd["picture"]); ?>'),url('images/avatar.jpeg');
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

.corner-ribbon {
  width: 100px;
  background: #e74c3c;
  position: absolute;
  left: -50px;
  text-align: center;
  line-height: 30px;
  letter-spacing: 1px;
  color: #f0f0f0;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  overflow: hidden;
	z-index: 5;
	font-size: 12px;
}
.corner-ribbon.shadow {
  box-shadow: 0 0 3px rgba(0, 0, 0, .3);
}
/* Different positions */

.corner-ribbon.top-right {
	top: 150px;
  left: auto;
  transform: rotate(0deg);
  -webkit-transform: rotate(0deg);
  overflow: hidden;
}
.corner-ribbon.blue {
  background: #e74c3c;
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
                        <h5><strong><?php echo $cd["name"]; ?></strong></h5>
                        <h5><strong>DASHBOARD</strong></h5>
                        <li><a class="nav-li" href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>   Profile</a></li>
                        <li><a class="nav-li active" href="search.php"><i class="fa fa-search" aria-hidden="true"></i>  Search</a></li>
                        <li><a class="nav-li" href="status.php"><i class="fa fa-home" aria-hidden="true"></i>  Status</a></li>
                        <li><a class="nav-li" href="setting.php"><i class="fa fa-cog" aria-hidden="true"></i>  Setting</a></li>
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
                <div class="panel-heading panel-redpink header-title"><h4><b>SEARCH<b></h4></div>
                <div class="panel-body">
                <h4><b style="color:#EF4836;">Where to?</b> Search ideal homestay now!</h4>

                <div class="form-group col-md-8 col-md-offset-2">
                  <input type="text" class="form-control" id="search_homestay" name="search_homestay" placeholder="&#xf041; Find your ideal homestay area Sekinchan" style="font-family:Arial, FontAwesome;">
                </div>

                <div class="form-group col-md-3 col-md-offset-1">
                  <input class="form-control" id="from_date" name="from_date" placeholder="Start date">
                </div>
                <div class="form-group col-md-3">
                  <input class="form-control" id="to_date" name="to_date" placeholder="End date">
                </div>
                <div class="col-md-5">
                  <button name="filter" value="filter" id="filter" class="btn btn-search-homestay button3" style="outline:none;">
                      <i class="fa fa-search" aria-hidden="true"></i>
                      Search</button>
                </div>
                <div class="col-md-12 ">
                <div class="row">


												<div id="order_table">

									 <?php
									 while($row = mysqli_fetch_array($result))
									 {
									 ?>
									 <div class="col-md-4 animated rubberBand">
										 <div class="corner-ribbon top-right sticky blue shadow"><?php echo $row["discount"]; ?>% Discount </div>
											 <div class="panel panel-default card-background" style="height:240px;">
													 <div class="panel-body">
															 <div class="row">
																	 <div class="col-md-4">
																			 <img src="uploads/<?php echo $row["album"]; ?>" class="img-responsive">
																	 </div>
																	 <div class="col-md-8">
																			 <h5 class="card text-left"><b><?php echo $row["homestay_name"]; ?></b></h5>
																			 <p class="card text-left" style="font-size: 12px;">Address: <?php echo $row["homestay_address"]; ?></p>
																				<p class="card text-left" style="font-size: 12px;"><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i></p>
																			 <a class="btn btn-primary btn-sm" href="homestaydetail.php?id=<?php echo $row["id"]; ?>">
																					 <i class="fa fa-plus" aria-hidden="true"></i>
																					 Book</a>
																			 <a class="btn btn-success btn-sm" href="location.php">
																					 <i class="fa fa-map-marker" aria-hidden="true"></i>
																					 Get Location</a>
																	 </div>
															 </div>
													 </div>
											 </div>
									 </div>

									 <?php
									 }
									 ?>

							</div>
                    </div>
                </div>
                </div>
                </div>
                </div>

                </div>
                </div>
              </div>

</div>


    </div>


</body>
</html>
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>
<script>
			$(document).ready(function(){
					 $.datepicker.setDefaults({
								dateFormat: 'yy-mm-dd'
					 });

					 $(function(){
								$("#from_date").datepicker();
								$("#to_date").datepicker();
					 });
					 $('#filter').click(function(){
						 	var search_homestay = $('#search_homestay').val();
								var from_date = $('#from_date').val();
								var to_date = $('#to_date').val();
								if(from_date != '' && to_date != '' ||  search_homestay != '')
								{
										 $.ajax({
													url:"filter.php",
													method:"POST",
													data:{from_date:from_date, to_date:to_date, search_homestay:search_homestay },
													success:function(data)
													{
															 $('#order_table').html(data);
													}
										 });
								}
								else
								{
										 alert("Please Select Date");
								}
					 });
			});
 </script>
