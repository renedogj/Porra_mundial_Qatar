DELIMITER //
CREATE TRIGGER actualizar_puntos
	AFTER UPDATE ON usuarios_flags
FOR EACH ROW
BEGIN
	DECLARE puntuacion int;
	DECLARE c_num_pistas_totales int;
	DECLARE c_dificultad int;
	DECLARE puntuacion_usuario int;

	DECLARE cursor_flags CURSOR FOR 
		SELECT num_pistas, dificultad
		FROM flags
		WHERE id = OLD.id_flag;

	if(NEW.resuelto = 1) THEN
		OPEN cursor_flags;
		SET @puntuacion := 0;
		cursor_loop: LOOP
			FETCH cursor_flags INTO c_num_pistas_totales, c_dificultad;

			SET @puntuacion := (3 * c_dificultad) + (c_num_pistas_totales - OLD.num_pistas) * (2 * c_dificultad);
			
			UPDATE usuarios_flags SET puntuacion = @puntuacion 
			where id_usuario = OLD.id_usuario and id_flag = OLD.id_flag;

			UPDATE usuarios SET puntuacion = puntuacion + @puntuacion 
			where id = OLD.id_usuario;
		END LOOP cursor_loop;
		CLOSE cursor_flags;
	END IF;
END
//

DELIMITER //
CREATE TRIGGER actualizar_puntos
	AFTER UPDATE ON usuarios_flags
FOR EACH ROW
BEGIN
	if(NEW.resuelto = 1) THEN
		UPDATE usuarios SET puntuacion = puntuacion + NEW.puntuacion 
			where id = OLD.id_usuario;
	END IF;
END
//