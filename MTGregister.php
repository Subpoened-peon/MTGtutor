<?php require_once("MTGnav.php"); ?>
<?php require_once("DBconnect.php"); ?>
<?php require_once("MTGregHandler.php"); ?>
<?php require_once("errors.php"); ?>

<body id = "default">

<div class="login">
    <form method="POST" action="MTGregister.php">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username. Max 20 characters, no _" name="uname" required value = <?php if(isset($_POST["uname"])) echo $_POST["uname"]; ?> >

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw"><b>Re-enter Password</b></label>
    <input type="password" placeholder="Re-Enter Password" name="pswcheck" required>

    <label for="email"><b>Please enter your email</b></label>
    <input type="text" placeholder="Email" name="email" required value = <?php if(isset($_POST["email"])) echo $_POST["email"]; ?> >

    <button type="submit" value="Submit" name="new_user">Register</button>
    <label>
</form>
</div>

</body>

<?php include("footer.php"); ?>