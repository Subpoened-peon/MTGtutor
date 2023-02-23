<?php require_once("MTGnav.php"); ?>

<html> 
 <head>
 <link rel="icon" type="image/x-icon" href="demfavicon.ico">
</head>
<body style="background-color: grey;">

    <div class="background">
    <img src= "MTGTUTOR.jpg" class= "img1"/>
        <h1 id= "title">
     MTGtutor
        </h1>
    </div>
    
    <div>
    <form id="text">
    <label for= "search">
        <a href = "MTGadvanced.php">Advanced</a></label>
    <input type= "text" name="search" placeholder= "Search your library for...">
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