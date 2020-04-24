<?php
	function readCode($maConn) {

		echo('
			<script type="text/javascript">
				function sleep(ms) {
					return new Promise(resolve => setTimeout(resolve,ms));
				}
			</script>
		');


		echo('
			<script type="text/javascript">
				function verification() {
		');

		$reqButton = '
			SELECT *
				FROM Button
				WHERE idMap = '.$_REQUEST['level'].';
		';

		foreach($maConn->query($reqButton) as $rowButton) {

			echo('
					Button'.$rowButton['idButton'].'.pressed = 0;
			');

			$reqUnit = '
				SELECT *
					FROM Unit
					WHERE idMap = '.$_REQUEST['level'].';
			';

			foreach($maConn->query($reqUnit) as $rowUnit) {
				echo('
					if(Unit'.$rowUnit['idUnit'].'.x == Button'.$rowButton['idButton'].'.x && Unit'.$rowUnit['idUnit'].'.y == Button'.$rowButton['idButton'].'.y) {
						Button'.$rowButton['idButton'].'.pressed = 1;
					}
				');
			}
		}

		$reqDoor = '
			SELECT *
				FROM Door
				WHERE idMap = '.$_REQUEST['level'].';
		';

		foreach($maConn->query($reqDoor) as $rowDoor) {
			echo('
					open'.$rowDoor['idDoor'].'();
				');
		}

		echo('
				}
			</script>
		');


		$newString = str_replace("\r\n", '', $_REQUEST['code']);
		$newString = ltrim($newString);
		$instructions = explode(';', $newString);

		foreach($instructions as $row=>$val) {
			if(strlen($val) == 0) {
				unset($instructions[$row]);
			}
		}


		echo('
			<script type="text/javascript">
				async function move() {
					');
		$nbErrors = 0;

		foreach($instructions as $row=>$val) {
			
			if($nbErrors == 0) {
				$req = '
					SELECT *
						FROM Unit
						WHERE idMap = '.$_REQUEST['level'].';
				';


				$verified = 0;

				foreach($maConn->query($req) as $rowUnit) {
					if($verified == 0) {
						$up = 'unit'.$rowUnit['idUnit'].'.moveUp()';
						$down = 'unit'.$rowUnit['idUnit'].'.moveDown()';
						$left = 'unit'.$rowUnit['idUnit'].'.moveLeft()';
						$right = 'unit'.$rowUnit['idUnit'].'.moveRight()';
						switch($val) {
							case $up:
							case $down:
							case $left:
							case $right:
								$newVal = str_replace('.', '', $val);
								echo('await sleep(1000);
					'.$newVal.';
					verification();
						');
								$verified = 1;
								break;
						}
					}
				}
			}
			
		}

		echo('console.log("fini !");');

		$reqMap = '
			SELECT *
				FROM Map
				WHERE idMap = '.$_REQUEST['level'].';
		';

		foreach($maConn->query($reqMap) as $rowMap) {

			$reqUnit = '
				SELECT *
					FROM Unit
					WHERE idMap = '.$_REQUEST['level'].';
			';

			echo('win = 0;');

			foreach($maConn->query($reqUnit) as $rowUnit) {
				echo('
					if(Unit'.$rowUnit['idUnit'].'.x == '.$rowMap['xExit'].' && Unit'.$rowUnit['idUnit'].'.y == '.$rowMap['yExit'].') {
						win = 1;
					}
				');
			}
		}

		echo('
			if(win == 1) {
				CreatVarFin();
				alert("Bravo ! Vous avez reussi !");
				ValeurCookie();
			} else {
				alert("Ce chemin ne semble pas être le bon...");
			}
		');

		echo('
				}

			move();
			</script>
		');

	}

?>