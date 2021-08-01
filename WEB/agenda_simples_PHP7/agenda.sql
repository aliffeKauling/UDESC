
create database agenda;
use agenda;

create table agenda (
	coda serial,
	nome varchar(50) not null,
	telefone varchar(18) not null,
	email varchar(40) not null,
	primary key (coda));

