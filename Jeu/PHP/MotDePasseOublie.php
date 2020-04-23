<?php
	require_once "ConnexionALaBDD.php";
	$connexion=ConnexionBDD();
	require_once 'modeJoueurManager.php';
	require_once 'modeleJoueur.php';
	if (isset($_REQUEST['Pseudo']) AND isset($_REQUEST['MDP']))
	{
		$Manager = new JoueurManager($connexion);
		$Joueur = $Manager->updateJoueurMDP($_REQUEST['Pseudo'],$_REQUEST['MDP']);
	}
?>

<!DOCTYPE html>
<HTML>
	<HEAD> 
		<link rel="shortcut icon" type="image/x-icon" href="../img_web/header_img/Woobie.png">

		<link rel="stylesheet" type="text/css" href="../CSS/Index.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Header.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Background.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Footer.css">
	    <link rel="stylesheet" type="text/css" href="../CSS/GameJam_deco.css">

		<script type="text/javascript" src="../JS/GAME_jam_2020.js"></script>
		<meta charset="utf-8"/>
		<lang="fr"/>
		<TITLE>GameJam du 30/03/2020</TITLE>
	</HEAD>

	<BODY>
		<header style="height: auto;" id="Bheader" name="Bheader" class="main-header">
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

		    		<li id="menu-item-Accueil" class="menu-item">
		        		<a href="Connexion.php">Connexion</a>
		        	</li>

		        	<li id="menu-item-Accueil" class="menu-item">
		        		<a href="Inscription.php">Inscription</a>
		        	</li>
		        	<li id="menu-item-Contact" class="menu-item ">
		        		<a href="Contact.php">En savoir +</a>
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

			<h2>Réinitialisation du Mot De Passe</h2>

			<form id='Réinitialisation' name='Réinitialisation' method='POST' autocomplete="on" action="#"> <!--La méthode changera plus tard en post.-->
			<fieldset>
				<LEGEND>Veuillez rentrer votre pseudonyme et votre nouveau mot de passe.</LEGEND><br/><br/>
				<label for="Pseudo">Pseudonyme : </label><br/>
				<input type="text" name="Pseudo" id="Pseudo" required></input><br/>
				<label for="MDP">Nouveau Mot de passe : </label><br/>
				<input type="password" name="MDP" id="MDP" required></input><br/><br/>
				<div><input type="submit" class="valider" name="submit" value="Valider" style="margin: auto;">
					<input type="button" class="valider" name="inscription" value="Inscription" onclick="location.href='PHP/Inscription.php'" style="margin: auto;"></div>
			</fieldset>
			</form>

		</div>

		<footer>
		<h3>Contacts :</h3>
			<ul><li>r.schlotter@ludus-academie.com</li>
			<li>g.piou@ludus-academie.com</li>
			<li>o.viceconte@ludus-academie.com</li>
			<li>j.zumkir@ludus-academie.com</li></ul>
		</footer>
	</BODY>
</HTML>