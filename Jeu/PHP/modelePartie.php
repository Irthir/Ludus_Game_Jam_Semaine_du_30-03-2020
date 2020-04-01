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
		public function getPseudo($pseudo)
		{
			$this->Pseudo=$pseudo;
		}
		public function getIDNiveau($idniveau)
		{
			$this->IDNiveau=$idniveau;
		}
		public function getDatePartie($datepartie)
		{
			$this->DatePartie=$datepartie;
		}
		public function getScore($score)
		{
			$this->Score=$score;
		}
		public function getMinutes($minutes)
		{
			$this->Minutes=$minutes;
		}
		public function getSecondes($secondes)
		{
			$this->Secondes=$secondes;
		}
		public function getMillisecondes($millisecondes)
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
