<?php 

if(isset($_POST["verwijderen"])){
	include 'Acteurs.php';
	include 'conn.php';
	$conn = dbConnect();

	// Maak een object Acteur
	$acteur = new Acteur;
	
	// Delete Acteur op basis van NR
	$acteur->deleteActeur($conn, $_POST["nr"]);
	echo '<script>alert("Acteur verwijderd")</script>';
	echo "<script> location.replace('index.php'); </script>";
}
?>



