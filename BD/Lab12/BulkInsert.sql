BULK INSERT a1701357.a1701357.[Materiales]
  FROM 'e:\wwwroot\a1701357\materiales.csv' 
  WITH 
  ( 
    CODEPAGE = 'ACP', 
    FIELDTERMINATOR = ',', 
    ROWTERMINATOR = '\n' 
  ) 

BULK INSERT a1701357.a1701357.[Proyectos]
  FROM 'e:\wwwroot\a1701357\proyectos.csv' 
  WITH 
  ( 
    CODEPAGE = 'ACP', 
    FIELDTERMINATOR = ',', 
    ROWTERMINATOR = '\n' 
  ) 

BULK INSERT a1701357.a1701357.[Proveedores]
  FROM 'e:\wwwroot\a1701357\proveedores.csv' 
  WITH 
  ( 
    CODEPAGE = 'ACP', 
    FIELDTERMINATOR = ',', 
    ROWTERMINATOR = '\n' 
  ) 

SET DATEFORMAT dmy -- especificar formato de la fecha 

BULK INSERT a1701357.a1701357.[Entregan]
  FROM 'e:\wwwroot\a1701357\entregan.csv' 
  WITH 
  ( 
    CODEPAGE = 'ACP', 
    FIELDTERMINATOR = ',', 
    ROWTERMINATOR = '\n' 
  ) 