<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
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


<div class="container-fluid">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

       <?php
          require("db.php");
          $sqll="SELECT * FROM home_carousal ORDER BY id DESC LIMIT 0, 1";
          $highest_id =0;

          $result = mysqli_query($conn,$sqll);
          while ($row = mysqli_fetch_row($result))
          $highest_id = $row[0];

          //echo "HIGHEST ID: ".$highest_id."<br/";
          $ind=0;
          $lmtHome_car=0;
          $imgHome_car=array();

          for ($index=1; $index <=$highest_id; $index++)
            {
              $sql="SELECT * FROM home_carousal WHERE id='$index' ";
              $result=mysqli_query($conn,$sql);
              if (mysqli_num_rows($result)>0)
              {
               $row = mysqli_fetch_row($result);     
               $imgHome_car[$ind]=$row[1];

               $ind++;
              }
              $lmtHome_car=$ind ;
                     
            }

            for($x=0; $x<$lmtHome_car;$x++)
            {

              if ($x==0 )
              {
             echo ' <div class="item active">
                <img src="'.$imgHome_car[$x].'" alt="poor children" width="460" height="345" >
                
              </div>';
            }

            else
            {
              echo '<div class="item">
        <img src="'.$imgHome_car[$x].'" alt="poor children" width="460" height="345">

      </div>';
            }
          }

                    mysqli_close($conn);
            ?>  
    
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>







<br>
<br>

<!--
<a class="iframeLink" href="fee4thsem.pdf"
   jQuery1640737952376988841="85"> ANY DOCUMENT </a>

 -->




<div class="container" style="margin-top:35px;">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-8 col-md-8 ">
      <h1 id="demo333">Pehchaan Ek Safar</h1>

      <p>India has more than 50% of its population below 25 years of age. It is going to be a global workforce in near future. India’s development lies in cashing this opportunity... ‘now or never’! However only 74.3% Indians are literate, let alone them being properly educated! That means 25% of the population relies on others to fill their forms, count their salaries and take their decisions!

      </p>
      <p>We, the highly motivated and enthusiastic students of IIT Ropar (around 40) are active as a social service group  (a registered NGO) under the name PEHCHAAN EK SAFAR (Search for an identity). We have been working for the education of under privileged children around IIT Ropar permanent campus.  The workforce at Pehchaan Ek Safar feels the need to be at the forefront battle against illiteracy. We feel the need to inculcate rational mindset and scientific temper amongst citizens, and strive to accomplish this.
      </p>
      <p>We believe its youth’s responsibility to provide a bridge to connect the local socio-economically backward and underprivileged children to the rest of the world. A child will go to school only if the family is assured of healthcare and empowered. Realizing this, we are creating awareness among the parents of these kids about child education. We are trying to contribute to build up educational stability in the country where all the kids can have access to education, health care and a better living standard.
      </p>

      <p>"We cannot all do great things, but we can do small things with great love"
      </p>

      <p> Mother Teresa
      </p>

  

    </div>
    <div class="col-xs-12 col-sm-12 col-lg-4 col-md-4 ">
        <div class="goat">

          <div class="panel panel-default">
                <h4 class="panel-heading">>News and Announcements</h4>
                
                  <?php


   require("db.php");
          $sqll="SELECT * FROM news_and_annc ORDER BY id DESC LIMIT 0, 1";

          $result = mysqli_query($conn,$sqll);
          $highest_id =0;

          while ($row = mysqli_fetch_row($result))
          $highest_id = $row[0];

          //echo "HIGHEST ID: ".$highest_id."<br/";
          $ind=0;
          $lmt=0;
          $dataRp=array();
          $docRp=array();

          for ($index=1; $index <=$highest_id; $index++)
            {
              $sql="SELECT * FROM news_and_annc WHERE id='$index' ";
              $result=mysqli_query($conn,$sql);
              if (mysqli_num_rows($result)>0)
              {
               $row = mysqli_fetch_row($result);
               $dataRp[$ind]=$row[1];
               $docRp[$ind]=$row[2];

               $ind++;
              }
              $lmt=$ind ;
                     
            }
            $y=0;
            for($x=($lmt-1); $x>=0;$x--)
            {
              $y++;
             echo "\t\t".'<a href='.$docRp[$x].'  target="_blank"> <h4>'.$dataRp[$x].'</h4></a>';
             if($y==5)
             {
              break;
             }

            }



                  /*
                    require("db.php");
                   /* $sql = "SELECT * FROM story_of_day";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result)>0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<li>'.$row['story'].'</li>';
                        }
                    } else {
                        echo "<li>no story!</li>";
                    }
                    $SQLCommand = "SELECT *  FROM news_and_annc";

                    $result = mysqli_query($conn,$SQLCommand); // This line executes the MySQL query that you typed above

                    $yourArray = array(); // make a new array to hold all your data


                    $index = 0;
                    while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
                         $yourArray[$index] = $row;
                         $index++;
                    }

                    echo $yourArray[2]['date'];
                    mysqli_close($conn);*/
                    mysqli_close($conn);
                   ?>
                
          </div>
      
        </div>
      </div>
  </div>
