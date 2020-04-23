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
			header('Location:Accueil.php');
			exit();
		}
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
		<!-- -->

		<!-- DIV contenant les textes et l'écran de jeu -->

		<div id="divprincipalInscCo" name="divprincipal" class="visu">

			<h2>Bienvenue !</h2>

			<form id='connexion' name='connexion' method='GET' autocomplete="on" action="#"> <!--La méthode changera plus tard en post.-->
			<fieldset>
				<LEGEND><h3>Connexion : </h3></LEGEND>
				<br/>
				<label for="Pseudo">Pseudonyme : </label><br/><input type="text" name="Pseudo" id="Pseudo" placeholder="Saisir votre Pseudonyme"  required="required" title="Entrer votre pseudonyme"><br/>
				<label for="MDP">Mot de Passe :</label><br/><input type="password" name="MDP" id="motdepasse" placeholder="Saisir votre mot de passe"  required="required" title="Entrer votre mot de passe"><br/><br/>
				<div><input type="submit" name="submit" value="Connexion" class="valider" style="left: 0%">
				<input type="button" name="inscription" value="Inscription" class="valider" onclick="location.href='Inscription.php'" style="right: 0%"></div>
			</fieldset>
			</form>
			<p name="MotDePasseOublie" id="MotDePasseOublie">
			<!--<script type="text/javascript" src="../JS/PasseOublie.js"></script>-->
			<?php
				if (isset($Oubli))
				{
					echo $Oubli;
				}
			?>
			</p>
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