<?php require_once("MTGregHandler.php"); ?>

<html>
    <head>
     <link rel="stylesheet" href="MTGstyler.css">
     <link rel="shortcut icon" type="image/x-icon" href="demfavicon.ico">
    </head>
    <div style = "float: right;">
    <form>
        <select title="Navigation" id="nav" onChange= "window.location.href=this.value">
            <option> Where to </option>
            <option value="MTGtutorHome.php">HOME</option>
            <option value="MTGnews.php">NEWS</option>
            <option value="MTGhelp.php">HELP</option>
            <?php if(!isset($_SESSION['username'])) : ?>
            <option value="MTGregister.php">REGISTER</option>
            <?php endif ?>
        </select>
            
    </form>

    </div>
<div style = "float: right; padding: 5px;">
<?php if(isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p> <a href="MTGtutorHome.php?logout='1'" style="color: red;">logout</a> </p>
<?php endif ?>
<?php if(!isset($_SESSION['username'])) : ?>
    <a href = "MTGlogin.php">LOGIN</a>
<?php endif ?>
    </div>
</html>