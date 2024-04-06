DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `actualizar_paises`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_paises` (IN `id_pais_1` INT, IN `id_pais_2` INT, IN `ganador` INT, IN `resultado_1` INT, IN `resultado_2` INT)  BEGIN
	IF (ganador = 0) THEN 
		UPDATE paises SET
			partidos_jugados = partidos_jugados + 1,
			empates = empates+1,
			goles_a_favor = goles_a_favor + resultado_1,
			goles_en_contra = goles_en_contra + resultado_2
		WHERE id = id_pais_1;

		UPDATE paises SET
			partidos_jugados = partidos_jugados + 1,
			empates = empates+1,
			goles_a_favor = goles_a_favor + resultado_2,
			goles_en_contra = goles_en_contra + resultado_1
		WHERE id = id_pais_2;
	ELSEIF (ganador = 1) THEN
		UPDATE paises SET
			partidos_jugados = partidos_jugados + 1,
			ganados = ganados+1,
			goles_a_favor = goles_a_favor + resultado_1,
			goles_en_contra = goles_en_contra + resultado_2
		WHERE id = id_pais_1;

		UPDATE paises SET
			partidos_jugados = partidos_jugados + 1,
			perdidos = perdidos+1,
			goles_a_favor = goles_a_favor + resultado_2,
			goles_en_contra = goles_en_contra + resultado_1
		WHERE id = id_pais_2;
	ELSEIF (ganador = 2) THEN
		UPDATE paises SET
			partidos_jugados = partidos_jugados + 1,
			perdidos = perdidos+1,
			goles_a_favor = goles_a_favor + resultado_1,
			goles_en_contra = goles_en_contra + resultado_2
		WHERE id = id_pais_1;

		UPDATE paises SET
			partidos_jugados = partidos_jugados + 1,
			ganados = ganados+1,
			goles_a_favor = goles_a_favor + resultado_2,
			goles_en_contra = goles_en_contra + resultado_1
		WHERE id = id_pais_2;
	END IF;
END$$

DELIMITER ;