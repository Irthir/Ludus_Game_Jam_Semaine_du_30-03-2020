<?php
	
	require_once 'class_joueur.php';

	function addJoueur(Joueur $joueur)
	{
		//Récupérer la connexion
		global $connexion;

		$req = "INSERT INTO Joueur (Pseudo, MDP, Email,DDN) VALUES 
				(:PSEUDO,:MDP,:MAIL,:DDN)";

		try
		{
			$stmt= $connexion->prepare($req); //On prépare la requête dans un statement, avec la connexion.

			/*Avec bindValue*/
			$stmt->bindValue(":PSEUDO",$joueur->getPseudo(), PDO::PARAM_STR);
			$stmt->bindValue(":MDP",$joueur->getMDP(), PDO::PARAM_STR);
			$stmt->bindValue(":MAIL",$joueur->getEmail(), PDO::PARAM_STR);
			$stmt->bindValue(":DDN",$joueur->getDDN(), PDO::PARAM_STR);

			//Exécuter la requête
			$stmt->execute();

			//On referme la base
			$stmt->closeCursor();

			//On indique que l'insertion s'est bien passée
			echo "<script>console.log('Insertion des données joueur effectuée');<script>";
		}
		catch(PDOException $e)
		{
			echo "Erreur : ".e->getMessage();
		}
	}

	//A ajouter dans la page de création de joueur :
	/*if (isset($_REQUEST["Pseudo"]) and !empty($_REQUEST["Pseudo"]))
	{
		/*$joueur = new Joueur($_REQUEST["Pseudo"],$_REQUEST["MDP"],$_REQUEST["Email"],$_REQUEST["DDN"]);
		addJoueur($Joueur);*/

		/*Tableau des valeurs du client à créer*/
		/*$mJoueur = $array
		(
			"Joueur" => $_REQUEST["Pseudo"],
			"MDP" => $_REQUEST["MDP"],
			"Email" => $_REQUEST["Email"],
			"DDN" => $_REQUEST["DDN"]),
		);
		
		$joueur = new Joueur;

		$joueur->hydrate($mJoueur);

		addJoueur($Joueur);*/
	/*}*/
?>