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