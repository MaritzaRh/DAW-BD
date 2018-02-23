SET DATEFORMAT dmy

BULK INSERT a1701357.a1701357.[Entregan]
   FROM 'e:\wwwroot\a1701357\entregan.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )