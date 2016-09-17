/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : sicoi

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2016-09-16 19:01:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for emergencia
-- ----------------------------
DROP TABLE IF EXISTS `emergencia`;
CREATE TABLE `emergencia` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`tipo`  int(11) NOT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`tipo`) REFERENCES `tipo_reporte` (`id_tiporep`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_emergencia_t_reporte` (`tipo`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of emergencia
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for estado
-- ----------------------------
DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
`id_estado`  int(11) NOT NULL AUTO_INCREMENT ,
`id_pais`  int(11) NOT NULL ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_estado`),
FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_estado` (`id_estado`) USING BTREE ,
INDEX `fk_estado` (`id_pais`) USING BTREE ,
INDEX `id_estado_2` (`id_estado`, `id_pais`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of estado
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for institucion
-- ----------------------------
DROP TABLE IF EXISTS `institucion`;
CREATE TABLE `institucion` (
`id_institucion`  int(6) NOT NULL AUTO_INCREMENT ,
`id_lugar`  int(11) NOT NULL ,
`nombre`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`domicilio`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`telefono`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`contacto`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_institucion`),
FOREIGN KEY (`id_lugar`) REFERENCES `lugar` (`id_lugar`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `institucion_ibfk_1` (`id_lugar`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of institucion
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for localidad
-- ----------------------------
DROP TABLE IF EXISTS `localidad`;
CREATE TABLE `localidad` (
`id_localidad`  int(11) NOT NULL AUTO_INCREMENT ,
`id_municipio`  int(11) NOT NULL ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_localidad`),
FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_localidad` (`id_municipio`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of localidad
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for lugar
-- ----------------------------
DROP TABLE IF EXISTS `lugar`;
CREATE TABLE `lugar` (
`id_lugar`  int(11) NOT NULL AUTO_INCREMENT ,
`id_localidad`  int(11) NOT NULL ,
`nombre`  varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`direccion`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`latitud`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' ,
`longitud`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' ,
PRIMARY KEY (`id_lugar`),
FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id_localidad`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_lugar1` (`id_localidad`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of lugar
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for marca_vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `marca_vehiculo`;
CREATE TABLE `marca_vehiculo` (
`id_marca`  int(11) NOT NULL ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_marca`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of marca_vehiculo
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for modelo_vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `modelo_vehiculo`;
CREATE TABLE `modelo_vehiculo` (
`id_modelo`  int(11) NOT NULL ,
`id_marca`  int(11) NOT NULL ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`anio`  int(11) NOT NULL ,
PRIMARY KEY (`id_modelo`),
FOREIGN KEY (`id_marca`) REFERENCES `marca_vehiculo` (`id_marca`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fkmodelo` (`id_marca`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of modelo_vehiculo
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for municipio
-- ----------------------------
DROP TABLE IF EXISTS `municipio`;
CREATE TABLE `municipio` (
`id_municipio`  int(11) NOT NULL AUTO_INCREMENT ,
`id_estado`  int(11) NOT NULL ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_municipio`),
FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_municipio` (`id_estado`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of municipio
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for ocupacion
-- ----------------------------
DROP TABLE IF EXISTS `ocupacion`;
CREATE TABLE `ocupacion` (
`id_ocupacion`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_ocupacion`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of ocupacion
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for pais
-- ----------------------------
DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais` (
`id_pais`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_pais`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of pais
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
`id_persona`  int(11) NOT NULL AUTO_INCREMENT ,
`id_lugar`  int(11) NOT NULL ,
`id_ocupacion`  int(11) NOT NULL ,
`padre_tutor`  int(11) NULL DEFAULT NULL ,
`madre`  int(11) NULL DEFAULT NULL ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`domicilio`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`curp`  varchar(18) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`sexo`  tinyint(1) NOT NULL DEFAULT 1 ,
`edad`  tinyint(3) UNSIGNED NOT NULL ,
`telefono`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`foto`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'images/personas/default.png' ,
PRIMARY KEY (`id_persona`),
FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupacion` (`id_ocupacion`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_lugar`) REFERENCES `lugar` (`id_lugar`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`padre_tutor`) REFERENCES `persona` (`id_persona`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`madre`) REFERENCES `persona` (`id_persona`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_ocupacion` (`id_ocupacion`) USING BTREE ,
INDEX `padre_tutor` (`padre_tutor`) USING BTREE ,
INDEX `madre` (`madre`) USING BTREE ,
INDEX `persona_ibfk_2` (`id_lugar`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of persona
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for privilegio
-- ----------------------------
DROP TABLE IF EXISTS `privilegio`;
CREATE TABLE `privilegio` (
`idprivilegio`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`idprivilegio`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of privilegio
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for reporte
-- ----------------------------
DROP TABLE IF EXISTS `reporte`;
CREATE TABLE `reporte` (
`id_reporte`  int(11) NOT NULL ,
`id_emergencia`  int(11) NOT NULL ,
`tipo_aviso`  int(11) NOT NULL ,
`id_lugar`  int(11) NOT NULL ,
`fecha`  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`hora`  time NULL DEFAULT NULL ,
`canalizacion`  int(11) NOT NULL ,
`detalles`  varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`id_sesion`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id_reporte`),
FOREIGN KEY (`id_emergencia`) REFERENCES `emergencia` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_lugar`) REFERENCES `lugar` (`id_lugar`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_sesion`) REFERENCES `sys_sesion` (`id_sesion`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`tipo_aviso`) REFERENCES `tipo_aviso` (`id_tipo`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_reporte_eme` (`id_emergencia`) USING BTREE ,
INDEX `fk_reporte_t_aviso` (`tipo_aviso`) USING BTREE ,
INDEX `fk_reporte_lugar` (`id_lugar`) USING BTREE ,
INDEX `fk_reporte_sesion` (`id_sesion`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of reporte
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for reporte_persona
-- ----------------------------
DROP TABLE IF EXISTS `reporte_persona`;
CREATE TABLE `reporte_persona` (
`id_reporte`  int(11) NOT NULL ,
`id_persona`  int(11) NOT NULL ,
`id_vehiculo`  int(11) NULL DEFAULT NULL ,
`detalles`  varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id_reporte`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_reportep_reporte` (`id_reporte`) USING BTREE ,
INDEX `fk_reportep_persona` (`id_persona`) USING BTREE ,
INDEX `fk_reportep_vehiculo` (`id_vehiculo`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of reporte_persona
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for reporte_vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `reporte_vehiculo`;
CREATE TABLE `reporte_vehiculo` (
`id_reporte`  int(11) NOT NULL ,
`id_vehiculo`  int(11) NOT NULL ,
`id_conductor`  int(11) NOT NULL ,
`probable_resp`  int(11) NULL DEFAULT 0 ,
`detalles`  varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
FOREIGN KEY (`id_conductor`) REFERENCES `persona` (`id_persona`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id_reporte`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_reportev_rep` (`id_reporte`) USING BTREE ,
INDEX `fk_reportev_veh` (`id_vehiculo`) USING BTREE ,
INDEX `fk_reportev_persona` (`id_conductor`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of reporte_vehiculo
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for sesion
-- ----------------------------
DROP TABLE IF EXISTS `sesion`;
CREATE TABLE `sesion` (
`id_sesion`  int(11) NOT NULL ,
`id_usuario`  int(11) NOT NULL ,
`id_persona`  int(11) NOT NULL ,
`id_institucion`  int(6) NULL DEFAULT NULL ,
`fecha`  datetime NOT NULL ,
`detalle`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id_institucion`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_usuario` (`id_usuario`) USING BTREE ,
INDEX `id_persona` (`id_persona`) USING BTREE ,
INDEX `id_institucion` (`id_institucion`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of sesion
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for sys_sesion
-- ----------------------------
DROP TABLE IF EXISTS `sys_sesion`;
CREATE TABLE `sys_sesion` (
`id_sesion`  int(11) NOT NULL AUTO_INCREMENT ,
`id_usuario`  int(11) NOT NULL ,
`fecha`  datetime NOT NULL ,
`ip`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_sesion`),
FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_sesion_usuario` (`id_usuario`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of sys_sesion
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tipo_aviso
-- ----------------------------
DROP TABLE IF EXISTS `tipo_aviso`;
CREATE TABLE `tipo_aviso` (
`id_tipo`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_tipo`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of tipo_aviso
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tipo_reporte
-- ----------------------------
DROP TABLE IF EXISTS `tipo_reporte`;
CREATE TABLE `tipo_reporte` (
`id_tiporep`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id_tiporep`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of tipo_reporte
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tipo_vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `tipo_vehiculo`;
CREATE TABLE `tipo_vehiculo` (
`id_tipo`  int(11) NOT NULL ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_tipo`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of tipo_vehiculo
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
`id_usuario`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`password`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`idprivilegio`  int(11) NOT NULL ,
`telefono`  varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`nick`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id_usuario`),
FOREIGN KEY (`idprivilegio`) REFERENCES `privilegio` (`idprivilegio`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_usuario_priv` (`idprivilegio`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of usuario
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE `vehiculo` (
`id_vehiculo`  int(11) NOT NULL AUTO_INCREMENT ,
`id_modelo`  int(11) NULL DEFAULT NULL ,
`id_tipo`  int(11) NULL DEFAULT NULL ,
`id_estado`  int(11) NULL DEFAULT NULL ,
`serie`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`detalles`  varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`liberado`  int(11) NULL DEFAULT NULL ,
`ubicacion`  int(11) NULL DEFAULT NULL ,
`adeudo`  double NULL DEFAULT NULL ,
PRIMARY KEY (`id_vehiculo`),
FOREIGN KEY (`id_modelo`) REFERENCES `modelo_vehiculo` (`id_modelo`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_tipo`) REFERENCES `tipo_vehiculo` (`id_tipo`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_vehi1` (`id_modelo`) USING BTREE ,
INDEX `fk_vehi2` (`id_tipo`) USING BTREE ,
INDEX `fk_vehi3` (`id_estado`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of vehiculo
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Auto increment value for emergencia
-- ----------------------------
ALTER TABLE `emergencia` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for estado
-- ----------------------------
ALTER TABLE `estado` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for institucion
-- ----------------------------
ALTER TABLE `institucion` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for localidad
-- ----------------------------
ALTER TABLE `localidad` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for lugar
-- ----------------------------
ALTER TABLE `lugar` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for municipio
-- ----------------------------
ALTER TABLE `municipio` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for ocupacion
-- ----------------------------
ALTER TABLE `ocupacion` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for pais
-- ----------------------------
ALTER TABLE `pais` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for persona
-- ----------------------------
ALTER TABLE `persona` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for privilegio
-- ----------------------------
ALTER TABLE `privilegio` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for sys_sesion
-- ----------------------------
ALTER TABLE `sys_sesion` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for tipo_aviso
-- ----------------------------
ALTER TABLE `tipo_aviso` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for tipo_reporte
-- ----------------------------
ALTER TABLE `tipo_reporte` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for usuario
-- ----------------------------
ALTER TABLE `usuario` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for vehiculo
-- ----------------------------
ALTER TABLE `vehiculo` AUTO_INCREMENT=1;
