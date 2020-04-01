<?php
	require_once "ConnexionALaBDD.php";
	$connexion=ConnexionBDD();
	require_once 'modeleJoueur.php';
	require_once 'modeJoueurManager.php';

	if (isset($_REQUEST["Pseudo"]) and !empty($_REQUEST["Pseudo"]))
	{
		$Manager = new JoueurManager($connexion);

		//$joueur = new Joueur($_REQUEST["Pseudo"],$_REQUEST["MDP"],$_REQUEST["Email"],$_REQUEST["DDN"]);

		//Tableau des valeurs du client à créer
		$mJoueur = array
		(
			"Pseudo" => $_REQUEST["Pseudo"],
			"MDP" => $_REQUEST["MDP"],
			"Email" => $_REQUEST["Email"],
			"DDN" => $_REQUEST["DDN"]
		);

		$joueur = new Joueur;

		$joueur->hydrate($mJoueur);

		$Manager->addJoueur($joueur);

		echo "<h2 style='color : green'>Inscription réussie !</h2>";
	}
?>
