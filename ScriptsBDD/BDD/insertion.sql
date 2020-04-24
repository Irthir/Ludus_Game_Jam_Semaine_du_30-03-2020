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
	(1,1,3,0,"a + a . b");

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



/*Creation du niveau 2*/

INSERT INTO Wall(idMap,idWall,xWall,yWall,wWall,hWall)
VALUES
	(2,1,0,0,3,1),
	(2,2,0,0,1,5),
	(2,3,4,0,3,1),
	(2,4,6,0,1,5),
	(2,5,0,4,7,1),
	(2,6,2,2,1,1),
	(2,7,4,2,1,1);

INSERT INTO Unit(idMap,idUnit,xUnit,yUnit)
VALUES
	(2,1,2,3),
	(2,2,4,3);

INSERT INTO Door(idMap,idDoor,xDoor,yDoor,formula)
VALUES
	(2,1,3,0,"a . (a + b)");

INSERT INTO Button(idMap,idButton,xButton,yButton)
VALUES
	(2,1,1,2),
	(2,2,5,2);

INSERT INTO PossibleFormula(idMap,idDoor,idFormula)
VALUES
	(2,1,2);

INSERT INTO FormulaLink(idFormula,idButton,accept)
VALUES
	(2,1,1);



/*Creation du niveau 3*/

INSERT INTO Wall(idMap,idWall,xWall,yWall,wWall,hWall)
VALUES
	(3,1,0,0,3,1),
	(3,2,0,0,1,5),
	(3,3,4,0,3,1),
	(3,4,6,0,1,5),
	(3,5,0,4,7,1),
	(3,6,2,2,3,1);

INSERT INTO Unit(idMap,idUnit,xUnit,yUnit)
VALUES
	(3,1,2,3),
	(3,2,4,3);

INSERT INTO Door(idMap,idDoor,xDoor,yDoor,formula)
VALUES
	(3,1,3,0,"(a + b) . (a + n(b))");

INSERT INTO Button(idMap,idButton,xButton,yButton)
VALUES
	(3,1,2,1),
	(3,2,4,1);

INSERT INTO PossibleFormula(idMap,idDoor,idFormula)
VALUES
	(3,1,3);

INSERT INTO FormulaLink(idFormula,idButton,accept)
VALUES
	(3,1,1);


/*Creation du niveau 4*/

INSERT INTO Wall(idMap,idWall,xWall,yWall,wWall,hWall)
VALUES
	(4,1,0,0,3,1),
	(4,2,0,0,1,5),
	(4,3,4,0,3,1),
	(4,4,6,0,1,5),
	(4,5,0,4,7,1),
	(4,6,2,1,1,2);

INSERT INTO Unit(idMap,idUnit,xUnit,yUnit)
VALUES
	(4,1,3,2),
	(4,2,4,2);

INSERT INTO Door(idMap,idDoor,xDoor,yDoor,formula)
VALUES
	(4,1,1,2,"n(a) . b"),
	(4,2,3,0,"a . (n(a) + n(b))");

INSERT INTO Button(idMap,idButton,xButton,yButton)
VALUES
	(4,1,1,1),
	(4,2,5,3);

INSERT INTO PossibleFormula(idMap,idDoor,idFormula)
VALUES
	(4,1,4),
	(4,2,5);

INSERT INTO FormulaLink(idFormula,idButton,accept)
VALUES
	(4,1,0),
	(4,2,1),
	(5,1,1),
	(5,2,0);


/*Creation du niveau 5*/

INSERT INTO Wall(idMap,idWall,xWall,yWall,wWall,hWall)
VALUES
	(5,1,0,0,4,1),
	(5,2,0,0,1,6),
	(5,3,5,0,4,1),
	(5,4,8,0,1,6),
	(5,5,0,5,9,1),
	(5,6,1,2,1,1),
	(5,7,4,2,1,1),
	(5,8,7,2,1,1);

INSERT INTO Unit(idMap,idUnit,xUnit,yUnit)
VALUES
	(5,1,3,2),
	(5,2,5,2);

INSERT INTO Door(idMap,idDoor,xDoor,yDoor,formula)
VALUES
	(5,1,4,0,"(a + b) . (n(n(a)) + c)");

INSERT INTO Button(idMap,idButton,xButton,yButton)
VALUES
	(5,1,1,3),
	(5,2,7,3),
	(5,3,7,1);

INSERT INTO PossibleFormula(idMap,idDoor,idFormula)
VALUES
	(5,1,6),
	(5,1,7);

INSERT INTO FormulaLink(idFormula,idButton,accept)
VALUES
	(6,1,1),
	(7,2,1),
	(7,3,1);


/*Creation du niveau 6*/

INSERT INTO Wall(idMap,idWall,xWall,yWall,wWall,hWall)
VALUES
	(6,1,0,0,3,1),
	(6,2,0,0,1,5),
	(6,3,4,0,3,1),
	(6,4,6,0,1,5),
	(6,5,0,4,7,1),
	(6,6,1,1,1,1),
	(6,7,2,2,1,1),
	(6,8,4,2,1,1),
	(6,9,5,1,1,1);

