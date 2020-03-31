DROP DATABASE IF EXISTS dbGameJam;
CREATE DATABASE IF NOT EXISTS dbGameJam;

USE dbGameJam;

DROP TABLE IF EXISTS Joueur;
CREATE TABLE Joueur
(
	Pseudo varchar(80),
	MDP varchar(80),
	email varchar(80),
	DDN date,
	CONSTRAINT PseudonymeUnique PRIMARY KEY (Pseudo)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

DROP TABLE IF EXISTS Difficulte;
CREATE TABLE Difficulte
(
	NomDifficulte varchar (20),
	DescriptionNiveau varchar (80),
	CONSTRAINT NomDifficulteUnique PRIMARY KEY (NomDifficulte)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

DROP TABLE IF EXISTS Niveau;
CREATE TABLE Niveau
(
	IDNiveau varchar (80),
	NomDifficulte varchar (20),
	CONSTRAINT IDNiveauUnique PRIMARY KEY (IDNiveau),
	CONSTRAINT NomDifficulteExistant FOREIGN KEY (NomDifficulte) REFERENCES Difficulte (NomDifficulte)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

DROP TABLE IF EXISTS Partie;
CREATE TABLE Partie
(
	IDPartie INT AUTO_INCREMENT,
	Pseudo varchar(80),
	IDNiveau varchar(80),
	DatePartie date,
	CONSTRAINT PseudoExistant FOREIGN KEY (Pseudo) REFERENCES Joueur (Pseudo),
	CONSTRAINT NiveauExistant FOREIGN KEY (IDNiveau) REFERENCES Niveau (IDNiveau),
	CONSTRAINT IDPartieUnique PRIMARY KEY (IDPartie)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;