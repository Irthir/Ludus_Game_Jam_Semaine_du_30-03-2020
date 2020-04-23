<?php
	require "ConnexionALaBDD.php";
	$connexion=ConnexionBDD();
	require_once 'modeleJoueur.php';
	require_once 'modeJoueurManager.php';
	require_once 'InscriptionCode.php';
?>
<!DOCTYPE html>
<HTML>
	<HEAD>
		<link rel="stylesheet" type="text/css" href="../CSS/Index.CSS" charset="utf-8"/>
		<link rel="shortcut icon" type="image/x-icon" href="../img_web/header_img/Woobie.png">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Header.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Background.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Footer.css">
	    <link rel="stylesheet" type="text/css" href="../CSS/GameJam_deco.css">
		<script type="text/javascript" src="../JS/GAME_jam_2020.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="../Contenus/images/cirno9.jpg"/>
		<meta charset="utf-8"/>
		<lang="fr"/>
		<TITLE>Inscription</TITLE>
	</HEAD>

	<BODY>
		<header id="Bheader" name="Bheader" class="main-header" style="height: auto;">
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
		        	<li id="menu-item-Contact" class="menu-item ">
		        		<a href="Contact.php">En savoir +</a>
		        	</li>

		        	<div class="separation"></div>

		    	</ul>
			</nav>
		</header>

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

		<div id="divprincipalInscCo" name="divprincipal" class="visu">

			<h1>Inscription</h1>

			<form id='inscription' name='inscription' method='GET' autocomplete="on" action="#"> <!--La méthode changera plus tard en post.-->
			<fieldset>
				<LEGEND></LEGEND>
				<label for="Pseudo">Pseudonyme : </label>
				<input type="text" name="Pseudo" id="Pseudo" required></input></br>
				<label for="MDP">Mot de passe : </label>
				<input type="password" name="MDP" id="MDP" required></input></br>
				<label for="Email">Email : </label>
				<input type="mail" name="Email" id="Email"></input></br>
				<label for="DDN">Date de Naissance : </label>
				<input type="Date" name="DDN" id="DDN"></input></br></br>
				<div>
					<input type="submit" class="valider" name="submit" value="Valider" style="margin: auto;">
					<input type="reset" class="valider" name="reset" value="Réinitialiser" onclick="location.href='Inscription.php'" style="margin: auto;">
				</div>
			</fieldset>
			</form>

			<p name="MotDePasseOublie" id="MotDePasseOublie"></p>

			<script type="text/javascript" src="../JS/PasseOublie.js"></script>
			<?php
				if (isset($Oubli))
				{
					echo $Oubli;
				}
			?>
		</div>
		<script type="text/javascript" src="../JS.GAME_jam_2020.js"></script>

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