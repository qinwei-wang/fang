/*
Navicat MySQL Data Transfer

Source Server         : 192.168.11.119
Source Server Version : 50639
Source Host           : 192.168.11.119:3306
Source Database       : visa

Target Server Type    : MYSQL
Target Server Version : 50639
File Encoding         : 65001

Date: 2019-05-09 13:38:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cms_users
-- ----------------------------
DROP TABLE IF EXISTS `cms_users`;
CREATE TABLE `cms_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_users
-- ----------------------------
INSERT INTO `cms_users` VALUES ('1', 'admin@sin.com', 'admin@sin.com', '$2y$10$8UlyMVEVbL.1Y4LLYinWsOJIBs1BIs0ImNKHxO82eexAFc2pYoexi', 'PJcZZ3Z3l7XQn5fCBCNXw7eRg1DXUao3g8elCKtun0XTV1kH8HnMsI0TZ4la', '2019-05-04 07:10:35', '2019-05-06 17:05:20');
INSERT INTO `cms_users` VALUES ('2', '\'sin.wang@sin.com\'', '\'sin.wang@sin.com\'', '$2y$10$3g8wFCzy3J237TiBQ.YNEuUoIGYkoml9gc.vKMQ37tLg.Z1L4vlKy', null, '2019-05-07 09:09:35', '2019-05-07 09:09:35');
