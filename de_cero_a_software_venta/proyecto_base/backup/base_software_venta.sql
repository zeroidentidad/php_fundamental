--
-- Definition for database base_software_venta
--
DROP DATABASE IF EXISTS base_software_venta;
CREATE DATABASE base_software_venta
	CHARACTER SET utf8
	COLLATE utf8_bin;

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set SQL mode
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Set default database
--
USE base_software_venta;

--
-- Definition for table cliente
--
CREATE TABLE cliente (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(200) BINARY NOT NULL,
  direccion VARCHAR(200) BINARY NOT NULL,
  created_at DATETIME DEFAULT NULL,
  updated_at DATETIME DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 3276
CHARACTER SET utf8
COLLATE utf8_bin
ROW_FORMAT = DYNAMIC;

--
-- Definition for table producto
--
CREATE TABLE producto (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(200) BINARY CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  marca VARCHAR(200) BINARY CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  costo DECIMAL(10, 2) NOT NULL,
  precio DECIMAL(10, 2) NOT NULL,
  foto VARCHAR(200) BINARY CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  created_at DATETIME DEFAULT NULL,
  updated_at DATETIME DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 11
AVG_ROW_LENGTH = 1638
COLLATE utf8_bin
ROW_FORMAT = DYNAMIC;

--
-- Definition for table rol
--
CREATE TABLE rol (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) BINARY CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  created_at DATETIME DEFAULT NULL,
  updated_at DATETIME DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 5461
COLLATE utf8_bin
ROW_FORMAT = DYNAMIC;

--
-- Definition for table comprobante
--
CREATE TABLE comprobante (
  id INT(11) NOT NULL AUTO_INCREMENT,
  cliente_id INT(11) NOT NULL,
  sub_total DECIMAL(10, 2) NOT NULL,
  iva DECIMAL(10, 2) NOT NULL,
  total DECIMAL(10, 2) NOT NULL,
  fecha DATETIME NOT NULL,
  anulado TINYINT(4) NOT NULL DEFAULT 0,
  created_at DATETIME DEFAULT NULL,
  updated_at DATETIME DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT comprobante_cliente FOREIGN KEY (cliente_id)
    REFERENCES cliente(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_bin
ROW_FORMAT = DYNAMIC;

--
-- Definition for table usuario
--
CREATE TABLE usuario (
  id INT(11) NOT NULL AUTO_INCREMENT,
  rol_id INT(11) NOT NULL,
  nombre VARCHAR(50) BINARY CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  apellido VARCHAR(50) BINARY CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  correo VARCHAR(100) BINARY CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  password VARCHAR(100) BINARY CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  created_at DATETIME DEFAULT NULL,
  updated_at DATETIME DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_usuario_rol FOREIGN KEY (rol_id)
    REFERENCES rol(id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 10
AVG_ROW_LENGTH = 2340
COLLATE utf8_bin
ROW_FORMAT = DYNAMIC;

--
-- Definition for table comprobante_detalle
--
CREATE TABLE comprobante_detalle (
  orden INT(11) NOT NULL,
  comprobante_id INT(11) NOT NULL,
  producto_id INT(11) NOT NULL,
  cantidad DECIMAL(10, 2) NOT NULL,
  costo DECIMAL(10, 2) NOT NULL,
  precio DECIMAL(10, 2) NOT NULL,
  total DECIMAL(10, 2) NOT NULL,
  created_at DATETIME DEFAULT NULL,
  updated_at DATETIME DEFAULT NULL,
  CONSTRAINT FK_comprobante FOREIGN KEY (comprobante_id)
    REFERENCES comprobante(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT FK_producto FOREIGN KEY (producto_id)
    REFERENCES producto(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AVG_ROW_LENGTH = 744
CHARACTER SET utf8
COLLATE utf8_bin
ROW_FORMAT = DYNAMIC;

-- 
-- Dumping data for table cliente
--
INSERT INTO cliente VALUES
(1, 'Juan Alberto Perez', 'Av. Los inform�ticos 104', '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(2, 'Diego Lozano Vicente', 'Av. Los praderas 1057', '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(3, 'Andr�s Reyes', 'Av. Los frutales 957', '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(4, 'Eventos y Conciertos SAC', 'Av. Los m�sicos 1058', '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(5, 'Orquesta La gran Juerga SAC', 'Av. Los bulleros 7580', '2019-05-09 00:00:00', '2019-05-09 00:00:00');

-- 
-- Dumping data for table producto
--
INSERT INTO producto VALUES
(1, 'Guitarra el�ctrica Squier Vibe 60', 'Fender', 500.00, 900.00, NULL, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(2, 'Guitarra el�ctrica Squier Vibe 70', 'Fender', 650.00, 1100.00, NULL, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(3, 'Guitarra el�ctrica Pro', 'Suhr', 2000.00, 3500.00, NULL, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(4, 'Guitarra el�ctrica Antique', 'Suhr', 2500.00, 4000.00, NULL, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(5, 'Cuerdas de guitarra el�ctrica #9', 'Addario', 3.00, 8.00, NULL, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(6, 'Cuerdas de guitarra el�ctrica #10', 'Addario', 3.50, 9.00, NULL, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(7, 'Cuerdas de guitarra el�ctrica #9', 'Ernie Ball', 2.50, 7.00, NULL, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(8, 'Cuerdas de guitarra el�ctrica #20', 'Ernie Ball', 3.00, 8.00, NULL, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(9, 'Amplificador Mesa Boogie Rectifier', 'Mesa Boogie', 4000.00, 9000.00, NULL, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(10, 'Amplificador Mesa Boogie Dual Rectifier', 'Mesa Boogie', 3500.00, 8500.00, NULL, '2019-05-09 00:00:00', '2019-05-09 00:00:00');

-- 
-- Dumping data for table rol
--
INSERT INTO rol VALUES
(1, 'Administrador', '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(2, 'Vendedor', '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(3, 'Analista', '2019-05-09 00:00:00', '2019-05-09 00:00:00');

-- 
-- Dumping data for table comprobante
--
INSERT INTO comprobante VALUES
(1, 3, 33142.37, 5965.63, 39108.00, '2016-01-01 12:44:21', 0, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(2, 2, 15700.00, 2826.00, 18526.00, '2016-02-01 12:44:43', 0, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(3, 5, 101899.15, 18341.85, 120241.00, '2016-05-01 12:45:45', 0, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(4, 5, 25169.49, 4530.51, 29700.00, '2016-11-01 12:45:57', 0, '2019-05-09 00:00:00', '2019-05-09 00:00:00');

-- 
-- Dumping data for table usuario
--
INSERT INTO usuario VALUES
(1, 1, 'Jesus', 'Ferrer', 'jafs-2050@hotmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2019-05-09 00:00:00', '2019-05-09 14:36:21'),
(4, 1, 'Fernando', 'Gonzales Ramirez', 'framirez@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2019-05-09 00:00:00', '2019-05-09 14:36:18'),
(5, 2, 'Cristina', 'Garc�a Lozano', 'cgarcial@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2019-05-09 00:00:00', '2019-05-09 14:36:16'),
(6, 2, 'Jorge', 'Guzman Toledo', 'jguzman@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2019-05-09 10:05:19', '2019-05-09 14:36:27'),
(7, 1, 'Luciana', 'Villanueva Perez', 'demo@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2019-05-09 12:41:32', '2019-05-09 14:19:07'),
(8, 1, 'Susana', 'Vicente de la Vega', 'svicente@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2019-05-09 14:15:13', '2019-05-09 14:36:25'),
(9, 3, 'Kevin', 'Patherson', 'kpatherson@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2019-05-09 14:19:29', '2016-11-15 21:49:59');

-- 
-- Dumping data for table comprobante_detalle
--
INSERT INTO comprobante_detalle VALUES
(0, 1, 1, 2.00, 500.00, 900.00, 1800.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(1, 1, 2, 3.00, 650.00, 1100.00, 3300.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(2, 1, 3, 4.00, 2000.00, 3500.00, 14000.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(3, 1, 4, 5.00, 2500.00, 4000.00, 20000.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(4, 1, 5, 1.00, 3.00, 8.00, 8.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(0, 2, 3, 3.00, 2000.00, 3500.00, 10500.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(1, 2, 4, 2.00, 2500.00, 4000.00, 8000.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(2, 2, 5, 1.00, 3.00, 8.00, 8.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(3, 2, 6, 2.00, 3.50, 9.00, 18.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(0, 3, 1, 3.00, 500.00, 900.00, 2700.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(1, 3, 2, 4.00, 650.00, 1100.00, 4400.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(2, 3, 3, 3.00, 2000.00, 3500.00, 10500.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(3, 3, 4, 6.00, 2500.00, 4000.00, 24000.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(4, 3, 5, 5.00, 3.00, 8.00, 40.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(5, 3, 6, 2.00, 3.50, 9.00, 18.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(6, 3, 7, 5.00, 2.50, 7.00, 35.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(7, 3, 8, 6.00, 3.00, 8.00, 48.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(8, 3, 9, 4.00, 4000.00, 9000.00, 36000.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(9, 3, 10, 5.00, 3500.00, 8500.00, 42500.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(0, 4, 1, 6.00, 500.00, 900.00, 5400.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(1, 4, 2, 3.00, 650.00, 1100.00, 3300.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(2, 4, 3, 6.00, 2000.00, 3500.00, 21000.00, '2019-05-09 00:00:00', '2019-05-09 00:00:00');

-- 
-- Restore previous SQL mode
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;