<!DOCTYPE html>
<html lang="en">
<head>
  <title>Project   School Chale Hum</title>
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
    <h2 id="demo333"> School Chale Hum</h2>
    <h3 style="color:red;">Objective: To overcome the hurdles in sending children to school</h3>
    <h3 style="color:red;">
            Program Date: 15 April 2018 till present
    </h3>
    <br>
    <p> 
            This program focus to explore children who do not have admission in any school
             and give them exposure to the present day education. The present day obstacles that
              are observed to be making children get isolated from education are the region they
               live in, income of their
             parents, security issues for girls during transportation.

    </p>

    <p>
            It is beneficial for the people involved in agriculture to have their house 
            nearby which is creating the transportation issue. From the survey conducted by the Pehchaan 
            volunteers it is observed to be the major issue making children far from education. 
            The nearest school in the area where this children along with their parents live is 5 km far.
             The only economic way is to hire an auto which takes children to school and brings back. In this
              process two autos where hired by Pehchaan team and the cost of Rs.12,000 is paid from the funds
               received by Pehchaan.
             Also the auto drivers are contacted frequently to ensure safe drive.   
    </p>
    
    <div class="row">
            <div class="col-md-0 col-sm-0 col-lg-2 col-xs-0">

            </div>
            <div class="col-md-8 col-sm-10 col-lg-8 col-xs-12">
              <div class="thumbnail">
                <a href="images/SchoolChaleHum3.jpg" target="_blank">
                  <img src="images/SchoolChaleHum3.jpg" alt="Lights" style="width:100%; height: 300px;">
                  
                </a>
              </div>
            </div>
          
    </div>
<p>
        As the transportation issue is solved by the above initiative, the Pehchaan
         team focused on sending children to nearby school. This initiative is headed by two Pehchaan
          volunteers namely Varsha and Ratnesh. They collected all the required documents from the 
          parents and submitted them to school named Haveli Kalan Government Primary School. 
          Thus 30 children were given admission into the school. This process involved many
           meetings of Pehchaan volunteers with parents of the children. There was prior help 
           from the school
         principal which added to our motivation in sending children to school. 
</p>
<div class="row">
        <div class="col-md-0 col-sm-0 col-lg-1 col-xs-0">

        </div> 
        <div class="col-md-8 col-sm-10 col-lg-5 col-xs-12">
            <div class="thumbnail">
                <a href="images/SchoolChaleHum2.jpg" target="_blank">
                  <img src="images/SchoolChaleHum2.jpg
                      " alt="Lights" style="width:100%; height: 400px;">
               
                </a>
              </div>
        </div>
        <div class="col-md-8 col-sm-10 col-lg-5 col-xs-12">
          <div class="thumbnail">
            <a href="images/project-schelhum777.jpg" target="_blank">
              <img src="images/project-schelhum777.jpg" alt="Lights" style="width:100%; height:400px ;">
             
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
$sql="SELECT * FROM proj_scl_chl_hum ";
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