INSERT INTO Unit(idMap,idUnit,xUnit,yUnit)
VALUES
	(6,1,2,3),
	(6,2,3,3),
	(6,3,4,3);

INSERT INTO Door(idMap,idDoor,xDoor,yDoor,formula)
VALUES
	(6,1,3,0,"(n(b) + n(a)) . (a . c + n(b))"),
	(6,2,3,2,"a . b");

INSERT INTO Button(idMap,idButton,xButton,yButton)
VALUES
	(6,1,1,2),
	(6,2,5,2),
	(6,3,2,1);

INSERT INTO PossibleFormula(idMap,idDoor,idFormula)
VALUES
	(6,1,8),
	(6,2,9);

INSERT INTO FormulaLink(idFormula,idButton,accept)
VALUES
	(8,2,0),
	(9,1,1),
	(9,2,1);


/*Creation du niveau 7*/

INSERT INTO Wall(idMap,idWall,xWall,yWall,wWall,hWall)
VALUES
	(7,1,0,0,4,1),
	(7,2,0,0,1,5),
	(7,3,5,0,4,1),
	(7,4,8,0,1,5),
	(7,5,0,4,9,1),
	(7,6,3,2,1,1),
	(7,7,5,2,1,1);

INSERT INTO Unit(idMap,idUnit,xUnit,yUnit)
VALUES
	(7,1,3,3),
	(7,2,5,3);

INSERT INTO Door(idMap,idDoor,xDoor,yDoor,formula)
VALUES
	(7,1,4,0,"c . (b + c) + (n(n(a)) + d) . (n(a) + d) . n(c)");

INSERT INTO Button(idMap,idButton,xButton,yButton)
VALUES
	(7,1,7,1),
	(7,2,7,3),
	(7,3,1,3),
	(7,4,1,1);

INSERT INTO PossibleFormula(idMap,idDoor,idFormula)
VALUES
	(7,1,10),
	(7,1,11);

INSERT INTO FormulaLink(idFormula,idButton,accept)
VALUES
	(10,3,1),
	(11,4,1);


/*Creation du niveau 8*/

INSERT INTO Wall(idMap,idWall,xWall,yWall,wWall,hWall)
VALUES
	(8,1,0,0,4,1),
	(8,2,0,0,1,7),
	(8,3,5,0,3,1),
	(8,4,7,0,1,7),
	(8,5,0,6,8,1),
	(8,6,1,3,1,1),
	(8,7,3,1,1,3);

INSERT INTO Unit(idMap,idUnit,xUnit,yUnit)
VALUES
	(8,1,4,2),
	(8,2,5,4),
	(8,3,2,4);

INSERT INTO Door(idMap,idDoor,xDoor,yDoor,formula)
VALUES
	(8,1,4,0,"a . b . c +  a . n(b) . c + a . b . n(c)"),
	(8,2,2,3,"a . b + n(a) . b + n(n(a)) . c + n(a) . c");

INSERT INTO Button(idMap,idButton,xButton,yButton)
VALUES
	(8,1,1,1),
	(8,2,6,1),
	(8,3,6,5);

INSERT INTO PossibleFormula(idMap,idDoor,idFormula)
VALUES
	(8,1,12),
	(8,1,13),
	(8,2,14),
	(8,2,15);

INSERT INTO FormulaLink(idFormula,idButton,accept)
VALUES
	(12,1,1),
	(12,2,1),
	(13,1,1),
	(13,3,1),
	(14,2,1),
	(15,3,1);


/*Creation du niveau 9*/

INSERT INTO Wall(idMap,idWall,xWall,yWall,wWall,hWall)
VALUES
	(9,1,0,0,4,1),
	(9,2,0,0,1,6),
	(9,3,5,0,4,1),
	(9,4,8,0,1,6),
	(9,5,0,5,9,1),
	(9,6,2,1,1,2),
	(9,7,6,1,1,2);

INSERT INTO Unit(idMap,idUnit,xUnit,yUnit)
VALUES
	(9,1,1,1),
	(9,2,3,3),
	(9,3,4,3),
	(9,4,5,3);

INSERT INTO Door(idMap,idDoor,xDoor,yDoor,formula)
VALUES
	(9,1,4,0,"(n(a) + b) . (a + b + d) . n(d)"),
	(9,2,1,2,"c . (b . c + n(b) . c + b . n(c))"),
	(9,3,7,2,"(a . b + c + d) . a . b");

INSERT INTO Button(idMap,idButton,xButton,yButton)
VALUES
	(9,1,1,4),
	(9,2,7,4),
	(9,3,7,1),
	(9,4,1,1);

INSERT INTO PossibleFormula(idMap,idDoor,idFormula)
VALUES
	(9,1,16),
	(9,3,17),
	(9,2,18),
	(9,2,19);

INSERT INTO FormulaLink(idFormula,idButton,accept)
VALUES
	(16,2,1),
	(16,4,0),
	(17,1,1),
	(17,2,1),
	(18,3,1),
	(18,2,1),
	(19,3,1),
	(19,1,1);