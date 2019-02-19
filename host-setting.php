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
	if( !empty( $_POST )){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->hostupdate( $_POST );
			if($data)$_SESSION['success'] = UPDATE_HOST_INFO_SUCCESS;
			header('Location: host-home.php');
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		}
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
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
			<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
			<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"></link>


			<script type="text/javascript"
				src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTSkxeoIBlDd64W8pFp9_HgE5YLy9vXTM&libraries=places">
			</script>

			<script src="js/jquery.placepicker.js"></script>
    <link href="css/animate.css" rel="stylesheet">

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


	<script>

	$(function() {

			// Basic usage
			$(".placepicker").placepicker();


		}); // END document.ready

	</script>

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
              <div  class="animated zoomIn">
                <div class="panel panels ">
                     <div class="panel-heading panel-redpink"><h4><b>SETTING<b></h4></div>
                     <div class="panel-body">
                       <div class="col-md-3">
                           <div class="panel panel-default card-background">
                               <div class="panel-body">
                                   <div class="row">
                <p> PROFILE </p>
                                     <hr>
                <a class="profile active" href="host-setting.php">Edit Profile</a><br>
                <a class=" profile" href="host-setting-password.php">Password</a><br>
                <a class="profile" href="setting-verification.html">Trust & Verification</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-9">
                           <div class="panel panel-default card-background">
                               <div class="panel-body">
                                     <div class="row">
<?php require_once 'templates/message.php';?>
                                       <div class="col-md-9 col-sm-6 col-xs-12 col-lg-offset-0">
                                      			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="host-form" method="post" class="form-horizontal myaccount" role="form" enctype="multipart/form-data">
  <div class="form-group">
                                          <div class="image-holder col-md-offset-6" id="image-holder"></div>
																					<br>
                                          <label class="control-label col-md-2">Profile Photo  </label>
																					<div class="fileupload fileupload-new" data-provides="fileupload">
																				    <span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
																				    <span class="fileupload-exists">Change</span>         <input type="file" id="filUpload" name="filUpload" multiple="multiple" /></span>
																				    <span class="fileupload-preview"></span>
																				    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none"></a>
																				  </div>
																					<div class="form-group">


																				  </div>
                                </div>

                                         <div class="form-group ">
                                          <label class="control-label col-md-2" for="name">
                                           Full Name
                                          </label>
                                          <div class="col-md-10">
                                           <input class="form-control" id="name" name="name" type="text" value="<?php echo $hd['name']; ?>"/>
                                          </div>
                                         </div>
                                         <div class="form-group ">
                                          <label class="control-label col-md-2" for="gender">
                                           Gender
                                          </label>
                                          <div class="col-sm-10">
                                           <select class="select form-control" id="gender" name="gender" value="<?php echo $hd['gender']; ?>">
                                            <option value="Male">
                                             Male
                                            </option>
                                            <option value="Female">
                                             Female
                                            </option>
                                           </select>
                                          </div>
                                         </div>
                                         <div class="form-group ">
                                          <label class="control-label col-md-2 requiredField" for="email">
                                           Email
                                           <span class="asteriskField">
                                            *
                                           </span>
                                          </label>
                                          <div class="col-sm-10">
                                           <input class="form-control" id="email" name="email" type="text"  value="<?php echo $hd['email']; ?>"/>
                                          </div>
                                         </div>
                                         <div class="form-group ">
                                          <label class="control-label col-md-2" for="date">
                                           Birthday
                                          </label>
                                          <div class="col-sm-10">
                                           <input class="form-control" id="date" name="date"  value="<?php echo $hd['birthday']; ?>" placeholder="MM/DD/YYYY" type="date"/>
                                          </div>
                                         </div>
                                         <div class="form-group ">
                                          <label class="control-label col-md-2" for="phone_no">
                                           Phone Number
                                          </label>
                                          <div class="col-sm-10">
                                           <input class="form-control" id="phone_no"  value="<?php echo $hd['phone_no']; ?>" name="phone_no" type="text"/>
                                          </div>
                                         </div>
                                         <div class="form-group ">
                                          <label class="control-label col-md-2" for="address">
                                           Where you live
                                          </label>
                                          <div class="col-sm-10">

					 <input class="placepicker form-control" name="address" id="address" value="<?php echo $hd['address']; ?>" placeholder="Enter a location"/>

                                          </div>
                                         </div>
                                         <div class="form-group">
                                          <div class="col-sm-10 col-sm-offset-6">
                                           <button class="btn btn-primary btn-md " name="submit" type="submit">
                                            Update
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


    <script>
    $(document).ready(function() {
          $("#filUpload").on('change', function() {
            //Get count of selected files
            var countFiles = $(this)[0].files.length;
            var imgPath = $(this)[0].value;
            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            var image_holder = $("#image-holder");
            image_holder.empty();
            if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
              if (typeof(FileReader) != "undefined") {
                //loop for each file selected for uploaded.
                for (var i = 0; i < countFiles; i++)
                {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                    $("<img />", {
                      "src": e.target.result,
                      "class": "thumb-image"
                    }).appendTo(image_holder);
                  }
                  image_holder.show();
                  reader.readAsDataURL($(this)[0].files[i]);
                }
              } else {
                alert("This browser does not support FileReader.");
              }
            } else {
              alert("Pls select only images");
            }
          });
        });
    </script>


</body>

</html>
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>
