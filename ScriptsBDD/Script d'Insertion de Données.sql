USE dbGameJam;

INSERT INTO Difficulte
(NomDifficulte, DescriptionNiveau)
VALUES
("Facile","Mode de difficulté le plus simple."),
("Normal","Mode de difficulté intermédiaire."),
("Difficile","Mode de difficulté élevé."),
("Très Difficile","Mode de difficulté le plus élevé.");


ALTER TABLE Partie ADD Score INT, Minutes INT, Secondes INT, Millisecondes INT;

-- A mettre à jour quand nous insérerons des niveaux.
INSERT INTO Niveau
(IDNiveau,NomDifficulte)
VALUES
("","Facile");