<?php
	require_once "PHP/ConnexionALaBDD.php";
	$connexion=ConnexionBDD();
	require_once 'PHP/modeJoueurManager.php';
	require_once 'PHP/modeleJoueurManager.php';
	if (isset($_REQUEST['Pseudo']) AND isset($_REQUEST['MDP']))
	{
		$Joueur = new Joueur;
		$Joueur = getJoueurByPseudoAndMdp($_REQUEST['Pseudo'],$_REQUEST['MDP']);
		if (isset($Joueur) AND !is_null($Joueur))
		{
			session_start();
			$_SESSION["Joueur"]=$Joueur;
			if (isset($_SESSION["Joueur"]))
			{
				header('Location:PHP/PageSimple.php');
				exit();
			}
		}
	}
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
		<TITLE>GameJam du 30/03/2020</TITLE>
	</HEAD>

	<BODY>
		<h1>Bienvenue !</h1>

		<form id='connexion' name='connexion' method='GET' autocomplete="on" action="PHP/PageSimple.php"> <!--La méthode changera plus tard en post.-->
		<fieldset>
			<LEGEND>Connexion : </LEGEND>
			<div><label for="Pseudo">Pseudonyme : </label>
			<input type="text" name="Pseudo" id="Pseudo" required></input></div>
			<div><label for="MDP">Mot de passe : </label>
			<input type="password" name="MDP" id="MDP" required></input></div><br/>
			<div><input type="submit" class="boutonsFormulaires" name="submit" value="Connexion"></div>
		</fieldset>
		</form>



		<a href="PHP/Inscription.php">Inscription</a><br/>
		<footer>
		<h3>Contacts :</h3>
			<ul><li>r.schlotter@ludus-academie.com</li>
			<li>g.piou@ludus-academie.com</li>
			<li>o.viceconte@ludus-academie.com</li>
			<li>j.zumkir@ludus-academie.com</li></ul>
		</footer>
	</BODY>
</HTML>