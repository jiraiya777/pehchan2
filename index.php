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
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="banner.jpg" alt="poor children" width="460" height="345">
        <div class="carousel-caption">
          <h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div>
      </div>

      <div class="item">
        <img src="banner.jpg" alt="poor children" width="460" height="345">
        <div class="carousel-caption">
          <h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div>
      </div>
    
      <div class="item">
        <img src="banner_Simplygiving header image_v3.jpg" alt="poor children" width="460" height="345">
        <div class="carousel-caption">
          <h3>Flowers</h3>
          <p>Beautiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>

      <div class="item">
        <img src="banner_Simplygiving header image_v3.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Flowers</h3>
          <p>Beautiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>
  
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
<div class="container" style="margin-top:35px;">
  <div class="row">
    <div class="col-xs-8 col-sm-8 col-lg-8 col-md-8 ">
      <h1 id="demo111">About Pehchaan Ek Safar</h1>
      <p>
        Smile Foundation is an NGO in India directly benefitting over 600,000 children and their
         families every year, through more than 250 live welfare projects on education, healthcare, 
         livelihood and women empowerment, in over 950 remote villages and slums across 25 states 
         of India.
      </p>
      <p>
        Education is both the means as well as the end to a better life: the means because 
        it empowers an individual to earn his/her livelihood and the end because it increases
         one's awareness on a range of issues – from healthcare to appropriate social behaviour
          to understanding one's rights – and in the process help him/her evolve as a better citizen.
      </p>
      <p>
        Doubtless, education is the most powerful catalyst for social transformation. But 
        child education cannot be done in isolation. A child will go to school only if the 
        family, particularly the mother, is assured of healthcare and empowered. Moreover, when 
        an elder sibling is relevantly skilled to be employable and begins earning, the journey 
        of empowerment continues beyond the present generation.
      </p>
       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Read more</button>

  
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Hdr</h4>
            </div>
            <div class="modal-body">
              <p>Smile Foundation is an NGO in India directly benefitting over 600,000
                  children and their families every year, through more than 250 live welfare 
                  projects on education, healthcare, livelihood and women empowerment, in over
                   950 remote villages and slums across 25 states of India.</p>

                  <p>Education is both the means as well as the end to a better life:
                     the means because it empowers an individual to earn his/her livelihood
                      and the end because it increases one's awareness on a range of 
                      issues – from healthcare to appropriate social behaviour to understanding 
                      one's rights – and in the process help him/her evolve as a better citizen.</p>
                  
                 <p> Doubtless, education is the most powerful catalyst for social transformation.
                    But child education cannot be done in isolation. A child will go to school only 
                    if the family, particularly the mother, is assured of healthcare and empowered. 
                    Moreover, when an elder sibling is relevantly skilled to be employable and begins
                     earning, the journey of empowerment continues beyond the present generation.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
      
    </div>
    <div class="col-xs-4 col-sm-4 col-lg-4 col-md-4 ">
        <div class="goat">

          <div class="panel panel-default">
                <h2 class="panel-heading">>Story of Day</h2>
                <ul>
                  <?php
                    require("db.php");
                   /* $sql = "SELECT * FROM story_of_day";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result)>0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<li>'.$row['story'].'</li>';
                        }
                    } else {
                        echo "<li>no story!</li>";
                    }*/
                    $SQLCommand = "SELECT *  FROM story_of_day";

                    $result = mysqli_query($conn,$SQLCommand); // This line executes the MySQL query that you typed above

                    $yourArray = array(); // make a new array to hold all your data


                    $index = 0;
                    while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
                         $yourArray[$index] = $row;
                         $index++;
                    }

                    echo $yourArray[2]['date'];
                    mysqli_close($conn);
                   ?>
                </ul>
          </div>
      
        </div>
      </div>
  </div>
</div>
<div class="container" style="margin-top:35px;">
    <h2 id="demo111">Events and Updates</h2>
    <div class="row" style="background-color: lightblue">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <div class="thumbnail">
              <a href="#" target="_blank">
                <img src="banner.jpg" alt="poor" style="width:100%; height:250px;" >
                <div class="caption">
                  <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="thumbnail">
              <a href="#" target="_blank">
                <img src="banner_Simplygiving header image_v3.jpg" alt="Nature" style="width:100%; height:250px;">
                <div class="caption">
                  <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="thumbnail">
              <a href="#" target="_blank">
                <img src="pDTsDZTenjqGYJq-800x450-noPad.jpg" alt="Fjords" style="width:100%; height:250px;">
                <div class="caption">
                  <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                </div>
              </a>
            </div>
          </div>
      
    
</div>
</div>


</body>
</html>

<style>
  .yo{
    background-color: blue;
  }
</style>
