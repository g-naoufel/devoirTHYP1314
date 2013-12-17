<?php

if (isset ($_GET['nom'])) {

	require_once 'connexion.php';
		
	extract($_GET);
	enregister($nom,html_entity_decode($cours));
	//echo $nom . " à " . date("H:i") . " a eu la note $note pour l'exercice : ". $exe." du cours ".$cours;
	echo "L'étudiant(e) ".$nom . " est ".$raison." le ".date("H:i") . " au cours ".$cours;
}else{
	echo "Y'a RIEN !!";
}

//function enregister($etu, $exe, $note, $cours) {
function enregister($nom,$cours) {
	//$date= date("Y-m-j H:i:s");
	//$sql = "INSERT INTO notes(etu, exercice, cours, note, maj) VALUES ('$etu', '$exe', '$cours', $note, NOW()) ";
	$sql = "INSERT INTO etudiant VALUES ('$nom', '$cours') ";
	mysql_query($sql) or die('Requête invalide : ' . mysql_error());
}

?>
