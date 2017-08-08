-- phpMyAdmin SQL Dump
-- version 4.4.15.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-08-08 16:17:15
-- 服务器版本： 5.5.48-log
-- PHP Version: 7.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signin_system`
--

-- --------------------------------------------------------

--
-- 表的结构 `awark_rule`
--

CREATE TABLE IF NOT EXISTS `awark_rule` (
  `id` int(11) NOT NULL,
  `log_length` int(11) NOT NULL COMMENT '打卡規則獎勵次數',
  `name` varchar(255) NOT NULL COMMENT '獎勵內容',
  `status_del` int(11) NOT NULL DEFAULT '1' COMMENT '0--del'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `client_user`
--

CREATE TABLE IF NOT EXISTS `client_user` (
  `id` int(11) NOT NULL,
  `openid` varchar(255) NOT NULL,
  `head_img` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `crontab_note`
--

CREATE TABLE IF NOT EXISTS `crontab_note` (
  `id` int(11) NOT NULL,
  `cron_openid` text NOT NULL COMMENT '用戶羣組',
  `note` text NOT NULL COMMENT '內容',
  `status_del` int(11) NOT NULL DEFAULT '1' COMMENT '0--del',
  `matter_code` text NOT NULL,
  `start_time` varchar(255) NOT NULL COMMENT '定時開始時間',
  `end_time` varchar(255) NOT NULL COMMENT '定時結束時間',
  `crontab_time` varchar(255) NOT NULL COMMENT '定時時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `days_matter`
--

CREATE TABLE IF NOT EXISTS `days_matter` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL COMMENT '倒計時唯一標識',
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `status_del` int(11) NOT NULL DEFAULT '1' COMMENT '0--del'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `moon_calculate`
--

CREATE TABLE IF NOT EXISTS `moon_calculate` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL COMMENT '心情名稱',
  `status_del` int(11) NOT NULL DEFAULT '1' COMMENT '0--del',
  `code` varchar(50) NOT NULL COMMENT '心情唯一標識'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `sign_actions`
--

CREATE TABLE IF NOT EXISTS `sign_actions` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL COMMENT '活動唯一標識',
  `name` varchar(255) NOT NULL COMMENT '活動名稱',
  `start_time` varchar(255) NOT NULL COMMENT '活動開始時間',
  `end_time` varchar(255) NOT NULL COMMENT '活動結束時間',
  `week_set` text NOT NULL COMMENT '一周活動選擇',
  `status_del` int(11) NOT NULL DEFAULT '1' COMMENT '0--del',
  `time_length` varchar(255) NOT NULL DEFAULT '0' COMMENT '活動長度',
  `openid` varchar(255) NOT NULL COMMENT '用戶唯一標識',
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `matter_code` text NOT NULL COMMENT '倒計時任務的類目',
  `result_start` varchar(255) NOT NULL COMMENT '每天開始時間',
  `result_end` varchar(255) NOT NULL COMMENT '每天結束時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `sign_log`
--

CREATE TABLE IF NOT EXISTS `sign_log` (
  `id` int(11) NOT NULL,
  `openid` varchar(255) NOT NULL COMMENT '用戶唯一標識',
  `tag_code` varchar(50) NOT NULL COMMENT '讀物唯一標識',
  `moon_code` varchar(50) NOT NULL COMMENT '心情唯一標識',
  `action_code` varchar(50) NOT NULL COMMENT '活動唯一標識',
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `img_log` varchar(255) NOT NULL COMMENT '圖片記錄',
  `status_log` int(11) NOT NULL COMMENT '打卡連擊次數',
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `tag_calculate`
--

CREATE TABLE IF NOT EXISTS `tag_calculate` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL COMMENT '讀物名稱',
  `status_del` int(11) NOT NULL DEFAULT '1' COMMENT '狀態',
  `code` varchar(50) NOT NULL COMMENT '類目唯一標識'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--


