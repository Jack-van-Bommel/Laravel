<?php

class Acteur{
	static public $connect;
	public $nr;
	public $voornaam;
	public $achternaam;	
	
	// Methods
	
	public function setObject($nr, $voornaam, $achternaam){
		//self::$conn = $db;
		$this->nr = $nr;
		$this->voornaam = $voornaam;
		$this->achternaam = $achternaam;
	}

	public function getActeur($conn){
		
		// query: is een prepare en execute in 1 zonder placeholders
		$lijst = $conn->query("select * from acteurs 
										WHERE NR = '$this->nr'")
							->fetchAll(PDO::FETCH_ASSOC);
		return $lijst[0];
	}
	
	public function getActeurs($conn){
		
		// query: is een prepare en execute in 1 zonder placeholders
		$lijst = $conn->query("select * from 	acteurs")->fetchAll();
		return $lijst;
	}
	
	public function dropDownActeur($lijst, $row_selected = -1){
	
		echo "<label for='Acteurs'>Choose a acteur:</label>";
		echo "<select name='acteurnr'>";
		foreach ($lijst as $row){
			if($row_selected == $row["NR"]){
				echo "<option value='$row[NR]' selected='selected'> $row[VOORNAAM] $row[ACHTERNAAM]</option>\n";
			} else {
				echo "<option value='$row[NR]'> $row[VOORNAAM] $row[ACHTERNAAM]</option>\n";
			}
		}
		echo "</select>";
	}

	public function showTable($lijst){

		echo "<table border=1px>";
		foreach($lijst as $row){
			echo "<tr>";
			echo "<td>" . $row["NR"] . "</td>";
			echo "<td>" . $row["VOORNAAM"] . "</td>";
			echo "<td>" . $row["ACHTERNAAM"] . "</td>";
			//Update
			echo "<td><form action='update_form.php' method='POST'>
			<input type='hidden' name='nr' value='$row[NR]'>
			<input type='hidden' name='voornaam' value=\"". $row['VOORNAAM'] . "\">
			<input type='hidden' name='achternaam' value='$row[ACHTERNAAM]'>
			<input type='submit' name='update' value='Wijzig'>
			</form></td>";
			//Delete
			echo "<td><form action='delete.php' method='POST'>
			<input type='hidden' name='nr' value='$row[NR]'>
			<input type='submit' name='verwijderen' value='Verwijderen'>
			</form></td>";	
			echo "</tr>";
		}
		echo "</table>";
	}

	// Delete acteur
	public function deleteActeur($conn, $nr){

		$sql = "delete from acteurs where NR = '$nr'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
      return ($stmt->rowCount() == 1) ? true : false;
	}

	public function updateActeur2($conn, $nr, $naam, $achternaam){

		$sql = "update acteurs 
			set VOORNAAM = '$naam', ACHTERNAAM = '$achternaam' 
			WHERE NR = '$nr'";

		$stmt = $conn->prepare($sql);
		$stmt->execute(); 
		return ($stmt->rowCount() == 1) ? true : false;				
	}
	
	public function updateActeurSanitized($conn, $nr, $voornaam, $achternaam){

		$sql = "update acteurs 
			set VOORNAAM = :voornaam, ACHTERNAAM = :achternaam 
			WHERE NR = :nr";
			
		// PDO sanitize automatisch in de prepare
		$stmt = $conn->prepare($sql);
		$stmt->execute([
			'voornaam' => $voornaam,
			'achternaam'=> $achternaam,
			'nr'=> $nr
		]);  
	}
	public function updateActeur($conn){
		// Voor deze functie moet eerst een setObject aangeroepen worden om $this te vullen
		$sql = "update acteurs 
			set VOORNAAM = :voornaam, ACHTERNAAM = :achternaam 
			WHERE NR = :nr";

		$stmt = $conn->prepare($sql);
		$stmt->execute((array)$this);
		return ($stmt->rowCount() == 1) ? true : false;		
	}
	
	private function BepMaxNr($conn) : int {
		
	// Bepaal uniek nummer
	$sql="SELECT MAX(NR)+1 FROM acteurs";
	return  (int) $conn->query($sql)->fetchColumn();
}
	
	public function insertActeur($conn){
		// Voor deze functie moet eerst een setObject aangeroepen worden om $this te vullen
		
		//
		$this->nr = $this->BepMaxNr($conn);
		
		$sql = "INSERT INTO acteurs (NR, VOORNAAM, ACHTERNAAM)
		VALUES (:nr, :voornaam, :achternaam)";

		$stmt = $conn->prepare($sql);
		return $stmt->execute((array)$this);
			
	}
	
	public function insertActeur2($conn, $voornaam, $achternaam){
		
		// query
		$nr = $this->BepMaxNr($conn);
		$sql = "INSERT INTO acteurs (NR, VOORNAAM, ACHTERNAAM)
		VALUES (:nr, :voornaam, :achternaam)";
		
		// Prepare
		$stmt = $conn->prepare($sql);
		
		// Execute
		$stmt->execute([
			'nr'=>$nr,
			'voornaam'=>$voornaam,
			'achternaam'=>$achternaam
		]);			
	}
}
?>