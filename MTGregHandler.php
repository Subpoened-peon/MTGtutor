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
    } else {

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
    
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
          
        }
      });
    }
  });

  function showError(errorMessage) {
   
   $('#error-msg').remove();
   var errorElement = $('<div id="error-msg" class="error-msg">').html(errorMessage);
   $('.login').prepend(errorElement);

  
   setTimeout(function() {
       $('#error-msg').fadeOut(500, function() {
           $(this).remove();
       });
   }, 3000);
}

function clearError() {
   
   $('#error-msg').remove();
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

   
  
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Invalid Email");
  }

  
    $user = $db->searchName($username);
    if (count($user) > 0) { 
          array_push($errors, "Username already exists");      
     }
  

   if (count($errors) == 0) {
    $hash = md5($password_1);
    $db->registerUser($username, $hash, $email);
   

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('Location: MTGtutorHome.php');

   
   } else {
    
    header('Location: MTGregister.php');
    
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
