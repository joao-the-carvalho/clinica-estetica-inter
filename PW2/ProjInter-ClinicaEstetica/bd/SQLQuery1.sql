CREATE TABLE Cliente ( 
id_cliente INT PRIMARY KEY NOT NULL, 
nome VARCHAR (100) NOT NULL, 
cpf VARCHAR (14) NOT NULL UNIQUE,
data_nascimento DATE
)

CREATE TABLE Agendamento ( 
id_agendamento INT PRIMARY KEY NOT NULL, 
id_pagamento INT NOT NULL, 
id_cliente INT NOT NULL, 
data_agend DATE,
hora time,
status_agend varchar(20), 
id_funcionario INT NOT NULL, 
id_servico INT NOT NULL,
)

CREATE TABLE Funcionario ( 
id_funcionario INT PRIMARY KEY NOT NULL, 
nome VARCHAR (100) NOT NULL, 
cpf VARCHAR (14) NOT NULL UNIQUE,
funcao varchar(30)
)

CREATE TABLE Servico ( 
id_servico INT PRIMARY KEY NOT NULL, 
nome_servico VARCHAR (50) NOT NULL,
descricao varchar(100),
duracao time,
valor float,
id_sala int
)

CREATE TABLE Unidade ( 
num_unidade INT PRIMARY KEY NOT NULL, 
nome VARCHAR (100) NOT NULL, 
endereco VARCHAR (50) NOT NULL,
telefone varchar(18)
)

CREATE TABLE Sala( 
id_sala INT PRIMARY KEY NOT NULL, 
num_sala int NOT NULL, 
ocupacao int NOT NULL,
num_unidade int
)

CREATE TABLE Pagamento ( 
id_pagamento INT PRIMARY KEY NOT NULL, 
forma_pagamento INT NOT NULL, 
valor_total float NOT NULL,
data_pagamento date,
status_pag varchar(20)
)

CREATE TABLE FormaPagamento ( 
id_forma INT PRIMARY KEY NOT NULL, 
tipo varchar(10) NOT NULL
)

CREATE TABLE Cartao ( 
id_forma int,
numero INT NOT NULL, 
codSeg int NOT NULL,
validade date,
id_cartao INT PRIMARY KEY NOT NULL
)

CREATE TABLE Pix ( 
id_forma int,
QRCode varchar(256),
id_pix INT PRIMARY KEY NOT NULL
)

CREATE TABLE Endereco ( 
id_endereco INT PRIMARY KEY NOT NULL,
estado varchar(20),
cidade varchar(32),
bairro varchar(20),
rua varchar(50),
numero int,
id_morador int
)

CREATE TABLE Telefone( 
id_telefone INT PRIMARY KEY NOT NULL, 
n_telefone varchar(18) NOT NULL, 
tipo varchar(15) NOT NULL,
id_dono int
)

CREATE TABLE Email( 
id_email INT PRIMARY KEY NOT NULL, 
email varchar(60) NOT NULL, 
tipo varchar(15) NOT NULL,
id_dono int
)
