 
SET DATEFORMAT DMY

SELECT SUM(E.Cantidad) as Cantidades, SUM(E.Cantidad * M.Costo * (1 + M.PorcentajeImpuesto/100)) as ImporteTotal
FROM Entregan E, Materiales M
WHERE E.Clave = M.Clave
AND E.Fecha BETWEEN '01/01/1997' AND '31/12/1997'



SELECT P.RazonSocial, COUNT(*) as NumEntregas, SUM(E.Cantidad * M.Costo * (1 + M.PorcentajeImpuesto/100)) as ImporteTotal
FROM Entregan E, Proveedores P, Materiales M
WHERE E.RFC = P.RFC
AND E.Clave = M.Clave
GROUP BY P.RazonSocial


SELECT M.Clave, M.Descripcion, SUM(E.Cantidad) as CantidadEntregada, MIN(E.Cantidad) as CantidadMinima, MAX(E.Cantidad) as CantidadMaxima, SUM(E.Cantidad * M.Costo * (1 + M.PorcentajeImpuesto/100)) as ImporteTotal
FROM Materiales M, Entregan E
WHERE M.Clave = E.Clave
GROUP BY M.Clave, M.Descripcion
HAVING AVG(E.Cantidad) > 400


SELECT P.RFC, M.Clave, M.Descripcion, AVG(E.Cantidad) as Promedio
FROM Proveedores P, Entregan E, Materiales M
WHERE E.RFC = P.RFC
AND E.Clave = M.Clave
GROUP BY P.RFC, M.Clave, M.Descripcion
HAVING AVG(E.Cantidad) >= 500


SELECT P.RFC, M.Clave, M.Descripcion, AVG(E.Cantidad) as Promedio
FROM Proveedores P, Entregan E, Materiales M
WHERE E.RFC = P.RFC
AND E.Clave = M.Clave
GROUP BY P.RFC, M.Clave, M.Descripcion
HAVING AVG(E.Cantidad) < 370 OR AVG(E.Cantidad) > 450





SELECT * FROM Materiales

INSERT INTO materiales VALUES (1500, 'Cal', 150, 0);
INSERT INTO materiales VALUES (1510, 'Anillos 10x15', 30, 0);
INSERT INTO materiales VALUES (1520, 'Anillos 10x20', 35, 0);
INSERT INTO materiales VALUES (1530, 'Pegamento PVC', 85, 0);
INSERT INTO materiales VALUES (1540, 'Alambre', 100, 0);

UPDATE materiales SET PorcentajeImpuesto = 2*clave/1000; 


SELECT M.Clave, M.Descripcion
FROM Materiales M
WHERE M.Clave NOT IN 
			(SELECT E.Clave
			FROM Entregan E
			GROUP BY E.Clave)


SELECT P.RazonSocial
FROM Proveedores P, Entregan E, Proyectos Proy
WHERE P.RFC = E.RFC
AND Proy.Numero = E.Numero
AND Proy.Denominacion = 'Vamos Mexico'
AND P.RazonSocial IN (
				SELECT P.RazonSocial
				FROM Proveedores P, Entregan E, Proyectos Proy
				WHERE P.RFC = E.RFC
				AND Proy.Numero = E.Numero
				AND Proy.Denominacion = 'Queretaro Limpio')
GROUP BY P.RazonSocial


SELECT M.Descripcion
FROM Materiales M
WHERE M.Clave NOT IN 
			(SELECT E.Clave
			FROM Entregan E, Proyectos Proy
			WHERE Proy.Numero = E.Numero
			AND Proy.Denominacion = 'CIT Yucatan'
			GROUP BY E.Clave)



SELECT P.RazonSocial, AVG(E.Cantidad) as PromedioCantidad
FROM Proveedores P, Entregan E
WHERE P.RFC = E.RFC 
GROUP BY P.RazonSocial
HAVING AVG(E.Cantidad) > (SELECT AVG(E.Cantidad) as PromCantidad
						FROM Entregan E
						WHERE E.RFC = 'VAGO780901')



SET DATEFORMAT DMY

SELECT P.RFC, P.RazonSocial
FROM Proveedores P, Entregan E, Proyectos Proy
WHERE P.RFC = E.RFC
AND Proy.Numero = E.Numero
AND Proy.Denominacion = 'Infonavit Durango'
AND E.Fecha BETWEEN '01/01/2000' AND '31/12/2000'
GROUP BY P.RFC, P.RazonSocial
HAVING SUM(E.Cantidad) >
			(SELECT SUM(E.Cantidad)
			FROM Entregan E, Proyectos Proy
			WHERE Proy.Numero = E.Numero
			AND Proy.Denominacion = 'Infonavit Durango'
			AND E.Fecha BETWEEN '01/01/2001' AND '31/12/2001'
			GROUP BY E.RFC)



