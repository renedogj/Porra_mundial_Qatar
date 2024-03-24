--Modificar mes de los partidos
UPDATE partidos SET fecha= ADDDATE(fecha,INTERVAL 1 MONTH);