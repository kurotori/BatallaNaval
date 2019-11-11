BEGIN
	DECLARE tamanio1 enum("min","med","max");
    DECLARE nombre1 varchar(20);
    SET tamanio1=tam;
    SET nombre1=nom;
	INSERT into partida(tamanio,nombre) VALUES (tamanio1,nombre1);
	SELECT LAST_INSERT_ID();
END


/*Creación de partida,asignación a usuario y devolución de ID de la misma*/

DELIMITER $$
CREATE DEFINER='batallanaval'@'localhost' 
PROCEDURE nueva_partida(
    IN tam ENUM("min","med","max"), 
    IN nom VARCHAR(20),
	IN id_usuario int unsigned,
	OUT id_partida int unsigned
)
BEGIN
	DECLARE tamanio1 enum("min","med","max");
    DECLARE nombre1 varchar(20);
	DECLARE idU int unsigned;
	DECLARE idP int unsigned;
    SET tamanio1=tam;
    SET nombre1=nom;
	INSERT into partida(tamanio,nombre) VALUES (tamanio1,nombre1);
	SET idP = SELECT LAST_INSERT_ID();
	SET id_partida = idP;
	INSERT into batallanaval.crea(usuario_ID,partida_ID) values (idU,idP);
END$$
DELIMITER ;

/* Asignación de partida a Usuario */

DELIMITER $$
CREATE DEFINER='batallanaval'@'localhost' 
PROCEDURE asignar_partida(
    IN num_partida int unsigned, 
    IN id_usuario int unsigned
)
BEGIN
	DECLARE numP int unsigned;
    DECLARE idU int unsigned;
    SET numP = num_partida;
    SET idU = id_usuario;
	INSERT into crea(usuario_ID,partida_ID) VALUES (idU,numP);
END$$
DELIMITER ;


/*Creación de Barcos y devolución de ID del mismo*/

DELIMITER $$
CREATE DEFINER='batallanaval'@'localhost' 
PROCEDURE 'nuevo_barco'(
	IN tipo enum("acorazado","destructor","escolta","submarino")
)
BEGIN
	DECLARE tipo_ enum("acorazado","destructor","escolta","submarino")
    SET tipo_=tipo;
	INSERT into barco(tipo) VALUES (tipo_);
	SELECT LAST_INSERT_ID();
END$$
DELIMITER ;

/*Asignación de un barco a un usuario y a una partida*/

DELIMITER $$
CREATE DEFINER='batallanaval'@'localhost' 
PROCEDURE asignar_barco(
	IN id_barco int unsigned,
	IN id_usuario int unsigned,
	IN id_partida int unsigned
)
BEGIN
	DECLARE idB int unsigned;
	DECLARE idU int unsigned;
	DECLARE idP int unsigned;
    SET idB = id_barco;
	SET idU = id_usuario;
	SET idP = id_partida;
	INSERT into batallanaval.ubica(usuario_ID,barco_ID) values (idU,idB);
	INSERT into batallanaval.tiene(partida_ID,barco_ID) values (idP,idB);
END$$
DELIMITER ;

/*Creación de Celda y devolución de ID de la misma */

DELIMITER $$
CREATE DEFINER='batallanaval'@'localhost' 
PROCEDURE nueva_celda(
	IN nombre varchar(4)
)
BEGIN
	DECLARE nomC varchar(4);
    SET nomC = nombre;
	INSERT into celda(nombre) VALUES (nomC);
	SELECT LAST_INSERT_ID();
END$$
DELIMITER ;


/* Asignación de una celda a un barco */

DELIMITER $$
CREATE DEFINER='batallanaval'@'localhost' 
PROCEDURE asignar_celda_a_barco(
	IN id_barco int unsigned,
	IN id_celda int unsigned
)
BEGIN
	DECLARE idB int unsigned;
	DECLARE idC int unsigned;
    SET idB = id_barco;
	SET idC = id_celda;
	INSERT into batallanaval.formado_por(barco_ID,celda_ID) values (idB,idC);
END$$
DELIMITER ;

