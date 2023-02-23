<?php require_once("MTGnav.php"); ?>
<body id = "default">

<div class="login">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="text" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>

    <a href = "MTGregister">Need to register?</a>
        
  </div>

</body>

<?php include("footer.php"); ?>