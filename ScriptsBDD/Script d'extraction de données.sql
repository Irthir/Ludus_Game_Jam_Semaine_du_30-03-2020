USE dbPays;

--INSERTION DE LA DONNEE !
/*
INSERT INTO <TableName>
(ColumnName1,ColumnName2, ... ,ColumnNameN)
VALUES
('Val1','Val2')
*/


/*On affiche tous les clients qui n'ont pas de catégorie.*/
SELECT * FROM Client WHERE catégorieclient is null;

/*On affiche tous les clients qui ont une catégorie vide.*/
SELECT * FROM Client WHERE catégorieclient="";

/**/