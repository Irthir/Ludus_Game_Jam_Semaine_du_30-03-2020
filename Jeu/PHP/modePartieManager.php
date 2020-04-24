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

		public function afficheTableauScore($connexion,$Niveau)
		{
			$mareq='SELECT Pseudo, Minutes, Secondes, Millisecondes FROM Partie WHERE IDNiveau="'.$Niveau.'" ORDER BY Score ASC LIMIT 10;';
			$statement=$connexion->prepare($mareq);
			$statement->execute();
			$nb=$statement->rowcount();
			$Classement=1;
			if ($nb>0)
			{
				$result = $statement->setFetchMode(PDO::FETCH_ASSOC);
				//vérifier result si le fetch a fonctionné.
				echo '<table class="TableAffiche"><caption><h1 style="text-decoration: underline;">Tableau des Scores du Niveau '.substr($Niveau, 6).'<h1></caption><thead><tr>';
				echo "<th><h3 style='font-weight:bold;'>Classement</h3></th>";
				foreach (array_keys($statement->fetchAll()[0]) as $value)
				{
					echo "<th><h3 style='font-weight:bold;'>".$value."</h3></th>";
				}
				$statement=$connexion->prepare($mareq);
				$statement->execute();
				$result = $statement->setFetchMode(PDO::FETCH_ASSOC); //permet de passer en tableau associatif uniquement.
				echo "</tr></thead>";
				echo "<tbody>";
				foreach ($statement as $row)
				{
					echo "<tr>";
					echo "<td>".$Classement."</td>";
					foreach ($row as $key => $value)
					{
						echo"<td class='".$key."'>".$value."</td>";
					}
					echo "</tr>";
					$Classement=$Classement+1;
				}
				echo "</tbody>";
				echo "</table>";
			}
		}
	}

?>
