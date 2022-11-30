DROP DATABASE ejercicios;
SET NAMES UTF8;
CREATE DATABASE  IF NOT EXISTS ejercicios;

USE ejercicios;

#
# Estructura tabla 'rutas'
#

DROP TABLE IF EXISTS rutas;
CREATE TABLE IF NOT EXISTS rutas (
  id int(11) NOT NULL auto_increment,
  titulo varchar(55) NOT NULL DEFAULT '' ,
  descripcion BLOB ,
  desnivel int(6) UNSIGNED NOT NULL DEFAULT '0' ,
  distancia double NOT NULL DEFAULT '0' ,
  notas blob,
  dificultad tinyint(1) unsigned NOT NULL DEFAULT '0' ,
  PRIMARY KEY (id),
  KEY titulo (titulo)
) CHARACTER SET utf8 COLLATE utf8_general_ci;


#
# Datos tabla'notas'
#
INSERT INTO rutas VALUES("1","Cuerda Larga: puerto Navacerrada a Puerto la Morcuera","Cuerda Larga Desde el Puerto de Navacerrada al Puerto de la Morcuera, con sus 9 cumbres superiores a 2000 m.","1000","20.64","Las Monta�as o Cumbres que conforman la Cuerda Larga ordenados de Oeste a Este son:
- Bola del Mundo 2.258 m
- Alto de Valdemartin, 2.283 m
- Cabeza de Hierro Menor, 2.376 m
- Cabeza de Hierro Mayor, 2.382 m
- Loma del Pandasco, 2.244 m
- Navahondilla, 2.234 m
- Asomate de Hoyos, 2.242 m
- Bailanderos, 2.133 m
- La Najarra, 2.120 m","2");
INSERT INTO rutas VALUES("2","De Barcelona a Valldoreix por Collserola","Ruta en bicicleta de monta�a que cruza Collserola, sale de Barcelona por la carretera de Cerdanyola y nos deja en la estaci�n de los FGC de Valldoreix","277","20.85","Estupenda ruta para empezar.","1");
INSERT INTO rutas VALUES("3","Los 4 puentes. ","Manzaneros. �vila","538","43.29","Dehesa del Pinar (Dehesa \"de los perrillos\"), camino paralelo a la v�a del tren, Castro de las Cogotas, Arco de Conejeros, Carde�osa (1� puente), encinar (2�, 3� y 4� puente), La Alamedilla, Las porteras, Martiherrero, Dehesa de San Mateo, �vila.","2");


#
# Estructura Tabla 'rutas_comentarios'
#

DROP TABLE IF EXISTS rutas_comentarios;
CREATE TABLE IF NOT EXISTS rutas_comentarios (
  id tinyint(4) NOT NULL auto_increment,
  id_ruta int(11) NOT NULL DEFAULT '0' ,
  nombre varchar(50) NOT NULL DEFAULT '' ,
  texto BLOB NOT NULL DEFAULT '' ,
  fecha date NOT NULL DEFAULT '0000-00-00' ,
  PRIMARY KEY (id),
  FOREIGN KEY id_ruta (id_ruta) ON DELETE CASCADE
) CHARACTER SET utf8 COLLATE utf8_general_ci;


#
# Datos tabla 'rutas_comentarios'
#
INSERT INTO rutas_comentarios VALUES("1","1","Pedro","�Me ha encantado la ruta!","2014-06-23");
INSERT INTO rutas_comentarios VALUES("2","2","Irene","Gracias por la informaci�n.","2014-06-23");