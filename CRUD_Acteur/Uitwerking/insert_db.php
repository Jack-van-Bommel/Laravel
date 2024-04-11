<?php
	if(isset($_POST["insert"]) && $_POST["insert"] == "Toevoegen"){
		
		include 'Acteurs.php';
		include 'conn.php';
		$conn = dbConnect();
		
		$acteur = new Acteur;
		//$acteur->setObject(0, $_POST['voornaam'], $_POST['achternaam']);
		//$acteur->insertActeur($conn);
		$acteur->insertActeur2($conn, $_POST['voornaam'], $_POST['achternaam']);
			
		echo "<script>alert('Acteur: $_POST[voornaam] $_POST[achternaam] is toegevoegd')</script>";
		echo "<script> location.replace('index.php'); </script>";
			
	} 
?>




