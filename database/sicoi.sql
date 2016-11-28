/*
Navicat MySQL Data Transfer

Source Server         : Mysql
Source Server Version : 50715
Source Host           : localhost:3306
Source Database       : sicoi

Target Server Type    : MYSQL
Target Server Version : 50715
File Encoding         : 65001

Date: 2016-11-28 01:11:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for detalle_per_rep
-- ----------------------------
DROP TABLE IF EXISTS `detalle_per_rep`;
CREATE TABLE `detalle_per_rep` (
  `id_reporte` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `estatus` int(11) NOT NULL COMMENT 'status de la persona 1=agraviado,2=consignado,3=otros',
  KEY `fk_1_reportesp` (`id_reporte`),
  KEY `fk_2_persona` (`id_persona`),
  CONSTRAINT `fk_1_reportesp` FOREIGN KEY (`id_reporte`) REFERENCES `reporte_sp` (`id_reporte`) ON UPDATE CASCADE,
  CONSTRAINT `fk_2_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detalle_per_rep
-- ----------------------------
INSERT INTO `detalle_per_rep` VALUES ('13', '7', '1');
INSERT INTO `detalle_per_rep` VALUES ('13', '6', '2');
INSERT INTO `detalle_per_rep` VALUES ('13', '12', '2');
INSERT INTO `detalle_per_rep` VALUES ('13', '16', '2');
INSERT INTO `detalle_per_rep` VALUES ('32', '19', '1');
INSERT INTO `detalle_per_rep` VALUES ('32', '3', '2');
INSERT INTO `detalle_per_rep` VALUES ('31', '19', '1');
INSERT INTO `detalle_per_rep` VALUES ('33', '20', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emergencia
-- ----------------------------
INSERT INTO `emergencia` VALUES ('1', 'Ingreso a Barandilla', '1');
INSERT INTO `emergencia` VALUES ('2', 'ABANDONO DE PERSONA', '1');
INSERT INTO `emergencia` VALUES ('3', 'ABANDONO DE VEHÍCULO', '2');
INSERT INTO `emergencia` VALUES ('4', 'ABORTO', '1');
INSERT INTO `emergencia` VALUES ('5', 'ABUSO SEXUAL', '1');
INSERT INTO `emergencia` VALUES ('6', 'ACCIDENTE ACUÁTICO CON HERIDOS', '2');
INSERT INTO `emergencia` VALUES ('7', 'ACCIDENTE DE AERONAVE CON HERIDOS', '2');
INSERT INTO `emergencia` VALUES ('8', 'ACCIDENTE DE MOTOCICLETA CON HERIDOS', '2');
INSERT INTO `emergencia` VALUES ('9', 'ACCIDENTE DE TRANSITO SIN HERIDOS', '2');
INSERT INTO `emergencia` VALUES ('10', 'ACCIDENTE DE VEHICULO AUTOMOTOR CON HERIDOS', '2');
INSERT INTO `emergencia` VALUES ('11', 'ACCIDENTE FERROVIARIO CON HERIDOS', '2');
INSERT INTO `emergencia` VALUES ('12', 'ACOSO ESCOLAR O BULLING', '1');
INSERT INTO `emergencia` VALUES ('13', 'ACOSO U HOSTIGAMIENTO SEXUAL', '1');
INSERT INTO `emergencia` VALUES ('14', 'ACTOS DE COMERCIALIZACION ILEGAL DE SANGRE,ORGANOS O TEJIDOS HUMANOS', '1');
INSERT INTO `emergencia` VALUES ('15', 'AERONAVE SOSPECHOSA', '1');
INSERT INTO `emergencia` VALUES ('16', 'AFECTACION DE LOS SERVICIOS BASICOS', '3');
INSERT INTO `emergencia` VALUES ('17', 'AGRESION FISICA', '1');
INSERT INTO `emergencia` VALUES ('18', 'AHOGADO', '4');
INSERT INTO `emergencia` VALUES ('19', 'ALARMA DE EMERGENCIA ACTIVADA', '1');
INSERT INTO `emergencia` VALUES ('20', 'ALCANTARILLA OBSTRUIDA', '3');
INSERT INTO `emergencia` VALUES ('21', 'ALCANTARILLA SIN TAPA', '3');
INSERT INTO `emergencia` VALUES ('22', 'ALLANAMIENTO DE MORADA', '1');
INSERT INTO `emergencia` VALUES ('23', 'ALMACENAMIENTO DE SUBSTANCIAS PELIGROSAS', '1');
INSERT INTO `emergencia` VALUES ('24', 'ALTERACION DEL ORDEN PUBLICO POR PERSONA ALCOHOLIZADA', '1');
INSERT INTO `emergencia` VALUES ('25', 'ALTERACION DEL ORDEN PUBLICO POR PERSONA DROGADA', '1');
INSERT INTO `emergencia` VALUES ('26', 'AMENAZA DE ABORTO', '4');
INSERT INTO `emergencia` VALUES ('27', 'AMENAZA DE BOMBA', '1');
INSERT INTO `emergencia` VALUES ('28', 'AMENAZA DE SUICIDIO', '1');
INSERT INTO `emergencia` VALUES ('29', 'AMENAZA O INSULTO', '1');
INSERT INTO `emergencia` VALUES ('30', 'AMPUTADO', '4');
INSERT INTO `emergencia` VALUES ('31', 'ANIMAL MUERTO', '3');
INSERT INTO `emergencia` VALUES ('32', 'ANIMAL PELIGROSO', '3');
INSERT INTO `emergencia` VALUES ('33', 'APOYO PSICOLÓGICO', '4');
INSERT INTO `emergencia` VALUES ('34', 'ÁRBOL CAIDO O POR CAER', '3');
INSERT INTO `emergencia` VALUES ('35', 'ARRANCONES O CARRERAS DE VEHÍCULOS', '1');
INSERT INTO `emergencia` VALUES ('36', 'ASFIXIA', '4');
INSERT INTO `emergencia` VALUES ('37', 'ASOCIACIÓN DELICTUOSA O PANDILLERISMO', '1');
INSERT INTO `emergencia` VALUES ('38', 'ATAQUES AL PUDOR', '1');
INSERT INTO `emergencia` VALUES ('39', 'ATROPELLADO', '2');
INSERT INTO `emergencia` VALUES ('40', 'ATROPELLAMIENTO DE SEMOVIENTE', '2');
INSERT INTO `emergencia` VALUES ('41', 'BLOQUEO DE VÍAS DE COMUNICACIÓN', '2');
INSERT INTO `emergencia` VALUES ('42', 'BOTÓN DE ACTIVADO DE EMERGENCIA', '1');
INSERT INTO `emergencia` VALUES ('43', 'CABLES COLGANDO', '3');
INSERT INTO `emergencia` VALUES ('44', 'CADÁVER', '4');
INSERT INTO `emergencia` VALUES ('45', 'CAÍDA DE ANUNCIO ESPECTACULAR', '3');
INSERT INTO `emergencia` VALUES ('46', 'CAÍDA DE BARDA', '3');
INSERT INTO `emergencia` VALUES ('47', 'CAÍDA DE POSTE DE LUZ', '3');
INSERT INTO `emergencia` VALUES ('48', 'CAÍDA DE POSTE DE TELEFÓNICO', '3');
INSERT INTO `emergencia` VALUES ('49', 'CAÍDA EN LUGAR PROFUNDO', '4');
INSERT INTO `emergencia` VALUES ('50', 'CIRCULAR EN SENTIDO CONTRARIO', '1');
INSERT INTO `emergencia` VALUES ('51', 'COLISIÓN CON HERIDOS', '2');
INSERT INTO `emergencia` VALUES ('52', 'CONDUCTOR EBRIO', '1');
INSERT INTO `emergencia` VALUES ('53', 'CONGESTIÓN ALCOHOLICA', '4');
INSERT INTO `emergencia` VALUES ('54', 'CONSUMO DE ALCOHOL EN VÍA PÚBLICA', '1');
INSERT INTO `emergencia` VALUES ('55', 'CONSUMO DE DROGAS EN VÍA PÚBLICA', '1');
INSERT INTO `emergencia` VALUES ('56', 'CONTAMINACIÓN DE SUERO,AIRE Y AGUA', '3');
INSERT INTO `emergencia` VALUES ('57', 'CONVULSIONES', '4');
INSERT INTO `emergencia` VALUES ('58', 'CORRUPCIÓN DE MENORES', '1');
INSERT INTO `emergencia` VALUES ('59', 'CORTO CIRCUITO', '3');
INSERT INTO `emergencia` VALUES ('60', 'CRISIS NERVIOSA', '4');
INSERT INTO `emergencia` VALUES ('61', 'CRISTALAZO', '1');
INSERT INTO `emergencia` VALUES ('62', 'DAÑO A BIENES PÚBLICOS INSTITUCIONES MONUMENTOS ENTRE OTROS', '1');
INSERT INTO `emergencia` VALUES ('63', 'DAÑO A PROPIEDAD AJENA', '1');
INSERT INTO `emergencia` VALUES ('64', 'DEMOSTRACIONES DE INCONFORMIDAD SOCIAL', '3');
INSERT INTO `emergencia` VALUES ('65', 'DERRUMBES', '3');
INSERT INTO `emergencia` VALUES ('66', 'DESCARGA DE DERECHOS SIN PERMISOS', '1');
INSERT INTO `emergencia` VALUES ('67', 'DESMAYO', '4');
INSERT INTO `emergencia` VALUES ('68', 'DESPOJO', '1');
INSERT INTO `emergencia` VALUES ('69', 'DETONACIÓN DE EXPLOSIVOS', '1');
INSERT INTO `emergencia` VALUES ('70', 'DISPARO DE ARMA DE FUEGO', '1');
INSERT INTO `emergencia` VALUES ('71', 'ELECTORALES', '1');
INSERT INTO `emergencia` VALUES ('72', 'ELECTROCUTADO', '4');
INSERT INTO `emergencia` VALUES ('73', 'ENFERMO', '4');
INSERT INTO `emergencia` VALUES ('74', 'ENFERMO MENTAL', '4');
INSERT INTO `emergencia` VALUES ('75', 'ENFRENTAMIENTO DE GRUPOS ARMADOS', '1');
INSERT INTO `emergencia` VALUES ('76', 'ENJAMBRE DE ABEJAS', '3');
INSERT INTO `emergencia` VALUES ('77', 'EPIDEMIAS', '3');
INSERT INTO `emergencia` VALUES ('78', 'ERUPCIÓN O EMISIONES VOLCÁNICAS', '3');
INSERT INTO `emergencia` VALUES ('79', 'ESTUPRO', '1');
INSERT INTO `emergencia` VALUES ('80', 'EXPLOSIÓN', '3');
INSERT INTO `emergencia` VALUES ('81', 'EXPLOTACIÓN DE MENORES', '1');
INSERT INTO `emergencia` VALUES ('82', 'EXTORSIÓN', '1');
INSERT INTO `emergencia` VALUES ('83', 'EXTORSIÓN VÍA TELEFÓNICA', '1');
INSERT INTO `emergencia` VALUES ('84', 'FALLA DE ALUMBRADO PÚBLICO', '3');
INSERT INTO `emergencia` VALUES ('85', 'FALLAS DE SEMÁFORO', '3');
INSERT INTO `emergencia` VALUES ('86', 'FETO HUMANO ENCONTRADO', '1');
INSERT INTO `emergencia` VALUES ('87', 'FRACTURADO', '4');
INSERT INTO `emergencia` VALUES ('88', 'FRAUDE', '1');
INSERT INTO `emergencia` VALUES ('89', 'FRENTES FRÍOS, BAJAS TEMPERAUTRAS, NEVADAS Y HELADAS', '3');
INSERT INTO `emergencia` VALUES ('90', 'FUGA DE AGUA', '3');
INSERT INTO `emergencia` VALUES ('91', 'FUGA DE REOS', '1');
INSERT INTO `emergencia` VALUES ('92', 'FUGAS Y DERRAMES', '3');
INSERT INTO `emergencia` VALUES ('93', 'GRAFFITIS', '1');
INSERT INTO `emergencia` VALUES ('94', 'GRAVA SUELTA', '3');
INSERT INTO `emergencia` VALUES ('95', 'HALLAZGO DE ARMA', '1');
INSERT INTO `emergencia` VALUES ('96', 'HALLAZGO DE OSAMENTA O RESTOS HUMANOS', '1');
INSERT INTO `emergencia` VALUES ('97', 'HEMORRAGIA', '4');
INSERT INTO `emergencia` VALUES ('98', 'HOMICIDIO', '1');
INSERT INTO `emergencia` VALUES ('99', 'HUNDIMIENTOS REGIONALES, LOCALES Y AGRIETAMIENTOS', '3');
INSERT INTO `emergencia` VALUES ('100', 'HURACANES', '3');
INSERT INTO `emergencia` VALUES ('101', 'INCENDIO', '3');
INSERT INTO `emergencia` VALUES ('102', 'INCONSCIENTE', '4');
INSERT INTO `emergencia` VALUES ('103', 'INFARTO', '4');
INSERT INTO `emergencia` VALUES ('104', 'INTOXICACIÓN', '4');
INSERT INTO `emergencia` VALUES ('105', 'INUNDACIONES', '3');
INSERT INTO `emergencia` VALUES ('106', 'LESIONADO POR ARMA', '4');
INSERT INTO `emergencia` VALUES ('107', 'LESIONADO POR CAÍDA', '4');
INSERT INTO `emergencia` VALUES ('108', 'MALTRATO DE ANIMALES', '3');
INSERT INTO `emergencia` VALUES ('109', 'MANIFESTACIÓN CON DISTURBIS O BLOQUEOS', '1');
INSERT INTO `emergencia` VALUES ('110', 'MENOR EXTRAVIADO', '1');
INSERT INTO `emergencia` VALUES ('111', 'MITIN', '1');
INSERT INTO `emergencia` VALUES ('112', 'MORDIDA ANIMAL', '4');
INSERT INTO `emergencia` VALUES ('113', 'NARCOMENUDEO', '1');
INSERT INTO `emergencia` VALUES ('114', 'OBJETO SOSPECHOSO O PELIGROSO', '1');
INSERT INTO `emergencia` VALUES ('115', 'OLORES', '3');
INSERT INTO `emergencia` VALUES ('116', 'OTRAS LESIONES', '4');
INSERT INTO `emergencia` VALUES ('117', 'OTROS ATENTADOS CONTRA EL PATRIMONIO', '1');
INSERT INTO `emergencia` VALUES ('118', 'OTROS ATENTADOS CONTRA LA FAMILIA', '1');
INSERT INTO `emergencia` VALUES ('119', 'OTROS ATENTADOS CONTRA LA LIBERTAD PERSONAL', '1');
INSERT INTO `emergencia` VALUES ('120', 'OTROS ATENTADOS CONTRA LA SOCIEDAD', '1');
INSERT INTO `emergencia` VALUES ('121', 'OTROS ATENTADOS CONTRA LA VIDA Y LA INTEGRIDAD PERSONAL', '1');
INSERT INTO `emergencia` VALUES ('122', 'OTROS SERVICIOS PÚBLICOS', '3');
INSERT INTO `emergencia` VALUES ('123', 'PELEA CLANDESTINA CON ANIMALES', '1');
INSERT INTO `emergencia` VALUES ('124', 'PELEA CLANDESTINA O RIÑA', '1');
INSERT INTO `emergencia` VALUES ('125', 'PERSONA AGRESIVA', '1');
INSERT INTO `emergencia` VALUES ('126', 'PERSONA EN SITUACIÓN DE CALLE', '3');
INSERT INTO `emergencia` VALUES ('127', 'PERSONA ENVENENADA', '4');
INSERT INTO `emergencia` VALUES ('128', 'PERSONA EXHIBICIONISTA', '1');
INSERT INTO `emergencia` VALUES ('129', 'PERSONA NO LOCALIZADA', '1');
INSERT INTO `emergencia` VALUES ('130', 'PERSONA PRENSADA', '3');
INSERT INTO `emergencia` VALUES ('131', 'PERSONA SOSPECHOSA', '1');
INSERT INTO `emergencia` VALUES ('132', 'PERSONA TIRADA EN VÍA PÚBLICA', '4');
INSERT INTO `emergencia` VALUES ('133', 'PIQUETE DE ANIMAL', '4');
INSERT INTO `emergencia` VALUES ('134', 'PLAGAS', '3');
INSERT INTO `emergencia` VALUES ('135', 'PORTACIÓN DE ARMAS O CARTUCHOS', '1');
INSERT INTO `emergencia` VALUES ('136', 'PRIVACIÓN DE LA LIBERTAD', '1');
INSERT INTO `emergencia` VALUES ('137', 'QUEMADURAS', '4');
INSERT INTO `emergencia` VALUES ('138', 'RECUPERACIÓN DE VEHÍCULO ROBADO', '1');
INSERT INTO `emergencia` VALUES ('139', 'REHENES', '1');
INSERT INTO `emergencia` VALUES ('140', 'RESCATE', '3');
INSERT INTO `emergencia` VALUES ('141', 'RESIDUOS PELIGROSOS', '3');
INSERT INTO `emergencia` VALUES ('142', 'ROBO A BANCO CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('143', 'ROBO A BANCO SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('144', 'ROBO A CAJERO AUTOMÁTICO', '1');
INSERT INTO `emergencia` VALUES ('145', 'ROBO A CASA DE CAMBIO CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('146', 'ROBO A CASA DE CAMBIO SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('147', 'ROBO A CASA HABITACIÓN CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('148', 'ROBO A CASA HABITACIÓN SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('149', 'ROBO A EMPRESA DE TRASLADO DE VALORES CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('150', 'ROBO A EMPRESA DE TRASLADO DE VALORES SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('151', 'ROBO A ESCUELA CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('152', 'ROBO A ESCUELA SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('153', 'ROBO A FERROCARRIL', '1');
INSERT INTO `emergencia` VALUES ('154', 'ROBO A GASOLINERA CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('155', 'ROBO A GASOLINERA SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('156', 'ROBO A NEGOCIO CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('157', 'ROBO A NEGOCIO SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('158', 'ROBO A TRANSEUNTE CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('159', 'ROBO A TRANSEUNTE SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('160', 'ROBO A TRANSPORTISTA CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('161', 'ROBO A TRANSPORTISTA SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('162', 'ROBO DE AUTOPARTES', '1');
INSERT INTO `emergencia` VALUES ('163', 'ROBO DE COMBUSTIBLE O TOMA COLANDESTINA DE DUCTOS', '1');
INSERT INTO `emergencia` VALUES ('164', 'ROBO DE GANADO', '1');
INSERT INTO `emergencia` VALUES ('165', 'ROBO DE GANADO EN PROCESO', '1');
INSERT INTO `emergencia` VALUES ('166', 'ROBO DE VEHÍCULO PARTICULAR CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('167', 'ROBO DE VEHÍCULO PARTICULAR SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('168', 'ROBO EN CARRETERA CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('169', 'ROBO EN CARRETERA SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('170', 'ROBO EN PROCESO A BANCO CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('171', 'ROBO EN PROCESO A BANCO SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('172', 'ROBO EN PROCESO A CASA DE CAMBIO CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('173', 'ROBO EN PROCESO A CASA DE CAMBIO SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('174', 'ROBO EN PROCESO A CASA HABITACIÓN CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('175', 'ROBO EN PROCESO A CASA HABITACIÓN SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('176', 'ROBO EN PROCESO A EMPRESA DE TRASLADO DE VALORES CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('177', 'ROBO EN PROCESO A EMPRESA DE TRASLADO DE VALORES SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('178', 'ROBO EN PROCESO A ESCUELA CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('179', 'ROBO EN PROCESO A ESCUELA SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('180', 'ROBO EN PROCESO A FERROCARRIL', '1');
INSERT INTO `emergencia` VALUES ('181', 'ROBO EN PROCESO A GASOLINERA CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('182', 'ROBO EN PROCESO A GASOLINERA SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('183', 'ROBO EN PROCESO A NEGOCIO CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('184', 'ROBO EN PROCESO A NEGOCIO SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('185', 'ROBO EN PROCESO A TRANSEUNTE CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('186', 'ROBO EN PROCESO A TRANSEUNTE SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('187', 'ROBO EN PROCESO A TRANSPORTISTA CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('188', 'ROBO EN PROCESO A TRANSPORTISTA SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('189', 'ROBO EN PROCESO DE VEHÍCULO PARTICULAR CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('190', 'ROBO EN PROCESO DE VEHICULO PARTICULAR SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('191', 'ROBO EN TRANSPORTE PÚBLICO COLECTIVO CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('192', 'ROBO EN TRANSPORTE PÚBLICO COLECTIVO SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('193', 'ROBO EN TRANSPORTE PÚBLICO INDIVIDUAL CON VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('194', 'ROBO EN TRANSPORTE PÚBLICO INDIVIDUAL SIN VIOLENCIA', '1');
INSERT INTO `emergencia` VALUES ('195', 'ROBO O EXTRAVÍO DE PLACA', '1');
INSERT INTO `emergencia` VALUES ('196', 'RUIDO EXCESIVO', '1');
INSERT INTO `emergencia` VALUES ('197', 'SECUESTRO', '1');
INSERT INTO `emergencia` VALUES ('198', 'SECUESTRO EXPRESS', '1');
INSERT INTO `emergencia` VALUES ('199', 'SIMULACRO', '3');
INSERT INTO `emergencia` VALUES ('200', 'SISMO', '3');
INSERT INTO `emergencia` VALUES ('201', 'SOBREDOSIS', '4');
INSERT INTO `emergencia` VALUES ('202', 'SUICIDIO', '1');
INSERT INTO `emergencia` VALUES ('203', 'SUSTRACCIÓN DE MENORES', '1');
INSERT INTO `emergencia` VALUES ('204', 'TALA ILEGAL', '3');
INSERT INTO `emergencia` VALUES ('205', 'TERRORISMO O ATENTADO', '1');
INSERT INTO `emergencia` VALUES ('206', 'TORMENTAS DE GRANIZO', '3');
INSERT INTO `emergencia` VALUES ('207', 'TORNADOS', '3');
INSERT INTO `emergencia` VALUES ('208', 'TRABAJO DE PARTO', '4');
INSERT INTO `emergencia` VALUES ('209', 'TRASNPORTE DE SUBSTANCIAS PELIGROSAS', '3');
INSERT INTO `emergencia` VALUES ('210', 'TRATA DE MENORES', '1');
INSERT INTO `emergencia` VALUES ('211', 'TRATA DE PERSONAS', '1');
INSERT INTO `emergencia` VALUES ('212', 'TRÁFICO DE INDOCUMENTADOS', '1');
INSERT INTO `emergencia` VALUES ('213', 'TRÁFICO DE MENORES', '1');
INSERT INTO `emergencia` VALUES ('214', 'TSUNAMI', '3');
INSERT INTO `emergencia` VALUES ('215', 'USURPACIÓN DE IDENTIDAD', '1');
INSERT INTO `emergencia` VALUES ('216', 'VEHÍCULO A EXCESO DE VELOCIDAD', '1');
INSERT INTO `emergencia` VALUES ('217', 'VEHÍCULO DE HUIDA', '1');
INSERT INTO `emergencia` VALUES ('218', 'VEHÍCULO SOSPECHOSO', '1');
INSERT INTO `emergencia` VALUES ('219', 'VENTA CLANDESTINA DE PIROTÉCNIA, COHETES O FUEGOS ARTIFICIALES', '1');
INSERT INTO `emergencia` VALUES ('220', 'VIALIDAD EN MAL ESTADO', '1');
INSERT INTO `emergencia` VALUES ('221', 'VIENTO', '3');
INSERT INTO `emergencia` VALUES ('222', 'VIOLACIÓN', '3');
INSERT INTO `emergencia` VALUES ('223', 'VIOLACIÓN A LA LEY DE JUEGOS Y SORTEOS', '1');
INSERT INTO `emergencia` VALUES ('224', 'VIOLACIÓN DE SELLOS DE CLAUSURA', '1');
INSERT INTO `emergencia` VALUES ('225', 'VIOLACIÓN CONTRA LA MUJER', '1');
INSERT INTO `emergencia` VALUES ('226', 'VIOLENCIA DE PAREJA', '1');
INSERT INTO `emergencia` VALUES ('227', 'VIOLENCIA FAMILIAR', '1');
INSERT INTO `emergencia` VALUES ('228', 'VOLCADURA CON HERIDOS', '2');

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of estado
-- ----------------------------
INSERT INTO `estado` VALUES ('1', '1', 'Aguascalientes');
INSERT INTO `estado` VALUES ('2', '1', 'Baja California');
INSERT INTO `estado` VALUES ('3', '1', 'Baja California Sur');
INSERT INTO `estado` VALUES ('4', '1', 'Campeche');
INSERT INTO `estado` VALUES ('5', '1', 'Chiapas');
INSERT INTO `estado` VALUES ('6', '1', 'Chihuahua');
INSERT INTO `estado` VALUES ('7', '1', 'Coahuila de Zaragoza');
INSERT INTO `estado` VALUES ('8', '1', 'Colima');
INSERT INTO `estado` VALUES ('9', '1', 'Durango');
INSERT INTO `estado` VALUES ('10', '1', 'Estado de México');
INSERT INTO `estado` VALUES ('11', '1', 'Guanajuato');
INSERT INTO `estado` VALUES ('12', '1', 'Guerrero');
INSERT INTO `estado` VALUES ('13', '1', 'Hidalgo');
INSERT INTO `estado` VALUES ('14', '1', 'Jalisco');
INSERT INTO `estado` VALUES ('15', '1', 'Michoacán de Ocampo');
INSERT INTO `estado` VALUES ('16', '1', 'Morelos');
INSERT INTO `estado` VALUES ('17', '1', 'Nayarit');
INSERT INTO `estado` VALUES ('18', '1', 'Nuevo León');
INSERT INTO `estado` VALUES ('19', '1', 'Oaxaca');
INSERT INTO `estado` VALUES ('20', '1', 'Puebla');
INSERT INTO `estado` VALUES ('21', '1', 'Querétaro');
INSERT INTO `estado` VALUES ('22', '1', 'Quintana Roo');
INSERT INTO `estado` VALUES ('23', '1', 'San Luis Potosí');
INSERT INTO `estado` VALUES ('24', '1', 'Sinaloa');
INSERT INTO `estado` VALUES ('25', '1', 'Sonora');
INSERT INTO `estado` VALUES ('26', '1', 'Tabasco');
INSERT INTO `estado` VALUES ('27', '1', 'Tamaulipas');
INSERT INTO `estado` VALUES ('28', '1', 'Tlaxcala');
INSERT INTO `estado` VALUES ('29', '1', 'Veracruz');
INSERT INTO `estado` VALUES ('30', '1', 'Yucatán');
INSERT INTO `estado` VALUES ('31', '1', 'Zacatecas');
INSERT INTO `estado` VALUES ('32', '2', 'Arizona');
INSERT INTO `estado` VALUES ('33', '2', 'California');
INSERT INTO `estado` VALUES ('34', '2', 'Texas');
INSERT INTO `estado` VALUES ('35', '2', 'Nuevo México');

-- ----------------------------
-- Table structure for herido
-- ----------------------------
DROP TABLE IF EXISTS `herido`;
CREATE TABLE `herido` (
  `id_reporte` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_reporte`),
  KEY `fk_persona_herido` (`id_persona`),
  CONSTRAINT `fk_persona_herido` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE,
  CONSTRAINT `fk_reporte_herido` FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id_reporte`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of herido
-- ----------------------------
INSERT INTO `herido` VALUES ('36', '21');

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
-- Records of institucion
-- ----------------------------
INSERT INTO `institucion` VALUES ('1', '9', 'asdasd', 'asdasda', '(312)123-1233', 'asdasdasd', '1');
INSERT INTO `institucion` VALUES ('2', '6', 'Sec. Técnica Pablo Silva Garcia', 'Carretera Colima/Comala S/N', '(312)123-1233', 'Pedro Galván', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of localidad
-- ----------------------------
INSERT INTO `localidad` VALUES ('1', '3', 'Comala');
INSERT INTO `localidad` VALUES ('2', '3', 'Cofradía de Suchitlán');
INSERT INTO `localidad` VALUES ('3', '3', 'Suchitlán');
INSERT INTO `localidad` VALUES ('4', '3', 'Zacualpan');
INSERT INTO `localidad` VALUES ('5', '3', 'Ixtlahuacán');

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lugar
-- ----------------------------
INSERT INTO `lugar` VALUES ('1', '1', 'Capitan A. LLerenas s/n colona La Trinidad', '19.326059', '-103.764547');
INSERT INTO `lugar` VALUES ('6', '1', 'Carretera Colima/Comala S/N', '0', '0');
INSERT INTO `lugar` VALUES ('7', '2', 'Carretera Colima/Comala S/N', '0', '0');
INSERT INTO `lugar` VALUES ('8', '2', 'asdasd', '0', '0');
INSERT INTO `lugar` VALUES ('9', '3', 'asdasda', '0', '0');
INSERT INTO `lugar` VALUES ('10', '1', 'ASd #123 colonia Aguajitos', '0', '0');
INSERT INTO `lugar` VALUES ('12', '1', 'madero  #123 colonia Aguajitos', '0', '0');
INSERT INTO `lugar` VALUES ('13', '1', 'madero  #123 colonia Centro', '0', '0');
INSERT INTO `lugar` VALUES ('14', '1', 'hola #123 colonia Aguajitos', '0', '0');
INSERT INTO `lugar` VALUES ('15', '1', 'Manuel Cariillo #354 colonia Aguajitos', '0', '0');
INSERT INTO `lugar` VALUES ('16', '1', 'Gabriel Valencia Carrillo #43 colonia Aguajitos', '0', '0');
INSERT INTO `lugar` VALUES ('17', '1', 'asdasd #1 colonia asdasd', '0', '0');
INSERT INTO `lugar` VALUES ('18', '1', 'madero #123 colonia Aguajitos', '0', '0');
INSERT INTO `lugar` VALUES ('19', '1', 'Medellin #112 colonia centro', '0', '0');
INSERT INTO `lugar` VALUES ('20', '5', 'Guillermo Prieto #245 colonia Liberación', '0', '0');
INSERT INTO `lugar` VALUES ('21', '1', 'Madero #1 colonia Centro', '0', '0');
INSERT INTO `lugar` VALUES ('26', '3', 'Madero #1 colonia Centro', '0', '0');
INSERT INTO `lugar` VALUES ('27', '3', 'Juana Escutia #457 Colonia Barrio Alto', '0', '0');
INSERT INTO `lugar` VALUES ('28', '1', 'Salvador Valencia S/N colonia Los Aguajes', '0', '0');
INSERT INTO `lugar` VALUES ('29', '1', 'Salinas S/n colonia Aguajes', '0', '0');
INSERT INTO `lugar` VALUES ('30', '2', 'Javier mina #123 colonia Infonavith', '0', '0');
INSERT INTO `lugar` VALUES ('31', '1', 'Gabino Barreda #16 colonia magisterial', '0', '0');
INSERT INTO `lugar` VALUES ('32', '2', 'Cipriano Valle #2 colonia Aguajes', '0', '0');
INSERT INTO `lugar` VALUES ('33', '1', 'Cipriano Valle #2 colonia Aguajes', '0', '0');
INSERT INTO `lugar` VALUES ('34', '1', 'Cipriano Valle #2 colonia Aguajes', '0', '0');
INSERT INTO `lugar` VALUES ('35', '1', 'Constitución #230 colonia Barrio Alto', '0', '0');
INSERT INTO `lugar` VALUES ('36', '1', 'Constitucion #23 colonia Centro', '0', '0');
INSERT INTO `lugar` VALUES ('37', '1', 'Benito Juarez #14 colonia Barrio Alto', '0', '0');
INSERT INTO `lugar` VALUES ('41', '1', 'G. Nuñes #34 colonia Centro', '0', '0');
INSERT INTO `lugar` VALUES ('42', '1', 'Benito Juarez #23 colonia Barrio Alto', '0', '0');
INSERT INTO `lugar` VALUES ('43', '1', 'Juan Anguiano #123 Colonia Aguajes', '0', '0');
INSERT INTO `lugar` VALUES ('44', '1', 'Manuel Carrillo Valencia #25 Colonia La Trinidad', '0', '0');

-- ----------------------------
-- Table structure for marca_vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `marca_vehiculo`;
CREATE TABLE `marca_vehiculo` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of marca_vehiculo
-- ----------------------------
INSERT INTO `marca_vehiculo` VALUES ('1', 'Nissan');
INSERT INTO `marca_vehiculo` VALUES ('2', 'Dodge');
INSERT INTO `marca_vehiculo` VALUES ('3', 'Ford');
INSERT INTO `marca_vehiculo` VALUES ('4', 'Honda');
INSERT INTO `marca_vehiculo` VALUES ('5', 'Toyota');

-- ----------------------------
-- Table structure for modelo_vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `modelo_vehiculo`;
CREATE TABLE `modelo_vehiculo` (
  `id_modelo` int(11) NOT NULL AUTO_INCREMENT,
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `anio` int(11) NOT NULL,
  PRIMARY KEY (`id_modelo`),
  KEY `fkmodelo` (`id_marca`) USING BTREE,
  CONSTRAINT `fk_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca_vehiculo` (`id_marca`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of modelo_vehiculo
-- ----------------------------
INSERT INTO `modelo_vehiculo` VALUES ('1', '1', 'Versa', '2010');
INSERT INTO `modelo_vehiculo` VALUES ('2', '3', 'Focus', '2012');
INSERT INTO `modelo_vehiculo` VALUES ('3', '1', 'Versa', '2015');
INSERT INTO `modelo_vehiculo` VALUES ('4', '4', 'Element', '2012');
INSERT INTO `modelo_vehiculo` VALUES ('5', '4', 'Accord', '2005');
INSERT INTO `modelo_vehiculo` VALUES ('6', '3', 'Fiesta', '2009');
INSERT INTO `modelo_vehiculo` VALUES ('7', '5', 'Camri', '2009');

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
-- Records of municipio
-- ----------------------------
INSERT INTO `municipio` VALUES ('1', '1', 'Armería');
INSERT INTO `municipio` VALUES ('2', '1', 'Colima');
INSERT INTO `municipio` VALUES ('3', '1', 'Comala');
INSERT INTO `municipio` VALUES ('4', '1', 'Coquimatlán');
INSERT INTO `municipio` VALUES ('5', '1', 'Cuauhtémoc');
INSERT INTO `municipio` VALUES ('6', '1', 'Ixtlahuacán');
INSERT INTO `municipio` VALUES ('7', '1', 'Manzanillo');
INSERT INTO `municipio` VALUES ('8', '1', 'Minatitlán');
INSERT INTO `municipio` VALUES ('9', '1', 'Tecomán');
INSERT INTO `municipio` VALUES ('10', '1', 'Villa de Álvarez');

-- ----------------------------
-- Table structure for ocupacion
-- ----------------------------
DROP TABLE IF EXISTS `ocupacion`;
CREATE TABLE `ocupacion` (
  `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id_ocupacion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ocupacion
-- ----------------------------
INSERT INTO `ocupacion` VALUES ('1', 'Estudiante');
INSERT INTO `ocupacion` VALUES ('2', 'Ama de Casa');
INSERT INTO `ocupacion` VALUES ('3', 'Empleado');
INSERT INTO `ocupacion` VALUES ('4', 'asdasda');
INSERT INTO `ocupacion` VALUES ('5', 'albañil');
INSERT INTO `ocupacion` VALUES ('6', 'Taxista');
INSERT INTO `ocupacion` VALUES ('7', 'Maestra');
INSERT INTO `ocupacion` VALUES ('8', 'Enfermera');
INSERT INTO `ocupacion` VALUES ('9', 'Contratista');

-- ----------------------------
-- Table structure for pais
-- ----------------------------
DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pais
-- ----------------------------
INSERT INTO `pais` VALUES ('1', 'México');
INSERT INTO `pais` VALUES ('2', 'Estados Unidos');

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
  `alias` varchar(100) DEFAULT NULL,
  `domicilio` varchar(255) NOT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `sexo` tinyint(1) NOT NULL DEFAULT '1',
  `edad` tinyint(3) unsigned NOT NULL,
  `telefono` varchar(100) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES ('3', '21', '1', 'Hernandez Toscano Andres', 'Jimenez Diaz Alma Judith', 'Andres Hernández Jiménez', 'Apaa', 'Madero #1 colonia Centro', 'HEJA881019HCMRMN04', '1', '28', '3121233136', '2', '0', '1');
INSERT INTO `persona` VALUES ('6', '12', '2', null, null, 'Luisa Fernanda Peregrina González', 'Amaa', 'madero  #123 colonia Aguajitos', 'PEGL930713MCMRNS03', '2', '23', '(312)123-1231', '1', '0', '1');
INSERT INTO `persona` VALUES ('7', '13', '3', 'Hernandez Toscano Andres', 'Jimenez Diaz Alma Judith', 'Miguel Crispin Hernández Jiménez', 'El Mike', 'madero  #123 colonia Centro', 'HEJM841129HCMRMG06', '1', '32', '(312)159-8200', '2', '1', '1');
INSERT INTO `persona` VALUES ('8', '14', '2', null, null, 'Alma del Carmen Hernández Jiménez', 'La Bubu', 'hola #123 colonia Aguajitos', 'HEJA800916MCMRML04', '2', '36', '(123)123-1233', '1', '0', '1');
INSERT INTO `persona` VALUES ('10', '15', '1', null, null, 'Miguel Castillo de Jesus', 'EL Kumbia', 'Manuel Cariillo #354 colonia Aguajitos', 'CAJM990919HCMSSG06', '1', '17', '(312)123-1234', '1', '0', '1');
INSERT INTO `persona` VALUES ('12', '16', '1', null, null, 'Luis Francisco Guzmán Fuentes', 'La Wicha', 'Gabriel Valencia Carrillo #43 colonia Aguajitos', 'GUFL930813HCMZNS09', '1', '23', '(312)159-1704', '1', '0', '1');
INSERT INTO `persona` VALUES ('14', '17', '4', null, null, 'asdasd', 'asdasd', 'asdasd #1 colonia asdasd', 'JISI231311HSJSKS93', '1', '8', '(312)123-1231', '1', '0', '1');
INSERT INTO `persona` VALUES ('15', '19', '5', null, null, 'Javier Solorzano', 'El Javis', 'Medellin #112 colonia centro', 'ROPJ790814HCMMCV03', '1', '37', '(312)189-2210', '3', '0', '1');
INSERT INTO `persona` VALUES ('16', '20', '6', null, null, 'Francisco Quiñones Miranda', 'el Carnalito', 'Guillermo Prieto #245 colonia Liberación', 'QUMF920712HCNOSM03', '1', '24', '(312)456-2312', '3', '0', '1');
INSERT INTO `persona` VALUES ('17', '27', '1', null, null, 'Candelario Avalos Contreras', null, 'Juana Escutia #457 Colonia Barrio Alto', '', '1', '30', '(314)101-0106', '3', '0', '1');
INSERT INTO `persona` VALUES ('18', '29', '6', null, null, 'Javier Solorzano Valencia', null, 'Salinas S/n colonia Aguajes', '', '1', '22', '(312)123-1231', '3', '0', '1');
INSERT INTO `persona` VALUES ('19', '21', '7', null, null, 'Paulina María del Rayo Garcia Mendoza', null, 'Madero #1 colonia Centro', 'GAMP861025MCMRNL06', '2', '30', '(312)183-9535', '3', '0', '1');
INSERT INTO `persona` VALUES ('20', '41', '8', null, null, 'Alma Judith Jiménez', null, 'G. Nuñes #34 colonia Centro', 'JIDA590814MJCMZL05', '2', '57', '(312)311-4350', '3', '0', '1');
INSERT INTO `persona` VALUES ('21', '43', '9', null, null, 'Juan Manuel Campos Rivas', null, 'Juan Anguiano #123 Colonia Aguajes', '', '1', '34', '(312)198-1231', '3', '0', '1');

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
-- Records of privilegio
-- ----------------------------
INSERT INTO `privilegio` VALUES ('1', 'Administrador');
INSERT INTO `privilegio` VALUES ('2', 'Policia');
INSERT INTO `privilegio` VALUES ('3', 'Prevención');
INSERT INTO `privilegio` VALUES ('4', 'usuario');

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reporte
-- ----------------------------
INSERT INTO `reporte` VALUES ('1', '1', '3', '1', '2016-10-23 06:04:40', '06:04:40', null, 'se remite ciudadano a los separos preventívos', '41');
INSERT INTO `reporte` VALUES ('2', '1', '3', '1', '2016-10-28 03:47:26', '03:47:26', null, 'se remite ciudadano a los separos preventívos', '45');
INSERT INTO `reporte` VALUES ('3', '1', '3', '1', '2016-10-28 04:00:23', '04:00:23', null, 'se remite ciudadano a los separos preventívos', '46');
INSERT INTO `reporte` VALUES ('4', '1', '3', '1', '2016-10-28 04:01:11', '04:01:11', null, 'se remite ciudadano a los separos preventívos', '46');
INSERT INTO `reporte` VALUES ('5', '1', '3', '1', '2016-10-28 04:04:46', '04:04:46', null, 'se remite ciudadano a los separos preventívos', '46');
INSERT INTO `reporte` VALUES ('6', '1', '3', '1', '2016-11-01 01:48:22', '01:48:22', null, 'se remite ciudadano a los separos preventívos', '59');
INSERT INTO `reporte` VALUES ('7', '1', '3', '1', '2016-11-01 01:49:07', '01:49:07', null, 'se remite ciudadano a los separos preventívos', '59');
INSERT INTO `reporte` VALUES ('8', '1', '3', '1', '2016-11-01 02:01:00', '02:01:00', null, 'se remite ciudadano a los separos preventívos', '59');
INSERT INTO `reporte` VALUES ('9', '1', '3', '1', '2016-11-01 02:06:53', '02:06:53', null, 'se remite ciudadano a los separos preventívos', '59');
INSERT INTO `reporte` VALUES ('10', '1', '3', '1', '2016-11-01 02:29:53', '02:29:53', null, 'se remite ciudadano a los separos preventívos', '59');
INSERT INTO `reporte` VALUES ('11', '1', '3', '1', '2016-11-01 02:32:50', '02:32:50', null, 'se remite ciudadano a los separos preventívos', '59');
INSERT INTO `reporte` VALUES ('12', '1', '3', '1', '2016-11-01 04:08:42', '04:08:42', null, 'se remite ciudadano a los separos preventívos', '59');
INSERT INTO `reporte` VALUES ('13', '2', '1', '18', '2016-11-13 05:27:20', '12:30:00', null, 'Registro de incidencia de Seguridad Pública', '88');
INSERT INTO `reporte` VALUES ('14', '9', '1', '21', '2016-11-16 20:29:24', '14:22:00', null, 'Registro de suceso de Vialidad', '104');
INSERT INTO `reporte` VALUES ('15', '9', '2', '21', '2016-11-19 04:29:18', '00:45:00', null, 'Registro de suceso de Vialidad', '116');
INSERT INTO `reporte` VALUES ('26', '9', '1', '28', '2016-11-19 05:04:34', '13:02:00', null, 'Registro de suceso de Vialidad', '116');
INSERT INTO `reporte` VALUES ('27', '51', '2', '30', '2016-11-19 05:08:37', '02:25:00', null, 'Registro de suceso de Vialidad', '116');
INSERT INTO `reporte` VALUES ('31', '226', '2', '35', '2016-11-21 04:53:53', '14:21:00', null, 'Registro de suceso de seguridad pública', '120');
INSERT INTO `reporte` VALUES ('32', '17', '1', '36', '2016-11-21 05:13:27', '16:55:00', null, 'Registro de suceso de seguridad pública', '120');
INSERT INTO `reporte` VALUES ('33', '5', '1', '37', '2016-11-22 08:33:08', '07:22:00', null, 'Registro de suceso de seguridad pública', '124');
INSERT INTO `reporte` VALUES ('34', '39', '1', '42', '2016-11-26 02:05:58', '17:22:00', null, 'Registro de suceso de Vialidad', '144');
INSERT INTO `reporte` VALUES ('35', '39', '1', '42', '2016-11-26 02:06:17', '17:22:00', null, 'Registro de suceso de Vialidad', '144');
INSERT INTO `reporte` VALUES ('36', '39', '1', '42', '2016-11-26 02:07:43', '17:22:00', null, 'Registro de suceso de Vialidad', '144');

-- ----------------------------
-- Table structure for reporte_barandilla
-- ----------------------------
DROP TABLE IF EXISTS `reporte_barandilla`;
CREATE TABLE `reporte_barandilla` (
  `id_reporte` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `causa` int(11) NOT NULL DEFAULT '0',
  `pertenencias` varchar(450) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1' COMMENT 'especifica el estatus de la persona 1=detenido, 2=transferido,3=liberado',
  `remite` varchar(400) DEFAULT NULL,
  `observaciones` varchar(400) NOT NULL,
  `lugar_arresto` varchar(400) DEFAULT NULL,
  `aseguramiento` varchar(400) DEFAULT 'No se registró ningún material peligroso o ilícito',
  `destino` int(11) DEFAULT NULL,
  `foto` varchar(400) DEFAULT NULL,
  KEY `fk_persona` (`id_persona`),
  KEY `fk_reporte` (`id_reporte`),
  KEY `fk_emergencia` (`causa`),
  CONSTRAINT `fk_emergencia` FOREIGN KEY (`causa`) REFERENCES `emergencia` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE,
  CONSTRAINT `fk_reporte` FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id_reporte`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reporte_barandilla
-- ----------------------------
INSERT INTO `reporte_barandilla` VALUES ('1', '6', '124', 'ninguna', '2016-10-28 03:42:58', '2016-10-28 03:42:58', '1', 'Magariños', 'ninguna', null, null, null, '/images/fotos/1477643637.jpg');
INSERT INTO `reporte_barandilla` VALUES ('3', '7', '128', 'Cartera con 400 pesos en efectivo, celular samsung.', '2016-10-28 04:00:23', '2016-10-28 04:00:23', '1', 'sgto. Guzmán', 'ninguna', null, null, null, '/images/fotos/1477645223.jpg');
INSERT INTO `reporte_barandilla` VALUES ('5', '8', '147', 'no aplica', '2016-10-28 04:04:46', '2016-10-28 04:04:46', '1', 'sgto. Guzmán', 'ninguna\r\n', null, null, null, '/images/fotos/1477645485.PNG');
INSERT INTO `reporte_barandilla` VALUES ('7', '10', '209', 'ninguna', '2016-11-01 01:49:07', '2016-11-01 01:49:07', '3', 'Guzmán', 'Ninguna', 'Jardín de comala', 'No se registró ningún material peligroso o ilícito', '2', '/images/default.png');
INSERT INTO `reporte_barandilla` VALUES ('8', '10', '158', 'Celular, Maleta con laptop, cartera con 100 pesos', '2016-11-01 02:01:00', '2016-11-01 02:01:00', '3', 'Carriera', 'ninguna', 'Jardin de comala', 'No se registró ningún material peligroso o ilícito', '2', '/images/default.png');
INSERT INTO `reporte_barandilla` VALUES ('9', '12', '98', 'celular, cartera con 300 pesos', '2016-11-01 02:06:53', '2016-11-01 02:06:53', '1', 'Carriera', 'ninguna', 'Jardín de Comala', 'No se registró ningún material peligroso o ilícito', '2', '/images/fotos/1477987260.jpg');
INSERT INTO `reporte_barandilla` VALUES ('10', '3', '125', 'cartera ', '2016-11-01 02:29:53', '2016-11-01 02:29:53', '3', 'Guzmán', 'aaa', 'Jardinde comala', 'No se registró ningún material peligroso o ilícito', '2', '/images/fotos/1477994922.jpg');
INSERT INTO `reporte_barandilla` VALUES ('11', '14', '227', 'ninguna', '2016-11-01 02:32:50', '2016-11-01 02:32:50', '2', 'Carriera', 'as', 'asdas', 'No se registró ningún material peligroso o ilícito', '2', '/images/default.png');
INSERT INTO `reporte_barandilla` VALUES ('12', '10', '113', 'asd', '2016-11-01 04:08:42', '2016-11-01 04:08:42', '1', 'asd', 'asd', 'asd', 'No se registró ningún material peligroso o ilícito', '2', '/images/default.png');

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
-- Records of reporte_persona
-- ----------------------------

-- ----------------------------
-- Table structure for reporte_sp
-- ----------------------------
DROP TABLE IF EXISTS `reporte_sp`;
CREATE TABLE `reporte_sp` (
  `id_reporte` int(11) NOT NULL,
  `id_emergencia` int(11) DEFAULT NULL,
  `tipoaviso` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `unidad` varchar(200) NOT NULL,
  `oficiales` varchar(400) NOT NULL,
  `observaciones` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id_reporte`),
  KEY `fk_2_emergencia` (`id_emergencia`),
  KEY `fk_3_aviso` (`tipoaviso`),
  CONSTRAINT `fk_1_reporte` FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id_reporte`) ON UPDATE CASCADE,
  CONSTRAINT `fk_2_emergencia` FOREIGN KEY (`id_emergencia`) REFERENCES `emergencia` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_3_aviso` FOREIGN KEY (`tipoaviso`) REFERENCES `tipo_aviso` (`id_tipo`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reporte_sp
-- ----------------------------
INSERT INTO `reporte_sp` VALUES ('13', '159', '1', '2016-11-13 06:08:15', '2016-11-13 06:08:15', '12:30:00', 'asd', '123asd', '123');
INSERT INTO `reporte_sp` VALUES ('31', '226', '2', '2016-11-21 04:53:53', '2016-11-21 04:53:53', '14:21:00', '14', 'Gúzman, Higueras', 'Se registra incidencia entre pareja');
INSERT INTO `reporte_sp` VALUES ('32', '17', '1', '2016-11-21 05:13:27', '2016-11-21 05:13:27', '16:55:00', '1', 'Juarez', 'prueba');
INSERT INTO `reporte_sp` VALUES ('33', '5', '1', '2016-11-22 08:33:08', '2016-11-22 08:33:08', '07:22:00', '3', 'Chavez, Galván,Guzmán', 'Sin observaciones');

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
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `remite` varchar(200) DEFAULT NULL,
  KEY `fk_reportev_rep` (`id_reporte`) USING BTREE,
  KEY `fk_reportev_veh` (`id_vehiculo`) USING BTREE,
  KEY `fk_reportev_persona` (`id_conductor`) USING BTREE,
  CONSTRAINT `reporte_vehiculo_ibfk_1` FOREIGN KEY (`id_conductor`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE,
  CONSTRAINT `reporte_vehiculo_ibfk_3` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reporte_vehiculo
-- ----------------------------
INSERT INTO `reporte_vehiculo` VALUES ('14', '1', '3', '1', 'color azul, rin deportivo,cristales polarizados', '2016-11-27 23:39:49', '2016-11-27 23:39:49', 'Guzmán');
INSERT INTO `reporte_vehiculo` VALUES ('15', '2', '17', '1', 'Color rojo con negro, golpe en el parachoques delantero', '2016-11-27 23:39:55', '2016-11-27 23:39:55', 'Magariño');
INSERT INTO `reporte_vehiculo` VALUES ('26', '3', '18', '0', 'Vehiculo color tinto, 4 pueras', '2016-11-27 23:40:07', '2016-11-27 23:40:07', 'Guzmán');
INSERT INTO `reporte_vehiculo` VALUES ('27', '4', '18', '0', 'color blanco , 4 puertas', '2016-11-27 23:40:32', '2016-11-27 23:40:32', 'Navarro');
INSERT INTO `reporte_vehiculo` VALUES ('36', '5', '18', '1', 'Color Blanco, Cristales polarizados', '2016-11-27 23:40:21', '2016-11-27 23:40:21', 'Silverio Sanchez');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sesion
-- ----------------------------
INSERT INTO `sesion` VALUES ('1', '2', '7', '2016-11-12', 'ASDFGH');
INSERT INTO `sesion` VALUES ('2', '2', '7', '2016-11-12', 'ASDFGHJK\r\n');
INSERT INTO `sesion` VALUES ('3', '2', '7', '2016-11-12', 'SDFTYUIOP\r\n');
INSERT INTO `sesion` VALUES ('4', '2', '7', '2016-11-12', 'WERTYUIOPDFGHJKLÑ{\r\n');
INSERT INTO `sesion` VALUES ('5', '2', '7', '2016-11-12', 'WERTYUIOPDFGHJKLÑ{\r\n');
INSERT INTO `sesion` VALUES ('6', '2', '7', '2016-11-12', 'ERTYUIODFGHJCVBNM');

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
-- Records of sesioninstit
-- ----------------------------
INSERT INTO `sesioninstit` VALUES ('1', '2', '2', '2016-10-28 00:00:00', 'se atendieron a 150 alumnos, en donde se impartió una platica contra el bulling, obteniendo buenos resultados');

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
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_sesion
-- ----------------------------
INSERT INTO `sys_sesion` VALUES ('1', '3', '::1', '2016-09-17 08:26:56', null);
INSERT INTO `sys_sesion` VALUES ('2', '3', '::1', '2016-09-17 08:31:35', '2016-09-17 08:31:35');
INSERT INTO `sys_sesion` VALUES ('3', '2', '::1', '2016-09-17 08:33:19', '2016-09-17 08:33:19');
INSERT INTO `sys_sesion` VALUES ('4', '1', '::1', '2016-09-17 09:13:55', '2016-09-17 09:13:55');
INSERT INTO `sys_sesion` VALUES ('5', '2', '::1', '2016-09-17 09:14:21', '2016-09-17 09:14:21');
INSERT INTO `sys_sesion` VALUES ('6', '1', '::1', '2016-09-17 10:23:58', '2016-09-17 10:23:58');
INSERT INTO `sys_sesion` VALUES ('7', '2', '::1', '2016-09-25 03:06:04', '2016-09-25 03:06:04');
INSERT INTO `sys_sesion` VALUES ('8', '2', '::1', '2016-10-05 16:28:29', '2016-10-05 16:28:29');
INSERT INTO `sys_sesion` VALUES ('9', '2', '::1', '2016-10-05 17:46:44', '2016-10-05 17:46:44');
INSERT INTO `sys_sesion` VALUES ('10', '2', '::1', '2016-10-05 20:48:50', '2016-10-05 20:48:50');
INSERT INTO `sys_sesion` VALUES ('11', '2', '::1', '2016-10-05 21:01:06', '2016-10-05 21:01:06');
INSERT INTO `sys_sesion` VALUES ('12', '2', '::1', '2016-10-06 00:10:50', '2016-10-06 00:10:50');
INSERT INTO `sys_sesion` VALUES ('13', '2', '::1', '2016-10-06 06:10:03', '2016-10-06 06:10:03');
INSERT INTO `sys_sesion` VALUES ('14', '2', '::1', '2016-10-06 06:17:59', '2016-10-06 06:17:59');
INSERT INTO `sys_sesion` VALUES ('15', '2', '::1', '2016-10-06 06:38:37', '2016-10-06 06:38:37');
INSERT INTO `sys_sesion` VALUES ('16', '3', '::1', '2016-10-06 09:43:55', '2016-10-06 09:43:55');
INSERT INTO `sys_sesion` VALUES ('17', '2', '::1', '2016-10-06 09:58:34', '2016-10-06 09:58:34');
INSERT INTO `sys_sesion` VALUES ('18', '2', '::1', '2016-10-06 10:17:37', '2016-10-06 10:17:37');
INSERT INTO `sys_sesion` VALUES ('19', '2', '::1', '2016-10-06 12:40:57', '2016-10-06 12:40:57');
INSERT INTO `sys_sesion` VALUES ('20', '2', '::1', '2016-10-06 12:42:04', '2016-10-06 12:42:04');
INSERT INTO `sys_sesion` VALUES ('21', '3', '::1', '2016-10-07 03:06:29', '2016-10-07 03:06:29');
INSERT INTO `sys_sesion` VALUES ('22', '3', '::1', '2016-10-07 04:07:06', '2016-10-07 04:07:06');
INSERT INTO `sys_sesion` VALUES ('23', '2', '::1', '2016-10-07 04:33:02', '2016-10-07 04:33:02');
INSERT INTO `sys_sesion` VALUES ('24', '2', '::1', '2016-10-07 05:48:27', '2016-10-07 05:48:27');
INSERT INTO `sys_sesion` VALUES ('25', '2', '::1', '2016-10-07 08:18:12', '2016-10-07 08:18:12');
INSERT INTO `sys_sesion` VALUES ('26', '3', '::1', '2016-10-09 05:58:35', '2016-10-09 05:58:35');
INSERT INTO `sys_sesion` VALUES ('27', '2', '::1', '2016-10-09 06:33:44', '2016-10-09 06:33:44');
INSERT INTO `sys_sesion` VALUES ('28', '3', '::1', '2016-10-09 07:36:55', '2016-10-09 07:36:55');
INSERT INTO `sys_sesion` VALUES ('29', '3', '::1', '2016-10-09 07:38:26', '2016-10-09 07:38:26');
INSERT INTO `sys_sesion` VALUES ('30', '3', '::1', '2016-10-09 07:55:11', '2016-10-09 07:55:11');
INSERT INTO `sys_sesion` VALUES ('31', '3', '::1', '2016-10-09 08:03:48', '2016-10-09 08:03:48');
INSERT INTO `sys_sesion` VALUES ('32', '2', '::1', '2016-10-10 15:58:13', '2016-10-10 15:58:13');
INSERT INTO `sys_sesion` VALUES ('33', '2', '::1', '2016-10-10 16:30:41', '2016-10-10 16:30:41');
INSERT INTO `sys_sesion` VALUES ('34', '2', '::1', '2016-10-17 13:49:45', '2016-10-17 13:49:45');
INSERT INTO `sys_sesion` VALUES ('35', '2', '::1', '2016-10-17 13:50:46', '2016-10-17 13:50:46');
INSERT INTO `sys_sesion` VALUES ('36', '2', '::1', '2016-10-17 15:19:07', '2016-10-17 15:19:07');
INSERT INTO `sys_sesion` VALUES ('37', '2', '::1', '2016-10-17 16:15:28', '2016-10-17 16:15:28');
INSERT INTO `sys_sesion` VALUES ('38', '2', '::1', '2016-10-17 16:18:15', '2016-10-17 16:18:15');
INSERT INTO `sys_sesion` VALUES ('39', '2', '::1', '2016-10-23 06:26:56', '2016-10-23 06:26:56');
INSERT INTO `sys_sesion` VALUES ('40', '3', '::1', '2016-10-23 06:27:07', '2016-10-23 06:27:07');
INSERT INTO `sys_sesion` VALUES ('41', '2', '::1', '2016-10-23 07:51:24', '2016-10-23 07:51:24');
INSERT INTO `sys_sesion` VALUES ('42', '3', '::1', '2016-10-26 01:04:23', '2016-10-26 01:04:23');
INSERT INTO `sys_sesion` VALUES ('43', '2', '::1', '2016-10-28 01:02:20', '2016-10-28 01:02:20');
INSERT INTO `sys_sesion` VALUES ('44', '3', '::1', '2016-10-28 01:28:07', '2016-10-28 01:28:07');
INSERT INTO `sys_sesion` VALUES ('45', '3', '::1', '2016-10-28 02:07:08', '2016-10-28 02:07:08');
INSERT INTO `sys_sesion` VALUES ('46', '2', '::1', '2016-10-28 03:48:25', '2016-10-28 03:48:25');
INSERT INTO `sys_sesion` VALUES ('47', '3', '::1', '2016-10-28 05:53:29', '2016-10-28 05:53:29');
INSERT INTO `sys_sesion` VALUES ('48', '2', '::1', '2016-10-28 05:54:25', '2016-10-28 05:54:25');
INSERT INTO `sys_sesion` VALUES ('49', '2', '::1', '2016-10-28 12:10:54', '2016-10-28 12:10:54');
INSERT INTO `sys_sesion` VALUES ('50', '3', '::1', '2016-10-28 12:11:08', '2016-10-28 12:11:08');
INSERT INTO `sys_sesion` VALUES ('51', '3', '::1', '2016-10-28 12:11:49', '2016-10-28 12:11:49');
INSERT INTO `sys_sesion` VALUES ('52', '3', '::1', '2016-10-28 13:57:48', '2016-10-28 13:57:48');
INSERT INTO `sys_sesion` VALUES ('53', '2', '::1', '2016-10-30 01:23:52', '2016-10-30 01:23:52');
INSERT INTO `sys_sesion` VALUES ('54', '3', '::1', '2016-10-30 01:34:40', '2016-10-30 01:34:40');
INSERT INTO `sys_sesion` VALUES ('55', '3', '::1', '2016-10-30 03:58:16', '2016-10-30 03:58:16');
INSERT INTO `sys_sesion` VALUES ('56', '3', '::1', '2016-10-30 06:17:41', '2016-10-30 06:17:41');
INSERT INTO `sys_sesion` VALUES ('57', '3', '::1', '2016-10-30 16:52:25', '2016-10-30 16:52:25');
INSERT INTO `sys_sesion` VALUES ('58', '3', '::1', '2016-10-30 19:08:19', '2016-10-30 19:08:19');
INSERT INTO `sys_sesion` VALUES ('59', '3', '::1', '2016-11-01 01:05:35', '2016-11-01 01:05:35');
INSERT INTO `sys_sesion` VALUES ('60', '3', '::1', '2016-11-01 04:29:26', '2016-11-01 04:29:26');
INSERT INTO `sys_sesion` VALUES ('61', '3', '::1', '2016-11-01 04:29:45', '2016-11-01 04:29:45');
INSERT INTO `sys_sesion` VALUES ('62', '3', '::1', '2016-11-01 04:31:10', '2016-11-01 04:31:10');
INSERT INTO `sys_sesion` VALUES ('63', '2', '::1', '2016-11-01 04:50:14', '2016-11-01 04:50:14');
INSERT INTO `sys_sesion` VALUES ('64', '3', '::1', '2016-11-01 23:37:44', '2016-11-01 23:37:44');
INSERT INTO `sys_sesion` VALUES ('65', '2', '::1', '2016-11-03 00:42:09', '2016-11-03 00:42:09');
INSERT INTO `sys_sesion` VALUES ('66', '3', '::1', '2016-11-03 00:42:18', '2016-11-03 00:42:18');
INSERT INTO `sys_sesion` VALUES ('67', '3', '::1', '2016-11-03 08:04:56', '2016-11-03 08:04:56');
INSERT INTO `sys_sesion` VALUES ('68', '3', '::1', '2016-11-03 19:29:57', '2016-11-03 19:29:57');
INSERT INTO `sys_sesion` VALUES ('69', '3', '::1', '2016-11-04 01:05:44', '2016-11-04 01:05:44');
INSERT INTO `sys_sesion` VALUES ('70', '3', '::1', '2016-11-04 02:09:12', '2016-11-04 02:09:12');
INSERT INTO `sys_sesion` VALUES ('71', '3', '::1', '2016-11-05 01:23:04', '2016-11-05 01:23:04');
INSERT INTO `sys_sesion` VALUES ('72', '3', '::1', '2016-11-05 04:51:17', '2016-11-05 04:51:17');
INSERT INTO `sys_sesion` VALUES ('73', '3', '::1', '2016-11-06 01:04:53', '2016-11-06 01:04:53');
INSERT INTO `sys_sesion` VALUES ('74', '3', '::1', '2016-11-06 18:39:09', '2016-11-06 18:39:09');
INSERT INTO `sys_sesion` VALUES ('75', '3', '::1', '2016-11-06 20:32:58', '2016-11-06 20:32:58');
INSERT INTO `sys_sesion` VALUES ('76', '3', '::1', '2016-11-07 12:05:48', '2016-11-07 12:05:48');
INSERT INTO `sys_sesion` VALUES ('77', '3', '::1', '2016-11-09 22:55:11', '2016-11-09 22:55:11');
INSERT INTO `sys_sesion` VALUES ('78', '3', '::1', '2016-11-09 23:12:03', '2016-11-09 23:12:03');
INSERT INTO `sys_sesion` VALUES ('79', '3', '::1', '2016-11-10 12:38:37', '2016-11-10 12:38:37');
INSERT INTO `sys_sesion` VALUES ('80', '3', '::1', '2016-11-10 13:04:05', '2016-11-10 13:04:05');
INSERT INTO `sys_sesion` VALUES ('81', '3', '::1', '2016-11-10 13:14:09', '2016-11-10 13:14:09');
INSERT INTO `sys_sesion` VALUES ('82', '3', '::1', '2016-11-11 11:19:28', '2016-11-11 11:19:28');
INSERT INTO `sys_sesion` VALUES ('83', '3', '::1', '2016-11-11 12:24:41', '2016-11-11 12:24:41');
INSERT INTO `sys_sesion` VALUES ('84', '3', '::1', '2016-11-11 23:39:10', '2016-11-11 23:39:10');
INSERT INTO `sys_sesion` VALUES ('85', '3', '::1', '2016-11-12 02:01:53', '2016-11-12 02:01:53');
INSERT INTO `sys_sesion` VALUES ('86', '2', '::1', '2016-11-12 02:45:18', '2016-11-12 02:45:18');
INSERT INTO `sys_sesion` VALUES ('87', '3', '::1', '2016-11-12 22:33:11', '2016-11-12 22:33:11');
INSERT INTO `sys_sesion` VALUES ('88', '3', '::1', '2016-11-13 01:52:01', '2016-11-13 01:52:01');
INSERT INTO `sys_sesion` VALUES ('89', '3', '::1', '2016-11-14 09:15:22', '2016-11-14 09:15:22');
INSERT INTO `sys_sesion` VALUES ('90', '3', '::1', '2016-11-14 11:07:14', '2016-11-14 11:07:14');
INSERT INTO `sys_sesion` VALUES ('91', '3', '::1', '2016-11-15 11:03:04', '2016-11-15 11:03:04');
INSERT INTO `sys_sesion` VALUES ('92', '3', '::1', '2016-11-15 15:47:25', '2016-11-15 15:47:25');
INSERT INTO `sys_sesion` VALUES ('93', '3', '::1', '2016-11-15 19:56:28', '2016-11-15 19:56:28');
INSERT INTO `sys_sesion` VALUES ('94', '3', '::1', '2016-11-15 22:54:59', '2016-11-15 22:54:59');
INSERT INTO `sys_sesion` VALUES ('95', '3', '::1', '2016-11-15 23:18:33', '2016-11-15 23:18:33');
INSERT INTO `sys_sesion` VALUES ('96', '3', '::1', '2016-11-16 07:28:49', '2016-11-16 07:28:49');
INSERT INTO `sys_sesion` VALUES ('97', '3', '::1', '2016-11-16 07:29:16', '2016-11-16 07:29:16');
INSERT INTO `sys_sesion` VALUES ('98', '3', '::1', '2016-11-16 07:30:59', '2016-11-16 07:30:59');
INSERT INTO `sys_sesion` VALUES ('99', '3', '::1', '2016-11-16 07:32:15', '2016-11-16 07:32:15');
INSERT INTO `sys_sesion` VALUES ('100', '3', '::1', '2016-11-16 07:35:08', '2016-11-16 07:35:08');
INSERT INTO `sys_sesion` VALUES ('101', '2', '::1', '2016-11-16 07:43:57', '2016-11-16 07:43:57');
INSERT INTO `sys_sesion` VALUES ('102', '2', '::1', '2016-11-16 07:45:10', '2016-11-16 07:45:10');
INSERT INTO `sys_sesion` VALUES ('103', '3', '::1', '2016-11-16 07:55:02', '2016-11-16 07:55:02');
INSERT INTO `sys_sesion` VALUES ('104', '3', '::1', '2016-11-16 18:13:03', '2016-11-16 18:13:03');
INSERT INTO `sys_sesion` VALUES ('105', '3', '::1', '2016-11-16 22:16:24', '2016-11-16 22:16:24');
INSERT INTO `sys_sesion` VALUES ('106', '3', '::1', '2016-11-17 00:47:08', '2016-11-17 00:47:08');
INSERT INTO `sys_sesion` VALUES ('107', '3', '::1', '2016-11-17 11:15:11', '2016-11-17 11:15:11');
INSERT INTO `sys_sesion` VALUES ('108', '3', '::1', '2016-11-17 19:42:33', '2016-11-17 19:42:33');
INSERT INTO `sys_sesion` VALUES ('109', '3', '::1', '2016-11-17 20:55:16', '2016-11-17 20:55:16');
INSERT INTO `sys_sesion` VALUES ('110', '3', '::1', '2016-11-17 23:16:08', '2016-11-17 23:16:08');
INSERT INTO `sys_sesion` VALUES ('111', '3', '::1', '2016-11-17 23:19:55', '2016-11-17 23:19:55');
INSERT INTO `sys_sesion` VALUES ('112', '3', '::1', '2016-11-18 00:29:14', '2016-11-18 00:29:14');
INSERT INTO `sys_sesion` VALUES ('113', '3', '::1', '2016-11-18 02:28:16', '2016-11-18 02:28:16');
INSERT INTO `sys_sesion` VALUES ('114', '3', '::1', '2016-11-18 11:18:01', '2016-11-18 11:18:01');
INSERT INTO `sys_sesion` VALUES ('115', '3', '::1', '2016-11-19 02:16:38', '2016-11-19 02:16:38');
INSERT INTO `sys_sesion` VALUES ('116', '3', '::1', '2016-11-19 02:33:58', '2016-11-19 02:33:58');
INSERT INTO `sys_sesion` VALUES ('117', '3', '::1', '2016-11-20 02:07:39', '2016-11-20 02:07:39');
INSERT INTO `sys_sesion` VALUES ('118', '3', '::1', '2016-11-20 07:38:35', '2016-11-20 07:38:35');
INSERT INTO `sys_sesion` VALUES ('119', '3', '::1', '2016-11-21 01:07:47', '2016-11-21 01:07:47');
INSERT INTO `sys_sesion` VALUES ('120', '3', '::1', '2016-11-21 03:42:21', '2016-11-21 03:42:21');
INSERT INTO `sys_sesion` VALUES ('121', '3', '::1', '2016-11-22 00:46:10', '2016-11-22 00:46:10');
INSERT INTO `sys_sesion` VALUES ('122', '3', '::1', '2016-11-22 07:36:58', '2016-11-22 07:36:58');
INSERT INTO `sys_sesion` VALUES ('123', '3', '::1', '2016-11-22 07:39:47', '2016-11-22 07:39:47');
INSERT INTO `sys_sesion` VALUES ('124', '3', '::1', '2016-11-22 07:44:02', '2016-11-22 07:44:02');
INSERT INTO `sys_sesion` VALUES ('125', '3', '::1', '2016-11-22 12:03:55', '2016-11-22 12:03:55');
INSERT INTO `sys_sesion` VALUES ('126', '3', '::1', '2016-11-23 04:36:24', '2016-11-23 04:36:24');
INSERT INTO `sys_sesion` VALUES ('127', '3', '::1', '2016-11-23 20:34:27', '2016-11-23 20:34:27');
INSERT INTO `sys_sesion` VALUES ('128', '3', '::1', '2016-11-23 20:49:32', '2016-11-23 20:49:32');
INSERT INTO `sys_sesion` VALUES ('129', '2', '::1', '2016-11-23 21:13:58', '2016-11-23 21:13:58');
INSERT INTO `sys_sesion` VALUES ('130', '3', '::1', '2016-11-23 21:16:48', '2016-11-23 21:16:48');
INSERT INTO `sys_sesion` VALUES ('131', '3', '::1', '2016-11-23 21:21:26', '2016-11-23 21:21:26');
INSERT INTO `sys_sesion` VALUES ('132', '3', '::1', '2016-11-23 23:23:40', '2016-11-23 23:23:40');
INSERT INTO `sys_sesion` VALUES ('133', '3', '::1', '2016-11-24 02:56:53', '2016-11-24 02:56:53');
INSERT INTO `sys_sesion` VALUES ('134', '3', '::1', '2016-11-24 11:19:04', '2016-11-24 11:19:04');
INSERT INTO `sys_sesion` VALUES ('135', '3', '::1', '2016-11-24 11:21:14', '2016-11-24 11:21:14');
INSERT INTO `sys_sesion` VALUES ('136', '3', '::1', '2016-11-24 11:41:45', '2016-11-24 11:41:45');
INSERT INTO `sys_sesion` VALUES ('137', '3', '::1', '2016-11-24 11:52:53', '2016-11-24 11:52:53');
INSERT INTO `sys_sesion` VALUES ('138', '3', '::1', '2016-11-24 12:03:34', '2016-11-24 12:03:34');
INSERT INTO `sys_sesion` VALUES ('139', '3', '::1', '2016-11-26 01:11:21', '2016-11-26 01:11:21');
INSERT INTO `sys_sesion` VALUES ('140', '3', '::1', '2016-11-26 01:23:37', '2016-11-26 01:23:37');
INSERT INTO `sys_sesion` VALUES ('141', '3', '::1', '2016-11-26 01:35:49', '2016-11-26 01:35:49');
INSERT INTO `sys_sesion` VALUES ('142', '3', '::1', '2016-11-26 01:40:43', '2016-11-26 01:40:43');
INSERT INTO `sys_sesion` VALUES ('143', '3', '::1', '2016-11-26 01:41:37', '2016-11-26 01:41:37');
INSERT INTO `sys_sesion` VALUES ('144', '3', '::1', '2016-11-26 01:41:52', '2016-11-26 01:41:52');
INSERT INTO `sys_sesion` VALUES ('145', '3', '::1', '2016-11-26 07:06:04', '2016-11-26 07:06:04');
INSERT INTO `sys_sesion` VALUES ('146', '3', '::1', '2016-11-26 15:48:32', '2016-11-26 15:48:32');
INSERT INTO `sys_sesion` VALUES ('147', '3', '::1', '2016-11-27 00:23:39', '2016-11-27 00:23:39');
INSERT INTO `sys_sesion` VALUES ('148', '3', '::1', '2016-11-27 16:06:54', '2016-11-27 16:06:54');
INSERT INTO `sys_sesion` VALUES ('149', '3', '::1', '2016-11-27 21:47:19', '2016-11-27 21:47:19');
INSERT INTO `sys_sesion` VALUES ('150', '3', '::1', '2016-11-27 23:26:03', '2016-11-27 23:26:03');

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
-- Records of tipo_aviso
-- ----------------------------
INSERT INTO `tipo_aviso` VALUES ('1', 'Via 911');
INSERT INTO `tipo_aviso` VALUES ('2', 'Llamada a DSPV');
INSERT INTO `tipo_aviso` VALUES ('3', 'Institucional');

-- ----------------------------
-- Table structure for tipo_reporte
-- ----------------------------
DROP TABLE IF EXISTS `tipo_reporte`;
CREATE TABLE `tipo_reporte` (
  `id_tiporep` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_tiporep`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_reporte
-- ----------------------------
INSERT INTO `tipo_reporte` VALUES ('1', 'Seguridad Publica');
INSERT INTO `tipo_reporte` VALUES ('2', 'Vialidad');
INSERT INTO `tipo_reporte` VALUES ('3', 'Ayuntamiento');
INSERT INTO `tipo_reporte` VALUES ('4', 'Médica');

-- ----------------------------
-- Table structure for tipo_vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `tipo_vehiculo`;
CREATE TABLE `tipo_vehiculo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_vehiculo
-- ----------------------------
INSERT INTO `tipo_vehiculo` VALUES ('1', 'Automovil');
INSERT INTO `tipo_vehiculo` VALUES ('2', 'Camioneta');
INSERT INTO `tipo_vehiculo` VALUES ('3', 'Camión');
INSERT INTO `tipo_vehiculo` VALUES ('4', 'Motocicleta');
INSERT INTO `tipo_vehiculo` VALUES ('5', 'Otros');

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
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'joel', '$2y$10$v/zyWpv/ZiUFsz7NVhrgVOV7TvZ2wY7zJ66SfIHA/6sFNbpevmUHG', '2', '3123123123123', 'joel', '2016-09-17 08:09:03', '2016-09-17 08:09:03');
INSERT INTO `usuario` VALUES ('2', 'willy', '$2y$10$BWr7gd34uQ.26K7yzWWP3OR/QBDhRWZYehSiOUJBvp380ok6xmTeC', '3', '123123123123', 'will', '2016-09-17 08:09:26', '2016-09-17 08:09:26');
INSERT INTO `usuario` VALUES ('3', 'magariños', '$2y$10$YAwYdPzWTMfyc261rlLSEeGatjleiVHxF/JExJ2b0t3EaPpbvB9Ma', '2', '1234512314', 'magariño', '2016-09-17 08:21:37', '2016-09-17 08:21:37');

-- ----------------------------
-- Table structure for vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `id_modelo` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `serie` varchar(255) DEFAULT NULL,
  `detalles` varchar(450) DEFAULT NULL,
  `liberado` int(11) DEFAULT '0',
  `ubicacion` int(11) DEFAULT '0' COMMENT 'ubicacion 0=libre 1= el mesquite 2= gruas ralf, 3=el complejo',
  `adeudo` double NOT NULL,
  `placas` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_vehiculo`),
  KEY `fk_vehi1` (`id_modelo`) USING BTREE,
  KEY `fk_vehi2` (`id_tipo`) USING BTREE,
  KEY `fk_vehi3` (`id_estado`) USING BTREE,
  CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_modelo`) REFERENCES `modelo_vehiculo` (`id_modelo`) ON UPDATE CASCADE,
  CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_vehiculo` (`id_tipo`) ON UPDATE CASCADE,
  CONSTRAINT `vehiculo_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vehiculo
-- ----------------------------
INSERT INTO `vehiculo` VALUES ('1', '3', '1', '8', null, 'color azul, rin deportivo,cristales polarizados', '0', '1', '0', 'FFF-00-00');
INSERT INTO `vehiculo` VALUES ('2', '4', '2', '8', null, 'Color rojo con negro, golpe en el parachoques delantero', '0', '0', '0', 'FFF-08-10');
INSERT INTO `vehiculo` VALUES ('3', '5', '1', '14', null, 'Vehiculo color tinto, 4 pueras', '1', '2', '999.5', 'fff-14-12');
INSERT INTO `vehiculo` VALUES ('4', '6', '1', '8', null, 'color blanco , 4 puertas', '1', '2', '780', 'fff-12-12');
INSERT INTO `vehiculo` VALUES ('5', '7', '1', '8', null, 'Color Blanco, Cristales polarizados', '1', '1', '220', 'fff-23-09');
