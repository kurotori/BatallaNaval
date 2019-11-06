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