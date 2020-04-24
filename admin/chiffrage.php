<?php

$error = "";

if($_POST) {

	$typeMdp = htmlspecialchars($_POST['choix']);
	$isSuccess = true;

	if(empty($typeMdp)) {
		$error = "Erreur il faut coché une case. (Si vous en avez coché plusieurs, il ne faut en coché qu'une)";
		$isSuccess = false;
	} 


	if($typeMdp == "faible" && $isSuccess) {

		$bytes = random_bytes(2); // Random_bytes() Génère une chaîne de caractères de longueur arbitraire d'octets aléatoires cryptographiques qui convient à un usage cryptographique, comme lors de la génération de sels, de clés ou de vecteurs d'initialisation. (la valeur correspondra au nombres d'octets)

		$melange = bin2hex($bytes); // Bin2Hex convertit des données binaires en représentation hexadécimale

		$typeMdp = "Faible - Ce genre de code peut être utilisé comme mot de passe pour téléphone ou applications ayant peut d'importance"; // on change simplement le nom de type pour le retour en html 
	} 

	if($typeMdp == "moyen" && $isSuccess) {

		$bytes = random_bytes(7);

		$melange = bin2hex($bytes);

		$typeMdp = "Moyenne - Ce genre de code sera assez facile et pourra convenir aux différentes applications du quotidien.";
	}

	if($typeMdp == "fort" && $isSuccess) {

		$bytes = random_bytes(10);

		$melange = bin2hex($bytes); 

		$typeMdp = "Forte - Ce genre de code est plus compliqué à retenir mais plus sécurisé, il pourra être utilisé pour protéger des applications ou informations importantes et privées";

	}

	if($typeMdp == "tFort" && $isSuccess) {

		$bytes = random_bytes(32);

		$melange = bin2hex($bytes); 

		$typeMdp = "Très forte - Ce genre de code peut être utilisé dans la création de Token ou clé unique d'identification, il sera très sécurisé (32 octets)";

	}



}


?>