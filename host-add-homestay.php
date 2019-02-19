<?php
ob_start();
session_start();
$host_id = $_SESSION['host_id'];
require_once 'config.php';
if(!isset($_SESSION['logged_ins'])){
	header('Location: index.php');
}
?>
<?php
	if(!empty($_POST)){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->homestayadd( $_POST );
			if($data)$success = HOMESTAY_REGISTRATION_SUCCESS;
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	}
?>
<?php	$user = new Cl_User();	$hd = $user->hostdata(); ?>
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
                     <div class="panel-heading panel-redpink header-title"><h4><b>ADD NEW HOMESTAY<b></h4></div>
                     <div class="panel-body">
                       <div class="row">
												 <?php require_once 'templates/message.php';?>
												<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-addhomestay" role="form" id="addhomestay-form" enctype="multipart/form-data">
                       <div class="form-group col-md-6">
                         <input type="text" class="form-control" id="homestay_name" name="homestay_name" placeholder="Homestay Name">
<br>
                           <ul class="nav nav-pills nav-stacked col-md-4">
														 <li class="active"><a href="#tab_d" data-toggle="pill"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Host Detail</a></li>
                             <li><a href="#tab_a" data-toggle="pill"><i class="fa fa-wrench" aria-hidden="true"></i> General</a></li>
                             <li><a href="#tab_b" data-toggle="pill"><i class="fa fa-map-marker" aria-hidden="true"></i> Address</a></li>
														   <li><a href="#tab_e" data-toggle="pill"><i class="fa fa-picture-o" aria-hidden="true"></i> Gallery</a></li>
                             <li><a href="#tab_c" data-toggle="pill"><i class="fa fa-home" aria-hidden="true"></i> Accomodation</a></li>


                           </ul>
                           <div class="tab-content col-md-8">
                                   <div class="tab-pane col-md-10" id="tab_a">
                                      <input type="text" name="regular_price" class="form-control" id="usr" placeholder="Regular Price (RM) per Night"><br>
                                        <input type="text" name="discount" class="form-control" id="usr" placeholder="Discount(%)"><br>

                                   </div>
                                   <div class="tab-pane" id="tab_b">
                                     <textarea name="address" class="col-md-10 form-control" rows="4" cols="50" style="color:black;" placeholder="Address"></textarea>
                                   </div>
                                   <div class="tab-pane" id="tab_c">
                                     <label class="col-md-3">Guest</label>
                                                                       <div class="form-group col-md-9">
                                         <select class="form-control" id="sel1" name="guest">
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                         </select>
                                       </div>
   <label class="col-md-3">Room</label>
                                     <div class="form-group col-md-9">
       <select class="form-control" id="sel1" name="room">
         <option>1</option>
         <option>2</option>
         <option>3</option>
         <option>4</option>
       </select>
     </div>
     <label class="col-md-3">Bedroom</label>
                                       <div class="form-group col-md-9">
         <select class="form-control" id="sel1" name="bedroom">
           <option>1</option>
           <option>2</option>
           <option>3</option>
           <option>4</option>
         </select>
       </div>
        <label class="col-md-3">Food</label>
       <div class="form-group col-md-9 text-left">
           <label><input type="checkbox" name="food" value="1"> Prepared</label>
       </div>
                                   </div>
                                   <div class="tab-pane active" id="tab_d">
   <label class="col-md-3">Host Name</label>
                                     <div class="form-group col-md-9">
    <input type="text" class="form-control" value="<?php echo $hd['name']; ?>" name="host_name" placeholder="Fullname">
     </div>
     <label class="col-md-3">Detail</label>
                                       <div class="form-group col-md-9">
         <textarea class="col-md-10 form-control" name="detail" rows="4" cols="50" style="color:black;" placeholder="Type your detail information"></textarea>
       </div>

                                   </div>
																	 <div class="tab-pane" id="tab_e">
																		  <input type="file" onchange="preview_image();" name="images[]" id="images"  accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
 <div id="image_preview"></div>
																	 </div>
                           </div><!-- tab content -->

                       </div>
                       <div class="col-md-6 pull-right">

                       </div>
                     </div>
                     <div class="col-md-12 text-right">
                     <button type="submit"  value="submit" class="btn btn-primary btn-md">Publish</button>
                      <button type="button" class="btn btn-danger btn-md">Cancel</button>
                    </div>
									</form>
                   </div>

                   </div>

                </div>
              </div>

</div>


    </div>

		<script>


function preview_image()
{
 var total_file=document.getElementById("images").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img class='img-responsive col-md-4' src='"+URL.createObjectURL(event.target.files[i])+"'>");
 }
}
</script>

</body>

</html>
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>
