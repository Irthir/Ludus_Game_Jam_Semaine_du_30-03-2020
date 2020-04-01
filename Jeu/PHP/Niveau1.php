<?php
	session_start();
	require_once 'modeleJoueur.php';
	$Niveau="Niveau 1";
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
		<TITLE><?php echo=$Niveau ?></TITLE>
	</HEAD>

	<BODY>
		<h1>Le <?php echo=$Niveau ?>.</h1>

		<?php
			if (isset($_SESSION["Joueur"]))
			{
				echo "<h2>Bonjour ".$_SESSION['Joueur'].", tu es dans le ".$Niveau.".</h2><br/>";
			}
		?>


		<a href="./Deconnexion.php">Deconnexion</a><br/>
		<footer>
		<h3>Contacts :</h3>
			<ul><li>r.schlotter@ludus-academie.com</li>
			<li>g.piou@ludus-academie.com</li>
			<li>o.viceconte@ludus-academie.com</li>
			<li>j.zumkir@ludus-academie.com</li></ul>
		</footer>
	</BODY>
</HTML>