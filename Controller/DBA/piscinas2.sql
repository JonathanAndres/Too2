/*
 Navicat Premium Data Transfer

 Source Server         : Xampp
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : piscinas

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 08/02/2022 01:29:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cabecera_factura
-- ----------------------------
DROP TABLE IF EXISTS `cabecera_factura`;
CREATE TABLE `cabecera_factura`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Cliente` int(11) NULL DEFAULT NULL,
  `Fecha` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `NumFactura` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `TotalVenta` decimal(11, 2) NULL DEFAULT NULL,
  `iva` decimal(11, 2) NULL DEFAULT NULL,
  `Estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Subtotal` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_Factura_Cabecera`(`id_Cliente`) USING BTREE,
  INDEX `NumFactura`(`NumFactura`) USING BTREE,
  CONSTRAINT `fk_Factura_Cabecera` FOREIGN KEY (`id_Cliente`) REFERENCES `cliente` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cabecera_factura
-- ----------------------------
INSERT INTO `cabecera_factura` VALUES (1, 1, '2022-02-05 20:33:10', '0001', 20.00, 12.00, 'A', 2.40);
INSERT INTO `cabecera_factura` VALUES (4, 1, '2022-02-06 23:07:01', '2', 40.00, 4.80, NULL, 45.00);
INSERT INTO `cabecera_factura` VALUES (7, 2, '2022-02-07 21:43:29', '624', 69.00, 12.00, NULL, 61.00);
INSERT INTO `cabecera_factura` VALUES (9, 1, '2022-02-07 21:44:33', '493', 41.00, 12.00, NULL, 37.00);
INSERT INTO `cabecera_factura` VALUES (11, 1, '2022-02-07 21:46:27', '629', 84.00, 12.00, NULL, 75.00);

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Apellido` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Cedula` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Telefono` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Direccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES (1, 'Andres', 'Alcoser', '17578231', '3216486', 'dsad@asd.com', 'Quito');
INSERT INTO `cliente` VALUES (2, 'Juan', 'asd', '1754820320', 'registro@baulph', 'registro@baulphp.com', 'ASDASD');
INSERT INTO `cliente` VALUES (3, 'PABLO ', 'ABAD ', '1303753618', '332465', 'abad@gmail.com', 'Quito');

-- ----------------------------
-- Table structure for detalle_factura
-- ----------------------------
DROP TABLE IF EXISTS `detalle_factura`;
CREATE TABLE `detalle_factura`  (
  `facturaid` int(11) NOT NULL AUTO_INCREMENT,
  `productoid` int(11) NULL DEFAULT NULL,
  `precio` decimal(10, 2) NULL DEFAULT NULL,
  `cantidad` int(11) NULL DEFAULT NULL,
  `total` decimal(10, 2) NULL DEFAULT NULL,
  `numFac` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`facturaid`) USING BTREE,
  INDEX `fk_Producto`(`productoid`) USING BTREE,
  INDEX `fk_Num_Fac`(`numFac`) USING BTREE,
  CONSTRAINT `fk_Num_Fac` FOREIGN KEY (`numFac`) REFERENCES `cabecera_factura` (`NumFactura`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_Producto` FOREIGN KEY (`productoid`) REFERENCES `producto` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detalle_factura
-- ----------------------------
INSERT INTO `detalle_factura` VALUES (1, 2, 10.00, 2, 20.00, '0001');
INSERT INTO `detalle_factura` VALUES (2, 1, 25.00, 2, 50.00, '0001');
INSERT INTO `detalle_factura` VALUES (3, 2, 10.02, 3, 50.02, '2');
INSERT INTO `detalle_factura` VALUES (4, 2, 12.20, 2, 25.00, '629');
INSERT INTO `detalle_factura` VALUES (5, 1, 10.00, 5, 50.00, '629');

-- ----------------------------
-- Table structure for detalle_factura_temp
-- ----------------------------
DROP TABLE IF EXISTS `detalle_factura_temp`;
CREATE TABLE `detalle_factura_temp`  (
  `facturaid` int(11) NOT NULL,
  `productoid` int(11) NULL DEFAULT NULL,
  `precio` decimal(10, 2) NULL DEFAULT NULL,
  `cantidad` int(11) NULL DEFAULT NULL,
  `total` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`facturaid`) USING BTREE,
  INDEX `fk_Producto`(`productoid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detalle_factura_temp
-- ----------------------------

-- ----------------------------
-- Table structure for kardex
-- ----------------------------
DROP TABLE IF EXISTS `kardex`;
CREATE TABLE `kardex`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fecha` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `cantidad` int(11) NULL DEFAULT NULL,
  `producto_id` int(11) NULL DEFAULT NULL,
  `total` decimal(11, 2) NULL DEFAULT NULL,
  `estado` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `fk_producto_Kardex`(`producto_id`) USING BTREE,
  CONSTRAINT `fk_producto_Kardex` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kardex
-- ----------------------------

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CodBarras` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `NombreProducto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `precio` double(11, 2) NULL DEFAULT NULL,
  `tipo` int(11) NULL DEFAULT NULL,
  `Estado` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cantidad` int(11) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES (1, '1010101', 'Programa una vez y mditiples luces alrededor de su hogar se sincronizara para encender y apagar en el momento deseado.', 'SunSmart', 10.00, 0, 'A', 10, 'https://www.acuamain.com.ec/wp-content/uploads/2016/09/118-sistema-inalambrico-de-baterias-sunsmart-300x391.png');
INSERT INTO `producto` VALUES (2, '1010110', 'Alto Voltaje – 20 Amp.\r\nIncluye Laca Metálica.\r\nUnipolar', 'Temporizador de Primavera Cuenta Regresiva de pare', 12.20, 0, 'A', 20, 'https://www.acuamain.com.ec/wp-content/uploads/2016/09/119-temporizador-de-primavera-cuenta-regresiva-de-pared-15-min-300x496.png');
INSERT INTO `producto` VALUES (3, '1100110', '\r\n    24 Horas Programable.\r\n    Motor 240 VAC-208—277VAC; 120-127 VAC capacidad de los contactos hasta SHP.\r\n    Para uso en interiores y exteriores.\r\n    Fácil de instalar.\r\n    Viene con un set de encendido y apagado.\r\n\r\n    24 Horas Programable.\r\n    ', 'Temporizador Mecánico de Trabajo Pesado con Interr', 5.00, 0, 'A', 50, 'https://www.acuamain.com.ec/wp-content/uploads/2016/09/120-temporizador-mecanico-de-trabajo-pesado-con-interruptor-300x271.png');
INSERT INTO `producto` VALUES (4, '1111111', 'Los rodillos de la cubierta son como con un volante de plástico reforzado. Los rodillos solares inmóviles deben fijarse en el suelo con tornillos.', 'Rodillos Manta Solar', 3.00, 0, 'A', 10, 'https://www.acuamain.com.ec/wp-content/uploads/2016/09/122-rodillos-manta-solar-300x340.png');
INSERT INTO `producto` VALUES (5, '1010111', 'Presentación de color azul con aditivo ANTI-UV y ANTI-HONGO para prolongar la duración del producto. Cobertor término de burbujas para piscina, hecho de polietileno de baja densidad (DOW 641 Virgen).', 'Cobertor Térmico de Burbujas Para Piscinas', 100.00, 0, 'A', 20, 'https://www.acuamain.com.ec/wp-content/uploads/2020/07/cobertor-piscina-guayaqui-samborondonl-ecuador-damiplast-1-300x225.png');
INSERT INTO `producto` VALUES (6, '12356498', 'Unión por acoplamiento de ajuste entre módulos, 45 unidades por metro lineal. En PP con estabilizantes para la protección contra los rayos UV.', 'Rejillas para Rebosadero', 52.00, 0, 'A', 30, 'https://www.acuamain.com.ec/wp-content/uploads/2016/09/127-rejillas-para-rebosadero-300x259.png');
INSERT INTO `producto` VALUES (7, '78924212', NULL, '\r\nCernidera Acuacoral 1828\r\n', 45.00, 0, 'A', 50, 'https://www.acuamain.com.ec/wp-content/uploads/2016/09/131-cernidera-acuacoral-1828-300x256.png');
INSERT INTO `producto` VALUES (8, '78942347', 'Cobertor de Piscina', 'Cobertor', 78.00, 0, 'A', 50, 'https://www.acuamain.com.ec/wp-content/uploads/2016/09/133-covertor-300x191.png');
INSERT INTO `producto` VALUES (9, '13256487', 'Material Filtrante', 'Material Filtrante', 54.00, 0, 'a', 50, 'https://www.acuamain.com.ec/wp-content/uploads/2016/09/133-material-filtrante-300x267.png');
INSERT INTO `producto` VALUES (10, '23547952', '\r\nTermómetro Flotador Tipo Pez Dorado\r\n', '\r\nTermómetro Flotador Tipo Pez Dorado\r\n', 40.00, 0, 'a', 40, 'https://www.acuamain.com.ec/wp-content/uploads/2016/09/133-termomtro-flotador-tipo-pez-dorado-300x544.png');
INSERT INTO `producto` VALUES (11, '78974653', 'Aspiradora Azul 1837', 'Aspiradora Azul 1837', 60.00, 0, 'A', 70, 'https://www.acuamain.com.ec/wp-content/uploads/2016/09/130-aspiradora-azul-1837-300x246.png');
INSERT INTO `producto` VALUES (12, '3265987', 'Manguera Acuacoral', 'Manguera Acuacoral', 78.00, 0, 'A', 80, 'https://www.acuamain.com.ec/wp-content/uploads/2016/09/130-manguera-acuacoral-300x246.png');
INSERT INTO `producto` VALUES (13, '3289754798', 'Cepillo de Algas 1827', 'Cepillo de Algas 1827', 78.00, 0, 'A', 70, 'https://www.acuamain.com.ec/wp-content/uploads/2016/09/132-cepillo-de-algas-1827-300x203.png');
INSERT INTO `producto` VALUES (14, '321789416', 'Satelite Flotador Acuacoral 1906', 'Satelite Flotador Acuacoral 1906', 704.00, 0, 'A', 56, 'https://www.acuamain.com.ec/wp-content/uploads/2016/09/132-satelite-flotador-acuacoral-1906-300x203.png');
INSERT INTO `producto` VALUES (15, '32989714', 'Dosificador Itellichlor\r\n', '\r\nDosificador Itellichlor\r\n', 89.00, 0, 'A', 32, 'https://www.acuamain.com.ec/wp-content/uploads/2016/09/131-dosificador-itellichlor-300x256.png');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `passw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `estado` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_cliente` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_cliente`(`id_cliente`) USING BTREE,
  CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'admin', 'A', NULL);
INSERT INTO `user` VALUES (2, 'jonathan.alcoser@espoch.edu.ec', '123456', 'A', NULL);

-- ----------------------------
-- View structure for cliente_cbx
-- ----------------------------
DROP VIEW IF EXISTS `cliente_cbx`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `cliente_cbx` AS SELECT id , CONCAT(Nombre," ",Apellido) as Nombre FROM cliente ;

-- ----------------------------
-- View structure for factura_table
-- ----------------------------
DROP VIEW IF EXISTS `factura_table`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `factura_table` AS SELECT CB.id as ID_Factura , 
			 CB.NumFactura , 
			 CONCAT(C.Nombre," ",C.Apellido) as Client_Info,
			 CB.Fecha ,
			 CB.TotalVenta
FROM cabecera_factura AS CB, cliente AS C
WHERE CB.id_Cliente = C.id ;

SET FOREIGN_KEY_CHECKS = 1;
