<?php
	require_once 'modelePartie.php';
	require_once 'ConnexionALaBDD.php';

	/*Classe PartieManager en PHP*/
	class PartieManager
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

		//Créer une partie
		public function addPartie(Partie $partie)
		{
			//Récupérer la connexion
			global $connexion;

			$req = "INSERT INTO Partie (Pseudo, IDNiveau, DatePartie, Score, Minutes, Secondes, Millisecondes) VALUES
					(:PSEUDO,:IDNIVEAU,:DATEPARTIE,:SCORE,:MINUTES,:SECONDES,:MILLISECONDES)";

			try
			{
				$stmt= $connexion->prepare($req); //On prépare la requête dans un statement, avec la connexion.

				/*Avec bindValue*/
				$stmt->bindValue(":PSEUDO",$partie->getPseudo(), PDO::PARAM_STR);
				$stmt->bindValue(":IDNIVEAU",$partie->getIDNiveau(), PDO::PARAM_STR);
				$stmt->bindValue(":DATEPARTIE",$partie->getDatePartie(), PDO::PARAM_STR);
				$stmt->bindValue(":SCORE",$partie->getScore(), PDO::PARAM_STR);
				$stmt->bindValue(":MINUTES",$partie->getMinutes(), PDO::PARAM_STR);
				$stmt->bindValue(":SECONDES",$partie->getSecondes(), PDO::PARAM_STR);
				$stmt->bindValue(":MILLISECONDES",$partie->getMillisecondes(), PDO::PARAM_STR);

				//Exécuter la requête
				$stmt->execute();

				//On referme la base
				$stmt->closeCursor();

				//On indique que l'insertion s'est bien passée
				echo  "<script>console.log(\"Insertion réussit dans la BDD.\");</script>";
			}
			catch(PDOException $e)
			{
				echo "<script>console.log(\"Erreur : ".$e->getMessage()."\");</script>";
			}
		}
	}

?>
