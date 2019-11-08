DELIMITER $$
CREATE DEFINER=`batallanaval`@`localhost` 
PROCEDURE `nueva_partida`(
    IN `tam` ENUM("min","med","max"), 
    IN `nom` VARCHAR(20)
)
BEGIN
	DECLARE tamanio1 enum("min","med","max");
    DECLARE nombre1 varchar(20);
    SET tamanio1=tam;
    SET nombre1=nom;
	INSERT into partida(tamanio,nombre) VALUES (tamanio1,nombre1);
	SELECT LAST_INSERT_ID();
END$$
DELIMITER ;

/*Creación de Barcos y devolución de ID*/

DELIMITER $$
CREATE DEFINER=`batallanaval`@`localhost` 
PROCEDURE `nuevo_barco`(
	IN `tipo` enum("acorazado","destructor","escolta","submarino")
)
BEGIN
	DECLARE `tipo_` enum("acorazado","destructor","escolta","submarino")
    SET tipo_=tipo;
	INSERT into barco(tipo) VALUES (tipo_);
	SELECT LAST_INSERT_ID();
END$$
DELIMITER ;

