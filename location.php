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
<?php	$user = new Cl_User();	$bn = $user->bookno(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
 <link rel="icon" href="images/home.png" type="image/gif" sizes="32x32">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HOMESTAYKU.MY</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
                     <div class="panel-heading panel-redpink"><h4><b>LOCATION<b></h4></div>
                     <div class="panel-body">
                     <style>
                         #map {
                           width: 100%;
                           height: 400px;
                           background-color: grey;
                         }
                       </style>
                       <div id="map"></div>
                         <script>
                           function initMap() {
                             var uluru = {lat: 3.500977, lng: 101.110935};
                             var map = new google.maps.Map(document.getElementById('map'), {
                               zoom: 14,
                               center: uluru
                             });
                             var marker = new google.maps.Marker({
                               position: uluru,
                               map: map,
                               animation: google.maps.Animation.DROP
                             });
                             marker.addListener('click', toggleBounce);
                             function toggleBounce() {
                       if (marker.getAnimation() !== null) {
                         marker.setAnimation(null);
                       } else {
                         marker.setAnimation(google.maps.Animation.BOUNCE);
                       }
                     }
                           }
                         </script>
                         <script async defer
                         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTSkxeoIBlDd64W8pFp9_HgE5YLy9vXTM&callback=initMap">
                         </script>
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
