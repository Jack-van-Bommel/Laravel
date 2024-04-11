<!DOCTYPE html>
<html>
<body>

	<h1>CRUD Acteur</h1>
	<h2>Toevoegen</h2>
	<form method="post" action="insert_db.php">
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



