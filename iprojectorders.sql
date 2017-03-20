/*
Navicat MySQL Data Transfer

Source Server         : localhost_3307
Source Server Version : 50505
Source Host           : localhost:3307
Source Database       : iprojectorders

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-20 15:19:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `CustomerCode` varchar(10) NOT NULL,
  `CustomerName` varchar(500) DEFAULT NULL,
  `FirstName` varchar(250) DEFAULT NULL,
  `LastName` varchar(500) DEFAULT NULL,
  `Email` varchar(500) DEFAULT NULL,
  `CustomerAddress` text,
  `ActiveStatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`CustomerCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `ItemCode` varchar(10) NOT NULL,
  `ItemName` varchar(500) NOT NULL,
  `ItemDate` date DEFAULT NULL,
  `ItemQty` decimal(18,2) DEFAULT NULL,
  `ItemUnit` varchar(10) DEFAULT NULL,
  `ItemPrice` decimal(18,2) DEFAULT NULL,
  `ItemImage` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ItemDescription` text,
  `ActiveStatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`ItemCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_id` varchar(255) DEFAULT NULL,
  `oauth_provider` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for orderdetails
-- ----------------------------
DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE `orderdetails` (
  `OrderID` int(1) NOT NULL AUTO_INCREMENT,
  `OrderNumber` varchar(10) DEFAULT NULL,
  `ItemCode` varchar(10) NOT NULL,
  `ItemName` varchar(500) DEFAULT NULL,
  `OrderQty` decimal(18,2) DEFAULT NULL,
  `OrderUnit` varchar(255) DEFAULT NULL,
  `OrderPrice` decimal(18,2) DEFAULT NULL,
  `TotalPrice` decimal(18,2) DEFAULT NULL,
  `ActiveStatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`OrderID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `OrderNumber` varchar(10) NOT NULL,
  `OrderDate` date DEFAULT NULL,
  `CustomerCode` varchar(10) DEFAULT NULL,
  `CustomerName` varchar(500) DEFAULT NULL,
  `CustomerAddress` text,
  `Remark` varchar(1000) DEFAULT NULL,
  `TotalOrderPrice` decimal(18,4) DEFAULT NULL,
  `ActiveStatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`OrderNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for units
-- ----------------------------
DROP TABLE IF EXISTS `units`;
CREATE TABLE `units` (
  `UnitID` int(11) NOT NULL AUTO_INCREMENT,
  `UnitCode` varchar(10) NOT NULL,
  `UnitName` varchar(500) DEFAULT NULL,
  `ActiveStatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`UnitID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
