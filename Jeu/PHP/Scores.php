<?php
	session_start();
	require_once "ConnexionALaBDD.php";
	$connexion=ConnexionBDD();
	require_once 'modeleJoueur.php';
	require_once 'modePartieManager.php';
	if (!isset($_SESSION['Joueur']))
	{
		header("Location:./Deconnexion.php");
	}
?>

<!DOCTYPE html>
<HTML>
	<HEAD> <!--Information de configuration : encodage, langue,...-->
		<link rel="shortcut icon" type="image/x-icon" href="../img_web/header_img/Woobie.png">
		<style type="text/css">
			table, th, td
			{
				border: 1px solid black;
				width: auto;
				height: auto;
				margin: auto;
			}
			table
			{
				border-collapse: collapse;
				text-align: center;
				width: 90%
			}
			#divprincipal
			{
				vertical-align: middle;
			}
			form
			{
				margin: auto;
				background-color : #354351;
				margin: auto;
				padding: auto;
				text-align: center;
				height: auto;
				width: auto;
				vertical-align: middle;
				padding-top: 35%;
				padding-bottom: 40%;
			}
			select
			{
				margin: auto;
				padding: auto;
				height: auto;
				width: auto;
				display: flex;
				justify-content: center;
				align-items: center;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Header.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Background.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Footer.css">
        <link rel="stylesheet" type="text/css" href="../CSS/GameJam_deco.css">

	<script type="text/javascript" src="../JS/GAME_jam_2020.js"></script>
		<meta charset="utf-8"/>
		<lang="fr"/>
		<TITLE>Accueil</TITLE>
	</HEAD>

	<BODY>
	<!--<body onload="masquer_conn(text1); masquer_insc(text2);">-->
 
	<header id="Bheader" name="Bheader" class="main-header" style="height: auto;">
		<!-- text au-dessus flip-->
		<div class="flip-card" tabIndex="0">
		  <div class="flip-card-inner">
		    <div class="flip-card-front">
		      <h3> Let's Play !</h3>
		    </div>
		    <div class="flip-card-back">
		      <h3> LABOOLATORY </h3>
		    </div>
		  </div>
		</div>
			<div id="rect" name="rect" class="open"></div>
			<nav id="main-nav">
		    	<ul id="menu-main-menu" class="menu">
		    		<li>
		    			<img src="../img_web/header_img/Woobie_logo.png" id="Woobie_logo">    		
		    		</li>

		    		<div class="separation"></div>

		    		<li id="menu-item-Score" class="menu-item">
		                <a href="Scores.php">Autres Scores</a>
		            </li>
		        	<li id="menu-item-Accueil" class="menu-item">
		                <a href="Accueil.php">Accueil</a>
		            </li>
		            <li id="menu-item-Jeu" class="menu-item">
		                <a href="GameJam_jeu_2020.php">Jeu</a>
		            </li>
		            <li id="menu-item-Contact" class="menu-item ">
		                <a href="Deconnexion.php">Deconnexion</a>
		            </li>

		        	<div class="separation"></div>

		    	</ul>
			</nav>
	</header>

	<!-- DIV servant de fond -->
	<div id="rect-total1" class="rect-total">
	<div id="rect1" name="rect1" class="backrect"></div> 
	<div id="rect2" name="rect2" class="backrect"></div> 
	<div id="rect3" name="rect3" class="backrect"></div> 
	<div id="rect4" name="rect4" class="backrect"></div> 
	<div id="rect5" name="rect5" class="backrect"></div> 
	</div>

	<div id="rect-total2" class="rect-total">
	<div id="rect6" name="rect6" class="backrect"></div> 
	<div id="rect7" name="rect7" class="backrect"></div> 
	<div id="rect8" name="rect8" class="backrect"></div> 
	<div id="rect9" name="rect9" class="backrect"></div> 
	<div id="rect10" name="rect10" class="backrect"></div> 
	</div>

	<div id="rect-total3" class="rect-total">
	<div id="rect11" name="rect11" class="backrect"></div> 
	<div id="rect12" name="rect12" class="backrect"></div> 
	<div id="rect13" name="rect13" class="backrect"></div> 
	<div id="rect14" name="rect14" class="backrect"></div> 
	<div id="rect15" name="rect15" class="backrect"></div> 
	</div>
	<!-- -->

	<!-- DIV contenant les textes et l'écran de jeu -->

	<div id="divprincipal" name="divprincipal" class="visu">

		<?php
			if (isset($_REQUEST["SelectionNiveau"]))
			{
				$PartieManager=new PartieManager($connexion);
				$PartieManager->afficheTableauScore($connexion,$_REQUEST["SelectionNiveau"]);
			}
			else
			{
				echo('
					<form action="#" method="POST" >
					    <select class="select" name="SelectionNiveau" required>
				');
				$req = '
					SELECT * FROM niveau
						ORDER BY IDNiveau;
				';
				foreach($connexion->query($req) as $row) {
					echo('
						<option value="'.$row['IDNiveau'].'">'.$row['IDNiveau'].'</option>
					');
				}
				echo('
						</select>
						<br/><br/><br/><br/>
						<input class="clickable" type="submit" name="chooseMap" value="Choisir ce Niveau">
					</form>
				');
			}
		 ?>

	</div>

	<footer id="BFooter" class="site-footer">
		
		<h3 id="Contacts" name="Contacts" class="Footer-item">Contacts :</h3>
			<ul id="Contacts-list" class="Contacts-list">
				<li id="Contact1" class="Contact"> <img src="../img_web/img_footer/ic_mail.png" id="icmail1" class="ic"> r.schlotter@ludus-academie.com</li>

				<li id="Contact2" class="Contact"> <img src="../img_web/img_footer/ic_mail.png" id="icmail1" class="ic"> g.piou@ludus-academie.com</li>

				<li id="Contact3" class="Contact"> <img src="../img_web/img_footer/ic_mail.png" id="icmail1" class="ic"> o.viceconte@ludus-academie.com</li>

				<li id="Contact4" class="Contact"> <img src="../img_web/img_footer/ic_mail.png" id="icmail1" class="ic"> j.zumkir@ludus-academie.com</li>
			</ul>

			<p id="copyR" class="paraFooter">
				<img src="../img_web/img_footer/ic_copyright.png" id="ic_copyright" class="ic">

				Ludus Académie / Game Jam 2020

			</p>
	</footer>
</HTML>