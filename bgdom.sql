-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 авг 2019 в 12:34
-- Версия на сървъра: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bgdom`
--

-- --------------------------------------------------------

--
-- Структура на таблица `appnumbers`
--

CREATE TABLE `appnumbers` (
  `id` int(11) NOT NULL,
  `appnumber` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `appnumbers`
--

INSERT INTO `appnumbers` (`id`, `appnumber`) VALUES
(1, 'Aпартамент 1'),
(2, 'Апартамент 2'),
(3, 'Aпартамент 3'),
(4, 'Aпартамент 4'),
(5, 'Aпартамент 5'),
(6, 'Aпартамент 6'),
(7, 'Aпартамент 7'),
(8, 'Aпартамент 8'),
(9, 'Aпартамент 9'),
(10, 'Aпартамент 10');

-- --------------------------------------------------------

--
-- Структура на таблица `blok1`
--

CREATE TABLE `blok1` (
  `id` int(11) NOT NULL,
  `apartnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `olddutys` decimal(5,2) NOT NULL,
  `month` int(5) NOT NULL,
  `lastpayment` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `blok1`
--

INSERT INTO `blok1` (`id`, `apartnum`, `olddutys`, `month`, `lastpayment`) VALUES
(1, 'Апартамент 1', '0.00', 3, '15.20'),
(2, 'Апартамент 2', '14.90', 3, '35.00'),
(3, 'Апартамент 3', '24.20', 3, '15.00'),
(4, 'Апартамент 4', '15.20', 3, '35.00'),
(5, 'Апартамент 5', '0.00', 2, '70.00'),
(6, 'Апартамент 6', '0.00', 3, '35.00'),
(7, 'Апартамент 7', '0.00', 3, '30.00'),
(8, 'Апартамент 8', '0.00', 3, '28.00'),
(9, 'Апартамент 9', '-25.30', 3, '50.00');

-- --------------------------------------------------------

--
-- Структура на таблица `blok1files`
--

