/*
Navicat MySQL Data Transfer

Source Server         : Mysql
Source Server Version : 50715
Source Host           : localhost:3306
Source Database       : sicoi

Target Server Type    : MYSQL
Target Server Version : 50715
File Encoding         : 65001

Date: 2016-10-30 01:56:16
*/
create database sicoi;
use sicoi;
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for emergencia
-- ----------------------------
DROP TABLE IF EXISTS `emergencia`;
CREATE TABLE `emergencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_emergencia_t_reporte` (`tipo`) USING BTREE,
  CONSTRAINT `emergencia_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_reporte` (`id_tiporep`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for estado
-- ----------------------------
DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `id_pais` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_estado`),
  KEY `id_estado` (`id_estado`) USING BTREE,
  KEY `fk_estado` (`id_pais`) USING BTREE,
  KEY `id_estado_2` (`id_estado`,`id_pais`) USING BTREE,
  CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for institucion
-- ----------------------------
DROP TABLE IF EXISTS `institucion`;
CREATE TABLE `institucion` (
  `id_institucion` int(6) NOT NULL AUTO_INCREMENT,
  `id_lugar` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `domicilio` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contacto` varchar(255) NOT NULL,
  `activo_pd` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_institucion`),
  KEY `institucion_ibfk_1` (`id_lugar`) USING BTREE,
  CONSTRAINT `institucion_ibfk_1` FOREIGN KEY (`id_lugar`) REFERENCES `lugar` (`id_lugar`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for localidad
-- ----------------------------
DROP TABLE IF EXISTS `localidad`;
CREATE TABLE `localidad` (
  `id_localidad` int(11) NOT NULL AUTO_INCREMENT,
  `id_municipio` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_localidad`),
  KEY `fk_localidad` (`id_municipio`) USING BTREE,
  CONSTRAINT `localidad_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lugar
-- ----------------------------
DROP TABLE IF EXISTS `lugar`;
CREATE TABLE `lugar` (
  `id_lugar` int(11) NOT NULL AUTO_INCREMENT,
  `id_localidad` int(11) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `latitud` varchar(50) DEFAULT '0',
  `longitud` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id_lugar`),
  KEY `fk_lugar1` (`id_localidad`) USING BTREE,
  CONSTRAINT `lugar_ibfk_1` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id_localidad`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for marca_vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `marca_vehiculo`;
CREATE TABLE `marca_vehiculo` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for modelo_vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `modelo_vehiculo`;
CREATE TABLE `modelo_vehiculo` (
  `id_modelo` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `anio` int(11) NOT NULL,
  PRIMARY KEY (`id_modelo`),
  KEY `fkmodelo` (`id_marca`) USING BTREE,
  CONSTRAINT `modelo_vehiculo_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca_vehiculo` (`id_marca`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for municipio
-- ----------------------------
DROP TABLE IF EXISTS `municipio`;
CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_municipio`),
  KEY `fk_municipio` (`id_estado`) USING BTREE,
  CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ocupacion
