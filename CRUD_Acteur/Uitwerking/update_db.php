<?php
if(isset($_POST["update"])){
	include 'Acteurs.php';
	include 'conn.php';
	$conn = dbConnect();

	//var_dump($_POST);

	
	$acteur = new Acteur;
	//$acteur->setObject($_POST['nr'], $_POST['voornaam'], $_POST['achternaam']);
	//$acteur->updateActeur($conn);
	$acteur->updateActeur2($conn, $_POST['nr'], $_POST['voornaam'], $_POST['achternaam']);
	echo '<script>alert("Acteur is gewijzigd")</script>';
	
	// Toon weer het scherm
	include "update_form.php";
}	
?>



