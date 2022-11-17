DELIMITER //
CREATE PROCEDURE actualizar_paises(id_pais_1 int, id_pais_2 int, ganador int, resultado_1 int,resultado_2 int)
BEGIN
	IF (ganador = 0) THEN 
		UPDATE paises SET
			empates = empates+1,
			goles_a_favor = goles_a_favor + resultado_1,
			goles_en_contra = goles_en_contra + resultado_2
		WHERE id = id_pais_1;

		UPDATE paises SET
			empates = empates+1,
			goles_a_favor = goles_a_favor + resultado_2,
			goles_en_contra = goles_en_contra + resultado_1
		WHERE id = id_pais_2;
	ELSEIF (ganador = 1) THEN
		UPDATE paises SET
			ganados = ganados+1,
			goles_a_favor = goles_a_favor + resultado_1,
			goles_en_contra = goles_en_contra + resultado_2
		WHERE id = id_pais_1;

		UPDATE paises SET
			perdidos = perdidos+1,
			goles_a_favor = goles_a_favor + resultado_2,
			goles_en_contra = goles_en_contra + resultado_1
		WHERE id = id_pais_2;
	ELSEIF (ganador = 2) THEN
		UPDATE paises SET
			perdidos = perdidos+1,
			goles_a_favor = goles_a_favor + resultado_1,
			goles_en_contra = goles_en_contra + resultado_2
		WHERE id = id_pais_1;

		UPDATE paises SET
			ganados = ganados+1,
			goles_a_favor = goles_a_favor + resultado_2,
			goles_en_contra = goles_en_contra + resultado_1
		WHERE id = id_pais_2;
	END IF;
END;
//