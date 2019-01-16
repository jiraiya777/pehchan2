<!DOCTYPE html>
<html lang="en">
<head>
  <title>PERMANENT DONORS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="style11.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
    width: 80%;
    margin: auto;
  }
  </style>
</head>
<body>
    
  <?php
include 'Siteheader.php';
?>

 <!-------------IIT Ropar Donors------------------->

          <br>

          <div class="container">
            
            <div class="demo222" align="center">
          <h2>OUR PERMANENT DONORS</h2>
          </div>
        </div>
          <hr>



          <?php
          require("db.php");
          $sqll="SELECT * FROM permanentDonors ORDER BY id DESC LIMIT 0, 1";

          $result = mysqli_query($conn,$sqll);

          $highest_id=0;
          while ($row = mysqli_fetch_row($result))
          $highest_id = $row[0];

          //echo "HIGHEST ID: ".$highest_id."<br/";
          $ind=0;
          $lmtpermDnr=0;
          $namepermDnr = array(); // make a new array to hold all your data
          $emailpermDnr=array();

          for ($index=1; $index <=$highest_id; $index++)
            {
              $sql="SELECT * FROM permanentDonors WHERE id='$index' ";
              $result=mysqli_query($conn,$sql);
              if (mysqli_num_rows($result)>0)
              {
               $row = mysqli_fetch_row($result);
               $namepermDnr[$ind] = $row[1];     // 0 for id , 1 for story
               $emailpermDnr[$ind]=$row[2];

               $ind++;
              }
              $lmtpermDnr=$ind ;
                     
            }

            for($x=0; $x<$lmtpermDnr;$x++)
            {


              echo'<div class="container">';

                echo'<div align="center">'.
                  '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<img  src="images.jpg" rel="person" class="img-responsive" style="width:140px; height:140px;">'.
                    '<h5 ><b>'.$namepermDnr[$x].'</b></h5>'.
                    '<h5 >'.$emailpermDnr[$x].'</h5>'.
                  '</div>'.
                  '</div>';


                if (++$x < $lmtpermDnr)   
                {
                  echo
                  '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<img  src="images.jpg" rel="person" class="img-responsive" style="width:140px; height:140px;">'.
                    '<h5 ><b>'.$namepermDnr[$x].'</b></h5>'.
                    '<h5 >'.$emailpermDnr[$x].'</h5>'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }

                if (++$x < $lmtpermDnr)   
                {
                  echo
                  '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<img  src="images.jpg" rel="person" class="img-responsive" style="width:140px; height:140px;">'.
                    '<h5 ><b>'.$namepermDnr[$x].'</b></h5>'.
                    '<h5 >'.$emailpermDnr[$x].'</h5>'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }

                if (++$x < $lmtpermDnr)   
                {
                  echo
                  '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<img  src="images.jpg" rel="person" class="img-responsive" style="width:140px; height:140px;">'.
                    '<h5 ><b>'.$namepermDnr[$x].'</b></h5>'.
                    '<h5 >'.$emailpermDnr[$x].'</h5>'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }
                  
                  

              echo'  </div>   

              </div>

                <br>';
            }

                    mysqli_close($conn);
            ?>
          </div>
        </div>
        <br>
        <div id="line"></div>



            <!------------------------IIT Ropar Donors------------->