-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-02-13 12:37:58
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
-- 資料表結構 `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `rating` int NOT NULL,
  `comments` varchar(500) DEFAULT NULL,
  `evaluation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `evaluations`
--

INSERT INTO `evaluations` (`id`, `order_id`, `rating`, `comments`, `evaluation_date`) VALUES
(1, 1, 5, '買家出貨很快，品質和介紹相符，推推！', '2021-09-21 16:00:00'),
(2, 2, 4, '買家出貨很快，品質和介紹相符，推推！', '2021-07-06 16:00:00'),
(3, 3, 3, '品質有一點問題，不過商品還堪用', '2021-01-09 16:00:00'),
(4, 4, 4, '出貨超級快，很喜歡這個商品', '2023-02-21 16:00:00'),
(5, 5, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2023-12-18 16:00:00'),
(6, 6, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2021-11-11 16:00:00'),
(7, 7, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2021-03-29 16:00:00'),
(8, 8, 4, '出貨很快', '2022-12-10 16:00:00'),
(9, 9, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2021-05-06 16:00:00'),
(10, 10, 2, '賣家寄出速度很慢', '2023-04-04 16:00:00'),
(11, 11, 1, '品質很差', '2022-10-28 16:00:00'),
(12, 12, 1, '品質很差', '2023-07-30 16:00:00'),
(13, 13, 3, '出貨速度有點慢', '2022-05-30 16:00:00'),
(14, 14, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-10-14 16:00:00'),
(15, 15, 5, '可以用到這個價錢買到真的太划算了', '2023-04-12 16:00:00'),
(16, 16, 5, '完全就是我想要的東西而且商品保持的超好的', '2022-08-28 16:00:00'),
(17, 17, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-02-10 16:00:00'),
(18, 18, 1, '品質很差', '2022-04-05 16:00:00'),
(19, 19, 3, '出貨速度有點慢', '2023-06-26 16:00:00'),
(20, 20, 3, '出貨速度有點慢', '2022-05-13 16:00:00'),
(21, 21, 2, '品質有點差，但是價格很便宜', '2023-01-31 16:00:00'),
(22, 22, 5, '買家出貨很快，品質和介紹相符，推推！', '2023-02-03 16:00:00'),
(23, 23, 4, '買家出貨很快，品質和介紹相符，推推！', '2022-05-05 16:00:00'),
(24, 24, 3, '品質有一點問題，不過商品還堪用', '2021-12-12 16:00:00'),
(25, 25, 4, '出貨超級快，很喜歡這個商品', '2023-05-24 16:00:00'),
(26, 26, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2023-07-31 16:00:00'),
(27, 27, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2021-09-06 16:00:00'),
(28, 28, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2022-07-08 16:00:00'),
(29, 29, 4, '出貨很快', '2023-08-25 16:00:00'),
(30, 30, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2021-03-24 16:00:00'),
(31, 31, 2, '賣家寄出速度很慢', '2021-12-31 16:00:00'),
(32, 32, 1, '品質很差', '2022-05-08 16:00:00'),
(33, 33, 1, '品質很差', '2021-01-17 16:00:00'),
(34, 34, 3, '出貨速度有點慢', '2022-09-21 16:00:00'),
(35, 35, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-02-01 16:00:00'),
(36, 36, 5, '可以用到這個價錢買到真的太划算了', '2023-03-12 16:00:00'),
(37, 37, 5, '完全就是我想要的東西而且商品保持的超好的', '2021-03-08 16:00:00'),
(38, 38, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-05-12 16:00:00'),
(39, 39, 1, '品質很差', '2023-05-03 16:00:00'),
(40, 40, 3, '出貨速度有點慢', '2023-03-13 16:00:00'),
(41, 41, 3, '出貨速度有點慢', '2021-03-28 16:00:00'),
(42, 42, 2, '品質有點差，但是價格很便宜', '2022-03-24 16:00:00'),
(43, 43, 5, '買家出貨很快，品質和介紹相符，推推！', '2022-02-06 16:00:00'),
(44, 44, 4, '買家出貨很快，品質和介紹相符，推推！', '2021-08-02 16:00:00'),
(45, 45, 3, '品質有一點問題，不過商品還堪用', '2022-04-06 16:00:00'),
(46, 46, 4, '出貨超級快，很喜歡這個商品', '2021-04-12 16:00:00'),
(47, 47, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2021-03-03 16:00:00'),
(48, 48, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2021-12-16 16:00:00'),
(49, 49, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2022-02-01 16:00:00'),
(50, 50, 4, '出貨很快', '2023-11-09 16:00:00'),
(51, 51, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2022-03-06 16:00:00'),
(52, 52, 2, '賣家寄出速度很慢', '2023-03-21 16:00:00'),
(53, 53, 1, '品質很差', '2021-03-09 16:00:00'),
(54, 54, 1, '品質很差', '2022-12-02 16:00:00'),
(55, 55, 3, '出貨速度有點慢', '2022-02-01 16:00:00'),
(56, 56, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-08-05 16:00:00'),
(57, 57, 5, '可以用到這個價錢買到真的太划算了', '2021-07-02 16:00:00'),
(58, 58, 5, '完全就是我想要的東西而且商品保持的超好的', '2023-10-06 16:00:00'),
(59, 59, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-07-28 16:00:00'),
(60, 60, 1, '品質很差', '2022-04-26 16:00:00'),
(61, 61, 3, '出貨速度有點慢', '2022-11-06 16:00:00'),
(62, 62, 3, '出貨速度有點慢', '2023-10-30 16:00:00'),
(63, 63, 2, '品質有點差，但是價格很便宜', '2021-06-01 16:00:00'),
(64, 64, 5, '買家出貨很快，品質和介紹相符，推推！', '2022-07-12 16:00:00'),
(65, 65, 4, '買家出貨很快，品質和介紹相符，推推！', '2022-11-03 16:00:00'),
(66, 66, 3, '品質有一點問題，不過商品還堪用', '2022-04-30 16:00:00'),
(67, 67, 4, '出貨超級快，很喜歡這個商品', '2024-02-01 16:00:00'),
(68, 68, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2021-08-17 16:00:00'),
(69, 69, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2021-12-05 16:00:00'),
(70, 70, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2022-09-10 16:00:00'),
(71, 71, 4, '出貨很快', '2022-11-04 16:00:00'),
(72, 72, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2022-09-15 16:00:00'),
(73, 73, 2, '賣家寄出速度很慢', '2021-10-14 16:00:00'),
(74, 74, 1, '品質很差', '2023-05-10 16:00:00'),
(75, 75, 1, '品質很差', '2022-06-17 16:00:00'),
(76, 76, 3, '出貨速度有點慢', '2024-02-05 16:00:00'),
(77, 77, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-09-23 16:00:00'),
(78, 78, 5, '可以用到這個價錢買到真的太划算了', '2021-04-17 16:00:00'),
(79, 79, 5, '完全就是我想要的東西而且商品保持的超好的', '2022-04-30 16:00:00'),
(80, 80, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-04-11 16:00:00'),
(81, 81, 1, '品質很差', '2022-06-01 16:00:00'),
(82, 82, 3, '出貨速度有點慢', '2022-09-23 16:00:00'),
(83, 83, 3, '出貨速度有點慢', '2022-06-23 16:00:00'),
(84, 84, 2, '品質有點差，但是價格很便宜', '2023-04-21 16:00:00'),
(85, 85, 5, '買家出貨很快，品質和介紹相符，推推！', '2021-06-10 16:00:00'),
(86, 86, 4, '買家出貨很快，品質和介紹相符，推推！', '2022-02-09 16:00:00'),
(87, 87, 3, '品質有一點問題，不過商品還堪用', '2022-02-25 16:00:00'),
(88, 88, 4, '出貨超級快，很喜歡這個商品', '2022-11-03 16:00:00'),
(89, 89, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2021-02-24 16:00:00'),
(90, 90, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2021-12-28 16:00:00'),
(91, 91, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2023-04-16 16:00:00'),
(92, 92, 4, '出貨很快', '2022-11-13 16:00:00'),
(93, 93, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2023-07-15 16:00:00'),
(94, 94, 2, '賣家寄出速度很慢', '2021-03-20 16:00:00'),
(95, 95, 1, '品質很差', '2023-07-15 16:00:00'),
(96, 96, 1, '品質很差', '2023-01-16 16:00:00'),
(97, 97, 3, '出貨速度有點慢', '2022-04-10 16:00:00'),
(98, 98, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-11-06 16:00:00'),
(99, 99, 5, '可以用到這個價錢買到真的太划算了', '2023-03-06 16:00:00'),
(100, 100, 5, '完全就是我想要的東西而且商品保持的超好的', '2023-10-28 16:00:00'),
(101, 101, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-01-01 16:00:00'),
(102, 102, 1, '品質很差', '2021-09-18 16:00:00'),
(103, 103, 3, '出貨速度有點慢', '2023-02-25 16:00:00'),
(104, 104, 3, '出貨速度有點慢', '2022-10-23 16:00:00'),
(105, 105, 2, '品質有點差，但是價格很便宜', '2022-03-01 16:00:00'),
(106, 106, 5, '買家出貨很快，品質和介紹相符，推推！', '2021-09-18 16:00:00'),
(107, 107, 4, '買家出貨很快，品質和介紹相符，推推！', '2023-11-19 16:00:00'),
(108, 108, 3, '品質有一點問題，不過商品還堪用', '2023-08-13 16:00:00'),
(109, 109, 4, '出貨超級快，很喜歡這個商品', '2024-01-30 16:00:00'),
(110, 110, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2021-02-15 16:00:00'),
(111, 111, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2022-02-20 16:00:00'),
(112, 112, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2023-08-02 16:00:00'),
(113, 113, 4, '出貨很快', '2022-01-24 16:00:00'),
(114, 114, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2021-12-24 16:00:00'),
(115, 115, 2, '賣家寄出速度很慢', '2023-12-25 16:00:00'),
(116, 116, 1, '品質很差', '2021-10-17 16:00:00'),
(117, 117, 1, '品質很差', '2021-03-07 16:00:00'),
(118, 118, 3, '出貨速度有點慢', '2021-01-05 16:00:00'),
(119, 119, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-01-29 16:00:00'),
(120, 120, 5, '可以用到這個價錢買到真的太划算了', '2022-12-09 16:00:00'),
(121, 121, 5, '完全就是我想要的東西而且商品保持的超好的', '2022-01-12 16:00:00'),
(122, 122, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-03-25 16:00:00'),
(123, 123, 1, '品質很差', '2021-01-15 16:00:00'),
(124, 124, 3, '出貨速度有點慢', '2022-09-29 16:00:00'),
(125, 125, 3, '出貨速度有點慢', '2023-10-06 16:00:00'),
(126, 126, 2, '品質有點差，但是價格很便宜', '2022-06-14 16:00:00'),
(127, 127, 5, '買家出貨很快，品質和介紹相符，推推！', '2022-02-14 16:00:00'),
(128, 128, 4, '買家出貨很快，品質和介紹相符，推推！', '2023-05-25 16:00:00'),
(129, 129, 3, '品質有一點問題，不過商品還堪用', '2022-01-10 16:00:00'),
(130, 130, 4, '出貨超級快，很喜歡這個商品', '2023-05-28 16:00:00'),
(131, 131, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2022-02-25 16:00:00'),
(132, 132, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2021-05-31 16:00:00'),
(133, 133, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2023-12-03 16:00:00'),
(134, 134, 4, '出貨很快', '2021-12-30 16:00:00'),
(135, 135, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2022-12-04 16:00:00'),
(136, 136, 2, '賣家寄出速度很慢', '2022-05-31 16:00:00'),
(137, 137, 1, '品質很差', '2022-06-30 16:00:00'),
(138, 138, 1, '品質很差', '2021-12-26 16:00:00'),
(139, 139, 3, '出貨速度有點慢', '2022-12-05 16:00:00'),
(140, 140, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-08-24 16:00:00'),
(141, 141, 5, '可以用到這個價錢買到真的太划算了', '2021-01-25 16:00:00'),
(142, 142, 5, '完全就是我想要的東西而且商品保持的超好的', '2023-10-16 16:00:00'),
(143, 143, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-06-26 16:00:00'),
(144, 144, 1, '品質很差', '2022-08-31 16:00:00'),
(145, 145, 3, '出貨速度有點慢', '2022-07-29 16:00:00'),
(146, 146, 3, '出貨速度有點慢', '2022-06-30 16:00:00'),
(147, 147, 2, '品質有點差，但是價格很便宜', '2022-05-29 16:00:00'),
(148, 148, 5, '買家出貨很快，品質和介紹相符，推推！', '2021-10-03 16:00:00'),
(149, 149, 4, '買家出貨很快，品質和介紹相符，推推！', '2023-10-27 16:00:00'),
(150, 150, 3, '品質有一點問題，不過商品還堪用', '2022-02-25 16:00:00'),
(151, 151, 4, '出貨超級快，很喜歡這個商品', '2022-12-17 16:00:00'),
(152, 152, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2023-11-29 16:00:00'),
(153, 153, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2022-09-21 16:00:00'),
(154, 154, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2023-01-26 16:00:00'),
(155, 155, 4, '出貨很快', '2023-11-08 16:00:00'),
(156, 156, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2021-03-03 16:00:00'),
(157, 157, 2, '賣家寄出速度很慢', '2022-02-08 16:00:00'),
(158, 158, 1, '品質很差', '2023-07-28 16:00:00'),
(159, 159, 1, '品質很差', '2022-02-11 16:00:00'),
(160, 160, 3, '出貨速度有點慢', '2022-11-17 16:00:00'),
(161, 161, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-09-21 16:00:00'),
(162, 162, 5, '可以用到這個價錢買到真的太划算了', '2023-08-04 16:00:00'),
(163, 163, 5, '完全就是我想要的東西而且商品保持的超好的', '2021-03-05 16:00:00'),
(164, 164, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-03-04 16:00:00'),
(165, 165, 1, '品質很差', '2023-11-01 16:00:00'),
(166, 166, 3, '出貨速度有點慢', '2023-03-13 16:00:00'),
(167, 167, 3, '出貨速度有點慢', '2021-05-06 16:00:00'),
(168, 168, 2, '品質有點差，但是價格很便宜', '2022-08-01 16:00:00'),
(169, 169, 5, '買家出貨很快，品質和介紹相符，推推！', '2023-08-01 16:00:00'),
(170, 170, 4, '買家出貨很快，品質和介紹相符，推推！', '2023-08-23 16:00:00'),
(171, 171, 3, '品質有一點問題，不過商品還堪用', '2021-07-17 16:00:00'),
(172, 172, 4, '出貨超級快，很喜歡這個商品', '2022-03-15 16:00:00'),
(173, 173, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2023-04-07 16:00:00'),
(174, 174, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2023-06-14 16:00:00'),
(175, 175, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2021-05-25 16:00:00'),
(176, 176, 4, '出貨很快', '2021-10-22 16:00:00'),
(177, 177, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2023-08-03 16:00:00'),
(178, 178, 2, '賣家寄出速度很慢', '2022-06-22 16:00:00'),
(179, 179, 1, '品質很差', '2023-11-15 16:00:00'),
(180, 180, 1, '品質很差', '2023-01-03 16:00:00'),
(181, 181, 3, '出貨速度有點慢', '2023-08-11 16:00:00'),
(182, 182, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-01-29 16:00:00'),
(183, 183, 5, '可以用到這個價錢買到真的太划算了', '2022-10-09 16:00:00'),
(184, 184, 5, '完全就是我想要的東西而且商品保持的超好的', '2023-02-15 16:00:00'),
(185, 185, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-09-18 16:00:00'),
(186, 186, 1, '品質很差', '2021-05-09 16:00:00'),
(187, 187, 3, '出貨速度有點慢', '2021-10-06 16:00:00'),
(188, 188, 3, '出貨速度有點慢', '2021-09-10 16:00:00'),
(189, 189, 2, '品質有點差，但是價格很便宜', '2021-10-18 16:00:00'),
(190, 190, 5, '買家出貨很快，品質和介紹相符，推推！', '2021-11-25 16:00:00'),
(191, 191, 4, '買家出貨很快，品質和介紹相符，推推！', '2021-02-23 16:00:00'),
(192, 192, 3, '品質有一點問題，不過商品還堪用', '2023-05-27 16:00:00'),
(193, 193, 4, '出貨超級快，很喜歡這個商品', '2022-04-07 16:00:00'),
(194, 194, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2023-11-06 16:00:00'),
(195, 195, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2023-04-07 16:00:00'),
(196, 196, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2023-04-09 16:00:00'),
(197, 197, 4, '出貨很快', '2022-05-06 16:00:00'),
(198, 198, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2022-02-20 16:00:00'),
(199, 199, 2, '賣家寄出速度很慢', '2022-11-24 16:00:00'),
(200, 200, 1, '品質很差', '2023-11-19 16:00:00'),
(201, 201, 1, '品質很差', '2021-11-10 16:00:00'),
(202, 202, 3, '出貨速度有點慢', '2024-02-05 16:00:00'),
(203, 203, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-11-16 16:00:00'),
(204, 204, 5, '可以用到這個價錢買到真的太划算了', '2022-04-09 16:00:00'),
(205, 205, 5, '完全就是我想要的東西而且商品保持的超好的', '2023-12-14 16:00:00'),
(206, 206, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-06-09 16:00:00'),
(207, 207, 1, '品質很差', '2022-08-23 16:00:00'),
(208, 208, 3, '出貨速度有點慢', '2022-05-26 16:00:00'),
(209, 209, 3, '出貨速度有點慢', '2023-12-30 16:00:00'),
(210, 210, 2, '品質有點差，但是價格很便宜', '2023-05-17 16:00:00'),
(211, 211, 5, '買家出貨很快，品質和介紹相符，推推！', '2021-02-06 16:00:00'),
(212, 212, 4, '買家出貨很快，品質和介紹相符，推推！', '2022-10-07 16:00:00'),
(213, 213, 3, '品質有一點問題，不過商品還堪用', '2022-08-07 16:00:00'),
(214, 214, 4, '出貨超級快，很喜歡這個商品', '2021-09-26 16:00:00'),
(215, 215, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2021-06-23 16:00:00'),
(216, 216, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2022-12-17 16:00:00'),
(217, 217, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2023-10-27 16:00:00'),
(218, 218, 4, '出貨很快', '2023-02-14 16:00:00'),
(219, 219, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2021-01-30 16:00:00'),
(220, 220, 2, '賣家寄出速度很慢', '2023-10-09 16:00:00'),
(221, 221, 1, '品質很差', '2022-12-12 16:00:00'),
(222, 222, 1, '品質很差', '2023-03-18 16:00:00'),
(223, 223, 3, '出貨速度有點慢', '2023-08-15 16:00:00'),
(224, 224, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-12-23 16:00:00'),
(225, 225, 5, '可以用到這個價錢買到真的太划算了', '2023-02-28 16:00:00'),
(226, 226, 5, '完全就是我想要的東西而且商品保持的超好的', '2023-04-20 16:00:00'),
(227, 227, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-04-01 16:00:00'),
(228, 228, 1, '品質很差', '2022-02-22 16:00:00'),
(229, 229, 3, '出貨速度有點慢', '2021-09-13 16:00:00'),
(230, 230, 3, '出貨速度有點慢', '2023-11-06 16:00:00'),
(231, 231, 2, '品質有點差，但是價格很便宜', '2022-10-16 16:00:00'),
(232, 232, 5, '買家出貨很快，品質和介紹相符，推推！', '2023-06-11 16:00:00'),
(233, 233, 4, '買家出貨很快，品質和介紹相符，推推！', '2022-11-19 16:00:00'),
(234, 234, 3, '品質有一點問題，不過商品還堪用', '2022-09-18 16:00:00'),
(235, 235, 4, '出貨超級快，很喜歡這個商品', '2021-01-18 16:00:00'),
(236, 236, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2022-01-16 16:00:00'),
(237, 237, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2023-01-26 16:00:00'),
(238, 238, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2021-10-22 16:00:00'),
(239, 239, 4, '出貨很快', '2023-07-09 16:00:00'),
(240, 240, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2023-01-07 16:00:00'),
(241, 241, 2, '賣家寄出速度很慢', '2021-05-14 16:00:00'),
(242, 242, 1, '品質很差', '2024-01-03 16:00:00'),
(243, 243, 1, '品質很差', '2021-10-27 16:00:00'),
(244, 244, 3, '出貨速度有點慢', '2023-08-06 16:00:00'),
(245, 245, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-12-09 16:00:00'),
(246, 246, 5, '可以用到這個價錢買到真的太划算了', '2021-01-23 16:00:00'),
(247, 247, 5, '完全就是我想要的東西而且商品保持的超好的', '2022-09-06 16:00:00'),
(248, 248, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-03-24 16:00:00'),
(249, 249, 1, '品質很差', '2021-03-03 16:00:00'),
(250, 250, 3, '出貨速度有點慢', '2022-07-27 16:00:00'),
(251, 251, 3, '出貨速度有點慢', '2022-03-22 16:00:00'),
(252, 252, 2, '品質有點差，但是價格很便宜', '2023-04-03 16:00:00'),
(253, 253, 5, '買家出貨很快，品質和介紹相符，推推！', '2023-03-25 16:00:00'),
(254, 254, 4, '買家出貨很快，品質和介紹相符，推推！', '2023-03-19 16:00:00'),
(255, 255, 3, '品質有一點問題，不過商品還堪用', '2022-10-06 16:00:00'),
(256, 256, 4, '出貨超級快，很喜歡這個商品', '2022-11-28 16:00:00'),
(257, 257, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2023-01-10 16:00:00'),
(258, 258, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2021-03-05 16:00:00'),
(259, 259, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2022-03-18 16:00:00'),
(260, 260, 4, '出貨很快', '2022-04-12 16:00:00'),
(261, 261, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2021-07-26 16:00:00'),
(262, 262, 2, '賣家寄出速度很慢', '2023-08-29 16:00:00'),
(263, 263, 1, '品質很差', '2022-08-14 16:00:00'),
(264, 264, 1, '品質很差', '2022-02-22 16:00:00'),
(265, 265, 3, '出貨速度有點慢', '2023-11-19 16:00:00'),
(266, 266, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-06-22 16:00:00'),
(267, 267, 5, '可以用到這個價錢買到真的太划算了', '2022-11-26 16:00:00'),
(268, 268, 5, '完全就是我想要的東西而且商品保持的超好的', '2022-02-27 16:00:00'),
(269, 269, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-02-17 16:00:00'),
(270, 270, 1, '品質很差', '2021-03-23 16:00:00'),
(271, 271, 3, '出貨速度有點慢', '2023-07-07 16:00:00'),
(272, 272, 3, '出貨速度有點慢', '2023-05-24 16:00:00'),
(273, 273, 2, '品質有點差，但是價格很便宜', '2023-09-19 16:00:00'),
(274, 274, 5, '買家出貨很快，品質和介紹相符，推推！', '2021-10-19 16:00:00'),
(275, 275, 4, '買家出貨很快，品質和介紹相符，推推！', '2021-09-04 16:00:00'),
(276, 276, 3, '品質有一點問題，不過商品還堪用', '2021-12-27 16:00:00'),
(277, 277, 4, '出貨超級快，很喜歡這個商品', '2023-12-31 16:00:00'),
(278, 278, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2024-01-22 16:00:00'),
(279, 279, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2022-03-10 16:00:00'),
(280, 280, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2022-09-01 16:00:00'),
(281, 281, 4, '出貨很快', '2023-12-23 16:00:00'),
(282, 282, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2024-02-04 16:00:00'),
(283, 283, 2, '賣家寄出速度很慢', '2023-09-29 16:00:00'),
(284, 284, 1, '品質很差', '2021-05-03 16:00:00'),
(285, 285, 1, '品質很差', '2023-02-26 16:00:00'),
(286, 286, 3, '出貨速度有點慢', '2024-01-05 16:00:00'),
(287, 287, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-02-16 16:00:00'),
(288, 288, 5, '可以用到這個價錢買到真的太划算了', '2023-01-12 16:00:00'),
(289, 289, 5, '完全就是我想要的東西而且商品保持的超好的', '2022-02-15 16:00:00'),
(290, 290, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-11-14 16:00:00'),
(291, 291, 1, '品質很差', '2022-11-10 16:00:00'),
(292, 292, 3, '出貨速度有點慢', '2022-05-25 16:00:00'),
(293, 293, 3, '出貨速度有點慢', '2023-12-29 16:00:00'),
(294, 294, 2, '品質有點差，但是價格很便宜', '2021-03-08 16:00:00'),
(295, 295, 5, '買家出貨很快，品質和介紹相符，推推！', '2022-07-08 16:00:00'),
(296, 296, 4, '買家出貨很快，品質和介紹相符，推推！', '2021-02-19 16:00:00'),
(297, 297, 3, '品質有一點問題，不過商品還堪用', '2021-10-19 16:00:00'),
(298, 298, 4, '出貨超級快，很喜歡這個商品', '2024-01-26 16:00:00'),
(299, 299, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2022-09-08 16:00:00'),
(300, 300, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2022-02-09 16:00:00'),
(301, 301, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2023-02-14 16:00:00'),
(302, 302, 4, '出貨很快', '2023-03-10 16:00:00'),
(303, 303, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2023-01-06 16:00:00'),
(304, 304, 2, '賣家寄出速度很慢', '2022-03-18 16:00:00'),
(305, 305, 1, '品質很差', '2021-11-24 16:00:00'),
(306, 306, 1, '品質很差', '2023-02-21 16:00:00'),
(307, 307, 3, '出貨速度有點慢', '2021-08-18 16:00:00'),
(308, 308, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-12-05 16:00:00'),
(309, 309, 5, '可以用到這個價錢買到真的太划算了', '2022-10-21 16:00:00'),
(310, 310, 5, '完全就是我想要的東西而且商品保持的超好的', '2022-02-22 16:00:00'),
(311, 311, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-01-01 16:00:00'),
(312, 312, 1, '品質很差', '2023-02-19 16:00:00'),
(313, 313, 3, '出貨速度有點慢', '2023-02-06 16:00:00'),
(314, 314, 3, '出貨速度有點慢', '2023-01-31 16:00:00'),
(315, 315, 2, '品質有點差，但是價格很便宜', '2021-02-11 16:00:00'),
(316, 316, 5, '買家出貨很快，品質和介紹相符，推推！', '2023-09-30 16:00:00'),
(317, 317, 4, '買家出貨很快，品質和介紹相符，推推！', '2022-12-17 16:00:00'),
(318, 318, 3, '品質有一點問題，不過商品還堪用', '2021-05-13 16:00:00'),
(319, 319, 4, '出貨超級快，很喜歡這個商品', '2022-05-04 16:00:00'),
(320, 320, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2023-08-24 16:00:00'),
(321, 321, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2023-12-14 16:00:00'),
(322, 322, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2022-07-20 16:00:00'),
(323, 323, 4, '出貨很快', '2023-01-30 16:00:00'),
(324, 324, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2022-11-15 16:00:00'),
(325, 325, 2, '賣家寄出速度很慢', '2022-08-21 16:00:00'),
(326, 326, 1, '品質很差', '2022-04-24 16:00:00'),
(327, 327, 1, '品質很差', '2022-05-07 16:00:00'),
(328, 328, 3, '出貨速度有點慢', '2022-06-09 16:00:00'),
(329, 329, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-05-23 16:00:00'),
(330, 330, 5, '可以用到這個價錢買到真的太划算了', '2022-01-02 16:00:00'),
(331, 331, 5, '完全就是我想要的東西而且商品保持的超好的', '2022-07-03 16:00:00'),
(332, 332, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-08-02 16:00:00'),
(333, 333, 1, '品質很差', '2021-06-11 16:00:00'),
(334, 334, 3, '出貨速度有點慢', '2023-10-19 16:00:00'),
(335, 335, 3, '出貨速度有點慢', '2023-11-27 16:00:00'),
(336, 336, 2, '品質有點差，但是價格很便宜', '2023-12-08 16:00:00'),
(337, 337, 5, '買家出貨很快，品質和介紹相符，推推！', '2023-02-01 16:00:00'),
(338, 338, 4, '買家出貨很快，品質和介紹相符，推推！', '2022-08-14 16:00:00'),
(339, 339, 3, '品質有一點問題，不過商品還堪用', '2023-07-25 16:00:00'),
(340, 340, 4, '出貨超級快，很喜歡這個商品', '2023-06-04 16:00:00'),
(341, 341, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2022-08-29 16:00:00'),
(342, 342, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2021-10-30 16:00:00'),
(343, 343, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2022-02-12 16:00:00'),
(344, 344, 4, '出貨很快', '2021-03-09 16:00:00'),
(345, 345, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2022-01-29 16:00:00'),
(346, 346, 2, '賣家寄出速度很慢', '2022-09-11 16:00:00'),
(347, 347, 1, '品質很差', '2021-12-02 16:00:00'),
(348, 348, 1, '品質很差', '2023-07-08 16:00:00'),
(349, 349, 3, '出貨速度有點慢', '2022-11-29 16:00:00'),
(350, 350, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-11-04 16:00:00'),
(351, 351, 5, '可以用到這個價錢買到真的太划算了', '2021-01-04 16:00:00'),
(352, 352, 5, '完全就是我想要的東西而且商品保持的超好的', '2021-03-20 16:00:00'),
(353, 353, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-08-31 16:00:00'),
(354, 354, 1, '品質很差', '2023-03-08 16:00:00'),
(355, 355, 3, '出貨速度有點慢', '2023-01-03 16:00:00'),
(356, 356, 3, '出貨速度有點慢', '2023-02-21 16:00:00'),
(357, 357, 2, '品質有點差，但是價格很便宜', '2023-01-22 16:00:00'),
(358, 358, 5, '買家出貨很快，品質和介紹相符，推推！', '2023-02-28 16:00:00'),
(359, 359, 4, '買家出貨很快，品質和介紹相符，推推！', '2021-03-18 16:00:00'),
(360, 360, 3, '品質有一點問題，不過商品還堪用', '2022-07-08 16:00:00'),
(361, 361, 4, '出貨超級快，很喜歡這個商品', '2021-03-20 16:00:00'),
(362, 362, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2023-07-28 16:00:00'),
(363, 363, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2022-02-28 16:00:00'),
(364, 364, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2023-08-19 16:00:00'),
(365, 365, 4, '出貨很快', '2023-07-22 16:00:00'),
(366, 366, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2022-11-19 16:00:00'),
(367, 367, 2, '賣家寄出速度很慢', '2021-05-22 16:00:00'),
(368, 368, 1, '品質很差', '2022-05-03 16:00:00'),
(369, 369, 1, '品質很差', '2022-12-03 16:00:00'),
(370, 370, 3, '出貨速度有點慢', '2021-01-04 16:00:00'),
(371, 371, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-11-28 16:00:00'),
(372, 372, 5, '可以用到這個價錢買到真的太划算了', '2023-06-14 16:00:00'),
(373, 373, 5, '完全就是我想要的東西而且商品保持的超好的', '2024-01-18 16:00:00'),
(374, 374, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-09-01 16:00:00'),
(375, 375, 1, '品質很差', '2021-09-06 16:00:00'),
(376, 376, 3, '出貨速度有點慢', '2022-12-13 16:00:00'),
(377, 377, 3, '出貨速度有點慢', '2021-10-27 16:00:00'),
(378, 378, 2, '品質有點差，但是價格很便宜', '2021-11-05 16:00:00'),
(379, 379, 5, '買家出貨很快，品質和介紹相符，推推！', '2023-03-16 16:00:00'),
(380, 380, 4, '買家出貨很快，品質和介紹相符，推推！', '2024-01-30 16:00:00'),
(381, 381, 3, '品質有一點問題，不過商品還堪用', '2022-08-17 16:00:00'),
(382, 382, 4, '出貨超級快，很喜歡這個商品', '2022-09-04 16:00:00'),
(383, 383, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2024-01-12 16:00:00'),
(384, 384, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2021-01-16 16:00:00'),
(385, 385, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2021-06-24 16:00:00'),
(386, 386, 4, '出貨很快', '2023-03-13 16:00:00'),
(387, 387, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2023-09-28 16:00:00'),
(388, 388, 2, '賣家寄出速度很慢', '2022-09-20 16:00:00'),
(389, 389, 1, '品質很差', '2022-06-21 16:00:00'),
(390, 390, 1, '品質很差', '2024-01-18 16:00:00'),
(391, 391, 3, '出貨速度有點慢', '2022-11-23 16:00:00'),
(392, 392, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-05-25 16:00:00'),
(393, 393, 5, '可以用到這個價錢買到真的太划算了', '2021-07-04 16:00:00'),
(394, 394, 5, '完全就是我想要的東西而且商品保持的超好的', '2023-09-13 16:00:00'),
(395, 395, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-10-02 16:00:00'),
(396, 396, 1, '品質很差', '2024-01-04 16:00:00'),
(397, 397, 3, '出貨速度有點慢', '2021-04-24 16:00:00'),
(398, 398, 3, '出貨速度有點慢', '2023-06-10 16:00:00'),
(399, 399, 2, '品質有點差，但是價格很便宜', '2023-12-31 16:00:00'),
(400, 400, 5, '買家出貨很快，品質和介紹相符，推推！', '2022-11-28 16:00:00'),
(401, 401, 4, '買家出貨很快，品質和介紹相符，推推！', '2021-06-09 16:00:00'),
(402, 402, 3, '品質有一點問題，不過商品還堪用', '2021-12-14 16:00:00'),
(403, 403, 4, '出貨超級快，很喜歡這個商品', '2021-08-02 16:00:00'),
(404, 404, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2023-10-14 16:00:00'),
(405, 405, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2021-07-27 16:00:00'),
(406, 406, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2021-01-05 16:00:00'),
(407, 407, 4, '出貨很快', '2022-04-23 16:00:00'),
(408, 408, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2023-06-30 16:00:00'),
(409, 409, 2, '賣家寄出速度很慢', '2023-01-04 16:00:00'),
(410, 410, 1, '品質很差', '2023-03-23 16:00:00'),
(411, 411, 1, '品質很差', '2023-07-26 16:00:00'),
(412, 412, 3, '出貨速度有點慢', '2021-11-19 16:00:00'),
(413, 413, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-11-04 16:00:00'),
(414, 414, 5, '可以用到這個價錢買到真的太划算了', '2022-03-12 16:00:00'),
(415, 415, 5, '完全就是我想要的東西而且商品保持的超好的', '2022-04-15 16:00:00'),
(416, 416, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-11-01 16:00:00'),
(417, 417, 1, '品質很差', '2023-03-28 16:00:00'),
(418, 418, 3, '出貨速度有點慢', '2021-07-07 16:00:00'),
(419, 419, 3, '出貨速度有點慢', '2022-08-24 16:00:00'),
(420, 420, 2, '品質有點差，但是價格很便宜', '2021-11-11 16:00:00'),
(421, 421, 5, '買家出貨很快，品質和介紹相符，推推！', '2021-09-29 16:00:00'),
(422, 422, 4, '買家出貨很快，品質和介紹相符，推推！', '2024-01-08 16:00:00'),
(423, 423, 3, '品質有一點問題，不過商品還堪用', '2022-05-25 16:00:00'),
(424, 424, 4, '出貨超級快，很喜歡這個商品', '2022-05-12 16:00:00'),
(425, 425, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2022-04-10 16:00:00'),
(426, 426, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2023-08-14 16:00:00'),
(427, 427, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2024-02-01 16:00:00'),
(428, 428, 4, '出貨很快', '2023-05-19 16:00:00'),
(429, 429, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2021-04-20 16:00:00'),
(430, 430, 2, '賣家寄出速度很慢', '2021-03-26 16:00:00'),
(431, 431, 1, '品質很差', '2023-06-14 16:00:00'),
(432, 432, 1, '品質很差', '2023-03-13 16:00:00'),
(433, 433, 3, '出貨速度有點慢', '2022-11-22 16:00:00'),
(434, 434, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-03-20 16:00:00'),
(435, 435, 5, '可以用到這個價錢買到真的太划算了', '2021-08-13 16:00:00'),
(436, 436, 5, '完全就是我想要的東西而且商品保持的超好的', '2022-07-25 16:00:00'),
(437, 437, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-07-26 16:00:00'),
(438, 438, 1, '品質很差', '2021-02-07 16:00:00'),
(439, 439, 3, '出貨速度有點慢', '2022-09-04 16:00:00'),
(440, 440, 3, '出貨速度有點慢', '2021-09-25 16:00:00'),
(441, 441, 2, '品質有點差，但是價格很便宜', '2023-10-16 16:00:00'),
(442, 442, 5, '買家出貨很快，品質和介紹相符，推推！', '2021-09-12 16:00:00'),
(443, 443, 4, '買家出貨很快，品質和介紹相符，推推！', '2021-07-12 16:00:00'),
(444, 444, 3, '品質有一點問題，不過商品還堪用', '2021-11-23 16:00:00'),
(445, 445, 4, '出貨超級快，很喜歡這個商品', '2023-12-29 16:00:00'),
(446, 446, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2021-08-09 16:00:00'),
(447, 447, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2023-01-06 16:00:00'),
(448, 448, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2021-05-30 16:00:00'),
(449, 449, 4, '出貨很快', '2021-12-23 16:00:00'),
(450, 450, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2023-01-31 16:00:00'),
(451, 451, 2, '賣家寄出速度很慢', '2023-04-16 16:00:00'),
(452, 452, 1, '品質很差', '2022-01-13 16:00:00'),
(453, 453, 1, '品質很差', '2023-05-04 16:00:00'),
(454, 454, 3, '出貨速度有點慢', '2023-08-19 16:00:00'),
(455, 455, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-03-08 16:00:00'),
(456, 456, 5, '可以用到這個價錢買到真的太划算了', '2022-02-23 16:00:00'),
(457, 457, 5, '完全就是我想要的東西而且商品保持的超好的', '2021-02-06 16:00:00'),
(458, 458, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-04-11 16:00:00'),
(459, 459, 1, '品質很差', '2023-05-16 16:00:00'),
(460, 460, 3, '出貨速度有點慢', '2021-08-26 16:00:00'),
(461, 461, 3, '出貨速度有點慢', '2022-05-24 16:00:00'),
(462, 462, 2, '品質有點差，但是價格很便宜', '2022-04-28 16:00:00'),
(463, 463, 5, '買家出貨很快，品質和介紹相符，推推！', '2022-05-31 16:00:00'),
(464, 464, 4, '買家出貨很快，品質和介紹相符，推推！', '2021-07-08 16:00:00'),
(465, 465, 3, '品質有一點問題，不過商品還堪用', '2023-06-01 16:00:00'),
(466, 466, 4, '出貨超級快，很喜歡這個商品', '2021-04-11 16:00:00'),
(467, 467, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2023-07-30 16:00:00'),
(468, 468, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2021-10-01 16:00:00'),
(469, 469, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2021-08-28 16:00:00'),
(470, 470, 4, '出貨很快', '2023-01-08 16:00:00'),
(471, 471, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2023-01-05 16:00:00'),
(472, 472, 2, '賣家寄出速度很慢', '2022-04-07 16:00:00'),
(473, 473, 1, '品質很差', '2021-02-17 16:00:00'),
(474, 474, 1, '品質很差', '2023-07-12 16:00:00'),
(475, 475, 3, '出貨速度有點慢', '2021-12-26 16:00:00'),
(476, 476, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-04-24 16:00:00'),
(477, 477, 5, '可以用到這個價錢買到真的太划算了', '2023-05-24 16:00:00'),
(478, 478, 5, '完全就是我想要的東西而且商品保持的超好的', '2022-09-17 16:00:00'),
(479, 479, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-06-22 16:00:00'),
(480, 480, 1, '品質很差', '2022-07-11 16:00:00'),
(481, 481, 3, '出貨速度有點慢', '2022-12-02 16:00:00'),
(482, 482, 3, '出貨速度有點慢', '2022-05-01 16:00:00'),
(483, 483, 2, '品質有點差，但是價格很便宜', '2022-12-07 16:00:00'),
(484, 484, 5, '買家出貨很快，品質和介紹相符，推推！', '2023-07-19 16:00:00'),
(485, 485, 4, '買家出貨很快，品質和介紹相符，推推！', '2022-07-30 16:00:00'),
(486, 486, 3, '品質有一點問題，不過商品還堪用', '2023-03-04 16:00:00'),
(487, 487, 4, '出貨超級快，很喜歡這個商品', '2021-04-24 16:00:00'),
(488, 488, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2021-04-20 16:00:00'),
(489, 489, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2023-10-26 16:00:00'),
(490, 490, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2023-12-13 16:00:00'),
(491, 491, 4, '出貨很快', '2021-03-30 16:00:00'),
(492, 492, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2021-04-08 16:00:00'),
(493, 493, 2, '賣家寄出速度很慢', '2022-10-04 16:00:00'),
(494, 494, 1, '品質很差', '2021-03-29 16:00:00'),
(495, 495, 1, '品質很差', '2022-12-14 16:00:00'),
(496, 496, 3, '出貨速度有點慢', '2023-09-02 16:00:00'),
(497, 497, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-05-08 16:00:00'),
(498, 498, 5, '可以用到這個價錢買到真的太划算了', '2022-05-07 16:00:00'),
(499, 499, 5, '完全就是我想要的東西而且商品保持的超好的', '2021-12-15 16:00:00'),
(500, 500, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-09-17 16:00:00'),
(501, 501, 1, '品質很差', '2021-03-10 16:00:00'),
(502, 502, 3, '出貨速度有點慢', '2022-11-07 16:00:00'),
(503, 503, 3, '出貨速度有點慢', '2021-02-04 16:00:00'),
(504, 504, 2, '品質有點差，但是價格很便宜', '2021-07-11 16:00:00'),
(505, 505, 5, '買家出貨很快，品質和介紹相符，推推！', '2021-10-12 16:00:00'),
(506, 506, 4, '買家出貨很快，品質和介紹相符，推推！', '2021-04-10 16:00:00'),
(507, 507, 3, '品質有一點問題，不過商品還堪用', '2022-03-26 16:00:00'),
(508, 508, 4, '出貨超級快，很喜歡這個商品', '2021-12-25 16:00:00'),
(509, 509, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2023-08-03 16:00:00'),
(510, 510, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2021-10-05 16:00:00'),
(511, 511, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2022-07-09 16:00:00'),
(512, 512, 4, '出貨很快', '2022-06-30 16:00:00'),
(513, 513, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2023-10-04 16:00:00'),
(514, 514, 2, '賣家寄出速度很慢', '2023-01-18 16:00:00'),
(515, 515, 1, '品質很差', '2022-12-26 16:00:00'),
(516, 516, 1, '品質很差', '2021-12-01 16:00:00'),
(517, 517, 3, '出貨速度有點慢', '2022-10-30 16:00:00'),
(518, 518, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-07-24 16:00:00'),
(519, 519, 5, '可以用到這個價錢買到真的太划算了', '2021-07-07 16:00:00'),
(520, 520, 5, '完全就是我想要的東西而且商品保持的超好的', '2023-03-27 16:00:00'),
(521, 521, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-08-15 16:00:00'),
(522, 522, 1, '品質很差', '2021-09-14 16:00:00'),
(523, 523, 3, '出貨速度有點慢', '2021-06-02 16:00:00'),
(524, 524, 3, '出貨速度有點慢', '2023-02-07 16:00:00'),
(525, 525, 2, '品質有點差，但是價格很便宜', '2021-09-25 16:00:00'),
(526, 526, 5, '買家出貨很快，品質和介紹相符，推推！', '2022-12-07 16:00:00'),
(527, 527, 4, '買家出貨很快，品質和介紹相符，推推！', '2022-11-24 16:00:00'),
(528, 528, 3, '品質有一點問題，不過商品還堪用', '2021-12-15 16:00:00'),
(529, 529, 4, '出貨超級快，很喜歡這個商品', '2021-02-03 16:00:00'),
(530, 530, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2021-03-11 16:00:00'),
(531, 531, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2021-02-13 16:00:00'),
(532, 532, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2021-06-28 16:00:00'),
(533, 533, 4, '出貨很快', '2023-06-02 16:00:00'),
(534, 534, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2022-09-10 16:00:00'),
(535, 535, 2, '賣家寄出速度很慢', '2021-08-03 16:00:00'),
(536, 536, 1, '品質很差', '2021-11-28 16:00:00'),
(537, 537, 1, '品質很差', '2022-03-25 16:00:00'),
(538, 538, 3, '出貨速度有點慢', '2022-09-04 16:00:00'),
(539, 539, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-05-16 16:00:00'),
(540, 540, 5, '可以用到這個價錢買到真的太划算了', '2021-04-01 16:00:00'),
(541, 541, 5, '完全就是我想要的東西而且商品保持的超好的', '2022-09-06 16:00:00'),
(542, 542, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-12-14 16:00:00'),
(543, 543, 1, '品質很差', '2022-08-04 16:00:00'),
(544, 544, 3, '出貨速度有點慢', '2021-09-26 16:00:00'),
(545, 545, 3, '出貨速度有點慢', '2023-07-22 16:00:00'),
(546, 546, 2, '品質有點差，但是價格很便宜', '2022-04-07 16:00:00'),
(547, 547, 5, '買家出貨很快，品質和介紹相符，推推！', '2021-08-24 16:00:00'),
(548, 548, 4, '買家出貨很快，品質和介紹相符，推推！', '2022-03-27 16:00:00'),
(549, 549, 3, '品質有一點問題，不過商品還堪用', '2023-04-09 16:00:00'),
(550, 550, 4, '出貨超級快，很喜歡這個商品', '2023-11-20 16:00:00'),
(551, 551, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2023-08-11 16:00:00'),
(552, 552, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2022-07-31 16:00:00'),
(553, 553, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2022-10-17 16:00:00'),
(554, 554, 4, '出貨很快', '2022-07-27 16:00:00'),
(555, 555, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2022-10-31 16:00:00'),
(556, 556, 2, '賣家寄出速度很慢', '2021-03-25 16:00:00'),
(557, 557, 1, '品質很差', '2022-12-13 16:00:00'),
(558, 558, 1, '品質很差', '2021-03-27 16:00:00'),
(559, 559, 3, '出貨速度有點慢', '2021-03-14 16:00:00'),
(560, 560, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-05-29 16:00:00'),
(561, 561, 5, '可以用到這個價錢買到真的太划算了', '2021-12-18 16:00:00'),
(562, 562, 5, '完全就是我想要的東西而且商品保持的超好的', '2021-05-06 16:00:00'),
(563, 563, 4, '賣家超好的，知道有急用很快速就寄出了', '2024-01-30 16:00:00'),
(564, 564, 1, '品質很差', '2022-10-27 16:00:00'),
(565, 565, 3, '出貨速度有點慢', '2021-12-22 16:00:00'),
(566, 566, 3, '出貨速度有點慢', '2021-12-27 16:00:00'),
(567, 567, 2, '品質有點差，但是價格很便宜', '2021-12-26 16:00:00'),
(568, 568, 5, '買家出貨很快，品質和介紹相符，推推！', '2022-01-15 16:00:00'),
(569, 569, 4, '買家出貨很快，品質和介紹相符，推推！', '2021-10-18 16:00:00'),
(570, 570, 3, '品質有一點問題，不過商品還堪用', '2022-10-03 16:00:00'),
(571, 571, 4, '出貨超級快，很喜歡這個商品', '2021-11-22 16:00:00'),
(572, 572, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2021-09-01 16:00:00'),
(573, 573, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2021-06-30 16:00:00'),
(574, 574, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2023-03-17 16:00:00'),
(575, 575, 4, '出貨很快', '2021-01-11 16:00:00'),
(576, 576, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2022-07-12 16:00:00'),
(577, 577, 2, '賣家寄出速度很慢', '2022-04-17 16:00:00'),
(578, 578, 1, '品質很差', '2021-03-08 16:00:00'),
(579, 579, 1, '品質很差', '2021-07-25 16:00:00'),
(580, 580, 3, '出貨速度有點慢', '2021-12-16 16:00:00'),
(581, 581, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-04-09 16:00:00'),
(582, 582, 5, '可以用到這個價錢買到真的太划算了', '2023-06-19 16:00:00'),
(583, 583, 5, '完全就是我想要的東西而且商品保持的超好的', '2021-01-14 16:00:00'),
(584, 584, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-06-14 16:00:00'),
(585, 585, 1, '品質很差', '2021-06-24 16:00:00'),
(586, 586, 3, '出貨速度有點慢', '2023-10-22 16:00:00'),
(587, 587, 3, '出貨速度有點慢', '2023-11-19 16:00:00'),
(588, 588, 2, '品質有點差，但是價格很便宜', '2022-10-01 16:00:00'),
(589, 589, 1, '品質很差', '2023-11-29 16:00:00'),
(590, 590, 3, '出貨速度有點慢', '2024-01-19 16:00:00'),
(591, 591, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-08-19 16:00:00'),
(592, 592, 5, '可以用到這個價錢買到真的太划算了', '2023-06-19 16:00:00'),
(593, 593, 5, '完全就是我想要的東西而且商品保持的超好的', '2021-01-04 16:00:00'),
(594, 594, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-05-27 16:00:00'),
(595, 595, 1, '品質很差', '2022-03-08 16:00:00'),
(596, 596, 3, '出貨速度有點慢', '2022-09-25 16:00:00'),
(597, 597, 3, '出貨速度有點慢', '2022-06-03 16:00:00'),
(598, 598, 2, '品質有點差，但是價格很便宜', '2023-07-18 16:00:00'),
(599, 599, 5, '買家出貨很快，品質和介紹相符，推推！', '2021-11-23 16:00:00'),
(600, 600, 4, '買家出貨很快，品質和介紹相符，推推！', '2021-07-08 16:00:00'),
(601, 601, 3, '品質有一點問題，不過商品還堪用', '2023-03-21 16:00:00'),
(602, 602, 4, '出貨超級快，很喜歡這個商品', '2022-11-19 16:00:00'),
(603, 603, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2021-03-08 16:00:00'),
(604, 604, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2023-08-12 16:00:00'),
(605, 605, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2022-03-30 16:00:00'),
(606, 606, 4, '出貨很快', '2021-03-05 16:00:00'),
(607, 607, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2021-04-14 16:00:00'),
(608, 608, 2, '賣家寄出速度很慢', '2023-12-10 16:00:00'),
(609, 609, 1, '品質很差', '2023-03-08 16:00:00'),
(610, 610, 1, '品質很差', '2021-08-19 16:00:00'),
(611, 611, 3, '出貨速度有點慢', '2021-05-07 16:00:00'),
(612, 612, 4, '賣家超好的，知道有急用很快速就寄出了', '2022-11-28 16:00:00'),
(613, 613, 5, '可以用到這個價錢買到真的太划算了', '2023-11-08 16:00:00'),
(614, 614, 5, '完全就是我想要的東西而且商品保持的超好的', '2022-05-30 16:00:00'),
(615, 615, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-09-28 16:00:00'),
(616, 616, 1, '品質很差', '2021-03-24 16:00:00'),
(617, 617, 3, '出貨速度有點慢', '2021-04-18 16:00:00'),
(618, 618, 3, '出貨速度有點慢', '2022-03-14 16:00:00'),
(619, 619, 2, '品質有點差，但是價格很便宜', '2021-10-01 16:00:00'),
(620, 620, 5, '買家出貨很快，品質和介紹相符，推推！', '2022-02-06 16:00:00'),
(621, 621, 4, '買家出貨很快，品質和介紹相符，推推！', '2022-01-07 16:00:00'),
(622, 622, 3, '品質有一點問題，不過商品還堪用', '2023-08-05 16:00:00'),
(623, 623, 4, '出貨超級快，很喜歡這個商品', '2023-08-17 16:00:00'),
(624, 624, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2021-03-08 16:00:00'),
(625, 625, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2023-01-06 16:00:00'),
(626, 626, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2022-09-17 16:00:00'),
(627, 627, 4, '出貨很快', '2021-03-25 16:00:00'),
(628, 628, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2023-01-03 16:00:00'),
(629, 629, 2, '賣家寄出速度很慢', '2023-06-12 16:00:00'),
(630, 630, 1, '品質很差', '2021-01-29 16:00:00'),
(631, 631, 1, '品質很差', '2023-05-31 16:00:00'),
(632, 632, 3, '出貨速度有點慢', '2021-09-16 16:00:00'),
(633, 633, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-07-30 16:00:00'),
(634, 634, 5, '可以用到這個價錢買到真的太划算了', '2023-12-12 16:00:00'),
(635, 635, 5, '完全就是我想要的東西而且商品保持的超好的', '2022-05-28 16:00:00'),
(636, 636, 4, '賣家超好的，知道有急用很快速就寄出了', '2023-05-01 16:00:00'),
(637, 637, 1, '品質很差', '2023-04-05 16:00:00'),
(638, 638, 3, '出貨速度有點慢', '2021-08-01 16:00:00'),
(639, 639, 3, '出貨速度有點慢', '2021-09-29 16:00:00'),
(640, 640, 2, '品質有點差，但是價格很便宜', '2021-01-13 16:00:00'),
(641, 641, 5, '買家出貨很快，品質和介紹相符，推推！', '2022-06-22 16:00:00'),
(642, 642, 4, '買家出貨很快，品質和介紹相符，推推！', '2022-07-11 16:00:00'),
(643, 643, 3, '品質有一點問題，不過商品還堪用', '2022-04-24 16:00:00'),
(644, 644, 4, '出貨超級快，很喜歡這個商品', '2022-02-27 16:00:00'),
(645, 645, 1, '商品有破損而且無法開啟，負評，購買這個賣家的商品前要特別注意', '2021-08-18 16:00:00'),
(646, 646, 2, '第一次用以物易物的方式交易，總覺得換到的東西有點不值錢', '2022-07-08 16:00:00'),
(647, 647, 5, '賣家商品保持得很好，基本上根本是新的商品超棒的', '2023-03-22 16:00:00'),
(648, 648, 4, '出貨很快', '2021-07-23 16:00:00'),
(649, 649, 5, '第一次以物易物，可以二手商品持續循環，還可以獲得有用的東西，覺得很棒', '2022-08-16 16:00:00'),
(650, 650, 2, '賣家寄出速度很慢', '2023-09-08 16:00:00'),
(652, 652, 1, '品質很差', '2021-05-30 16:00:00'),
(653, 653, 3, '出貨速度有點慢', '2023-11-01 16:00:00'),
(656, 656, 5, '完全就是我想要的東西而且商品保持的超好的', '2020-12-31 16:00:00'),
(657, 657, 4, '賣家超好的，知道有急用很快速就寄出了', '2021-05-18 16:00:00'),
(660, 660, 3, '出貨速度有點慢', '2023-07-27 16:00:00'),
(661, 661, 2, '品質有點差，但是價格很便宜', '2023-08-04 16:00:00'),
(662, 858, 5, '讚', '2024-02-10 17:44:45'),
(663, 362, 4, '123456789', '2024-02-10 18:02:51'),
(671, 965, 1, '不佳', '2024-02-12 20:19:02'),
(672, 768, 3, '普通', '2024-02-12 20:19:02'),
(673, 11, 5, 'test', '2024-02-13 10:49:32');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=674;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
