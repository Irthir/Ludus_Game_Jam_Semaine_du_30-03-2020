<?php
	require_once "ConnexionALaBDD.php";
	$connexion=ConnexionBDD();
	require_once 'modeJoueurManager.php';
	require_once 'modeleJoueur.php';
	if (isset($_REQUEST['Pseudo']) AND isset($_REQUEST['MDP']))
	{
		$Manager = new JoueurManager($connexion);
		$Joueur = $Manager->getJoueurByPseudoAndMdp($_REQUEST['Pseudo'],$_REQUEST['MDP']);
		if (isset($Joueur) AND !empty($Joueur))
		{
			session_start();
			$_SESSION["Joueur"]=$_REQUEST['Pseudo'];
			header('Location:PageSimple.php');
			exit();
		}
	}
?>

<!DOCTYPE html>
<HTML>
	<HEAD> <!--Information de configuration : encodage, langue,...-->
		<!--Méthode d'insertion du style dans le HEAD-->
		<!--Appelle du style par un fichier externe.-->
		<link rel="stylesheet" type="text/css" href="../CSS/Index.CSS" charset="utf-8"/>
		<style type="text/css">
			fieldset
			{
				display: block;
			}
		</style>
		<link rel="shortcut icon" type="image/x-icon" href="../Contenus/images/cirno9.jpg"/>
		<meta charset="utf-8"/>
		<lang="fr"/>
		<TITLE>GameJam du 30/03/2020</TITLE>
	</HEAD>

	<BODY>
		<h1>Contact</h1>

		<form id="contact" method="post" action="mail/mail.php">
			<fieldset><legend>Vos coordonnées</legend>
				<p><label for="nom">Nom : </label><input type="text" id="nom" name="nom" /></p>
				<p><label for="email">Email : </label><input type="text" id="email" name="email" /></p>
			</fieldset>
		 
			<fieldset><legend>Votre message : </legend>
				<p><label for="objet">Objet : </label><input type="text" id="objet" name="objet" /></p>
				<p><label for="message">Message : </label><textarea id="message" name="message" cols="30" rows="8"></textarea></p>
			</fieldset>
		 	<fieldset>
		 		<label for="copie">Voulez-vous en recevoir une copie ?</label><input type="checkbox" name="copie" id="copie">
		 		<br/>
		 		<input style="text-align:center;" type="submit" name="envoi" value="Envoyer le mail !" />
		 	</fieldset>
		</form>
		<footer>
		<h3>Contacts :</h3>
			<ul><li>r.schlotter@ludus-academie.com</li>
			<li>g.piou@ludus-academie.com</li>
			<li>o.viceconte@ludus-academie.com</li>
			<li>j.zumkir@ludus-academie.com</li></ul>
		</footer>
	</BODY>
</HTML>