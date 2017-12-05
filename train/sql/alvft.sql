/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : alvft

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-04-18 01:01:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alvft_migrations
-- ----------------------------
DROP TABLE IF EXISTS `alvft_migrations`;
CREATE TABLE `alvft_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of alvft_migrations
-- ----------------------------
INSERT INTO `alvft_migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `alvft_migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');

-- ----------------------------
-- Table structure for alvft_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `alvft_password_resets`;
CREATE TABLE `alvft_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of alvft_password_resets
-- ----------------------------
INSERT INTO `alvft_password_resets` VALUES ('xxx@qq.com', '1111', '2017-04-15 00:00:00');

-- ----------------------------
-- Table structure for alvft_payment_order
-- ----------------------------
DROP TABLE IF EXISTS `alvft_payment_order`;
CREATE TABLE `alvft_payment_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '支付订单编号',
  `uid` int(11) NOT NULL COMMENT '下单者用户编号',
  `out_trade_no` varchar(100) NOT NULL COMMENT '支付订单交易流水号',
  `total_fee` decimal(10,2) DEFAULT NULL COMMENT '支付金额',
  `subject` varchar(100) DEFAULT NULL COMMENT '商品标题',
  `body` varchar(200) DEFAULT NULL COMMENT '商品描述',
  `pay_type` varchar(10) DEFAULT NULL COMMENT '支付类型 [ alipay  weixin ]',
  `pay_time` int(11) DEFAULT NULL COMMENT '支付时间,回调或者异步通知的时间',
  `order_time` int(11) DEFAULT NULL COMMENT '下单时间，发起支付请求的时间',
  `pay_status` tinyint(4) DEFAULT NULL COMMENT '支付状态 ， 0  未支付 1 已支付',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='支付订单表';

-- ----------------------------
-- Records of alvft_payment_order
-- ----------------------------
INSERT INTO `alvft_payment_order` VALUES ('4', '1', 'alvft_58f23f0b48b070.50361562', '0.01', 'Iphone 7 ', 'Iphone 7 商品描述', 'alipay', '0', '1492270859', '0', '2017-04-15 23:40:59', '2017-04-15 23:40:59');
INSERT INTO `alvft_payment_order` VALUES ('5', '1', 'alvft_58f23fbf78cb25.25817541', '0.01', 'Iphone 7 ', 'Iphone 7 商品描述', 'alipay', '1492271096', '1492271039', '1', '2017-04-15 23:43:59', '2017-04-15 23:44:56');
INSERT INTO `alvft_payment_order` VALUES ('6', '1', 'alvft_58f2402a607d59.63733120', '0.01', 'Iphone 7 ', 'Iphone 7 商品描述', 'alipay', '0', '1492271146', '0', '2017-04-15 23:45:46', '2017-04-15 23:45:46');
INSERT INTO `alvft_payment_order` VALUES ('7', '1', 'alvft_1_58f244de3283e7.10348978', '0.01', 'Apple iPhone 7 Plus (A1661) 128G 玫瑰金色 移动联通电信4G手机 ', 'Apple iPhone 7 Plus (A1661) 128G 玫瑰金色 移动联通电信4G手机 ', 'alipay', '0', '1492272350', '0', '2017-04-16 00:05:50', '2017-04-16 00:05:50');
INSERT INTO `alvft_payment_order` VALUES ('8', '2', 'alvft_2_58f4f190c61389.93264714', '3.00', '哈尔滨东 - 哈尔滨  购票日期:20170421', '哈尔滨东 - 哈尔滨  购票日期:20170421', 'alipay', '0', '1492447632', '0', '2017-04-18 00:47:12', '2017-04-18 00:47:12');

-- ----------------------------
-- Table structure for alvft_trains
-- ----------------------------
DROP TABLE IF EXISTS `alvft_trains`;
CREATE TABLE `alvft_trains` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '购票用户编号',
  `train_date` date NOT NULL COMMENT '乘车日期',
  `from_station_code` varchar(10) NOT NULL COMMENT '出发站简码',
  `from_station_name` varchar(20) NOT NULL COMMENT '出发站名称',
  `to_station_code` varchar(10) NOT NULL COMMENT '到达站简码',
  `to_station_name` varchar(20) NOT NULL COMMENT '到达站名称',
  `checi` varchar(10) NOT NULL COMMENT '车次，如：G7027',
  `passengers` longtext NOT NULL COMMENT '乘车人信息,json格式的字符串',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_orderid` varchar(50) DEFAULT NULL COMMENT '用户自定义订单号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='乘车信息表';

