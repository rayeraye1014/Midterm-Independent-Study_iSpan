-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-02-13 12:37:39
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
-- 資料表結構 `categories_sub`
--

CREATE TABLE `categories_sub` (
  `id` int NOT NULL,
  `sub` varchar(15) NOT NULL,
  `main_category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `categories_sub`
--

INSERT INTO `categories_sub` (`id`, `sub`, `main_category`) VALUES
(1, '桌上型電腦', 2),
(2, '筆記型電腦', 2),
(3, '電腦周邊商品', 2),
(4, '印表機與影印機', 2),
(5, '其他', 2),
(6, '手機', 3),
(7, '平板電腦', 3),
(8, '智慧型穿戴裝置與智慧手錶', 3),
(9, '電子周邊配件', 3),
(10, '其他', 3),
(11, '上身與套裝', 4),
(12, '褲子', 4),
(13, '鞋', 4),
(14, '外套', 4),
(15, '包', 4),
(16, '手錶及配件', 4),
(17, '運動服裝', 4),
(18, '其他', 4),
(19, '上衣', 5),
(20, '褲子與裙子', 5),
(21, '洋裝與套裝', 5),
(22, '鞋', 5),
(23, '外套', 5),
(24, '包', 5),
(25, '飾品', 5),
(26, '手錶與配件', 5),
(27, '內衣與休閒服', 5),
(28, '運動服裝', 5),
(29, '孕婦服裝', 5),
(30, '其他', 5),
(31, '個人消毒用品', 6),
(32, '手部與指甲護理', 6),
(33, '耳朵護理', 6),
(34, '眼部護理', 6),
(35, '足部護理', 6),
(36, '口腔護理', 6),
(37, '個人衛生清潔', 6),
(38, '香體噴霧', 6),
(39, '沐浴與身體護理', 6),
(40, '臉部護理', 6),
(41, '頭髮護理', 6),
(42, '男士美容', 6),
(43, '其他', 6),
(44, '精品包與皮夾', 7),
(45, '精品服飾', 7),
(46, '精品配件', 7),
(47, '精品手錶', 7),
(48, '精品鞋款', 7),
(49, '其他', 7),
(50, '電子遊戲機', 8),
(51, '電子遊戲', 8),
(52, '電玩周邊與設備', 8),
(53, '其他', 8),
(54, '耳機', 9),
(55, '麥克風', 9),
(56, '錄音機', 9),
(57, '音樂播放裝置', 9),
(58, '音響設備', 9),
(59, '其他', 9),
(60, '相機', 10),
(61, '鏡頭與裝備', 10),
(62, '空拍機', 10),
(63, '攝影機', 10),
(64, '攝影配件', 10),
(65, '其他', 10),
(66, '家具', 11),
(67, '戶外家具', 11),
(68, '燈飾與風扇', 11),
(69, '居家裝飾', 11),
(70, '居家香薰', 11),
(71, '床具浴巾', 11),
(72, '浴室及廚房用品配件', 11),
(73, '居家收納用品', 11),
(74, '居家清潔與護理用品', 11),
(75, '廚具和餐具', 11),
(76, '安全與門鎖', 11),
(77, '園藝', 11),
(78, '其他', 11),
(79, '電視與其他電器', 12),
(80, '廚房用品', 12),
(81, '冷氣機與電暖器', 12),
(82, '洗衣機與乾衣機', 12),
(83, '吸塵器與家居清潔用品', 12),
(84, '熱水器與淋浴設備', 12),
(85, '空氣清淨機與除濕機', 12),
(86, '轉換器與插頭', 12),
(87, '熨斗與掛熨機', 12),
(88, '其他', 12),
(89, '嬰兒與兒童時尚', 13),
(90, '兒童家具', 13),
(91, '外出用品', 13),
(92, '洗澡與尿布', 13),
(93, '護理與哺育用品', 13),
(94, '嬰兒監視器', 13),
(95, '孕婦用品', 13),
(96, '嬰兒玩具', 13),
(97, '其他', 13),
(98, '殺蟲劑', 14),
(99, '按摩紓緩用品', 14),
(100, '輔具與護具', 14),
(101, '口罩與面罩', 14),
(102, '保健食品', 14),
(103, '其他', 14),
(104, '運動與比賽用品', 15),
(105, '健身用品', 15),
(106, '自行車與配件', 15),
(107, '釣魚', 15),
(108, '健行與露營', 15),
(109, '其他', 15),
(110, '飯麵', 16),
(111, '手作食品', 16),
(112, '飲料', 16),
(113, '罐裝食品與即食食品', 16),
(114, '新鮮食品', 16),
(115, '調味料', 16),
(116, '冰凍食品', 16),
(117, '禮品藍和禮籃', 16),
(118, '其他', 16),
(119, '寵物周邊用品', 17),
(120, '寵物食品', 17),
(121, '寵物健康與美容', 17),
(122, '景點門票與交通', 18),
(123, '優惠券', 18),
(124, '活動門票', 18),
(125, '商店或商場現金券', 18),
(126, '機票與海外景點', 18),
(127, '其他', 18),
(128, '新機車', 19),
(129, '新古保固機車', 19),
(130, '二手機車', 19),
(131, '電動機車', 19),
(132, '重機', 19),
(133, '汽車', 19),
(134, '汽車零件', 19),
(135, '其他', 19),
(148, '免費禮物', 1),
(149, '其他其他', 20),
(151, '書籍', 20),
(152, '全新類別', 20),
(153, '新增子分類', 5),
(154, 'test', 6),
(156, '﻿新子分類別', 5),
(158, '免費禮物', 4),
(159, '﻿書籍', 20),
(160, '全新類別', 20),
(161, '新增子分類', 5),
(162, 'test', 6),
(163, '﻿新子分類別', 5),
(164, '免費禮物', 4);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `categories_sub`
--
ALTER TABLE `categories_sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_category` (`main_category`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `categories_sub`
--
ALTER TABLE `categories_sub`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `categories_sub`
--
ALTER TABLE `categories_sub`
  ADD CONSTRAINT `categories_sub_ibfk_1` FOREIGN KEY (`main_category`) REFERENCES `categories_main` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;