<!DOCTYPE html>
<html>
<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet"  href="Volunteer_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="Pehchan Logo.jpg" sizes="32x32">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="javascript.js"></script>
  <title>Finance Reports</title>  
<style>
.directorImg img{
  border-radius: 50%;
  border: 2px solid green;
}

.Pimg img{
  padding: 1px;
  border: 1px solid lightgreen;
}
</style>

</head>
<body>
  <?php
include 'Siteheader.php';
?>

<div class="container">

<div align="center">
<h2> FINANCE REPORTS</h2>
</div>
<br>
<hr>
<br>
<?php
          require("db.php");
          $sqll="SELECT * FROM fin_reports ORDER BY id DESC LIMIT 0, 1";

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
              $sql="SELECT * FROM fin_reports WHERE id='$index' ";
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

                    for($x=0; $x<$lmt;$x++){
                      echo '<div class="row" align="center">';

echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">'.
'<div class="Pimg">'.
                        '<div class="block3">
           <a href='.$docRp[$x].' target="_blank"> <div class="block3"><img src="'.$imgRp[$x].'" height="140" width="140" alt="Avatar" class="center"></div>'.
           '<h4>'.$dataRp[$x].'</h4>'.'</div></a></a>'.
            
            '</div></div>';
            if (++$x < $lmt)   
            {
              
echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">'.
'<div class="Pimg">'.
                        '<div class="block3">
           <a href='.$docRp[$x].' target="_blank"> <div class="block3"><img src="'.$imgRp[$x].'" height="140" width="140" alt="Avatar" class="center"></div>'.
           '<h4>'.$dataRp[$x].'</h4>'.'</div></a>'.

            
           
            '</div>'.'</div>';
          }
          else
          {
            break;
          }
            if (++$x < $lmt)   
            {
            
echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">'.
'<div class="Pimg">'.
                        '<div class="block3">
           <a href='.$docRp[$x].' target="_blank"> <div class="block3"><img src="'.$imgRp[$x].'" height="140" width="140" alt="Avatar" class="center"></div>'.
           '<h4>'.$dataRp[$x].'</h4>'.'</div></a>'.

            
          
            '</div>'.'</div>';
          }
          else
          {
            break;
          }
            if (++$x < $lmt)   
            {
            
echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">'.
'<div class="Pimg">'.
                        '<div class="block3">
           <a href='.$docRp[$x].' target="_blank"> <div class="block3"><img src="'.$imgRp[$x].'" height="140" width="140" alt="Avatar" class="center"></div>'.
           '<h4>'.$dataRp[$x].'</h4>'.'</div></a>'.

            
         
            '</div>'.'</div>';
          }
          else
          {
            break;
          }

            
            echo '</div>';
            echo "<hr/>";

           

                    }



  mysqli_close($conn);
            ?>
</div>

         
        <br>
        <div id="line"></div>


</body>
</html>