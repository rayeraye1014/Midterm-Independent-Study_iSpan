-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-02-13 12:38:08
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
-- 資料表結構 `coupon`
--

CREATE TABLE `coupon` (
  `id` int NOT NULL,
  `coupon_type` varchar(20) NOT NULL,
  `coupon_name` varchar(20) NOT NULL,
  `coupon_discount` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `vaild_date` date NOT NULL,
  `coupon_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `coupon`
--

INSERT INTO `coupon` (`id`, `coupon_type`, `coupon_name`, `coupon_discount`, `start_date`, `vaild_date`, `coupon_status`) VALUES
(1, '折價券', '滿千折百', '-100', '2021-02-06', '2021-06-30', '已過期'),
(2, '折扣券', '5%折扣', '95%', '2022-03-09', '2022-07-31', '已過期'),
(3, '折價券', '滿五百折三十', '-30', '2023-05-06', '2024-05-06', '進行中'),
(4, '折扣券', '10%折扣', '90%', '2023-06-06', '2024-06-06', '進行中'),
(7, '折價券', '滿兩千送三百', '-300', '2024-06-30', '2024-12-31', '未開始'),
(8, '折扣券', '20%折扣', '80%', '2023-08-01', '2023-08-31', '已過期'),
(9, '運費半價券', '運費半價', '-30', '2024-01-01', '2026-01-01', '進行中'),
(10, '免運券', '免運折價', '-60', '2024-01-01', '2026-01-01', '進行中'),
(11, '運費半價券', '123456', '-60', '2024-02-20', '2024-02-24', '未開始'),
(12, '運費半價券', 'test', '20%', '2024-01-11', '2024-03-29', '進行中'),
(13, '﻿運費半價券', '運費半價', '-30', '2024-01-01', '2026-01-01', '進行中'),
(14, '免運券', '免運折價', '-60', '2024-01-01', '2026-01-01', '進行中'),
(15, '運費半價券', '123456', '-60', '2024-02-20', '2024-02-24', '未開始'),
(16, '運費半價券', 'test', '20%', '2024-01-11', '2024-03-29', '進行中');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
