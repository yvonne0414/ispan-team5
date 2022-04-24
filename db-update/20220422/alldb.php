-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 04 月 24 日 18:24
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- 資料庫: `9hunters_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `bartd_cate_list`
--

DROP TABLE IF EXISTS `bartd_cate_list`;
CREATE TABLE `bartd_cate_list` (
  `id` int(3) UNSIGNED NOT NULL,
  `bartd_id` int(4) NOT NULL,
  `bartd_cate_id_m` int(3) NOT NULL,
  `bartd_cate_id_s` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `bartd_cate_list`
--

INSERT INTO `bartd_cate_list` (`id`, `bartd_id`, `bartd_cate_id_m`, `bartd_cate_id_s`) VALUES
(1, 1, 3, 30),
(2, 1, 4, 36),
(3, 2, 1, 15),
(4, 2, 3, 33),
(5, 2, 4, 38),
(6, 3, 1, 7),
(7, 3, 3, 30),
(8, 4, 1, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `bartd_cate_type`
--

DROP TABLE IF EXISTS `bartd_cate_type`;
CREATE TABLE `bartd_cate_type` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(2) NOT NULL,
  `parent_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `bartd_cate_type`
--

INSERT INTO `bartd_cate_type` (`id`, `name`, `level`, `parent_id`) VALUES
(1, '類型', 1, 0),
(2, '杯形', 1, 0),
(3, '調法', 1, 0),
(4, '飲用方式', 1, 0),
(5, 'Cocktail', 2, 1),
(6, 'Highball', 2, 1),
(7, 'Sour', 2, 1),
(8, 'Collins', 2, 1),
(9, 'Buck', 2, 1),
(10, 'Dessert', 2, 1),
(11, 'Tiki\'s', 2, 1),
(12, 'Duo', 2, 1),
(13, 'Trio', 2, 1),
(14, 'Fancy', 2, 1),
(15, 'Frozen', 2, 1),
(16, 'Sling', 2, 1),
(17, 'Frappe', 2, 1),
(18, 'Punch', 2, 1),
(19, 'Fizz', 2, 1),
(20, 'Mojito Glass', 2, 2),
(21, 'Cocktail Glass', 2, 2),
(22, 'Collins Glass', 2, 2),
(23, 'Highball Glass', 2, 2),
(24, 'Old Fashioned', 2, 2),
(25, 'Hurricane Glass', 2, 2),
(26, 'Champagne Saucer', 2, 2),
(27, 'Margarita Glass', 2, 2),
(28, 'Champagne Glass', 2, 2),
(29, 'Brandy Glass', 2, 2),
(30, 'Build', 2, 3),
(31, 'Stir', 2, 3),
(32, 'Shake', 2, 3),
(33, 'Blend', 2, 3),
(34, 'Roll', 2, 3),
(35, 'Straight', 2, 4),
(36, 'Longdrink', 2, 4),
(37, 'On the Rock', 2, 4),
(38, 'Frozen', 2, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `bartd_list`
--

DROP TABLE IF EXISTS `bartd_list`;
CREATE TABLE `bartd_list` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `bartd_list`
--

INSERT INTO `bartd_list` (`id`, `name`, `img`, `recipe`) VALUES
(1, '米奇拉達  Micheladas', 'A008.jpg', '１．將啤酒以外的材料加入做好粉口的握把式啤酒杯\r\n２．攪拌均勻後，插入啤酒\r\n３．最後放上裝飾物即可\r\n\r\n裝飾物：Tajin墨西哥調味粉、檸檬角'),
(2, '草莓黛綺莉', 'R037.jpg', '１．調理機加入所有材料及冰塊。\r\n２．將打製均勻的成品倒入淺碟香檳杯(大)。\r\n\r\n建議裝飾物：雙片草莓切片、草莓碎'),
(3, '皇后公園希維索', 'R034.jpg', '１．將苦精以外的材料倒入杯中，加入八分滿碎冰。\r\n２．劇烈攪拌所有材料後，補滿碎冰。\r\n３．酒液表面灑上苦精，置頂裝飾\r\n\r\n裝飾物：薄荷葉'),
(4, 'QQ', 'YN-02.jpeg', 'good');

-- --------------------------------------------------------

--
-- 資料表結構 `bartd_material`
--

DROP TABLE IF EXISTS `bartd_material`;
CREATE TABLE `bartd_material` (
  `id` int(3) UNSIGNED NOT NULL,
  `bartd_id` int(3) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mater_amount` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mater_cate_l` int(3) NOT NULL,
  `mater_cate_m` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `bartd_material`
--

INSERT INTO `bartd_material` (`id`, `bartd_id`, `name`, `mater_amount`, `mater_cate_l`, `mater_cate_m`) VALUES
(1, 4, '草莓', '2顆', 2, 18);

-- --------------------------------------------------------

--
-- 資料表結構 `coupon_cate`
--

DROP TABLE IF EXISTS `coupon_cate`;
CREATE TABLE `coupon_cate` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `coupon_cate`
--

INSERT INTO `coupon_cate` (`id`, `name`) VALUES
(1, '折抵'),
(2, '折扣（％）');

-- --------------------------------------------------------

--
-- 資料表結構 `coupon_list`
--

DROP TABLE IF EXISTS `coupon_list`;
CREATE TABLE `coupon_list` (
  `id` int(3) UNSIGNED NOT NULL,
  `coupon_cate` int(3) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(4) NOT NULL,
  `rule_min` int(4) NOT NULL,
  `rule_max` int(4) NOT NULL,
  `vip_level` int(2) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `coupon_list`
--

INSERT INTO `coupon_list` (`id`, `coupon_cate`, `name`, `discount`, `rule_min`, `rule_max`, `vip_level`, `start_time`, `end_time`) VALUES
(1, 1, '首購百元優惠券', 100, 1000, 9999, 2, '2022-04-24', '2022-04-30'),
(2, 1, '國慶優惠 200元', 200, 1000, 9999, 2, '2022-04-20', '2022-04-30');

-- --------------------------------------------------------

--
-- 資料表結構 `group_chatroom`
--

DROP TABLE IF EXISTS `group_chatroom`;
CREATE TABLE `group_chatroom` (
  `id` int(3) UNSIGNED NOT NULL,
  `group_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `content` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `group_list`
--

DROP TABLE IF EXISTS `group_list`;
CREATE TABLE `group_list` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `disc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(3) NOT NULL,
  `max_num` int(3) NOT NULL,
  `pass_num` int(3) NOT NULL,
  `now_num` int(3) NOT NULL,
  `is_official` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `activity_start_time` datetime NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `group_list`
--

INSERT INTO `group_list` (`id`, `name`, `disc`, `user_id`, `max_num`, `pass_num`, `now_num`, `is_official`, `status`, `activity_start_time`, `start_time`, `end_time`) VALUES
(1, '歡迎來到INJOIN，大家今天飲酒了嗎？', '會員品酒日，大家酒歸來呀！每月一次的品酒會要開始啦！有興趣捧友們照過來呀！', 2, 30, 15, 0, 1, 1, '2022-05-07 00:00:00', '2022-04-28 00:00:00', '2022-04-28 00:00:00'),
(2, '首次活動開跑啦！', '會員相見歡，是時候拿出各位的真本領了！', 2, 20, 10, 12, 1, 6, '2022-04-15 00:00:00', '2022-04-03 00:00:00', '2022-04-09 00:00:00'),
(3, '主題派對式', 'test', 2, 50, 20, 3, 1, 2, '2022-04-30 00:00:00', '2022-04-24 00:00:00', '2022-04-28 00:00:00'),
(4, 'test4', 'test4', 2, 20, 5, 6, 1, 4, '2022-04-30 00:00:00', '2022-04-24 00:00:00', '2022-04-28 00:00:00'),
(5, 'test5', 'test5', 2, 18, 12, 0, 1, 3, '2022-04-22 00:00:00', '2022-04-17 00:00:00', '2022-04-21 00:00:00'),
(6, 'test6', 'test6', 2, 10, 5, 10, 1, 5, '2022-04-30 00:00:00', '2022-04-21 00:00:00', '2022-04-23 00:00:00'),
(7, '我有酒你有故事嗎？', '鬼故事膽小者勿入', 3, 10, 5, 1, 2, 1, '2022-04-27 19:30:00', '2022-04-27 13:00:00', '2022-04-27 15:00:00'),
(8, '我要來揪團', '客戶端測試', 3, 10, 5, 1, 2, 2, '2022-05-07 00:08:00', '2022-04-24 12:08:00', '2022-04-29 12:08:00');

-- --------------------------------------------------------

--
-- 資料表結構 `group_official`
--

DROP TABLE IF EXISTS `group_official`;
CREATE TABLE `group_official` (
  `id` int(3) UNSIGNED NOT NULL,
  `group_id` int(3) NOT NULL,
  `vip_level` int(2) NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `group_official`
--

INSERT INTO `group_official` (`id`, `group_id`, `vip_level`, `price`) VALUES
(1, 1, 2, 1200),
(2, 2, 2, 800),
(3, 3, 2, 1500),
(4, 4, 2, 500),
(5, 5, 2, 300),
(6, 6, 3, 200);

-- --------------------------------------------------------

--
-- 資料表結構 `group_participant`
--

DROP TABLE IF EXISTS `group_participant`;
CREATE TABLE `group_participant` (
  `id` int(3) UNSIGNED NOT NULL,
  `group_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `group_status`
--

DROP TABLE IF EXISTS `group_status`;
CREATE TABLE `group_status` (
  `id` int(3) NOT NULL,
  `status_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `group_status`
--

INSERT INTO `group_status` (`id`, `status_name`) VALUES
(1, '未開團'),
(2, '開團中'),
(3, '未成團'),
(4, '已成團'),
(5, '已結團'),
(6, '活動已結束'),
(7, '刪除');

-- --------------------------------------------------------

--
-- 資料表結構 `logistics_cate`
--

DROP TABLE IF EXISTS `logistics_cate`;
CREATE TABLE `logistics_cate` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `logistics_cate`
--

INSERT INTO `logistics_cate` (`id`, `name`) VALUES
(1, '郵局'),
(2, '黑貓');

-- --------------------------------------------------------

--
-- 資料表結構 `logistics_state_cate`
--

DROP TABLE IF EXISTS `logistics_state_cate`;
CREATE TABLE `logistics_state_cate` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `logistics_state_cate`
--

INSERT INTO `logistics_state_cate` (`id`, `name`) VALUES
(1, '待出貨'),
(2, '已出貨'),
(3, '已送達'),
(4, '已取消');

-- --------------------------------------------------------

--
-- 資料表結構 `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(3) NOT NULL,
  `parent_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `id` int(3) UNSIGNED NOT NULL,
  `order_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_id` int(3) NOT NULL,
  `amount` int(3) NOT NULL,
  `is_packaging` int(1) NOT NULL,
  `packaging_cate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `prd_id`, `amount`, `is_packaging`, `packaging_cate`) VALUES
(1, '4d9f2e41-1f19-ef4d-92f8-518d61a2158d', 1, 2, 0, 1),
(2, '4d9f2e41-1f19-ef4d-92f8-518d61a2158d', 2, 4, 0, 1),
(3, '4d9f2e41-1f19-ef4d-92f8-518d61a2158d', 3, 4, 0, 1),
(4, '1d3b713c-f001-4139-8dd0-7f94b20185e6', 1, 2, 0, 1),
(5, '1d3b713c-f001-4139-8dd0-7f94b20185e6', 2, 4, 0, 1),
(6, '1d3b713c-f001-4139-8dd0-7f94b20185e6', 3, 4, 0, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `order_list`
--

DROP TABLE IF EXISTS `order_list`;
CREATE TABLE `order_list` (
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(3) NOT NULL,
  `logistics` int(2) NOT NULL,
  `logistics_state` int(2) NOT NULL,
  `order_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order_list`
--

INSERT INTO `order_list` (`id`, `user_id`, `logistics`, `logistics_state`, `order_time`) VALUES
('1d3b713c-f001-4139-8dd0-7f94b20185e6', 3, 1, 1, '2022-04-24 13:21:16'),
('4d9f2e41-1f19-ef4d-92f8-518d61a2158d', 3, 1, 1, '2022-04-24 13:09:59');

-- --------------------------------------------------------

--
-- 資料表結構 `packaging _cate`
--

DROP TABLE IF EXISTS `packaging _cate`;
CREATE TABLE `packaging _cate` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packaging_img` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` int(3) NOT NULL,
  `width` int(3) NOT NULL,
  `height` int(3) NOT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `prd_detail_cate`
--

DROP TABLE IF EXISTS `prd_detail_cate`;
CREATE TABLE `prd_detail_cate` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(3) NOT NULL,
  `parent_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `prd_detail_cate`
--

INSERT INTO `prd_detail_cate` (`id`, `name`, `level`, `parent_id`) VALUES
(1, '基酒', 1, 0),
(2, '副材料', 1, 0),
(3, '器材', 1, 0),
(4, '杯具', 1, 0),
(5, '伏特加', 2, 1),
(6, '蘭姆酒', 2, 1),
(7, '白蘭地', 2, 1),
(8, '香甜酒', 2, 1),
(9, '琴酒', 2, 1),
(10, '龍舌蘭', 2, 1),
(11, '威士忌', 2, 1),
(12, '其他', 2, 1),
(13, '調味材料', 2, 2),
(14, '無酒精酒款', 2, 2),
(15, '冰塊', 2, 2),
(16, '糖漿＆酸甜汁', 2, 2),
(17, '碳酸飲料', 2, 2),
(18, '醃漬水果、果乾', 2, 2),
(19, '果汁', 2, 2),
(20, '雪克杯', 2, 3),
(21, '調酒杯', 2, 3),
(22, '量酒器', 2, 3),
(23, '搗棒＆吧匙', 2, 3),
(24, '隔冰匙＆過濾工具', 2, 3),
(25, '清潔、收納、吧台墊', 2, 3),
(26, '酒嘴、酒塞、開瓶器', 2, 3),
(27, '酒叉、調棒、裝飾物', 2, 3),
(28, '冰鏟、冰鑿、製冰盒', 2, 3),
(29, '刀具、榨汁器與其他', 2, 3),
(30, '相關書籍', 2, 3),
(31, '馬丁尼杯', 2, 4),
(32, '威士忌杯', 2, 4),
(33, '可林／高球杯', 2, 4),
(34, '香檳杯', 2, 4),
(35, '颶風杯', 2, 4),
(36, '烈酒杯', 2, 4),
(37, '啤酒杯', 2, 4),
(38, '長飲杯', 2, 4),
(39, '品飲杯', 2, 4),
(40, '飛碟杯', 2, 4),
(41, '公杯/酒壺/醒酒器', 2, 4),
(42, '杯盤組', 2, 4),
(43, '營業用杯具特價區', 2, 4),
(44, 'Lucaris盒裝杯具', 2, 4),
(45, '基礎伏特加', 3, 5),
(46, '精選伏特加', 3, 5),
(47, '頂級伏特加', 3, 5),
(48, '高濃度伏特加', 3, 5),
(49, '特殊伏特加', 3, 5),
(50, '調味伏特加', 3, 5),
(51, '伏特加禮盒', 3, 5),
(52, '白蘭姆酒', 3, 6),
(53, '牙買加蘭姆酒', 3, 6),
(54, '高濃度蘭姆酒', 3, 6),
(55, '香料蘭姆酒', 3, 6),
(56, '陳年蘭姆酒', 3, 6),
(57, '巴西甘蔗酒', 3, 6),
(58, '干邑白蘭地', 3, 7),
(59, '其他水果白蘭地', 3, 7),
(60, '皮斯可', 3, 7),
(61, '經典香甜酒', 3, 8),
(62, '常用香甜酒', 3, 8),
(63, '多口味香甜酒', 3, 8),
(64, '日本水果香甜酒', 3, 8),
(65, '咖啡酒精選', 3, 8),
(66, '英式琴酒', 3, 9),
(67, '調味琴酒', 3, 9),
(68, '蒸餾琴酒', 3, 9),
(69, '阿瓜維特酒', 3, 9),
(70, '日本琴酒', 3, 9),
(71, '龍舌蘭-銀', 3, 10),
(72, '龍舌蘭-金', 3, 10),
(73, '龍舌蘭-白金', 3, 10),
(74, '龍舌蘭-短陳年', 3, 10),
(75, '龍舌蘭-長陳年', 3, 10),
(76, '梅斯卡爾酒', 3, 10),
(77, '裸麥威士忌', 3, 11),
(78, '波本威士忌', 3, 11),
(79, '其他美國威士忌', 3, 11),
(80, '蘇格蘭-調和式', 3, 11),
(81, '蘇格蘭-單一純麥', 3, 11),
(82, '日本威士忌', 3, 11),
(83, '愛爾蘭威士忌', 3, 11),
(84, '加拿大威士忌', 3, 11),
(85, '雅沐特威士忌', 3, 11),
(86, '瓶裝雞尾酒', 3, 12),
(87, '茶酒＆梅酒精選', 3, 12),
(88, '啤酒＆發泡酒', 3, 12),
(89, '精選葡萄酒', 3, 12),
(90, '氣泡酒', 3, 12),
(91, '香艾酒', 3, 12),
(92, '苦艾酒', 3, 12),
(93, '香檳', 3, 12),
(94, '苦精', 3, 12),
(95, '開胃酒', 3, 12),
(96, '日本燒酎', 3, 12),
(97, '雪莉酒＆波特酒', 3, 12),
(98, '樣品酒&特殊容量', 3, 12),
(99, '清酒與特殊日本酒', 3, 12);

-- --------------------------------------------------------

--
-- 資料表結構 `prd_img`
--

DROP TABLE IF EXISTS `prd_img`;
CREATE TABLE `prd_img` (
  `id` int(3) UNSIGNED NOT NULL,
  `prd_id` int(3) NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `prd_list`
--

DROP TABLE IF EXISTS `prd_list`;
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
-- 傾印資料表的資料 `prd_list`
--

INSERT INTO `prd_list` (`id`, `prd_num`, `name`, `main_img`, `price`, `disc`, `disc_img`, `length`, `width`, `height`, `inventory_quantity`, `sale_quantity`, `category`, `status`, `create_time`) VALUES
(1, 'AWB13B', '金賓黑波本威士忌 ', 'AWB13B.jpeg', 550, '金賓<黑>美國波本威士忌為具有豐富風味口感的波本威士忌，風味優雅、順口、精緻 ─ 這就是長期陳年後的臻至完美的波本口感。金賓<黑>美國波本威士忌在白橡木桶中長期陳年，長時間的醞釀與呼吸使得其酒體渾厚，並且有著絲綢般滑順的焦糖風味和溫暖的橡木桶口感。', NULL, 1100, 120, 250, 45, 0, 1, 1, '2022-04-21 22:50:29'),
(2, 'AG22', '亨利爵士  Hendrick`s', 'AG22.jpeg', 950, '亨利爵士在蒸餾過程中加入保加利亞玫瑰與荷蘭小黃瓜，透過四次緩速蒸餾，酒體輕盈刺激性低，如果您喝不慣杜松子味強烈或是口感厚重的琴酒，不妨考慮這琴酒界的小龍女，清新脫俗又不失英式琴酒風範，調酒搭配食用玫瑰或小黃瓜，能提味又可增添飲用樂趣優～', NULL, 200, 100, 200, 200, 0, 1, 2, '2022-04-21 23:01:24'),
(3, 'YN-02', '紅石榴糖漿', 'YN-02.jpeg', 140, '甜甜的很好吃！', NULL, 150, 50, 150, 200, 0, 2, 2, '2022-04-21 23:05:29'),
(4, 'GW02', '夜問威士忌杯', 'GW02.jpeg', 175, '威士忌杯又被稱為Rock杯或Old-fashioned杯，以厚底、大杯口與岩石造型為特色，除了加冰、加水品飲威士忌，亦可作為雞尾酒杯使用～\r\n‧夜問威士忌杯杯面宛如岩石面的紋路相當特殊，容量也相當大（420ml），很適合調製長飲型雞尾酒～', NULL, 83, 83, 105, 34, 0, 4, 1, '2022-04-21 23:11:51'),
(5, 'BS-02', '吧叉匙（短)', 'BS-02.jpeg', 65, '吧叉匙用於以攪拌法製作的調酒，將材料放入調酒杯後加入冰塊，以吧叉匙攪拌均勻再用隔冰匙濾掉冰塊，將酒液倒入杯中，通常與隔冰匙和調酒杯搭配使用~', NULL, 10, 10, 260, 300, 0, 3, 1, '2022-04-21 23:16:22'),
(6, 'AV11', '俄羅斯斯丹達（一公升） Russian Standard（1L）', 'AV11.jpg', 699, '俄羅斯斯丹達以西伯利亞草原的黑土小麥為原料，並採用俄羅斯北部拉多加湖的冰川融水調和，經四次蒸餾與四次過濾，得到這純淨、酒體醇厚的優質伏特加，帶有微微的麵包與香草味，可說是俄羅斯伏特加的完美詮釋。', NULL, 60, 15, 15, 4, 0, 1, 1, '2022-04-22 15:28:42'),
(7, 'AV11R', '帝威  IMPERIA', 'AV11R.jpg', 1800, '伏特加王者的代名詞\r\n俄羅斯斯丹達酒廠的最頂級款伏特加----帝威\r\n這瓶到底有多威?\r\n原料為手工挑選的俄羅斯平原冬季小麥\r\n採用北極冰川的純淨軟水 透過來自烏拉爾山脈的石英水晶體過濾\r\n8次蒸餾 4次白樺木炭過濾 2次石英過濾\r\n裝瓶前靜置酒液長達72小時\r\n業界超高規格的處理程序\r\n也造就帝威獨特不凡的香氣與口感\r\n怎麼喝? 純飲就很好喝\r\n入口酒體滑順卻不失飽滿 純淨 濃郁 淡雅\r\n不用擔心酒辣辣 這瓶酒刺激性極低\r\n最特別的是它有淡淡的草本香氣\r\n酒廠也不願透漏這清淡的藥草味從何而來\r\n但這就是帝威與眾不同的地方\r\n不用冰冷凍(這樣反而會將低它的獨特風味)\r\n柔順清淡的草本香氣 配合', NULL, 60, 10, 10, 5, 0, 1, 1, '2022-04-22 15:31:36'),
(8, 'AV13', '灰雁  Grey Goose', 'AV13.jpg', 1150, '源自於法國中心Massif Central Mountains\"，並流經干邑區的自然泉水，經過香檳區石灰層的自然過濾，呈現其無與倫比的自然純淨，在 Grey Goose 酒窖調酒師，\"maitre de chai\"(cellar master)的監製下加入最自然純淨的泉水，使 Grey Goose 達到最佳的濃度與口味。Grey Goose 雅緻細膩的口感完全表現出來自優質小麥的純淨品質 微甜、圓潤的香氣，令人聯想起法國杏仁餅的美味 。', NULL, 50, 10, 15, 8, 0, 1, 3, '2022-04-22 15:33:34'),
(9, 'AV13', '灰雁  Grey Goose', 'AV13.jpg', 1150, '源自於法國中心Massif Central Mountains\"，並流經干邑區的自然泉水，經過香檳區石灰層的自然過濾，呈現其無與倫比的自然純淨，在 Grey Goose 酒窖調酒師，\"maitre de chai\"(cellar master)的監製下加入最自然純淨的泉水，使 Grey Goose 達到最佳的濃度與口味。Grey Goose 雅緻細膩的口感完全表現出來自優質小麥的純淨品質 微甜、圓潤的香氣，令人聯想起法國杏仁餅的美味 。', NULL, 50, 10, 15, 8, 0, 1, 3, '2022-04-22 15:34:03'),
(10, 'AV13', '灰雁  Grey Goose', 'AV13.jpg', 1150, '源自於法國中心Massif Central Mountains\"，並流經干邑區的自然泉水，經過香檳區石灰層的自然過濾，呈現其無與倫比的自然純淨，在 Grey Goose 酒窖調酒師，\"maitre de chai\"(cellar master)的監製下加入最自然純淨的泉水，使 Grey Goose 達到最佳的濃度與口味。Grey Goose 雅緻細膩的口感完全表現出來自優質小麥的純淨品質 微甜、圓潤的香氣，令人聯想起法國杏仁餅的美味 。', NULL, 50, 10, 15, 8, 0, 1, 3, '2022-04-22 15:34:22'),
(11, 'AV14', '詩洛珂  CIROC', 'AV14.jpg', 1250, '使用兩種葡萄品種分別經過四次蒸餾，混合後再進行第五次的蒸餾，有檸檬、柑橘的清香，味道非常獨特，刺激性低口感溫和，深受女性朋友歡迎～\r\nCIROC和其他伏特加最不一樣的地方　就是採用葡萄為原料製作用葡萄為原料？為什麼會有梗？\r\n因為大部分伏特加使用的原料（例如穀類）無法自行發酵但 是 葡～萄～可～以～ 放著 就會天然發酵\r\n所以在蒸餾進行前　可以全程冷泡萃取　完全不用加熱\r\n不像其他原料又要發芽又要煮熟，風味可能因此失去\r\n個得天獨厚的優勢，讓CIROC別於其他品牌　\r\n有著特別突出的果香味\r\n只摘取成熟時間稍長的葡萄　\r\n並在結凍前快速摘採（避免糖分過高）\r\n讓Ciroc的散發出一股柑橘與檸檬', NULL, 60, 10, 15, 10, 0, 1, 1, '2022-04-22 15:39:22'),
(12, 'AV13', '灰雁  Grey Goose', 'AV13.jpg', 1150, '源自於法國中心Massif Central Mountains\"，並流經干邑區的自然泉水，經過香檳區石灰層的自然過濾，呈現其無與倫比的自然純淨，在 Grey Goose 酒窖調酒師，\"maitre de chai\"(cellar master)的監製下加入最自然純淨的泉水，使 Grey Goose 達到最佳的濃度與口味。Grey Goose 雅緻細膩的口感完全表現出來自優質小麥的純淨品質 微甜、圓潤的香氣，令人聯想起法國杏仁餅的美味 。', NULL, 50, 10, 15, 8, 0, 1, 1, '2022-04-22 15:44:04'),
(13, 'AV17', '蘇托力（紅標）  Stolichnaya', 'AV17.jpg', 450, '色彩晶瑩清澄，帶有棉花糖、礦物以及溫和的果皮芳香。入口綿軟，帶出順滑、酒體適中的口感，其中又散發著糖霜、滑石粉以及柑橘果皮的香味。餘味清新，帶有淡淡的香甜口感，以及濕稻草的清香和均勻淡出的胡椒香。', NULL, 60, 10, 15, 20, 0, 1, 1, '2022-04-22 15:45:52'),
(14, 'FE-01', '梵提曼粉紅葡萄柚通寧水   Fentimans Pink Grapefruit Tonic Wate', 'FE-01.jpg', 90, '通過精心製作的天然植物藥和奎寧精製而成，口感乾淨均衡。精緻的風味特徵增強和放大了優質烈酒的美麗植物成分，讓烈酒成為英雄。', NULL, 10, 5, 10, 50, 0, 2, 1, '2022-04-22 15:55:43'),
(15, ' FE-04', '梵提曼玫瑰檸檬碳酸飲 Fentimans Rose Lemonade', 'FE-04.jpg', 120, '英國原裝進口檸檬水\r\n採用完整檸檬片及甜洋梨調配\r\n加入保加利亞─奧圖玫瑰油萃取釀造\r\n獨特粉紅色，帶有玫瑰香氣及檸檬風味\r\n刺激而純淨爽快的口感', NULL, 8, 8, 12, 5, 0, 2, 1, '2022-04-22 16:04:18'),
(16, 'FE-06', '梵提曼接骨木花碳酸飲 Fentimans wild English elderflower', 'FE-06.jpg', 120, '英式的優雅瓶身設計，加上嚴選英國接骨木花釀造而成。顏色透明潔淨，飲用時微甜帶著淡淡花香，微氣泡感，是款清爽無負擔的汽水。深受女性族群的喜愛。', NULL, 10, 10, 15, 8, 0, 2, 1, '2022-04-22 16:10:03'),
(17, 'FT-02', '芬味樹地中海通寧水 Fever-Tree Mediterranean Tonic Water', 'FT-02.jpg', 90, '如果調酒有3/4都是氣泡水，那為什麼不用最好的呢？\r\nFever Tree的創辦者，就是覺得他牌的氣泡飲料添加物太多 拿來調酒 都不知道在做酒還是做化學實驗\r\n「教練...我想調酒。」\r\n因此 ̶三̶井̶ ̶創辦者Charles Rolls與Tim Warrillow為了好好調杯酒 決定自己弄一個「純」天然材料製作的品牌 尋尋覓覓尋尋覓覓 跟蒐集龍珠一樣走遍世界\r\n跟神農氏一樣嘗遍百草 終於 ̶召̶喚̶出̶神̶龍̶ 做出不愧於心的最強天然通寧水-Fever Tree-\r\nFever Tree的傳說就此揭幕\r\n在如今添加物橫行的時代 彷彿一股清流主打天然材料製作 雖然乍喝之下味道好像沒有這麼的強', NULL, 8, 8, 12, 5, 0, 2, 1, '2022-04-22 16:13:41'),
(18, 'FT-03', '芬味樹薑汁BEER汽水 Fever-Tree Premium Ginger Beer', 'FT-03.jpg', 90, '如果調酒有3/4都是氣泡水，那為什麼不用最好的呢？\r\nFever Tree的創辦者，就是覺得他牌的氣泡飲料添加物太多 拿來調酒 都不知道在做酒還是做化學實驗\r\n「教練...我想調酒。」\r\n因此 ̶三̶井̶ ̶創辦者Charles Rolls與Tim Warrillow為了好好調杯酒 決定自己弄一個「純」天然材料製作的品牌 尋尋覓覓尋尋覓覓 跟蒐集龍珠一樣走遍世界\r\n跟神農氏一樣嘗遍百草 終於 ̶召̶喚̶出̶神̶龍̶ 做出不愧於心的最強天然通寧水-Fever Tree-\r\nFever Tree的傳說就此揭幕\r\n在如今添加物橫行的時代 彷彿一股清流主打天然材料製作 雖然乍喝之下味道好像沒有這麼的強', NULL, 8, 8, 12, 5, 0, 2, 1, '2022-04-22 16:16:29'),
(19, 'CF-350', '經典不鏽鋼雪克杯,霧面髮絲紋(小)', 'CF-350.jpg', 600, '經典不鏽鋼雪克杯,霧面髮絲紋(350c.c.)', NULL, 120, 120, 250, 999, 0, 3, 1, '2022-04-22 16:20:11'),
(20, 'CF-530', '經典不鏽鋼雪克杯,霧面髮絲紋(中)', 'CF-530.jpg', 660, '經典不鏽鋼雪克杯,霧面髮絲紋(530c.c.)', NULL, 120, 120, 250, 999, 0, 3, 1, '2022-04-22 16:21:42'),
(21, 'CF-700', '經典不鏽鋼雪克杯,霧面髮絲紋(大)', 'CF-700.jpg', 720, '經典不鏽鋼雪克杯,霧面髮絲紋(700c.c.)', NULL, 120, 120, 250, 99, 0, 3, 1, '2022-04-22 16:23:20'),
(22, 'CP-530', '經典不鏽鋼雪克杯,亮面拋光(中)', 'CP-530.jpg', 680, '經典不鏽鋼雪克杯,亮面拋光(530c.c.)', NULL, 120, 120, 250, 999, 0, 3, 1, '2022-04-22 16:24:52'),
(23, 'CP-700', '經典不鏽鋼雪克杯,亮面拋光(大)', 'CP-700.jpg', 740, '經典不鏽鋼雪克杯,亮面拋光(700c.c.)', NULL, 120, 120, 250, 999, 0, 3, 1, '2022-04-22 16:26:28'),
(24, 'GC-01', 'V型香檳杯‧大', 'GC01.jpg', 230, 'V型香檳杯‧大', NULL, 25, 50, 50, 999, 0, 4, 1, '2022-04-22 16:31:28'),
(25, 'GC-02', 'V型香檳杯 ‧小', 'GC02.jpg', 130, 'V型香檳杯 ‧小', NULL, 20, 40, 40, 999, 0, 4, 1, '2022-04-22 16:32:54'),
(26, 'GC-03', '芸芸香檳杯', 'GC03.jpg', 360, '芸芸香檳杯', NULL, 50, 50, 50, 999, 0, 4, 1, '2022-04-22 16:34:15'),
(27, 'GC-04', '笛型香檳杯', 'GC04.jpg', 130, '笛型香檳杯', NULL, 25, 30, 60, 999, 0, 4, 1, '2022-04-22 16:35:46'),
(28, 'GC-07', '淺碟香檳杯', 'GC07.jpg', 120, '淺碟香檳杯', NULL, 30, 70, 50, 999, 0, 4, 1, '2022-04-22 16:37:58'),
(29, 'AB11', '人頭馬VSOP', 'AB11.jpeg', 1088, '人頭馬只採用大香檳與小香檳區的葡萄為原料製作，淡淡的花果香氣為主要特色，酒體細緻調製需更謹慎方能保留其特色～', NULL, 120, 130, 250, 40, 0, 1, 1, '2022-04-22 20:40:37');

-- --------------------------------------------------------

--
-- 資料表結構 `prd_material_cate`
--

DROP TABLE IF EXISTS `prd_material_cate`;
CREATE TABLE `prd_material_cate` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `prd_material_cate`
--

INSERT INTO `prd_material_cate` (`id`, `name`) VALUES
(1, '不鏽鋼'),
(2, '玻璃');

-- --------------------------------------------------------

--
-- 資料表結構 `prd_origin`
--

DROP TABLE IF EXISTS `prd_origin`;
CREATE TABLE `prd_origin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `prd_origin`
--

INSERT INTO `prd_origin` (`id`, `name`) VALUES
(1, '台灣'),
(2, '法國'),
(3, '俄羅斯'),
(4, '英國'),
(5, '美國'),
(6, '日本'),
(7, '荷蘭'),
(8, '澳洲');

-- --------------------------------------------------------

--
-- 資料表結構 `prd_review`
--

DROP TABLE IF EXISTS `prd_review`;
CREATE TABLE `prd_review` (
  `id` int(3) UNSIGNED NOT NULL,
  `user_id` int(4) NOT NULL,
  `prd_id` int(3) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `prd_status_cate`
--

DROP TABLE IF EXISTS `prd_status_cate`;
CREATE TABLE `prd_status_cate` (
  `id` int(1) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `prd_status_cate`
--

INSERT INTO `prd_status_cate` (`id`, `name`) VALUES
(1, '上架'),
(2, '下架'),
(3, '已刪除');

-- --------------------------------------------------------

--
-- 資料表結構 `prd_type1_detail`
--

DROP TABLE IF EXISTS `prd_type1_detail`;
CREATE TABLE `prd_type1_detail` (
  `id` int(3) UNSIGNED NOT NULL,
  `prd_id` int(3) NOT NULL,
  `abv` int(3) NOT NULL,
  `origin` int(3) NOT NULL,
  `brand` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(4) DEFAULT NULL,
  `cate_m` int(3) NOT NULL,
  `cate_s` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `prd_type1_detail`
--

INSERT INTO `prd_type1_detail` (`id`, `prd_id`, `abv`, `origin`, `brand`, `capacity`, `cate_m`, `cate_s`) VALUES
(1, 1, 43, 1, '金賓', 650, 11, 78),
(2, 2, 41, 3, 'Hendrick`s', 700, 9, 68),
(3, 6, 38, 3, 'Russian Standard', 1000, 5, 45),
(4, 7, 40, 3, ' Russian Standard', 750, 5, 46),
(5, 11, 40, 2, 'CIROC', 750, 5, 46),
(6, 12, 40, 2, 'Grey Goose', 700, 5, 46),
(7, 13, 40, 3, 'Stolichnaya', 700, 5, 45),
(8, 29, 43, 2, 'Remy Martin', 700, 7, 58);

-- --------------------------------------------------------

--
-- 資料表結構 `prd_type2_detail`
--

DROP TABLE IF EXISTS `prd_type2_detail`;
CREATE TABLE `prd_type2_detail` (
  `id` int(3) UNSIGNED NOT NULL,
  `prd_id` int(3) NOT NULL,
  `origin` int(3) NOT NULL,
  `brand` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(4) DEFAULT NULL,
  `cate_m` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `prd_type2_detail`
--

INSERT INTO `prd_type2_detail` (`id`, `prd_id`, `origin`, `brand`, `capacity`, `cate_m`) VALUES
(1, 3, 1, 'YANGNAN', 750, 16),
(2, 14, 4, 'Fentimans', 200, 17),
(3, 15, 4, 'Fentimans', 275, 17),
(4, 16, 4, 'Fentimans', 275, 17),
(5, 17, 4, 'Fever-Tree', 200, 17),
(6, 18, 4, 'Fever-Tree', 200, 17);

-- --------------------------------------------------------

--
-- 資料表結構 `prd_type3_detail`
--

DROP TABLE IF EXISTS `prd_type3_detail`;
CREATE TABLE `prd_type3_detail` (
  `id` int(3) UNSIGNED NOT NULL,
  `prd_id` int(3) NOT NULL,
  `origin` int(3) NOT NULL,
  `capacity` int(4) DEFAULT NULL,
  `mater` int(3) NOT NULL,
  `cate_m` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `prd_type3_detail`
--

INSERT INTO `prd_type3_detail` (`id`, `prd_id`, `origin`, `capacity`, `mater`, `cate_m`) VALUES
(1, 4, 2, 420, 2, 32),
(2, 5, 1, 0, 1, 23),
(3, 19, 1, 350, 1, 20),
(4, 20, 1, 530, 1, 20),
(5, 21, 1, 700, 1, 20),
(6, 22, 1, 530, 1, 20),
(7, 23, 1, 700, 1, 20),
(8, 24, 1, 160, 2, 34),
(9, 25, 1, 110, 2, 34),
(10, 26, 1, 260, 2, 34),
(11, 27, 1, 210, 2, 34),
(12, 28, 1, 251, 2, 34);

-- --------------------------------------------------------

--
-- 資料表結構 `user_coupon`
--

DROP TABLE IF EXISTS `user_coupon`;
CREATE TABLE `user_coupon` (
  `id` int(3) UNSIGNED NOT NULL,
  `user_id` int(3) NOT NULL,
  `coupon_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user_coupon`
--

INSERT INTO `user_coupon` (`id`, `user_id`, `coupon_id`) VALUES
(1, 3, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `user_like`
--

DROP TABLE IF EXISTS `user_like`;
CREATE TABLE `user_like` (
  `id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `prd_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `user_list`
--

DROP TABLE IF EXISTS `user_list`;
CREATE TABLE `user_list` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_img` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(3) NOT NULL,
  `gender` enum('F','M') NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vip_level` int(2) NOT NULL,
  `point` int(5) NOT NULL DEFAULT 0,
  `consumption` int(6) NOT NULL DEFAULT 0,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user_list`
--

INSERT INTO `user_list` (`id`, `name`, `user_img`, `age`, `gender`, `email`, `address`, `phone`, `vip_level`, `point`, `consumption`, `create_time`) VALUES
(1, '王富貴', NULL, 20, 'M', 'test11@test.com', '110台北市信義區信義路五段7號', '0912345678', 2, 0, 0, '2022-04-21 18:29:51'),
(2, '後台小編11', NULL, 20, 'F', 'admin@admin.com', '', '0987654321', 1, 0, 0, '2022-04-21 18:38:04'),
(3, '11', NULL, 20, 'M', 'test@gmail.com', '桃園市中壢區新生路二段421號', '0987654321', 2, 0, 0, '2022-04-22 03:25:21');

-- --------------------------------------------------------

--
-- 資料表結構 `user_pwd`
--

DROP TABLE IF EXISTS `user_pwd`;
CREATE TABLE `user_pwd` (
  `user_id` int(3) NOT NULL,
  `passwd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user_pwd`
--

INSERT INTO `user_pwd` (`user_id`, `passwd`) VALUES
(1, 'f696282aa4cd4f614aa995190cf442fe'),
(2, '827ccb0eea8a706c4c34a16891f84e7b'),
(3, '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- 資料表結構 `vip_level`
--

DROP TABLE IF EXISTS `vip_level`;
CREATE TABLE `vip_level` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `vip_level`
--

INSERT INTO `vip_level` (`id`, `name`) VALUES
(1, '管理員'),
(2, '銅卡'),
(3, '銀卡'),
(4, '金卡');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `bartd_cate_list`
--
ALTER TABLE `bartd_cate_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bartd_cate_type`
--
ALTER TABLE `bartd_cate_type`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bartd_list`
--
ALTER TABLE `bartd_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bartd_material`
--
ALTER TABLE `bartd_material`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `coupon_cate`
--
ALTER TABLE `coupon_cate`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `coupon_list`
--
ALTER TABLE `coupon_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `group_chatroom`
--
ALTER TABLE `group_chatroom`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `group_list`
--
ALTER TABLE `group_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `group_official`
--
ALTER TABLE `group_official`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `group_participant`
--
ALTER TABLE `group_participant`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `group_status`
--
ALTER TABLE `group_status`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `logistics_cate`
--
ALTER TABLE `logistics_cate`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `logistics_state_cate`
--
ALTER TABLE `logistics_state_cate`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `packaging _cate`
--
ALTER TABLE `packaging _cate`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `prd_detail_cate`
--
ALTER TABLE `prd_detail_cate`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `prd_img`
--
ALTER TABLE `prd_img`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `prd_list`
--
ALTER TABLE `prd_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `prd_material_cate`
--
ALTER TABLE `prd_material_cate`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `prd_origin`
--
ALTER TABLE `prd_origin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `prd_review`
--
ALTER TABLE `prd_review`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `prd_status_cate`
--
ALTER TABLE `prd_status_cate`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `prd_type1_detail`
--
ALTER TABLE `prd_type1_detail`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `prd_type2_detail`
--
ALTER TABLE `prd_type2_detail`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `prd_type3_detail`
--
ALTER TABLE `prd_type3_detail`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_coupon`
--
ALTER TABLE `user_coupon`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_like`
--
ALTER TABLE `user_like`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_pwd`
--
ALTER TABLE `user_pwd`
  ADD PRIMARY KEY (`user_id`);

--
-- 資料表索引 `vip_level`
--
ALTER TABLE `vip_level`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bartd_cate_list`
--
ALTER TABLE `bartd_cate_list`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bartd_cate_type`
--
ALTER TABLE `bartd_cate_type`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bartd_list`
--
ALTER TABLE `bartd_list`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bartd_material`
--
ALTER TABLE `bartd_material`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon_cate`
--
ALTER TABLE `coupon_cate`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon_list`
--
ALTER TABLE `coupon_list`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `group_chatroom`
--
ALTER TABLE `group_chatroom`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `group_list`
--
ALTER TABLE `group_list`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `group_official`
--
ALTER TABLE `group_official`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `group_participant`
--
ALTER TABLE `group_participant`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `group_status`
--
ALTER TABLE `group_status`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `logistics_cate`
--
ALTER TABLE `logistics_cate`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `logistics_state_cate`
--
ALTER TABLE `logistics_state_cate`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `packaging _cate`
--
ALTER TABLE `packaging _cate`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_detail_cate`
--
ALTER TABLE `prd_detail_cate`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_img`
--
ALTER TABLE `prd_img`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_list`
--
ALTER TABLE `prd_list`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_material_cate`
--
ALTER TABLE `prd_material_cate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_origin`
--
ALTER TABLE `prd_origin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_review`
--
ALTER TABLE `prd_review`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_status_cate`
--
ALTER TABLE `prd_status_cate`
  MODIFY `id` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_type1_detail`
--
ALTER TABLE `prd_type1_detail`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_type2_detail`
--
ALTER TABLE `prd_type2_detail`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_type3_detail`
--
ALTER TABLE `prd_type3_detail`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_coupon`
--
ALTER TABLE `user_coupon`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_like`
--
ALTER TABLE `user_like`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_list`
--
ALTER TABLE `user_list`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_pwd`
--
ALTER TABLE `user_pwd`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `vip_level`
--
ALTER TABLE `vip_level`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
