<?php
	require_once "ConnexionALaBDD.php";
	$connexion=ConnexionBDD();
	require_once 'modeleJoueur.php';
	require_once 'modeJoueurManager.php';

	if (isset($_REQUEST["Pseudo"]) and !empty($_REQUEST["Pseudo"]))
	{
		$Manager = new JoueurManager($connexion);

		$joueur = new Joueur($_REQUEST["Pseudo"],$_REQUEST["MDP"],$_REQUEST["Email"],$_REQUEST["DDN"]);
		$Manager->addJoueur($joueur);

		//Tableau des valeurs du client à créer
		/*$mJoueur = array
		(
			"Joueur" => $_REQUEST["Pseudo"],
			"MDP" => $_REQUEST["MDP"],
			"Email" => $_REQUEST["Email"],
			"DDN" => $_REQUEST["DDN"]
		);
		
		$joueur = new Joueur;

		$joueur->hydrate($mJoueur);

		addJoueur($oueur);*/

	}
?>