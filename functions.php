<?php 
session_start();
require("../db.php");

$errors   = array(); 
// log user out if logout button clicked
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
}

if (isset($_POST['login_btn'])) {
    login();
}

function display_error() {
    global $errors;

    if (count($errors) > 0){
        echo '<div class="error">';
            foreach ($errors as $error){
                echo $error .'<br>';
            }
        echo '</div>';
    }
}

function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    }else{
        return false;
    }
}

function e($val){
    global $conn;
    return mysqli_real_escape_string($conn, trim($val));
}

function isAdmin()
{
    if (isset($_SESSION['user']) ) {
        return true;
    }else{
        return false;
    }
}
// call the login() function if register_btn is clicked


// LOGIN USER
function login(){
    global $conn, $username, $errors;

    // grap form values
    $username = e($_POST['username']);
    $password = e($_POST['password']);

    // make sure form is filled properly
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // attempt login if no errors on form
    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) == 1) { // user found
            // check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";

                header('location: index.php');
            
        }else {
            array_push($errors, "Wrong username/password combination");

        }
    }
}
 mysqli_close($conn);
?>