-- ----------------------------
-- Records of alvft_trains
-- ----------------------------
INSERT INTO `alvft_trains` VALUES ('1', '2', '2017-04-20', 'VNP', '北京南', 'AOH', '上海虹桥', 'G101', '[{\"passengerid\":1,\"passengersename\":\"张仕军\",\"piaotype\":1,\"piaotypename\":\"成人票\",\"passporttypeseid\":\"1\",\"passporttypeseidname\":\"二代身份证\",\"passportseno\":\"411522198903045154\",\"price\":\"1748\",\"zwcode\":9,\"zwname\":\"商务座\"}]', '2017-04-17 23:49:16', '2017-04-17 23:49:16', '20170417_58f4e3fbd0338');
INSERT INTO `alvft_trains` VALUES ('2', '2', '2017-04-21', 'VBB', '哈尔滨东', 'HBB', '哈尔滨', 'K7173', '[{\"passengerid\":1,\"passengersename\":\"张仕军\",\"piaotype\":1,\"piaotypename\":\"成人票\",\"passporttypeseid\":\"1\",\"passporttypeseidname\":\"二代身份证\",\"passportseno\":\"411522198903045154\",\"price\":\"3\",\"zwcode\":1,\"zwname\":\"硬座\"}]', '2017-04-18 00:08:30', '2017-04-18 00:08:30', '20170418_58f4e87e6e6d7');
INSERT INTO `alvft_trains` VALUES ('3', '2', '2017-04-21', 'VBB', '哈尔滨东', 'HBB', '哈尔滨', 'K7149', '[{\"passengerid\":1,\"passengersename\":\"张仕军\",\"piaotype\":1,\"piaotypename\":\"成人票\",\"passporttypeseid\":\"1\",\"passporttypeseidname\":\"二代身份证\",\"passportseno\":\"411522198903045154\",\"price\":\"3\",\"zwcode\":1,\"zwname\":\"硬座\"}]', '2017-04-18 00:16:45', '2017-04-18 00:16:45', '20170418_58f4ea6d1cbfa');

-- ----------------------------
-- Table structure for alvft_train_order
-- ----------------------------
DROP TABLE IF EXISTS `alvft_train_order`;
CREATE TABLE `alvft_train_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `trains_id` int(11) NOT NULL COMMENT '乘车信息编号',
  `return_order_id` int(11) DEFAULT NULL COMMENT '提交订单返回的，用于发起出票请求的订单号',
  `user_orderid` varchar(50) DEFAULT NULL COMMENT '用户自定义订单号',
  `payment_order_id` int(11) DEFAULT NULL COMMENT '支付订单编号',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='乘车订单表';

-- ----------------------------
-- Records of alvft_train_order
-- ----------------------------
INSERT INTO `alvft_train_order` VALUES ('1', '3', '2147483647', '20170418_58f4ea6d1cbfa', '0', '2017-04-18 00:16:45', '2017-04-18 00:16:45');

-- ----------------------------
-- Table structure for alvft_users
-- ----------------------------
DROP TABLE IF EXISTS `alvft_users`;
CREATE TABLE `alvft_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户昵称',
  `mobile` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '手机号',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '邮箱',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '登录凭据',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户信息表';

-- ----------------------------
-- Records of alvft_users
-- ----------------------------
INSERT INTO `alvft_users` VALUES ('1', '打哈哈', '18989899898', '', '$2y$10$rJMcxplmMFimKaFf3fS9k.TPeKs.OXoknF0w7UX328aiuGONq/7HW', null, '2017-04-15 22:54:06', '2017-04-15 22:54:06');
INSERT INTO `alvft_users` VALUES ('2', '18652497020', '18652497020', '', '', null, '2017-04-17 23:47:52', '2017-04-17 23:47:52');
