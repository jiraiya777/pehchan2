<!DOCTYPE  HTML>
<html>
<head>

  <title>TEST3</title>
<style>
.error {color: #FF0000;}
</style>
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

       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Read more</button>

  
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Hdr</h4>
            </div>
            <div class="modal-body">

              <?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
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
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
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
  <input type="submit" name="submit" value="Submit">  
</form>
<?php

echo "<h2>Your Input:</h2>";
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

<?php


    require("db.php");

$stmt =$conn->prepare( "INSERT INTO reports (heading, links)
VALUES ( ?,?)");

$stmt->bind_param("ss", $hdg, $lnk);
$hdg=$name;
$lnk=$website;

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

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>


<?php

                    require("db.php");
                     $sqll="SELECT * FROM story_of_day ORDER BY id DESC LIMIT 0, 1";

                    $result = mysqli_query($conn,$sqll);

                    while ($row = mysqli_fetch_row($result))
                    $highest_id = $row[0];

                    //echo "HIGHEST ID: ".$highest_id."<br/";
                    $ind=0;
                    $yourArray = array(); // make a new array to hold all your data

                    //echo "</br>"."IND1 ".$ind."<br/>";
                    for ($index=$highest_id; $index >0; $index--)
                    {
                      $sql="SELECT * FROM story_of_day WHERE id='$index' ";
                      $result=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($result)>0){
                        $row = mysqli_fetch_row($result);
                        echo "<br/>".$row[1]."<br/";
                        $yourArray[$ind] = $row[1];     // 0 for id , 1 for story
                        $ind++;
                      }
                      
                    }
                      
                    echo "IND2 ".$ind."<br/>";

                    for($index=0; $index<$ind; $index++) {
                        echo "<br/>".$yourArray[$index]."<br/";
                    }
                    //header('Location: index.php');
                    $SQLCommand = "SELECT *  FROM story_of_day";
                    /*

                    $result = mysqli_query($conn,$SQLCommand); // This line executes the MySQL query that you typed above


                      echo '<div class="row" align="center">';

            echo '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">';
                        echo ' <div class="block" >';
            echo '<img src="1.jpg" height="200" width="200" alt="Avatar" class="center">'.$yourArray[$x]['story'].$yourArray[$x]['date'].'</div>'.'</div>';

*/
          
                    mysqli_close($conn);
            ?>


    </body>
    </html>