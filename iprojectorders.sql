/*
Navicat MySQL Data Transfer

Source Server         : localhost_3307
Source Server Version : 50505
Source Host           : localhost:3307
Source Database       : iprojectorders

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-03 10:27:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `CustomerCode` varchar(10) NOT NULL,
  `CustomerName` varchar(500) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
