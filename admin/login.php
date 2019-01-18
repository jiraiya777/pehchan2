<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>PEHCHAN LOGIN</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="header">
        <h2>Login</h2>
    </div>
    <form method="post" action="login.php">

        <?php echo display_error(); ?>

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" >
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_btn">Login</button>
        </div>
    </form>

   <div class="col-md-4">
    <ul>
                  <li><a href="../index.php"><h4>HOME</h4></a></li>
                  <br>
                    <li><a href="#"><h4>ABOUT US</h4></a></li>
                    <div class="foo-text">  
                        <li><a href="../VisionMission.php">Mission And Vision</a></li>
                        <li><a href="../PeopleBehindPehchaan.php">People Behind Pehchaan EK Safar</a></li>
                        <li><a href="#">Working Model</a></li>
                        <li><a href="#">Partner And Affliates</a></li>
                    </div>  
                    <br>
                <li><a href="#"><h4>PROJECTS</h4></a></li>
                <div class="foo-text">
                     <li><a href="../Project_Abhyas.php">Abhyas</a></li>
                    <li><a href="../Project_SchoolChaleHum.php">School Chale Hum</a></li>
                    <li><a href="../Project_SchoolOutreach.php">School outreach in ropar</a></li>
                    <li><a href="../Project_Pathsala.php">Pathshala</a></li>
                </div>
                <br>
                <li><a href="#"><h4>CAMPAIGNS</h4></a></li>
                    <div class="foo-text">
                    
                        </p><li><a href="../../../Campaign_IITVisit.php"> IIT Visits</a></li>
                        <li><a href="../../Campaign_JhuggiPathsala.php">Jhuggi Pathshala</a></li>
                        <li><a href="../Campaign_KeepAwayFromRoaD.php">Keep away from road</a></li>
                        <li><a href="../Camp_Samajhiye.php">Campaign Samajhiye</a></li>
               
                    </div> 
               
              </div>
              <div class="col-md-4">
                     
                <li><a href="#"><h4>GET INVOLVED</h4></a></li>
                <div class="foo-text">
                  <p></p><li><a href="#">Volunteer With Us</a></li>
                  <li><a href="../Donate.php">Donate</a></li>
                  <li><a href="../FAQ.php">FAQs</a></li>
                </div>
               
                
                <li><a href="#"><h4>RESOURCES</h4></a></li>
                <div class="foo-text">
                  <p></p><li><a href="#">IIT Ropar Donar</a></li>
                  <li><a href="#">OUR Permanent Donar</a></li>
                  <li><a href="#">Others Donar </a></li>
                  <li><a href="#">GOvernment Grants</a></li>
                  <li><a href="#">Finance Reports </a></li>
                  <li><a href="../Resources_Report.php">Reports </a></li>
                </div>
                <br>
                <li><a href="../Gallery.php"><h4>Gallery</h4></a></li>
                <br>
                <li><a href="../ContactUs.php"><h4>Contact Us</h4></a></li>
                
              </div>
          </ul>


</body>
</html>