/*
Navicat MySQL Data Transfer

Source Server         : 192.168.11.119
Source Server Version : 50639
Source Host           : 192.168.11.119:3306
Source Database       : visa

Target Server Type    : MYSQL
Target Server Version : 50639
File Encoding         : 65001

Date: 2019-05-09 13:42:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cms_country_details
-- ----------------------------
DROP TABLE IF EXISTS `cms_country_details`;
CREATE TABLE `cms_country_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL COMMENT '详情',
  `banner` text NOT NULL,
  `country_id` int(11) NOT NULL,
  `migrate` varchar(255) NOT NULL DEFAULT '',
  `ID_type` varchar(255) NOT NULL DEFAULT '',
  `visa` varchar(255) NOT NULL DEFAULT '',
  `img` varchar(255) NOT NULL DEFAULT '',
  `live` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='国家详情';

