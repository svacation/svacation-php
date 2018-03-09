-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-03-02 23:02:21
-- 服务器版本： 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svacation`
--

-- --------------------------------------------------------

--
-- 表的结构 `address`
--

CREATE TABLE `address` (
  `aid` int(10) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `address`
--

INSERT INTO `address` (`aid`, `address`, `type`, `lat`, `lng`, `update_at`) VALUES
(1, 'RIVA 517-7008 River Rd', 'apt', 49.1705, -123.157, '2018-01-30'),
(2, 'Mandarin 767-6288 No.3 Rd', 'apt', 49.22, -123.222, '2018-01-30'),
(3, '9320 Gormond Rd Richmond V7E1N5', 'apt', 49.1446, -123.187, '2018-03-02');

-- --------------------------------------------------------

--
-- 表的结构 `addresscoordinate`
--

CREATE TABLE `addresscoordinate` (
  `aid` int(5) NOT NULL,
  `address` varchar(64) NOT NULL,
  `coordinate` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `addresscoordinate`
--

INSERT INTO `addresscoordinate` (`aid`, `address`, `coordinate`) VALUES
(1, '9320 Gormond Rd Richmond V7E1N5', '{lat: 49.1446514, lng: -123.1871603}'),
(11, 'Ora 602-6200 River Rd', '{lat: 40.2749927, lng: -111.6709053}');

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `aid` int(5) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `permission` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`aid`, `username`, `password`, `permission`) VALUES
(2, 'brook', 'b79624284645b7cba19d76a417e493fe9e767745d4313fdfc35107c92a5db909', '1/2/3/4/5/6/7/8/9/10'),
(3, 'Chuck', 'cff3e7ca36573093f97c89acc9d314c96450fb7c35c0bd0d5226ed513c7b5b9e', '1/2/3/4/5/6/7'),
(4, 'Todd', 'cff3e7ca36573093f97c89acc9d314c96450fb7c35c0bd0d5226ed513c7b5b9e', '1/2/3/4/5/6/7/8/9'),
(5, 'Carmond', 'cff3e7ca36573093f97c89acc9d314c96450fb7c35c0bd0d5226ed513c7b5b9e', '1/2/3/4/5/6/7'),
(6, 'Liulaoshi', 'cff3e7ca36573093f97c89acc9d314c96450fb7c35c0bd0d5226ed513c7b5b9e', '1/2/3/4/5/6/7');

-- --------------------------------------------------------

--
-- 表的结构 `flight_service`
--

CREATE TABLE `flight_service` (
  `fid` int(50) NOT NULL,
  `serviceToken` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` datetime NOT NULL,
  `numCars` int(3) NOT NULL,
  `num_ppl` int(5) DEFAULT NULL,
  `packages` int(5) DEFAULT NULL,
  `additionalNote` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `flight_service`
--

INSERT INTO `flight_service` (`fid`, `serviceToken`, `user`, `time`, `numCars`, `num_ppl`, `packages`, `additionalNote`) VALUES
(1, '14483', 'kqdo4b', '2018-02-28 10:00:00', 2, NULL, NULL, '带我打无'),
(2, '31658', 'kqdo4b', '2018-03-07 10:00:00', 1, NULL, NULL, '打撒奥'),
(3, '49782', 'sKm8LU', '2018-03-02 17:00:00', 1, 1, 1, '1ge');

-- --------------------------------------------------------

--
-- 表的结构 `food_service`
--

CREATE TABLE `food_service` (
  `sid` int(10) NOT NULL,
  `user` varchar(10) COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) COLLATE utf8_bin NOT NULL,
  `serviceType` varchar(5) COLLATE utf8_bin NOT NULL,
  `startDate` date DEFAULT NULL,
  `startTime` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `endTime` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `num_ppl` int(3) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `display` int(10) NOT NULL DEFAULT '1',
  `finish` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `food_service`
--

