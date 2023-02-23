<?php require_once("MTGnav.php"); ?>

<body id = "default">

<div class="login">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="uname"><b>Re-enter Username</b></label>
    <input type="text" placeholder="Re-Enter Username" name="unamecheck" required>

    <label for="psw"><b>Password</b></label>
    <input type="text" placeholder="Enter Password" name="psw" required>

    <label for="psw"><b>Re-enter Password</b></label>
    <input type="text" placeholder="Re-Enter Password" name="pswcheck" required>

    <label for="email"><b>Please enter your email</b></label>
    <input type="text" placeholder="Email" name="email" required>

    <button type="submit">Register</button>
    <label>

</div>

</body>

<?php include("footer.php"); ?>