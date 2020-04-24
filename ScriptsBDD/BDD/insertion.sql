USE MapsJam;

INSERT INTO Map(idMap,nomMap,wMap,hMap,xExit,yExit)
VALUES
	(1,"Niveau 1",7,5,3,0),
	(2,"Niveau 2",7,5,3,0),
	(3,"Niveau 3",7,5,3,0),
	(4,"Niveau 4",7,5,3,0),
	(5,"Niveau 5",9,6,4,0),
	(6,"Niveau 6",7,5,3,0),
	(7,"Niveau 7",9,5,4,0),
	(8,"Niveau 8",8,7,4,0),
	(9,"Niveau 9",9,6,4,0);


/*Creation du niveau 1*/

INSERT INTO Wall(idMap,idWall,xWall,yWall,wWall,hWall)
VALUES
	(1,1,0,0,3,1),
	(1,2,0,0,1,5),
	(1,3,4,0,3,1),
	(1,4,6,0,1,5),
	(1,5,0,4,7,1);

INSERT INTO Unit(idMap,idUnit,xUnit,yUnit)
VALUES
	(1,1,2,3),
	(1,2,4,3);

INSERT INTO Door(idMap,idDoor,xDoor,yDoor,formula)
VALUES
	(1,1,3,0,"a.(a+b)");

INSERT INTO Button(idMap,idButton,xButton,yButton)
VALUES
	(1,1,1,2),
	(1,2,5,2);

INSERT INTO PossibleFormula(idMap,idDoor,idFormula)
VALUES
	(1,1,1);

INSERT INTO FormulaLink(idFormula,idButton,accept)
VALUES
	(1,1,1);