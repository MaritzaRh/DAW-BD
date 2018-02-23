BULK INSERT a1701357.a1701357.[Proveedores]
   FROM 'e:\wwwroot\a1701357\proveedores.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )