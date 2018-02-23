BULK INSERT a1701357.a1701357.[Materiales]
   FROM 'e:\wwwroot\a1701357\materiales.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )