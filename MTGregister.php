<?php require_once("MTGnav.php"); ?>
<?php require_once("DBconnect.php"); ?>
<?php require_once("MTGregHandler.php") ?>

<head>
<title>Registration</title>
</head>
<body id = "default">

<div class="login">
    <form method="POST" id="register" action="MTGregister.php" name="registration">
    <label for="uname"><b>Username</b></label>
    <input type="text" id="uname" placeholder="Max 20 characters" name="uname" value = <?php if(isset($_POST["uname"])) echo $_POST["uname"]; ?> >

    <label for="psw"><b>Password</b></label>
    <input type="password" id="psw" placeholder="Enter Password" name="psw">

    <label for="psw"><b>Re-enter Password</b></label>
    <input type="password" id="pswcheck" placeholder="Re-Enter Password" name="pswcheck" >

    <label for="email"><b>Please enter your email</b></label>
    <input type="text" id="email" placeholder="Email" name="email" value = <?php if(isset($_POST["email"])) echo $_POST["email"]; ?> >

    <button type="submit" value="Submit" name="new_user">Register</button>
    <label>
</form>
<div id="error-container"></div>
</div>

</body>


<?php include("footer.php"); ?>