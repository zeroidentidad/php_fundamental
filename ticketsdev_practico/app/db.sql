DROP DATABASE IF EXISTS ticketsdev;

CREATE DATABASE IF NOT EXISTS ticketsdev;

USE ticketsdev;

CREATE TABLE actividades(
    id_actividad CHAR(2) PRIMARY KEY,
    bloque ENUM('Bloque 1', 'Bloque 2', 'Bloque 3') NOT NULL,
    disciplina ENUM('ANALISIS', 'BACKEND', 'FRONTEND', 'DEMO') NOT NULL,
    horario VARCHAR(30) NOT NULL,
    cupo INTEGER NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO actividades values ('1A','Bloque 1','ANALISIS','9:00 a 12:00',10),
('1B','Bloque 1','BACKEND','9:00 a 12:00',10),
('1F','Bloque 1','FRONTEND','9:00 a 12:00',10),
('1D','Bloque 1','DEMO','9:00 a 12:00',10),
('2A','Bloque 2','ANALISIS','14:00 a 17:00',10),
('2B','Bloque 2','BACKEND','14:00 a 17:00',10),
('2F','Bloque 2','FRONTEND','14:00 a 17:00',10),
('2D','Bloque 2','DEMO','14:00 a 17:00',10),
('3A','Bloque 3','ANALISIS','18:00 a 21:00',10),
('3B','Bloque 3','BACKEND','18:00 a 21:00',10),
('3F','Bloque 3','FRONTEND','18:00 a 21:00',10),
('3D','Bloque 3','DEMO','18:00 a 21:00',10);

CREATE TABLE participantes(
    email VARCHAR(50) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE registro(
    id_registro INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) UNIQUE NOT NULL,
    id_actividad CHAR(2) NOT NULL,
    fecha DATE NOT NULL,
    FOREIGN KEY (email) REFERENCES participantes (email) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_actividad) REFERENCES actividades (id_actividad) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP PROCEDURE IF EXISTS registrar_participante;

DELIMITER $$

CREATE PROCEDURE registrar_participante(
    IN _email VARCHAR(50),
    IN _nombre VARCHAR(50),
    IN _apellido VARCHAR(50),
    IN _actividad CHAR(2)
)
BEGIN

DECLARE limite INT DEFAULT 0;
DECLARE registrados INT DEFAULT 0;
DECLARE actividad_llena VARCHAR(255) DEFAULT 'El bloque y actividad elegidos ya no tienen lugares libres.';
DECLARE existe_registro INT DEFAULT 0;
DECLARE respuesta VARCHAR(255) DEFAULT 'ok';

START TRANSACTION;

    SELECT COUNT(*) INTO existe_registro FROM registro
    WHERE email = _email;

    IF existe_registro > 0 THEN
        SELECT 'Este email ya fue registrado previamente.' AS respuesta;
    ELSE

        SELECT cupo INTO limite FROM actividades
        WHERE id_actividad = _actividad;

        SELECT COUNT(*) INTO registrados FROM registro
        WHERE id_actividad = _actividad;

        IF registrados < limite THEN
            INSERT INTO participantes (email, nombre, apellido) values(_email, _nombre, _apellido);

            INSERT INTO registro (email, id_actividad, fecha) values(_email, _actividad, NOW());

            SELECT respuesta;
        ELSE
            SELECT 'El bloque y actividad elegidos ya no tienen lugares libres.' AS respuesta;
        END IF;

    END IF;    

COMMIT;

END
$$

DELIMITER ;

-- tests:

call registrar_participante('test@mail.com', 'Jesus', 'Ferrer', '1B');
call registrar_participante('test2@mail.com', 'Jesus2', 'Ferrer', '1B');

----------------------------------------------------------------------

DROP PROCEDURE IF EXISTS eliminar_participante;

DELIMITER $$

CREATE PROCEDURE eliminar_participante(
    IN _email VARCHAR(50)
)
BEGIN

DECLARE respuesta VARCHAR(255) DEFAULT 'ok';


START TRANSACTION;
    DELETE FROM participantes
    WHERE email = _email;

    DELETE FROM registro
    WHERE email = _email;

    SELECT respuesta;   

COMMIT;

END
$$

DELIMITER ;

--tests:

call eliminar_participante('test2@mail.com');