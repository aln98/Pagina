/*CRACION DE DB*/
CREATE DATABASE `u777104429_bas` /*!40100 DEFAULT CHARACTER SET latin1 */;
/*USUARIO--->    u777104429_root
 PASS----> 123456
*/

/*CREACION DE TABLAS*/
/*REPUESTOS*/
CREATE TABLE u777104429_bas.repuestos (
  `RepuestoId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico de repuesto auto incremental',
  `Nombre` varchar(100) NOT NULL COMMENT 'nombre descriptivo del repuesto',
  `Marca` varchar(100) DEFAULT NULL COMMENT 'marca del fabricante',
  `Modelo` varchar(100) DEFAULT NULL COMMENT 'modelo de la marca del fabricante',
  `Cantidad` int(11) DEFAULT NULL COMMENT 'Existencias (stock)',
  `Oferta` tinyint(4) NOT NULL COMMENT 'Indica si el producto se vera en la seccion "Ofertas del Mes"',
  `Imagen` varchar(255) DEFAULT NULL COMMENT 'Imagen ilustrativa del articulo',
  `LinkDePago` varchar(500) DEFAULT NULL COMMENT 'Direccion URL de pago (boton de pago de mercado libre)',
  `PrecioDeVenta` double DEFAULT NULL COMMENT 'Valor en pesos del articulo',
  PRIMARY KEY (`RepuestoId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Repuestos de autopartes recuperadas';


/*USUARIOS*/
CREATE TABLE u777104429_bas.usuarios (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*INSERT DEL USUARIO ADMINISTRADOR*/
INSERT INTO u777104429_bas.usuarios
(`nombre`,
`password`)
VALUES
('basadmin',123456);



