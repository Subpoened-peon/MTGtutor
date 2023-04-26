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
<script>

const cardRulesDivs = document.querySelectorAll('.card-rules');

// Loop through each div
cardRulesDivs.forEach(cardRulesDiv => {
  // Check if the div contains the "(B)" text
  if (cardRulesDiv.innerHTML.includes('(B)')) {
    // Replace the "(B)" text with an image
    cardRulesDiv.innerHTML = cardRulesDiv.innerHTML.replace(/\(B\)/g, '<img src="symbols/(B).png">');
  }
});
</script>
</div>

</body>
<?php include("footer.php"); ?>