<!DOCTYPE html>
<html lang="en">
<head>
  <title>Campaign Jhuggi Pathshala</title>
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
    <h2 id="demo333">Jhuggi Pathshala</h2>
    
    <h3 style="color:darkgoldenrod;">Objective: To build a small Pathshala For teaching purpose </h3>
    <h3 style="color:darkgoldenrod;">Date of starting :15 Nov 2018</h3>
    <h3 style="color:darkgoldenrod;">Status: Compleat and functioning </h3>
    <h3 style="color:darkgoldenrod;">People involved : Kids Parents, Pehchaan volunteers</h3>
    <h3 style="color:darkgoldenrod;">Area: Opposite side of road near main gate IIT Ropar</h3>
     
    
    <br>
    <p>
            We had been conducting classes for the children in an open area. We could not
             continue there because of the winters. Therefore with the help of the parents of
              the children involved, we built a jhuggi near the main campus of IIT where the children
               can be given their lessens. The jhuggi is built on the land of Mr. Ranveer
                Rana who generously gave a piece of his land for the good work. The volunteerism
                 shown by the parents was appreciable and showed their positiveness towards our group. 
                 Their unified work also showed our successful attempt at making them understand the 
                 importance of education for their children and that limited resources cannot restrict 
                 them. We used whatever possible means to achieve our motive of building them a better
                  place of education. We used waste material from the IIT construction site for this
                   purpose. We were also helped by
             CMO in charge who donated 100 bricks and sand for the base of the place.
    </p>
    
    <div class="container-fluid" style="margin-top:35px;">
        
            <div class="row" style="background-color:skyblue; padding-top:15px;">
              <div class="col-lg-4 col-md-8 col-sm-10 col-xs-12">
                  <div class="thumbnail">
                      <a href="images/camp_jhughi2 .jpg" target="_blank">
                        <img src="images/camp_jhughi2 .jpg" alt="poor" style="width:100%; height:250px;" >
                      
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-8 col-sm-10 col-xs-12">
                    <div class="thumbnail">
                      <a href="images/Camp_jhughi333.jpg" target="_blank">
                        <img src="images/Camp_jhughi333.jpg" alt="Nature" style="width:100%; height:250px;">
                        
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-8 col-sm-10 col-xs-12">
                    <div class="thumbnail">
                      <a href="images/camp_Jhughi1.jpg" target="_blank">
                        <img src="images/camp_Jhughi1.jpg" alt="Fjords" style="width:100%; height:250px;">
                        
                      </a>
                    </div>
                  </div>


                  
              
            
        </div>
    </div>
    <br>
    </div>
        
<div class="container" align="center">

<h3><strong>Here is video of our Project:</strong></h3>
<hr>
<?php

require("db.php");
$imgVid = array();
$sql="SELECT * FROM camp_jhuggi";
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
