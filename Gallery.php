<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gallery -Pehchaan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="style11.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    
  <?php
include 'Siteheader.php';
?>


 <div class="container" >
    <div  align="center">
      <h1 id="demo222">GALLERY</h1>
    </div>

    <p >Smile Foundation is managed by a Board of Advisors comprising individuals from diverse 
                backgrounds and expertise. The board is formed for a period of one year and 
                a few independent members of eminence and reputation are
                nominated each year. Members of this board meet once every quarter.
              </p>
              <br>

                        <div class="demo222" align="center">
          <h2>PROJECTS AND CAMPAIGNS</h2>
          </div>
          <hr>
</div>

<!----------------------START PROJECTS AND CAMPAIGNS---------------------->

          <?php
          require("db.php");
          $sqll="SELECT * FROM gallery_proj ORDER BY id DESC LIMIT 0, 1";
          $highest_id =0;

          $result = mysqli_query($conn,$sqll);
          while ($row = mysqli_fetch_row($result))
          $highest_id = $row[0];

          //echo "HIGHEST ID: ".$highest_id."<br/";
          $ind=0;
          $lmtProjCamp=0;
          $imgProjCamp=array();

          for ($index=1; $index <=$highest_id; $index++)
            {
              $sql="SELECT * FROM gallery_proj WHERE id='$index' ";
              $result=mysqli_query($conn,$sql);
              if (mysqli_num_rows($result)>0)
              {
               $row = mysqli_fetch_row($result);     
               $imgProjCamp[$ind]=$row[1];

               $ind++;
              }
              $lmtProjCamp=$ind ;
                     
            }

            for($x=0; $x<$lmtProjCamp;$x++)
            {


              echo'<div class="container">';

                echo'<div align="center">'.
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                     '<a href= '.$imgProjCamp[$x].' target="_blank"> <img src="'.$imgProjCamp[$x].'" height="200" width="200" alt="Avatar" ></a>'.
                  '</div>'.
                  '</div>';


                if (++$x < $lmtProjCamp)   
                {
                  echo
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<a href='.$imgProjCamp[$x].' target="_blank"> <img src="'.$imgProjCamp[$x].'" height="200" width="200" alt="Avatar" ></a>'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }

                if (++$x < $lmtProjCamp)   
                {
                  echo
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<a href='.$imgProjCamp[$x].' target="_blank"> <img src="'.$imgProjCamp[$x].'" height="200" width="200" alt="Avatar" ></a>'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }

                if (++$x < $lmtProjCamp)   
                {
                  echo
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<a href='.$imgProjCamp[$x].' target="_blank"> <img src="'.$imgProjCamp[$x].'" height="200" width="200" alt="Avatar" ></a>'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }
                  
                  

              echo'  </div>   

              </div>'
              .'<br>';
            }

                    mysqli_close($conn);
            ?>
          </div>
        </div>
        <br>
        <div id="line"></div>

<!--------------------------END PROJECT AND CAMPAIGNS----------------------->




<!-----------------------Team and Volunteer------------------->



                       <div class="demo222" align="center">
          <h2>TEAM AND VOLUNTEERS</h2>
          </div>
          <hr>

          <?php
          require("db.php");
          $sqll="SELECT * FROM gallery_team_vol ORDER BY id DESC LIMIT 0, 1";
          $highest_id =0;

          $result = mysqli_query($conn,$sqll);
          while ($row = mysqli_fetch_row($result))
          $highest_id = $row[0];

          //echo "HIGHEST ID: ".$highest_id."<br/";
          $ind=0;
          $lmtTeamVoln=0;
          $imgTeamVoln=array();

          for ($index=1; $index <=$highest_id; $index++)
            {
              $sql="SELECT * FROM gallery_team_vol WHERE id='$index' ";
              $result=mysqli_query($conn,$sql);
              if (mysqli_num_rows($result)>0)
              {
               $row = mysqli_fetch_row($result);     
               $imgTeamVoln[$ind]=$row[1];

               $ind++;
              }
              $lmtTeamVoln=$ind ;
                     
            }

            for($x=0; $x<$lmtTeamVoln;$x++)
            {


              echo'<div class="container">';

                echo'<div align="center">'.
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                     '<a href= '.$imgTeamVoln[$x].' target="_blank"> <img src="'.$imgTeamVoln[$x].'" height="200" width="200" alt="Avatar" >'.
                  '</div>'.
                  '</div>';


                if (++$x < $lmtTeamVoln)   
                {
                  echo
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<a href='.$imgTeamVoln[$x].' target="_blank"> <img src="'.$imgTeamVoln[$x].'" height="200" width="200" alt="Avatar" >'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }

                if (++$x < $lmtTeamVoln)   
                {
                  echo
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<a href='.$imgTeamVoln[$x].' target="_blank"> <img src="'.$imgTeamVoln[$x].'" height="200" width="200" alt="Avatar" >'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }

                if (++$x < $lmtTeamVoln)   
                {
                  echo
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<a href='.$imgTeamVoln[$x].' target="_blank"> <img src="'.$imgTeamVoln[$x].'" height="200" width="200" alt="Avatar" >'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }
                  
                  

              echo'  </div>   

              </div>'
              .'<br>';
            }

                    mysqli_close($conn);
            ?>
          </div>
        </div>
        <br>
        <div id="line"></div>

        <!-----------------------------end team and volunteer------------------->






<!-----------------------Outreach------------------->


                       <div class="demo222" align="center">
          <h2>OUTREACH</h2>
          </div>
          <hr>

          <?php
          require("db.php");
          $sqll="SELECT * FROM gallery_outreach ORDER BY id DESC LIMIT 0, 1";
          $highest_id =0;

          $result = mysqli_query($conn,$sqll);
          while ($row = mysqli_fetch_row($result))
          $highest_id = $row[0];

          //echo "HIGHEST ID: ".$highest_id."<br/";
          $ind=0;
          $lmtOutrch=0;
          $imgOutrch=array();

          for ($index=1; $index <=$highest_id; $index++)
            {
              $sql="SELECT * FROM gallery_outreach WHERE id='$index' ";
              $result=mysqli_query($conn,$sql);
              if (mysqli_num_rows($result)>0)
              {
               $row = mysqli_fetch_row($result);     
               $imgOutrch[$ind]=$row[1];

               $ind++;
              }
              $lmtOutrch=$ind ;
                     
            }

            for($x=0; $x<$lmtOutrch;$x++)
            {


              echo'<div class="container">';

                echo'<div align="center">'.
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                     '<a href= '.$imgOutrch[$x].' target="_blank"> <img src="'.$imgOutrch[$x].'" height="200" width="200" alt="Avatar" >'.
                  '</div>'.
                  '</div>';


                if (++$x < $lmtOutrch)   
                {
                  echo
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<a href='.$imgOutrch[$x].' target="_blank"> <img src="'.$imgOutrch[$x].'" height="200" width="200" alt="Avatar" >'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }

                if (++$x < $lmtOutrch)   
                {
                  echo
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<a href='.$imgOutrch[$x].' target="_blank"> <img src="'.$imgOutrch[$x].'" height="200" width="200" alt="Avatar" >'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }

                if (++$x < $lmtOutrch)   
                {
                  echo
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<a href='.$imgOutrch[$x].' target="_blank"> <img src="'.$imgOutrch[$x].'" height="200" width="200" alt="Avatar" >'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }
                  
                  

              echo'  </div>   

              </div>'
              .'<br>';
            }

                    mysqli_close($conn);
            ?>
          </div>
        </div>
        <br>
        <div id="line"></div>

        <!-----------------------------end Outreach------------------->





<!-----------------------Other activities------------------->


                       <div class="demo222" align="center">
          <h2>OTHER ACTIVITIES</h2>
          </div>
          <hr>

          <?php
          require("db.php");
          $sqll="SELECT * FROM gallery_oth_act ORDER BY id DESC LIMIT 0, 1";
          $highest_id =0;

          $result = mysqli_query($conn,$sqll);
          while ($row = mysqli_fetch_row($result))
          $highest_id = $row[0];

          //echo "HIGHEST ID: ".$highest_id."<br/";
          $ind=0;
          $lmtOthAct=0;
          $imgOthAct=array();

          for ($index=1; $index <=$highest_id; $index++)
            {
              $sql="SELECT * FROM gallery_oth_act WHERE id='$index' ";
              $result=mysqli_query($conn,$sql);
              if (mysqli_num_rows($result)>0)
              {
               $row = mysqli_fetch_row($result);     
               $imgOthAct[$ind]=$row[1];

               $ind++;
              }
              $lmtOthAct=$ind ;
                     
            }

            for($x=0; $x<$lmtOthAct;$x++)
            {


              echo'<div class="container">';

                echo'<div align="center">'.
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                     '<a href= '.$imgOthAct[$x].' target="_blank"> <img src="'.$imgOthAct[$x].'" height="200" width="200" alt="Avatar" >'.
                  '</div>'.
                  '</div>';


                if (++$x < $lmtOthAct)   
                {
                  echo
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<a href='.$imgOthAct[$x].' target="_blank"> <img src="'.$imgOthAct[$x].'" height="200" width="200" alt="Avatar" >'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }

                if (++$x < $lmtOthAct)   
                {
                  echo
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<a href='.$imgOthAct[$x].' target="_blank"> <img src="'.$imgOthAct[$x].'" height="200" width="200" alt="Avatar" >'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }

                if (++$x < $lmtOthAct)   
                {
                  echo
                  '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >'.
                    '<div class="Pimg">'.
                    '<a href='.$imgOthAct[$x].' target="_blank"> <img src="'.$imgOthAct[$x].'" height="200" width="200" alt="Avatar" >'.
                  '</div>'.
                  '</div>';
                }
                else
                {
                  break;
                }
                  
                  

              echo'  </div>   

              </div>'
              .'<br>';
            }

                    mysqli_close($conn);
            ?>
          </div>
        </div>
        <br>
        <div id="line"></div>

        <!-----------------------------end Other activities------------------->

</body>
</html>