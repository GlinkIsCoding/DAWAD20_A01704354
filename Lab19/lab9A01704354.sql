CREATE VIEW COSTOSCONIMPUESTOS AS (
SELECT Clave, Costo+(Costo*PorcentajeImpuesto/100) AS CostoConImpuesto
FROM Materiales)

SET DATEFORMAT dmy
SELECT E.Fecha AS FechaDeEntrega, SUM(Cantidad) AS CantidadesEntregadas, SUM(E.Cantidad*C.CostoConImpuesto) AS ImportedeEntrega
FROM COSTOSCONIMPUESTOS C, Entregan E
WHERE E.Clave=C.Clave AND E.Fecha BETWEEN '01/01/97' AND '31/12/97'
GROUP BY E.Fecha

CREATE VIEW IMPORTEPORPROVEEDOR AS(
SELECT E.RFC AS Proveedor, SUM(E.Cantidad*C.CostoConImpuesto) AS ImportedeEntregas
FROM Entregan E, COSTOSCONIMPUESTOS C
WHERE C.Clave=E.Clave
GROUP BY E.RFC)

SELECT P.RazonSocial, COUNT(E.RFC) AS NumeroEntregas, I.ImportedeEntregas
FROM Entregan E, Proveedores P, IMPORTEPORPROVEEDOR I
WHERE E.RFC = P.RFC AND I.Proveedor=E.RFC
GROUP BY P.RazonSocial, I.ImportedeEntregas

CREATE VIEW PROMEDIOCANTIDADPORMATERIAL AS(
SELECT Clave, AVG(Cantidad) AS PromedioCantidadEntregada
FROM Entregan
GROUP BY Clave)

SELECT M.Clave, M.Descripcion, SUM(E.Cantidad) AS CantidadTotal, MIN(E.Cantidad) AS MinimaCantidad, MAX(E.Cantidad) AS MaxCantidad, P.PromedioCantidadEntregada
FROM Entregan E, Materiales M, PROMEDIOCANTIDADPORMATERIAL P
WHERE E.Clave=M.Clave AND P.Clave=M.Clave AND P.PromedioCantidadEntregada > 400
GROUP BY M.Clave, M.Descripcion, P.PromedioCantidadEntregada

SELECT P.RazonSocial, E.Clave, M.Descripcion, AVG(E.Cantidad) AS CantidadPromedio
FROM Entregan E, Proveedores P, Materiales M
WHERE E.RFC = P.RFC AND M.Clave=E.Clave
GROUP BY P.RazonSocial, E.Clave, M.Descripcion
HAVING AVG(E.Cantidad) > 500

SELECT P.RazonSocial, E.Clave, M.Descripcion, AVG(E.Cantidad) AS CantidadPromedio
FROM Entregan E, Proveedores P, Materiales M
WHERE E.RFC = P.RFC AND M.Clave=E.Clave
GROUP BY P.RazonSocial, E.Clave, M.Descripcion
HAVING AVG(E.Cantidad) < 370 OR AVG(E.Cantidad) > 450

SELECT *FROM Materiales

INSERT INTO Materiales VALUES (1500, 'Mármol', 500, 2*1500/1000)
INSERT INTO Materiales VALUES (1510, 'Madera Roble', 300, 2*1510/1000)
INSERT INTO Materiales VALUES (1520, 'Madera Abedul', 420, 2*1520/1000)
INSERT INTO Materiales VALUES (1530, 'Madera Pino', 230, 2*1530/1000)
INSERT INTO Materiales VALUES (1540, 'Madera Encino', 450, 2*1540/1000)

SELECT Clave, Descripcion
FROM Materiales
WHERE Clave NOT IN (
    SELECT DISTINCT Clave
    FROM Entregan
    )



SELECT RazonSocial
FROM Proveedores
WHERE RFC IN (
    SELECT DISTINCT E.RFC
    FROM Entregan E, Proyectos P
    WHERE E.Numero=P.Numero AND P.Denominacion LIKE 'Vamos Mexico'
    ) AND RFC IN(
    SELECT DISTINCT E.RFC
    FROM Entregan E, Proyectos P
    WHERE E.Numero=P.Numero AND P.Denominacion LIKE 'Queretaro limpio'
    )

SELECT Descripcion
FROM Materiales M
WHERE M.Clave NOT IN (
    SELECT distinct E.Clave
    FROM Entregan E, Proyectos P
    WHERE P.Numero=E.Numero AND P.Denominacion LIKE 'CIT Yucatan'
    )


SELECT P.RazonSocial, AVG(E.Cantidad) AS PromedioCantidad
FROM Entregan E, Proveedores P
WHERE E.RFC=P.RFC
GROUP BY P.RazonSocial
HAVING AVG(E.Cantidad)> (
    SELECT AVG(Cantidad) AS PromedioCantidadReferencia
    FROM Entregan
    WHERE RFC LIKE 'VAGO780901'
    )


CREATE VIEW CANTIDADESTOTALPROV2000 AS (
SELECT RFC, SUM(Cantidad) AS CantidadEntregadaTotal
FROM Entregan
WHERE Fecha BETWEEN '2000-01-01' AND '2000-31-12'
GROUP BY RFC)

CREATE VIEW CANTIDADESTOTALPROV2001 AS (
SELECT RFC, SUM(Cantidad) AS CantidadEntregadaTotal
FROM Entregan
WHERE Fecha BETWEEN '2001-01-01' AND '2001-31-12'
GROUP BY RFC)

SELECT DISTINCT E.RFC, Pro.RazonSocial
FROM Entregan E, Proyectos P, CANTIDADESTOTALPROV2000 C00, CANTIDADESTOTALPROV2001 C01, Proveedores Pro
WHERE E.Numero=P.Numero AND Pro.RFC=E.RFC AND C00.RFC=E.RFC AND C01.RFC=E.RFC AND C00.CantidadEntregadaTotal>C01.CantidadEntregadaTotal AND P.Denominacion LIKE 'Infonavit Durango'

