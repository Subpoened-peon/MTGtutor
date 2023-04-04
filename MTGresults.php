<?php 
require_once("MTGnav.php"); 
require_once("DBconnect.php");
require_once("MTGwidgets.php");

$search = $_GET['search'];

?>

Results

<?php
    $conn = new DBconnect();
    $results = $conn->searchName($search);
    echo MTGwidgets::renderResults($results);
?>



<?php include("footer.php"); ?>