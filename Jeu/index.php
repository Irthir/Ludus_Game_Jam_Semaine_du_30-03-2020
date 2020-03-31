<?php
	require "PHP/ConnexionALaBDD.php";
	$connexion=ConnexionBDD();
	/*if(isset($connexion))
		echo "Connexion réussit à la base de donnée.";*/
?>
<!DOCTYPE html>
<HTML>
	<HEAD> <!--Information de configuration : encodage, langue,...-->
		<!--Méthode d'insertion du style dans le HEAD-->
		<style type="text/css"></style>
		<!--Appelle du style par un fichier externe.-->
		<link rel="stylesheet" type="text/css" href="./CSS/Index.CSS" charset="utf-8"/>
		<link rel="shortcut icon" type="image/x-icon" href="../Contenus/images/cirno9.jpg"/>
		<meta charset="utf-8"/>
		<lang="fr"/>
		<TITLE>Connexion</TITLE>
	</HEAD>

	<BODY>
		<h1>GameJam du 30/03/2020</h1>


		<a href="PHP/Inscription.php">Inscription</a><br/>
		<a href="PHP/PageSimple.php">Page Simple</a><br/>
		<footer>
		<h3>Contacts :</h3>
			<ul><li>r.schlotter@ludus-academie.com</li>
			<li>g.piou@ludus-academie.com</li>
			<li>o.viceconte@ludus-academie.com</li>
			<li>j.zumkir@ludus-academie.com</li></ul>
		</footer>
	</BODY>
</HTML>