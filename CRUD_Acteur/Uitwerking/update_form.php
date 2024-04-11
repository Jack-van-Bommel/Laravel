<!DOCTYPE html>
<html>
<body>
<h1>CRUD Acteur</h1>
<h2>Wijzigen</h2>

	
<form method="post" action="update_db.php">
<input type='hidden' name='nr' value='<?php echo $_POST["nr"];?>'>
<input type='text' name='voornaam' required value="<?php echo $_POST["voornaam"];?>"> *</br>
<input type='text' name='achternaam' required value='<?php echo $_POST["achternaam"];?>'> *</br></br>
<input type='submit' name='update' value='Wijzigen'>
</form></br>

<a href='index.php'>Terug</a>

</body>
</html>



