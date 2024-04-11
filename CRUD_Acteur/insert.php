<!DOCTYPE html>
<html>
<body>

<h1>CRUD Acteur</h1>

<?php
	if(isset($_POST["insert"]) && $_POST["insert"] == "Toevoegen"){
		
		include 'Acteurs.php';
		include 'conn.php';
		$conn = dbConnect();
		
		echo "<h2>Insert is uitgevoerd</h2>";
			$acteur = new Acteur;
			//$acteur->setObject(0, $_POST['voornaam'], $_POST['achternaam']);
			//$acteur->insertActeur($conn);
			$acteur->insertActeur2($conn, $_POST['voornaam'], $_POST['achternaam']);
			
		echo '<script>alert("Acteur is toegevoegd")</script>';
		echo "<script> location.replace('index.php'); </script>";
			
	} 
	?>
	<h2>Toevoegen</h2>
	<form method="post" action="insert.php">
	<label for="nv">Voornaam:</label>
   <input type="text" id="nv" name="voornaam" placeholder="Voornaam" required/>
   <br>   
   <label for="an">Achternaam:</label>
   <input type="text" id="an" name="achternaam" placeholder="Achternaam" required/>
   <br><br>
	<input type='submit' name='insert' value='Toevoegen'>
	</form></br>

	<a href='index.php'>Terug</a>

</body>
</html>



