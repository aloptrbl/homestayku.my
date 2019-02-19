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
<?php	$user = new Cl_User();	$result = $user->homestayhost(); ?>
<?php	$user = new Cl_User();	$bn = $user->bookno(); ?>
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
    <link href="css/animate.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
label {
  color: black;
}
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
                        <li><a class="nav-li active" href="host-homestay.php"><i class="fa fa-home" aria-hidden="true"></i>  Homestay</a></li>
                          <li><a class="nav-li" href="host-order.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Booking <?php $a = $bn['no'];   if($a>0){echo '<span class="badge badge-danger badge-md">'; echo $bn['no']; echo '</span>';}else {echo "";} ?> </a></li>
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
                     <div class="panel-heading panel-redpink header-title"><h4><b>HOMESTAY<b></h4></div>
                     <div class="panel-body">
<div class="pull-left">
<a type="button" class="btn btn-md btn-primary" href="host-add-homestay.php">Add Homestay</a>
</div>
<div class="row">

	<br>
	<br>
<?php

if(mysqli_num_rows($result) > 0)
{
		 while($row = mysqli_fetch_array($result))
		 {
					$output .= '
					<div class="col-md-4">
							<div class="panel panel-default card-background animated slideInRight" style="height:240px;">
									<div class="panel-body">
											<div class="row">
													<div class="col-md-4">
															<img src="uploads/'. $row["album"] .'" class="img-responsive">
													</div>
													<div class="col-md-8">
															<h5 class="card"><b>'. $row["homestay_name"] .'</b></h5>
															<p class="card text-left" style="font-size: 12px;">Address: '. $row["homestay_address"] .'</p>
															 <p class="card text-left" style="font-size: 12px;"><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i></p>
<div class="pull-left">
															<a class="btn btn-success btn-sm" href="host-edit-homestay.php?id='. $row["id"] .'">
																	<i class="fa fa-plus" aria-hidden="true"></i>
																	Edit</a>
															<a class="btn btn-danger btn-sm" href="JavaScript:if(confirm("Confirm Delete?")==true){window.location="delete.php?CustomerID=";}">

																	<i class="fa fa-remove" aria-hidden="true"></i>
																	Remove</a>
</div>
													</div>
											</div>
									</div>
							</div>
					</div>

					';


		 }
}
else
{
		 $output .= '
		 <img class="animated infinite bounce" src="images/casa.png" width="200" height="200">
					<center><h3 style="text-shadow: 1px 1px 3px #000000;"> Your dont have any registered homestay yet! </h3> </center>
		 ';
}
echo $output;
?>
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
