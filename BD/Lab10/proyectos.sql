BULK INSERT a1701357.a1701357.[Projectos]
   FROM 'e:\wwwroot\a1701357\projectos.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )