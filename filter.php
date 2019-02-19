<?php
 //filter.php

      $connect = mysqli_connect("localhost", "root", "", "homestayku.my");
      $output = '';
      $query = "
           SELECT  * FROM homestay join homestay_gallery on homestay.id = homestay_gallery.homestay_id
           WHERE  (homestay.homestay_name LIKE '%".$_POST["search_homestay"]."%' AND (homestay.ssales_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'))
      group by (homestay.id)
      ";

      $query2 = "
           SELECT  * FROM homestay join homestay_gallery on homestay.id = homestay_gallery.homestay_id
           WHERE  homestay.homestay_name LIKE '%".$_POST["search_homestay"]."%'
      group by (homestay.id)
      ";

      $query3 = "
           SELECT  * FROM homestay join homestay_gallery on homestay.id = homestay_gallery.homestay_id
           WHERE homestay.ssales_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'
      group by (homestay.id)
      ";


if(isset($_POST['search_homestay']))
{
      $result = mysqli_query($connect, $query2);

      if(mysqli_num_rows($result) > 0)
      {
           while($row = mysqli_fetch_array($result))
           {
                $output .= '
                <div class="col-md-4">
                    <div class="panel panel-default card-background animated slideInRight" style="height:240px;">
                     <div class="corner-ribbon top-right sticky blue shadow">'.  $row["discount"] .'% Discount </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="uploads/'. $row["album"] .'" class="img-responsive">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card"><b>'. $row["homestay_name"] .'</b></h5>
                                    <p class="card text-left" style="font-size: 12px;">Address: '. $row["homestay_address"] .'</p>
                                     <p class="card text-left" style="font-size: 12px;"><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i></p>
                                    <a class="btn btn-primary btn-sm" href="homestaydetail.php?id='. $row["id"] .'">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        Book</a>
                                    <a class="btn btn-success btn-sm" href="location.php?id='. $row["id"] .'">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Get Location</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                ';


           }
      }
      else
      {
           $output .= '
           <img class="animated infinite bounce" src="images/robot.png" width="200" height="200">
                <center><h3> Your current search is not available! </h3> </center><br>
                <center><span>Please try search again</span></center>
           ';
      }
      echo $output;
    }
    elseif (isset($_POST['from_date']) && isset($_POST['to_date']))
    {
          $result = mysqli_query($connect, $query3);

          if(mysqli_num_rows($result) > 0)
          {
               while($row = mysqli_fetch_array($result))
               {
                    $output .= '
                    <div class="col-md-4">
                        <div class="panel panel-default card-background animated slideInRight" style="height:240px;">
                         <div class="corner-ribbon top-right sticky blue shadow">'.  $row["discount"] .'% Discount </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="uploads/'. $row["album"] .'" class="img-responsive">
                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="card"><b>'. $row["homestay_name"] .'</b></h5>
                                        <p class="card text-left" style="font-size: 12px;">Address: '. $row["homestay_address"] .'</p>
                                         <p class="card text-left" style="font-size: 12px;"><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i></p>
                                        <a class="btn btn-primary btn-sm" href="homestaydetail.php?id='. $row["id"] .'">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            Book</a>
                                        <a class="btn btn-success btn-sm" href="location.php?id='. $row["id"] .'">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            Get Location</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    ';


               }
          }
          else
          {
               $output .= '
               <img class="animated infinite bounce" src="images/robot.png" width="200" height="200">
                    <center><h3> Your current search is not available! </h3> </center><br>
                    <center><span>Please try search again</span></center>
               ';
          }
          echo $output;
        }
        elseif (isset($_POST['homestay_name']) && isset($_POST['from_date']) && isset($_POST['to_date']))
        {
              $result = mysqli_query($connect, $query);

              if(mysqli_num_rows($result) > 0)
              {
                   while($row = mysqli_fetch_array($result))
                   {
                        $output .= '
                        <div class="col-md-4">
                            <div class="panel panel-default card-background animated slideInRight" style="height:240px;">
                             <div class="corner-ribbon top-right sticky blue shadow">'.  $row["discount"] .'% Discount </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="uploads/'. $row["album"] .'" class="img-responsive">
                                        </div>
                                        <div class="col-md-8">
                                            <h5 class="card"><b>'. $row["homestay_name"] .'</b></h5>
                                            <p class="card text-left" style="font-size: 12px;">Address: '. $row["homestay_address"] .'</p>
                                             <p class="card text-left" style="font-size: 12px;"><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i></p>
                                            <a class="btn btn-primary btn-sm" href="homestaydetail.php?id='. $row["id"] .'">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                Book</a>
                                            <a class="btn btn-success btn-sm" href="location.php?id='. $row["id"] .'">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                Get Location</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        ';


                   }
              }
              else
              {
                   $output .= '
                   <img class="animated infinite bounce" src="images/robot.png" width="200" height="200">
                        <center><h3> Your current search is not available! </h3> </center><br>
                        <center><span>Please try search again</span></center>
                   ';
              }
              echo $output;
            }
            else {
            echo  '
              <img class="animated infinite bounce" src="images/robot.png" width="200" height="200">
                   <center><h3> Your current search is not available! </h3> </center><br>
                   <center><span>Please try search again</span></center>
              ';
            }


 ?>
