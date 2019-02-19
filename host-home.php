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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.1.0/jquery.simpleWeather.min.js'></script>
		       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
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
@font-face {
	font-family: 'weather';
     src: url('css/artill_clean_icons.otf');
		 font-weight: normal;
	 font-style: normal;
}

#myfirstchart {
  color: white;
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
#weather {
  margin: 0px auto;
  text-align: center;
  text-transform: uppercase;
}

#weather i {
  color: black;
  font-family: weather;
  font-size: 60px;
  font-weight: normal;
  font-style: normal;
  line-height: 1.0;
  text-transform: none;
}

.icon-0:before { content: ":"; }
.icon-1:before { content: "p"; }
.icon-2:before { content: "S"; }
.icon-3:before { content: "Q"; }
.icon-4:before { content: "S"; }
.icon-5:before { content: "W"; }
.icon-6:before { content: "W"; }
.icon-7:before { content: "W"; }
.icon-8:before { content: "W"; }
.icon-9:before { content: "I"; }
.icon-10:before { content: "W"; }
.icon-11:before { content: "I"; }
.icon-12:before { content: "I"; }
.icon-13:before { content: "I"; }
.icon-14:before { content: "I"; }
.icon-15:before { content: "W"; }
.icon-16:before { content: "I"; }
.icon-17:before { content: "W"; }
.icon-18:before { content: "U"; }
.icon-19:before { content: "Z"; }
.icon-20:before { content: "Z"; }
.icon-21:before { content: "Z"; }
.icon-22:before { content: "Z"; }
.icon-23:before { content: "Z"; }
.icon-24:before { content: "E"; }
.icon-25:before { content: "E"; }
.icon-26:before { content: "3"; }
.icon-27:before { content: "a"; }
.icon-28:before { content: "A"; }
.icon-29:before { content: "a"; }
.icon-30:before { content: "A"; }
.icon-31:before { content: "6"; }
.icon-32:before { content: "1"; }
.icon-33:before { content: "6"; }
.icon-34:before { content: "1"; }
.icon-35:before { content: "W"; }
.icon-36:before { content: "1"; }
.icon-37:before { content: "S"; }
.icon-38:before { content: "S"; }
.icon-39:before { content: "S"; }
.icon-40:before { content: "M"; }
.icon-41:before { content: "W"; }
.icon-42:before { content: "I"; }
.icon-43:before { content: "W"; }
.icon-44:before { content: "a"; }
.icon-45:before { content: "S"; }
.icon-46:before { content: "U"; }
.icon-47:before { content: "S"; }

#weather h2 {
  margin: 0 0 8px;
  color: black;
  font-size: 30px;
  font-weight: 300;
  text-align: center;
  text-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
}

#weather ul {
  margin: 0;
  padding: 0;
}

#weather li {
	background: #fff;
	background: rgba(230, 230, 230, 0.44);
	padding: 8px;
	display: inline-block;
	border-radius: 25px;
}

#weather .currently {
  margin: 0 20px;
}

.panel-bg {
	background-color: rgba(255, 255, 255, 0.68);
}

</style>

</head>

<body>

  <div class="background-blur"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-4 sidebar1">
                <div class="logo">
                    <div class="img img-responsive center-block"></div>
							</div>

                <br>
                <div class="left-navigation">
                    <ul class="list">
                        <h5><strong><?php echo $hd['name']; ?> (HOST)</strong></h5>
                        <h5><strong>DASHBOARD</strong></h5>
                        <li><a class="nav-li active" href="host-home.php"><i class="fa fa-user" aria-hidden="true"></i>   Home</a></li>
                        <li><a class="nav-li" href="host-homestay.php"><i class="fa fa-home" aria-hidden="true"></i>  Homestay</a></li>
                          <li><a class="nav-li" href="host-order.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Booking  <?php $a = $bn['no'];   if($a>0){echo '<span class="badge badge-danger badge-md">'; echo $bn['no']; echo '</span>';}else {echo "";} ?> </a> </li>
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
                     <div class="panel-heading panel-redpink header-title"><h4><b>HOME<b></h4></div>
                     <div class="panel-body">
											   <?php require_once 'templates/message.php';?>
                    <h3> Welcome back, <?php echo $hd['name']; ?> </h3>
                    <h5> Statistic Customer by Month </h5>
<div id="myfirstchart" style="height: 250px;"></div>
<div class="panel panel-default col-md-3 panel-bg">
    <div class="panel-body"><div id="weather"></div></div>
  </div>
                   </div>
                   </div>

                </div>
              </div>

</div>


    </div>


<script>
var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { month: '2014-01', a: 20, b: 30 },
            { month: '2014-02',  a: 40, b: 50},
            { month: '2014-03',  a: 10, b: 25 },
            { month: '2014-04',  a: 35, b: 21 },
            { month: '2014-05',  a: 41, b: 28 },
            { month: '2014-06',  a: 32, b: 42 },
            { month: '2014-07',  a: 38, b: 24 },
            { month: '2014-08',  a: 31, b: 36 },
            { month: '2014-09',  a: 20, b: 27 },
            { month: '2014-10',  a: 23, b: 34 },
            { month: '2014-11',  a: 10, b: 9 },
            { month: '2014-12',  a: 8, b: 15 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'month',
  // A list of names of data record attributes that contain y-values.
	ykeys: ['a', 'b'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  xLabelFormat: function (x) { return months[x.getMonth()]; },
  labels: ['Customer', 'Homestay a']
});
</script>
<script>
$(document).ready(function() {
  $.simpleWeather({
    location: '<?php echo $hd['address']; ?>',
    woeid: '',
    unit: 'c',
    success: function(weather) {
      html = '<h2 class="black animated bounce infinite"><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
			html += '<hr class="black">';
      html += '<ul><li class="black">'+weather.city+', '+weather.region+'</li>';
      html += '<li class="currently black">'+weather.currently+'</li>';
      html += '<li class="black">'+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</li></ul>';

      $("#weather").html(html);
    },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
    }
  });
});
</script>
</body>

</html>
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>
