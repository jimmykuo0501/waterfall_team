-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024 年 11 月 13 日 14:32
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `system`
--

-- --------------------------------------------------------

--
-- 資料表結構 `deliver_goods`
--

CREATE TABLE `deliver_goods` (
  `dID` int(5) NOT NULL,
  `gID` int(10) NOT NULL,
  `d_starDate` date NOT NULL,
  `d_arriveDate` date NOT NULL,
  `destination` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `deliver_goods`
--

INSERT INTO `deliver_goods` (`dID`, `gID`, `d_starDate`, `d_arriveDate`, `destination`) VALUES
(1, 1, '2024-11-13', '2024-11-13', 'NTUST'),
(2, 2, '2024-11-13', '2024-11-13', 'NTUST');

-- --------------------------------------------------------

--
-- 資料表結構 `goods`
--

CREATE TABLE `goods` (
  `gID` int(5) NOT NULL,
  `gType` varchar(20) NOT NULL,
  `gPrice` int(10) NOT NULL,
  `gNum` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `goods`
--

INSERT INTO `goods` (`gID`, `gType`, `gPrice`, `gNum`) VALUES
(1, 'chair', 200, 3),
(2, 'table', 500, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `uID` int(5) NOT NULL,
  `uName` varchar(50) NOT NULL,
  `uPhone_num` int(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`uID`, `uName`, `uPhone_num`, `password`) VALUES
(1, 'jimmy', 937157336, 'jimmy');

-- --------------------------------------------------------

--
-- 資料表結構 `warehousing`
--

CREATE TABLE `warehousing` (
  `gType` varchar(20) NOT NULL,
  `num` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `warehousing`
--

INSERT INTO `warehousing` (`gType`, `num`) VALUES
('chair', 5),
('table', 2),
('bed', 2);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `deliver_goods`
--
ALTER TABLE `deliver_goods`
  ADD PRIMARY KEY (`dID`),
  ADD KEY `gID` (`gID`),
  ADD KEY `gID_2` (`gID`);

--
-- 資料表索引 `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`gID`),
  ADD KEY `gID` (`gID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
