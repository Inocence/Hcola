/*
Navicat MySQL Data Transfer

Source Server         : 本地服务器_copy
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : doc

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-02-05 21:36:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for xq_cate
-- ----------------------------
DROP TABLE IF EXISTS `xq_cate`;
CREATE TABLE `xq_cate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `sort` int(5) DEFAULT '0',
  `syno` text COMMENT '接口介绍',
  `url` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '1' COMMENT '1get,2post',
  `get` text COMMENT 'get参数',
  `post` text COMMENT 'post参数',
  `param` text COMMENT '参数详解',
  `return` text COMMENT '返回参数',
  `result` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=285 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for xq_user
-- ----------------------------
DROP TABLE IF EXISTS `xq_user`;
CREATE TABLE `xq_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth` int(1) unsigned NOT NULL COMMENT '0-可读，1-可读可写',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
