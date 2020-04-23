<?php
	require_once "ConnexionALaBDD.php";
	$connexion=ConnexionBDD();
	require_once 'modeJoueurManager.php';
	require_once 'modeleJoueur.php';
	if (isset($_REQUEST['Pseudo']) AND isset($_REQUEST['MDP']))
	{
		$Manager = new JoueurManager($connexion);
		$Joueur = $Manager->getJoueurByPseudoAndMdp($_REQUEST['Pseudo'],$_REQUEST['MDP']);
		if (isset($Joueur) AND !empty($Joueur))
		{
			session_start();
			$_SESSION["Joueur"]=$_REQUEST['Pseudo'];
			header('Location:PageSimple.php');
			exit();
		}
	}
	if (isset($_SESSION['mail']))
	{
		echo $_SESSION['mail'];
	}
?>

<!DOCTYPE html>
<HTML>
	<HEAD>
		<link rel="shortcut icon" type="image/x-icon" href="../img_web/header_img/Woobie.png">

		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Header.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Background.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Footer.css">

		<script type="text/javascript" src="../JS/GAME_jam_2020.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="../Contenus/images/cirno9.jpg"/>
		<meta charset="utf-8"/>
		<lang="fr"/>
		<TITLE>Contacts</TITLE>
	</HEAD>

	<BODY>
		<header style="height: auto;" id="Bheader" name="Bheader" class="main-header">
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

		            <li id="menu-item-Accueil" class="menu-item">
		                <a href="Connexion.php">Connexion</a>
		            </li>
		            <li id="menu-item-Accueil" class="menu-item">
		        		<a href="Inscription.php">Inscription</a>
		        	</li>
		            
		        	<div class="separation"></div>
		    	</ul>
			</nav>d
		</header>

			<!-- DIV servant de fond -->
			<div id="rect-total1" class="rect-total">
			<div id="rect1" name="rect1" class="backrect"></div> 
			<div id="rect2" name="rect2" class="backrect"></div> 
			<div id="rect3" name="rect3" class="backrect"></div> 
			<div id="rect4" name="rect4" class="backrect"></div> 
			<div id="rect5" name="rect5" class="backrect"></div> 
			</div>

			<div id="rect-total1" class="rect-total">
			<div id="rect6" name="rect6" class="backrect"></div> 
			<div id="rect7" name="rect7" class="backrect"></div> 
			<div id="rect8" name="rect8" class="backrect"></div> 
			<div id="rect9" name="rect9" class="backrect"></div> 
			<div id="rect10" name="rect10" class="backrect"></div> 
			</div>

			<div id="rect-total1" class="rect-total">
			<div id="rect11" name="rect11" class="backrect"></div> 
			<div id="rect12" name="rect12" class="backrect"></div> 
			<div id="rect13" name="rect13" class="backrect"></div> 
			<div id="rect14" name="rect14" class="backrect"></div> 
			<div id="rect15" name="rect15" class="backrect"></div> 
			</div>


			<!-- DIV contenant les textes et l'écran de jeu -->

		<div id="divprincipal" name="divprincipal" class="visu">

			<h1>En savoir plus</h1>



			<p style="width: 75%;"> Cette Game Jam a eu lieu dans des circonstances inattendus. La France était en confinement à cause de la propagation du virus "COVID-19". Malgré la distance entre les élèves, notre école n'a pas supprimé la Jam. Nous avons donc dû travailler à domicile avec de la communication par appel vidéo et message, ainsi qu'une modification du temps de conception (1 mois au lieu d'1 semaine).<br/><br/>

			    L'équipe était composée de 4 personnes (2 premières années et 2 deuxièmes années). Avec le manque de connaissances et d'entrainement que les premières années avaient, ils ont dû se concentrer sur leur acquis telle que l'html et css ou même le Game Design. Pendant que les deuxièmes années amélioraient leurs connaissances sur la base de données, le php et js pour préparer ainsi leur examen de fin d'année. 

			</p>

		</div>

			<!-- DIV servant de fond -->
			<div id="rect-total1" class="rect-total">
			<div id="rect1" name="rect1" class="backrect"></div> 
			<div id="rect2" name="rect2" class="backrect"></div> 
			<div id="rect3" name="rect3" class="backrect"></div> 
			<div id="rect4" name="rect4" class="backrect"></div> 
			<div id="rect5" name="rect5" class="backrect"></div> 
			</div>

			<div id="rect-total1" class="rect-total">
			<div id="rect6" name="rect6" class="backrect"></div> 
			<div id="rect7" name="rect7" class="backrect"></div> 
			<div id="rect8" name="rect8" class="backrect"></div> 
			<div id="rect9" name="rect9" class="backrect"></div> 
			<div id="rect10" name="rect10" class="backrect"></div> 
			</div>

			<div id="rect-total1" class="rect-total">
			<div id="rect11" name="rect11" class="backrect"></div> 
			<div id="rect12" name="rect12" class="backrect"></div> 
			<div id="rect13" name="rect13" class="backrect"></div> 
			<div id="rect14" name="rect14" class="backrect"></div> 
			<div id="rect15" name="rect15" class="backrect"></div> 
			</div>


			<!-- DIV contenant les textes et l'écran de jeu -->

		<div id="divprincipal" name="divprincipal" class="visu">
			<h1>Nous envoyer un Mail :</h1>

			<form id="contact" method="post" action="mail/mail.php">
				<fieldset><legend>Vos coordonnées</legend>
					<p><label for="nom">Nom : </label><input type="text" id="nom" name="nom" /></p>
					<p><label for="email">Email : </label><input type="text" id="email" name="email" /></p>
				</fieldset>
			 
				<fieldset><legend>Votre message : </legend>
					<p><label for="objet">Objet : </label><input type="text" id="objet" name="objet" /></p>
					<p><label for="message">Message : </label><textarea id="message" name="message" cols="30" rows="8"></textarea></p>
				</fieldset>
			 	<fieldset>
			 		<!--<label for="copie">Voulez-vous en recevoir une copie ?</label>--><input type="hidden" name="copie" id="copie" value="false">
			 		<br/>
			 		<input style="text-align:center;" type="submit" name="envoi" value="Envoyer le mail !" />
			 	</fieldset>
			</form>
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
	</BODY>
</HTML>