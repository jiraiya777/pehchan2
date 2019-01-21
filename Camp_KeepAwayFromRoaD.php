<!DOCTYPE html>
<html lang="en">
<head>
  <title>Campaign Keep away from road</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="style11.css">
          <link rel="icon" href="Pehchan Logo.jpg" sizes="32x32">
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

<div class="container">
    <h2 id="demo333">Keep away from road</h2>
    
     
    
    <br>
    <p>
            The jhuggi-houses of the children are situated just by the main road leading
             to the IIT main campus. The students and their families regularly use this main
              road for everyday purposes including household activities and as a playground, neglecting
               the fact that high speed vehicles pass through the road frequently. Keeping in mind the safety
                of the families, we in pehchan group  make cycle trips on that road and spread awareness 
                among them about their safety with the help of videos demonstrations. We try to sensitize
                 them towards their own
             and their family's safety, so that they use the road appropriately.
    </p>
    
    <div class="container-fluid" style="margin-top:35px;">
             
            <div class="row" style="background-color: skyblue; padding-top:15px; ">
                
              <div class="col-lg-5 col-md-8 col-sm-10 col-xs-12">
                  <div class="thumbnail">
                      <a href="images/keepawayfromroad2.jpg" target="_blank">
                        <img src="images/keepawayfromroad2.jpg" alt="poor" style="width:100%; height:300px;" >
                     
                      </a>
                    </div>
                  </div>


                  
                  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                  <div class="col-lg-5 col-md-8 col-sm-10 col-xs-12">
                    <div class="thumbnail">
                      <a href="images/keepawayfromroad1.jpg" target="_blank">
                        <img src="images/keepawayfromroad1.jpg" alt="Nature" style="width:100%; height:300px;">
                       
                      </a>
                    </div>
                  </div>
                
              
            
        </div>
    </div>
    <br>
    </div>
        <br>
<div class="container" align="center">

<h3><strong>Here is video of our Project:</strong></h3>
<hr>
<?php

require("db.php");
$imgVid = array();
$sql="SELECT * FROM camp_keep_away";
$flag=0;
$result=mysqli_query($conn,$sql);
              if (mysqli_num_rows($result)>0)
              {
               $row = mysqli_fetch_row($result);
               $imgVid[0] = $row[1];
               $flag=1;
              }
              $x=0;
if($flag==1)
{
echo 
'<iframe width="100%" height="315"
src="'.$imgVid[0].'">
</iframe>';
}

else
{
  echo "Video will be uploaded soon";
}
mysqli_close($conn);

?>
</div>

<hr>
<br>
        
        
    <?php
include 'Footer.php';
?>


</body>
</html>