CREATE TABLE `blok1files` (
  `id` int(11) NOT NULL,
  `month` int(2) NOT NULL,
  `sum` decimal(5,2) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `blok1files`
--

INSERT INTO `blok1files` (`id`, `month`, `sum`, `name`, `picture`) VALUES
(13, 1, '22.68', 'ремонт врата', 'person2.jpg'),
(14, 1, '22.00', 'фактура вода', '27827.jpg'),
(15, 1, '128.68', 'фактура ток ', 'book.png'),
(23, 1, '52.00', 'ремонт асансьор', '1.jpeg'),
(24, 1, '1.00', 'изипей', 'book.png'),
(25, 2, '83.25', 'фактура ток ', 'butterfly.jpg'),
(26, 2, '15.30', 'фактура вода', 'preview.jpg'),
(27, 2, '12.00', 'ремонт лампи', '3.jpg'),
(28, 3, '28.50', 'фактура ток ', 'leaves.png'),
(29, 3, '53.60', 'фактура ток ', '3.jpg'),
(30, 3, '12.50', 'крушки стълбище', '15270-NQC39N.jpg');

-- --------------------------------------------------------

--
-- Структура на таблица `blok1view`
--

CREATE TABLE `blok1view` (
  `id` int(11) NOT NULL,
  `month` int(5) NOT NULL,
  `availability` decimal(5,2) NOT NULL,
  `monthlyduties` decimal(5,2) NOT NULL,
  `restformonth` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `blok1view`
--

INSERT INTO `blok1view` (`id`, `month`, `availability`, `monthlyduties`, `restformonth`) VALUES
(1, 1, '15.00', '226.36', '-211.36'),
(2, 2, '330.00', '110.55', '219.45'),
(3, 3, '243.20', '94.60', '148.60'),
(4, 4, '0.00', '0.00', '0.00'),
(5, 5, '0.00', '0.00', '0.00'),
(6, 6, '0.00', '0.00', '0.00'),
(7, 7, '0.00', '0.00', '0.00'),
(8, 8, '0.00', '0.00', '0.00'),
(9, 9, '0.00', '0.00', '0.00'),
(10, 10, '0.00', '0.00', '0.00'),
(11, 11, '0.00', '0.00', '0.00'),
(12, 12, '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Структура на таблица `blok2`
--

CREATE TABLE `blok2` (
  `id` int(11) NOT NULL,
  `apartnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `olddutys` decimal(5,2) NOT NULL,
  `month` int(10) NOT NULL,
  `lastpayment` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `blok2`
--

INSERT INTO `blok2` (`id`, `apartnum`, `olddutys`, `month`, `lastpayment`) VALUES
(1, 'Апартамент 1', '11.50', 5, '55.00'),
(2, 'Апартамент 2', '10.50', 5, '55.00'),
(3, 'Апартамент 3', '-9.50', 5, '50.00'),
(4, 'Апартамент 4', '10.50', 5, '50.00'),
(5, 'Апартамент 5', '83.50', 5, '50.00'),
(6, 'Апартамент 6', '25.50', 5, '50.00'),
(7, 'Апартамент 7', '10.50', 5, '50.00'),
(8, 'Апартамент 8', '10.50', 5, '50.00'),
(9, 'Апартамент 9', '35.50', 5, '50.00'),
(10, 'Апартамент 10', '-19.50', 5, '50.00'),
(11, 'Апартамент 11', '10.50', 4, '50.00');

-- --------------------------------------------------------

--
-- Структура на таблица `blok2files`
--

CREATE TABLE `blok2files` (
  `id` int(20) NOT NULL,
  `month` int(10) NOT NULL,
  `sum` decimal(5,2) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `blok2files`
--

INSERT INTO `blok2files` (`id`, `month`, `sum`, `name`, `picture`) VALUES
(1, 1, '115.58', 'фактура ток ', 'vvv.jpg'),
(2, 1, '25.60', 'фактура вода', '27827.jpg'),
(3, 2, '128.50', 'фактура ток ', 'book.png'),
(4, 2, '30.20', 'фактура вода', '15270-NQC39N.jpg'),
(5, 3, '130.80', 'фактура ток ', '3.jpg'),
(6, 3, '40.50', 'фактура вода', '1.jpeg'),
(7, 4, '110.50', 'фактура ток ', 'butterfly.jpg'),
(8, 4, '45.50', 'фактура вода', '2.jpg'),
(9, 5, '120.30', 'фактура ток ', 'walking-man.png'),
(10, 5, '58.60', 'фактура вода', 'flags.png'),
(11, 5, '250.60', 'ремонт асансьор', '2.jpg');

-- --------------------------------------------------------

--
-- Структура на таблица `blok2view`
--

CREATE TABLE `blok2view` (
  `id` int(11) NOT NULL,
  `month` int(20) NOT NULL,
  `availability` decimal(5,2) NOT NULL,
  `monthlyduties` decimal(5,2) NOT NULL,
  `restformonth` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `blok2view`
--

INSERT INTO `blok2view` (`id`, `month`, `availability`, `monthlyduties`, `restformonth`) VALUES
(1, 1, '320.00', '141.18', '178.82'),
(2, 2, '350.00', '158.70', '191.30'),
(3, 3, '330.00', '171.30', '158.70'),
(4, 4, '160.00', '156.00', '4.00'),
(5, 5, '510.00', '429.50', '80.50'),
(6, 6, '0.00', '0.00', '0.00'),
(7, 7, '0.00', '0.00', '0.00'),
(8, 8, '0.00', '0.00', '0.00'),
(9, 9, '0.00', '0.00', '0.00'),
(10, 10, '0.00', '0.00', '0.00'),
(11, 11, '0.00', '0.00', '0.00'),
(12, 12, '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Структура на таблица `blok table`
--

CREATE TABLE `blok table` (
  `id` int(11) NOT NULL,
  `blokname` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `blok table`
--

INSERT INTO `blok table` (`id`, `blokname`) VALUES
(1, 'жк.Чайка ул. Димитър Петров 8 вх.А'),
(2, 'жк.Левски ул. Иван Вазов 8');

-- --------------------------------------------------------

--
-- Структура на таблица `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `messages`
--

INSERT INTO `messages` (`id`, `name`, `mail`, `message`) VALUES
(1, 'vania', 'vanianesheva@abv.bg', ''),
(2, 'Krasimir', 'tersi@abv.bg', ''),
(3, 'Иван Иванов', 'ivan@abv.bg', ''),
(4, 'Иван Иванов', 'vvvvv@abv.bg', ''),
(5, 'петър', 'бахбах@анбснб.бг', ''),
(6, 'петър', 'бахбах@анбснб.бг', ''),
(7, 'Иван Иванов', 'vvvvv@abv.bg', ''),
(8, 'Иван Иванов', 'vanianesheva@abv.bg', ''),
(9, 'Венелин Нешев', 'venelinneshev@abv.bg', ''),
(10, 'Венелин Нешев', 'tersi@abv.bg', ''),
(11, 'Ваня', 'tersi@abv.bg', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv');

-- --------------------------------------------------------

--
-- Структура на таблица `months`
--

CREATE TABLE `months` (
  `m_id` int(2) NOT NULL,
  `monthname` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `months`
--

INSERT INTO `months` (`m_id`, `monthname`) VALUES
(1, 'Януари'),
(2, 'Февруари'),
(3, 'Март'),
(4, 'Април'),
(5, 'Май'),
(6, 'Юни'),
(7, 'Юли'),
(8, 'Август'),
(9, 'Септември'),
(10, 'Октомври'),
(11, 'Ноември'),
(12, 'Декември');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(0, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(1, 'БЛОК 1', 'blok1', '27d419cd6f327e3a76998e905a579fe2'),
(2, 'БЛОК 2', 'blok2', 'cfccaf4b27a0a707827974c7694b1b96');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appnumbers`
--
ALTER TABLE `appnumbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blok1`
--
ALTER TABLE `blok1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blok1files`
--
ALTER TABLE `blok1files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blok1view`
--
ALTER TABLE `blok1view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blok2`
--
ALTER TABLE `blok2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blok2files`
--
ALTER TABLE `blok2files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blok2view`
--
ALTER TABLE `blok2view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blok table`
--
ALTER TABLE `blok table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appnumbers`
--
ALTER TABLE `appnumbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blok1`
--
ALTER TABLE `blok1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blok1files`
--
ALTER TABLE `blok1files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `blok1view`
--
ALTER TABLE `blok1view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blok2`
--
ALTER TABLE `blok2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blok2files`
--
ALTER TABLE `blok2files`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blok2view`
--
ALTER TABLE `blok2view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blok table`
--
ALTER TABLE `blok table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `m_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
