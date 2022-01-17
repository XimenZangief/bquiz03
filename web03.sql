-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-01-17 09:37:43
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `web03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '電影名稱',
  `level` tinyint(1) NOT NULL COMMENT '分級',
  `length` int(5) NOT NULL COMMENT '長度',
  `ondate` date NOT NULL COMMENT '放映日期',
  `publish` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '發行商',
  `director` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '導演',
  `trailer` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '預告影片',
  `poster` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '預告海報',
  `intro` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '電影介紹',
  `rank` int(5) NOT NULL COMMENT '排序',
  `sh` tinyint(1) NOT NULL DEFAULT 1 COMMENT '顯示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `rank`, `sh`) VALUES
(18, 'peko', 1, 0, '2022-01-17', 'peko', 'peko', 'pekoT.mp4', 'pekoP.png', 'pekopekopekopekopeko', 1, 1),
(19, 'saka', 1, 0, '2022-01-17', 'saka', 'saka', 'sakaT.mp4', 'sakaT.gif', 'sakasakasakasaka', 19, 1),
(20, 'zangi', 1, 0, '2022-01-17', 'zangi', 'zangi', 'zangiT.mp4', 'zangiP.png', '            zangizangizangizangi', 20, 1),
(21, 'lucia', 1, 0, '2022-01-17', 'lucia', 'lucia', 'luciaT.mp4', 'luciaP.png', 'lucialucialucialucialucialucia', 21, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `ord`
--

CREATE TABLE `ord` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '流水號',
  `no` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '訂單編號',
  `movie` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '電影名稱',
  `date` date NOT NULL COMMENT '觀看日期',
  `session` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '場次',
  `qt` int(1) NOT NULL COMMENT '票數',
  `seat` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '座位'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '流水號',
  `path` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '檔案路徑',
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '片名',
  `rank` int(5) NOT NULL COMMENT '排序',
  `sh` int(1) NOT NULL DEFAULT 1 COMMENT '顯示',
  `ani` int(1) NOT NULL DEFAULT 1 COMMENT '轉場動畫'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `path`, `name`, `rank`, `sh`, `ani`) VALUES
(5, '03A02.jpg', '03A02', 2, 1, 1),
(6, '03A03.jpg', '03A03', 3, 1, 2),
(7, '03A04.jpg', '03A04', 4, 1, 3),
(8, '03A05.jpg', '005', 5, 1, 2),
(9, '03A06.jpg', '006', 6, 1, 3);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=22;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ord`
--
ALTER TABLE `ord`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
