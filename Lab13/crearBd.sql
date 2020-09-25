
drop TABLE Entregan
drop TABLE Materiales
drop TABLE Proyectos
drop TABLE Proveedores

IF EXISTS(SELECT * FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_NAME = 'Materiales')

DROP TABLE Materiales

CREATE TABLE Materiales(
    Clave numeric(5) not null,
    Descripcion VARCHAR(50),
    Costo numeric(8,2)
)

IF EXISTS(SELECT * FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_NAME = 'Proveedores')

drop TABLE Proveedores

CREATE TABLE Proveedores(
    RFC char(13) not null,
    RazonSocial varchar(50)
)

IF EXISTS(SELECT * FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_NAME = 'Proyectos')

drop table Proyectos

CREATE TABLE Proyectos(
    Numero numeric(5) not null,
    Denominacion varchar(50)
)

IF EXISTS(SELECT * FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_NAME = 'Entregan')

drop table Entregan

CREATE TABLE Entregan(
    Clave numeric(5) not null,
    RFC char(13) not null,
    Numero numeric(5) not null,
    Fecha DATETIME not null,
    Cantidad numeric(8,2)
)

BULK INSERT a1704354.a1704354.[Materiales]
FROM 'e:\wwwroot\rcortese\materiales.csv'
WITH
(
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
    )

BULK INSERT a1704354.a1704354.[Proyectos]
FROM 'e:\wwwroot\rcortese\proyectos.csv'
WITH
(
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
)

BULK INSERT a1704354.a1704354.[Proveedores]
FROM 'e:\wwwroot\rcortese\proveedores.csv'
WITH
(
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
)

SET DATEFORMAT dmy
BULK INSERT a1704354.a1704354.[Entregan]
FROM 'e:\wwwroot\rcortese\entregan.csv'
WITH
(
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
)


INSERT INTO Materiales values (1000, 'xxx', 1000)

delete from Materiales where Clave = 1000 and Costo = 1000

ALTER TABLE Materiales add constraint llaveMateriales PRIMARY KEY (Clave)

INSERT INTO Materiales values (1000, 'xxx', 1000)

sp_helpconstraint materiales

ALTER TABLE Proveedores add constraint llaveProveedores PRIMARY KEY (RFC)

ALTER TABLE Proyectos add constraint llaveProyectos PRIMARY KEY (Numero)

ALTER TABLE Entregan add constraint llaveEntregan PRIMARY KEY (Clave,RFC,Numero,Fecha)

sp_helpconstraint entregan

SELECT * from Materiales
SELECT * from Entregan
SELECT * from Proyectos
SELECT * from Proveedores

INSERT INTO Entregan values (0,'xxx',0,'1-jan-02',0)

DELETE from Entregan where Clave = 0

ALTER TABLE Entregan add constraint cfentreganclave foreign key (Clave)
references  Materiales (Clave)

INSERT INTO Entregan values (0,'xxx',0,'1-jan-02',0)

ALTER TABLE Entregan add constraint cfentreganRFC foreign key (RFC)
references  Proveedores(RFC)

ALTER TABLE Entregan add constraint cfentreganNumero foreign key (Numero)
references  Proyectos (Numero)

sp_helpconstraint Materiales
sp_helpconstraint Proyectos
sp_helpconstraint Proveedores
sp_helpconstraint Entregan

INSERT INTO Entregan values (1000, 'AAAA800101', 5000, GETDATE(),0)

delete from Entregan where Cantidad=0

ALTER TABLE Entregan add constraint Cantidad check (Cantidad>0)

INSERT INTO Entregan values (1000, 'AAAA800101', 5000, GETDATE(),0)