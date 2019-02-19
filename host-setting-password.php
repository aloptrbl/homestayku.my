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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
.profile, .profile:hover {
color: white;
text-decoration: none;
}
.active {
  color: white;
  text-shadow:1px 1px 10px #fff, 1px 1px 10px #ccc;
}
.image-holder {
 border:3px solid #ffffff;
 width: 120px;
 height:120px;
 border-radius:50%;
 background-image:url('data:image/jpg;base64, <?php echo base64_encode($hd["picture"]); ?>'),url('images/avatar.jpeg');
 background-size:cover;
 background-position:center center;


}
.thumb-image{
 border:3px solid #ffffff;
 width: 120px;
 height:120px;
 border-radius:50%;
 margin-left: -3px;
 margin-top: -3px;

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
.placepicker-map {
        width: 100%;
        height: 300px;
      }

      .another-map-class {
        width: 100%;
        height: 300px;
      }

      .pac-container {
        border-radius: 5px;
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
												<li><a class="nav-li" href="host-order.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Booking  <?php $a = $bn['no'];   if($a>0){echo '<span class="badge badge-danger badge-md">'; echo $bn['no']; echo '</span>';}else {echo "";} ?> </a></li>
											<li><a class="nav-li active" href="host-setting.php"><i class="fa fa-cog" aria-hidden="true"></i>  Setting</a></li>
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
                     <div class="panel-heading panel-redpink"><h4><b>SETTING<b></h4></div>
                     <div class="panel-body">
                       <div class="col-md-3">
                           <div class="panel panel-default card-background">
                               <div class="panel-body">
                                   <div class="row">
                <p> PROFILE </p>
                                     <hr>
                                     <a class="profile" href="setting.php">Edit Profile</a><br>
                                     <a class=" profile active" href="setting-password.php">Password</a><br>
                                     <a class="profile" href="setting-verification.php">Trust & Verification</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-9">
                           <div class="panel panel-default card-background">
                               <div class="panel-body">
                                     <div class="row">
                                       <div class="col-md-9 col-sm-6 col-xs-12 col-lg-offset-0">
																				 <?php require_once 'templates/message.php';?>
 																				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="account-form" method="post" class="form-horizontal myaccount" role="form">
                                         <div class="form-group ">
                                          <label class="control-label col-md-2" for="password">
                                           Current Password
                                          </label>
                                          <div class="col-md-10">
                                           <input class="form-control" id="password" name="password" type="password"/>
                                          </div>
                                         </div>
                                         <div class="form-group ">
                                          <label class="control-label col-md-2" for="password">
                                           New Password
                                          </label>
                                          <div class="col-sm-10">
                                           <input class="form-control" id="n-password" name="n-password" type="password"/>
                                          </div>
                                         </div>
                                         <div class="form-group ">
                                          <label class="control-label col-md-2" for="password">
                                           New Password
                                          </label>
                                          <div class="col-sm-10">
                                           <input class="form-control" id="n-password" name="n-password" type="password"/>
                                          </div>
                                         </div>
                                         <div class="form-group">
                                          <div class="col-sm-10 col-sm-offset-6">
                                           <button class="btn btn-primary btn-md " name="submit" type="submit">
                                            Submit
                                           </button>
                                          </div>
                                         </div>
                                        </form>
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
              </div>

</div>


    </div>




</body>

</html>
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>
