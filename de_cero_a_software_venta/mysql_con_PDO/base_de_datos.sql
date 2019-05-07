/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para cero_software_venta
CREATE DATABASE IF NOT EXISTS `cero_software_venta` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `cero_software_venta`;


-- Volcando estructura para tabla cero_software_venta.empleado
CREATE TABLE IF NOT EXISTS `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(100) COLLATE utf8_bin NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `profesion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empleado_profesion` (`profesion_id`),
  CONSTRAINT `empleado_profesion` FOREIGN KEY (`profesion_id`) REFERENCES `profesion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando estructura para tabla cero_software_venta.empleado_sueldo
CREATE TABLE IF NOT EXISTS `empleado_sueldo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado_id` int(11) NOT NULL,
  `sueldo` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empleado_sueldo` (`empleado_id`),
  CONSTRAINT `empleado_sueldo` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`)
  ON UPDATE RESTRICT
  ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando estructura para tabla cero_software_venta.profesion
CREATE TABLE IF NOT EXISTS `profesion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `sueldo` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40000 ALTER TABLE `profesion` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
