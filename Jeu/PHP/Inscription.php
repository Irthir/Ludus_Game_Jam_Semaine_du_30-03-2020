<?php
	require "ConnexionALaBDD.php";
	$connexion=ConnexionBDD();
	require_once 'modeJoueurManager.php';
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
		<TITLE>Inscription</TITLE>
	</HEAD>

	<BODY>
		<h1>Inscription</h1>

		<?php
			$mareq='SELECT * FROM joueur;';
			$statement=$connexion->prepare($mareq);
			$statement->execute();
			$nb=$statement->rowcount();
			if ($nb>0)
			{
				$result = $statement->setFetchMode(PDO::FETCH_ASSOC);
				//vérifier result si le fetch a fonctionné.
				echo "<table class='TableAffiche'><caption>".$table."</caption><thead><tr>";
				foreach (array_keys($statement->fetchAll()[0]) as $value)
				//Vérifier le fetchAll et le array keys
				{
					//note ucfirt() à réviser.
					echo "<th>".$value."</th>";
				}
				echo "</tr></thead>";
				echo "</tbody>";
				echo "</table>";
			}
		?>


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