-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Jul-2017 às 03:59
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topresente`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `aula_id` varchar(255) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `aula_num` int(11) NOT NULL,
  `tempo_inicio` datetime NOT NULL,
  `tempo_fim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`aula_id`, `turma_id`, `aula_num`, `tempo_inicio`, `tempo_fim`) VALUES
('$2y$10$D5zqvAbfqi6pH8Qbi2O8oeMo6nazucYbTMS4P.diw/jEJVL/.z.bG', 1, 6, '2017-07-04 08:00:00', '2017-07-04 12:00:00'),
('$2y$10$QaOUFuk.aULgIZ8vm05cwefWQZqIix7MPULlI9Abc1JhKO3MdHVIO', 1, 5, '2017-07-03 09:00:00', '2017-07-03 10:00:00'),
('abc123', 1, 1, '2017-06-30 16:00:00', '2017-06-30 22:00:00'),
('abc321', 1, 4, '2017-07-02 10:00:00', '2017-07-02 12:00:00'),
('abc456', 1, 2, '2017-06-30 08:00:00', '2017-06-30 23:00:00'),
('abc789', 1, 3, '2017-06-30 22:00:00', '2017-07-01 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `inst_id` int(11) NOT NULL,
  `inst_nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `instituicao`
--

INSERT INTO `instituicao` (`inst_id`, `inst_nome`) VALUES
(1, 'UFC - Universidade Federal do Ceará');

-- --------------------------------------------------------

--
-- Estrutura da tabela `presencas`
--

CREATE TABLE `presencas` (
  `presenca_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `presenca_vetor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `presencas`
--

INSERT INTO `presencas` (`presenca_id`, `turma_id`, `user_id`, `presenca_vetor`) VALUES
(12, 1, 2, 'a:6:{i:0;i:1;i:1;i:1;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:0;}'),
(13, 1, 3, 'a:6:{i:0;i:1;i:1;i:1;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:0;}'),
(14, 1, 4, 'a:6:{i:0;i:1;i:1;i:1;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:0;}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `turma_id` int(11) NOT NULL,
  `turma_cod` varchar(50) NOT NULL,
  `turma_nome` varchar(255) NOT NULL,
  `inst_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `num_aulas` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`turma_id`, `turma_cod`, `turma_nome`, `inst_id`, `user_id`, `num_aulas`) VALUES
(1, 'CK123', 'Arquitetura de Computadores', 1, 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `user_type` int(11) NOT NULL,
  `inst_id` int(11) NOT NULL,
  `user_mat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`, `user_type`, `inst_id`, `user_mat`) VALUES
(1, 'João Professor Primeiro', '$2y$10$v0M2rIltd/012Fn3s/9wQ.gv7rpjlsFfTWYNiylkO3WPJrWC0dERu', 'joao@joao.com', 1, 1, ' '),
(2, 'Thiago Nobrega', '$2y$10$zjWTFqBLSVbWU4/GXhAR8unpgGyf7mSH7w8kV3uVLkoD/fP3Gs3vS', 'thiago@thiago.com', 2, 1, ' 368405'),
(3, 'Pedro Joao', '$2y$10$/8yFIXaYKhOxBUyK7lNfQecylziI2zaIkZrIZ9lj1A/hKE99V0/DS', 'pedro@pedro.com', 2, 1, ' 124578'),
(4, 'Priscila Alcantara', '$2y$10$TTdw19FQmoqxo/O35shK9.DS9ry0W7Fq743DK9nq3x4i3.T45/kQa', 'priscila@priscila.com', 2, 1, '668951 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`aula_id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Indexes for table `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`inst_id`);

--
-- Indexes for table `presencas`
--
ALTER TABLE `presencas`
  ADD PRIMARY KEY (`presenca_id`),
  ADD KEY `turma_id` (`turma_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`turma_id`),
  ADD KEY `inst_id` (`inst_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `inst_id` (`inst_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `inst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `presencas`
--
ALTER TABLE `presencas`
  MODIFY `presenca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `turma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `aulas_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`turma_id`);

--
-- Limitadores para a tabela `presencas`
--
ALTER TABLE `presencas`
  ADD CONSTRAINT `presencas_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`turma_id`),
  ADD CONSTRAINT `presencas_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`inst_id`) REFERENCES `instituicao` (`inst_id`),
  ADD CONSTRAINT `turmas_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`inst_id`) REFERENCES `instituicao` (`inst_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
