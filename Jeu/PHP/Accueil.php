<?php
	session_start();
	require_once 'modeleJoueur.php';
	if (!isset($_SESSION['Joueur']))
	{
		header("Location:./Deconnexion.php");
	}
?>

<!DOCTYPE html>
<HTML>
	<HEAD> <!--Information de configuration : encodage, langue,...-->
		<link rel="shortcut icon" type="image/x-icon" href="../img_web/header_img/Woobie.png">

		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Header.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Background.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Footer.css">
        <link rel="stylesheet" type="text/css" href="../CSS/GameJam_deco.css">

	<script type="text/javascript" src="../JS/GAME_jam_2020.js"></script>
		<meta charset="utf-8"/>
		<lang="fr"/>
		<TITLE>Accueil</TITLE>
	</HEAD>

	<body onload="masquer_conn(text1); masquer_insc(text2);">

	<header id="Bheader" name="Bheader" class="main-header">
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

		        	<!--<li id="menu-item-Accueil" class="menu-item">
		                <a href="Accueil.php">Accueil</a>
		            </li>-->
		            <li id="menu-item-Jeu" class="menu-item">
		                <a href="Niveau1.php">Jeu</a>
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

	<h1>Accueil</h1>

	<h2>Bienvenue <?php if (isset($_SESSION["Joueur"])){echo $_SESSION["Joueur"];}?> !</h2>

	<p style="width: 75%;"> Le projet "Laboolatory" fut créer par 4 quatre personnes à la suite d'un défi de Jam. Voici ce qu'a aboutis le travail après 1 mois de travail à domicile pendant la période de confinement.<BR/>


	<BR/>
	Le but du projet était de faire un sérious game pour apprendre de manière ludique une matière. <BR/>
	<BR/>
	Nous nous sommes focalisés sur l'algèbre de Boole ainsi que sur la programmation. <BR/>

	<BR/>
	Le jeu est un jeu de puzzle par lequel il faut, à l'aide de programmation, déplacé un ou des robots sur les boutons avec la réponse attendu pour l'énigme sur la porte. <BR/>
	<BR/>


	</p>

	<!--<div id="liens" name="liens">

	<a href="GameJam_inscription_2020.html" id="Insc" name="Insc" title="Inscription au jeu">Inscription</a>

	<a href="GameJam_connexion_2020.html" id="Connex" name="Connex" title="Connexion à son compte">Connexion</a>

	</div>-->

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