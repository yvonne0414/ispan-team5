-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 04 月 21 日 12:09
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `9hunters_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `prd_list`
--

CREATE TABLE `prd_list` (
  `id` int(3) UNSIGNED NOT NULL,
  `prd_num` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(5) NOT NULL,
  `disc` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disc_img` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` int(3) NOT NULL,
  `width` int(3) NOT NULL,
  `height` int(3) NOT NULL,
  `inventory_quantity` int(4) NOT NULL,
  `sale_quantity` int(6) NOT NULL DEFAULT 0,
  `category` int(3) NOT NULL,
  `status` int(1) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `prd_list`
--
ALTER TABLE `prd_list`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_list`
--
ALTER TABLE `prd_list`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
