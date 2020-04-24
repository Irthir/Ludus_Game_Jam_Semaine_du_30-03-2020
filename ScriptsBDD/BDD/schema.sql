DROP DATABASE IF EXISTS MapsJam;
CREATE DATABASE IF NOT EXISTS MapsJam;

USE MapsJam;

DROP TABLE IF EXISTS FormulaLink;
DROP TABLE IF EXISTS PossibleFormula;
DROP TABLE IF EXISTS Button;
DROP TABLE IF EXISTS Door;
DROP TABLE IF EXISTS Wall;
DROP TABLE IF EXISTS Unit;
DROP TABLE IF EXISTS Map;

CREATE TABLE IF NOT EXISTS Map(
	idMap int not null primary key,
	nomMap varchar(100) not null,
	wMap int not null,
	hMap int not null,
	xExit int not null,
	yExit int not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;


CREATE TABLE IF NOT EXISTS Unit(
	idUnit int not null,
	idMap int not null,
	xUnit int not null,
	yUnit int not null,
	PRIMARY KEY(idUnit, idMap),
	FOREIGN KEY(idMap) REFERENCES Map(idMap)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;


CREATE TABLE IF NOT EXISTS Wall(
	idWall int not null,
	idMap int not null,
	xWall int not null,
	yWall int not null,
	wWall int not null,
	hWall int not null,
	PRIMARY KEY(idWall, idMap),
	FOREIGN KEY(idMap) REFERENCES Map(idMap)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;


CREATE TABLE IF NOT EXISTS Door(
	idDoor int not null,
	idMap int not null,
	formula varchar(100) not null,
	xDoor int not null,
	yDoor int not null,
	PRIMARY KEY(idDoor, idMap),
	FOREIGN KEY(idMap) REFERENCES Map(idMap)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;


CREATE TABLE IF NOT EXISTS Button(
	idButton int not null,
	idMap int not null,
	xButton int not null,
	yButton int not null,
	PRIMARY KEY(idButton, idMap),
	FOREIGN KEY(idMap) REFERENCES Map(idMap)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;


CREATE TABLE IF NOT EXISTS PossibleFormula(
	idFormula int not null,
	idMap int not null,
	idDoor int not null,
	PRIMARY KEY(idFormula, idMap, idDoor),
	FOREIGN KEY(idMap) REFERENCES Map(idMap),
	FOREIGN KEY(idDoor) REFERENCES Door(idDoor)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;


CREATE TABLE IF NOT EXISTS FormulaLink(
	idFormula int not null,
	idButton int not null,
	accept boolean not null,
	PRIMARY KEY(idFormula, idButton),
	FOREIGN KEY(idFormula) REFERENCES PossibleFormula(idFormula),
	FOREIGN KEY(idButton) REFERENCES Button(idButton)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;