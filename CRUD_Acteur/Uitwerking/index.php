<html>
<!--
	Auteur: R. Wigmans
	Function: home page CRUD Acteur
-->

<body>
	<h1>CRUD Acteur</h1>
	<nav>
		<a href='insert_form.php'>Toevoegen nieuwe acteur</a>
	</nav>
	
<?php

// De classe definitie
include "Acteurs.php";
include 'conn.php';
$conn = dbConnect();

// Maak een object Acteur
$acteur = new Acteur;

// Haal alle acteurs op uit de database mbv de method getActeurs()
$lijst = $acteur->getActeurs($conn);

// Print een HTML tabel van de lijst	
$acteur->showTable($lijst);
?>
</body>
</html>