<?php require_once("MTGnav.php"); ?>

<?php
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("Location: MTGtutorHome");
        
    }
?>

<html> 
 <head>
    <link rel="shortcut icon" type="image/x-icon" href="demfavicon.ico">
    <title>Home</title>
</head>
<body style="background-color: grey;">

    <div class="background">
        <h1 id= "title">
     MTGtutor
        </h1>
    </div>
    
    <div>
    <img src= "MTGTUTOR.jpg" class= "img1"/>
    <form id="text" method="GET" action="MTGresults.php">
    <label for= "search">
        <a href = "MTGadvanced.php">Advanced</a></label>
    <input type= "text" name="search" placeholder= "Search your library for...">
    <input type= "submit" value="Search" name="submit"></input>
</form>
    </div>


    <div>
       <p class = "content1"> Recently Viewed 
        <img src = "gob.jpg" />
        <img src = "domcon.jpg" />
       </p>

       <p class = "content1"> Recently Added
        <img src = "gob.jpg" />
        <img src = "domcon.jpg" />
       </p>
       
    </div>

    
</body>
</html>

<?php include("footer.php"); ?>