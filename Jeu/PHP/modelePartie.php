<?php
	/*Classe Partie en PHP*/

	class Partie
	{
		/*Les membres de Partie*/
		/*Identificateur de la partie*/
		//private $IDPartie;
		/*Pseudo du joueur*/
		private $Pseudo;
		/*ID du niveau dans lequel le joueur a joué*/
		private $IDNiveau;
		/*Date de la partie*/
		private $DatePartie;
		/*Score du joueur, le but étant de faire le minimum*/
		private $Score;
		/*Temps : minutes de la partie.*/
		private $Minutes;
		/*Temps : secondes de la partie.*/
		private $Secondes;
		/*Temps : millisecondes de la partie.*/
		private $Millisecondes;


		/*Le destructeur*/
		public function __destruct()
		{
			echo "<script>console.log(\"Destruction de la classe Partie\");<script>";
		}

		/*Les getters*/
		/*public function getIDPartie()
		{
			return $this->IDPartie;
		}*/
		public function getPseudo()
		{
			return $this->Pseudo;
		}
		public function getIDNiveau()
		{
			return $this->IDNiveau;
		}
		public function getDatePartie()
		{
			return $this->DatePartie;
		}
		public function getScore()
		{
			return $this->Score;
		}
		public function getMinutes()
		{
			return $this->Minutes;
		}
		public function getSecondes()
		{
			return $this->Secondes;
		}
		public function getMillisecondes()
		{
			return $this->Millisecondes;
		}

		/*Les setters*/
		/*public function setIDPartie($idpartie)
		{
			$this->IDPartie=$idpartie;
		}*/
		public function setPseudo($pseudo)
		{
			$this->Pseudo=$pseudo;
		}
		public function setIDNiveau($idniveau)
		{
			$this->IDNiveau=$idniveau;
		}
		public function setDatePartie($datepartie)
		{
			$this->DatePartie=$datepartie;
		}
		public function setScore($score)
		{
			$this->Score=$score;
		}
		public function setMinutes($minutes)
		{
			$this->Minutes=$minutes;
		}
		public function setSecondes($secondes)
		{
			$this->Secondes=$secondes;
		}
		public function setMillisecondes($millisecondes)
		{
			$this->Millisecondes=$millisecondes;
		}

		public function hydrate(array $donnees)
		{
			foreach ($donnees as $key => $value)
			{
				//On récupère le nom du setter correcpondant à l'attribut.
				$method = 'set'.ucfirst($key);

				//Si le setter correspondant existe.
				if (method_exists($this, $method))
				{
					//On appelle le setter.
					$this->$method($value);
				}
			}
		}
	}
?>
