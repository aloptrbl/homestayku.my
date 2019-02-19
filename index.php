<?php
ob_start();
session_start();
$customer_id = $_SESSION['customer_id'];
$host_id = $_SESSION['host_id'];
require_once 'config.php';
?>
<?php
	if( !empty( $_POST )){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->login( $_POST );
			if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
$_SESSION['success'] = 'You are logged in successfully';
 $_SESSION['homestay_id']=$row['homestay_id'];;
				header('Location: profile.php');exit;
			}
      elseif (isset($_SESSION['logged_ins']) && $_SESSION['logged_ins']) {
$_SESSION['success'] = 'You are logged in successfully';
			header('Location: host-home.php');exit;
      }

		} catch (Exception $e) {
			$error = $e->getMessage();
			$_SESSION['error'] = $error;
		}
	}

	//print_r($_SESSION);
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		header('Location: profile.php');exit;
	}
  elseif (isset($_SESSION['logged_ins']) && $_SESSION['logged_ins']) {
    header('Location: host-home.php');exit;
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
    <!-- xzoom plugin here -->

    <!-- Bootstrap Core CSS -->

              <script type="text/javascript" src="moment.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script>
$(document).ready(function(){
  animationClick('#logo','wobble');
  function animationClick(element, animation){
  element = $(element);
  element.click(
    function() {
      element.addClass('animated ' + animation);
      //wait for animation to finish before removing classes
      window.setTimeout( function(){
          element.removeClass('animated ' + animation);
      }, 2000);
    }
  );
};
});
</script>
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
body {
    padding-top: 90px;
    color: black;
    background: url('images/f.jpg');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.panel {
      background-color: rgba(255, 255, 255, 0.69);
}
.panel-login {
    border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #EF4836;
	background-color: rgba(255, 255, 255, 0.58);
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #EF4836;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #F64747;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #F64747;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #EF4836;
	border-color: #EF4836;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #F64747;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #EF4836;
}
.btn-register:hover,
.btn-register:focus {
  color: #fff;
	background-color: #EF4836;
	border-color: #EF4836;
}
input[type="text"], input[type="password"], input[type="email"] {
  border-radius: 30px;
}
input[type="text"]:hover, input[type="password"]:hover, input[type="email"]:hover,input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus
{
  border: 3px solid #F64747;
}
</style>


</head>

<body>
  <div class="container">
          <div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<div class="panel panel-login animated fadeInDown">
  					<div class="panel-heading">
              <img src="images/home.png" id="logo" width="100px" height="100px">
<H3 style="font-weight: bolder;"> HOMESTAYKU.MY </H3>
              <div class="row">
  							<div class="col-xs-6 col-xs-offset-3">
  								<a href="#" class="active" id="login-form-link">LOGIN</a>
  							</div>
            </div>
  						<hr>
  					</div>
  					<div class="panel-body">
  						<div class="row">
  							<div class="col-lg-8 col-lg-offset-2">
                  <?php require_once 'templates/message.php';?>
  								<form id="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form" style="display: block;">
  									<div class="form-group">
  										<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
  									</div>
  									<div class="form-group">
  										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
  									</div>
  									<div class="form-group text-center">
  										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
  										<label for="remember"> Remember Me</label>
  									</div>
  									<div class="form-group">
  										<div class="row">
  											<div class="col-sm-6 col-sm-offset-3">
  												<input type="submit" name="login-submit"  id="submit_btn" data-loading-text="Signing In...." tabindex="4" class="form-control btn btn-login" value="Log In">
  											</div>
  										</div>
  									</div>
  									<div class="form-group">
  										<div class="row">
  											<div class="col-lg-12">
  												<div class="text-center">
  													<a href="register.php" tabindex="5" class="forgot-password">Not a member?</a>
  												</div>
  											</div>
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
</body>
<script src="js/jquery.validate.min.js"></script>
	<script src="js/login.js"></script>
</html>
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>
