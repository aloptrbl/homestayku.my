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
	if( !empty( $_POST )){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->customerupdate( $_POST );
			if($data)$_SESSION['success'] = UPDATE_HOST_INFO_SUCCESS;
			header('Location: profile.php');
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
		  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
		<script type="text/javascript"
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTSkxeoIBlDd64W8pFp9_HgE5YLy9vXTM&libraries=places">
		</script>

		<script src="js/jquery.placepicker.js"></script>
    <link href="css/animate.css" rel="stylesheet">

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
 background-image:url('data:image/jpg;base64, <?php echo base64_encode($cd["picture"]); ?>'),url('images/avatar.jpeg');
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
                        <h5><strong><?php echo $cd["name"]; ?></strong></h5>
                        <h5><strong>DASHBOARD</strong></h5>
                        <li><a class="nav-li" href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>   Profile</a></li>
                        <li><a class="nav-li" href="search.php"><i class="fa fa-search" aria-hidden="true"></i>  Search</a></li>
                        <li><a class="nav-li" href="status.php"><i class="fa fa-home" aria-hidden="true"></i>  Status</a></li>
                        <li><a class="nav-li active" href="setting.php"><i class="fa fa-cog" aria-hidden="true"></i>  Setting</a></li>
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
                <a class="profile active" href="setting.php">Edit Profile</a><br>
                <a class=" profile" href="setting-password.php">Password</a><br>
                <a class="profile" href="setting-verification.php">Trust & Verification</a>
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
                                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="customer-form" method="post" class="form-horizontal myaccount" role="form" enctype="multipart/form-data">
<div class="form-group">
                                          <div class="image-holder col-md-offset-6" id="image-holder"></div>
                                          <label class="control-label col-md-2">Change Profile Picture</label>
                                        <div class="fileUpload button-submit col-md-10">
                                    <input type="file" class="upload" id="filUpload" name="filUpload" multiple="multiple" />
                                </div>
                              </div>
                                         <div class="form-group ">
                                          <label class="control-label col-md-2" for="name">
                                           Full Name
                                          </label>
                                          <div class="col-md-10">
                                           <input class="form-control" id="name" name="name" value="<?php echo $cd['name']; ?>" type="text"/>
                                          </div>
                                         </div>
                                         <div class="form-group ">
                                          <label class="control-label col-md-2" for="select">
                                           Gender
                                          </label>
                                          <div class="col-sm-10">
                                           <select class="select form-control" id="gender" value="<?php echo $cd['gender']; ?>" name="gender">
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
                                           <input class="form-control" id="email" name="email" value="<?php echo $cd['email']; ?>" type="text"/>
                                          </div>
                                         </div>
                                         <div class="form-group ">
                                          <label class="control-label col-md-2" for="date">
                                           Birthday
                                          </label>
                                          <div class="col-sm-10">
                                           <input class="form-control" id="date" name="date" value="<?php echo $cd['birthday']; ?>" placeholder="MM/DD/YYYY" type="date"/>
                                          </div>
                                         </div>
                                         <div class="form-group ">
                                          <label class="control-label col-md-2" for="subject">
                                           Phone Number
                                          </label>
                                          <div class="col-sm-10">
                                           <input class="form-control" id="phone_no" name="phone_no" value="<?php echo $cd['phone_no']; ?>" type="text"/>
                                          </div>
                                         </div>
                                         <div class="form-group ">
                                          <label class="control-label col-md-2" for="text">
                                           Where you live
                                          </label>
                                          <div class="col-sm-10">
                                            <input class="placepicker form-control" name="address" value="<?php echo $cd['address']; ?>" id="address" placeholder="Enter a location"/>
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
