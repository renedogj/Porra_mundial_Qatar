DELIMITER //
CREATE TRIGGER crear_user_flags
	AFTER INSERT ON usuarios
FOR EACH ROW
BEGIN
	DECLARE finished int DEFAULT FALSE;
	DECLARE c_id_flag int;

	DECLARE cursor_flags CURSOR FOR 
		SELECT id
		FROM flags;	
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;

	OPEN cursor_flags;
	cursor_loop: LOOP
		FETCH cursor_flags INTO c_id_flag;

		IF (finished = 1) THEN
			LEAVE cursor_loop;
		END IF;

		INSERT INTO usuarios_flags (`id_usuario`, `id_flag`, `num_pistas`, `puntuacion`, `resuelto`)
		VALUES (NEW.id, c_id_flag, 0, 0, 0);
	END LOOP cursor_loop;
	CLOSE cursor_flags;
END
//