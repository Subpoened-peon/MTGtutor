
<?php
require_once("DBconnect.php");
session_start();

$username = "";
$email = "";
$errors = array();



$db = new DBconnect();

if (isset($_POST['new_user'])) {

  $username = $_POST['uname'];
  $password_1 = $_POST['psw'];
  $password_2 = $_POST['pswcheck'];
  $email = $_POST['email'];

  if(empty($username)) { array_push($errors, "Username field cannot be empty");}
  if(!preg_match('/^[a-z\d_]{4,20}$/i', $username)) {array_push($errors, "Username not valid!");}
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match!");
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Invalid Email");
  }

  
    $user = $db->searchUser($username, $email);
    if ($user) { 
        array_push($errors, "Username already exists");
     }
  

   if (count($errors) == 0) {
    $hash = md5($password_1);
    $db->registerUser($username, $hash, $email);

    $_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: MTGtutorHome.php');
   }
  }
   if (isset($_POST['login_user'])) {
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    if (empty($username)) {
      array_push($errors, "Username is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }
      
    if (count($errors) == 0) {
      $hash = md5($password);
      $user = $db->loginUser($username, $hash);
      if(!empty($user)) {
        $_SESSION['username'] = $username;
  	    $_SESSION['success'] = "You are now logged in";
  	    header('location: MTGtutorHome.php');
      } else {
        array_push($errors, "Wrong username/password combination");
      	}
      }
    }
