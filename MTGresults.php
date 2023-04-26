<?php 
require_once("MTGnav.php"); 
require_once("DBconnect.php");
require_once("MTGwidgets.php");

$search = $_GET['search'];

?>
<title>Results</title>
<body id = "default">
<h1>Results</h1>
<div id="result">
<?php
    $conn = new DBconnect();
    $results = $conn->searchName($search);
    echo MTGwidgets::renderResults($results);
?>
<br><br>
</div>

</body>
<?php include("footer.php"); ?>