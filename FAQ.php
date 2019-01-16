<!DOCTYPE html>
<html>
<head>  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet"  href="FAQstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="javascript.js"></script>
    <title>FAQ</title>
</head>
<body>

  <?php
include 'Siteheader.php';
?>
   

    <section id="main">
            <div class="container">

            <h1>General FAQ</h1>
            
        </div>
        </section>
    <div class="container">
        <div class="my-list" >
        <ul >
          <a href="./index.php"  target="_blank">
            <div class="cam1" style="cursor: pointer;">
             <mfs>Helloo desdsf skngjsdgjs lnjdgnjfdkbl;sdjlfefsfs</mfs>
            <img onclick="myFunction()" src="7.jpg" alt="Smiley face" height="25" width="30"  style="cursor: pointer;" >
            </div></a>
            <div class="cam2" style="cursor: pointer;">
                <mfs>Helloo desdsf sefsfs </mfs>       
              <img onclick="myFunction()" src="6.jpg" alt="Smiley face" height="30" width="30" style="cursor: pointer;">
              <br>jkvdsgskafk;gdajfkdjhkdldbsh sdj f sdfds g g dsg syef sfesf res f dsfdsf ds  ssd gdgsddsg
            </div>
            <br>

              <div class="cam3" style="cursor: pointer;">
             <mfs>Helloo desdsf sefsfs</mfs>
            <img onclick="myFunction()" src="7.jpg" alt="Smiley face" height="25" width="30" style="cursor: pointer;">
            </div>
            <div class="cam4" style="cursor: pointer;">
                <mfs>Helloo desdsf sefsfs </mfs>       
              <img onclick="myFunction()" src="6.jpg" alt="Smiley face" height="30" width="30" style="cursor: pointer;">
              <br>jkvdsgskafk;gdaj
            </div>
            <br>
              <div class="cam5" style="cursor: pointer;">
             <mfs>Helloo desdsf sefsfs</mfs>
            <img onclick="myFunction()" src="7.jpg" alt="Smiley face" height="25" width="30" style="cursor: pointer;">
            </div>
            <div class="cam6" style="cursor: pointer;">
                <mfs>Helloo desdsf sefsfs </mfs>       
              <img onclick="myFunction()" src="6.jpg" alt="Smiley face" height="30" width="30" style="cursor: pointer;">
              <br>jkvdsgskafk;gdaj
            </div>
            <br>

        </ul>
        </div>
    </div>
<script >
  
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

$(document).ready(function(){
    $('.cam2').hide();
    $('.cam1, .cam2').on('click',function(){
        $('.cam1, .cam2').toggle('slow');
   });
});

$(document).ready(function(){
    $('.cam4').hide();
    $('.cam3, .cam4').on('click',function(){
        $('.cam3, .cam4').toggle('slow');
   });
});

$(document).ready(function(){
    $('.cam6').hide();
    $('.cam5, .cam6').on('click',function(){
        $('.cam5, .cam6').toggle('slow');
   });
});
</script>
</body>
</html>

