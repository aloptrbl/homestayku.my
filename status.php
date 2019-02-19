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
<?php	$user = new Cl_User();	$result = $user->bookingcustomer(); ?>
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
               <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
.table {
	text-shadow: 1px 1px 2px #000000;
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
                        <li><a class="nav-li" href="search.php"><i class="fa fa-search" aria-hidden="true"></i>  Search</a></li>
                        <li><a class="nav-li active" href="status.php"><i class="fa fa-home" aria-hidden="true"></i>  Status</a></li>
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
                     <div class="panel-heading panel-redpink"><h4><b>STATUS<b></h4></div>
                     <div class="panel-body">
											 <table class="table table-condensed">
    <thead>
<?php if(mysqli_num_rows($result)){ ?>
      <tr>
        <th style="text-align:center;">Booking ID</th>
        <th style="text-align:center;">Homestay Name</th>
        <th style="text-align:center;">Check In</th>
				<th style="text-align:center;">Check Out</th>
				<th style="text-align:center;">Payment</th>
				<th style="text-align:center;">Status</th>
					<th style="text-align:center;">Command</th>
      </tr>
    </thead>
    <tbody>
			<?php  while ( $results = mysqli_fetch_assoc($result) ) {?>
      <tr>
        <td><?php echo $results['booking_id']; ?></td>
        <td><?php echo $results['homestay_name']; ?></td>
          <td><?php echo $results['check_in']; ?></td>
					  <td><?php echo $results['check_out']; ?></td>
						  <td>RM<?php echo $results['payment']; ?></td>
							  <td><?php echo $results['status']; ?></td>
								 <td> <?php if ($results['status']=='cancel' || $results['status']=='checkout')
{
echo "<a class='btn btn-danger' disabled>Cancel </a>";
}
else
{
echo "<a class='btn btn-primary' href='cancel.php?id='"; echo $results['status']; echo "'>Cancel </a>";
}
 ?></td>
      </tr>
			<?php }

		}
		elseif (!mysqli_num_rows($result)) {
			echo "<center><h3 style='text-shadow: 2px 2px 4px #000000;'>You dont make any booking yet <img class=' animated bounce infinite' src='images/house-icon.png' width='100' height='100'> </h3></center>";
		}?>
    </tbody>
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
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>
