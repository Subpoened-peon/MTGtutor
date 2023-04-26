<?php require_once("MTGnav.php"); ?>

<html>
<head>
	<title>Advanced</title>
</head>
<body id= "advdefault">
	<h2>Filter</h2>
	<form method="GET" action="MTGresults.php" id="advanced">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name"><br>

		<label for="type">Type:</label>
		<input type="text" id="type" name="type"><br>

		<label for="cost">Cost:</label>
		<input type="text" id="cost" name="cost"><br>

		<label for="rules">Rules:</label>
		<input type="text" id="rules" name="rules"><br>

		<label for="sets">Sets:</label>
		<input type="text" id="set" name="set"><br>

        <label for="flavor">Flavor:</label>
        <input type="text" id="flavor" name="flavor"><br>

		<label for="rarity">Rarity:</label>
		<select id="rarity" name="rarity">
            <option value="">Rarity</option>
			<option value="C">Common</option>
			<option value="U">Uncommon</option>
			<option value="R">Rare</option>
			<option value="M">Mythic</option>
		</select><br>

        <label>Card Colors:</label><br>
        <input type="checkbox" id="white" name="card_colors[]" value="white">
        <label for="white"><img src="symbols/(W).png" class="color-toggle"></label>

        <input type="checkbox" id="blue" name="card_colors[]" value="blue">
        <label for="blue"><img src="symbols/(U).png" class="color-toggle"></label>

        <input type="checkbox" id="black" name="card_colors[]" value="black">
        <label for="black"><img src="symbols/(B).png" class="color-toggle"></label>

        <input type="checkbox" id="red" name="card_colors[]" value="red">
        <label for="red"><img src="symbols/(R).png" class="color-toggle"></label>

        <input type="checkbox" id="green" name="card_colors[]" value="green">
        <label for="green"><img src="symbols/(G).png" class="color-toggle"></label>

		<input type="submit" value="Advanced" name="advanced">
	</form>
</body>
</html>

<?php include("footer.php"); ?>