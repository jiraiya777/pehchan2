<!DOCTYPE html>
<html lang="en">
<head>
  <title>Campaign Samajhiye</title>
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
    <h2 id="demo333">Samajhiye</h2>
    
    <h3 style="color:red;">Objective: To Create awareness Among parents </h3>
    <h3 style="color:red;">Date of starting : September  2017</h3>
    <h3 style="color:red;">Status: Running </h3>
    <h3 style="color:red;">People involved : Pehchaan volunteers and Advisors</h3>
    <h3 style="color:red">Area: Near main gate IIT Ropar</h3>
     
    
    <br>
    <p>
            We conduct meetings with the parents/guardians of the children at regular
             intervals wherein we make the parents/guardians aware of their children's performance
              individually, giving a scope of improvement to the children. Through these meetings, the
               parents get involved in our group activities, get a sense of familiarity with the group
                and are motivated to send their children to attend their lessens regularly.
                 To the guardians also we impart basic knowledge about importance of hygiene, regular school 
                 and their role in their kids' education in these meetings. The meetings help us to listen
                  to their problems and find a solution to any problem hindering their children's' studies
                   as well as affecting their health. Information about the students' performance in school 
                   as well as their attendance(which we get to know from the auto
             driver we arranged for them) is also discussed in these meetings.
    </p>
    
    <div class="container-fluid" style="margin-top:35px;">
        
            <div class="row" style="background-color:skyblue; padding-top:15px;">
              <div class="col-lg-5 col-md-8 col-sm-10 col-xs-12">
                  <div class="thumbnail">
                      <a href="images/Camp_Samjhawa1.jpg" target="_blank">
                        <img src="images/Camp_Samjhawa1.jpg" alt="poor" style="width:100%; height:300px;" >
                     
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                  <div class="col-lg-5 col-md-8 col-sm-10 col-xs-12">
                    <div class="thumbnail">
                      <a href="images/Camp_Samjhawa2.jpg" target="_blank">
                        <img src="images/Capm_Samjhawa2.jpg" alt="Nature" style="width:100%; height:300px;">
                       
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
$sql="SELECT * FROM camp_samajhiye";
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
