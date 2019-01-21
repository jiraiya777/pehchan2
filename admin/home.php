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
    <title>Admin Home</title>
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
        background: green;
        color: black;
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

        <br>
       



<!---------------------------------START - NEWS AND ANNOUNCEMENT -------------->


        <h3 > NEWS AND ANNOUNCEMENT</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add</button>

  
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
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
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
      $message = "Invalid email format";
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




    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO reports (heading,links)
VALUES ( ?,?)");

$stmt->bind_param("ss", $hdg, $lnk);
$hdg=$name;
$lnk=$email;
$stmt->execute();

    $stmt->close();




/*$stmt->bind_param('s', $name);
$stmt->bind_param('s', $website);*/


/*
$sql = "INSERT INTO res_reports (img,data,doc,em)
VALUES ('".$name."' , '".$email."', '".$email."', '".$email."')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

/*$SQLCommand = "SELECT *  FROM reports";
 $result = mysqli_query($conn,$SQLCommand); // This line executes the MySQL query that you typed above
while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
    echo "id: " . $row["id"]. " - Name: " . $row["heading"]. " " . $row["link"]. "<br/";}*/


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



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
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





<?php           // for case of refreshs
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
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM reports ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["heading"]."<br/>";
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
$message = "Only numbers allowed";
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
$message = "ID NOT FOUND!! CHECK AGAIN";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nme;
$sql = "DELETE FROM reports WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nme" value="<?php echo $nme;?>">
  <span class="error">* <?php echo $nmeErr;?></span>
  <br><br>


  <input type="submit" name="submit2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>



<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">UPDATE</button>

      <div class="modal fade" id="myModal3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM reports ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["heading"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeUpErr = "";
