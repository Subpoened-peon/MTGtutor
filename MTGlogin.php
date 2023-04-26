<?php require_once("MTGnav.php"); ?>
<?php require_once("MTGregHandler.php"); ?>
<body id = "default">

<div class="login">
    <form method = "POST" action="MTGlogin.php">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" value = "Submit" name = "login_user">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    </form>
  <a href = "MTGregister.php">Need to register?</a>
        
  </div>

</body>

<?php include("footer.php"); ?>