/*Creación de partida,asignación a usuario y devolución de ID de la misma*/

DELIMITER $$
CREATE DEFINER='batallanaval'@'localhost' 
PROCEDURE nueva_partida(
    IN tam ENUM("min","med","max"), 
    IN nom VARCHAR(20),
	IN id_usuario int unsigned
)
BEGIN
	DECLARE tamP enum("min","med","max");
    DECLARE nomP varchar(20);
	DECLARE idU int unsigned;
	DECLARE idP int unsigned;
    SET tamP=tam;
    SET nomP=nom;
	SET idU = id_usuario;
	INSERT into partida(tamanio,nombre) VALUES (tamP,nomP);
	SET idP = LAST_INSERT_ID();
	INSERT into batallanaval.crea(usuario_ID,partida_ID) values (idU,idP);
	SELECT idP;
END$$
DELIMITER ;

/*Creación de Barcos y devolución de ID del mismo*/

DELIMITER $$
CREATE DEFINER=`batallanaval`@`localhost` 
PROCEDURE `nuevo_barco`(
	IN `tipo` ENUM("acorazado","destructor","escolta","submarino"), 
	OUT `id_barco` INT UNSIGNED
)
BEGIN
	DECLARE tipoB enum("acorazado","destructor","escolta","submarino");
    SET tipoB=tipo;
	INSERT into barco(tipo) VALUES (tipoB);
	SET id_barco = LAST_INSERT_ID();
END$$
DELIMITER ;

/*Asignación de un barco a un usuario y a una partida, y obtener Id del mismo*/

DELIMITER $$
CREATE DEFINER=`batallanaval`@`localhost` 
PROCEDURE `crear_y_asignar_barco`(
	IN tipo enum("acorazado","destructor","escolta","submarino"),
	IN id_usuario int unsigned,
	IN id_partida int unsigned
)
BEGIN
	DECLARE tipoB enum("acorazado","destructor","escolta","submarino");
	DECLARE idB int unsigned;
	DECLARE idU int unsigned;
	DECLARE idP int unsigned;
	SET tipoB=tipo;
    CALL nuevo_barco(tipoB,@a);
	SET idB = @a;
	SET idU = id_usuario;
	SET idP = id_partida;
	INSERT into batallanaval.ubica(usuario_ID,barco_ID) values (idU,idB);
	INSERT into batallanaval.tiene(partida_ID,barco_ID) values (idP,idB);
	SELECT idB;
END$$
DELIMITER ;

/*Creación de Celda y devolución de ID de la misma */

DELIMITER $$
CREATE DEFINER=`batallanaval`@`localhost` 
PROCEDURE `nueva_celda`(
	IN `nombre` VARCHAR(4), 
	OUT `id_celda` INT UNSIGNED
)
BEGIN
DECLARE nomC varchar(4);
    SET nomC = nombre;
INSERT into celda(nombre) VALUES (nomC);
SET id_celda = LAST_INSERT_ID();
END$$
DELIMITER ;


/* Asignación de una celda a un barco */

DELIMITER $$
CREATE DEFINER=`batallanaval`@`localhost` 
PROCEDURE `crear_y_asignar_celda_a_barco`(
	IN `id_barco` INT UNSIGNED, 
	IN `celda` VARCHAR(4)
)
BEGIN
DECLARE idB int unsigned;
DECLARE idC int unsigned;
DECLARE nomC varchar(4);
SET idB = id_barco;
SET nomC = celda;
CALL nueva_celda(nomC,@a);
SET idC = @a;
INSERT into batallanaval.formado_por(barco_ID,celda_ID) values (idB,idC);
END$$
DELIMITER ;

