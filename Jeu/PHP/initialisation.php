<?php
	function initialisationMap($maConn) {

		//Gestion des infos principales de la map
		$_SESSION['IDNiveau']="Niveau".$_REQUEST['level'];


		$req = '
			SELECT *
				FROM Map
				WHERE idMap = '.$_REQUEST['level'].';
		';

		foreach($maConn->query($req) as $row) {
			$wMap = $row['wMap'];
			$hMap = $row['hMap'];
			$xExit = 320 - ($wMap-1) * 25 + $row['xExit'] * 50;
			$yExit = 445 - ($hMap-1) * 25 + $row['yExit'] * 50;
			echo('
				<div class="exit" style="
					left: '.$xExit.'px;
					top: '.$yExit.'px;
				">				
				</div>
			');
		}

		echo('
			<script type="text/javascript">
				var TMap = [
		');
			for($i=0; $i<$wMap; $i++) {
				echo('[');
				for($j=0; $j<$hMap; $j++) {
					echo('0');
					if($j<$hMap-1) {
						echo(',');
					}
				}
				echo(']');
				if($i<$wMap-1) {
					echo(',');
				}
			}
		echo('
				];
			</script>
		');


		//Gestion des murs de la map
		$req = '
			SELECT *
				FROM Wall
				WHERE idMap = '.$_REQUEST['level'].';
		';

		foreach($maConn->query($req) as $row) {
			
			for($i=0; $i<$row['wWall']; $i++) {
				for($j=0; $j<$row['hWall']; $j++) {
					$xWall = $row['xWall'] + $i;
					$yWall = $row['yWall'] + $j;

					$xBlock = 320 - ($wMap-1) * 25 + ($row['xWall'] + $i) * 50;
					$yBlock = 445 - ($hMap-1) * 25 + ($row['yWall'] + $j) * 50;
					echo('
						<div class="wall" style="
							left: '.$xBlock.'px;
							top: '.$yBlock.'px;
							color: white;
						">
						</div>
						<script type="text/javascript">
							TMap['.$xWall.']['.$yWall.'] = 1;
						</script>
					');
				}
			}
		}


		//Gestion des Boutons
		$req = '
			SELECT *
				FROM Button
				WHERE idMap = '.$_REQUEST['level'].';
		';

		foreach($maConn->query($req) as $row) {
			$xButton = 320 - ($wMap-1) * 25 + $row['xButton'] * 50;
			$yButton = 445 - ($hMap-1) * 25 + $row['yButton'] * 50;
			$cButton = chr(64+$row['idButton']);

			echo('
				<div class="button" id="button'.$row['idButton'].'" title="Button '.$cButton.'" style="
					left: '.$xButton.'px;
					top: '.$yButton.'px;
				">
				'.$cButton.'
				</div>
				<script type="text/javascript">
					Button'.$row['idButton'].' = {x:'.$row['xButton'].', y:'.$row['yButton'].', pressed:0};
				</script>
			');
		}


		//Gestion des Portes
		$req = '
			SELECT *
				FROM Door
				WHERE idMap = '.$_REQUEST['level'].';
		';

		foreach($maConn->query($req) as $row) {
			$xDoor = 320 - ($wMap-1) * 25 + $row['xDoor'] * 50;
			$yDoor = 445 - ($hMap-1) * 25 + $row['yDoor'] * 50 + 15;

			echo('
				<div class="door" id="door'.$row['idDoor'].'" title="Door '.$row['idDoor'].' : '.$row['formula'].'" style="
					left: '.$xDoor.'px;
					top: '.$yDoor.'px;
				">
				'.$row['idDoor'].'
				</div>
				<script type="text/javascript">
					Door'.$row['idDoor'].' = {x:'.$row['xDoor'].', y:'.$row['yDoor'].', open:0};
					function open'.$row['idDoor'].'() {
						if(');

			$reqForm = '
				SELECT *
					FROM PossibleFormula
					WHERE idDoor = '.$row['idDoor'].'
					AND idMap = '.$row['idMap'].';
			';

			$nbFormula = 0;

			foreach($maConn->query($reqForm) as $rowForm) {

				$reqLink = '
					SELECT *
						FROM FormulaLink
						WHERE idFormula = '.$rowForm['idFormula'].';
				';

				$nbLink = 0;

				foreach($maConn->query($reqLink) as $rowLink) {
					if($nbLink == 0) {
						if($nbFormula == 0) {
							echo('Button'.$rowLink['idButton'].'.pressed == '.$rowLink['accept']);
						} else {
							echo('|| Button'.$rowLink['idButton'].'.pressed == '.$rowLink['accept']);
						}
					} else {
						echo('&& Button'.$rowLink['idButton'].'.pressed == '.$rowLink['accept']);
					}
					$nbLink++;
				}

				if($nbLink == 0) {
					if($nbFormula == 0) {
						echo('true');
					} else {
						echo(' || true');
					}
				}
				$nbFormula++;
			}

			if($nbFormula == 0) {
				echo('true');
			}

			echo(') {
							Door'.$row['idDoor'].'.open = 1;
							document.getElementById("door'.$row['idDoor'].'").className = "doorOpen";
						} else {
							Door'.$row['idDoor'].'.open = 0;
							document.getElementById("door'.$row['idDoor'].'").className = "door";
						}
					}
				</script>
			');
		}


		//Gestion des Unites
		$req = '
			SELECT *
				FROM Unit
				WHERE idMap = '.$_REQUEST['level'].';
		';

		foreach($maConn->query($req) as $row) {
			$xUnit = 320 - ($wMap-1) * 25 + $row['xUnit'] * 50 + 10;
			$yUnit = 445 - ($hMap-1) * 25 + $row['yUnit'] * 50 + 10;
			echo('
				<div class="unit" id="unit'.$row['idUnit'].'" title="unit'.$row['idUnit'].'" style="
					left: '.$xUnit.'px;
					top: '.$yUnit.'px;
				">
				'.$row['idUnit'].'
				</div>


				<script type="text/javascript">
					Unit'.$row['idUnit'].' = {x:'.$row['xUnit'].', y:'.$row['yUnit'].'};
				</script>
				');
		}

		foreach($maConn->query($req) as $row) {
			
			//Creation de la fonction pour bouger en haut
			echo('
				<script>
					function unit'.$row['idUnit'].'moveUp() {
						move = 1;
			');

			//Verification du deplacement par rapport aux murs
			echo('
						if(TMap[Unit'.$row['idUnit'].'.x][Unit'.$row['idUnit'].'.y-1] == 1) {
							move = 0;
						}
			');

			//Verification du deplacement par rapport aux limites du niveau
			echo('
						if(Unit'.$row['idUnit'].'.y-1 < 0) {
							move = 0;
						}
			');

			//Verification du deplacement par rapport aux autres unites
			$reqUnit = '
				SELECT *
					FROM Unit
					WHERE idMap = '.$_REQUEST['level'].';
			';

			foreach($maConn->query($reqUnit) as $rowUnit) {
				if($rowUnit['idUnit'] != $row['idUnit']) {
					echo('
						if((Unit'.$row['idUnit'].'.y-1 == Unit'.$rowUnit['idUnit'].'.y) && (Unit'.$row['idUnit'].'.x == Unit'.$rowUnit['idUnit'].'.x)) {
							move = 0;
						}
					');
				}
			}

			//Verification du deplacement par rapport aux portes
			$reqDoor = '
				SELECT *
					FROM Door
					WHERE idMap = '.$_REQUEST['level'].';
			';

			foreach($maConn->query($reqDoor) as $rowDoor) {
				echo('
						if((Unit'.$row['idUnit'].'.y-1 == Door'.$rowDoor['idDoor'].'.y) && (Unit'.$row['idUnit'].'.x == Door'.$rowDoor['idDoor'].'.x) && (Door'.$rowDoor['idDoor'].'.open == 0)) {
							move = 0;
						}
				');
			}

			echo('
						if(move == 1) {
							Unit'.$row['idUnit'].'.y--;
							position = 445 - ('.$hMap.'-1) * 25 + Unit'.$row['idUnit'].'.y * 50 + 10;
							document.getElementById("unit'.$row['idUnit'].'").style.top = position+"px";
						}
					}
				</script>
			');


			//Creation de la fonction pour bouger en bas
			echo('
				<script>
					function unit'.$row['idUnit'].'moveDown() {
						move = 1;
			');

			//Verification du deplacement par rapport aux murs
			echo('
						if(TMap[Unit'.$row['idUnit'].'.x][Unit'.$row['idUnit'].'.y+1] == 1) {
							move = 0;
						}
			');

			//Verification du deplacement par rapport aux limites du niveau
			echo('
						if(Unit'.$row['idUnit'].'.y+1 >= '.$hMap.') {
							move = 0;
						}
			');

			//Verification du deplacement par rapport aux autres unites
			$reqUnit = '
				SELECT *
					FROM Unit
					WHERE idMap = '.$_REQUEST['level'].';
			';

			foreach($maConn->query($reqUnit) as $rowUnit) {
				if($rowUnit['idUnit'] != $row['idUnit']) {
					echo('
						if((Unit'.$row['idUnit'].'.y+1 == Unit'.$rowUnit['idUnit'].'.y) && (Unit'.$row['idUnit'].'.x == Unit'.$rowUnit['idUnit'].'.x)) {
							move = 0;
						}
					');
				}
			}

			//Verification du deplacement par rapport aux portes
			$reqDoor = '
				SELECT *
					FROM Door
					WHERE idMap = '.$_REQUEST['level'].';
			';

			foreach($maConn->query($reqDoor) as $rowDoor) {
				echo('
						if((Unit'.$row['idUnit'].'.y+1 == Door'.$rowDoor['idDoor'].'.y) && (Unit'.$row['idUnit'].'.x == Door'.$rowDoor['idDoor'].'.x) && (Door'.$rowDoor['idDoor'].'.open == 0)) {
							move = 0;
						}
				');
			}

			echo('
						if(move == 1) {
							Unit'.$row['idUnit'].'.y++;
							position = 445 - ('.$hMap.'-1) * 25 + Unit'.$row['idUnit'].'.y * 50 + 10;
							document.getElementById("unit'.$row['idUnit'].'").style.top = position+"px";
						}
					}
				</script>
			');


			//Creation de la fonction pour bouger à gauche
			echo('
				<script>
					function unit'.$row['idUnit'].'moveLeft() {
						move = 1;
			');

			//Verification du deplacement par rapport aux murs
			echo('
						if(TMap[Unit'.$row['idUnit'].'.x-1][Unit'.$row['idUnit'].'.y] == 1) {
							move = 0;
						}
			');

			//Verification du deplacement par rapport aux limites du niveau
			echo('
						if(Unit'.$row['idUnit'].'.x-1 < 0) {
							move = 0;
						}
			');

			//Verification du deplacement par rapport aux autres unites
			$reqUnit = '
				SELECT *
					FROM Unit
					WHERE idMap = '.$_REQUEST['level'].';
			';

			foreach($maConn->query($reqUnit) as $rowUnit) {
				if($rowUnit['idUnit'] != $row['idUnit']) {
					echo('
						if((Unit'.$row['idUnit'].'.y == Unit'.$rowUnit['idUnit'].'.y) && (Unit'.$row['idUnit'].'.x-1 == Unit'.$rowUnit['idUnit'].'.x)) {
							move = 0;
						}
					');
				}
			}

			//Verification du deplacement par rapport aux portes
			$reqDoor = '
				SELECT *
					FROM Door
					WHERE idMap = '.$_REQUEST['level'].';
			';

			foreach($maConn->query($reqDoor) as $rowDoor) {
				echo('
						if((Unit'.$row['idUnit'].'.y == Door'.$rowDoor['idDoor'].'.y) && (Unit'.$row['idUnit'].'.x-1 == Door'.$rowDoor['idDoor'].'.x) && (Door'.$rowDoor['idDoor'].'.open == 0)) {
							move = 0;
						}
				');
			}

			echo('
						if(move == 1) {
							Unit'.$row['idUnit'].'.x--;
							position = 320 - ('.$wMap.'-1) * 25 + Unit'.$row['idUnit'].'.x * 50 + 10;
							document.getElementById("unit'.$row['idUnit'].'").style.left = position+"px";
						}
					}
				</script>
			');


			//Creation de la fonction pour bouger à droite
			echo('
				<script>
					function unit'.$row['idUnit'].'moveRight() {
						move = 1;
			');

			//Verification du deplacement par rapport aux murs
			echo('
						if(TMap[Unit'.$row['idUnit'].'.x+1][Unit'.$row['idUnit'].'.y] == 1) {
							move = 0;
						}
			');

			//Verification du deplacement par rapport aux limites du niveau
			echo('
						if(Unit'.$row['idUnit'].'.x+1 >= '.$wMap.') {
							move = 0;
						}
			');

			//Verification du deplacement par rapport aux autres unites
			$reqUnit = '
				SELECT *
					FROM Unit
					WHERE idMap = '.$_REQUEST['level'].';
			';

			foreach($maConn->query($reqUnit) as $rowUnit) {
				if($rowUnit['idUnit'] != $row['idUnit']) {
					echo('
						if((Unit'.$row['idUnit'].'.y == Unit'.$rowUnit['idUnit'].'.y) && (Unit'.$row['idUnit'].'.x+1 == Unit'.$rowUnit['idUnit'].'.x)) {
							move = 0;
						}
					');
				}
			}

			//Verification du deplacement par rapport aux portes
			$reqDoor = '
				SELECT *
					FROM Door
					WHERE idMap = '.$_REQUEST['level'].';
			';

			foreach($maConn->query($reqDoor) as $rowDoor) {
				echo('
						if((Unit'.$row['idUnit'].'.y == Door'.$rowDoor['idDoor'].'.y) && (Unit'.$row['idUnit'].'.x+1 == Door'.$rowDoor['idDoor'].'.x) && (Door'.$rowDoor['idDoor'].'.open == 0)) {
							move = 0;
						}
				');
			}

			echo('
						console.log(move);
						if(move == 1) {
							Unit'.$row['idUnit'].'.x++;
							position = 320 - ('.$wMap.'-1) * 25 + Unit'.$row['idUnit'].'.x * 50 + 10;
							document.getElementById("unit'.$row['idUnit'].'").style.left = position+"px";
						}
					}
				</script>
			');
		}
	}

?>