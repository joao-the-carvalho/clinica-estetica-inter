-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/10/2025 às 14:56
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

create database clinicaestetica;
use clinicaestetica;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinicaestetica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `ID_agendamento` int(11) NOT NULL,
  `ID_pagamento` int(11) NOT NULL,
  `ID_cliente` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Hora` time NOT NULL,
  `Status` varchar(20) NOT NULL,
  `ID_Funcionario` int(11) NOT NULL,
  `ID_servico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `ID_Cliente` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Data_nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `email`
--

CREATE TABLE `email` (
  `ID_email` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `ID_dono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `ID_endereco` int(11) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  `Cidade` varchar(32) NOT NULL,
  `Bairro` varchar(20) NOT NULL,
  `Rua` varchar(50) NOT NULL,
  `Numero` int(11) NOT NULL,
  `ID_morador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `formapagamento`
--

CREATE TABLE `formapagamento` (
  `ID_forma` int(11) NOT NULL,
  `Tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcao`
--

CREATE TABLE `funcao` (
  `ID_funcao` int(11) NOT NULL,
  `Tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `ID_Funcionario` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `ID_funcao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `ID_pagamento` int(11) NOT NULL,
  `Forma_pagamento` int(11) NOT NULL,
  `Data_pagamento` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sala`
--

CREATE TABLE `sala` (
  `ID_sala` int(11) NOT NULL,
  `Num_sala` int(11) NOT NULL,
  `Capacidade` int(11) NOT NULL,
  `Num_unidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `ID_servico` int(11) NOT NULL,
  `Nome_servico` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `duracao` time NOT NULL,
  `valor` float NOT NULL,
  `ID_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblusuario`
--

CREATE TABLE `tblusuario` (
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `telefone`
--

CREATE TABLE `telefone` (
  `ID_telefone` int(11) NOT NULL,
  `N_Telefone` varchar(18) NOT NULL,
  `Tipo` varchar(15) NOT NULL,
  `ID_dono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade`
--

CREATE TABLE `unidade` (
  `Num_unidade` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Endereco` varchar(50) NOT NULL,
  `Telefone` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`ID_agendamento`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_Cliente`);

--
-- Índices de tabela `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`ID_email`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`ID_endereco`);

--
-- Índices de tabela `formapagamento`
--
ALTER TABLE `formapagamento`
  ADD PRIMARY KEY (`ID_forma`);

--
-- Índices de tabela `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`ID_funcao`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`ID_Funcionario`);

--
-- Índices de tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`ID_pagamento`);

--
-- Índices de tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`ID_sala`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`ID_servico`);

--
-- Índices de tabela `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`ID_telefone`);

--
-- Índices de tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`Num_unidade`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `ID_agendamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `email`
--
ALTER TABLE `email`
  MODIFY `ID_email` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `ID_endereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `formapagamento`
--
ALTER TABLE `formapagamento`
  MODIFY `ID_forma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcao`
--
ALTER TABLE `funcao`
  MODIFY `ID_funcao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `ID_Funcionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `ID_pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `ID_sala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `ID_servico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `telefone`
--
ALTER TABLE `telefone`
  MODIFY `ID_telefone` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `Num_unidade` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;


-- cascade funciona pra, por exemplo, caso o cliente delete sua conta, o endereco, telefone e email colocados em conjunto ao registro do usuario sejam deletados tambem

ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_endereco_cliente`
  FOREIGN KEY (`ID_morador`) REFERENCES `cliente` (`ID_Cliente`)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `telefone`
  ADD CONSTRAINT `fk_telefone_cliente`
  FOREIGN KEY (`ID_dono`) REFERENCES `cliente` (`ID_Cliente`)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `email`
  ADD CONSTRAINT `fk_email_cliente`
  FOREIGN KEY (`ID_dono`) REFERENCES `cliente` (`ID_Cliente`)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `email`
  ADD CONSTRAINT `fk_email_funcionario`
  FOREIGN KEY (`ID_dono`) REFERENCES `funcionario` (`ID_Funcionario`)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pagamento`
  ADD CONSTRAINT `fk_pagamento_forma`
  FOREIGN KEY (`Forma_pagamento`) REFERENCES `formapagamento` (`ID_forma`)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `sala`
  ADD CONSTRAINT `fk_sala_unidade`
  FOREIGN KEY (`Num_unidade`) REFERENCES `unidade` (`Num_unidade`)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `servico`
  ADD CONSTRAINT `fk_servico_sala`
  FOREIGN KEY (`ID_sala`) REFERENCES `sala` (`ID_sala`)
  ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `funcionario`
    ADD CONSTRAINT `fk_funcionario_funcao`
    FOREIGN KEY (`ID_funcao`) REFERENCES `funcao` (`ID_funcao`)
    ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `agendamento`
  ADD CONSTRAINT `fk_agendamento_cliente`
  FOREIGN KEY (`ID_cliente`) REFERENCES `cliente` (`ID_Cliente`)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `agendamento`
  ADD CONSTRAINT `fk_agendamento_funcionario`
  FOREIGN KEY (`ID_Funcionario`) REFERENCES `funcionario` (`ID_Funcionario`)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `agendamento`
  ADD CONSTRAINT `fk_agendamento_servico`
  FOREIGN KEY (`ID_servico`) REFERENCES `servico` (`ID_servico`)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `agendamento`
  ADD CONSTRAINT `fk_agendamento_pagamento`
  FOREIGN KEY (`ID_pagamento`) REFERENCES `pagamento` (`ID_pagamento`)
  ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
