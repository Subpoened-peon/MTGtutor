<?php 
require_once("MTGnav.php"); 
require_once("DBconnect.php");
require_once("MTGwidgets.php");

$advanced = isset($_GET['Advanced']) ? trim($_GET['Advanced']) : '';

if(isset($_GET['name']) || isset($_GET['type']) || isset($_GET['cost']) || isset($_GET['rules']) || isset($_GET['set']) || isset($_GET['flavor']) || isset($_GET['card_colors'])) {
  $name = isset($_GET['name']) ? $_GET['name'] : '';
  $type = isset($_GET['type']) ? $_GET['type'] : '';
  $cost = isset($_GET['cost']) ? $_GET['cost'] : '';
  $rules = isset($_GET['rules']) ? $_GET['rules'] : '';
  $set = isset($_GET['set']) ? $_GET['set'] : '';
  $flavor = isset($_GET['flavor']) ? $_GET['flavor'] : '';
  $colors = isset($_GET['card_colors'][0]) ? $_GET['card_colors'][0] : '';
} else {
  $search = isset($_GET['search']) ? $_GET['search'] : '';
}
?>
<title>Results</title>
<body id = "default">
<h1>Results</h1>
<div id="result">
<?php
    $conn = new DBconnect();
    if(!empty($name) || !empty($type) || !empty($cost) || !empty($rules) || !empty($set) || !empty($flavor) || !empty($colors)) {
      $results = $conn->advancedSearch($name, $type, $cost, $rules, $set, $flavor, $colors);
    } else {
      $results= $conn->searchName($search);
    }
    echo MTGwidgets::renderResults($results);
?>
<br><br>
<script>

const cardRulesDivs = document.querySelectorAll('.card-rules');


cardRulesDivs.forEach(cardRulesDiv => {
  
  if (cardRulesDiv.innerHTML.includes('(B)')) {
   
    cardRulesDiv.innerHTML = cardRulesDiv.innerHTML.replace(/\(B\)/g, '<img src="symbols/(B).png">');
  }
  if (cardRulesDiv.innerHTML.includes('(WHITE)' || '(W)')) {
    cardRulesDiv.innerHTML = cardRulesDiv.innerHTML.replace(/\(W(?:HITE)?\)/g, '<img src="symbols/(W).png">');
  }
  if (cardRulesDiv.innerHTML.includes('(U)')) {
    cardRulesDiv.innerHTML = cardRulesDiv.innerHTML.replace(/\(U\)/g, '<img src="symbols/(U).png">');
  }
});
</script>
</div>

</body>
<?php include("footer.php"); ?>