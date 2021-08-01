
create database hotelaria;
use hotelaria;

CREATE TABLE Administrador
(
  id_admin serial primary key,
  nome character varying(50)
);


CREATE TABLE Dormitorio
(
  Id_Hospedagem serial primary key,
  Situacao varchar(10) not null,
  Preco numeric not null,
  Descricao varchar(40),
  nr_de_camas numeric
 );


CREATE TABLE Recepcionista
(
  Codigo_f numeric primary key,
  nome character varying(50),
  turno character varying(10)
);


CREATE TABLE Hospede
(
  CPF char(11) primary key,
  nome character varying(50),
  idade integer,
  endereco character varying(500),
  email character varying(25),
  telefone numeric(13)
);


CREATE TABLE Acompanhante
(
    HAcompanhantes serial primary key,
    nome character varying(50),
	CPF_Hospede char,
	foreign key (CPF_Hospede) references Hospede (CPF)
	ON UPDATE CASCADE ON DELETE SET NULL 
);


CREATE TABLE Check_out
(
  id_checko serial primary key,
  valor_diaria numeric not null,
  valor_Total numeric not null,
  codigo_r numeric,
	foreign key (codigo_r) references Reserva (codigo_r)
);


CREATE TABLE Reserva
(
  codigo_r serial primary key,
  status varchar(10) not null,
  desconto numeric,
  nr_de_quartos numeric,
  Codigo_f numeric,
  CPF_Hospede char,
	  foreign key (CPF_Hospede) 
      references Hospede (CPF),
	  
          FOREIGN KEY (Codigo_f)
      REFERENCES Recepcionista (Codigo_f)
);


CREATE TABLE Reserva_dia
(
	codigo_r_r serial,
	Id_Hospedagem serial,
	valor numeric not null,
	Data_ini date not null,
	Data_fim date not null,
	foreign key (Id_Hospedagem) references Dormitorio (Id_Hospedagem)
	ON UPDATE CASCADE ON DELETE RESTRICT,
	foreign key (codigo_r_r) references Reserva (codigo_r)
);


CREATE TABLE Pagamento_diaria
(
    id_pagamento_dia serial primary key,
	quantidade_de_diarias numeric,
	codigo_r NUMERIC,
	CPF_Hospede char,
	foreign key (CPF_Hospede) references Hospede (CPF),
	foreign key (codigo_r) references Reserva (codigo_r)
);




CREATE TABLE Item_frigobar
(
  Id_Item serial primary key,
  nome character varying(50),
  valor numeric
);


CREATE TABLE Frigobar
(
	Id_frigobar numeric Primary Key,
	Id_Hospedagem serial,
	foreign key (Id_Hospedagem) references Dormitorio (Id_Hospedagem)
	ON UPDATE CASCADE ON DELETE RESTRICT
);


CREATE TABLE Consumo
(
	Codigo_r numeric,
	Id_item serial,
	foreign key (Id_item) references Item_frigobar (Id_item),
	foreign key (codigo_r) references Reserva (codigo_r)
);


CREATE TABLE Armazenamento
(
	Id_frigobar numeric,
	Id_item serial,
	foreign key (Id_item) references Item_frigobar (Id_item),
	foreign key (Id_frigobar) references Frigobar (Id_frigobar)
);
 
 
CREATE TABLE Quarto_Casal
(
  Id_Hospedagem serial,
  nr_banheiros numeric,
  foreign key (Id_Hospedagem) references Dormitorio (Id_Hospedagem)
  ON UPDATE CASCADE ON DELETE RESTRICT
 );
 
 
 CREATE TABLE Quarto_Compartilhado
(
  Id_Hospedagem serial,
  Tipo_de_cama character varying(20),
  Tipo_de_Acomodacao character varying(20),
  foreign key (Id_Hospedagem) references Dormitorio (Id_Hospedagem)
  ON UPDATE CASCADE ON DELETE RESTRICT
 );

