<?php

// De classe definitie
include "Acteurs.php";

// Maak een object Acteur
$acteur = new Acteur;

// Haal alle acteurs op uit de database mbv de method getActeurs()
$lijst = $acteur->getActeurs();

// Print een HTML tabel van de lijst	
$acteur->showTable($lijst);

?>