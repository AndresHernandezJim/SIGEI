use sicoi;
insert into pais VALUES(1,'México');
insert into estado values(1,1,'Aguascalientes'),(2,1,'Baja California'),(3,1,'Baja California Sur'),(4,1,'Campeche'),(5,1,'Chiapas'),
(6,1,'Chihuahua'),(7,1,'Coahuila de Zaragoza'),(8,1,'Colima'),(9,1,'Durango'),(10,1,'Estado de México'),(11,1,'Guanajuato'),
(12,1,'Guerrero'),(13,1,'Hidalgo'),(14,1,'Jalisco'),(15,1,'Michoacán de Ocampo'),(16,1,'Morelos'),(17,1,'Nayarit'),(18,1,'Nuevo León'),
(19,1,'Oaxaca'),(20,1,'Puebla'),(21,1,'Querétaro'),(22,1,'Quintana Roo'),(23,1,'San Luis Potosí'),(24,1,'Sinaloa'),(25,1,'Sonora'),
(26,1,'Tabasco'),(27,1,'Tamaulipas'),(28,1,'Tlaxcala'),(29,1,'Veracruz'),(30,1,'Yucatán'),(31,1,'Zacatecas');
insert into municipio values(1,1,'Armería'),(2,1,'Colima'),(3,1,'Comala'),(4,1,'Coquimatlán'),(5,1,'Cuauhtémoc'),(6,1,'Ixtlahuacán'),(7,1,'Manzanillo'),(8,1,'Minatitlán'),(9,1,'Tecomán'),(10,1,'Villa de Álvarez');
insert into localidad values (1,3,'Comala'),(2,3,'Cofradía de Suchitlán'),(3,3,'Suchitlán'),(4,3,'Zacualpan');

INSERT INTO `tipo_aviso` VALUES ('1', 'Via 066');
INSERT INTO `tipo_aviso` VALUES ('2', 'Local');
INSERT INTO `tipo_aviso` VALUES ('3', 'Institucional');
insert into tipo_reporte values(1,'Seguridad Publica'),(2,'Vialidad');
INSERT INTO `emergencia` VALUES ('1', 'Ingreso a Barandilla', '1');
INSERT INTO `lugar` VALUES ('1', '1', 'Capitan A. LLerenas s/n colona La Trinidad', '0', '0');
INSERT INTO `privilegio` VALUES ('1', 'Administrador');
INSERT INTO `privilegio` VALUES ('2', 'Policia');
INSERT INTO `privilegio` VALUES ('3', 'Prevención');
INSERT INTO `privilegio` VALUES ('4', 'usuario');