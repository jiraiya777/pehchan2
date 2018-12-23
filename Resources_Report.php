<!DOCTYPE html>
<html>
<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet"  href="Volunteer_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="javascript.js"></script>
  <title>Volunteer</title>   
</head>
<body>
  <?php
include 'Siteheader.php';
?>

<div class="container">

<?php
                   require("db.php");
                     $sqll="SELECT * FROM story_of_day ORDER BY id DESC LIMIT 0, 1";

                    $result = mysqli_query($conn,$sqll);

                    while ($row = mysqli_fetch_row($result))
                    $highest_id = $row[0];

                    //echo "HIGHEST ID: ".$highest_id."<br/";
                    $ind=0;
                    $name = array(); // make a new array to hold all your data

                    //echo "</br>"."IND1 ".$ind."<br/>";
                    for ($index=1; $index <=$highest_id; $index++)
                    {
                      $sql="SELECT * FROM story_of_day WHERE id='$index' ";
                      $result=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($result)>0){
                        $row = mysqli_fetch_row($result);
                        $name[$ind] = $row[1];     // 0 for id , 1 for story
                        /* MAKE FOR OTHERS*/
                        $ind++;
                      }
                      $lmt=$ind -1;
                      
                    }

                    for($x=0; $x<$lmt;$x++){
                      echo '<div class="row" align="center">';

echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">'.
                        
           ' <a href='.$name[$x].'> <div class="block3"><img src="1.jpg" height="200" width="200" alt="Avatar" class="center"></div></a>'.

            
            '</div>';
            if (++$x < $lmt)   
            {
              
echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">'.
                        ' <div class="block3" >'.
           ' <a href='.$name[$x].'><img src="1.jpg" height="200" width="200" alt="Avatar" class="center"></a>'.

            
           
            '</div>'.'</div>';
          }
          else
          {
            break;
          }
            if (++$x < $lmt)   
            {
            
echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">'.
                        ' <div class="block3" >'.
           ' <a href='.$name[$x].'><img src="1.jpg" height="200" width="200" alt="Avatar" class="center"></a>'.

            
          
            '</div>'.'</div>';
          }
          else
          {
            break;
          }
            if (++$x < $lmt)   
            {
            
echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">'.
                        ' <div class="block3" >'.
           ' <a href='.$name[$x].'><img src="1.jpg" height="200" width="200" alt="Avatar" class="center"></a>'.

            
         
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


</body>
</html>