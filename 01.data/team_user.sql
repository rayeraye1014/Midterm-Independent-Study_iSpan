-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-02-13 12:39:00
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
-- 資料表結構 `team_user`
--

CREATE TABLE `team_user` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `activated` int DEFAULT '0',
  `nickname` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 傾印資料表的資料 `team_user`
--

INSERT INTO `team_user` (`id`, `email`, `password`, `mobile`, `address`, `birthday`, `hash`, `activated`, `nickname`, `create_at`) VALUES
(5, '123456@gmail.com', '$2y$10$cpUeCZVFf2GjO/6Chvla3uSRmzQHfRDbmA51ITVavBJlzQqQNS5VK', '0918222333', '', '1990-02-02', '52c61e86824899ca67e8d815a7a7afb0ce43878c', 0, 'user1', '2019-01-07 10:39:38'),
(6, 'aaa@gmail.com', '$2y$10$LEcayy4513jZLRn9El/0auUfVzegjAO3mdgCXo0nKTKBLPMZPQ5SK', '0912123456', '123456789', '2024-01-07', '493871d58aee1826520470d9d5d72303', 0, 'aaa', '2024-02-03 12:33:42'),
(7, 'bbb@gmail.com', '$2y$10$oMAnMeo6RQ4pAKDqQGj.K.scY1Vjc73ni4O3SorB71igEaZGH81p.', '0912123456', '123456789', '2024-02-05', 'ebc18bd52ab2201cc6ffd2b42badfc66', 0, 'bbb', '2024-02-03 12:57:18'),
(8, 'ccc@gmail.com', '$2y$10$26l4OrlyJj3qv.MepSU2t.qTV.D6ck2tPUg/tajiRHa5LCR0dGVoK', '0912123456', '123456789', '2024-01-29', NULL, 0, 'ccc', '2024-02-11 18:56:31'),
(9, 'ddd@gmail.com', '$2y$10$XecmAQqIL4207a9P/yrWu.xodPCiY0jRk02UV.gXmfnDWZoon5/SG', '0912123456', '123456789', '2024-01-29', NULL, 0, 'ddd', '2024-02-11 18:59:58'),
(10, 'aaa@gmail.com', '$2y$10$dO1s/DC7aY3Z68jVLVyDJuB0S9SW2ae.4qdvDvBboKLWqj78zTdRm', '0912123456', '123456789', '2024-02-02', NULL, 0, '123', '2024-02-13 18:56:41');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
