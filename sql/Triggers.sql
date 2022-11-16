DELIMITER //
CREATE TRIGGER actualizar_apuestas 
	AFTER UPDATE ON partidos
FOR EACH ROW
BEGIN
	DECLARE finished int DEFAULT FALSE;
	DECLARE c_id_apuesta int;
	DECLARE c_id_persona int;
	DECLARE c_apuesta_1 int;
	DECLARE c_apuesta_2 int;
	DECLARE c_puntuacion int;
	DECLARE c_ganador int;
	DECLARE ganador_es int;
	DECLARE ganador_apuesta int;
	DECLARE cursor_apuestas CURSOR FOR 
		SELECT id,id_persona,apuesta_1,apuesta_2,puntuacion
		FROM apuestas
		WHERE id_partido = OLD.id;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;

	IF (NEW.resultado_1 = NEW.resultado_2) THEN 
		SET @ganador_es := 0;
	ELSEIF (NEW.resultado_1 > NEW.resultado_2) THEN
		SET @ganador_es := 1;
	ELSE
		SET @ganador_es := 2;
	END IF;

	OPEN cursor_apuestas;
	SET @finished := 0;
	cursor_loop: LOOP
		FETCH cursor_apuestas INTO c_id_apuesta, c_id_persona, c_apuesta_1, c_apuesta_2, c_puntuacion;
		IF (finished = 1) THEN
			LEAVE cursor_loop;
		END IF;

		SET @c_puntuacion := 0;

		IF (c_apuesta_1 = c_apuesta_2) THEN 
			SET @ganador_apuesta := 0;
		ELSEIF (c_apuesta_1 > c_apuesta_2) THEN
			SET @ganador_apuesta := 1;
		ELSE
			SET @ganador_apuesta := 2;
		END IF;

		IF (c_apuesta_2 = NEW.resultado_2) THEN
			SET @c_puntuacion := @c_puntuacion + 1;
		END IF;
		IF (c_apuesta_1 = NEW.resultado_1) THEN
			SET @c_puntuacion := @c_puntuacion + 1;
		END IF;

		IF (@ganador_es = @ganador_apuesta) THEN
			SET @c_puntuacion := @c_puntuacion + 1;
		END IF;
		
		UPDATE apuestas SET puntuacion = @c_puntuacion 
		where id_partido = OLD.id and id = c_id_apuesta;
		UPDATE personas SET puntucaion = puntuacion + @c_puntuacion 
		where id = c_id_persona;
	END LOOP cursor_loop;
	CLOSE cursor_apuestas;
END
//