<?php
    session_start();
	require_once 'modeleJoueur.php';
	$Niveau="Niveau 1";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Game Jam</title>
		<link rel="shortcut icon" type="image/x-icon" href="../img_web/header_img/Woobie.png">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Header.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Background.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Footer.css">
		<script type="text/javascript" src="../JS/GAME_jam_2020.js"></script>
	</head>
	<body>
		<header id="Bheader" name="Bheader" class="main-header">
			<!-- text au-dessus flip-->
			<div class="flip-card" tabIndex="0">
			  <div class="flip-card-inner">
			    <div class="flip-card-front">
			      <h3> <?php echo "$Niveau"; ?> !</h3>
			    </div>
			    <div class="flip-card-back">
			      <h3> Laboolatory </h3>
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
		        		<a href="./PageSimple.php">Accueil</a>
		        	</li>
		        	<li id="menu-item-Jeu" class="menu-item">
		        		<a href="PageSimple.php">Jeu</a>
		        	</li>
		        	<li id="menu-item-Deconnexion" class="menu-item ">
		        		<a href="./Deconnexion.php">Deconnexion</a>
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
		<!-- DIV contenant les textes et l'écran de jeu -->
		<div id="divprincipal" name="divprincipal" class="visu">
			<h1>Titre</h1>
			<canvas id="Canvas1" width="800" height="500" style="border: 1px solid #000000;"></canvas>
			<h2>Présentation : </h2>
			<p> texte texte texte texte texte texte texte texte texte texte texte texte texte texte texte texte texte texte texte texte texte <BR/>
			texte texte texte texte texte texte texte texte texte texte texte texte <BR/>
			texte texte texte texte .
			<BR/>
			texte texte texte texte texte texte texte texte texte texte texte texte <BR/>
			<BR/>
			texte texte texte texte texte texte texte texte texte texte texte texte <BR/>
			<BR/>
			texte texte texte texte texte texte texte texte texte texte texte texte <BR/>
			<BR/>
			texte texte texte texte texte texte texte texte texte texte texte texte <BR/>
			</p>
		</div>

		<script type="text/javascript" src="../JS/SystemeScore.js"></script>

		<button onclick="CreatVarDebut()">Debut</button>
		<button onclick="CreatVarFin()">Fin</button>
		<button onclick="ValeurCookie()">Cookies</button>

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
	</body>
</html>