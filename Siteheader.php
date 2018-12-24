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
                  <form action="newsletter.html" method="get" >
                    <div class="input-group">
                      <input type="email" class="form-control" name="emailId" id="emailId" placeholder="Enter Your Email Id">
                      <span class="input-group-btn">
                      <button class="btn btn-theme" type="submit">SUBSCRIBE</button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="hd_right">
                  <ul>
                    <li><a href="https://www.facebook.com/smilefoundationindia.org"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/smilefoundation"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.youtube.com/user/tubeforchange"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
                    <li><a href="mailto:yours@email.com?Subject=Please check this site"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                    <li><a href="https://plus.google.com/+SmilefoundationindiaOrgcharity"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/smile-foundation"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
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
  <img src="1.jpg" width="80" height="80"  >
  <div class="tp">
  <div class="drpdown">
    <input class="drpbtn" type="button" onclick="location.href='index.php'" value="Home" />
  </div> 
  </div> 
  <div class="drpdown">
    <button class="drpbtn">About Us 
      <li class="fa fa-caret-down"></li>
    </button>
    <div class="drpdown-content">
      <a href="#">Genious</a>
      <a href="#">Mission/Vision</a>
      <a href="PeopleBehindPehchaan.php">People Behind Pehchaan Ek Safar</a>
      <a href="#">Working Model</a>
      <a href="#">Partners and Affiliates</a>

    </div>
  </div> 
  <div class="drpdown">
    <button class="drpbtn">Projects
      <li class="fa fa-caret-down"></li>
    </button>
    <div class="drpdown-content">
      <a href="#">Abhyas</a>
      <a href="#">Paathshala</a>
      <a href="#">School Chale Hum</a>
      <a href="#">School Outreach</a>
    </div>
  </div> 

  <div class="drpdown">
    <button class="drpbtn">Campaigns
      <li class="fa fa-caret-down"></li>
    </button>
    <div class="drpdown-content">
      <a href="#">IIT Visits</a>
      <a href="#">JHUGGI Paathshala</a>
      <a href="#">Keep away from roads</a>
      <a href="#">Samajhiye</a>
    </div>
  </div>

  <div class="drpdown">
    <button class="drpbtn">Get Involved
      <li class="fa fa-caret-down"></li>
    </button>
    <div class="drpdown-content">
      <a href="#">Donate</a>
      <a href="Volunteer.php">Volunteer With Us</a>
      <a href="FAQ.php">FAQ</a>
    </div>
  </div> 

  <div class="drpdown">
    <button class="drpbtn">Resources
      <li class="fa fa-caret-down"></li>
    </button>
    <div class="drpdown-content">
      <a href="Resources_Report.php">Reports</a>
      <a href="#">Other Resources</a>
    </div>
  </div>

  <div class="drpdown">
    <button class="drpbtn">Financials
      <li class="fa fa-caret-down"></li>
    </button>
    <div class="drpdown-content">
      <a href="#">Finance Reports</a>
    </div>
  </div>

  <div class="drpdown">
    <input class="drpbtn" type="button" onclick="location.href='#" value="Contact Us" />
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
</body>
</html>
