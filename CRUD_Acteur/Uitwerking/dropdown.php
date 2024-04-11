
<html>
<body>
<h1>Dropdown Acteur</h1>

<?php
include "Acteurs.php";
include 'conn.php';
$conn = dbConnect();

// Maak een object Acteur
$acteur = new Acteur;

// Haal alle acteurs op uit de database mbv de method getActeurs()
$lijst = $acteur->getActeurs($conn);
 
?>

<form method='post'>
	<?php
		isset($_POST['kies-btn']) ? $nr=$_POST['acteurnr'] : $nr=-1;
		$acteur->dropDownActeur($lijst, $nr);
	?>
	<br>
	<input type='submit' name='kies-btn' value='Kies'></input>
</form>	

<?php

if (isset($_POST['kies-btn'])){
	$acteur->nr = $_POST['acteurnr'];
	$row = $acteur->getActeur($conn);
	
	echo "Gekozen waarde: nr: $_POST[acteurnr] $row[VOORNAAM] $row[ACHTERNAAM]"; 
}
?>

</body>
</html>

