

create user "batallanaval"@"localhost" identified by "batallanaval";
grant insert,select,update,delete,create routine, alter routine, execute on batallanaval.* to "batallanaval"@"localhost";

create schema batallanaval;
use batallanaval;

create table usuario(
 ID int(8) unsigned unique not null primary key,
 apodo varchar(15) not null,
 fecha_reg timestamp not null default current_timestamp,
 fecha_nac date not null,
 nombre varchar(30) not null,
 apellido varchar(30) not null
 );
 
create table partida(
 ID int(9) unsigned unique not null auto_increment primary key,
 tamanio enum("min","med","max") not null default "med",
 estado enum("abierta","activa","cerrada") not null default "abierta",
 fecha_creacion timestamp not null default current_timestamp,
 nombre varchar(20)
 );
 
create table barco(
 ID int(9) unsigned unique not null auto_increment primary key,
 tipo enum("acorazado","destructor","escolta","submarino") not null,
 estado enum("ok","hundido") default "ok"
 );

create table celda(
 ID int(9) unsigned unique not null auto_increment primary key,
 alcanzada enum("si","no") default "no",
 nombre varchar(4) not null
 );
 
create table crea(
 usuario_ID int(8) unsigned not null,
 partida_ID int(9) unsigned not null unique primary key
 );
 
create table participa(
 usuario_ID int(8) unsigned not null,
 partida_ID int(9) unsigned not null unique primary key
 );
 
create table ubica(
 usuario_ID int(8) unsigned not null,
 barco_ID int(9) unsigned not null unique primary key
 );
 
create table tiene(
 partida_ID int(9) unsigned not null,
 barco_ID int(9) unsigned not null unique primary key
 );
 
create table formado_por(
 barco_ID int(9) unsigned not null,
 celda_ID int(9) unsigned not null unique primary key
); 
 
alter table crea
add constraint fk_usuario_crea
foreign key (usuario_ID)
references usuario(ID)
on update cascade
on delete cascade;

alter table crea
add constraint fk_crea_partida
foreign key (partida_ID)
references partida(ID)
on update cascade
on delete cascade;

alter table participa
add constraint fk_usuario_participa
foreign key (usuario_ID)
references usuario(ID)
on update cascade
on delete cascade;

alter table participa
add constraint fk_participa_partida
foreign key (partida_ID)
references partida(ID)
on update cascade
on delete cascade;

alter table tiene
add constraint fk_partida_tiene
foreign key (partida_ID)
references partida(ID)
on update cascade
on delete cascade;

alter table tiene
add constraint fk_tiene_barco
foreign key (barco_ID)
references barco(ID)
on update cascade
on delete cascade;

alter table formado_por
add constraint fk_barco_formado_por
foreign key (barco_ID)
references barco(ID)
on update cascade
on delete cascade;

alter table formado_por
add constraint fk_formado_por_celda
foreign key (celda_ID)
references celda(ID)
on update cascade
on delete cascade;

alter table ubica
add constraint fk_usuario_ubica
foreign key (usuario_ID)
references usuario(ID)
on update cascade
on delete cascade;

alter table ubica
add constraint fk_ubica_barco
foreign key (barco_ID)
references barco(ID)
on update cascade
on delete cascade;