<?php
	require_once 'modeleJoueur.php';
	require_once 'ConnexionALaBDD.php';

	/*Classe JoueurManager en PHP*/
	class JoueurManager
	{
		//Le manager a besoin d'une connexion.
		private $_db;

		//Constructeur du Manager
		public function __Construct($db)
		{
			$this->setDB($db);
		}

		public function setDB(PDO $db)
		{
			$this->_db=$db;
		}

		//Créer un joueur
		public function addJoueur(Joueur $joueur)
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
				echo "<script>console.log('Insertion des données joueur effectuée');</script>";
			}
			catch(PDOException $e)
			{
				echo "<script>console.log(\"Erreur : ".$e->getMessage()."\");</script>";
				echo "<h2 style='color : red'>Pseudonyme : \"".$joueur->getPseudo()."\" déjà enregistré, était-ce vous ?</h2>";
			}
		}

		/***ATTENTION***/
		/*Cette fonction est encore en phase de test.*/
		//Retourne un joueur si le pseudo et le mdp sont corrects
		public function getJoueurByPseudoAndMdp($pseudo,$mdp)
		{
			//Récupérer la connexion
			global $connexion;

			$req = "SELECT Pseudo, MDP, Email, DDN FROM Joueur WHERE Pseudo IN ('$pseudo') AND MDP IN ('$mdp')";
			try
			{
				$stmt= $connexion->prepare($req); //On prépare la requête dans un statement, avec la connexion.
				//Exécuter la requête
				$stmt->execute();

				$nb=$stmt->rowcount();
				$result=$stmt->setFetchMode(PDO::FETCH_ASSOC);

				if ($nb==1)
				{
					/*$mJoueur = array
					(
						"Joueur" => $result['Pseudo'],
						"MDP" => $result['MDP'],
						"Email" => $result['Email'],
						"DDN" => $result['DDN']
					);*/
					
					$JoueurActuel = new Joueur($result['Pseudo'],$result['MDP'],$result['Email'],$result['DDN']);;

					//$JoueurActuel->hydrate($mJoueur);

					return $JoueurActuel;
				}
				elseif ($nb<1)
				{
					//On indique qu'il y a eu un problième dans la récupération du joueur.
					echo "<script>console.log('Aucun résultat pour : Pseudo = $pseudo MDP = $mdp.');</script>";
				}
				else
				{
					//On indique qu'il y a eu un problième dans la récupération du joueur.
					echo "<script>console.log('Erreur critique, plusieurs joueurs ayant le même pseudonyme et mot de passe existes : Pseudo = $pseudo MDP = $mdp.');</script>";
				}

				//On referme la base
				$stmt->closeCursor();

				//On indique que l'insertion s'est bien passée
				echo "<script>console.log('Requête \"$req\" effectuée');</script>";

			}
			catch(PDOException $e)
			{
				echo "Erreur : ".$e->getMessage();
			}
		}
		/***ATTENTION***/

		//Retourne la liste de tous les clients
		public function getListeJoueur()
		{

		}

		//Update un client
		public function updateJoueur()
		{

		}

		//Supprimer un Joueur
		public function deleteJoueur(Joueur $joueur)
		{
			$this->_db->exec('DELETE FROM JOUEUR WHERE PSEUDO = '.$joueur->getPseudo());
		}
		//Supprimer un joueur en renseignant l'ID
		public function deleteJoueurById($id)
		{
			$this->_db->exec('DELETE FROM JOUEUR WHERE PSEUDO = '.$id);
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