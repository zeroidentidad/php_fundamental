
-- Dumping database structure for dbpedidos
CREATE DATABASE IF NOT EXISTS `dbpedidos` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `dbpedidos`;

-- Dumping structure for table dbpedidos.empleado
CREATE TABLE IF NOT EXISTS `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EsAdmin` tinyint(4) NOT NULL DEFAULT '0',
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table dbpedidos.empleado: ~12 rows (approximately)
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` (`id`, `EsAdmin`, `Nombre`, `Correo`, `Password`, `Imagen`) VALUES
	(1, 1, 'Jesus Ferrer', 'zero@mail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
	(2, 0, 'Alberto', 'alberto@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', ''),
	(3, 0, 'Francisco', 'francisco@pictoric.com', 'e10adc3949ba59abbe56e057f20f883e', ''),
	(4, 0, 'Alberto Gomez', 'agomez@pictoric.com', 'e10adc3949ba59abbe56e057f20f883e', ''),
	(5, 0, 'Juan Perez', 'jperez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
	(6, 0, 'Jose Gonzales', 'jgonzales@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
	(7, 0, 'Julio Díaz', 'jdiaz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
	(8, 0, 'Francesa Pineda', 'fpineda@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
	(9, 0, 'Lorena Cassion', 'lcassion@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
	(10, 0, 'Mijael Raven', 'mraven@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
	(11, 0, 'Pablo Escobar', 'pescobar@outlook.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
	(12, 0, 'Manuel García', 'mgarcia@yahoo.es', 'a5d6bcf06a028e4725675f99c6af29a9', '');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;

-- Dumping structure for table dbpedidos.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Estado_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 Pendiente 1 Finalizado 2 Rechazado',
  `Cliente` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Empleado_id` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pedido_empleado` (`Empleado_id`),
  CONSTRAINT `pedido_empleado` FOREIGN KEY (`Empleado_id`) REFERENCES `empleado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table dbpedidos.pedido: ~3 rows (approximately)
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`id`, `Estado_id`, `Cliente`, `Empleado_id`, `Total`, `Fecha`) VALUES
	(1, 0, 'Jose Perez', 1, 35.00, '2016-03-05'),
	(2, 0, 'Albero Moreyra', 1, 5.00, '2015-12-20'),
	(3, 0, 'Juan Lopez', 2, 10.00, '2016-02-04');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;

-- Dumping structure for table dbpedidos.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Imagen` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table dbpedidos.producto: ~8 rows (approximately)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`id`, `Nombre`, `Precio`, `Imagen`) VALUES
	(1, 'Popcorn Grande + 2 Soda mediana', 15.00, NULL),
	(2, 'Vaso grande de limonada frozen', 7.00, NULL),
	(3, 'Popcorn Mediano', 8.00, NULL),
	(4, 'Popcorn Chico', 5.00, NULL),
	(5, 'Popcorn Grande', 11.00, NULL),
	(6, 'Soda Mediana', 3.50, NULL),
	(7, 'Soda Chica', 2.00, NULL),
	(8, 'Soda Grande', 5.00, NULL);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Dumping structure for table dbpedidos.pedido_detalle
CREATE TABLE IF NOT EXISTS `pedido_detalle` (
  `Pedido_id` int(11) NOT NULL,
  `Producto_id` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioUnitario` decimal(10,2) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  KEY `pedido_detalle_pedido` (`Pedido_id`),
  KEY `pedido_detalle_producto` (`Producto_id`),
  CONSTRAINT `pedido_detalle_pedido` FOREIGN KEY (`Pedido_id`) REFERENCES `pedido` (`id`),
  CONSTRAINT `pedido_detalle_producto` FOREIGN KEY (`Producto_id`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table dbpedidos.pedido_detalle: ~5 rows (approximately)
/*!40000 ALTER TABLE `pedido_detalle` DISABLE KEYS */;
INSERT INTO `pedido_detalle` (`Pedido_id`, `Producto_id`, `Cantidad`, `PrecioUnitario`, `Total`) VALUES
	(1, 1, 1, 15.00, 15.00),
	(1, 3, 2, 8.00, 16.00),
	(1, 7, 2, 2.00, 4.00),
	(2, 8, 1, 5.00, 5.00),
	(3, 8, 2, 5.00, 10.00);
/*!40000 ALTER TABLE `pedido_detalle` ENABLE KEYS */;

-- Dumping structure for table dbpedidos.tabla_de_tablas
CREATE TABLE IF NOT EXISTS `tabla_de_tablas` (
  `Relacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id` int(11) NOT NULL,
  `Valor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table dbpedidos.tabla_de_tablas: ~3 rows (approximately)
/*!40000 ALTER TABLE `tabla_de_tablas` DISABLE KEYS */;
INSERT INTO `tabla_de_tablas` (`Relacion`, `id`, `Valor`, `Orden`) VALUES
	('pedido_estado', 0, 'Pendiente', 1),
	('pedido_estado', 1, 'Finalizado', 2),
	('pedido_estado', 2, 'Anulado', 3);
/*!40000 ALTER TABLE `tabla_de_tablas` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;