$nmeUp = 0;
$nameUpErr = $emailUpErr=  "";
$nameUp = $emailUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submit3'] )) {



    if (empty($_POST["nmeUp"])) {
    $nmeUpErr = "Name is required";
$message = "wrong answer55";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeUp = test_input($_POST["nmeUp"]);
    // check if nameUp only contains letters and whitespace
    if (!is_numeric($nmeUp)) {
      $nmeUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM reports WHERE id='$nmeUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }



  if (empty($_POST["nameUp"])) {
    $nameUpErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameUp = test_input($_POST["nameUp"]);
    // check if nameUp only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameUp)) {
      $nameUpErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }
  
  if (empty($_POST["emailUp"])) {
    $emailUpErr = "Email is required";
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $emailUp = test_input($_POST["emailUp"]);
    // check if e-mail address is well-formed
    if (!filter_var($emailUp, FILTER_VALIDATE_EMAIL)) {
      $emailUpErr = "Invalid emailUp format"; 
      $message = "Invalid emailUp format";
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




    require("../db.php");

$sql = "UPDATE reports SET heading=?, links=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('sss', $nameUp, $emailUp,$nmeUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();


/*
$stmt =$conn->prepare( "INSERT INTO ateam (tl,nm,dp,em,ig)
VALUES ( ?,?,?,?,?)");

$stmt->bind_param("sssss", $hdg, $lnk,$hg,$hd,$ln);
$hdg=$name;
$lnk=$email;
$hg=$email;
$hd=$email;
$ln=$website;
$stmt->execute();

    $stmt->close();

    */




/*$stmt->bind_param('s', $name);
$stmt->bind_param('s', $website);*/


/*
$sql = "INSERT INTO res_reports (img,data,doc,em)
VALUES ('".$name."' , '".$email."', '".$email."', '".$email."')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

/*$SQLCommand = "SELECT *  FROM reports";
 $result = mysqli_query($conn,$SQLCommand); // This line executes the MySQL query that you typed above
while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
    echo "id: " . $row["id"]. " - Name: " . $row["heading"]. " " . $row["link"]. "<br/";}*/


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


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeUp" value="<?php echo $nmeUp;?>">
  <span class="error">* <?php echo $nmeUpErr;?></span>
  <br><br>

  Name: <input type="text" name="nameUp" value="<?php echo $nameUp;?>">
  <span class="error">* <?php echo $nameUpErr;?></span>
  <br><br>
  E-mail: <input type="text" name="emailUp" value="<?php echo $emailUp;?>">
  <span class="error">* <?php echo $emailUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submit3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>


<!--------------------------END OF NEWS AND ANNOUNCEMENT-------------->

<hr>
<br>
<hr>





<!---------------------------------START -Gov body -------------->


        <h3 > GOVERNING BODY</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGovBody">Add</button>

  
      <div class="modal fade" id="myModalGovBody" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$titleGovBodyErr =$nameGovBodyErr =$deptGovBodyErr = $emailGovBodyErr =$imgGovBodyErr = "";
$titleGovBody =$nameGovBody =$deptGovBody = $emailGovBody =$imgGovBody ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGovBody1'] )) {



 if (empty($_POST["titleGovBody"])) {
    $titleGovBodyErr = "Title is required";
$message = "Title is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $titleGovBody = test_input($_POST["titleGovBody"]);
  }


  if (empty($_POST["nameGovBody"])) {
    $nameGovBodyErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameGovBody = test_input($_POST["nameGovBody"]);
    // check if nameGovBody only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameGovBody)) {
      $nameGovBodyErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }

   if (empty($_POST["deptGovBody"])) {
    $deptGovBodyErr = "Department is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptGovBody = test_input($_POST["deptGovBody"]);
  }



  
  if (empty($_POST["emailGovBody"])) {
    $emailGovBodyErr = "Email is required";
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $emailGovBody = test_input($_POST["emailGovBody"]);
    // check if e-mail address is well-formed
    if (!filter_var($emailGovBody, FILTER_VALIDATE_EMAIL)) {
      $emailGovBodyErr = "Invalid email format"; 
      $message = "Invalid email format";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
    }
  }


   if (empty($_POST["imgGovBody"])) {
    $imgGovBodyErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgGovBody = test_input($_POST["imgGovBody"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO govbody (title,name,dept,email,img)
VALUES ( ?,?,?,?,?)");

$stmt->bind_param("sssss", $hdg, $lnk,$hg,$hd,$ln);
$hdg=$titleGovBody;
$lnk=$nameGovBody;
$hg=$deptGovBody;
$hd=$emailGovBody;
$ln=$imgGovBody;
$stmt->execute();

    $stmt->close();


mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  Title: <input type="text" name="titleGovBody" value="<?php echo $titleGovBody;?>">
  <span class="error">* <?php echo $titleGovBodyErr;?></span>
  <br><br>
  Name: <input type="text" name="nameGovBody" value="<?php echo $nameGovBody;?>">
  <span class="error">* <?php echo $nameGovBodyErr;?></span>
  <br><br>

  Dept: <input type="text" name="deptGovBody" value="<?php echo $deptGovBody;?>">
  <span class="error">* <?php echo $deptGovBodyErr;?></span>
  <br><br>
  E-mail: <input type="text" name="emailGovBody" value="<?php echo $emailGovBody;?>">
  <span class="error">* <?php echo $emailGovBodyErr;?></span>
  <br><br>
  Image: <input type="text" name="imgGovBody" value="<?php echo $imgGovBody;?>">
  <span class="error">* <?php echo $imgGovBodyErr;?></span>
  <br><br>
  
  <input type="submit" name="submitGovBody1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGovBody2">DELETE</button>

  
      <div class="modal fade" id="myModalGovBody2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM govbody ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id </strong>".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["name"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeGovBodyErr =  "";
$nmeGovBody = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGovBody2'] )) {

  if (empty($_POST["nmeGovBody"])) {
    $nmeGovBodyErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeGovBody = test_input($_POST["nmeGovBody"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeGovBody)) {
      $nmeGovBodyErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM govbody WHERE id='$nmeGovBody'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeGovBody;
$sql = "DELETE FROM govbody WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeGovBody" value="<?php echo $nmeGovBody;?>">
  <span class="error">* <?php echo $nmeGovBodyErr;?></span>
  <br><br>


  <input type="submit" name="submitGovBody2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>




<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGovBody3">UPDATE</button>

      <div class="modal fade" id="myModalGovBody3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM govbody ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["name"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeGovBodyUpErr = "";
$nmeGovBodyUp = 0;
$titleGovBodyUpErr=$nameGovBodyUpErr = $deptGovBodyUpErr=$emailGovBodyUpErr=$imgGovBodyUpErr=  "";
$titleGovBodyUp =$nameGovBodyUp = $deptGovBodyUp =$emailGovBodyUp =$imgGovBodyUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGovBody3'] )) {



 if (empty($_POST["titleGovBodyUp"])) {
    $titleGovBodyUpErr = "Title is required";
$message = "Title is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $titleGovBodyUp = test_input($_POST["titleGovBodyUp"]);
  }



    if (empty($_POST["nmeGovBodyUp"])) {
    $nmeGovBodyUpErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeGovBodyUp = test_input($_POST["nmeGovBodyUp"]);
    // check if nameGovBodyUp only contains letters and whitespace
    if (!is_numeric($nmeGovBodyUp)) {
      $nmeGovBodyUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM govbody WHERE id='$nmeGovBodyUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }



  if (empty($_POST["nameGovBodyUp"])) {
    $nameGovBodyUpErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameGovBodyUp = test_input($_POST["nameGovBodyUp"]);
    // check if nameGovBodyUp only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameGovBodyUp)) {
      $nameGovBodyUpErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }



if (empty($_POST["deptGovBodyUp"])) {
    $deptGovBodyUpErr = "Department is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptGovBodyUp = test_input($_POST["deptGovBodyUp"]);
  }

  
  if (empty($_POST["emailGovBodyUp"])) {
    $emailGovBodyUpErr = "Email is required";
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $emailGovBodyUp = test_input($_POST["emailGovBodyUp"]);
    // check if e-mail address is well-formed
    if (!filter_var($emailGovBodyUp, FILTER_VALIDATE_EMAIL)) {
      $emailGovBodyUpErr = "Invalid email format"; 
      $message = "Invalid email format";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
    }
  }


     if (empty($_POST["imgGovBodyUp"])) {
    $imgGovBodyErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgGovBodyUp = test_input($_POST["imgGovBodyUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE govbody SET title=?, name=?, dept=?, email=?, img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('ssssss', $titleGovBodyUp, $nameGovBodyUp, $deptGovBodyUp, $emailGovBodyUp, $imgGovBodyUp,$nmeGovBodyUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();

mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeGovBodyUp" value="<?php echo $nmeGovBodyUp;?>">
  <span class="error">* <?php echo $nmeGovBodyUpErr;?></span>
  <br><br>

  Title: <input type="text" name="titleGovBodyUp" value="<?php echo $titleGovBodyUp;?>">
  <span class="error">* <?php echo $titleGovBodyUpErr;?></span>
  <br><br>

  Name: <input type="text" name="nameGovBodyUp" value="<?php echo $nameGovBodyUp;?>">
  <span class="error">* <?php echo $nameGovBodyUpErr;?></span>
  <br><br>

  Dept: <input type="text" name="deptGovBodyUp" value="<?php echo $deptGovBodyUp;?>">
  <span class="error">* <?php echo $deptGovBodyUpErr;?></span>
  <br><br>

  E-mail: <input type="text" name="emailGovBodyUp" value="<?php echo $emailGovBodyUp;?>">
  <span class="error">* <?php echo $emailGovBodyUpErr;?></span>
  <br><br>

 Img: <input type="text" name="imgGovBodyUp" value="<?php echo $imgGovBodyUp;?>">
  <span class="error">* <?php echo $imgGovBodyUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitGovBody3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>



<!--------------------------END OF gov body-------------->

<hr>
<br>
<hr>





<!---------------------------------START - advisors body -------------->


        <h3 > ADVISORS BODY</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalAdvBody">Add</button>

  
      <div class="modal fade" id="myModalAdvBody" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameAdvBodyErr =$deptAdvBodyErr = $emailAdvBodyErr =$imgAdvBodyErr = "";
$nameAdvBody =$deptAdvBody = $emailAdvBody =$imgAdvBody ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitAdvBody1'] )) {



  if (empty($_POST["nameAdvBody"])) {
    $nameAdvBodyErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameAdvBody = test_input($_POST["nameAdvBody"]);
    // check if nameAdvBody only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameAdvBody)) {
      $nameAdvBodyErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }

   if (empty($_POST["deptAdvBody"])) {
    $deptAdvBodyErr = "Dept is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptAdvBody = test_input($_POST["deptAdvBody"]);
  }



  
  if (empty($_POST["emailAdvBody"])) {
    $emailAdvBodyErr = "Email is required";
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $emailAdvBody = test_input($_POST["emailAdvBody"]);
    // check if e-mail address is well-formed
    if (!filter_var($emailAdvBody, FILTER_VALIDATE_EMAIL)) {
      $emailAdvBodyErr = "Invalid email format"; 
      $message = "Invalid email format";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
    }
  }


   if (empty($_POST["imgAdvBody"])) {
    $imgAdvBodyErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgAdvBody = test_input($_POST["imgAdvBody"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO advisorteam (name,dept,email,img)
VALUES ( ?,?,?,?)");

$stmt->bind_param("ssss",  $lnk,$hg,$hd,$ln);
$lnk=$nameAdvBody;
$hg=$deptAdvBody;
$hd=$emailAdvBody;
$ln=$imgAdvBody;
$stmt->execute();

    $stmt->close();

mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  

  Name: <input type="text" name="nameAdvBody" value="<?php echo $nameAdvBody;?>">
  <span class="error">* <?php echo $nameAdvBodyErr;?></span>
  <br><br>

  Dept: <input type="text" name="deptAdvBody" value="<?php echo $deptAdvBody;?>">
  <span class="error">* <?php echo $deptAdvBodyErr;?></span>
  <br><br>
  E-mail: <input type="text" name="emailAdvBody" value="<?php echo $emailAdvBody;?>">
  <span class="error">* <?php echo $emailAdvBodyErr;?></span>
  <br><br>
  Image: <input type="text" name="imgAdvBody" value="<?php echo $imgAdvBody;?>">
  <span class="error">* <?php echo $imgAdvBodyErr;?></span>
  <br><br>
  
  <input type="submit" name="submitAdvBody1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalAdvBody2">DELETE</button>

  
      <div class="modal fade" id="myModalAdvBody2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM advisorteam ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id </strong>".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["name"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeAdvBodyErr =  "";
$nmeAdvBody = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitAdvBody2'] )) {
    
  if (empty($_POST["nmeAdvBody"])) {
    $nmeAdvBodyErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeAdvBody = test_input($_POST["nmeAdvBody"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeAdvBody)) {
      $nmeAdvBodyErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM advisorteam WHERE id='$nmeAdvBody'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeAdvBody;
$sql = "DELETE FROM advisorteam WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeAdvBody" value="<?php echo $nmeAdvBody;?>">
  <span class="error">* <?php echo $nmeAdvBodyErr;?></span>
  <br><br>


  <input type="submit" name="submitAdvBody2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>



<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalAdvBody3">UPDATE</button>

      <div class="modal fade" id="myModalAdvBody3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM advisorteam ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["name"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeAdvBodyUpErr = "";
$nmeAdvBodyUp = 0;
$nameAdvBodyUpErr = $deptAdvBodyUpErr=$emailAdvBodyUpErr=$imgAdvBodyUpErr=  "";
$nameAdvBodyUp = $deptAdvBodyUp =$emailAdvBodyUp =$imgAdvBodyUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitAdvBody3'] )) {




    if (empty($_POST["nmeAdvBodyUp"])) {
    $nmeAdvBodyUpErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeAdvBodyUp = test_input($_POST["nmeAdvBodyUp"]);
    // check if nameAdvBodyUp only contains letters and whitespace
    if (!is_numeric($nmeAdvBodyUp)) {
      $nmeAdvBodyUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM advisorteam WHERE id='$nmeAdvBodyUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }



  if (empty($_POST["nameAdvBodyUp"])) {
    $nameAdvBodyUpErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameAdvBodyUp = test_input($_POST["nameAdvBodyUp"]);
    // check if nameAdvBodyUp only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameAdvBodyUp)) {
      $nameAdvBodyUpErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }



if (empty($_POST["deptAdvBodyUp"])) {
    $deptAdvBodyUpErr = "Department is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptAdvBodyUp = test_input($_POST["deptAdvBodyUp"]);
  }

  
  if (empty($_POST["emailAdvBodyUp"])) {
    $emailAdvBodyUpErr = "Email is required";
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $emailAdvBodyUp = test_input($_POST["emailAdvBodyUp"]);
    // check if e-mail address is well-formed
    if (!filter_var($emailAdvBodyUp, FILTER_VALIDATE_EMAIL)) {
      $emailAdvBodyUpErr = "Invalid email format"; 
      $message = "Invalid email format";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
    }
  }


     if (empty($_POST["imgAdvBodyUp"])) {
    $imgAdvBodyErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgAdvBodyUp = test_input($_POST["imgAdvBodyUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE advisorteam SET  name=?, dept=?, email=?, img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('sssss', $nameAdvBodyUp, $deptAdvBodyUp, $emailAdvBodyUp, $imgAdvBodyUp,$nmeAdvBodyUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();

mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeAdvBodyUp" value="<?php echo $nmeAdvBodyUp;?>">
  <span class="error">* <?php echo $nmeAdvBodyUpErr;?></span>
  <br><br>

  Name: <input type="text" name="nameAdvBodyUp" value="<?php echo $nameAdvBodyUp;?>">
  <span class="error">* <?php echo $nameAdvBodyUpErr;?></span>
  <br><br>

  Dept: <input type="text" name="deptAdvBodyUp" value="<?php echo $deptAdvBodyUp;?>">
  <span class="error">* <?php echo $deptAdvBodyUpErr;?></span>
  <br><br>

  E-mail: <input type="text" name="emailAdvBodyUp" value="<?php echo $emailAdvBodyUp;?>">
  <span class="error">* <?php echo $emailAdvBodyUpErr;?></span>
  <br><br>

 Img: <input type="text" name="imgAdvBodyUp" value="<?php echo $imgAdvBodyUp;?>">
  <span class="error">* <?php echo $imgAdvBodyUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitAdvBody3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>


<!--------------------------END OF advisors body-------------->

<hr>
<br>
<hr>




<!---------------------------------START - members body -------------->


        <h3 > MEMBERS BODY</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalMemBody">Add</button>

  
      <div class="modal fade" id="myModalMemBody" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameMemBodyErr =$deptMemBodyErr = $emailMemBodyErr =$imgMemBodyErr = "";
$nameMemBody =$deptMemBody = $emailMemBody =$imgMemBody ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitMemBody1'] )) {



  if (empty($_POST["nameMemBody"])) {
    $nameMemBodyErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameMemBody = test_input($_POST["nameMemBody"]);
    // check if nameMemBody only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameMemBody)) {
      $nameMemBodyErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }

   if (empty($_POST["deptMemBody"])) {
    $deptMemBodyErr = "Dept is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptMemBody = test_input($_POST["deptMemBody"]);
  }



  
  if (empty($_POST["emailMemBody"])) {
    $emailMemBodyErr = "Email is required";
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $emailMemBody = test_input($_POST["emailMemBody"]);
    // check if e-mail address is well-formed
    if (!filter_var($emailMemBody, FILTER_VALIDATE_EMAIL)) {
      $emailMemBodyErr = "Invalid email format"; 
      $message = "Invalid email format";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
    }
  }


   if (empty($_POST["imgMemBody"])) {
    $imgMemBodyErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgMemBody = test_input($_POST["imgMemBody"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO membersteam (name,dept,email,img)
VALUES ( ?,?,?,?)");

$stmt->bind_param("ssss",  $lnk,$hg,$hd,$ln);
$lnk=$nameMemBody;
$hg=$deptMemBody;
$hd=$emailMemBody;
$ln=$imgMemBody;
$stmt->execute();

    $stmt->close();

mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  

  Name: <input type="text" name="nameMemBody" value="<?php echo $nameMemBody;?>">
  <span class="error">* <?php echo $nameMemBodyErr;?></span>
  <br><br>

  Dept: <input type="text" name="deptMemBody" value="<?php echo $deptMemBody;?>">
  <span class="error">* <?php echo $deptMemBodyErr;?></span>
  <br><br>
  E-mail: <input type="text" name="emailMemBody" value="<?php echo $emailMemBody;?>">
  <span class="error">* <?php echo $emailMemBodyErr;?></span>
  <br><br>
  Image: <input type="text" name="imgMemBody" value="<?php echo $imgMemBody;?>">
  <span class="error">* <?php echo $imgMemBodyErr;?></span>
  <br><br>
  
  <input type="submit" name="submitMemBody1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalMemBody2">DELETE</button>

  
      <div class="modal fade" id="myModalMemBody2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM membersteam ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["name"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeMemBodyErr =  "";
$nmeMemBody = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitMemBody2'] )) {
    
  if (empty($_POST["nmeMemBody"])) {
    $nmeMemBodyErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeMemBody = test_input($_POST["nmeMemBody"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeMemBody)) {
      $nmeMemBodyErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM membersteam WHERE id='$nmeMemBody'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeMemBody;
$sql = "DELETE FROM membersteam WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeMemBody" value="<?php echo $nmeMemBody;?>">
  <span class="error">* <?php echo $nmeMemBodyErr;?></span>
  <br><br>


  <input type="submit" name="submitMemBody2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>




<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalMemBody3">UPDATE</button>

      <div class="modal fade" id="myModalMemBody3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM membersteam ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["name"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeMemBodyUpErr = "";
$nmeMemBodyUp = 0;
$nameMemBodyUpErr = $deptMemBodyUpErr=$emailMemBodyUpErr=$imgMemBodyUpErr=  "";
$nameMemBodyUp = $deptMemBodyUp =$emailMemBodyUp =$imgMemBodyUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitMemBody3'] )) {




    if (empty($_POST["nmeMemBodyUp"])) {
    $nmeMemBodyUpErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeMemBodyUp = test_input($_POST["nmeMemBodyUp"]);
    // check if nameMemBodyUp only contains letters and whitespace
    if (!is_numeric($nmeMemBodyUp)) {
      $nmeMemBodyUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM membersteam WHERE id='$nmeMemBodyUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }



  if (empty($_POST["nameMemBodyUp"])) {
    $nameMemBodyUpErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameMemBodyUp = test_input($_POST["nameMemBodyUp"]);
    // check if nameMemBodyUp only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameMemBodyUp)) {
      $nameMemBodyUpErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }



if (empty($_POST["deptMemBodyUp"])) {
    $deptMemBodyUpErr = "Department is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptMemBodyUp = test_input($_POST["deptMemBodyUp"]);
  }

  
  if (empty($_POST["emailMemBodyUp"])) {
    $emailMemBodyUpErr = "Email is required";
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $emailMemBodyUp = test_input($_POST["emailMemBodyUp"]);
    // check if e-mail address is well-formed
    if (!filter_var($emailMemBodyUp, FILTER_VALIDATE_EMAIL)) {
      $emailMemBodyUpErr = "Invalid email format"; 
      $message = "Invalid email format";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
    }
  }


     if (empty($_POST["imgMemBodyUp"])) {
    $imgMemBodyErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgMemBodyUp = test_input($_POST["imgMemBodyUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE membersteam SET  name=?, dept=?, email=?, img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('sssss', $nameMemBodyUp, $deptMemBodyUp, $emailMemBodyUp, $imgMemBodyUp,$nmeMemBodyUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();

mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeMemBodyUp" value="<?php echo $nmeMemBodyUp;?>">
  <span class="error">* <?php echo $nmeMemBodyUpErr;?></span>
  <br><br>

  Name: <input type="text" name="nameMemBodyUp" value="<?php echo $nameMemBodyUp;?>">
  <span class="error">* <?php echo $nameMemBodyUpErr;?></span>
  <br><br>

  Dept: <input type="text" name="deptMemBodyUp" value="<?php echo $deptMemBodyUp;?>">
  <span class="error">* <?php echo $deptMemBodyUpErr;?></span>
  <br><br>

  E-mail: <input type="text" name="emailMemBodyUp" value="<?php echo $emailMemBodyUp;?>">
  <span class="error">* <?php echo $emailMemBodyUpErr;?></span>
  <br><br>

 Img: <input type="text" name="imgMemBodyUp" value="<?php echo $imgMemBodyUp;?>">
  <span class="error">* <?php echo $imgMemBodyUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitMemBody3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>



<!--------------------------END OF members body-------------->

<hr>
<br>
<hr>






<!---------------------------------START - Resources Report-------------->


        <h3 > RESOURCES REPORTS</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalResRep">Add</button>

  
      <div class="modal fade" id="myModalResRep" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameResRepErr =$deptResRepErr = $emailResRepErr =$imgResRepErr = "";
$nameResRep =$deptResRep = $emailResRep =$imgResRep ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitResRep1'] )) {



  if (empty($_POST["nameResRep"])) {
    $nameResRepErr = "Data is required";
$message = "Data is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameResRep = test_input($_POST["nameResRep"]);
  }

   if (empty($_POST["deptResRep"])) {
    $deptResRepErr = "Document is required";
$message = "Document is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptResRep = test_input($_POST["deptResRep"]);
  }





   if (empty($_POST["imgResRep"])) {
    $imgResRepErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgResRep = test_input($_POST["imgResRep"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO res_reports (data,doc,img)
VALUES ( ?,?,?)");

$stmt->bind_param("sss",  $lnk,$hg,$ln);
$lnk=$nameResRep;
$hg=$deptResRep;
$ln=$imgResRep;
$stmt->execute();

    $stmt->close();



mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  

  Data: <input type="text" name="nameResRep" value="<?php echo $nameResRep;?>">
  <span class="error">* <?php echo $nameResRepErr;?></span>
  <br><br>

  Docm: <input type="text" name="deptResRep" value="<?php echo $deptResRep;?>">
  <span class="error">* <?php echo $deptResRepErr;?></span>
  <br><br>

  Image : <input type="text" name="imgResRep" value="<?php echo $imgResRep;?>">
  <span class="error">* <?php echo $imgResRepErr;?></span>
  <br><br>
  
  <input type="submit" name="submitResRep1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalResRep2">DELETE</button>

  
      <div class="modal fade" id="myModalResRep2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM res_reports ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["data"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeResRepErr =  "";
$nmeResRep = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitResRep2'] )) {
    
  if (empty($_POST["nmeResRep"])) {
    $nmeResRepErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeResRep = test_input($_POST["nmeResRep"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeResRep)) {
      $nmeResRepErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM res_reports WHERE id='$nmeResRep'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeResRep;
$sql = "DELETE FROM res_reports WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeResRep" value="<?php echo $nmeResRep;?>">
  <span class="error">* <?php echo $nmeResRepErr;?></span>
  <br><br>


  <input type="submit" name="submitResRep2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>




<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalResRep3">UPDATE</button>

      <div class="modal fade" id="myModalResRep3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM res_reports ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["data"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeResRepUpErr = "";
$nmeResRepUp = 0;
$nameResRepUpErr = $deptResRepUpErr=$emailResRepUpErr=$imgResRepUpErr=  "";
$nameResRepUp = $deptResRepUp =$emailResRepUp =$imgResRepUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitResRep3'] )) {




    if (empty($_POST["nmeResRepUp"])) {
    $nmeResRepUpErr = "Name is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeResRepUp = test_input($_POST["nmeResRepUp"]);
    // check if nameResRepUp only contains letters and whitespace
    if (!is_numeric($nmeResRepUp)) {
      $nmeResRepUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM res_reports WHERE id='$nmeResRepUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }



  if (empty($_POST["nameResRepUp"])) {
    $nameResRepUpErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameResRepUp = test_input($_POST["nameResRepUp"]);
    // check if nameResRepUp only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameResRepUp)) {
      $nameResRepUpErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }



if (empty($_POST["deptResRepUp"])) {
    $deptResRepUpErr = "Department is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptResRepUp = test_input($_POST["deptResRepUp"]);
  }




     if (empty($_POST["imgResRepUp"])) {
    $imgResRepErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgResRepUp = test_input($_POST["imgResRepUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE res_reports SET  data=?, doc=?, img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('ssss', $nameResRepUp, $deptResRepUp, $imgResRepUp,$nmeResRepUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();
mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeResRepUp" value="<?php echo $nmeResRepUp;?>">
  <span class="error">* <?php echo $nmeResRepUpErr;?></span>
  <br><br>

  Data: <input type="text" name="nameResRepUp" value="<?php echo $nameResRepUp;?>">
  <span class="error">* <?php echo $nameResRepUpErr;?></span>
  <br><br>

  Docm: <input type="text" name="deptResRepUp" value="<?php echo $deptResRepUp;?>">
  <span class="error">* <?php echo $deptResRepUpErr;?></span>
  <br><br>


 Image: <input type="text" name="imgResRepUp" value="<?php echo $imgResRepUp;?>">
  <span class="error">* <?php echo $imgResRepUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitResRep3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>






<!--------------------------END OF Resources Reports-------------->

<hr>
<br>
<hr>



<!---------------------------------START - Finance Report-------------->


        <h3 > FINANCE REPORTS</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalFinRep">Add</button>

  
      <div class="modal fade" id="myModalFinRep" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameFinRepErr =$deptFinRepErr = $emailFinRepErr =$imgFinRepErr = "";
$nameFinRep =$deptFinRep = $emailFinRep =$imgFinRep ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitFinRep1'] )) {



  if (empty($_POST["nameFinRep"])) {
    $nameFinRepErr = "Data is required";
$message = "Data is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameFinRep = test_input($_POST["nameFinRep"]);
  }

   if (empty($_POST["deptFinRep"])) {
    $deptFinRepErr = "Document is required";
$message = "Document is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptFinRep = test_input($_POST["deptFinRep"]);
  }





   if (empty($_POST["imgFinRep"])) {
    $imgFinRepErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgFinRep = test_input($_POST["imgFinRep"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO fin_reports (data,doc,img)
VALUES ( ?,?,?)");

$stmt->bind_param("sss",  $lnk,$hg,$ln);
$lnk=$nameFinRep;
$hg=$deptFinRep;
$ln=$imgFinRep;
$stmt->execute();

    $stmt->close();



mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  

  Data: <input type="text" name="nameFinRep" value="<?php echo $nameFinRep;?>">
  <span class="error">* <?php echo $nameFinRepErr;?></span>
  <br><br>

  Docm: <input type="text" name="deptFinRep" value="<?php echo $deptFinRep;?>">
  <span class="error">* <?php echo $deptFinRepErr;?></span>
  <br><br>

  Image : <input type="text" name="imgFinRep" value="<?php echo $imgFinRep;?>">
  <span class="error">* <?php echo $imgFinRepErr;?></span>
  <br><br>
  
  <input type="submit" name="submitFinRep1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalFinRep2">DELETE</button>

  
      <div class="modal fade" id="myModalFinRep2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM fin_reports ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["data"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeFinRepErr =  "";
$nmeFinRep = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitFinRep2'] )) {
    
  if (empty($_POST["nmeFinRep"])) {
    $nmeFinRepErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeFinRep = test_input($_POST["nmeFinRep"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeFinRep)) {
      $nmeFinRepErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM fin_reports WHERE id='$nmeFinRep'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeFinRep;
$sql = "DELETE FROM fin_reports WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeFinRep" value="<?php echo $nmeFinRep;?>">
  <span class="error">* <?php echo $nmeFinRepErr;?></span>
  <br><br>


  <input type="submit" name="submitFinRep2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>




<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalFinRep3">UPDATE</button>

      <div class="modal fade" id="myModalFinRep3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM fin_reports ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["data"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeFinRepUpErr = "";
$nmeFinRepUp = 0;
$nameFinRepUpErr = $deptFinRepUpErr=$emailFinRepUpErr=$imgFinRepUpErr=  "";
$nameFinRepUp = $deptFinRepUp =$emailFinRepUp =$imgFinRepUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitFinRep3'] )) {




    if (empty($_POST["nmeFinRepUp"])) {
    $nmeFinRepUpErr = "Name is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeFinRepUp = test_input($_POST["nmeFinRepUp"]);
    // check if nameFinRepUp only contains letters and whitespace
    if (!is_numeric($nmeFinRepUp)) {
      $nmeFinRepUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM fin_reports WHERE id='$nmeFinRepUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }



  if (empty($_POST["nameFinRepUp"])) {
    $nameFinRepUpErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameFinRepUp = test_input($_POST["nameFinRepUp"]);
    // check if nameFinRepUp only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameFinRepUp)) {
      $nameFinRepUpErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }



if (empty($_POST["deptFinRepUp"])) {
    $deptFinRepUpErr = "Department is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptFinRepUp = test_input($_POST["deptFinRepUp"]);
  }




     if (empty($_POST["imgFinRepUp"])) {
    $imgFinRepErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgFinRepUp = test_input($_POST["imgFinRepUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE fin_reports SET  data=?, doc=?, img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('ssss', $nameFinRepUp, $deptFinRepUp, $imgFinRepUp,$nmeFinRepUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();
mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeFinRepUp" value="<?php echo $nmeFinRepUp;?>">
  <span class="error">* <?php echo $nmeFinRepUpErr;?></span>
  <br><br>

  Data: <input type="text" name="nameFinRepUp" value="<?php echo $nameFinRepUp;?>">
  <span class="error">* <?php echo $nameFinRepUpErr;?></span>
  <br><br>

  Docm: <input type="text" name="deptFinRepUp" value="<?php echo $deptFinRepUp;?>">
  <span class="error">* <?php echo $deptFinRepUpErr;?></span>
  <br><br>


 Image: <input type="text" name="imgFinRepUp" value="<?php echo $imgFinRepUp;?>">
  <span class="error">* <?php echo $imgFinRepUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitFinRep3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>



<hr>
<br>
<hr>


<!--------------------------END OF Finance Reports-------------->





<!---------------------------------START -Other Resources Report-------------->


        <h3 >OTHER RESOURCES REPORTS</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalOthResRep">Add</button>

  
      <div class="modal fade" id="myModalOthResRep" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameOthResRepErr =$deptOthResRepErr = $emailOthResRepErr =$imgOthResRepErr = "";
$nameOthResRep =$deptOthResRep = $emailOthResRep =$imgOthResRep ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitOthResRep1'] )) {



  if (empty($_POST["nameOthResRep"])) {
    $nameOthResRepErr = "Data is required";
$message = "Data is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameOthResRep = test_input($_POST["nameOthResRep"]);
  }

   if (empty($_POST["deptOthResRep"])) {
    $deptOthResRepErr = "Document is required";
$message = "Document is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptOthResRep = test_input($_POST["deptOthResRep"]);
  }





   if (empty($_POST["imgOthResRep"])) {
    $imgOthResRepErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgOthResRep = test_input($_POST["imgOthResRep"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO oth_res_reports (data,doc,img)
VALUES ( ?,?,?)");

$stmt->bind_param("sss",  $lnk,$hg,$ln);
$lnk=$nameOthResRep;
$hg=$deptOthResRep;
$ln=$imgOthResRep;
$stmt->execute();

    $stmt->close();



mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  

  Data: <input type="text" name="nameOthResRep" value="<?php echo $nameOthResRep;?>">
  <span class="error">* <?php echo $nameOthResRepErr;?></span>
  <br><br>

  Docm: <input type="text" name="deptOthResRep" value="<?php echo $deptOthResRep;?>">
  <span class="error">* <?php echo $deptOthResRepErr;?></span>
  <br><br>

  Image : <input type="text" name="imgOthResRep" value="<?php echo $imgOthResRep;?>">
  <span class="error">* <?php echo $imgOthResRepErr;?></span>
  <br><br>
  
  <input type="submit" name="submitOthResRep1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalOthResRep2">DELETE</button>

  
      <div class="modal fade" id="myModalOthResRep2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM oth_res_reports ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["data"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeOthResRepErr =  "";
$nmeOthResRep = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitOthResRep2'] )) {
    
  if (empty($_POST["nmeOthResRep"])) {
    $nmeOthResRepErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeOthResRep = test_input($_POST["nmeOthResRep"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeOthResRep)) {
      $nmeOthResRepErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM oth_res_reports WHERE id='$nmeOthResRep'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeOthResRep;
$sql = "DELETE FROM oth_res_reports WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeOthResRep" value="<?php echo $nmeOthResRep;?>">
  <span class="error">* <?php echo $nmeOthResRepErr;?></span>
  <br><br>


  <input type="submit" name="submitOthResRep2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>




<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalOthResRep3">UPDATE</button>

      <div class="modal fade" id="myModalOthResRep3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM oth_res_reports ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["data"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeOthResRepUpErr = "";
$nmeOthResRepUp = 0;
$nameOthResRepUpErr = $deptOthResRepUpErr=$emailOthResRepUpErr=$imgOthResRepUpErr=  "";
$nameOthResRepUp = $deptOthResRepUp =$emailOthResRepUp =$imgOthResRepUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitOthResRep3'] )) {




    if (empty($_POST["nmeOthResRepUp"])) {
    $nmeOthResRepUpErr = "Name is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeOthResRepUp = test_input($_POST["nmeOthResRepUp"]);
    // check if nameOthResRepUp only contains letters and whitespace
    if (!is_numeric($nmeOthResRepUp)) {
      $nmeOthResRepUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM oth_res_reports WHERE id='$nmeOthResRepUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }



  if (empty($_POST["nameOthResRepUp"])) {
    $nameOthResRepUpErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameOthResRepUp = test_input($_POST["nameOthResRepUp"]);
    // check if nameOthResRepUp only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameOthResRepUp)) {
      $nameOthResRepUpErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }



if (empty($_POST["deptOthResRepUp"])) {
    $deptOthResRepUpErr = "Department is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptOthResRepUp = test_input($_POST["deptOthResRepUp"]);
  }




     if (empty($_POST["imgOthResRepUp"])) {
    $imgOthResRepErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgOthResRepUp = test_input($_POST["imgOthResRepUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE oth_res_reports SET  data=?, doc=?, img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('ssss', $nameOthResRepUp, $deptOthResRepUp, $imgOthResRepUp,$nmeOthResRepUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();
mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeOthResRepUp" value="<?php echo $nmeOthResRepUp;?>">
  <span class="error">* <?php echo $nmeOthResRepUpErr;?></span>
  <br><br>

  Data: <input type="text" name="nameOthResRepUp" value="<?php echo $nameOthResRepUp;?>">
  <span class="error">* <?php echo $nameOthResRepUpErr;?></span>
  <br><br>

  Docm: <input type="text" name="deptOthResRepUp" value="<?php echo $deptOthResRepUp;?>">
  <span class="error">* <?php echo $deptOthResRepUpErr;?></span>
  <br><br>


 Image: <input type="text" name="imgOthResRepUp" value="<?php echo $imgOthResRepUp;?>">
  <span class="error">* <?php echo $imgOthResRepUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitOthResRep3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>

<hr>
<br>
<hr>




<!--------------------------END OF Other Resources Reports-------------->




<!---------------------------------START - NEWS AND ANNOUNCEMENT-------------->


        <h3 > NEWS AND ANNOUNCEMENT</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalNewsAn">Add</button>

  
      <div class="modal fade" id="myModalNewsAn" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameNewsAnErr =$deptNewsAnErr = $emailNewsAnErr =$imgNewsAnErr = "";
$nameNewsAn =$deptNewsAn = $emailNewsAn =$imgNewsAn ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitNewsAn1'] )) {



  if (empty($_POST["nameNewsAn"])) {
    $nameNewsAnErr = "Data is required";
$message = "Data is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameNewsAn = test_input($_POST["nameNewsAn"]);
  }

   if (empty($_POST["deptNewsAn"])) {
    $deptNewsAnErr = "Document is required";
$message = "Document is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptNewsAn = test_input($_POST["deptNewsAn"]);
  }




    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO news_and_annc (data,link)
VALUES ( ?,?)");

$stmt->bind_param("ss",  $lnk,$hg);
$lnk=$nameNewsAn;
$hg=$deptNewsAn;
$stmt->execute();

    $stmt->close();



mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  

  Data: <input type="text" name="nameNewsAn" value="<?php echo $nameNewsAn;?>">
  <span class="error">* <?php echo $nameNewsAnErr;?></span>
  <br><br>

  Link: <input type="text" name="deptNewsAn" value="<?php echo $deptNewsAn;?>">
  <span class="error">* <?php echo $deptNewsAnErr;?></span>
  <br><br>


  
  <input type="submit" name="submitNewsAn1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalNewsAn2">DELETE</button>

  
      <div class="modal fade" id="myModalNewsAn2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM news_and_annc ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["data"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeNewsAnErr =  "";
$nmeNewsAn = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitNewsAn2'] )) {
    
  if (empty($_POST["nmeNewsAn"])) {
    $nmeNewsAnErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeNewsAn = test_input($_POST["nmeNewsAn"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeNewsAn)) {
      $nmeNewsAnErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM news_and_annc WHERE id='$nmeNewsAn'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeNewsAn;
$sql = "DELETE FROM news_and_annc WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeNewsAn" value="<?php echo $nmeNewsAn;?>">
  <span class="error">* <?php echo $nmeNewsAnErr;?></span>
  <br><br>


  <input type="submit" name="submitNewsAn2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>




<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalNewsAn3">UPDATE</button>

      <div class="modal fade" id="myModalNewsAn3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM news_and_annc ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["data"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeNewsAnUpErr = "";
$nmeNewsAnUp = 0;
$nameNewsAnUpErr = $deptNewsAnUpErr=$emailNewsAnUpErr=$imgNewsAnUpErr=  "";
$nameNewsAnUp = $deptNewsAnUp =$emailNewsAnUp =$imgNewsAnUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitNewsAn3'] )) {




    if (empty($_POST["nmeNewsAnUp"])) {
    $nmeNewsAnUpErr = "Name is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeNewsAnUp = test_input($_POST["nmeNewsAnUp"]);
    // check if nameNewsAnUp only contains letters and whitespace
    if (!is_numeric($nmeNewsAnUp)) {
      $nmeNewsAnUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM news_and_annc WHERE id='$nmeNewsAnUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }



  if (empty($_POST["nameNewsAnUp"])) {
    $nameNewsAnUpErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameNewsAnUp = test_input($_POST["nameNewsAnUp"]);
    // check if nameNewsAnUp only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameNewsAnUp)) {
      $nameNewsAnUpErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }



if (empty($_POST["deptNewsAnUp"])) {
    $deptNewsAnUpErr = "Department is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptNewsAnUp = test_input($_POST["deptNewsAnUp"]);
  }



    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE news_and_annc SET  data=?, link=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('sss', $nameNewsAnUp, $deptNewsAnUp ,$nmeNewsAnUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();
mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeNewsAnUp" value="<?php echo $nmeNewsAnUp;?>">
  <span class="error">* <?php echo $nmeNewsAnUpErr;?></span>
  <br><br>

  Data: <input type="text" name="nameNewsAnUp" value="<?php echo $nameNewsAnUp;?>">
  <span class="error">* <?php echo $nameNewsAnUpErr;?></span>
  <br><br>

  Link: <input type="text" name="deptNewsAnUp" value="<?php echo $deptNewsAnUp;?>">
  <span class="error">* <?php echo $deptNewsAnUpErr;?></span>
  <br><br>


  <br><br>

  
  <input type="submit" name="submitNewsAn3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>






<!--------------------------END OF NEWS AND ANNOUNCEMENT-------------->

<hr>
<br>
<hr>





<!---------------------------------START -  Events and Updates of home page-------------->


        <h3 > EVENTS AND UPDATES OF HOME PAGE</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalEvnAndUp">Add</button>

  
      <div class="modal fade" id="myModalEvnAndUp" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameEvnAndUpErr =$deptEvnAndUpErr = $emailEvnAndUpErr =$imgEvnAndUpErr = "";
$nameEvnAndUp =$deptEvnAndUp = $emailEvnAndUp =$imgEvnAndUp ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitEvnAndUp1'] )) {



  if (empty($_POST["nameEvnAndUp"])) {
    $nameEvnAndUpErr = "Data is required";
$message = "Data is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameEvnAndUp = test_input($_POST["nameEvnAndUp"]);
  }

   if (empty($_POST["deptEvnAndUp"])) {
    $deptEvnAndUpErr = "Document is required";
$message = "Document is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptEvnAndUp = test_input($_POST["deptEvnAndUp"]);
  }





   if (empty($_POST["imgEvnAndUp"])) {
    $imgEvnAndUpErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgEvnAndUp = test_input($_POST["imgEvnAndUp"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO events_and_up (data,doc,img)
VALUES ( ?,?,?)");

$stmt->bind_param("sss",  $lnk,$hg,$ln);
$lnk=$nameEvnAndUp;
$hg=$deptEvnAndUp;
$ln=$imgEvnAndUp;
$stmt->execute();

    $stmt->close();



mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  

  Data: <input type="text" name="nameEvnAndUp" value="<?php echo $nameEvnAndUp;?>">
  <span class="error">* <?php echo $nameEvnAndUpErr;?></span>
  <br><br>

  Docm: <input type="text" name="deptEvnAndUp" value="<?php echo $deptEvnAndUp;?>">
  <span class="error">* <?php echo $deptEvnAndUpErr;?></span>
  <br><br>

  Image : <input type="text" name="imgEvnAndUp" value="<?php echo $imgEvnAndUp;?>">
  <span class="error">* <?php echo $imgEvnAndUpErr;?></span>
  <br><br>
  
  <input type="submit" name="submitEvnAndUp1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalEvnAndUp2">DELETE</button>

  
      <div class="modal fade" id="myModalEvnAndUp2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM events_and_up ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["data"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeEvnAndUpErr =  "";
$nmeEvnAndUp = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitEvnAndUp2'] )) {
    
  if (empty($_POST["nmeEvnAndUp"])) {
    $nmeEvnAndUpErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeEvnAndUp = test_input($_POST["nmeEvnAndUp"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeEvnAndUp)) {
      $nmeEvnAndUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM events_and_up WHERE id='$nmeEvnAndUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeEvnAndUp;
$sql = "DELETE FROM events_and_up WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeEvnAndUp" value="<?php echo $nmeEvnAndUp;?>">
  <span class="error">* <?php echo $nmeEvnAndUpErr;?></span>
  <br><br>


  <input type="submit" name="submitEvnAndUp2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>




<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalEvnAndUp3">UPDATE</button>

      <div class="modal fade" id="myModalEvnAndUp3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM events_and_up ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["data"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeEvnAndUpUpErr = "";
$nmeEvnAndUpUp = 0;
$nameEvnAndUpUpErr = $deptEvnAndUpUpErr=$emailEvnAndUpUpErr=$imgEvnAndUpUpErr=  "";
$nameEvnAndUpUp = $deptEvnAndUpUp =$emailEvnAndUpUp =$imgEvnAndUpUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitEvnAndUp3'] )) {




    if (empty($_POST["nmeEvnAndUpUp"])) {
    $nmeEvnAndUpUpErr = "Name is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeEvnAndUpUp = test_input($_POST["nmeEvnAndUpUp"]);
    // check if nameEvnAndUpUp only contains letters and whitespace
    if (!is_numeric($nmeEvnAndUpUp)) {
      $nmeEvnAndUpUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM events_and_up WHERE id='$nmeEvnAndUpUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }



  if (empty($_POST["nameEvnAndUpUp"])) {
    $nameEvnAndUpUpErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameEvnAndUpUp = test_input($_POST["nameEvnAndUpUp"]);
    // check if nameEvnAndUpUp only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameEvnAndUpUp)) {
      $nameEvnAndUpUpErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }



if (empty($_POST["deptEvnAndUpUp"])) {
    $deptEvnAndUpUpErr = "Department is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptEvnAndUpUp = test_input($_POST["deptEvnAndUpUp"]);
  }




     if (empty($_POST["imgEvnAndUpUp"])) {
    $imgEvnAndUpErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgEvnAndUpUp = test_input($_POST["imgEvnAndUpUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE events_and_up SET  data=?, doc=?, img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('ssss', $nameEvnAndUpUp, $deptEvnAndUpUp, $imgEvnAndUpUp,$nmeEvnAndUpUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();
mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeEvnAndUpUp" value="<?php echo $nmeEvnAndUpUp;?>">
  <span class="error">* <?php echo $nmeEvnAndUpUpErr;?></span>
  <br><br>

  Data: <input type="text" name="nameEvnAndUpUp" value="<?php echo $nameEvnAndUpUp;?>">
  <span class="error">* <?php echo $nameEvnAndUpUpErr;?></span>
  <br><br>

  Docm: <input type="text" name="deptEvnAndUpUp" value="<?php echo $deptEvnAndUpUp;?>">
  <span class="error">* <?php echo $deptEvnAndUpUpErr;?></span>
  <br><br>


 Image: <input type="text" name="imgEvnAndUpUp" value="<?php echo $imgEvnAndUpUp;?>">
  <span class="error">* <?php echo $imgEvnAndUpUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitEvnAndUp3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>






<!--------------------------END OF Events and Updates of home page-------------->

<hr>
<br>
<hr>


<!---------------------------------START -Home Carousal-------------->


        <h3 >HOME CAROUSAL</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalHomeCar">Add</button>

  
      <div class="modal fade" id="myModalHomeCar" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameHomeCarErr =$deptHomeCarErr = $emailHomeCarErr =$imgHomeCarErr = "";
$nameHomeCar =$deptHomeCar = $emailHomeCar =$imgHomeCar ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitHomeCar1'] )) {





   if (empty($_POST["imgHomeCar"])) {
    $imgHomeCarErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgHomeCar = test_input($_POST["imgHomeCar"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO home_carousal (img)
VALUES (?)");

$stmt->bind_param("s",$ln);
$ln=$imgHomeCar;
$stmt->execute();

    $stmt->close();



mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  Image : <input type="text" name="imgHomeCar" value="<?php echo $imgHomeCar;?>">
  <span class="error">* <?php echo $imgHomeCarErr;?></span>
  <br><br>
  
  <input type="submit" name="submitHomeCar1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalHomeCar2">DELETE</button>

  
      <div class="modal fade" id="myModalHomeCar2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM home_carousal ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["img"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeHomeCarErr =  "";
$nmeHomeCar = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitHomeCar2'] )) {
    
  if (empty($_POST["nmeHomeCar"])) {
    $nmeHomeCarErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeHomeCar = test_input($_POST["nmeHomeCar"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeHomeCar)) {
      $nmeHomeCarErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM home_carousal WHERE id='$nmeHomeCar'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeHomeCar;
$sql = "DELETE FROM home_carousal WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeHomeCar" value="<?php echo $nmeHomeCar;?>">
  <span class="error">* <?php echo $nmeHomeCarErr;?></span>
  <br><br>


  <input type="submit" name="submitHomeCar2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>




<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalHomeCar3">UPDATE</button>

      <div class="modal fade" id="myModalHomeCar3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM home_carousal ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["img"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeHomeCarUpErr = "";
$nmeHomeCarUp = 0;
$nameHomeCarUpErr = $deptHomeCarUpErr=$emailHomeCarUpErr=$imgHomeCarUpErr=  "";
$nameHomeCarUp = $deptHomeCarUp =$emailHomeCarUp =$imgHomeCarUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitHomeCar3'] )) {




    if (empty($_POST["nmeHomeCarUp"])) {
    $nmeHomeCarUpErr = "Name is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeHomeCarUp = test_input($_POST["nmeHomeCarUp"]);
    // check if nameHomeCarUp only contains letters and whitespace
    if (!is_numeric($nmeHomeCarUp)) {
      $nmeHomeCarUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM home_carousal WHERE id='$nmeHomeCarUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }





     if (empty($_POST["imgHomeCarUp"])) {
    $imgHomeCarErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgHomeCarUp = test_input($_POST["imgHomeCarUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE home_carousal SET   img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('ss',  $imgHomeCarUp,$nmeHomeCarUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();
mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeHomeCarUp" value="<?php echo $nmeHomeCarUp;?>">
  <span class="error">* <?php echo $nmeHomeCarUpErr;?></span>
  <br><br>


 Image: <input type="text" name="imgHomeCarUp" value="<?php echo $imgHomeCarUp;?>">
  <span class="error">* <?php echo $imgHomeCarUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitHomeCar3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>

<hr>
<br>
<hr>




<!--------------------------END OF Home Carousal-------------->




<!---------------------------------START -Gallery Project-------------->


        <h3 >GALLERY- PROJECT</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGalPro">Add</button>

  
      <div class="modal fade" id="myModalGalPro" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameGalProErr =$deptGalProErr = $emailGalProErr =$imgGalProErr = "";
$nameGalPro =$deptGalPro = $emailGalPro =$imgGalPro ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGalPro1'] )) {





   if (empty($_POST["imgGalPro"])) {
    $imgGalProErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgGalPro = test_input($_POST["imgGalPro"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO gallery_proj (img)
VALUES (?)");

$stmt->bind_param("s",$ln);
$ln=$imgGalPro;
$stmt->execute();

    $stmt->close();



mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  Image : <input type="text" name="imgGalPro" value="<?php echo $imgGalPro;?>">
  <span class="error">* <?php echo $imgGalProErr;?></span>
  <br><br>
  
  <input type="submit" name="submitGalPro1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGalPro2">DELETE</button>

  
      <div class="modal fade" id="myModalGalPro2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM gallery_proj ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["img"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeGalProErr =  "";
$nmeGalPro = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGalPro2'] )) {
    
  if (empty($_POST["nmeGalPro"])) {
    $nmeGalProErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeGalPro = test_input($_POST["nmeGalPro"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeGalPro)) {
      $nmeGalProErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM gallery_proj WHERE id='$nmeGalPro'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeGalPro;
$sql = "DELETE FROM gallery_proj WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeGalPro" value="<?php echo $nmeGalPro;?>">
  <span class="error">* <?php echo $nmeGalProErr;?></span>
  <br><br>


  <input type="submit" name="submitGalPro2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>




<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGalPro3">UPDATE</button>

      <div class="modal fade" id="myModalGalPro3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM gallery_proj ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["img"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeGalProUpErr = "";
$nmeGalProUp = 0;
$nameGalProUpErr = $deptGalProUpErr=$emailGalProUpErr=$imgGalProUpErr=  "";
$nameGalProUp = $deptGalProUp =$emailGalProUp =$imgGalProUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGalPro3'] )) {




    if (empty($_POST["nmeGalProUp"])) {
    $nmeGalProUpErr = "Name is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeGalProUp = test_input($_POST["nmeGalProUp"]);
    // check if nameGalProUp only contains letters and whitespace
    if (!is_numeric($nmeGalProUp)) {
      $nmeGalProUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM gallery_proj WHERE id='$nmeGalProUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }





     if (empty($_POST["imgGalProUp"])) {
    $imgGalProErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgGalProUp = test_input($_POST["imgGalProUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE gallery_proj SET   img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('ss',  $imgGalProUp,$nmeGalProUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();
mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeGalProUp" value="<?php echo $nmeGalProUp;?>">
  <span class="error">* <?php echo $nmeGalProUpErr;?></span>
  <br><br>


 Image: <input type="text" name="imgGalProUp" value="<?php echo $imgGalProUp;?>">
  <span class="error">* <?php echo $imgGalProUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitGalPro3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>

<hr>
<br>
<hr>




<!--------------------------END OF Gallery Proj-------------->




<!---------------------------------START -Gallery Team and Volunteer-------------->


        <h3 >GALLERY- VOLUNTEERS</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGalTeamVol">Add</button>

  
      <div class="modal fade" id="myModalGalTeamVol" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameGalTeamVolErr =$deptGalTeamVolErr = $emailGalTeamVolErr =$imgGalTeamVolErr = "";
$nameGalTeamVol =$deptGalTeamVol = $emailGalTeamVol =$imgGalTeamVol ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGalTeamVol1'] )) {





   if (empty($_POST["imgGalTeamVol"])) {
    $imgGalTeamVolErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgGalTeamVol = test_input($_POST["imgGalTeamVol"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO gallery_team_vol (img)
VALUES (?)");

$stmt->bind_param("s",$ln);
$ln=$imgGalTeamVol;
$stmt->execute();

    $stmt->close();



mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  Image : <input type="text" name="imgGalTeamVol" value="<?php echo $imgGalTeamVol;?>">
  <span class="error">* <?php echo $imgGalTeamVolErr;?></span>
  <br><br>
  
  <input type="submit" name="submitGalTeamVol1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGalTeamVol2">DELETE</button>

  
      <div class="modal fade" id="myModalGalTeamVol2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM gallery_team_vol ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["img"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeGalTeamVolErr =  "";
$nmeGalTeamVol = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGalTeamVol2'] )) {
    
  if (empty($_POST["nmeGalTeamVol"])) {
    $nmeGalTeamVolErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeGalTeamVol = test_input($_POST["nmeGalTeamVol"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeGalTeamVol)) {
      $nmeGalTeamVolErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM gallery_team_vol WHERE id='$nmeGalTeamVol'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeGalTeamVol;
$sql = "DELETE FROM gallery_team_vol WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeGalTeamVol" value="<?php echo $nmeGalTeamVol;?>">
  <span class="error">* <?php echo $nmeGalTeamVolErr;?></span>
  <br><br>


  <input type="submit" name="submitGalTeamVol2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>




<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGalTeamVol3">UPDATE</button>

      <div class="modal fade" id="myModalGalTeamVol3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM gallery_team_vol ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["img"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeGalTeamVolUpErr = "";
$nmeGalTeamVolUp = 0;
$nameGalTeamVolUpErr = $deptGalTeamVolUpErr=$emailGalTeamVolUpErr=$imgGalTeamVolUpErr=  "";
$nameGalTeamVolUp = $deptGalTeamVolUp =$emailGalTeamVolUp =$imgGalTeamVolUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGalTeamVol3'] )) {




    if (empty($_POST["nmeGalTeamVolUp"])) {
    $nmeGalTeamVolUpErr = "Name is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeGalTeamVolUp = test_input($_POST["nmeGalTeamVolUp"]);
    // check if nameGalTeamVolUp only contains letters and whitespace
    if (!is_numeric($nmeGalTeamVolUp)) {
      $nmeGalTeamVolUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM gallery_team_vol WHERE id='$nmeGalTeamVolUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }





     if (empty($_POST["imgGalTeamVolUp"])) {
    $imgGalTeamVolErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgGalTeamVolUp = test_input($_POST["imgGalTeamVolUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE gallery_team_vol SET   img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('ss',  $imgGalTeamVolUp,$nmeGalTeamVolUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();
mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeGalTeamVolUp" value="<?php echo $nmeGalTeamVolUp;?>">
  <span class="error">* <?php echo $nmeGalTeamVolUpErr;?></span>
  <br><br>


 Image: <input type="text" name="imgGalTeamVolUp" value="<?php echo $imgGalTeamVolUp;?>">
  <span class="error">* <?php echo $imgGalTeamVolUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitGalTeamVol3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>

<hr>
<br>
<hr>




<!--------------------------END OF Gallery team and Volunteer-------------->






<!---------------------------------START -Gallery Outreach-------------->


        <h3 >GALLERY- OUTREACH</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGalOut">Add</button>

  
      <div class="modal fade" id="myModalGalOut" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameGalOutErr =$deptGalOutErr = $emailGalOutErr =$imgGalOutErr = "";
$nameGalOut =$deptGalOut = $emailGalOut =$imgGalOut ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGalOut1'] )) {





   if (empty($_POST["imgGalOut"])) {
    $imgGalOutErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgGalOut = test_input($_POST["imgGalOut"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO gallery_outreach (img)
VALUES (?)");

$stmt->bind_param("s",$ln);
$ln=$imgGalOut;
$stmt->execute();

    $stmt->close();



mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  Image : <input type="text" name="imgGalOut" value="<?php echo $imgGalOut;?>">
  <span class="error">* <?php echo $imgGalOutErr;?></span>
  <br><br>
  
  <input type="submit" name="submitGalOut1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGalOut2">DELETE</button>

  
      <div class="modal fade" id="myModalGalOut2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM gallery_outreach ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["img"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeGalOutErr =  "";
$nmeGalOut = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGalOut2'] )) {
    
  if (empty($_POST["nmeGalOut"])) {
    $nmeGalOutErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeGalOut = test_input($_POST["nmeGalOut"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeGalOut)) {
      $nmeGalOutErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM gallery_outreach WHERE id='$nmeGalOut'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeGalOut;
$sql = "DELETE FROM gallery_outreach WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeGalOut" value="<?php echo $nmeGalOut;?>">
  <span class="error">* <?php echo $nmeGalOutErr;?></span>
  <br><br>


  <input type="submit" name="submitGalOut2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>




<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGalOut3">UPDATE</button>

      <div class="modal fade" id="myModalGalOut3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM gallery_outreach ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["img"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeGalOutUpErr = "";
$nmeGalOutUp = 0;
$nameGalOutUpErr = $deptGalOutUpErr=$emailGalOutUpErr=$imgGalOutUpErr=  "";
$nameGalOutUp = $deptGalOutUp =$emailGalOutUp =$imgGalOutUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGalOut3'] )) {




    if (empty($_POST["nmeGalOutUp"])) {
    $nmeGalOutUpErr = "Name is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeGalOutUp = test_input($_POST["nmeGalOutUp"]);
    // check if nameGalOutUp only contains letters and whitespace
    if (!is_numeric($nmeGalOutUp)) {
      $nmeGalOutUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM gallery_outreach WHERE id='$nmeGalOutUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }





     if (empty($_POST["imgGalOutUp"])) {
    $imgGalOutErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgGalOutUp = test_input($_POST["imgGalOutUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE gallery_outreach SET   img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('ss',  $imgGalOutUp,$nmeGalOutUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();
mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeGalOutUp" value="<?php echo $nmeGalOutUp;?>">
  <span class="error">* <?php echo $nmeGalOutUpErr;?></span>
  <br><br>


 Image: <input type="text" name="imgGalOutUp" value="<?php echo $imgGalOutUp;?>">
  <span class="error">* <?php echo $imgGalOutUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitGalOut3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>

<hr>
<br>
<hr>




<!--------------------------END OF Gallery Outreach-------------->





<!---------------------------------START -Gallery Other Activities-------------->


        <h3 >GALLERY- OTHER ACTIVITIES</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGalOthAct">Add</button>

  
      <div class="modal fade" id="myModalGalOthAct" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameGalOthActErr =$deptGalOthActErr = $emailGalOthActErr =$imgGalOthActErr = "";
$nameGalOthAct =$deptGalOthAct = $emailGalOthAct =$imgGalOthAct ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGalOthAct1'] )) {





   if (empty($_POST["imgGalOthAct"])) {
    $imgGalOthActErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgGalOthAct = test_input($_POST["imgGalOthAct"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO gallery_oth_act (img)
VALUES (?)");

$stmt->bind_param("s",$ln);
$ln=$imgGalOthAct;
$stmt->execute();

    $stmt->close();



mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  Image : <input type="text" name="imgGalOthAct" value="<?php echo $imgGalOthAct;?>">
  <span class="error">* <?php echo $imgGalOthActErr;?></span>
  <br><br>
  
  <input type="submit" name="submitGalOthAct1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGalOthAct2">DELETE</button>

  
      <div class="modal fade" id="myModalGalOthAct2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM gallery_oth_act ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["img"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeGalOthActErr =  "";
$nmeGalOthAct = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGalOthAct2'] )) {
    
  if (empty($_POST["nmeGalOthAct"])) {
    $nmeGalOthActErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeGalOthAct = test_input($_POST["nmeGalOthAct"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeGalOthAct)) {
      $nmeGalOthActErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM gallery_oth_act WHERE id='$nmeGalOthAct'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeGalOthAct;
$sql = "DELETE FROM gallery_oth_act WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeGalOthAct" value="<?php echo $nmeGalOthAct;?>">
  <span class="error">* <?php echo $nmeGalOthActErr;?></span>
  <br><br>


  <input type="submit" name="submitGalOthAct2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>




<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalGalOthAct3">UPDATE</button>

      <div class="modal fade" id="myModalGalOthAct3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM gallery_oth_act ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["img"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeGalOthActUpErr = "";
$nmeGalOthActUp = 0;
$nameGalOthActUpErr = $deptGalOthActUpErr=$emailGalOthActUpErr=$imgGalOthActUpErr=  "";
$nameGalOthActUp = $deptGalOthActUp =$emailGalOthActUp =$imgGalOthActUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitGalOthAct3'] )) {




    if (empty($_POST["nmeGalOthActUp"])) {
    $nmeGalOthActUpErr = "Name is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeGalOthActUp = test_input($_POST["nmeGalOthActUp"]);
    // check if nameGalOthActUp only contains letters and whitespace
    if (!is_numeric($nmeGalOthActUp)) {
      $nmeGalOthActUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM gallery_oth_act WHERE id='$nmeGalOthActUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }





     if (empty($_POST["imgGalOthActUp"])) {
    $imgGalOthActErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgGalOthActUp = test_input($_POST["imgGalOthActUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE gallery_oth_act SET   img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('ss',  $imgGalOthActUp,$nmeGalOthActUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();
mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeGalOthActUp" value="<?php echo $nmeGalOthActUp;?>">
  <span class="error">* <?php echo $nmeGalOthActUpErr;?></span>
  <br><br>


 Image: <input type="text" name="imgGalOthActUp" value="<?php echo $imgGalOthActUp;?>">
  <span class="error">* <?php echo $imgGalOthActUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitGalOthAct3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>

<hr>
<br>
<hr>




<!--------------------------END OF Gallery Other Activities-------------->



<!---------------------------------START -iit ropar donor -------------->


        <h3 > IIT ROPAR DONORS</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalIITRprDon">Add</button>

  
      <div class="modal fade" id="myModalIITRprDon" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameIITRprDonErr =$deptIITRprDonErr = $emailIITRprDonErr =$imgIITRprDonErr = "";
$nameIITRprDon =$deptIITRprDon = $emailIITRprDon =$imgIITRprDon ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitIITRprDon1'] )) {



  if (empty($_POST["nameIITRprDon"])) {
    $nameIITRprDonErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameIITRprDon = test_input($_POST["nameIITRprDon"]);
    // check if nameIITRprDon only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameIITRprDon)) {
      $nameIITRprDonErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }

   if (empty($_POST["deptIITRprDon"])) {
    $deptIITRprDonErr = "Dept is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptIITRprDon = test_input($_POST["deptIITRprDon"]);
  }



  
  if (empty($_POST["emailIITRprDon"])) {
    $emailIITRprDonErr = "Email is required";
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $emailIITRprDon = test_input($_POST["emailIITRprDon"]);
    // check if e-mail address is well-formed
    if (!filter_var($emailIITRprDon, FILTER_VALIDATE_EMAIL)) {
      $emailIITRprDonErr = "Invalid email format"; 
      $message = "Invalid email format";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
    }
  }


   if (empty($_POST["imgIITRprDon"])) {
    $imgIITRprDonErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgIITRprDon = test_input($_POST["imgIITRprDon"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO iit_rpr_donr (name,dept,email,img)
VALUES ( ?,?,?,?)");

$stmt->bind_param("ssss",  $lnk,$hg,$hd,$ln);
$lnk=$nameIITRprDon;
$hg=$deptIITRprDon;
$hd=$emailIITRprDon;
$ln=$imgIITRprDon;
$stmt->execute();

    $stmt->close();

mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  

  Name: <input type="text" name="nameIITRprDon" value="<?php echo $nameIITRprDon;?>">
  <span class="error">* <?php echo $nameIITRprDonErr;?></span>
  <br><br>

  Dept: <input type="text" name="deptIITRprDon" value="<?php echo $deptIITRprDon;?>">
  <span class="error">* <?php echo $deptIITRprDonErr;?></span>
  <br><br>
  E-mail: <input type="text" name="emailIITRprDon" value="<?php echo $emailIITRprDon;?>">
  <span class="error">* <?php echo $emailIITRprDonErr;?></span>
  <br><br>
  Image: <input type="text" name="imgIITRprDon" value="<?php echo $imgIITRprDon;?>">
  <span class="error">* <?php echo $imgIITRprDonErr;?></span>
  <br><br>
  
  <input type="submit" name="submitIITRprDon1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalIITRprDon2">DELETE</button>

  
      <div class="modal fade" id="myModalIITRprDon2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM iit_rpr_donr ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id </strong>".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["name"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeIITRprDonErr =  "";
$nmeIITRprDon = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitIITRprDon2'] )) {
    
  if (empty($_POST["nmeIITRprDon"])) {
    $nmeIITRprDonErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeIITRprDon = test_input($_POST["nmeIITRprDon"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeIITRprDon)) {
      $nmeIITRprDonErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM iit_rpr_donr WHERE id='$nmeIITRprDon'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeIITRprDon;
$sql = "DELETE FROM iit_rpr_donr WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeIITRprDon" value="<?php echo $nmeIITRprDon;?>">
  <span class="error">* <?php echo $nmeIITRprDonErr;?></span>
  <br><br>


  <input type="submit" name="submitIITRprDon2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>



<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalIITRprDon3">UPDATE</button>

      <div class="modal fade" id="myModalIITRprDon3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM iit_rpr_donr ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["name"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeIITRprDonUpErr = "";
$nmeIITRprDonUp = 0;
$nameIITRprDonUpErr = $deptIITRprDonUpErr=$emailIITRprDonUpErr=$imgIITRprDonUpErr=  "";
$nameIITRprDonUp = $deptIITRprDonUp =$emailIITRprDonUp =$imgIITRprDonUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitIITRprDon3'] )) {




    if (empty($_POST["nmeIITRprDonUp"])) {
    $nmeIITRprDonUpErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeIITRprDonUp = test_input($_POST["nmeIITRprDonUp"]);
    // check if nameIITRprDonUp only contains letters and whitespace
    if (!is_numeric($nmeIITRprDonUp)) {
      $nmeIITRprDonUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM iit_rpr_donr WHERE id='$nmeIITRprDonUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }



  if (empty($_POST["nameIITRprDonUp"])) {
    $nameIITRprDonUpErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameIITRprDonUp = test_input($_POST["nameIITRprDonUp"]);
    // check if nameIITRprDonUp only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameIITRprDonUp)) {
      $nameIITRprDonUpErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }



if (empty($_POST["deptIITRprDonUp"])) {
    $deptIITRprDonUpErr = "Department is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptIITRprDonUp = test_input($_POST["deptIITRprDonUp"]);
  }

  
  if (empty($_POST["emailIITRprDonUp"])) {
    $emailIITRprDonUpErr = "Email is required";
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $emailIITRprDonUp = test_input($_POST["emailIITRprDonUp"]);
    // check if e-mail address is well-formed
    if (!filter_var($emailIITRprDonUp, FILTER_VALIDATE_EMAIL)) {
      $emailIITRprDonUpErr = "Invalid email format"; 
      $message = "Invalid email format";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
    }
  }


     if (empty($_POST["imgIITRprDonUp"])) {
    $imgIITRprDonErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgIITRprDonUp = test_input($_POST["imgIITRprDonUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE iit_rpr_donr SET  name=?, dept=?, email=?, img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('sssss', $nameIITRprDonUp, $deptIITRprDonUp, $emailIITRprDonUp, $imgIITRprDonUp,$nmeIITRprDonUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();

mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeIITRprDonUp" value="<?php echo $nmeIITRprDonUp;?>">
  <span class="error">* <?php echo $nmeIITRprDonUpErr;?></span>
  <br><br>

  Name: <input type="text" name="nameIITRprDonUp" value="<?php echo $nameIITRprDonUp;?>">
  <span class="error">* <?php echo $nameIITRprDonUpErr;?></span>
  <br><br>

  Dept: <input type="text" name="deptIITRprDonUp" value="<?php echo $deptIITRprDonUp;?>">
  <span class="error">* <?php echo $deptIITRprDonUpErr;?></span>
  <br><br>

  E-mail: <input type="text" name="emailIITRprDonUp" value="<?php echo $emailIITRprDonUp;?>">
  <span class="error">* <?php echo $emailIITRprDonUpErr;?></span>
  <br><br>

 Img: <input type="text" name="imgIITRprDonUp" value="<?php echo $imgIITRprDonUp;?>">
  <span class="error">* <?php echo $imgIITRprDonUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitIITRprDon3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>


<!--------------------------END OF iit ropar donors-------------->

<hr>
<br>
<hr>





<!---------------------------------START -permanent donor -------------->


        <h3 > PERMANENT DONORS</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalPermDon">Add</button>

  
      <div class="modal fade" id="myModalPermDon" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$namePermDonErr =$deptPermDonErr = $emailPermDonErr =$imgPermDonErr = "";
$namePermDon =$deptPermDon = $emailPermDon =$imgPermDon ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitPermDon1'] )) {



  if (empty($_POST["namePermDon"])) {
    $namePermDonErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $namePermDon = test_input($_POST["namePermDon"]);
    // check if namePermDon only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$namePermDon)) {
      $namePermDonErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }

   if (empty($_POST["deptPermDon"])) {
    $deptPermDonErr = "Dept is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptPermDon = test_input($_POST["deptPermDon"]);
  }



  
  if (empty($_POST["emailPermDon"])) {
    $emailPermDonErr = "Email is required";
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $emailPermDon = test_input($_POST["emailPermDon"]);
    // check if e-mail address is well-formed
    if (!filter_var($emailPermDon, FILTER_VALIDATE_EMAIL)) {
      $emailPermDonErr = "Invalid email format"; 
      $message = "Invalid email format";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
    }
  }


   if (empty($_POST["imgPermDon"])) {
    $imgPermDonErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgPermDon = test_input($_POST["imgPermDon"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO our_perm_donr (name,dept,email,img)
VALUES ( ?,?,?,?)");

$stmt->bind_param("ssss",  $lnk,$hg,$hd,$ln);
$lnk=$namePermDon;
$hg=$deptPermDon;
$hd=$emailPermDon;
$ln=$imgPermDon;
$stmt->execute();

    $stmt->close();

mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  

  Name: <input type="text" name="namePermDon" value="<?php echo $namePermDon;?>">
  <span class="error">* <?php echo $namePermDonErr;?></span>
  <br><br>

  Dept: <input type="text" name="deptPermDon" value="<?php echo $deptPermDon;?>">
  <span class="error">* <?php echo $deptPermDonErr;?></span>
  <br><br>
  E-mail: <input type="text" name="emailPermDon" value="<?php echo $emailPermDon;?>">
  <span class="error">* <?php echo $emailPermDonErr;?></span>
  <br><br>
  Image: <input type="text" name="imgPermDon" value="<?php echo $imgPermDon;?>">
  <span class="error">* <?php echo $imgPermDonErr;?></span>
  <br><br>
  
  <input type="submit" name="submitPermDon1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalPermDon2">DELETE</button>

  
      <div class="modal fade" id="myModalPermDon2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM our_perm_donr ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id </strong>".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["name"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmePermDonErr =  "";
$nmePermDon = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitPermDon2'] )) {
    
  if (empty($_POST["nmePermDon"])) {
    $nmePermDonErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmePermDon = test_input($_POST["nmePermDon"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmePermDon)) {
      $nmePermDonErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM our_perm_donr WHERE id='$nmePermDon'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmePermDon;
$sql = "DELETE FROM our_perm_donr WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmePermDon" value="<?php echo $nmePermDon;?>">
  <span class="error">* <?php echo $nmePermDonErr;?></span>
  <br><br>


  <input type="submit" name="submitPermDon2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>



<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalPermDon3">UPDATE</button>

      <div class="modal fade" id="myModalPermDon3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM our_perm_donr ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["name"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmePermDonUpErr = "";
$nmePermDonUp = 0;
$namePermDonUpErr = $deptPermDonUpErr=$emailPermDonUpErr=$imgPermDonUpErr=  "";
$namePermDonUp = $deptPermDonUp =$emailPermDonUp =$imgPermDonUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitPermDon3'] )) {




    if (empty($_POST["nmePermDonUp"])) {
    $nmePermDonUpErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmePermDonUp = test_input($_POST["nmePermDonUp"]);
    // check if namePermDonUp only contains letters and whitespace
    if (!is_numeric($nmePermDonUp)) {
      $nmePermDonUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM our_perm_donr WHERE id='$nmePermDonUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }



  if (empty($_POST["namePermDonUp"])) {
    $namePermDonUpErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $namePermDonUp = test_input($_POST["namePermDonUp"]);
    // check if namePermDonUp only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$namePermDonUp)) {
      $namePermDonUpErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }



if (empty($_POST["deptPermDonUp"])) {
    $deptPermDonUpErr = "Department is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptPermDonUp = test_input($_POST["deptPermDonUp"]);
  }

  
  if (empty($_POST["emailPermDonUp"])) {
    $emailPermDonUpErr = "Email is required";
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $emailPermDonUp = test_input($_POST["emailPermDonUp"]);
    // check if e-mail address is well-formed
    if (!filter_var($emailPermDonUp, FILTER_VALIDATE_EMAIL)) {
      $emailPermDonUpErr = "Invalid email format"; 
      $message = "Invalid email format";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
    }
  }


     if (empty($_POST["imgPermDonUp"])) {
    $imgPermDonErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgPermDonUp = test_input($_POST["imgPermDonUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE our_perm_donr SET  name=?, dept=?, email=?, img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('sssss', $namePermDonUp, $deptPermDonUp, $emailPermDonUp, $imgPermDonUp,$nmePermDonUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();

mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmePermDonUp" value="<?php echo $nmePermDonUp;?>">
  <span class="error">* <?php echo $nmePermDonUpErr;?></span>
  <br><br>

  Name: <input type="text" name="namePermDonUp" value="<?php echo $namePermDonUp;?>">
  <span class="error">* <?php echo $namePermDonUpErr;?></span>
  <br><br>

  Dept: <input type="text" name="deptPermDonUp" value="<?php echo $deptPermDonUp;?>">
  <span class="error">* <?php echo $deptPermDonUpErr;?></span>
  <br><br>

  E-mail: <input type="text" name="emailPermDonUp" value="<?php echo $emailPermDonUp;?>">
  <span class="error">* <?php echo $emailPermDonUpErr;?></span>
  <br><br>

 Img: <input type="text" name="imgPermDonUp" value="<?php echo $imgPermDonUp;?>">
  <span class="error">* <?php echo $imgPermDonUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitPermDon3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>


<!--------------------------END OF permanent donors-------------->

<hr>
<br>
<hr>




<!---------------------------------START -other donor -------------->


        <h3 >OTHER DONORS</h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalOthDon">Add</button>

  
      <div class="modal fade" id="myModalOthDon" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameOthDonErr =$deptOthDonErr = $emailOthDonErr =$imgOthDonErr = "";
$nameOthDon =$deptOthDon = $emailOthDon =$imgOthDon ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitOthDon1'] )) {



  if (empty($_POST["nameOthDon"])) {
    $nameOthDonErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameOthDon = test_input($_POST["nameOthDon"]);
    // check if nameOthDon only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameOthDon)) {
      $nameOthDonErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }

   if (empty($_POST["deptOthDon"])) {
    $deptOthDonErr = "Dept is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptOthDon = test_input($_POST["deptOthDon"]);
  }



  
  if (empty($_POST["emailOthDon"])) {
    $emailOthDonErr = "Email is required";
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $emailOthDon = test_input($_POST["emailOthDon"]);
    // check if e-mail address is well-formed
    if (!filter_var($emailOthDon, FILTER_VALIDATE_EMAIL)) {
      $emailOthDonErr = "Invalid email format"; 
      $message = "Invalid email format";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
    }
  }


   if (empty($_POST["imgOthDon"])) {
    $imgOthDonErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgOthDon = test_input($_POST["imgOthDon"]);
  }
    




  if ($z==0)
{
    require("../db.php");

$stmt =$conn->prepare( "INSERT INTO other_donr (name,dept,email,img)
VALUES ( ?,?,?,?)");

$stmt->bind_param("ssss",  $lnk,$hg,$hd,$ln);
$lnk=$nameOthDon;
$hg=$deptOthDon;
$hd=$emailOthDon;
$ln=$imgOthDon;
$stmt->execute();

    $stmt->close();

mysqli_close($conn);



$message = "ENTRY INSERTED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  

  Name: <input type="text" name="nameOthDon" value="<?php echo $nameOthDon;?>">
  <span class="error">* <?php echo $nameOthDonErr;?></span>
  <br><br>

  Dept: <input type="text" name="deptOthDon" value="<?php echo $deptOthDon;?>">
  <span class="error">* <?php echo $deptOthDonErr;?></span>
  <br><br>
  E-mail: <input type="text" name="emailOthDon" value="<?php echo $emailOthDon;?>">
  <span class="error">* <?php echo $emailOthDonErr;?></span>
  <br><br>
  Image: <input type="text" name="imgOthDon" value="<?php echo $imgOthDon;?>">
  <span class="error">* <?php echo $imgOthDonErr;?></span>
  <br><br>
  
  <input type="submit" name="submitOthDon1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalOthDon2">DELETE</button>

  
      <div class="modal fade" id="myModalOthDon2" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE</h4>
            </div>
            <div class="modal-body">


              INPUT ID FOR DELETING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM other_donr ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id </strong>".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["name"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>


              <?php
// define variables and set to empty values
$nmeOthDonErr =  "";
$nmeOthDon = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitOthDon2'] )) {
    
  if (empty($_POST["nmeOthDon"])) {
    $nmeOthDonErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeOthDon = test_input($_POST["nmeOthDon"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nmeOthDon)) {
      $nmeOthDonErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM other_donr WHERE id='$nmeOthDon'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }


  if ($z==0)
  {


    require("../db.php");
$delId=$nmeOthDon;
$sql = "DELETE FROM other_donr WHERE id='$delId'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // print if no data input

} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 



mysqli_close($conn);


$message = "Deleted , please refresh the page to see changes";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
 } 
}







?>



<p><span class="error">* required field</span></p>
<form name="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="required()">  
  Name: <input type="text" name="nmeOthDon" value="<?php echo $nmeOthDon;?>">
  <span class="error">* <?php echo $nmeOthDonErr;?></span>
  <br><br>


  <input type="submit" name="submitOthDon2" value="Submit"  "> 
</form>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>



<!----------------------------------------------UPDATION------------------>

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalOthDon3">UPDATE</button>

      <div class="modal fade" id="myModalOthDon3" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">UPDATE</h4>
            </div>
            <div class="modal-body">
            

             INPUT ID FOR UPDATING THE ENTRY
              <br><hr>
              <?php
    require("../db.php");

              $sql="SELECT * FROM other_donr ";
                      $result=mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo "<strong>Id</strong> ".$row["id"]."\t---------\t"."\t<strong>Name</strong>\t".$row["name"]."<br/>";
}

mysqli_free_result($result);

mysqli_close($conn);

              ?>



              <?php
// define variables and set to empty values
$nmeOthDonUpErr = "";
$nmeOthDonUp = 0;
$nameOthDonUpErr = $deptOthDonUpErr=$emailOthDonUpErr=$imgOthDonUpErr=  "";
$nameOthDonUp = $deptOthDonUp =$emailOthDonUp =$imgOthDonUp = "";



  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitOthDon3'] )) {




    if (empty($_POST["nmeOthDonUp"])) {
    $nmeOthDonUpErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeOthDonUp = test_input($_POST["nmeOthDonUp"]);
    // check if nameOthDonUp only contains letters and whitespace
    if (!is_numeric($nmeOthDonUp)) {
      $nmeOthDonUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }

    else
    {
    require("../db.php");
     $sql = "SELECT id FROM other_donr WHERE id='$nmeOthDonUp'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >0){
   //found
}else{
$message = "ID NOT FOUND!! CHECK AGAIND id";
echo "<script type='text/javascript'>alert('$message');</script>";
$z=1;
}

mysqli_close($conn);
    }

  }



  if (empty($_POST["nameOthDonUp"])) {
    $nameOthDonUpErr = "Name is required";
$message = "Name is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $nameOthDonUp = test_input($_POST["nameOthDonUp"]);
    // check if nameOthDonUp only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nameOthDonUp)) {
      $nameOthDonUpErr = "Only letters and white space allowed"; 
$message = "Only letters and white space allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }



if (empty($_POST["deptOthDonUp"])) {
    $deptOthDonUpErr = "Department is required";
$message = "Department is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $deptOthDonUp = test_input($_POST["deptOthDonUp"]);
  }

  
  if (empty($_POST["emailOthDonUp"])) {
    $emailOthDonUpErr = "Email is required";
    $message = "Email is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $emailOthDonUp = test_input($_POST["emailOthDonUp"]);
    // check if e-mail address is well-formed
    if (!filter_var($emailOthDonUp, FILTER_VALIDATE_EMAIL)) {
      $emailOthDonUpErr = "Invalid email format"; 
      $message = "Invalid email format";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
    }
  }


     if (empty($_POST["imgOthDonUp"])) {
    $imgOthDonErrUp = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgOthDonUp = test_input($_POST["imgOthDonUp"]);
  }
    





  if ($z==0)
{
    require("../db.php");

$sql = "UPDATE other_donr SET  name=?, dept=?, email=?, img=? WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('sssss', $nameOthDonUp, $deptOthDonUp, $emailOthDonUp, $imgOthDonUp,$nmeOthDonUp);
$stmt->execute();

if ($stmt->error) {
  echo "FAILURE!!! " . $stmt->error;
}
else{


$message = "ENTRY UPDATED.... RELOAD THE PAGE TO SEE CHANGES";
echo "<script type='text/javascript'>alert('$message');</script>";
}

$stmt->close();

mysqli_close($conn);


}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  


  ID: <input type="text" name="nmeOthDonUp" value="<?php echo $nmeOthDonUp;?>">
  <span class="error">* <?php echo $nmeOthDonUpErr;?></span>
  <br><br>

  Name: <input type="text" name="nameOthDonUp" value="<?php echo $nameOthDonUp;?>">
  <span class="error">* <?php echo $nameOthDonUpErr;?></span>
  <br><br>

  Dept: <input type="text" name="deptOthDonUp" value="<?php echo $deptOthDonUp;?>">
  <span class="error">* <?php echo $deptOthDonUpErr;?></span>
  <br><br>

  E-mail: <input type="text" name="emailOthDonUp" value="<?php echo $emailOthDonUp;?>">
  <span class="error">* <?php echo $emailOthDonUpErr;?></span>
  <br><br>

 Img: <input type="text" name="imgOthDonUp" value="<?php echo $imgOthDonUp;?>">
  <span class="error">* <?php echo $imgOthDonUpErr;?></span>
  <br><br>
  <br><br>

  
  <input type="submit" name="submitOthDon3" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>


<!--------------------------END OF other donors-------------->

<hr>
<br>
<hr>




<!---------------------------------START -Videos-------------->


        <h3 >VIDEOS </h3>
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalVidPg">Add</button>

  
      <div class="modal fade" id="myModalVidPg" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD</h4>
            </div>
            <div class="modal-body">
            

              <?php
// define variables and set to empty values
$nameVidPgErr =$nmeVidPgErr =$deptVidPgErr = $emailVidPgErr =$imgVidPgErr = "";
$nameVidPg =$nmeVidPg =$deptVidPg = $emailVidPg =$imgVidPg ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitVidPg1'] )) {



    if (empty($_POST["nmeVidPgUp"])) {
    $nmeVidPgUpErr = "ID is required";
$message = "ID is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;

  } else {
    $nmeVidPgUp = test_input($_POST["nmeVidPgUp"]);
    // check if nameVidPgUp only contains letters and whitespace
    if (!is_numeric($nmeVidPgUp)) {
      $nmeVidPgUpErr = "Only numbers allowed"; 
$message = "Only numbers allowed";
echo "<script type='text/javascript'>alert('$message');</script>";

//toDeleteInvalid();
    
$z =1;
    }
  }



   if (empty($_POST["imgVidPg"])) {
    $imgVidPgErr = "Image is required";
$message = "Image is required";
echo "<script type='text/javascript'>alert('$message');</script>";
//toDeleteInvalid();
$z =1;
  } else {
    $imgVidPg = test_input($_POST["imgVidPg"]);
  }
    




  if ($z==0)
{
    require("../db.php");

 if ($nmeVidPg == 1)
   {

$sql = "UPDATE proj_abhyas SET   img=? ";

$stmt = $conn->prepare($sql);

$stmt->bind_param('s', $imgVidPg);
$stmt->execute();

    }


    else  if ($nmeVidPg == 2)
   {

$sql = "UPDATE proj_pathsala SET   img=? ";

$stmt = $conn->prepare($sql);

$stmt->bind_param('s', $imgVidPg);
$stmt->execute();

    }


    else  if ($nmeVidPg == 3)
   {

$sql = "UPDATE proj_scl_chl_hum SET   img=? ";

$stmt = $conn->prepare($sql);

$stmt->bind_param('s', $imgVidPg);
$stmt->execute();

    }


    else  if ($nmeVidPg == 4)
   {

$sql = "UPDATE proj_scl_out SET   img=? ";

$stmt = $conn->prepare($sql);

$stmt->bind_param('s', $imgVidPg);
$stmt->execute();

    }


     else     if ($nmeVidPg == 5)
   {

$sql = "UPDATE camp_keep_away SET   img=? ";

$stmt = $conn->prepare($sql);

$stmt->bind_param('s', $imgVidPg);
$stmt->execute();

    }


     else     if ($nmeVidPg == 6)
   {

$sql = "UPDATE camp_samajhiye SET   img=? ";

$stmt = $conn->prepare($sql);

$stmt->bind_param('s', $imgVidPg);
$stmt->execute();

    }


        else  if ($nmeVidPg == 7)
   {

$sql = "UPDATE camp_iit_visits SET   img=? ";

$stmt = $conn->prepare($sql);

$stmt->bind_param('s', $imgVidPg);
$stmt->execute();

    }


      else    if ($nmeVidPg == 8)
   {

$sql = "UPDATE camp_jhuggi SET   img=? ";

$stmt = $conn->prepare($sql);

$stmt->bind_param('s', $imgVidPg);
$stmt->execute();

    }

mysqli_close($conn);



$message = "ENTRY UPDATED";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}

?>


<h4><strong>For leaving an entry empty , press spacebar in the respective field</strong></h4>
<p><span class="error">* required field</span></p>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  

  ID: <input type="text" name="nmeVidPg" value="<?php echo $nmeVidPg;?>">
  <span class="error">* <?php echo $nmeVidPgErr;?></span>
  <br><br>

  Video: <input type="text" name="imgVidPg" value="<?php echo $imgVidPg;?>">
  <span class="error">* <?php echo $imgVidPgErr;?></span>
  <br><br>
  
  <input type="submit" name="submitVidPg1" value="Submit" " > 
  
</form>





<?php           // for case of refreshs
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
?>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

<br><hr>
<!-----------------End of videos------------>

      <script>
        <?php
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  ?>
</script>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>



<!------------------------- MESSAGE FOR FURTHER ADMIN PAGE


MAKE SURE VARIABLE NAMES DONT CLASH LIKE THAT OF FIELDS OF THE FORMS.
CHECK IF Z=0 WILL SUFFIC OR DIFFERENT VARIABLE REQUIRED.
TAKE CARE WHILE COPYING
NAME OF FORMS ARE IMPORTANT


NAME OF MODAL FORMS---DIFFERENT NAMES FOR DELETION AND INSERTION
NAME OF SUBMIT BUTTON---DIFFERENT NAMES FOR DELETION AND INSERTION
NAME OF INPUT VARIABLES

CHECK FOR Z


-->


 


</body>
</html>


