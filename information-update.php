
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
    <!-- Bootstrap Core CSS -->

              <script type="text/javascript" src="moment.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">

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
body{ margin-top:30px; }

        .file-input-wrapper {
            height: 35px;
            overflow: hidden;
            position: absolute;
            width: 123px;
            background-color: #fff;
            cursor: pointer;
        }

        .file-input-wrapper > input[type="file"] {
            font-size: 40px;
            position: absolute;
            top: 0;
            right: 0;
            opacity: 0;
            cursor: pointer;
        }

</style>


</head>

<body>
  <div class="container">
  	<div class="row form-group">
          <div class="col-xs-12">
              <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                  <li class="active"><a href="#step-1">
                      <h4 class="list-group-item-heading">Step 1</h4>
                      <p class="list-group-item-text">Basic Information</p>
                  </a></li>
                  <li class="disabled"><a href="#step-2">
                      <h4 class="list-group-item-heading">Step 2</h4>
                      <p class="list-group-item-text">Second step description</p>
                  </a></li>
                  <li class="disabled"><a href="#step-3">
                      <h4 class="list-group-item-heading">Step 3</h4>
                      <p class="list-group-item-text">Third step description</p>
                  </a></li>

                  <li class="disabled"><a href="#step-4">
                      <h4 class="list-group-item-heading">Step 4</h4>
                      <p class="list-group-item-text">Second step description</p>
                  </a></li>

              </ul>
          </div>
  	</div>
      <div class="row setup-content" id="step-1">
          <div class="col-xs-12">
              <div class="col-md-12 well text-center">
                  <h1> STEP 1</h1>

  <form>
  <div class="container">

  </div>
  </form>


                  <button id="activate-step-2" class="btn btn-primary btn-md">Activate Step 2</button>
              </div>
          </div>
      </div>
      <div class="row setup-content" id="step-2">
          <div class="col-xs-12">
              <div class="col-md-12 well text-center">
                  <h1 class="text-center"> STEP 2</h1>

      <div class="container">

            <div class="row">
              <div class="col-lg-12">
                 <form class="well" action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="file">Select a file to upload</label>
                      <input type="file" name="file">
                      <p class="help-block">Only jpg,jpeg,png and gif file with maximum size of 1 MB is allowed.</p>
                    </div>
                    <input type="submit" class="btn btn-lg btn-primary" value="Upload">
                  </form>
              </div>
            </div>
      </div>
      <!-- /container -->




                  <button id="activate-step-3" class="btn btn-primary btn-md">Activate Step 3</button>
              </div>
          </div>
      </div>
      <div class="row setup-content" id="step-3">
          <div class="col-xs-12">
              <div class="col-md-12 well text-center">
                  <h1 class="text-center"> STEP 3</h1>

  <form></form>

                  <button id="activate-step-4" class="btn btn-primary btn-md">Activate Step 4</button>
              </div>
          </div>
      </div>

      <div class="row setup-content" id="step-4">
          <div class="col-xs-12">
              <div class="col-md-12 well text-center">
                  <h1 class="text-center"> STEP 4</h1>

  <form></form>

              </div>
          </div>
      </div>

  </div>
  <script>

  // Activate Next Step

  $(document).ready(function() {

      var navListItems = $('ul.setup-panel li a'),
          allWells = $('.setup-content');

      allWells.hide();

      navListItems.click(function(e)
      {
          e.preventDefault();
          var $target = $($(this).attr('href')),
              $item = $(this).closest('li');

          if (!$item.hasClass('disabled')) {
              navListItems.closest('li').removeClass('active');
              $item.addClass('active');
              allWells.hide();
              $target.show();
          }
      });

      $('ul.setup-panel li.active a').trigger('click');

      // DEMO ONLY //
      $('#activate-step-2').on('click', function(e) {
          $('ul.setup-panel li:eq(1)').removeClass('disabled');
          $('ul.setup-panel li a[href="#step-2"]').trigger('click');
          $(this).remove();
      })

      $('#activate-step-3').on('click', function(e) {
          $('ul.setup-panel li:eq(2)').removeClass('disabled');
          $('ul.setup-panel li a[href="#step-3"]').trigger('click');
          $(this).remove();
      })

      $('#activate-step-4').on('click', function(e) {
          $('ul.setup-panel li:eq(3)').removeClass('disabled');
          $('ul.setup-panel li a[href="#step-4"]').trigger('click');
          $(this).remove();
      })

      $('#activate-step-3').on('click', function(e) {
          $('ul.setup-panel li:eq(2)').removeClass('disabled');
          $('ul.setup-panel li a[href="#step-3"]').trigger('click');
          $(this).remove();
      })
  });


  // Add , Dlelete row dynamically

       $(document).ready(function(){
        var i=1;
       $("#add_row").click(function(){
        $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='sur"+i+"' type='text' placeholder='Surname'  class='form-control input-md'></td><td><input  name='email"+i+"' type='text' placeholder='Email'  class='form-control input-md'></td>");

        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
        i++;
    });
       $("#delete_row").click(function(){
      	 if(i>1){
  		 $("#addr"+(i-1)).html('');
  		 i--;
  		 }
  	 });

  });


  </script>
</body>

</html>
