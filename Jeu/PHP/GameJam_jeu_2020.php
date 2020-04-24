<?php
	session_start();
	require_once 'modeleJoueur.php';
	require_once 'modelePartie.php';
	require_once 'modePartieManager.php';
	require_once "ConnexionALaBDD.php";
	if (!isset($_SESSION['Joueur']))
	{
		header("Location:./Deconnexion.php");
	}
	if (isset($_REQUEST['Victoire']))
	{
		if (isset($_SESSION['Joueur']))
		{
			$DatePartie = date("Y-m-d H:i:s");
			$connexion=ConnexionBDD();
			$MonPartieManager = new PartieManager($connexion);
			$mPartie = array
			(
				"Pseudo" => $_SESSION['Joueur'],
				"IDNiveau" => $_SESSION['IDNiveau'],
				"DatePartie" => $DatePartie,
				"Score" => $_COOKIE['Score'],
				"Minutes" => $_COOKIE['Minutes'],
				"Secondes" => $_COOKIE['Secondes'],
				"Millisecondes" => $_COOKIE['Millisecondes']
			);

			$partie = new Partie;

			$partie->hydrate($mPartie);

			$MonPartieManager->addPartie($partie);
			header("Location:GameJam_jeu_2020.php");
		}
		else
		{
			header("Location:./Deconnexion.php");
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Game Jam</title>
	
		<link rel="shortcut icon" type="image/x-icon" href="../img_web/header_img/Woobie.png">
	
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Header.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Background.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Footer.css">
		<link rel="stylesheet" type="text/css" href="../CSS/GameJam_Game.css">
	
		<script type="text/javascript" src="../JS/GAME_jam_2020.js"></script>
	
	</head>

	<body>
	
		<?php
		    require("connect.php");
		    $maConn = connectBDD();
		?>
	
		<form name="VictoireForm" id="VictoireForm" method="post" action="#">
            <input type="hidden" name="Victoire" id="Victoire" value="Victoire">
        </form>
        <script type="text/javascript" src="../JS/SystemeScore.js">
        </script>
	
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
					
					<li id="menu-item-Accueil" class="menu-item">
		                <a href="Scores.php">Tableau des Scores</a>
		            </li>
					<li id="menu-item-Jeu" class="menu-item">
		                <a href="Accueil.php">Accueil</a>
		            </li>
		            <li id="menu-item-Contact" class="menu-item ">
		                <a href="Deconnexion.php">Deconnexion</a>
		            </li>
		
					<div class="separation"></div>
		
				</ul>
			</nav>
		
		</header>
		<!-- -->
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
		
		<div id="divprincipaljeu" name="divprincipal" class="visu">
		
		<h1 id="titre">Laboolatory</h1>

		
		<?php
	
			echo('
			    <canvas id="Canvas1" width="550" height="500" style="border: 1px solid #000000;"></canvas>
			');
			

			//var_dump($_REQUEST['level']);
			//var_dump($_REQUEST['chooseMap']);

			if(isset($_REQUEST['level'])) {

				if(isset($_REQUEST['chooseMap'])) {
					echo('
						<script type="text/javascript">
							CreatVarDebut();
						</script>
					');
				}

				 echo('<a href="GameJam_jeu_2020.php" class="back"></a>');
				
				require("initialisation.php");
				initialisationMap($maConn);

				if(isset($_REQUEST['code'])) {
					echo('
						<form action="GameJam_jeu_2020.php#titre" method="GET">
							<input type="hidden" name="level" value="'.$_REQUEST['level'].'">
							<textarea class="code" name="code" value="" placeholder="Entrez votre code ici" autocomplete="off" autofocus="" cols="36" rows="30" spellcheck="false" required="">'.$_REQUEST['code'].'</textarea><br>
							<input class="clickable" id="subCode" type="submit" name="subCode" value="Valider">
						</form>
					');

					require("readCode.php");
					readCode($maConn);

				} else {
					echo('
						<form action="GameJam_jeu_2020.php#titre" method="GET">
							<input type="hidden" name="level" value="'.$_REQUEST['level'].'">
							<textarea class="code" name="code" value="" placeholder="Entrez votre code ici" autocomplete="off" autofocus="" cols="36" rows="30" spellcheck="false" required=""></textarea><br>
							<input class="clickable" id="subCode" type="submit" name="subCode" value="Valider">
						</form>
					');
				}



			} else {
				echo('
					<form action="GameJam_jeu_2020.php#titre" method="GET">
					    <select class="select" name="level" required="">
				');
				$req = '
					SELECT *
						FROM Map
						ORDER BY idMap;
				';
				foreach($maConn->query($req) as $row) {
					echo('
						<option value="'.$row['idMap'].'">'.$row['nomMap'].'</option>
					');
				}
				echo('
						</select>
						<input class="clickable" type="submit" name="chooseMap" value="Choisir ce Niveau">
					</form>
				');
			}
			
		?>
		<p id="texte">
			Le but est de déplacer un robot (unit) vers la sortie afin de passer les niveaux. <br/>
			Chaque porte possède une formule, placé votre curseur sur la porte pour afficher la formule.<br/>
			Afin de déplacer vos robots, vous avez à disposition 4 fonctions.<br/><br/>
		<p>
		<ul>
			<li>unit<strong>x</strong>.moveUp();</li>
			<li>unit<strong>x</strong>.moveDown();</li>
			<li>unit<strong>x</strong>.moveLeft();</li>
			<li>unit<strong>x</strong>.moveRight();</li>
		</ul>
				
		<p>
			<strong>x</strong> étant le numéro du robot.<br/>

			Déplacer vos robots sur les boutons permettant la résolution des formules. <br/>
			Les boutons ne sont actionnés que si un robot reste dessus.<br/>
			- n(<strong>x</strong>) signifie que le bouton x ne doit pas être pressé.<br/>
			- <strong>x</strong> . <strong>y</strong> signifie qu'il faut que les conditions x et y soient respectées.<br/>
			- <strong>x</strong> + <strong>y</strong> signifie qu'il faut que l'une des conditions entre x et y soit respectée.<br/>
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
	 
	</body>
</html>