INSERT INTO `food_service` (`sid`, `user`, `serviceToken`, `serviceType`, `startDate`, `startTime`, `endDate`, `endTime`, `num_ppl`, `createdAt`, `display`, `finish`) VALUES
(3, '0GtwFX', '88415 ', '宝妈月子餐', '2018-02-23', '早', '2018-02-24', '早', NULL, '0000-00-00 00:00:00', 1, NULL),
(4, 'kqdo4b', '82854 ', '宝妈月子餐', '2018-03-01', '早', '2018-03-02', '早', NULL, '2018-02-26 15:19:51', 0, NULL),
(5, 'kqdo4b', '85187 ', '待产餐', '2018-02-27', '早', '2018-03-01', '早', 1, '2018-02-26 15:35:03', 0, NULL),
(6, 'kqdo4b', '65899 ', '宝妈月子餐', '0000-00-00', '', '0000-00-00', '', NULL, '2018-02-26 16:32:13', 0, NULL),
(8, 'kqdo4b', '60467 ', '宝妈月子餐', '2018-02-28', '早', '2018-03-01', '早', NULL, '2018-02-27 14:41:05', 0, NULL),
(9, 'kqdo4b', '70888 ', '宝妈月子餐', '2018-02-28', '早', '2018-03-01', '早', NULL, '2018-02-27 15:03:21', 0, NULL),
(10, 'kqdo4b', '2067 ', '宝妈月子餐', '2018-02-28', '中', '2018-03-03', '早', NULL, '2018-02-27 15:05:55', 0, NULL),
(11, 'kqdo4b', '98514 ', '待产餐', '2018-02-28', '早', '2018-03-02', '早', 1, '2018-02-27 15:16:03', 1, NULL),
(12, 'kqdo4b', '11986 ', '宝妈月子餐', '2018-03-01', '早', '2018-03-02', '早', NULL, '2018-02-28 10:15:11', 1, NULL),
(13, 'sKm8LU', '42781 ', '宝妈月子餐', '2018-03-09', '早', '2018-03-21', '早', NULL, '2018-03-01 12:17:08', 0, NULL),
(14, 'sKm8LU', '26562 ', '孕妈月子餐', '2018-03-03', '早', '2018-03-13', '早', NULL, '2018-03-01 16:37:09', 0, NULL),
(15, 'sKm8LU', '80371 ', '孕妈待产餐', '2018-03-10', '早', '2018-04-25', '早', NULL, '2018-03-01 16:51:19', 0, NULL),
(16, 'sKm8LU', '41553 ', '孕妈月子餐', '2018-03-09', '早', '2018-03-21', '早', NULL, '2018-03-01 16:53:54', 0, NULL),
(17, 'sKm8LU', '73783 ', '孕妈月子餐', '2018-03-03', '早', '2018-03-13', '早', NULL, '2018-03-01 16:54:58', 0, NULL),
(19, 'sKm8LU', '55274 ', '待产餐', '2018-03-03', '早', '2018-03-21', '早', 1, '2018-03-01 17:03:24', 0, NULL),
(20, 'sKm8LU', '83431 ', '孕妈待产餐', '2018-03-16', '早', '2018-03-27', '早', NULL, '2018-03-01 18:07:44', 1, NULL),
(21, '7ddxd0', '24449 ', '孕妈月子餐', '2018-03-02', '中', '2018-03-07', '早', NULL, '2018-03-01 19:08:41', 1, NULL),
(22, '7ddxd0', '50243 ', '孕妈待产餐', '2018-03-02', '晚', '2018-03-12', '早', NULL, '2018-03-01 19:09:08', 1, NULL),
(23, '7ddxd0', '66748 ', '待产餐', '2018-03-02', '早', '2018-03-06', '早', 3, '2018-03-01 19:09:24', 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `history`
--

CREATE TABLE `history` (
  `hid` int(10) NOT NULL,
  `token` varchar(10) COLLATE utf8_bin NOT NULL,
  `serviceType` varchar(10) COLLATE utf8_bin NOT NULL,
  `user_id` varchar(10) COLLATE utf8_bin NOT NULL,
  `time` datetime NOT NULL,
  `activate` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `history`
--

INSERT INTO `history` (`hid`, `token`, `serviceType`, `user_id`, `time`, `activate`) VALUES
(1, '2435', '医疗接送', '0GtwFX', '2018-02-22 00:00:00', NULL),
(2, '22480', '医疗接送', '0GtwFX', '2018-02-22 00:00:00', NULL),
(3, '27709', '医疗接送', '0GtwFX', '2018-02-22 00:00:00', NULL),
(4, '23452', '医疗接送', '0GtwFX', '2018-02-22 00:00:00', NULL),
(8, '88415', '宝妈月子餐', '0GtwFX', '2018-02-22 00:00:00', NULL),
(9, '14483', '接机送机', 'kqdo4b', '2018-02-26 00:00:00', NULL),
(10, '31658', '接机送机', 'kqdo4b', '2018-02-26 00:00:00', NULL),
(11, '720', '医疗接送', 'kqdo4b', '2018-02-26 00:00:00', NULL),
(13, '4303', '住房维修', 'kqdo4b', '2018-02-26 11:57:55', NULL),
(23, '98514', '待产餐', 'kqdo4b', '2018-02-27 15:16:03', NULL),
(24, '55967', '接送服务', 'kqdo4b', '2018-02-27 00:00:00', NULL),
(25, '48320', '医疗接送', 'kqdo4b', '2018-02-27 00:00:00', NULL),
(26, '31365', '采购服务', 'kqdo4b', '2018-02-27 15:48:06', NULL),
(27, '83962', '采购服务', 'kqdo4b', '2018-02-27 17:14:40', NULL),
(28, '11986', '宝妈月子餐', 'kqdo4b', '2018-02-28 10:15:11', NULL),
(29, '87241', '住房维修', 'kqdo4b', '2018-02-28 10:16:52', NULL),
(30, '77991', '医疗接送', 'sKm8LU', '2018-03-01 00:00:00', NULL),
(31, '76808', '医疗接送', 'sKm8LU', '2018-03-01 00:00:00', NULL),
(33, '37296', '采购服务', 'sKm8LU', '2018-03-01 12:21:32', NULL),
(34, '62606', '接送服务', 'sKm8LU', '2018-03-01 00:00:00', NULL),
(41, '49782', '接机送机', 'sKm8LU', '2018-03-01 00:00:00', NULL),
(42, '10206', '住房维修', 'sKm8LU', '2018-03-01 17:39:38', NULL),
(43, '62829', '住房维修', 'sKm8LU', '2018-03-01 18:06:49', NULL),
(44, '83431', '孕妈待产餐', 'sKm8LU', '2018-03-01 18:07:44', NULL),
(45, '24449', '孕妈月子餐', '7ddxd0', '2018-03-01 19:08:41', NULL),
(46, '50243', '孕妈待产餐', '7ddxd0', '2018-03-01 19:09:08', NULL),
(47, '66748', '待产餐', '7ddxd0', '2018-03-01 19:09:24', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `housekeeping_service`
--

CREATE TABLE `housekeeping_service` (
  `hid` int(100) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` date NOT NULL,
  `accompany` int(2) NOT NULL,
  `maid` int(2) NOT NULL,
  `additionalNote` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `finish` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `medical_service`
--

CREATE TABLE `medical_service` (
  `sid` int(100) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `medicalServiceType` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` datetime NOT NULL,
  `additional` text CHARACTER SET utf8 COLLATE utf8_bin,
  `finish` int(2) DEFAULT NULL,
  `times` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `medical_service`
--

INSERT INTO `medical_service` (`sid`, `user`, `serviceToken`, `medicalServiceType`, `time`, `additional`, `finish`, `times`) VALUES
(1, '0GtwFX', '2435 ', '王医生', '2018-02-23 14:00:00', 'xxx', NULL, NULL),
(2, '0GtwFX', '22480 ', '王医生', '2018-02-24 14:00:00', '24', NULL, NULL),
(3, '0GtwFX', '27709 ', '王医生', '2018-02-25 14:00:00', '25', NULL, NULL),
(4, '0GtwFX', '23452 ', '王医生', '2018-02-26 14:00:00', '26', NULL, NULL),
(5, 'kqdo4b', '720 ', '王医生', '2018-02-27 10:00:00', 'dwadwad', NULL, NULL),
(6, 'kqdo4b', '48320 ', '专科医生', '2018-02-28 15:00:00', 'ccc', NULL, NULL),
(7, 'sKm8LU', '77991 ', '谭医生', '2018-03-03 11:00:00', '!!!', NULL, NULL),
(8, 'sKm8LU', '76808 ', '专科医生', '2018-03-17 11:00:00', '!!!', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `pickup_service`
--

CREATE TABLE `pickup_service` (
  `pid` int(100) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `departure` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `destination` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `num_ppl` int(2) DEFAULT NULL,
  `additional` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `finish` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `pickup_service`
--

INSERT INTO `pickup_service` (`pid`, `user`, `serviceToken`, `date`, `time`, `departure`, `destination`, `num_ppl`, `additional`, `finish`) VALUES
(1, 'kqdo4b', '55967 ', '2018-02-28', '10:00AM - 11:30AM', '家', '沃尔玛', 1, 'ddd', NULL),
(2, 'sKm8LU', '62606 ', '2018-03-05', '10:00AM - 11:30AM', '家', '沃尔玛', 1, 'hhh', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `purchase_service`
--

CREATE TABLE `purchase_service` (
  `pid` int(10) NOT NULL,
  `user` varchar(10) COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) COLLATE utf8_bin NOT NULL,
  `property` varchar(10) COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  `origin_address` varchar(100) COLLATE utf8_bin NOT NULL,
  `doujiang` int(5) DEFAULT NULL,
  `tiandoujiang` int(5) DEFAULT NULL,
  `niunai` int(5) DEFAULT NULL,
  `guozhi` int(5) DEFAULT NULL,
  `furu` int(5) DEFAULT NULL,
  `zhacai` int(5) DEFAULT NULL,
  `laoganma` int(5) DEFAULT NULL,
  `ganlancai` int(5) DEFAULT NULL,
  `xianyadan` int(5) DEFAULT NULL,
  `huashengjiang` int(5) DEFAULT NULL,
  `caomeijiang` int(5) DEFAULT NULL,
  `shengjidan` int(5) DEFAULT NULL,
  `maipian` int(5) DEFAULT NULL,
  `culiangmianbao` int(5) DEFAULT NULL,
  `doushabao` int(5) DEFAULT NULL,
  `xiaomantou` int(5) DEFAULT NULL,
  `shouzhuabing` int(5) DEFAULT NULL,
  `jiaozi` int(5) DEFAULT NULL,
  `miantiao` int(5) DEFAULT NULL,
  `dami` int(5) DEFAULT NULL,
  `xiaomi` int(5) DEFAULT NULL,
  `hongdou` int(5) DEFAULT NULL,
  `lvdou` int(5) DEFAULT NULL,
  `pingguo` int(5) DEFAULT NULL,
  `xiangjiao` int(5) DEFAULT NULL,
  `chengzi` int(5) DEFAULT NULL,
  `guoli` int(5) DEFAULT NULL,
  `juzi` int(5) DEFAULT NULL,
  `xihongshi` int(5) DEFAULT NULL,
  `bocai` int(5) DEFAULT NULL,
  `digua` int(5) DEFAULT NULL,
  `huanggua` int(5) DEFAULT NULL,
  `tudou` int(5) DEFAULT NULL,
  `you` int(5) DEFAULT NULL,
  `yan` int(5) DEFAULT NULL,
  `jiang` int(5) DEFAULT NULL,
  `cu` int(5) DEFAULT NULL,
  `tang` int(5) DEFAULT NULL,
  `locker` int(2) DEFAULT NULL,
  `finish` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `purchase_service`
--

INSERT INTO `purchase_service` (`pid`, `user`, `serviceToken`, `property`, `date`, `origin_address`, `doujiang`, `tiandoujiang`, `niunai`, `guozhi`, `furu`, `zhacai`, `laoganma`, `ganlancai`, `xianyadan`, `huashengjiang`, `caomeijiang`, `shengjidan`, `maipian`, `culiangmianbao`, `doushabao`, `xiaomantou`, `shouzhuabing`, `jiaozi`, `miantiao`, `dami`, `xiaomi`, `hongdou`, `lvdou`, `pingguo`, `xiangjiao`, `chengzi`, `guoli`, `juzi`, `xihongshi`, `bocai`, `digua`, `huanggua`, `tudou`, `you`, `yan`, `jiang`, `cu`, `tang`, `locker`, `finish`) VALUES
(2, 'kqdo4b', '83962', 'apartment', '2018-02-27 17:14:40', 'Ora 602-6200 River Rd', 2, 1, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `repair_service`
--

CREATE TABLE `repair_service` (
  `rid` int(10) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` datetime NOT NULL,
  `repairNote` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `replyNote` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `finish` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `repair_service`
--

INSERT INTO `repair_service` (`rid`, `user`, `serviceToken`, `time`, `repairNote`, `replyNote`, `finish`) VALUES
(3, 'kqdo4b', '4303', '2018-02-26 11:57:55', 'hahaha', '1111', 1),
(6, 'kqdo4b', '87241', '2018-02-28 10:16:52', '哈哈哈', 'dqw', 1),
(7, 'sKm8LU', '10206', '2018-03-01 17:39:38', '坏了，灯没电', '好了', 1),
(8, 'sKm8LU', '62829', '2018-03-01 18:06:49', 'qweqeqw', NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `uid` int(5) NOT NULL,
  `username` varchar(10) COLLATE utf8_bin NOT NULL,
  `phone` bigint(50) NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `weChat` varchar(50) COLLATE utf8_bin NOT NULL,
  `timeDeliver` varchar(50) COLLATE utf8_bin NOT NULL,
  `create_time` date NOT NULL,
  `role` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `salt` varchar(6) COLLATE utf8_bin NOT NULL,
  `address` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `flight` int(5) DEFAULT '1',
  `flightTotal` int(10) DEFAULT '0',
  `special_medical` int(5) DEFAULT '0',
  `special_medicalTotal` int(10) DEFAULT '0',
  `pickup` int(5) DEFAULT NULL,
  `pickupTotal` int(20) DEFAULT NULL,
  `medicals` int(5) DEFAULT NULL,
  `medicalsTotal` int(20) DEFAULT NULL,
  `isActive` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`uid`, `username`, `phone`, `email`, `password`, `weChat`, `timeDeliver`, `create_time`, `role`, `salt`, `address`, `flight`, `flightTotal`, `special_medical`, `special_medicalTotal`, `pickup`, `pickupTotal`, `medicals`, `medicalsTotal`, `isActive`) VALUES
(1, 'brook', 7789226676, '123@gmail.com', '087f2fe94ae39f97c1e146839e14d0ac2975fc6519528b0c880fd0b9b8a419a4', 'xxx', '2018-02-23', '2018-02-22', '1', '0GtwFX', '9320 Gormond Rd Richmond V7E1N5', 3, 2, 9, 6, 3, 2, 4, 2, 1),
(2, '12345', 12345, '123@gmail.com', 'a663d49d3d3385cb31bd5d58d06253a56ef4d1da0bea6adaa36dbed210c248af', '12345', '2018-02-17', '2018-02-26', '1', 'kqdo4b', 'Ora 602-6200 River Rd', 0, 0, 0, NULL, 1, 2, 1, 2, 1),
(3, 'www', 7787888848, '123@gmail.com', 'ebaaa9a9dcad68f5cf4550ebd1ddfed70b987801db72a2fde1387198c2750f02', 'www', '2018-03-30', '2018-03-01', '1', 'sKm8LU', 'Ora 1202-6951 Hollybridge Way', 1, 1, 0, 0, 7, 9, 6, 8, 1),
(4, '123', 123, '123@12.com', '13b3c54a329d7ffee6032185979912928acda40f5af9c36bc9fb4cd87e01447f', '123', '2018-03-14', '2018-03-01', '1', '7ddxd0', 'Ora 702-6951 Hollybridge Way', 8, 7, 8, 8, 8, 8, 8, 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `addresscoordinate`
--
ALTER TABLE `addresscoordinate`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `address` (`address`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `flight_service`
--
ALTER TABLE `flight_service`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `food_service`
--
ALTER TABLE `food_service`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`hid`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `housekeeping_service`
--
ALTER TABLE `housekeeping_service`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `medical_service`
--
ALTER TABLE `medical_service`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `serviceToken` (`serviceToken`);

--
-- Indexes for table `pickup_service`
--
ALTER TABLE `pickup_service`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `purchase_service`
--
ALTER TABLE `purchase_service`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `repair_service`
--
ALTER TABLE `repair_service`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `address`
--
ALTER TABLE `address`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `addresscoordinate`
--
ALTER TABLE `addresscoordinate`
  MODIFY `aid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `flight_service`
--
ALTER TABLE `flight_service`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `food_service`
--
ALTER TABLE `food_service`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用表AUTO_INCREMENT `history`
--
ALTER TABLE `history`
  MODIFY `hid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- 使用表AUTO_INCREMENT `housekeeping_service`
--
ALTER TABLE `housekeeping_service`
  MODIFY `hid` int(100) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `medical_service`
--
ALTER TABLE `medical_service`
  MODIFY `sid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `pickup_service`
--
ALTER TABLE `pickup_service`
  MODIFY `pid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `purchase_service`
--
ALTER TABLE `purchase_service`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `repair_service`
--
ALTER TABLE `repair_service`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
