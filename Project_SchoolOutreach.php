<!DOCTYPE html>
<html lang="en">
<head>
  <title>Project School outreach in ropar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="style11.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="icon" href="Pehchan Logo.jpg" sizes="32x32">
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
    <h2 id="demo333">School outreach in ropar</h2>
    <h3 style="color:purple;">Objective: To Contribute towards Quality Education</h3>
    <h3 style="color:purple;">Status: To be start </h3>
    <h3 style="color:purple;">
            People involved : Pehchaan volunteers ,Schools of Ropar city,DIstrict education Administration
            </h3>
    <h3 style="color:purple;">
            Program Date: January 2019
    </h3>
    <h3 style="color:purple;">Area: Ropar City:</h3>
    <br>
    <p> 
            We are planning to conduct a series of events including workshops, fun-lectures, 
            lab demonstrations and open outdoor sessions for children enrolled in selected schools 
            of Ropar. The schools selected will be both governmental and private. Through our sessions,
             we intend to promote quality education for everyone, spread awareness about Higher education 
             and promote the activities of our group.

    </p>

   
    
    <div class="row">
            <div class="col-md-3 col-sm-3 col-lg-3 col-xs-3">

            </div>
            <div class="col-md-8 col-sm-10 col-lg-6 col-xs-12">
              <div class="thumbnail">
                <a href="images/abhyas1.jpg" target="_blank">
                  <img src="images/abhyas1.jpg" alt="Lights" style="width:100%">
                 
                </a>
              </div>
            </div>
          
    </div>

    <p> The IIT volunteers who will conduct these sessions
            may or may not be members of our group, thus providing non-members a platform to contribute
             towards this initiative. We will also try to arrange visits for 11th and 12th standard
              students to other IITs 
          wherein they can get a chance to explore more in areas regarding education.</p>
<div class="row">
        <div class="col-md-3 col-sm-3 col-lg-3 col-xs-3">

        </div>
        <div class="col-md-8 col-sm-10 col-lg-6 col-xs-12">
          <div class="thumbnail">
            <a href="images/IITvisit-convocation1.jpg" target="_blank">
              <img src="images/IITvisit-convocation1.jpg" alt="Lights" style="width:100%">
           
            </a>
          </div>
        </div>
      
</div>

</div>

<br>
<div class="container" align="center">

<h3><strong>Here is video of our Project:</strong></h3>
<hr>
<?php

require("db.php");
$imgVid = array();
$sql="SELECT * FROM proj_scl_out ";
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
