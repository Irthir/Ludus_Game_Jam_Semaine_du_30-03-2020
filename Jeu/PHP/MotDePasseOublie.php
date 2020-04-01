<?php
	require_once "ConnexionALaBDD.php";
	$connexion=ConnexionBDD();
	require_once 'modeJoueurManager.php';
	require_once 'modeleJoueur.php';
	if (isset($_REQUEST['Pseudo']) AND isset($_REQUEST['MDP']))
	{
		$Manager = new JoueurManager($connexion);
		$Joueur = $Manager->updateJoueurMDP($_REQUEST['Pseudo'],$_REQUEST['MDP']);
	}
?>

<!DOCTYPE html>
<HTML>
	<HEAD> <!--Information de configuration : encodage, langue,...-->
		<!--Méthode d'insertion du style dans le HEAD-->
		<style type="text/css"></style>
		<!--Appelle du style par un fichier externe.-->
		<link rel="stylesheet" type="text/css" href="../CSS/Index.CSS" charset="utf-8"/>
		<link rel="shortcut icon" type="image/x-icon" href="../Contenus/images/cirno9.jpg"/>
		<meta charset="utf-8"/>
		<lang="fr"/>
		<TITLE>GameJam du 30/03/2020</TITLE>
	</HEAD>

	<BODY>
		<h1>Réinitialisation du Mot De Passe</h1>

		<div>Veuillez rentrer votre pseudo et votre nouveau mot de passe.</div>

		<form id='Réinitialisation' name='Réinitialisation' method='GET' autocomplete="on" action="#"> <!--La méthode changera plus tard en post.-->
		<fieldset>
			<LEGEND>Réinitialisation :</LEGEND>
			<div><label for="Pseudo">Pseudonyme : </label>
			<input type="text" name="Pseudo" id="Pseudo" required></input></div>
			<div><label for="MDP">Nouveau Mot de passe : </label>
			<input type="password" name="MDP" id="MDP" required></input></div><br/>
			<div><input type="submit" class="boutonsFormulaires" name="submit" value="Valider" style="left: 0%">
				<input type="button" class="boutonsFormulaires" name="inscription" value="Inscription" onclick="location.href='PHP/Inscription.php'" style="right: 0%"></div>
		</fieldset>
		</form>

		<a href="../index.php">Accueil</a><br/>
		<footer>
		<h3>Contacts :</h3>
			<ul><li>r.schlotter@ludus-academie.com</li>
			<li>g.piou@ludus-academie.com</li>
			<li>o.viceconte@ludus-academie.com</li>
			<li>j.zumkir@ludus-academie.com</li></ul>
		</footer>
	</BODY>
</HTML>