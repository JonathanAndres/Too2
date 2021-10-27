/*
 Navicat Premium Data Transfer

 Source Server         : PHP
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : too2

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 20/10/2021 23:03:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for articulo
-- ----------------------------
DROP TABLE IF EXISTS `articulo`;
CREATE TABLE `articulo`  (
  `SN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Marca` int(11) NOT NULL,
  `Modelo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `almacenamiento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ram` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`SN`) USING BTREE,
  INDEX `fk_TipoArt`(`tipo`) USING BTREE,
  INDEX `fk_MarcaArt`(`Marca`) USING BTREE,
  CONSTRAINT `fk_MarcaArt` FOREIGN KEY (`Marca`) REFERENCES `marca` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_TipoArt` FOREIGN KEY (`tipo`) REFERENCES `tipo_articulo` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of articulo
-- ----------------------------

-- ----------------------------
-- Table structure for detalle
-- ----------------------------
DROP TABLE IF EXISTS `detalle`;
CREATE TABLE `detalle`  (
  `numGuia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `artculo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  INDEX `fk_guiaDetall`(`numGuia`) USING BTREE,
  INDEX `fk_guiaArt`(`artculo`) USING BTREE,
  CONSTRAINT `fk_guiaArt` FOREIGN KEY (`artculo`) REFERENCES `articulo` (`SN`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_guiaDetall` FOREIGN KEY (`numGuia`) REFERENCES `guia` (`numguia`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detalle
-- ----------------------------

-- ----------------------------
-- Table structure for empresa
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa`  (
  `ruc` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ciudad` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `direccion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `estado` int(11) NULL DEFAULT NULL,
  `contacto` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ruc`) USING BTREE,
  INDEX `fk_EmpPer`(`contacto`) USING BTREE,
  CONSTRAINT `fk_EmpPer` FOREIGN KEY (`contacto`) REFERENCES `persona` (`Cedula`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of empresa
-- ----------------------------

-- ----------------------------
-- Table structure for guia
-- ----------------------------
DROP TABLE IF EXISTS `guia`;
CREATE TABLE `guia`  (
  `numguia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Contacto` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tiempoAl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `estado` binary(2) NULL DEFAULT NULL,
  `fecha` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `cantidad` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`numguia`) USING BTREE,
  INDEX `fk_GuiaContac`(`Contacto`) USING BTREE,
  CONSTRAINT `fk_GuiaContac` FOREIGN KEY (`Contacto`) REFERENCES `persona` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of guia
-- ----------------------------

-- ----------------------------
-- Table structure for marca
-- ----------------------------
DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca`  (
  `id` int(11) NOT NULL,
  `Marca` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of marca
-- ----------------------------

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona`  (
  `Cedula` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Direccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Tipo` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Cedula`) USING BTREE,
  INDEX `Tipo`(`Tipo`) USING BTREE,
  CONSTRAINT `fk_tipoPer` FOREIGN KEY (`Tipo`) REFERENCES `tipo_persona` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of persona
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_articulo
-- ----------------------------
DROP TABLE IF EXISTS `tipo_articulo`;
CREATE TABLE `tipo_articulo`  (
  `id` int(11) NOT NULL,
  `descrip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_articulo
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_persona
-- ----------------------------
DROP TABLE IF EXISTS `tipo_persona`;
CREATE TABLE `tipo_persona`  (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_persona
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `User` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  CONSTRAINT `FK_USER` FOREIGN KEY (`id`) REFERENCES `persona` (`Cedula`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
