<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(document).ready(function() {
  $('#register').on('submit', function(event) {
    event.preventDefault();
    var uname = $('#uname').val();
    var psw = $('#psw').val();
    var pswcheck = $('#pswcheck').val();
    var email = $('#email').val();
    var errors = [];

    if (uname.length < 4) {
      errors.push('Please enter a valid username');
    } 

    if (psw.length < 1) {
      errors.push('Please enter a password');
    }

    if (psw !== pswcheck) {
      errors.push('Passwords do not match');
    }

    if (email.length < 1) {
      errors.push('Please enter an email');
    }

    if (!/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(email)) {
      errors.push('Invalid Email');
    }



    if (errors.length > 0) {
      showError(errors.join('<br>'));

    } else {
      $.ajax({
        url: 'mtgreghandler.php',
        method: 'POST',
        data: {
          uname: uname,
          psw: psw,
          email: email,
          new_user: true
        },
        success: function(response) {
          console.log(response);
          window.location.href = "MTGtutorHome.php";
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
          
        }
      });
    }
  });

  function showError(errorMessage) {
   clearError();
   $('#error-container').append('<div id="error-message">' + errorMessage + '</div>');
  
   setTimeout(function() {
       $('#error-message').fadeOut(500, function() {
           $(this).remove();
       });
   }, 3000);
}

function clearError() {
   
   $('#error-message').remove();
}

});
</script>
</head>
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
  $email = $_POST['email'];
  
    $hash = md5($password_1);
    $db->registerUser($username, $hash, $email);
   

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('Location: MTGtutorHome.php');   
  
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
