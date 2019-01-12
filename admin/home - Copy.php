<?php 
include('functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
}
$GLOBALS['z']=0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" type="text/css" href="../style11.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .header {
        background: #003366;
    }
    button[name=register_btn] {
        background: #003366;
    }
    </style>
</head>
<body>
    <div class="header">
        <h2>Admin - Home Page</h2>
    </div>
    <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <!-- logged in user information -->
        <div class="profile_info">
            <img src="../images/admin_profile.png"  >

            <div>
                <?php  if (isset($_SESSION['user'])) : ?>
                    <strong><?php echo $_SESSION['user']['username']; ?></strong>

                    <small>
                        <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
                        <br>
                        <a href="home.php?logout='1'" style="color: red;">logout</a>
                    </small>

                <?php endif ?>
            </div>
        </div>


       

         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add</button>

  
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submit1'] )) {

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
$message = "wrong answer11";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
$message = "wrong answer22";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $message = "wrong answer33";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
      $message = "wrong answer44";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }


  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  if ($z==0)
{

$message = "insert";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

/*
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

*/
?>


<h2>PHP Form  Example</h2>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>

  
  <input type="submit" name="submit1" value="Submit" " > 
  
</form>




<?php


    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO reports (heading, links)
VALUES ( ?,?)");

$stmt->bind_param("ss", $hdg, $lnk);
$hdg=$name;
$lnk=$email;

/*$stmt->bind_param('s', $name);
$stmt->bind_param('s', $website);*/

$stmt->execute();
/*
$sql = "INSERT INTO hello (sp)
VALUES ('".$comment."')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

/*$SQLCommand = "SELECT *  FROM reports";
 $result = mysqli_query($conn,$SQLCommand); // This line executes the MySQL query that you typed above
while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
    echo "id: " . $row["id"]. " - Name: " . $row["heading"]. " " . $row["link"]. "<br/";}*/

    $stmt->close();

   /* $sql = "DELETE FROM reports WHERE id=10";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}*/
/*
$SQLCommand = "SELECT *  FROM reports";

                    $result = mysqli_query($conn,$SQLCommand); // This line executes the MySQL query that you typed above



                    $index = 0;
                    while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
                         echo "id: ".$row["id"]."heading: ".$row["heading"]."link: ".$row["links"]."<br/>";
                    }*/
mysqli_close($conn);

?>

<?php
if ($z ==1)
{
echo "FLAG1 ".$z."<br/>";
toDeleteInvalid();
$z=0;
}
else
{

echo "FLAG0 ".$z."<br/>";
}

echo "<h2>Inp:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;

?>
<!--
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

    -->




<!------------------------------------------------------------------------------->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php 
/*
    require("../db.php");
    $sql = "DELETE FROM reports WHERE heading ='' OR links=''";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 
mysqli_close($conn);
*/

function toDeleteInvalid(){
require("../db.php");
$sqll="SELECT * FROM reports ORDER BY id DESC LIMIT 0, 1";
                  $highest_id;
                    $result = mysqli_query($conn,$sqll);

                    while ($row = mysqli_fetch_row($result))
                    $highest_id = $row[0];

    $sql = "DELETE FROM reports WHERE id='$highest_id' ";
        $results = mysqli_query($conn, $sql);

        if ($results == FALSE)
        {

$message = "insertion failed...try again";
echo "<script type='text/javascript'>alert('$message');</script>";
        }

        else 
        {

$message = "WRONGG";          // FOR INVALID
echo "<script type='text/javascript'>alert('$message');</script>";
        }

        echo "Dsf ".$highest_id."<br/";
mysqli_close($conn);
}

?>


<?php           // for case of refreshs
      
    require("../db.php");
    $sql = "DELETE FROM reports WHERE heading ='' OR links=''";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 
mysqli_close($conn);
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>


    <!-------------DELETION----------------------------------->


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">DELETE</button>

  
      <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal del</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM reports ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "Id ".$row["id"]."\tName\t".$row["heading"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeErr = $emailErr = $genderErr = $websiteErr = "";
$nme = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submit2'] )) {
  if (empty($_POST["nme"])) {
    $nmeErr = "Name is required";
$message = "wrong answer55";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nme = test_input($_POST["nme"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nme)) {
      $nmeErr = "Only numbers allowed"; 
$message = "wrong answer66";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM reports WHERE id='$nme'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "INVALID id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {
$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>


<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nme" value="<?php echo $nme;?>">
  <span class="error">* <?php echo $nmeErr;?></span>
  <br><br>


  <input type="submit" name="submit2" value="Submit"  "> 
</form>


<?php


    require("../db.php");
$delId=$nme;
echo "nme = ".$nme."<br/>";
echo "delID = ".$delId."<br/>";
$sql = "DELETE FROM reports WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted very successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 


mysqli_close($conn);

?>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>



<!------------------------- MESSAGE FOR FURTHER ADMIN PAGE


MAKE SURE VARIABLE NAMES DONT CLASH LIKE THAT OF FIELDS OF THE FORMS.
CHECK IF Z=0 WILL SUFFIC OR DIFFERENT VARIABLE REQUIRED.
TAKE CARE WHILE COPYING
NAME OF FORMS ARE IMPORTANT

CHECK FOR Z


-->
</body>
</html>


