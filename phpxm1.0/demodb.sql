-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-05-18 12:52:26
-- 服务器版本： 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demodb`
--

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(64) NOT NULL COMMENT '商品名称',
  `typeid` int(10) UNSIGNED NOT NULL COMMENT '商品类型',
  `price` double UNSIGNED NOT NULL COMMENT '商品价格',
  `total` int(10) UNSIGNED NOT NULL COMMENT '库存量',
  `pic` varchar(32) NOT NULL COMMENT '商品图片',
  `note` text COMMENT '商品描述',
  `addtime` int(10) UNSIGNED NOT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `name`, `typeid`, `price`, `total`, `pic`, `note`, `addtime`) VALUES
(1, 'WWWW', 1, 22, 22, '201804281403455683.png', '22', 1524924225),
(2, '3', 3, 3, 3, '3', '33', 33),
(3, '3', 1, 3, 3, '201805060816181936.png', '3', 1525594578),
(4, '88', 88, 88, 88, '88', '88', 88),
(20, '333', 333, 333, 33, '33', '333', 33);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
