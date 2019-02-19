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
<?php	$user = new Cl_User();	$hsd = $user->homestaydata(); ?>
<?php	$user = new Cl_User();	$hsg = $user->homestaygallery(); ?>
<?php	$user = new Cl_User();	$bd = $user->bookingdata(); ?>
<?php	$user = new Cl_User();	$results = $user->bookingdata(); ?>
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
    <!-- xzoom plugin here -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	 <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script type="text/javascript" src="js/xzoom.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/xzoom.css" media="all" />
<!-- hammer plugin here -->
<script type="text/javascript" src="hammer.js/1.0.5/jquery.hammer.min.js"></script>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link type="text/css" rel="stylesheet" media="all" href="fancybox/source/jquery.fancybox.css" />
<link type="text/css" rel="stylesheet" media="all" href="magnific-popup/css/magnific-popup.css" />
<script type="text/javascript" src="fancybox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="magnific-popup/js/magnific-popup.js"></script>
    <!-- Bootstrap Core CSS -->


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">



       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">


<style>
.modal-content.ios {
    background-color: rgba(236, 240, 241, 0.89);
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
input[type=text] {
    width: 100%;
    padding: 5px 5px;
border-top-right-radius: 8px;
border-bottom-right-radius: 8px;
    box-sizing: border-box;
    border: 3px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
}

input[type=text]:focus {
    border: 3px solid #555;
		background-color: rgba(236, 240, 241, 0.89);
}


/* all */
::-webkit-input-placeholder { color:rgba(236, 240, 241, 0.89); }
::-moz-placeholder { color:rgba(236, 240, 241, 0.89); } /* firefox 19+ */
:-ms-input-placeholder { color:rgba(236, 240, 241, 0.89); } /* ie */
input:-moz-placeholder { color:rgba(236, 240, 241, 0.89); }


.checkinout {
	font-size: 16px;
	font-weight: bolder;
}

.s {
	font-size: 14px;
}
</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<link href="https://fonts.googleapis.com/css?family=Pacifico|Questrial" rel="stylesheet">



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
            <div class="col-md-10 col-sm-8 main-content" id="fancy">
              <br><br>
            <!--Main content code to be written here -->
              <div class="animated zoomIn xzoom-container">
                <div class="col-md-12">
                    <div class="panel panel-default card-background">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="xzoom4" width="500" height="333.333" id="xzoom-fancy" src="uploads/<?php echo $hsd["album"]; ?>" xoriginal="uploads/<?php echo $hsd["album"]; ?>" />
                                </div>
                                <div class="col-md-6">
                                    <h3 class="card"><b><?php echo $hsd["homestay_name"]; ?></b></h3>
                                    <p class="card" style="font-size: 12px;">Address: <?php echo $hsd["homestay_address"]; ?></p>
                <div class="row">
                <div class="col-md-3 col-xs-3"><i class="fa fa-users fa-2x" aria-hidden="true"></i></div>
                <div class="col-md-3 col-xs-3"><i class="fa fa-home fa-2x" aria-hidden="true"></i></div>
                <div class="col-md-3 col-xs-3"><i class="fa fa-bed fa-2x" aria-hidden="true"></i></div>
                <div class="col-md-3 col-xs-3"><i class="fa fa-cutlery fa-2x" aria-hidden="true"></i></div>
                </div>
                <div class="row">
                <div class="col-md-3 col-xs-3"><?php echo $hsd["guest"]; ?> Guest</div>
                <div class="col-md-3 col-xs-3"><?php echo $hsd["room"]; ?> Rooms</i></div>
                <div class="col-md-3 col-xs-3"><?php echo $hsd["bedroom"]; ?> Bedrooms</i></div>
                <div class="col-md-3 col-xs-3"><?php $a = $hsd["food"]; if ($a==0){echo "Not prepared";}elseif ($a==1) {
                	echo "Prepared";
                }  ?></i></div>
                </div>
                <hr>
                <div class="row">
                <div class="col-md-3 col-xs-6 text-left pull-left">
									<?php  foreach ($hsg as $key=>$category){ ?>

										<?php } ?>
                    <img src="data:image/jpg;base64, <?php echo base64_encode($hsd["picture"]); ?>" class="img-responsive center-block" alt="Logo">
                </div>
                <div class="col-md-9 col-xs-6 text-left">
                    <b>Host: <?php echo $hsd["host_name"]; ?></b>
                    <p><?php echo $hsd["detail"]; ?> </p>
                <p>Price: MYR <?php echo $hsd["regular_price"]; ?> per Night |  Rating: <i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i>  </p>
<h3><span class="label label-danger"> <?php echo $hsd["discount"]; ?>% Discount</span></h3>
								</div>
                </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="xzoom-thumbs text-left col-md-offset-1">
																<?php  foreach ($hsg as $key=>$category){ ?>

                                <a href="uploads/<?php echo $category; ?>"><img class="xzoom-gallery4" width="80" src="uploads/<?php echo $category; ?>" title="The description goes here"></a>

<?php }?>
														  </div>
                                <div class="large-7 column"></div>
                                <div class="col-md-12 col-xs-12 text-right">
                                  <br>
                                  <a type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-bookmark" aria-hidden="true"></i>  Book Now</a>
                                  <a type="button" class="btn btn-success btn-lg"  href="#location"><i class="fa fa-map-marker" aria-hidden="true"></i> Location</a>
 <?php require_once 'templates/message.php';?>
 <div id="results"></div>


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

    <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content ios">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title black"><i class="fa fa-home" aria-hidden="true"></i>  <?php echo $hsd["homestay_name"]; ?> Booking</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-sm-6 col-xs-12 col-lg-offset-3">


<div class="row form-inline">
		<form class="contact">
            	<div class="input-group col-md-3">
            		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            		<input class="black" name="checkin" id="TextBox1" type="text" placeholder="Checkin">
								<input class="black" name="customer_id" id="" type="text" placeholder="Checkin" hidden value="<?php echo $_SESSION["customer_id"]; ?>">
								<input class="black" name="homestay_id" id="" type="text" placeholder="Checkin" hidden value="<?php echo $hsd["homestay_id"]; ?>">
								<input class="black" name="status" id="" type="text" placeholder="Checkin" hidden value="reserved">
								<input class="black" name="payment" id="TextBox4" type="text" placeholder="Checkin" hidden>
            	</div>
					 <div class="input-group col-md-3">
						 <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
						 <input class="black" name="checkout" id="TextBox2" type="text" placeholder="Checkout" disabled="disabled" pattern="[^-,]+"></form>
					 </div>
</div>

						 </div>

<hr>
							<div class="form-group col-md-6 col-md-offset-3">
						 		<center><h4 class="pull-left s" id="rr"></h4><h4 id="rrr" class="pull-right s"></h4></center><br>
								<hr>
									<center><h4 class="pull-left s" id="qq"></h4><h4 id="qqq" class="pull-right s"></h4></center><br>
									<hr>
									<center><h4 class="pull-left s" id="ss"></h4><h4 id="sss" class="pull-right s"></h4></center><br>

						 	</div>
          </div>


      </div>
      <div class="modal-footer">
        <button id="submit" class="btn btn-primary">Booking</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>
  <script src="js/setup.js"></script>
<script>


$("#TextBox1").click(function(){
					$("#TextBox2").removeAttr("disabled");
			});

var disableddates = [  <?php while ( $result = mysqli_fetch_assoc($results) ) {
$ci = $result["check_in"];
$co = $result["check_out"];
 $begin = new DateTime( "$ci" );
 $end   = new DateTime( "$co" );

 for($i = $begin; $i <= $end; $i->modify('+1 day')){
    echo '"';echo $i->format("d-m-Y");echo '"'; echo ', ';
 }echo ",";}
  ?>];

function DisableSpecificDates(date) {
    var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
    return [disableddates.indexOf(string) == -1];
  }

	function validateDateRange() {

	    var txtStartDate = $("#TextBox1");
	    var txtEndDate = $("#TextBox2");
	    var startDate;
	    var endDate;
	    var tempDate;

	    if (txtStartDate.val() == "")
	        return false;

	    if (txtEndDate.val() == "")
	        return false;

	    startDate = new Date(txtStartDate.val());
	    endDate = new Date(txtEndDate.val());

	    for (i = 0; i < disableddates.length; i++) {
	        var temp = disableddates[i].split("-");

	        tempDate = new Date(temp[2], temp[1]-1, temp[0]);

	        if (startDate < tempDate && endDate > tempDate) {
	            alert("Invalid Date Range");
	            return false;
	        }
	    }
	}


$("#TextBox1").datepicker({
 beforeShowDay: DisableSpecificDates,
    minDate: 0,
		dateFormat: "yy-mm-dd",
    maxDate: '+1Y+6M',

    onSelect: function (dateStr) {
        var min = $(this).datepicker('getDate'); // Get selected date
        $("#TextBox2").datepicker('option', 'minDate', min || '0'); // Set other min, default to today

    }
});

$("#TextBox2").datepicker({
	beforeShowDay: DisableSpecificDates,
    minDate: '0',
		dateFormat: "yy-mm-dd",
    maxDate: '+1Y+6M',
    onSelect: function (dateStr) {
        var max = $(this).datepicker('getDate'); // Get selected date
        $('#datepicker').datepicker('option', 'maxDate', max || '+1Y+6M'); // Set other max, default to +18 months
        var start = $("#TextBox1").datepicker("getDate");
        var end = $("#TextBox2").datepicker("getDate");
        var days = (end - start) / (1000 * 60 * 60 * 24);
				var result = (end - start) / (1000 * 60 * 60 * 24) * <?php echo $hsd["regular_price"]; ?>;
				var discount = result - Math.round(result*<?php echo $hsd["discount"]; ?>/100);
        $("#TextBox3").val(days);
				  $("#rr").text("RM" + "<?php echo $hsd["regular_price"]; ?>" + "x" + days + "nights");
					  $("#rrr").text("RM" + result);
						$("#qq").text("Discount");
						$("#qqq").text("<?php echo $hsd["discount"]; ?>%");
						$("#ss").text("Total");
						$("#sss").text("RM" + discount);
						  $("#TextBox4").val(discount);

    }
});
</script>
<script>
 $(function() {
//twitter bootstrap script
	$("button#submit").click(function(){
		   	$.ajax({
    		   	type: "POST",
			url: "process.php",
			data: $('form.contact').serialize(),
        		success: function(msg){
 	          		  $("#thanks").html(msg)
							 location.href = "status.php"
 		        	$("#myModal").modal('hide');
 		        },
			error: function(){
				alert("failure");
				}
      			});
	});
});
</script>


</body>

</html>
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>
