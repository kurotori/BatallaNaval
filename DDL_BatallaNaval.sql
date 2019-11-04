create schema batallanaval;
use batallanaval;

create table usuario(
 ID int(8) unique not null primary key,
 apodo varchar(15) not null,
 fecha_reg timestamp not null default current_timestamp,
 fecha_nac date not null,
 nombre varchar(30) not null,
 apellido varchar(30) not null
 );
 
create table partida(
 ID int(9) unique not null auto_increment primary key,
 tamanio enum("min","med","max") not null default "med",
 estado enum("abierta","activa","cerrada") not null default "abierta",
 fecha_creacion timestamp not null default current_timestamp,
 nombre varchar(20)
 );
 
create table barco(
 ID int(9) unique not null auto_increment primary key,
 tipo enum("acorazado","destructor","escolta","submarino") not null,
 estado enum("ok","hundido") default "ok"
 );


 
 