/*
Navicat MySQL Data Transfer

Source Server         : 192.168.11.119
Source Server Version : 50639
Source Host           : 192.168.11.119:3306
Source Database       : visa

Target Server Type    : MYSQL
Target Server Version : 50639
File Encoding         : 65001

Date: 2019-05-09 13:36:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cms_banners
-- ----------------------------
DROP TABLE IF EXISTS `cms_banners`;
CREATE TABLE `cms_banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `description` varchar(255) NOT NULL COMMENT '描述',
  `img` varchar(255) NOT NULL COMMENT '图片或者视频',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sort` int(11) NOT NULL DEFAULT '0',
  `platform` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='banner图';
