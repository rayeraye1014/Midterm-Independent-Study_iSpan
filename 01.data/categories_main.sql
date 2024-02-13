-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-02-13 12:37:27
-- 伺服器版本： 8.0.35
-- PHP 版本： 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `proj57`
--

-- --------------------------------------------------------

--
-- 資料表結構 `categories_main`
--

CREATE TABLE `categories_main` (
  `id` int NOT NULL,
  `main` varchar(10) NOT NULL,
  `carbon_points_available` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `categories_main`
--

INSERT INTO `categories_main` (`id`, `main`, `carbon_points_available`) VALUES
(1, '免費禮物', 90),
(2, '電腦科技', 20),
(3, '手機配件', 20),
(4, '男裝服飾', 35),
(5, '女裝服飾', 35),
(6, '美妝保養', 10),
(7, '名牌精品', 30),
(8, '電玩遊戲', 20),
(9, '耳機錄音', 20),
(10, '相機拍攝', 20),
(11, '家具家居', 20),
(12, '電視電器', 20),
(13, '嬰兒孩童', 10),
(14, '健康營養品', 10),
(15, '運動用品', 10),
(16, '食物飲料', 3),
(17, '寵物用品', 10),
(18, '門票票券', 3),
(19, '機車汽車', 20),
(20, '其他其他', 1),
(26, '51231', 15),
(34, '資展國際', 100),
(35, '商品分類', 20),
(36, '﻿這是第一', 30),
(37, '這是第二', 50),
(38, '測試測試', 40),
(39, '﻿51231', 15),
(40, '資展國際', 100),
(41, '商品分類', 20),
(42, '﻿這是第一', 30),
(43, '這是第二', 50),
(44, '測試測試', 40);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `categories_main`
--
ALTER TABLE `categories_main`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `categories_main`
--
ALTER TABLE `categories_main`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
