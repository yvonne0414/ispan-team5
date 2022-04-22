-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 04 月 22 日 03:29
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
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'AWB13B', '金賓黑波本威士忌 ', 'AWB13B.jpeg', 550, '金賓<黑>美國波本威士忌為具有豐富風味口感的波本威士忌，風味優雅、順口、精緻 ─ 這就是長期陳年後的臻至完美的波本口感。金賓<黑>美國波本威士忌在白橡木桶中長期陳年，長時間的醞釀與呼吸使得其酒體渾厚，並且有著絲綢般滑順的焦糖風味和溫暖的橡木桶口感。', NULL, 1100, 120, 250, 40, 0, 1, 1, '2022-04-21 22:50:29'),
(2, 'AG22', '亨利爵士  Hendrick`s', 'AG22.jpeg', 950, '亨利爵士在蒸餾過程中加入保加利亞玫瑰與荷蘭小黃瓜，透過四次緩速蒸餾，酒體輕盈刺激性低，如果您喝不慣杜松子味強烈或是口感厚重的琴酒，不妨考慮這琴酒界的小龍女，清新脫俗又不失英式琴酒風範，調酒搭配食用玫瑰或小黃瓜，能提味又可增添飲用樂趣優～', NULL, 200, 100, 200, 200, 0, 1, 1, '2022-04-21 23:01:24'),
(3, 'YN-02', '紅石榴糖漿', 'YN-02.jpeg', 140, '甜甜的很好吃！', NULL, 150, 50, 150, 200, 0, 2, 1, '2022-04-21 23:05:29'),
(4, 'GW02', '夜問威士忌杯', 'GW02.jpeg', 175, '威士忌杯又被稱為Rock杯或Old-fashioned杯，以厚底、大杯口與岩石造型為特色，除了加冰、加水品飲威士忌，亦可作為雞尾酒杯使用～\r\n‧夜問威士忌杯杯面宛如岩石面的紋路相當特殊，容量也相當大（420ml），很適合調製長飲型雞尾酒～', NULL, 83, 83, 105, 34, 0, 4, 1, '2022-04-21 23:11:51'),
(5, 'BS-02', '吧叉匙（短)', 'BS-02.jpeg', 65, '吧叉匙用於以攪拌法製作的調酒，將材料放入調酒杯後加入冰塊，以吧叉匙攪拌均勻再用隔冰匙濾掉冰塊，將酒液倒入杯中，通常與隔冰匙和調酒杯搭配使用~', NULL, 10, 10, 260, 300, 0, 3, 1, '2022-04-21 23:16:22');

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
(3, '俄羅斯');

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
(2, 2, 41, 3, 'Hendrick`s', 700, 9, 68);

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
(1, 3, 1, 'YANGNAN', 750, 16);

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
(2, 5, 1, 0, 1, 23);

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
(2, '後台管理員', NULL, 20, 'F', 'admin@admin.com', '', '0987654321', 1, 0, 0, '2022-04-21 18:38:04'),
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
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bartd_cate_type`
--
ALTER TABLE `bartd_cate_type`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bartd_list`
--
ALTER TABLE `bartd_list`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bartd_material`
--
ALTER TABLE `bartd_material`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon_cate`
--
ALTER TABLE `coupon_cate`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon_list`
--
ALTER TABLE `coupon_list`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `group_chatroom`
--
ALTER TABLE `group_chatroom`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `group_list`
--
ALTER TABLE `group_list`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `group_official`
--
ALTER TABLE `group_official`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `group_participant`
--
ALTER TABLE `group_participant`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_material_cate`
--
ALTER TABLE `prd_material_cate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_origin`
--
ALTER TABLE `prd_origin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_type2_detail`
--
ALTER TABLE `prd_type2_detail`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prd_type3_detail`
--
ALTER TABLE `prd_type3_detail`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_coupon`
--
ALTER TABLE `user_coupon`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

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