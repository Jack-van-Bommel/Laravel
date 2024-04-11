<?php
// Auteur: R. Wigmans
// Function: connectie database

function dbConnect(){
	$servername = "localhost" ;
	$dbname = "film" ;
	$username = "root" ;
	$password = "" ;

	if(isset($conn)){
		return $conn;
	}else{
		try{
			 $conn = new PDO ("mysql:host=$servername;dbname=$dbname",
									$username, $password) ;

			 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
			 $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			 //echo "Connectie is gelukt <br />" ;
		}

		catch(PDOException $e){
			 echo "Connectie mislukt: " . $e->getMessage() ;
		}
		return $conn;
	}
	
}

?>