-- ----------------------------
DROP TABLE IF EXISTS `ocupacion`;
CREATE TABLE `ocupacion` (
  `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id_ocupacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pais
-- ----------------------------
DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `id_lugar` int(11) NOT NULL,
  `id_ocupacion` int(11) NOT NULL,
  `padre_tutor` varchar(255) DEFAULT NULL,
  `madre` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `domicilio` varchar(255) NOT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `sexo` tinyint(1) NOT NULL DEFAULT '1',
  `edad` tinyint(3) unsigned NOT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'images/personas/default.png',
  `tipo` int(11) NOT NULL COMMENT '1=detenido,2=paciente,3=otros',
  `activo_pd` tinyint(4) DEFAULT NULL,
  `activo_sp` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `id_ocupacion` (`id_ocupacion`) USING BTREE,
  KEY `padre_tutor` (`padre_tutor`) USING BTREE,
  KEY `madre` (`madre`) USING BTREE,
  KEY `persona_ibfk_2` (`id_lugar`) USING BTREE,
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupacion` (`id_ocupacion`) ON UPDATE CASCADE,
  CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`id_lugar`) REFERENCES `lugar` (`id_lugar`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for privilegio
-- ----------------------------
DROP TABLE IF EXISTS `privilegio`;
CREATE TABLE `privilegio` (
  `idprivilegio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`idprivilegio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for reporte
-- ----------------------------
DROP TABLE IF EXISTS `reporte`;
CREATE TABLE `reporte` (
  `id_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `id_emergencia` int(11) NOT NULL,
  `tipo_aviso` int(11) NOT NULL,
  `id_lugar` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hora` time DEFAULT NULL,
  `canalizacion` int(11) DEFAULT NULL,
  `detalles` varchar(450) DEFAULT NULL,
  `id_sesion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reporte`),
  KEY `fk_reporte_eme` (`id_emergencia`) USING BTREE,
  KEY `fk_reporte_t_aviso` (`tipo_aviso`) USING BTREE,
  KEY `fk_reporte_lugar` (`id_lugar`) USING BTREE,
  KEY `fk_reporte_sesion` (`id_sesion`) USING BTREE,
  CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`id_emergencia`) REFERENCES `emergencia` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reporte_ibfk_2` FOREIGN KEY (`id_lugar`) REFERENCES `lugar` (`id_lugar`) ON UPDATE CASCADE,
  CONSTRAINT `reporte_ibfk_3` FOREIGN KEY (`id_sesion`) REFERENCES `sys_sesion` (`id_sesion`) ON UPDATE CASCADE,
  CONSTRAINT `reporte_ibfk_4` FOREIGN KEY (`tipo_aviso`) REFERENCES `tipo_aviso` (`id_tipo`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for reporte_barandilla
-- ----------------------------
DROP TABLE IF EXISTS `reporte_barandilla`;
CREATE TABLE `reporte_barandilla` (
  `id_reporte` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `causa` varchar(255) NOT NULL,
  `pertenencias` varchar(450) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1' COMMENT 'especifica el estatus de la persona 1=detenido, 2=transferido,3=liberado',
  `remite` varchar(400) DEFAULT NULL,
  `observaciones` varchar(400) NOT NULL,
  `lugar_arresto` varchar(400) DEFAULT NULL,
  `aseguramiento` varchar(400) DEFAULT 'No se registró ningún material peligroso o ilícito',
  `destino` int(11) DEFAULT NULL,
  KEY `fk_persona` (`id_persona`),
  KEY `fk_reporte` (`id_reporte`),
  CONSTRAINT `fk_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE,
  CONSTRAINT `fk_reporte` FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id_reporte`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for reporte_persona
-- ----------------------------
DROP TABLE IF EXISTS `reporte_persona`;
CREATE TABLE `reporte_persona` (
  `id_reporte` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_vehiculo` int(11) DEFAULT NULL,
  `detalles` varchar(450) DEFAULT NULL,
  KEY `fk_reportep_reporte` (`id_reporte`) USING BTREE,
  KEY `fk_reportep_persona` (`id_persona`) USING BTREE,
  KEY `fk_reportep_vehiculo` (`id_vehiculo`) USING BTREE,
  CONSTRAINT `reporte_persona_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE,
  CONSTRAINT `reporte_persona_ibfk_3` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for reporte_vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `reporte_vehiculo`;
CREATE TABLE `reporte_vehiculo` (
  `id_reporte` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_conductor` int(11) NOT NULL,
  `probable_resp` int(11) DEFAULT '0',
  `detalles` varchar(400) DEFAULT NULL,
  KEY `fk_reportev_rep` (`id_reporte`) USING BTREE,
  KEY `fk_reportev_veh` (`id_vehiculo`) USING BTREE,
  KEY `fk_reportev_persona` (`id_conductor`) USING BTREE,
  CONSTRAINT `reporte_vehiculo_ibfk_1` FOREIGN KEY (`id_conductor`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE,
  CONSTRAINT `reporte_vehiculo_ibfk_3` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sesion
-- ----------------------------
DROP TABLE IF EXISTS `sesion`;
CREATE TABLE `sesion` (
  `id_sesion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_sesion`),
  KEY `id_usuario` (`id_usuario`) USING BTREE,
  KEY `id_persona` (`id_persona`) USING BTREE,
  CONSTRAINT `sesion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  CONSTRAINT `sesion_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sesioninstit
-- ----------------------------
DROP TABLE IF EXISTS `sesioninstit`;
CREATE TABLE `sesioninstit` (
  `id_sesion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_sesion`),
  KEY `fk_usuario` (`id_usuario`),
  KEY `fk_institucion` (`id_institucion`),
  CONSTRAINT `fk_institucion` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id_institucion`) ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sys_sesion
-- ----------------------------
DROP TABLE IF EXISTS `sys_sesion`;
CREATE TABLE `sys_sesion` (
  `id_sesion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_sesion`),
  KEY `fk_sesion_usuario` (`id_usuario`) USING BTREE,
  CONSTRAINT `sys_sesion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tipo_aviso
-- ----------------------------
DROP TABLE IF EXISTS `tipo_aviso`;
CREATE TABLE `tipo_aviso` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tipo_reporte
-- ----------------------------
DROP TABLE IF EXISTS `tipo_reporte`;
CREATE TABLE `tipo_reporte` (
  `id_tiporep` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_tiporep`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tipo_vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `tipo_vehiculo`;
CREATE TABLE `tipo_vehiculo` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idprivilegio` int(11) NOT NULL,
  `telefono` varchar(150) DEFAULT NULL,
  `nick` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_priv` (`idprivilegio`) USING BTREE,
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idprivilegio`) REFERENCES `privilegio` (`idprivilegio`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `id_modelo` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `serie` varchar(255) NOT NULL,
  `detalles` varchar(450) DEFAULT NULL,
  `liberado` int(11) DEFAULT NULL,
  `ubicacion` int(11) DEFAULT NULL,
  `adeudo` double DEFAULT NULL,
  PRIMARY KEY (`id_vehiculo`),
  KEY `fk_vehi1` (`id_modelo`) USING BTREE,
  KEY `fk_vehi2` (`id_tipo`) USING BTREE,
  KEY `fk_vehi3` (`id_estado`) USING BTREE,
  CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_modelo`) REFERENCES `modelo_vehiculo` (`id_modelo`) ON UPDATE CASCADE,
  CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_vehiculo` (`id_tipo`) ON UPDATE CASCADE,
  CONSTRAINT `vehiculo_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
