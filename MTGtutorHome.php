<?php require_once("MTGnav.php"); ?>

<html> 
 <head>
 <link rel="icon" type="image/x-icon" href="demfavicon.ico">
</head>
<body>
    <div id = "title">
        <h1 style= "text-align: center;">
     MTGtutor
        </h1>
    </div>

    <div>

    <img src= "MTGTUTOR.jpg" />
    <a href= "MTGadvanced.php" id = "text">Advanced</a>
    <input type= "text" id="text" name="search" placeholder= "Search your library for...">

    </div>
 <style>
    body {
        background-image: url("The Mindful back.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 45%;
        background-color: grey;
    }
</style>
</body>
</html>

<?php include("footer.php"); ?>