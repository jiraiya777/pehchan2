<!DOCTYPE html>
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
 
</head>

<body>
     <!-- Top section starts here -->

   <section class="top_section">
          <div class="container">
            
            <div class="row display-none">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="single">
               <!--  <form action="newsletter.html" method="get" > -->

                    <form name="formSub" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()"> 
                    <div class="input-group">
                    <input type="email" class="form-control" name="emailIdHd"  placeholder="Enter Your Email Id">

                    <!--  <input type="email" class="form-control" name="emailIdHd" id="emailId" placeholder="Enter Your Email Id"> -->
                      <span class="input-group-btn">
                      <button class="btn btn-theme"name="submitSub" type="submit">SUBSCRIBE</button>
                      </span>
                    </div>
                  </form>

                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="hd_right">
                  <ul>
                    <li><a href="https://m.facebook.com/profile.php?id=932906730231703&ref=content_filter"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCteFgeHGwySvFezOYIXjehA"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/pehchaan-ek-safar-iit-ropar-754757177"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/pehchaan_iitrpr/?hl=en"><i class="fa fa-instagram " aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>

<!-- Top section ends here -->



<!--Navbar starts here -->
<div class="container-fluid">
<div class="topnav" id="myTopnav">
 <img src="/Pehchan Logo1.jpg" width="80" height="80" >
<img src="/iitrprLogo.jpg" width="80" height="80" align="right" >
  <div class="tp">
  <div class="drpdown">
    <input class="drpbtn" type="button" onclick="location.href='/index.php'" value="Home" />
  </div> 
  </div> 
  <div class="drpdown">
    <button class="drpbtn">About Us 
      <li class="fa fa-caret-down"></li>
    </button>
    <div class="drpdown-content">
      <a href="/VisionMission.php">Mission and Vision</a>
      <a href="/PeopleBehindPehchaan.php">People Behind Pehchaan Ek Safar </a>      
      <a href="../WorkingModel.php">Working Model </a>
      <a href="#">Partners and Affiliates</a>

    </div>
  </div> 
  <div class="drpdown">
    <button class="drpbtn">Projects
      <li class="fa fa-caret-down"></li>
    </button>
    <div class="drpdown-content">
      <a href="/Project_Abhyas.php">Abhyas</a>
      <a href="/Project_Pathsala.php">Paathshala</a>
      <a href="/Project_SchoolChaleHum.php">School Chale Hum</a>
      <a href="/Project_SchoolOutreach.php">School Outreach</a>
    </div>
  </div> 

  <div class="drpdown">
    <button class="drpbtn">Campaigns
      <li class="fa fa-caret-down"></li>
    </button>
    <div class="drpdown-content">
      <a href="./Campaign_IITVisit.php">IIT Visits</a>
      <a href="./Campaign_JhuggiPathsala.php">JHUGGI Paathshala</a>
      <a href="./Camp_KeepAwayFromRoaD.php">Keep away from roads</a>
      <a href="./Camp_Samajhiye.php"">Samajhiye</a>
    </div>
  </div>


  <div class="drpdown">
    <button class="drpbtn">Get Involved
      <li class="fa fa-caret-down"></li>
    </button>
    <div class="drpdown-content">
      <a href="../Volunteer.php">Volunteer With Us</a>
      <a href="/Donate.php">Donate</a>
      <a href="../FAQ.php">FAQ</a>
    </div>
  </div> 

  <div class="drpdown">
    <button class="drpbtn">Resources
      <li class="fa fa-caret-down"></li>
    </button>
    <div class="drpdown-content">
      <a href="/IITRoparDonors.php">IIT ROPAR Donors</a>
      <a href="/PermanentDonors.php">Our Permanent Donors</a>
      <a href="Resources_Report.php">Other Donors</a>
      <a href="Resources_Report.php">Government Grants</a>
      <a href="#">Finance Reports</a>
      <a href="Resources_Report.php">Reports</a>
      <a href="#">Other Resources</a>
    </div>
  </div>

<div class="drpdown">
    <input class="drpbtn" type="button" onclick="location.href='/Gallery.php'" value="Gallery" />
  </div> 

  <div class="drpdown">
    <input class="drpbtn" type="button" onclick="location.href='/ContactUs.php'" value="Contact Us" />
  </div> 
  </div> 

 
  
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
</div>

<!-- Navbar ends here -->
<br>

<script>
  
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
require("db.php");


 

 


if (isset($_POST['emailIdHd'] )) {
  $emaildHd=($_POST["emailIdHd"]);
$IdHd=1;
$sql ="SELECT *  FROM subscribed WHERE email='$emaildHd'";        // naive method
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0){
  $message="already subscribed";
echo "<script type='text/javascript'>alert('$message');</script>";
}
else
{
  if (isset($_POST['submitSub'] )) {


    /*if (empty($_POST["email"])) {
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
  } */

  if (!(empty($_POST["emailIdHd"]))) {
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings

    $mail->SMTPDebug =0 ;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'rissin98@gmail.com';                 // SMTP username
    $mail->Password = 'RAIock98';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

  /*  $mail->Mailer = 'smtp';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';*/


    //Recipients
    $mail->setFrom('rissin98@gmail.com', 'Rishabh');
    $mail->addAddress(($_POST["emailIdHd"]));     // Add a recipient
    /*$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/

    //Attachments
    /*$mail->addAttachment('./fee4thsem.pdf');         // Add attachments
   //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'This is the subject of the mail';
    $mail->Body    = 'Hello there!!!!!!!!!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
   // echo 'Message has been sent';
    $message = "Thank you";
echo "<script type='text/javascript'>alert('$message');</script>";
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


// check 2 way authentication from myaccount on gmail
// check allow access to less secure apps
// change the IMAP settins in the gmail setting
// cannot send mail to self
// tls has worked for gmail
// check for the web server on which site willbe updated
// keep track of the vendor folder 
}
}
$stmt =$conn->prepare( "INSERT INTO subscribed (email)
VALUES ( ?)");

$stmt->bind_param("s", $hdg);
$hdg=$emaildHd;

$stmt->execute();
    $stmt->close();

$message = "insert";
echo "<script type='text/javascript'>alert('$message');</script>";
                   }
                    }
mysqli_close($conn);



/*  TEST INPUT FUNCTION
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
*/

?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>
</html>
