<?php
	/*Classe Joueur en PHP*/

	class Joueur
	{
		/*Les membres de Joueur*/
		/*Identificateur et Pseudo du joueur*/
		private $Pseudo;
		/*Mot de passe du joueur*/
		private $MDP;
		/*email du joueur*/
		private $Email;
		/*Date de naissance du Joueur*/
		private $DDN;

		/*Le constructeur*/
		public function __construct($pseudo,$mdp,$mail,$ddn)
		{
			$this->Pseudo = (string)$pseudo; //cast vers string
			$this->MDP = (string)$mdp;
			$this->Email = (string)$mail;
			$this->DDN = date('Y-m-d',strtotime($ddn));
		}

		/*Le destructeur*/
		public function __destruct()
		{
			echo "<script>console.log('Destruction de la classe Joueur');<script>";
		}

		/*Les getters*/
		public function getPseudo()
		{
			return $this->Pseudo;
		}
		public function getMDP()
		{
			return $this->MDP;
		}
		public function getEmail()
		{
			return $this->Email;
		}
		public function getDDN()
		{
			return $this->DDN;
		}

		/*Les setters*/
		public function setPseudo($pseudo)
		{
			$this->Pseudo=$pseudo;
		}
		public function setMDP($mdp)
		{
			$this->MDP=$mdp;
		}
		public function setEmail($mail)
		{
			$this->Email=$mail;
		}
		public function setDDN($ddn)
		{
			$this->DDN=$ddn;
		}

		/*Fonction d'affichage de Joueur*/
		public function __toString()
		{
			return "Joueur : Pseudo=".$this->getPseudo().", MDP=".$this->getNom().". Email=".$this->getEmail().", DDN=".$this->getDDN().".";
		}
		
		/*Fonction de comparaison entre Joueurs*/
		public function equals(Joueur $joueur)
		{
			return ($this->getPseudo()==$joueur->getPseudo());
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