-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Mar-2017 às 14:53
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vocacional`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
`id` int(3) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `atributos` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` int(3) NOT NULL,
  `likes` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `atributos`, `id_usuario`, `likes`) VALUES
(64, 'Filosofia', ' humanas   fora   individual   com_cliente   calmo  ', 1, 0),
(85, 'Biomedicina', ' biologicas   fora   grupo   com_cliente   calmo  ', 1, 1),
(84, 'EducaÃ§Ã£o FÃ­sica', ' biologicas   fora   grupo   com_cliente   agitado  ', 1, 0),
(95, 'Curso Importador Profissional', ' humanas  casa  individual  sem_cliente  calmo ', 1, 0),
(80, 'Direito', ' humanas   fora   individual   com_cliente   calmo  ', 1, 1),
(81, 'CiÃªncia PolÃ­tica', ' humanas   fora   individual   sem_cliente   calmo  ', 1, 0),
(97, 'Designer de Games', ' humanas  casa  grupo  sem_cliente  calmo ', 1, 1),
(83, 'AdministraÃ§Ã£o', ' humanas   escritorio   grupo   sem_cliente   calmo  ', 1, 0),
(94, 'Design grÃ¡fico', ' humanas   casa   individual   sem_cliente   calmo  ', 1, 0),
(93, 'Cinema', ' humanas  fora  grupo  sem_cliente  agitado ', 1, 0),
(99, 'MatemÃ¡tica (bacharel)', ' exatas   casa   individual   com_cliente   calmo  ', 1, 2),
(91, 'Arqueologia', ' humanas  fora  grupo  sem_cliente  calmo ', 1, 0),
(89, 'CiÃªncia da ComputaÃ§Ã£o', ' exatas   fora   grupo   sem_cliente   calmo  ', 1, 1),
(88, 'Astronomia', ' exatas  fora  grupo  sem_cliente  calmo ', 1, 0),
(87, 'Medicina', ' biologicas  fora  grupo  com_cliente  agitado ', 1, 1),
(86, 'Fisioterapia', ' biologicas  fora  grupo  com_cliente  calmo ', 1, 0),
(78, 'Jornalismo', ' humanas  escritorio  grupo  sem_cliente  agitado ', 1, 2),
(77, 'EstatÃ­stica', ' exatas   fora   grupo   sem_cliente   calmo  ', 1, 0),
(74, 'Letras', ' humanas   fora   individual   com_cliente   agitado  ', 1, 1),
(75, 'HistÃ³ria do Brasil e do mundo', ' humanas   fora   individual   com_cliente   agitado  ', 1, 0),
(76, 'Geografia do Brasil e do mundo', ' humanas   fora   grupo   com_cliente   agitado  ', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(3) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `perfil` int(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `perfil`) VALUES
(1, 'Vinicius Tozo', 'vinicius.tozo@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(30, 'Nome', 'email@email', 'e8d95a51f3af4a3b134bf6bb680a213a', 2),
(4, 'Adrian', 'adrianhoinaski@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2),
(27, 'Gaby', 'gabriela.forgiveme@gmail.com', '5ae136d9363e8b0e0b57018f800bd255', 2),
(26, 'Sarah Jullie', 'sarah.jullie@gmail.com', 'd03fc8bf8fdb69ccf36d91327e536c67', 2),
(24, 'Cezar', 'cezarjenzura@gmail.com', '9ef20ec6832a9c4adfb35c2ae1d86f85', 2),
(31, 'Administrador', 'adm@gmail.com', '80177534a0c99a7e3645b52f2027a48b', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
