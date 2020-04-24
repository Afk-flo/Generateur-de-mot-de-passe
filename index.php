<?php
require("admin/chiffrage.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title> Générateur de code sécurisé </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<h1> Générateur de code sécurisé </h1>


	<form action="index.php" method="POST">

		<p> Quel genre de mot passe désirez-vous </p>

		<label> Faible </label>
		<input type="checkbox" value="faible" name="choix">

		<label> Moyen </label>
		<input type="checkbox" value="moyen" name="choix">

		<label> Fort </label>
		<input type="checkbox" value="fort" name="choix">

		<label> Très fort  </label>
		<input type="checkbox" value="tFort" name="choix">


		<p> Pour obtenir un code sécurisé appuyez sur le boutton : </p> 

		<input type="submit" name="generer" value="Générer">
		<?php echo $error; ?>

	</form>

	<h3> Votre code est : <span id="tocopy"> <?php echo $melange;   ?> </span> </h3>
	<p> Pour copier le code cliquez ici : <input type="button" value="Copier!" class="js-copy" data-target="#tocopy"> </p>

	<h4> Sécurisé de manière  <?php echo $typeMdp; ?> </h4>

	<h4> N'hésitez pas à tester le code reçu sur ce <a target="_blank" href="https://password.kaspersky.com/fr/">lien</a>. Attention cependant à ne pas rentrer votre vrai mot de passe </h4>


	<script>
		var btncopy = document.querySelector('.js-copy');
		if(btncopy) {
		    btncopy.addEventListener('click', docopy);
		}

		function docopy() {

		    // Cible de l'élément qui doit être copié
		    var target = this.dataset.target;
		    var fromElement = document.querySelector(target);
		    if(!fromElement) return;

		    // Sélection des caractères concernés
		    var range = document.createRange();
		    var selection = window.getSelection();
		    range.selectNode(fromElement);
		    selection.removeAllRanges();
		    selection.addRange(range);

		    try {
		        // Exécution de la commande de copie
		        var result = document.execCommand('copy');
		        if (result) {
		            // La copie a réussi
		            alert('Copié !');
		        }
		    }
		    catch(err) {
		        // Une erreur est surevnue lors de la tentative de copie
		        alert(err);
		    }

		    // Fin de l'opération
		    selection = window.getSelection();
		    if (typeof selection.removeRange === 'function') {
		        selection.removeRange(range);
		    } else if (typeof selection.removeAllRanges === 'function') {
		        selection.removeAllRanges();
		    }
		}



	</script>

</body>
</html>