</div>

<br>
<hr>
<div class="container">

<iframe width="100%" height="315"
src="https://www.youtube.com/embed/Uv3gRESVDVI">
</iframe>

</div>

<br>
<hr>
<div class="container" style="margin-top:35px;">
    <h2 id="demo333">Events and Updates</h2>
    <div class="row" style="background-color: ">
<?php
          require("db.php");
          $sqll="SELECT * FROM events_and_up ORDER BY id DESC LIMIT 0, 1";

          $result = mysqli_query($conn,$sqll);
          $highest_id =0;

          while ($row = mysqli_fetch_row($result))
          $highest_id = $row[0];

          //echo "HIGHEST ID: ".$highest_id."<br/";
          $ind=0;
          $lmt=0;
          $imgRp = array(); // make a new array to hold all your data
          $dataRp=array();
          $docRp=array();

          for ($index=1; $index <=$highest_id; $index++)
            {
              $sql="SELECT * FROM events_and_up WHERE id='$index' ";
              $result=mysqli_query($conn,$sql);
              if (mysqli_num_rows($result)>0)
              {
               $row = mysqli_fetch_row($result);
               $imgRp[$ind] = $row[1];     // 0 for id , 1 for story
               $dataRp[$ind]=$row[2];
               $docRp[$ind]=$row[3];

               $ind++;
              }
              $lmt=$ind ;
                     
            }

                    for($x=0; $x<$lmt;$x=$x+10000){

echo '<div class="event_border">'.
'<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">'.
'<div class="Pimg">'.
                        '<div class="block3" align="center">
           <a href='.$docRp[$x].' target="_blank"> <div class="block3"><img src="'.$imgRp[$x].'" height="200" width="200px" alt="Avatar"></div>'.
           '<h4>'.$dataRp[$x].'</h4>'.'</div></a>'.

            
           
            '</div>'.'</div>'.'</div>';
          if (++$x < $lmt)   
            {
              
echo '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">'.
'<div class="Pimg">'.
                        '<div class="block3" align="center">
           <a href='.$docRp[$x].' target="_blank"> <div class="block3"><img src="'.$imgRp[$x].'" height="200" width="200" alt="Avatar" ></div>'.
           '<h4>'.$dataRp[$x].'</h4>'.'</div></a>'.

            
           
            '</div>'.'</div>';
          }
          else
          {
            break;
          }

          if (++$x < $lmt)   
            {
              
echo '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">'.
'<div class="Pimg">'.
                        '<div class="block3" align="center">
           <a href='.$docRp[$x].' target="_blank"> <div class="block3"><img src="'.$imgRp[$x].'" height="200" width="200" alt="Avatar" ></div>'.
           '<h4>'.$dataRp[$x].'</h4>'.'</div></a>'.

            
           
            '</div>'.'</div>';
          }
          else
          {
            break;
          }



}
mysqli_close($conn);
?>



      
    
</div>
</div>
<hr>

    <?php
include 'Footer.php';
?>
</body>
</html>

<style>
  .yo{
    background-color: blue;
  }
</style>
