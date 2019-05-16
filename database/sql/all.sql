/*
Navicat MySQL Data Transfer

Source Server         : 192.168.11.119
Source Server Version : 50639
Source Host           : 192.168.11.119:3306
Source Database       : visa

Target Server Type    : MYSQL
Target Server Version : 50639
File Encoding         : 65001

Date: 2019-05-15 11:54:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cms_advantages
-- ----------------------------
DROP TABLE IF EXISTS `cms_advantages`;
CREATE TABLE `cms_advantages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_advantages
-- ----------------------------
INSERT INTO `cms_advantages` VALUES ('8', '避税天堂', '入籍后可注册离岸公司，海外资产配置，财富管理', 'http://visa.test/images/default/5cd6829fdf013.png', '2019-05-11 08:07:17', '2019-05-11 08:07:17');
INSERT INTO `cms_advantages` VALUES ('9', '入籍极快', '30天能入籍，申请简单', 'http://visa.test/images/default/5cd682d91472b.png', '2019-05-11 08:08:03', '2019-05-11 08:08:03');
INSERT INTO `cms_advantages` VALUES ('10', '性价比高', '全部仅需17万美金，一家三代即可直接获得公民身份', 'http://visa.test/images/default/5cd68308cb7d1.png', '2019-05-11 08:08:49', '2019-05-11 08:08:49');
INSERT INTO `cms_advantages` VALUES ('11', '身份便利', '承认双重国籍，可保留中国身份', 'http://visa.test/images/default/5cd6832365278.png', '2019-05-11 08:09:16', '2019-05-11 08:09:16');
INSERT INTO `cms_advantages` VALUES ('12', '澳、新跳板', '毗邻澳新，更容易申请澳新 签证和移居', 'http://visa.test/images/default/5cd68341a304a.png', '2019-05-11 08:09:43', '2019-05-11 08:09:43');
INSERT INTO `cms_advantages` VALUES ('13', '政府支持', '法案支持，申请更安全', 'http://visa.test/images/default/5cd68364914f4.png', '2019-05-11 08:10:17', '2019-05-11 08:10:17');
INSERT INTO `cms_advantages` VALUES ('14', '子女教育', '入籍后，孩子可以在国内上 国籍学校', 'http://visa.test/images/default/5cd683774e8d1.png', '2019-05-11 08:10:36', '2019-05-11 08:10:36');
INSERT INTO `cms_advantages` VALUES ('15', '免签126国', '含英国（6个月），香港（3个月）', 'http://visa.test/images/default/5cd68390e4137.png', '2019-05-11 08:11:05', '2019-05-11 08:11:05');

-- ----------------------------
-- Table structure for cms_apply_conditions
-- ----------------------------
DROP TABLE IF EXISTS `cms_apply_conditions`;
CREATE TABLE `cms_apply_conditions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `condition` varchar(255) NOT NULL COMMENT '条件',
  `created_at` datetime DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `icon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_apply_conditions
-- ----------------------------
INSERT INTO `cms_apply_conditions` VALUES ('3', '18岁已上', '2019-05-11 08:15:26', '2019-05-11 08:15:26', 'http://visa.test/images/default/5cd6849bcc20e.png');
INSERT INTO `cms_apply_conditions` VALUES ('4', '无犯罪记录', '2019-05-11 08:15:45', '2019-05-11 08:15:45', 'http://visa.test/images/default/5cd684ad93bda.png');
INSERT INTO `cms_apply_conditions` VALUES ('5', '向国家专户捐献13万美金', '2019-05-11 08:16:00', '2019-05-11 08:16:00', 'http://visa.test/images/default/5cd684bf0f388.png');
INSERT INTO `cms_apply_conditions` VALUES ('6', '提供真实准确的资料文件', '2019-05-11 08:16:10', '2019-05-11 08:16:10', 'http://visa.test/images/default/5cd684c8cedd4.png');

-- ----------------------------
-- Table structure for cms_banners
-- ----------------------------
DROP TABLE IF EXISTS `cms_banners`;
CREATE TABLE `cms_banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `description` varchar(255) NOT NULL COMMENT '描述',
  `img` varchar(255) NOT NULL COMMENT '图片或者视频',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sort` int(11) NOT NULL DEFAULT '0',
  `platform` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='banner图';

-- ----------------------------
-- Records of cms_banners
-- ----------------------------
INSERT INTO `cms_banners` VALUES ('3', '有钱人', '穷逼，你不懂有钱人的世界', 'http://visa.test/images/default/5cd16f3b642c2.png', '2019-05-06 17:57:21', '2019-05-08 03:20:55', '0000-00-00 00:00:00', '12', 'PC');
INSERT INTO `cms_banners` VALUES ('6', '为什么选择我们', '离岸金融业发达保护客户隐私，信息安全', 'http://visa.test/images/default/5cd18d5ce6f44.png', '2019-05-07 13:51:41', '2019-05-07 13:51:41', '0000-00-00 00:00:00', '0', 'PC');
INSERT INTO `cms_banners` VALUES ('8', '为什么选择我们', '离岸金融业发达保护客户隐私，信息安全', 'http://visa.test/images/default/5cd18d9fad0ef.png', '2019-05-07 13:52:36', '2019-05-08 03:20:20', '0000-00-00 00:00:00', '4', 'H5');
INSERT INTO `cms_banners` VALUES ('13', '为什么选择我们', '离岸金融业发达保护客户隐私，信息安全', 'http://visa.test/images/default/5cd249fd3f982.png', '2019-05-08 03:16:16', '2019-05-08 03:16:16', '0000-00-00 00:00:00', '2', 'H5');

-- ----------------------------
-- Table structure for cms_countries
-- ----------------------------
DROP TABLE IF EXISTS `cms_countries`;
CREATE TABLE `cms_countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL COMMENT '国旗',
  `region` varchar(255) NOT NULL COMMENT '所属州',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ch_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8 COMMENT='国家';

-- ----------------------------
-- Records of cms_countries
-- ----------------------------
INSERT INTO `cms_countries` VALUES ('1', 'Afghanistan', 'https://restcountries.eu/data/afg.svg', 'Asia', '2019-05-05 08:48:28', '2019-05-09 13:46:51', '阿富汗');
INSERT INTO `cms_countries` VALUES ('2', 'Åland Islands', 'https://restcountries.eu/data/ala.svg', 'Europe', '2019-05-05 08:48:28', '2019-05-09 13:46:51', '奥兰群岛');
INSERT INTO `cms_countries` VALUES ('3', 'Albania', 'https://restcountries.eu/data/alb.svg', 'Europe', '2019-05-05 08:48:28', '2019-05-09 13:46:51', '阿尔巴尼亚');
INSERT INTO `cms_countries` VALUES ('4', 'Algeria', 'https://restcountries.eu/data/dza.svg', 'Africa', '2019-05-05 08:48:28', '2019-05-09 13:46:51', '阿尔及利亚');
INSERT INTO `cms_countries` VALUES ('5', 'American Samoa', 'https://restcountries.eu/data/asm.svg', 'Oceania', '2019-05-05 08:48:28', '2019-05-09 13:46:51', '美属萨摩亚');
INSERT INTO `cms_countries` VALUES ('6', 'Andorra', 'https://restcountries.eu/data/and.svg', 'Europe', '2019-05-05 08:48:28', '2019-05-09 13:46:51', '安道尔');
INSERT INTO `cms_countries` VALUES ('7', 'Angola', 'https://restcountries.eu/data/ago.svg', 'Africa', '2019-05-05 08:48:28', '2019-05-09 13:46:51', '安哥拉');
INSERT INTO `cms_countries` VALUES ('8', 'Anguilla', 'https://restcountries.eu/data/aia.svg', 'Americas', '2019-05-05 08:48:28', '2019-05-09 13:46:51', '安圭拉');
INSERT INTO `cms_countries` VALUES ('9', 'Antarctica', 'https://restcountries.eu/data/ata.svg', 'Polar', '2019-05-05 08:48:28', '2019-05-09 13:46:51', '南极洲');
INSERT INTO `cms_countries` VALUES ('10', 'Antigua and Barbuda', 'https://restcountries.eu/data/atg.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '安提瓜和巴布达');
INSERT INTO `cms_countries` VALUES ('11', 'Argentina', 'https://restcountries.eu/data/arg.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '阿根廷');
INSERT INTO `cms_countries` VALUES ('12', 'Armenia', 'https://restcountries.eu/data/arm.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '亚美尼亚');
INSERT INTO `cms_countries` VALUES ('13', 'Aruba', 'https://restcountries.eu/data/abw.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '阿鲁巴');
INSERT INTO `cms_countries` VALUES ('14', 'Australia', 'https://restcountries.eu/data/aus.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '澳大利亚');
INSERT INTO `cms_countries` VALUES ('15', 'Austria', 'https://restcountries.eu/data/aut.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '奥地利');
INSERT INTO `cms_countries` VALUES ('16', 'Azerbaijan', 'https://restcountries.eu/data/aze.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '阿塞拜疆');
INSERT INTO `cms_countries` VALUES ('17', 'Bahamas', 'https://restcountries.eu/data/bhs.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '巴哈马');
INSERT INTO `cms_countries` VALUES ('18', 'Bahrain', 'https://restcountries.eu/data/bhr.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '巴林');
INSERT INTO `cms_countries` VALUES ('19', 'Bangladesh', 'https://restcountries.eu/data/bgd.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '孟加拉国');
INSERT INTO `cms_countries` VALUES ('20', 'Barbados', 'https://restcountries.eu/data/brb.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '巴巴多斯');
INSERT INTO `cms_countries` VALUES ('21', 'Belarus', 'https://restcountries.eu/data/blr.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '白俄罗斯');
INSERT INTO `cms_countries` VALUES ('22', 'Belgium', 'https://restcountries.eu/data/bel.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '比利时');
INSERT INTO `cms_countries` VALUES ('23', 'Belize', 'https://restcountries.eu/data/blz.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '伯利兹');
INSERT INTO `cms_countries` VALUES ('24', 'Benin', 'https://restcountries.eu/data/ben.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '贝宁');
INSERT INTO `cms_countries` VALUES ('25', 'Bermuda', 'https://restcountries.eu/data/bmu.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '百慕大');
INSERT INTO `cms_countries` VALUES ('26', 'Bhutan', 'https://restcountries.eu/data/btn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '不丹');
INSERT INTO `cms_countries` VALUES ('27', 'Bolivia (Plurinational State of)', 'https://restcountries.eu/data/bol.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '玻利维亚（多民族国）');
INSERT INTO `cms_countries` VALUES ('28', 'Bonaire, Sint Eustatius and Saba', 'https://restcountries.eu/data/bes.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:52', '博内尔岛，圣尤斯特歇斯岛和萨巴岛');
INSERT INTO `cms_countries` VALUES ('29', 'Bosnia and Herzegovina', 'https://restcountries.eu/data/bih.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '波斯尼亚和黑塞哥维那');
INSERT INTO `cms_countries` VALUES ('30', 'Botswana', 'https://restcountries.eu/data/bwa.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '博茨瓦纳');
INSERT INTO `cms_countries` VALUES ('31', 'Bouvet Island', 'https://restcountries.eu/data/bvt.svg', '', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '布维岛');
INSERT INTO `cms_countries` VALUES ('32', 'Brazil', 'https://restcountries.eu/data/bra.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '巴西');
INSERT INTO `cms_countries` VALUES ('33', 'British Indian Ocean Territory', 'https://restcountries.eu/data/iot.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '英属印度洋领地');
INSERT INTO `cms_countries` VALUES ('34', 'United States Minor Outlying Islands', 'https://restcountries.eu/data/umi.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '美国本土外小岛屿');
INSERT INTO `cms_countries` VALUES ('35', 'Virgin Islands (British)', 'https://restcountries.eu/data/vgb.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '维尔京群岛（英属）');
INSERT INTO `cms_countries` VALUES ('36', 'Virgin Islands (U.S.)', 'https://restcountries.eu/data/vir.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '维尔京群岛（美国）');
INSERT INTO `cms_countries` VALUES ('37', 'Brunei Darussalam', 'https://restcountries.eu/data/brn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '文莱达鲁萨兰国');
INSERT INTO `cms_countries` VALUES ('38', 'Bulgaria', 'https://restcountries.eu/data/bgr.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '保加利亚');
INSERT INTO `cms_countries` VALUES ('39', 'Burkina Faso', 'https://restcountries.eu/data/bfa.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '布基纳法索');
INSERT INTO `cms_countries` VALUES ('40', 'Burundi', 'https://restcountries.eu/data/bdi.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '布隆迪');
INSERT INTO `cms_countries` VALUES ('41', 'Cambodia', 'https://restcountries.eu/data/khm.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '柬埔寨');
INSERT INTO `cms_countries` VALUES ('42', 'Cameroon', 'https://restcountries.eu/data/cmr.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '喀麦隆');
INSERT INTO `cms_countries` VALUES ('43', 'Canada', 'https://restcountries.eu/data/can.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '加拿大');
INSERT INTO `cms_countries` VALUES ('44', 'Cabo Verde', 'https://restcountries.eu/data/cpv.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:53', '佛得角');
INSERT INTO `cms_countries` VALUES ('45', 'Cayman Islands', 'https://restcountries.eu/data/cym.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '开曼群岛');
INSERT INTO `cms_countries` VALUES ('46', 'Central African Republic', 'https://restcountries.eu/data/caf.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '中非共和国');
INSERT INTO `cms_countries` VALUES ('47', 'Chad', 'https://restcountries.eu/data/tcd.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '乍得');
INSERT INTO `cms_countries` VALUES ('48', 'Chile', 'https://restcountries.eu/data/chl.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '智利');
INSERT INTO `cms_countries` VALUES ('49', 'China', 'https://restcountries.eu/data/chn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '中国');
INSERT INTO `cms_countries` VALUES ('50', 'Christmas Island', 'https://restcountries.eu/data/cxr.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '圣诞岛');
INSERT INTO `cms_countries` VALUES ('51', 'Cocos (Keeling) Islands', 'https://restcountries.eu/data/cck.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '科科斯（基林）群岛');
INSERT INTO `cms_countries` VALUES ('52', 'Colombia', 'https://restcountries.eu/data/col.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '哥伦比亚');
INSERT INTO `cms_countries` VALUES ('53', 'Comoros', 'https://restcountries.eu/data/com.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '科摩罗');
INSERT INTO `cms_countries` VALUES ('54', 'Congo', 'https://restcountries.eu/data/cog.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '刚果');
INSERT INTO `cms_countries` VALUES ('55', 'Congo (Democratic Republic of the)', 'https://restcountries.eu/data/cod.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '刚果（民主共和国）');
INSERT INTO `cms_countries` VALUES ('56', 'Cook Islands', 'https://restcountries.eu/data/cok.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '库克群岛');
INSERT INTO `cms_countries` VALUES ('57', 'Costa Rica', 'https://restcountries.eu/data/cri.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '哥斯达黎加');
INSERT INTO `cms_countries` VALUES ('58', 'Croatia', 'https://restcountries.eu/data/hrv.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '克罗地亚');
INSERT INTO `cms_countries` VALUES ('59', 'Cuba', 'https://restcountries.eu/data/cub.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:54', '古巴');
INSERT INTO `cms_countries` VALUES ('60', 'Curaçao', 'https://restcountries.eu/data/cuw.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:55', '库拉索');
INSERT INTO `cms_countries` VALUES ('61', 'Cyprus', 'https://restcountries.eu/data/cyp.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-09 13:46:55', '塞浦路斯');
INSERT INTO `cms_countries` VALUES ('62', 'Czech Republic', 'https://restcountries.eu/data/cze.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-09 13:46:55', '捷克共和国');
INSERT INTO `cms_countries` VALUES ('63', 'Denmark', 'https://restcountries.eu/data/dnk.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-09 13:46:55', '丹麦');
INSERT INTO `cms_countries` VALUES ('64', 'Djibouti', 'https://restcountries.eu/data/dji.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:55', '吉布提');
INSERT INTO `cms_countries` VALUES ('65', 'Dominica', 'https://restcountries.eu/data/dma.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-13 06:26:21', '多米尼克');
INSERT INTO `cms_countries` VALUES ('66', 'Dominican Republic', 'https://restcountries.eu/data/dom.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-13 06:26:17', '多米尼加');
INSERT INTO `cms_countries` VALUES ('67', 'Ecuador', 'https://restcountries.eu/data/ecu.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:55', '厄瓜多尔');
INSERT INTO `cms_countries` VALUES ('68', 'Egypt', 'https://restcountries.eu/data/egy.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:55', '埃及');
INSERT INTO `cms_countries` VALUES ('69', 'El Salvador', 'https://restcountries.eu/data/slv.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:55', '萨尔瓦多');
INSERT INTO `cms_countries` VALUES ('70', 'Equatorial Guinea', 'https://restcountries.eu/data/gnq.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:55', '赤道几内亚');
INSERT INTO `cms_countries` VALUES ('71', 'Eritrea', 'https://restcountries.eu/data/eri.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:55', '厄立特里亚');
INSERT INTO `cms_countries` VALUES ('72', 'Estonia', 'https://restcountries.eu/data/est.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-09 13:46:55', '爱沙尼亚');
INSERT INTO `cms_countries` VALUES ('73', 'Ethiopia', 'https://restcountries.eu/data/eth.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-09 13:46:55', '埃塞俄比亚');
INSERT INTO `cms_countries` VALUES ('74', 'Falkland Islands (Malvinas)', 'https://restcountries.eu/data/flk.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-09 13:46:55', '福克兰群岛（马尔维纳斯群岛）');
INSERT INTO `cms_countries` VALUES ('75', 'Faroe Islands', 'https://restcountries.eu/data/fro.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:36', '法罗群岛');
INSERT INTO `cms_countries` VALUES ('76', 'Fiji', 'https://restcountries.eu/data/fji.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-11 07:35:36', '斐');
INSERT INTO `cms_countries` VALUES ('77', 'Finland', 'https://restcountries.eu/data/fin.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:36', '芬兰');
INSERT INTO `cms_countries` VALUES ('78', 'France', 'https://restcountries.eu/data/fra.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:36', '法国');
INSERT INTO `cms_countries` VALUES ('79', 'French Guiana', 'https://restcountries.eu/data/guf.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-11 07:35:36', '法属圭亚那');
INSERT INTO `cms_countries` VALUES ('80', 'French Polynesia', 'https://restcountries.eu/data/pyf.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-11 07:35:36', '法属波利尼西亚');
INSERT INTO `cms_countries` VALUES ('81', 'French Southern Territories', 'https://restcountries.eu/data/atf.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:36', '法属南部领土');
INSERT INTO `cms_countries` VALUES ('82', 'Gabon', 'https://restcountries.eu/data/gab.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:36', '加蓬');
INSERT INTO `cms_countries` VALUES ('83', 'Gambia', 'https://restcountries.eu/data/gmb.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:36', '冈比亚');
INSERT INTO `cms_countries` VALUES ('84', 'Georgia', 'https://restcountries.eu/data/geo.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '格鲁吉亚');
INSERT INTO `cms_countries` VALUES ('85', 'Germany', 'https://restcountries.eu/data/deu.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '德国');
INSERT INTO `cms_countries` VALUES ('86', 'Ghana', 'https://restcountries.eu/data/gha.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '加纳');
INSERT INTO `cms_countries` VALUES ('87', 'Gibraltar', 'https://restcountries.eu/data/gib.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '直布罗陀');
INSERT INTO `cms_countries` VALUES ('88', 'Greece', 'https://restcountries.eu/data/grc.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '希腊');
INSERT INTO `cms_countries` VALUES ('89', 'Greenland', 'https://restcountries.eu/data/grl.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '格陵兰');
INSERT INTO `cms_countries` VALUES ('90', 'Grenada', 'https://restcountries.eu/data/grd.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '格林纳达');
INSERT INTO `cms_countries` VALUES ('91', 'Guadeloupe', 'https://restcountries.eu/data/glp.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '瓜德罗普岛');
INSERT INTO `cms_countries` VALUES ('92', 'Guam', 'https://restcountries.eu/data/gum.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '关岛');
INSERT INTO `cms_countries` VALUES ('93', 'Guatemala', 'https://restcountries.eu/data/gtm.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '危地马拉');
INSERT INTO `cms_countries` VALUES ('94', 'Guernsey', 'https://restcountries.eu/data/ggy.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '根西岛');
INSERT INTO `cms_countries` VALUES ('95', 'Guinea', 'https://restcountries.eu/data/gin.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '几内亚');
INSERT INTO `cms_countries` VALUES ('96', 'Guinea-Bissau', 'https://restcountries.eu/data/gnb.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '几内亚比绍');
INSERT INTO `cms_countries` VALUES ('97', 'Guyana', 'https://restcountries.eu/data/guy.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '圭亚那');
INSERT INTO `cms_countries` VALUES ('98', 'Haiti', 'https://restcountries.eu/data/hti.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '海地');
INSERT INTO `cms_countries` VALUES ('99', 'Heard Island and McDonald Islands', 'https://restcountries.eu/data/hmd.svg', '', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '赫德岛和麦当劳群岛');
INSERT INTO `cms_countries` VALUES ('100', 'Holy See', 'https://restcountries.eu/data/vat.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '教廷');
INSERT INTO `cms_countries` VALUES ('101', 'Honduras', 'https://restcountries.eu/data/hnd.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '洪都拉斯');
INSERT INTO `cms_countries` VALUES ('102', 'Hong Kong', 'https://restcountries.eu/data/hkg.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '香港');
INSERT INTO `cms_countries` VALUES ('103', 'Hungary', 'https://restcountries.eu/data/hun.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '匈牙利');
INSERT INTO `cms_countries` VALUES ('104', 'Iceland', 'https://restcountries.eu/data/isl.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '冰岛');
INSERT INTO `cms_countries` VALUES ('105', 'India', 'https://restcountries.eu/data/ind.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:37', '印度');
INSERT INTO `cms_countries` VALUES ('106', 'Indonesia', 'https://restcountries.eu/data/idn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '印度尼西亚');
INSERT INTO `cms_countries` VALUES ('107', 'Côte d\'Ivoire', 'https://restcountries.eu/data/civ.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '科特迪瓦');
INSERT INTO `cms_countries` VALUES ('108', 'Iran (Islamic Republic of)', 'https://restcountries.eu/data/irn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '伊朗（伊斯兰共和国）');
INSERT INTO `cms_countries` VALUES ('109', 'Iraq', 'https://restcountries.eu/data/irq.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '伊拉克');
INSERT INTO `cms_countries` VALUES ('110', 'Ireland', 'https://restcountries.eu/data/irl.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '爱尔兰');
INSERT INTO `cms_countries` VALUES ('111', 'Isle of Man', 'https://restcountries.eu/data/imn.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '马恩岛');
INSERT INTO `cms_countries` VALUES ('112', 'Israel', 'https://restcountries.eu/data/isr.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '以色列');
INSERT INTO `cms_countries` VALUES ('113', 'Italy', 'https://restcountries.eu/data/ita.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '意大利');
INSERT INTO `cms_countries` VALUES ('114', 'Jamaica', 'https://restcountries.eu/data/jam.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '牙买加');
INSERT INTO `cms_countries` VALUES ('115', 'Japan', 'https://restcountries.eu/data/jpn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '日本');
INSERT INTO `cms_countries` VALUES ('116', 'Jersey', 'https://restcountries.eu/data/jey.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '新泽西');
INSERT INTO `cms_countries` VALUES ('117', 'Jordan', 'https://restcountries.eu/data/jor.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '约旦');
INSERT INTO `cms_countries` VALUES ('118', 'Kazakhstan', 'https://restcountries.eu/data/kaz.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '哈萨克斯坦');
INSERT INTO `cms_countries` VALUES ('119', 'Kenya', 'https://restcountries.eu/data/ken.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '肯尼亚');
INSERT INTO `cms_countries` VALUES ('120', 'Kiribati', 'https://restcountries.eu/data/kir.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '基里巴斯');
INSERT INTO `cms_countries` VALUES ('121', 'Kuwait', 'https://restcountries.eu/data/kwt.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '科威特');
INSERT INTO `cms_countries` VALUES ('122', 'Kyrgyzstan', 'https://restcountries.eu/data/kgz.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '吉尔吉斯斯坦');
INSERT INTO `cms_countries` VALUES ('123', 'Lao People\'s Democratic Republic', 'https://restcountries.eu/data/lao.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '老挝人民民主共和国');
INSERT INTO `cms_countries` VALUES ('124', 'Latvia', 'https://restcountries.eu/data/lva.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '拉脱维亚');
INSERT INTO `cms_countries` VALUES ('125', 'Lebanon', 'https://restcountries.eu/data/lbn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '黎巴嫩');
INSERT INTO `cms_countries` VALUES ('126', 'Lesotho', 'https://restcountries.eu/data/lso.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '莱索托');
INSERT INTO `cms_countries` VALUES ('127', 'Liberia', 'https://restcountries.eu/data/lbr.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '利比里亚');
INSERT INTO `cms_countries` VALUES ('128', 'Libya', 'https://restcountries.eu/data/lby.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:38', '利比亚');
INSERT INTO `cms_countries` VALUES ('129', 'Liechtenstein', 'https://restcountries.eu/data/lie.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '列支敦士登');
INSERT INTO `cms_countries` VALUES ('130', 'Lithuania', 'https://restcountries.eu/data/ltu.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '立陶宛');
INSERT INTO `cms_countries` VALUES ('131', 'Luxembourg', 'https://restcountries.eu/data/lux.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '卢森堡');
INSERT INTO `cms_countries` VALUES ('132', 'Macao', 'https://restcountries.eu/data/mac.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '澳门');
INSERT INTO `cms_countries` VALUES ('133', 'Macedonia (the former Yugoslav Republic of)', 'https://restcountries.eu/data/mkd.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '马其顿（前南斯拉夫共和国）');
INSERT INTO `cms_countries` VALUES ('134', 'Madagascar', 'https://restcountries.eu/data/mdg.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '马达加斯加');
INSERT INTO `cms_countries` VALUES ('135', 'Malawi', 'https://restcountries.eu/data/mwi.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '马拉维');
INSERT INTO `cms_countries` VALUES ('136', 'Malaysia', 'https://restcountries.eu/data/mys.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '马来西亚');
INSERT INTO `cms_countries` VALUES ('137', 'Maldives', 'https://restcountries.eu/data/mdv.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '马尔代夫');
INSERT INTO `cms_countries` VALUES ('138', 'Mali', 'https://restcountries.eu/data/mli.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '马里');
INSERT INTO `cms_countries` VALUES ('139', 'Malta', 'https://restcountries.eu/data/mlt.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '马耳他');
INSERT INTO `cms_countries` VALUES ('140', 'Marshall Islands', 'https://restcountries.eu/data/mhl.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '马绍尔群岛');
INSERT INTO `cms_countries` VALUES ('141', 'Martinique', 'https://restcountries.eu/data/mtq.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '马提尼克');
INSERT INTO `cms_countries` VALUES ('142', 'Mauritania', 'https://restcountries.eu/data/mrt.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '毛里塔尼亚');
INSERT INTO `cms_countries` VALUES ('143', 'Mauritius', 'https://restcountries.eu/data/mus.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '毛里求斯');
INSERT INTO `cms_countries` VALUES ('144', 'Mayotte', 'https://restcountries.eu/data/myt.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '马约特');
INSERT INTO `cms_countries` VALUES ('145', 'Mexico', 'https://restcountries.eu/data/mex.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '墨西哥');
INSERT INTO `cms_countries` VALUES ('146', 'Micronesia (Federated States of)', 'https://restcountries.eu/data/fsm.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '密克罗尼西亚（联邦）');
INSERT INTO `cms_countries` VALUES ('147', 'Moldova (Republic of)', 'https://restcountries.eu/data/mda.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:39', '摩尔多瓦（共和国）');
INSERT INTO `cms_countries` VALUES ('148', 'Monaco', 'https://restcountries.eu/data/mco.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '摩纳哥');
INSERT INTO `cms_countries` VALUES ('149', 'Mongolia', 'https://restcountries.eu/data/mng.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '蒙古');
INSERT INTO `cms_countries` VALUES ('150', 'Montenegro', 'https://restcountries.eu/data/mne.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '黑山');
INSERT INTO `cms_countries` VALUES ('151', 'Montserrat', 'https://restcountries.eu/data/msr.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '蒙特塞拉特');
INSERT INTO `cms_countries` VALUES ('152', 'Morocco', 'https://restcountries.eu/data/mar.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '摩洛哥');
INSERT INTO `cms_countries` VALUES ('153', 'Mozambique', 'https://restcountries.eu/data/moz.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '莫桑比克');
INSERT INTO `cms_countries` VALUES ('154', 'Myanmar', 'https://restcountries.eu/data/mmr.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '缅甸');
INSERT INTO `cms_countries` VALUES ('155', 'Namibia', 'https://restcountries.eu/data/nam.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '纳米比亚');
INSERT INTO `cms_countries` VALUES ('156', 'Nauru', 'https://restcountries.eu/data/nru.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '瑙鲁');
INSERT INTO `cms_countries` VALUES ('157', 'Nepal', 'https://restcountries.eu/data/npl.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '尼泊尔');
INSERT INTO `cms_countries` VALUES ('158', 'Netherlands', 'https://restcountries.eu/data/nld.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '荷兰');
INSERT INTO `cms_countries` VALUES ('159', 'New Caledonia', 'https://restcountries.eu/data/ncl.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '新喀里多尼亚');
INSERT INTO `cms_countries` VALUES ('160', 'New Zealand', 'https://restcountries.eu/data/nzl.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '新西兰');
INSERT INTO `cms_countries` VALUES ('161', 'Nicaragua', 'https://restcountries.eu/data/nic.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '尼加拉瓜');
INSERT INTO `cms_countries` VALUES ('162', 'Niger', 'https://restcountries.eu/data/ner.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '尼日尔');
INSERT INTO `cms_countries` VALUES ('163', 'Nigeria', 'https://restcountries.eu/data/nga.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '尼日利亚');
INSERT INTO `cms_countries` VALUES ('164', 'Niue', 'https://restcountries.eu/data/niu.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '纽埃');
INSERT INTO `cms_countries` VALUES ('165', 'Norfolk Island', 'https://restcountries.eu/data/nfk.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '诺福克岛');
INSERT INTO `cms_countries` VALUES ('166', 'Korea (Democratic People\'s Republic of)', 'https://restcountries.eu/data/prk.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '韩国（民主人民共和国）');
INSERT INTO `cms_countries` VALUES ('167', 'Northern Mariana Islands', 'https://restcountries.eu/data/mnp.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '北马里亚纳群岛');
INSERT INTO `cms_countries` VALUES ('168', 'Norway', 'https://restcountries.eu/data/nor.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '挪威');
INSERT INTO `cms_countries` VALUES ('169', 'Oman', 'https://restcountries.eu/data/omn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-11 07:35:40', '阿曼');
INSERT INTO `cms_countries` VALUES ('170', 'Pakistan', 'https://restcountries.eu/data/pak.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '巴基斯坦');
INSERT INTO `cms_countries` VALUES ('171', 'Palau', 'https://restcountries.eu/data/plw.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '帕劳');
INSERT INTO `cms_countries` VALUES ('172', 'Palestine, State of', 'https://restcountries.eu/data/pse.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '巴勒斯坦，');
INSERT INTO `cms_countries` VALUES ('173', 'Panama', 'https://restcountries.eu/data/pan.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '巴拿马');
INSERT INTO `cms_countries` VALUES ('174', 'Papua New Guinea', 'https://restcountries.eu/data/png.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '巴布亚新几内亚');
INSERT INTO `cms_countries` VALUES ('175', 'Paraguay', 'https://restcountries.eu/data/pry.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '巴拉圭');
INSERT INTO `cms_countries` VALUES ('176', 'Peru', 'https://restcountries.eu/data/per.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '秘鲁');
INSERT INTO `cms_countries` VALUES ('177', 'Philippines', 'https://restcountries.eu/data/phl.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '菲律宾');
INSERT INTO `cms_countries` VALUES ('178', 'Pitcairn', 'https://restcountries.eu/data/pcn.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '皮特凯恩');
INSERT INTO `cms_countries` VALUES ('179', 'Poland', 'https://restcountries.eu/data/pol.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '波兰');
INSERT INTO `cms_countries` VALUES ('180', 'Portugal', 'https://restcountries.eu/data/prt.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '葡萄牙');
INSERT INTO `cms_countries` VALUES ('181', 'Puerto Rico', 'https://restcountries.eu/data/pri.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '波多黎各');
INSERT INTO `cms_countries` VALUES ('182', 'Qatar', 'https://restcountries.eu/data/qat.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '卡塔尔');
INSERT INTO `cms_countries` VALUES ('183', 'Republic of Kosovo', 'https://restcountries.eu/data/kos.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '科索沃共和国');
INSERT INTO `cms_countries` VALUES ('184', 'Réunion', 'https://restcountries.eu/data/reu.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '团圆');
INSERT INTO `cms_countries` VALUES ('185', 'Romania', 'https://restcountries.eu/data/rou.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '罗马尼亚');
INSERT INTO `cms_countries` VALUES ('186', 'Russian Federation', 'https://restcountries.eu/data/rus.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:41', '俄罗斯联邦');
INSERT INTO `cms_countries` VALUES ('187', 'Rwanda', 'https://restcountries.eu/data/rwa.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:42', '卢旺达');
INSERT INTO `cms_countries` VALUES ('188', 'Saint Barthélemy', 'https://restcountries.eu/data/blm.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:42', '圣巴泰勒米');
INSERT INTO `cms_countries` VALUES ('189', 'Saint Helena, Ascension and Tristan da Cunha', 'https://restcountries.eu/data/shn.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:42', '圣赫勒拿，阿森松岛和特里斯坦达库尼亚');
INSERT INTO `cms_countries` VALUES ('190', 'Saint Kitts and Nevis', 'https://restcountries.eu/data/kna.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:42', '圣基茨和尼维斯');
INSERT INTO `cms_countries` VALUES ('191', 'Saint Lucia', 'https://restcountries.eu/data/lca.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:42', '圣卢西亚');
INSERT INTO `cms_countries` VALUES ('192', 'Saint Martin (French part)', 'https://restcountries.eu/data/maf.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:42', '圣马丁（法国部分）');
INSERT INTO `cms_countries` VALUES ('193', 'Saint Pierre and Miquelon', 'https://restcountries.eu/data/spm.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:42', '圣皮埃尔和密克隆');
INSERT INTO `cms_countries` VALUES ('194', 'Saint Vincent and the Grenadines', 'https://restcountries.eu/data/vct.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:42', '圣文森特和格林纳丁斯');
INSERT INTO `cms_countries` VALUES ('195', 'Samoa', 'https://restcountries.eu/data/wsm.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-11 07:35:42', '萨摩亚');
INSERT INTO `cms_countries` VALUES ('196', 'San Marino', 'https://restcountries.eu/data/smr.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:42', '圣马力诺');
INSERT INTO `cms_countries` VALUES ('197', 'Sao Tome and Principe', 'https://restcountries.eu/data/stp.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:42', '圣多美和普林西比');
INSERT INTO `cms_countries` VALUES ('198', 'Saudi Arabia', 'https://restcountries.eu/data/sau.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:42', '沙特阿拉伯');
INSERT INTO `cms_countries` VALUES ('199', 'Senegal', 'https://restcountries.eu/data/sen.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:42', '塞内加尔');
INSERT INTO `cms_countries` VALUES ('200', 'Serbia', 'https://restcountries.eu/data/srb.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:42', '塞尔维亚');
INSERT INTO `cms_countries` VALUES ('201', 'Seychelles', 'https://restcountries.eu/data/syc.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '塞舌尔');
INSERT INTO `cms_countries` VALUES ('202', 'Sierra Leone', 'https://restcountries.eu/data/sle.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '塞拉利昂');
INSERT INTO `cms_countries` VALUES ('203', 'Singapore', 'https://restcountries.eu/data/sgp.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '新加坡');
INSERT INTO `cms_countries` VALUES ('204', 'Sint Maarten (Dutch part)', 'https://restcountries.eu/data/sxm.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:43', 'Sint Maarten（荷兰语部分）');
INSERT INTO `cms_countries` VALUES ('205', 'Slovakia', 'https://restcountries.eu/data/svk.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '斯洛伐克');
INSERT INTO `cms_countries` VALUES ('206', 'Slovenia', 'https://restcountries.eu/data/svn.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '斯洛文尼亚');
INSERT INTO `cms_countries` VALUES ('207', 'Solomon Islands', 'https://restcountries.eu/data/slb.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '所罗门群岛');
INSERT INTO `cms_countries` VALUES ('208', 'Somalia', 'https://restcountries.eu/data/som.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '索马里');
INSERT INTO `cms_countries` VALUES ('209', 'South Africa', 'https://restcountries.eu/data/zaf.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '南非');
INSERT INTO `cms_countries` VALUES ('210', 'South Georgia and the South Sandwich Islands', 'https://restcountries.eu/data/sgs.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '南乔治亚岛和南桑威奇群岛');
INSERT INTO `cms_countries` VALUES ('211', 'Korea (Republic of)', 'https://restcountries.eu/data/kor.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '韩国（共和国）');
INSERT INTO `cms_countries` VALUES ('212', 'South Sudan', 'https://restcountries.eu/data/ssd.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '南苏丹');
INSERT INTO `cms_countries` VALUES ('213', 'Spain', 'https://restcountries.eu/data/esp.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '西班牙');
INSERT INTO `cms_countries` VALUES ('214', 'Sri Lanka', 'https://restcountries.eu/data/lka.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '斯里兰卡');
INSERT INTO `cms_countries` VALUES ('215', 'Sudan', 'https://restcountries.eu/data/sdn.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '苏丹');
INSERT INTO `cms_countries` VALUES ('216', 'Suriname', 'https://restcountries.eu/data/sur.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '苏里南');
INSERT INTO `cms_countries` VALUES ('217', 'Svalbard and Jan Mayen', 'https://restcountries.eu/data/sjm.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:43', '斯瓦尔巴和扬马延');
INSERT INTO `cms_countries` VALUES ('218', 'Swaziland', 'https://restcountries.eu/data/swz.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '斯威士兰');
INSERT INTO `cms_countries` VALUES ('219', 'Sweden', 'https://restcountries.eu/data/swe.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '瑞典');
INSERT INTO `cms_countries` VALUES ('220', 'Switzerland', 'https://restcountries.eu/data/che.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '瑞士');
INSERT INTO `cms_countries` VALUES ('221', 'Syrian Arab Republic', 'https://restcountries.eu/data/syr.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '阿拉伯叙利亚共和国');
INSERT INTO `cms_countries` VALUES ('222', 'Taiwan', 'https://restcountries.eu/data/twn.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '台湾');
INSERT INTO `cms_countries` VALUES ('223', 'Tajikistan', 'https://restcountries.eu/data/tjk.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '塔吉克斯坦');
INSERT INTO `cms_countries` VALUES ('224', 'Tanzania, United Republic of', 'https://restcountries.eu/data/tza.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '坦桑尼亚联合共和国');
INSERT INTO `cms_countries` VALUES ('225', 'Thailand', 'https://restcountries.eu/data/tha.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '泰国');
INSERT INTO `cms_countries` VALUES ('226', 'Timor-Leste', 'https://restcountries.eu/data/tls.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '东帝汶');
INSERT INTO `cms_countries` VALUES ('227', 'Togo', 'https://restcountries.eu/data/tgo.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '多哥');
INSERT INTO `cms_countries` VALUES ('228', 'Tokelau', 'https://restcountries.eu/data/tkl.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '托克劳');
INSERT INTO `cms_countries` VALUES ('229', 'Tonga', 'https://restcountries.eu/data/ton.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '汤加');
INSERT INTO `cms_countries` VALUES ('230', 'Trinidad and Tobago', 'https://restcountries.eu/data/tto.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '特立尼达和多巴哥');
INSERT INTO `cms_countries` VALUES ('231', 'Tunisia', 'https://restcountries.eu/data/tun.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '突尼斯');
INSERT INTO `cms_countries` VALUES ('232', 'Turkey', 'https://restcountries.eu/data/tur.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-14 08:07:57', '土耳其');
INSERT INTO `cms_countries` VALUES ('233', 'Turkmenistan', 'https://restcountries.eu/data/tkm.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '土库曼斯坦');
INSERT INTO `cms_countries` VALUES ('234', 'Turks and Caicos Islands', 'https://restcountries.eu/data/tca.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '特克斯和凯科斯群岛');
INSERT INTO `cms_countries` VALUES ('235', 'Tuvalu', 'https://restcountries.eu/data/tuv.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '图瓦卢');
INSERT INTO `cms_countries` VALUES ('236', 'Uganda', 'https://restcountries.eu/data/uga.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '乌干达');
INSERT INTO `cms_countries` VALUES ('237', 'Ukraine', 'https://restcountries.eu/data/ukr.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:44', '乌克兰');
INSERT INTO `cms_countries` VALUES ('238', 'United Arab Emirates', 'https://restcountries.eu/data/are.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:45', '阿拉伯联合酋长国');
INSERT INTO `cms_countries` VALUES ('239', 'United Kingdom of Great Britain and Northern Ireland', 'https://restcountries.eu/data/gbr.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-11 07:35:45', '大不列颠及北爱尔兰联合王国');
INSERT INTO `cms_countries` VALUES ('240', 'United States of America', 'https://restcountries.eu/data/usa.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:45', '美国');
INSERT INTO `cms_countries` VALUES ('241', 'Uruguay', 'https://restcountries.eu/data/ury.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:45', '乌拉圭');
INSERT INTO `cms_countries` VALUES ('242', 'Uzbekistan', 'https://restcountries.eu/data/uzb.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:45', '乌兹别克斯坦');
INSERT INTO `cms_countries` VALUES ('243', 'Vanuatu', 'https://restcountries.eu/data/vut.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-11 07:35:45', '瓦努阿图');
INSERT INTO `cms_countries` VALUES ('244', 'Venezuela (Bolivarian Republic of)', 'https://restcountries.eu/data/ven.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-11 07:35:45', '委内瑞拉（玻利瓦尔共和国）');
INSERT INTO `cms_countries` VALUES ('245', 'Viet Nam', 'https://restcountries.eu/data/vnm.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:45', '越南');
INSERT INTO `cms_countries` VALUES ('246', 'Wallis and Futuna', 'https://restcountries.eu/data/wlf.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-11 07:35:45', '瓦利斯和富图纳群岛');
INSERT INTO `cms_countries` VALUES ('247', 'Western Sahara', 'https://restcountries.eu/data/esh.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:45', '撒哈拉沙漠西部');
INSERT INTO `cms_countries` VALUES ('248', 'Yemen', 'https://restcountries.eu/data/yem.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-11 07:35:45', '也门');
INSERT INTO `cms_countries` VALUES ('249', 'Zambia', 'https://restcountries.eu/data/zmb.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:45', '赞比亚');
INSERT INTO `cms_countries` VALUES ('250', 'Zimbabwe', 'https://restcountries.eu/data/zwe.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-11 07:35:45', '津巴布韦');

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
  `visa_free` varchar(255) NOT NULL DEFAULT '',
  `img` varchar(255) NOT NULL DEFAULT '',
  `live` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `passport` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  `advantage_ids` varchar(255) NOT NULL,
  `process` varchar(255) NOT NULL,
  `apply_condition_ids` varchar(255) NOT NULL,
  `user_type_ids` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `advantage` varchar(255) NOT NULL,
  `disadvantage` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='国家详情';

-- ----------------------------
-- Records of cms_country_details
-- ----------------------------
INSERT INTO `cms_country_details` VALUES ('6', '瓦努阿图，位于太平洋西南部，属英联邦成员国，毗邻澳大利亚、新西兰、斐济等国，是澳、新的后花园，被评为“全球幸福指数最高的国度”，持有瓦国公民可免签120多个国家，申请澳、新签证和移居更容易。2016年12月19日，瓦努阿图正式立法通过《2016年第220号国籍条例（捐献计划）法令》,制定了捐献计划的细则：通过捐献计划筹集资金并吸纳高素质的新移民，推动瓦国经济发展。', '{\"title\":\"\\u74e6\\u52aa\\u963f\\u56fe\\u79fb\\u6c11\",\"img\":\"http:\\/\\/visa.test\\/images\\/default\\/5cd6813bcf52a.png\",\"description\":\"\\u6295\\u8d44\\u7eb8\\u4e1a\\u3000\\u5b9a\\u5c45\\u751f\\u6d3b\\u3000\\u5168\\u9762\\u89c4\\u5212\"}', '243', '一个月', '1', '126', 'http://visa.test/images/default/5cd68115d3018.png', '低', '2019-05-11 07:59:30', '2019-05-14 13:29:32', '1', 'http://visa.test/images/default/5cd9027dbdabd.png', '0', '[\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\"]', '签约，初步评估 跟律师评估;重建基金捐款;瓦努阿图 政府背景调查;移民律师递交 提名文件;总理提名 总统推荐;成功入籍和获签 发瓦努阿图护照', '[\"3\",\"4\",\"5\",\"6\"]', '[\"4\",\"5\",\"6\",\"7\",\"8\",\"9\"]', '快至28天，申请材料简单背调宽松 国家捐赠', '{\"title\":\"\\u74e6\\u52aa\\u963f\\u56fe\\u62a4\\u7167\",\"content\":\"\\u653f\\u5e9c\\u6cd5\\u652f\\u6301\\uff0c\\u5b89\\u5168\\u53ef\\u9760;\\u7533\\u8bf7\\u7b80\\u5355\\uff0c\\u4ec5\\u97008\\u4efd\\u6587\\u4ef6;\\u83b7\\u6279\\u5feb\\uff0c30\\u5929\\u5168\\u5bb6\\u5165\\u5883;\\u95e8\\u69db\\u4f', '{\"title\":\"\\u5927\\u56fd\\u7eff\\u5361\",\"content\":\"\\u8d44\\u91d1\\u9ad8\\uff0c\\u98ce\\u9669\\u9ad8;\\u8bed\\u8a00\\u3001\\u5b66\\u5386\\u3001\\u7ba1\\u7406\\u6709\\u8981\\u6c42;\\u529e\\u7406\\u5468\\u671f\\u957f\\uff0c\\u6709\\u79fb\\u6c11\\u76d1;\\u95e8\\u69db\\u9ad8\\uff0c\\u6750\\u6599\\', '1');
INSERT INTO `cms_country_details` VALUES ('7', '塞浦路斯护照是全球富人公认的尊贵护照。投资者只需在塞浦路斯购买200万欧房产，就可一人申请，三代移民；持塞护照，可免签入境164个国家，以欧洲公民身份，享受欧盟高端教育，医疗，工作等高福利；塞也是全球税率最低的国家之一，是金融公司抢驻的圣地，持塞护照在当地成立证券、信托、债券、外汇期货等金融公司，可以全球经营，所得收入最高享受100%税收减免。', '{\"title\":\"\",\"img\":\"\",\"description\":\"\"}', '61', '六个月', '1', '164', 'http://visa.test/images/default/5cd68f5441000.png', '无', '2019-05-11 08:51:04', '2019-05-14 13:08:35', '1', 'http://visa.test/images/default/5cd9041412891.png', '0', '[\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\"]', '', '[\"3\",\"4\",\"5\",\"6\"]', '[\"4\",\"5\",\"6\",\"7\",\"8\",\"9\"]', '买房即可快速获得的欧盟护照 投资房产', '{\"title\":\"\\u6b27\\u76df\\u62a4\\u7167\",\"content\":\"\"}', '{\"title\":\"\",\"content\":\"\"}', '3');
INSERT INTO `cms_country_details` VALUES ('8', '圣基茨位于北美洲东加勒比海背风群岛北部，是世界三大国家集团英联邦的成员国家。1984年推出投资入籍计划，是世界上同类项目中建立时间最久的项目。作为世界级的离岸税务天堂，该国公民无个人所得税、资本利得税、净资产税、遗产税、赠与税、无全球征税。而且对于移民者不征收海外收入的个人所得税，方便申请人转移和存放资产，也方便申请人开设离岸公司和离岸账户，成就跨国生意。', '{\"title\":\"\",\"img\":\"\",\"description\":\"\"}', '190', '五个月', '1', '154', 'http://visa.test/images/default/5cd68e2d67c03.png', '无', '2019-05-11 08:56:03', '2019-05-14 13:08:20', '1', 'http://visa.test/images/default/5cd9041fcfb1f.png', '2', '[\"8\",\"10\",\"11\",\"13\",\"14\",\"15\"]', '', '[\"3\",\"4\",\"5\",\"6\"]', '[\"4\",\"5\",\"6\",\"7\",\"8\",\"9\"]', '最早的护照项目，名人案例丰富 投资房产/国家捐赠', '{\"title\":\"\",\"content\":\"\"}', '{\"title\":\"\",\"content\":\"\"}', '2');
INSERT INTO `cms_country_details` VALUES ('10', '圣卢西亚是阿根廷的城镇，位于该国西部圣胡安省，是圣卢西亚县的首府，始建于1869年12月4日，主要经济活动是农业，海拔高度761米，2010年人口48,137。', '{\"title\":\"\",\"img\":\"\",\"description\":\"\"}', '191', '3个月', '1', '147', 'http://visa.test/images/default/5cd9044b821f8.png', '无', '2019-05-13 05:40:02', '2019-05-14 13:08:56', '1', 'http://visa.test/images/default/5cd9048bd20b7.png', '0', '[\"8\",\"9\",\"10\",\"11\",\"12\",\"14\"]', '', '[\"3\",\"4\",\"5\",\"6\"]', '[\"4\",\"5\",\"6\",\"7\",\"8\"]', '可以更名，单人办理便宜 投资房产/国家捐赠', '', '', '6');
INSERT INTO `cms_country_details` VALUES ('11', '多米尼克国（The Commonwealth of Dominica）是位于东加勒比海向风群岛东北部的一个岛国。东临大西洋，西濒加勒比海，南与马提尼克岛隔马提尼克海峡、北同瓜德罗普隔多米尼克海峡相望。国土面积751平方公里，年均气温25至32度，热带海洋气候。主要居民为黑人和黑白混血种人。', '{\"title\":\"\",\"img\":\"\",\"description\":\"\"}', '65', '2个月', '1', '134', 'http://visa.test/images/default/5cd9125c90219.png', '无', '2019-05-13 06:44:24', '2019-05-14 13:08:45', '1', 'http://visa.test/images/default/5cd9128b993d3.png', '0', '[\"8\",\"9\",\"11\",\"12\",\"13\",\"14\",\"15\"]', '', '[\"3\",\"4\",\"5\",\"6\"]', '[\"4\",\"6\",\"7\",\"8\"]', '可以更名，成功案例最丰富 国家捐赠/投资房产', '{\"title\":\"\\u5c0f\\u56fd\\u4f18\\u52bf\",\"content\":\"\\u597d\\u73a9;\\u597d\\u770b\"}', '{\"title\":\"\\u5927\\u56fd\\u52a3\\u52bf\",\"content\":\"\\u8d35;\\u6ca1\\u670d\\u52a1\"}', '4');
INSERT INTO `cms_country_details` VALUES ('13', '', '{\"title\":\"\",\"img\":\"\",\"description\":\"\"}', '90', '2个月', '1', '128', 'http://visa.test/images/default/5cdabd4518c15.png', '无', '2019-05-14 13:04:56', '2019-05-14 13:08:52', '1', 'http://visa.test/images/default/5cdabda855ab3.png', '0', '', '', '', '', '免签中国，可申请美国E2签证 国家捐赠/投资房产', '{\"title\":\"\",\"content\":\"\"}', '{\"title\":\"\",\"content\":\"\"}', '5');

-- ----------------------------
-- Table structure for cms_user_types
-- ----------------------------
DROP TABLE IF EXISTS `cms_user_types`;
CREATE TABLE `cms_user_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `description` varchar(255) NOT NULL COMMENT '描述',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_user_types
-- ----------------------------
INSERT INTO `cms_user_types` VALUES ('4', '税务规划者', '事业家，企业家，高净值人士等需要配置海外资产，开设海外账户，合理规划财税，规避CRSVAEO/FATCA等全球征税群体', '2019-05-11 08:11:59', '2019-05-11 08:11:59');
INSERT INTO `cms_user_types` VALUES ('5', '旅游出行', '商务出差频繁、旅游爱好者等长期往返于世界各地，又疲于一次次签证的奔波与困扰的群体。', '2019-05-11 08:12:20', '2019-05-11 08:12:20');
INSERT INTO `cms_user_types` VALUES ('6', '子女教育', '离岸金融业发达保护客户隐私，信息安全', '2019-05-11 08:12:35', '2019-05-11 08:12:35');
INSERT INTO `cms_user_types` VALUES ('7', '海外定居', '希望换个好的生活环境，方便养老，享受惬意海外生活的群体。', '2019-05-11 08:12:57', '2019-05-11 08:12:57');
INSERT INTO `cms_user_types` VALUES ('8', '身份安全', '想要获取第二身份，为自身及资产安全作保障的人群。', '2019-05-11 08:13:09', '2019-05-11 08:13:09');
INSERT INTO `cms_user_types` VALUES ('9', '其他群体', '不想耗费太多时间与金钱，不想投资房产的移民申请者。', '2019-05-11 08:13:22', '2019-05-11 08:13:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_users
-- ----------------------------
INSERT INTO `cms_users` VALUES ('2', 'admin@sin.com', 'admin@sin.com', '$2y$10$8UlyMVEVbL.1Y4LLYinWsOJIBs1BIs0ImNKHxO82eexAFc2pYoexi', 'UrJ6jnsfVfpikI2RGcxCRB3mw1a9bfK2MeWVI6EcEbnEuo7h4oiN5KbTRv0M', '2019-05-04 07:10:35', '2019-05-14 08:16:39');
INSERT INTO `cms_users` VALUES ('3', '\'sin.wang@sin.com\'', '\'sin.wang@sin.com\'', '$2y$10$3g8wFCzy3J237TiBQ.YNEuUoIGYkoml9gc.vKMQ37tLg.Z1L4vlKy', null, '2019-05-07 09:09:35', '2019-05-07 09:09:35');

-- ----------------------------
-- Table structure for cms_visa_countries
-- ----------------------------
DROP TABLE IF EXISTS `cms_visa_countries`;
CREATE TABLE `cms_visa_countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `visa_country_id` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  KEY `visa_country_id` (`visa_country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8 COMMENT='签证国家';

-- ----------------------------
-- Records of cms_visa_countries
-- ----------------------------
INSERT INTO `cms_visa_countries` VALUES ('2', '1', '5', '4', '2019-05-10 03:58:06', '2019-05-10 04:03:52');
INSERT INTO `cms_visa_countries` VALUES ('3', '1', '6', '3', '2019-05-10 03:58:16', '2019-05-10 04:04:00');
INSERT INTO `cms_visa_countries` VALUES ('4', '1', '9', '4', '2019-05-10 03:58:27', '2019-05-10 04:04:16');
INSERT INTO `cms_visa_countries` VALUES ('5', '1', '22', '2', '2019-05-10 03:58:39', '2019-05-10 04:04:08');
INSERT INTO `cms_visa_countries` VALUES ('6', '3', '6', '2', '2019-05-10 04:00:08', '2019-05-10 04:01:08');
INSERT INTO `cms_visa_countries` VALUES ('7', '3', '12', '3', '2019-05-10 04:00:34', '2019-05-10 04:01:15');
INSERT INTO `cms_visa_countries` VALUES ('8', '3', '43', '4', '2019-05-10 04:00:46', '2019-05-10 04:01:23');
INSERT INTO `cms_visa_countries` VALUES ('9', '1', '49', '3', '2019-05-10 05:33:35', '2019-05-10 05:33:35');
INSERT INTO `cms_visa_countries` VALUES ('14', '190', '26', '1', '2019-05-14 07:42:06', '2019-05-14 07:42:06');
INSERT INTO `cms_visa_countries` VALUES ('15', '190', '226', '2', '2019-05-14 07:42:35', '2019-05-14 07:42:56');
INSERT INTO `cms_visa_countries` VALUES ('16', '190', '49', '1', '2019-05-14 07:42:50', '2019-05-14 07:43:02');
INSERT INTO `cms_visa_countries` VALUES ('17', '190', '46', '1', '2019-05-14 07:43:29', '2019-05-14 07:43:29');
INSERT INTO `cms_visa_countries` VALUES ('18', '190', '63', '3', '2019-05-14 07:53:24', '2019-05-14 07:53:33');
INSERT INTO `cms_visa_countries` VALUES ('19', '190', '237', '3', '2019-05-14 07:53:56', '2019-05-14 07:54:05');
INSERT INTO `cms_visa_countries` VALUES ('20', '190', '242', '4', '2019-05-14 07:54:22', '2019-05-14 07:54:22');
INSERT INTO `cms_visa_countries` VALUES ('21', '190', '241', '3', '2019-05-14 07:54:40', '2019-05-14 07:55:26');
INSERT INTO `cms_visa_countries` VALUES ('22', '190', '236', '4', '2019-05-14 07:54:54', '2019-05-14 07:55:24');
INSERT INTO `cms_visa_countries` VALUES ('23', '190', '47', '1', '2019-05-14 07:55:44', '2019-05-14 07:56:06');
INSERT INTO `cms_visa_countries` VALUES ('24', '190', '248', '1', '2019-05-14 07:55:54', '2019-05-14 07:56:04');
INSERT INTO `cms_visa_countries` VALUES ('25', '190', '12', '4', '2019-05-14 07:56:22', '2019-05-14 07:56:22');
INSERT INTO `cms_visa_countries` VALUES ('26', '190', '112', '3', '2019-05-14 07:56:35', '2019-05-14 07:56:35');
INSERT INTO `cms_visa_countries` VALUES ('27', '190', '109', '1', '2019-05-14 07:56:53', '2019-05-14 07:56:53');
INSERT INTO `cms_visa_countries` VALUES ('28', '190', '108', '4', '2019-05-14 07:57:12', '2019-05-14 07:57:12');
INSERT INTO `cms_visa_countries` VALUES ('29', '190', '23', '3', '2019-05-14 07:57:27', '2019-05-14 07:57:27');
INSERT INTO `cms_visa_countries` VALUES ('30', '190', '44', '2', '2019-05-14 07:57:45', '2019-05-14 07:57:45');
INSERT INTO `cms_visa_countries` VALUES ('31', '190', '186', '3', '2019-05-14 07:57:59', '2019-05-14 07:57:59');
INSERT INTO `cms_visa_countries` VALUES ('32', '190', '38', '3', '2019-05-14 07:58:14', '2019-05-14 07:58:14');
INSERT INTO `cms_visa_countries` VALUES ('33', '190', '58', '3', '2019-05-14 07:58:24', '2019-05-14 07:58:24');
INSERT INTO `cms_visa_countries` VALUES ('34', '190', '83', '3', '2019-05-14 07:58:34', '2019-05-14 07:58:34');
INSERT INTO `cms_visa_countries` VALUES ('35', '190', '104', '3', '2019-05-14 07:58:44', '2019-05-14 07:58:44');
INSERT INTO `cms_visa_countries` VALUES ('36', '190', '95', '1', '2019-05-14 07:59:02', '2019-05-14 07:59:02');
INSERT INTO `cms_visa_countries` VALUES ('37', '190', '96', '4', '2019-05-14 07:59:17', '2019-05-14 07:59:17');
INSERT INTO `cms_visa_countries` VALUES ('38', '190', '129', '4', '2019-05-14 07:59:28', '2019-05-14 07:59:28');
INSERT INTO `cms_visa_countries` VALUES ('39', '190', '54', '1', '2019-05-14 07:59:40', '2019-05-14 07:59:40');
INSERT INTO `cms_visa_countries` VALUES ('40', '190', '55', '1', '2019-05-14 07:59:55', '2019-05-14 07:59:55');
INSERT INTO `cms_visa_countries` VALUES ('41', '190', '128', '1', '2019-05-14 08:00:04', '2019-05-14 08:00:04');
INSERT INTO `cms_visa_countries` VALUES ('42', '190', '127', '1', '2019-05-14 08:00:17', '2019-05-14 08:00:17');
INSERT INTO `cms_visa_countries` VALUES ('43', '190', '43', '1', '2019-05-14 08:00:27', '2019-05-14 08:00:27');
INSERT INTO `cms_visa_countries` VALUES ('44', '190', '86', '1', '2019-05-14 08:00:36', '2019-05-14 08:00:36');
INSERT INTO `cms_visa_countries` VALUES ('45', '190', '82', '4', '2019-05-14 08:00:47', '2019-05-14 08:00:47');
INSERT INTO `cms_visa_countries` VALUES ('46', '190', '103', '3', '2019-05-14 08:01:04', '2019-05-14 08:01:04');
INSERT INTO `cms_visa_countries` VALUES ('47', '190', '212', '1', '2019-05-14 08:01:26', '2019-05-14 08:01:26');
INSERT INTO `cms_visa_countries` VALUES ('48', '190', '209', '1', '2019-05-14 08:01:38', '2019-05-14 08:01:38');
INSERT INTO `cms_visa_countries` VALUES ('49', '190', '30', '3', '2019-05-14 08:01:50', '2019-05-14 08:01:50');
INSERT INTO `cms_visa_countries` VALUES ('50', '190', '182', '4', '2019-05-14 08:02:03', '2019-05-14 08:02:03');
INSERT INTO `cms_visa_countries` VALUES ('51', '190', '187', '4', '2019-05-14 08:02:20', '2019-05-14 08:02:20');
INSERT INTO `cms_visa_countries` VALUES ('52', '190', '131', '3', '2019-05-14 08:02:35', '2019-05-14 08:02:35');
INSERT INTO `cms_visa_countries` VALUES ('53', '190', '105', '4', '2019-05-14 08:02:48', '2019-05-14 08:02:48');
INSERT INTO `cms_visa_countries` VALUES ('54', '190', '106', '3', '2019-05-14 08:03:06', '2019-05-14 08:03:06');
INSERT INTO `cms_visa_countries` VALUES ('55', '190', '93', '3', '2019-05-14 08:03:18', '2019-05-14 08:03:18');
INSERT INTO `cms_visa_countries` VALUES ('56', '190', '67', '3', '2019-05-14 08:03:31', '2019-05-14 08:03:31');
INSERT INTO `cms_visa_countries` VALUES ('57', '190', '71', '1', '2019-05-14 08:03:50', '2019-05-14 08:03:50');
INSERT INTO `cms_visa_countries` VALUES ('58', '190', '221', '1', '2019-05-14 08:04:01', '2019-05-14 08:04:01');
INSERT INTO `cms_visa_countries` VALUES ('59', '190', '59', '3', '2019-05-14 08:04:12', '2019-05-14 08:04:12');
INSERT INTO `cms_visa_countries` VALUES ('60', '190', '222', '3', '2019-05-14 08:04:21', '2019-05-14 08:04:21');
INSERT INTO `cms_visa_countries` VALUES ('61', '190', '122', '4', '2019-05-14 08:04:32', '2019-05-14 08:04:32');
INSERT INTO `cms_visa_countries` VALUES ('62', '190', '64', '4', '2019-05-14 08:04:43', '2019-05-14 08:04:43');
INSERT INTO `cms_visa_countries` VALUES ('63', '190', '118', '1', '2019-05-14 08:04:52', '2019-05-14 08:04:52');
INSERT INTO `cms_visa_countries` VALUES ('64', '190', '52', '3', '2019-05-14 08:05:05', '2019-05-14 08:05:05');
INSERT INTO `cms_visa_countries` VALUES ('65', '190', '57', '3', '2019-05-14 08:05:15', '2019-05-14 08:05:15');
INSERT INTO `cms_visa_countries` VALUES ('66', '190', '42', '1', '2019-05-14 08:05:29', '2019-05-14 08:05:29');
INSERT INTO `cms_visa_countries` VALUES ('67', '190', '235', '2', '2019-05-14 08:05:42', '2019-05-14 08:05:42');
INSERT INTO `cms_visa_countries` VALUES ('68', '190', '233', '1', '2019-05-14 08:05:53', '2019-05-14 08:05:53');
INSERT INTO `cms_visa_countries` VALUES ('69', '190', '191', '3', '2019-05-14 08:07:09', '2019-05-14 08:07:09');
INSERT INTO `cms_visa_countries` VALUES ('70', '190', '197', '4', '2019-05-14 08:07:20', '2019-05-14 08:07:20');
INSERT INTO `cms_visa_countries` VALUES ('71', '190', '194', '3', '2019-05-14 10:14:29', '2019-05-14 10:14:29');
INSERT INTO `cms_visa_countries` VALUES ('72', '190', '97', '3', '2019-05-14 12:43:14', '2019-05-14 12:43:14');
INSERT INTO `cms_visa_countries` VALUES ('73', '190', '224', '3', '2019-05-14 12:43:25', '2019-05-14 12:43:25');
INSERT INTO `cms_visa_countries` VALUES ('74', '190', '68', '4', '2019-05-14 12:43:39', '2019-05-14 12:43:39');
INSERT INTO `cms_visa_countries` VALUES ('75', '190', '73', '4', '2019-05-14 12:43:52', '2019-05-14 12:43:52');
INSERT INTO `cms_visa_countries` VALUES ('76', '190', '120', '3', '2019-05-14 12:44:05', '2019-05-14 12:44:05');
INSERT INTO `cms_visa_countries` VALUES ('77', '190', '223', '4', '2019-05-14 12:44:23', '2019-05-14 12:44:23');
INSERT INTO `cms_visa_countries` VALUES ('78', '190', '199', '3', '2019-05-14 12:44:33', '2019-05-14 12:44:33');
INSERT INTO `cms_visa_countries` VALUES ('79', '190', '200', '1', '2019-05-14 12:44:47', '2019-05-14 12:44:47');
INSERT INTO `cms_visa_countries` VALUES ('80', '190', '202', '1', '2019-05-14 12:44:58', '2019-05-14 12:44:58');
INSERT INTO `cms_visa_countries` VALUES ('81', '190', '61', '3', '2019-05-14 12:45:10', '2019-05-14 12:45:10');
INSERT INTO `cms_visa_countries` VALUES ('82', '190', '201', '0', '2019-05-14 12:45:22', '2019-05-14 12:45:22');
INSERT INTO `cms_visa_countries` VALUES ('83', '190', '145', '1', '2019-05-14 12:45:36', '2019-05-14 12:45:36');
INSERT INTO `cms_visa_countries` VALUES ('84', '190', '227', '2', '2019-05-14 12:46:23', '2019-05-14 12:46:23');
INSERT INTO `cms_visa_countries` VALUES ('85', '190', '65', '3', '2019-05-14 12:46:34', '2019-05-14 12:46:34');
INSERT INTO `cms_visa_countries` VALUES ('86', '190', '15', '3', '2019-05-14 12:47:01', '2019-05-14 12:47:14');
INSERT INTO `cms_visa_countries` VALUES ('87', '190', '244', '3', '2019-05-14 12:47:28', '2019-05-14 12:47:28');
INSERT INTO `cms_visa_countries` VALUES ('88', '190', '19', '3', '2019-05-14 12:47:52', '2019-05-14 12:47:52');
INSERT INTO `cms_visa_countries` VALUES ('89', '190', '7', '1', '2019-05-14 12:48:11', '2019-05-14 12:48:11');
INSERT INTO `cms_visa_countries` VALUES ('90', '190', '10', '3', '2019-05-14 12:48:24', '2019-05-14 12:48:24');
INSERT INTO `cms_visa_countries` VALUES ('91', '190', '6', '3', '2019-05-14 12:48:36', '2019-05-14 12:48:36');
INSERT INTO `cms_visa_countries` VALUES ('92', '190', '146', '3', '2019-05-14 12:48:46', '2019-05-14 12:48:46');
INSERT INTO `cms_visa_countries` VALUES ('93', '190', '161', '3', '2019-05-14 12:48:59', '2019-05-14 12:48:59');
INSERT INTO `cms_visa_countries` VALUES ('94', '190', '163', '1', '2019-05-14 12:49:10', '2019-05-14 12:49:10');
INSERT INTO `cms_visa_countries` VALUES ('95', '190', '162', '1', '2019-05-14 12:49:22', '2019-05-14 12:49:22');
INSERT INTO `cms_visa_countries` VALUES ('96', '190', '157', '2', '2019-05-14 12:49:33', '2019-05-14 12:49:33');
INSERT INTO `cms_visa_countries` VALUES ('97', '190', '172', '3', '2019-05-14 12:49:47', '2019-05-14 12:49:47');
INSERT INTO `cms_visa_countries` VALUES ('98', '190', '17', '3', '2019-05-14 12:50:06', '2019-05-14 12:50:06');
INSERT INTO `cms_visa_countries` VALUES ('99', '190', '170', '1', '2019-05-14 12:50:19', '2019-05-14 12:50:19');
INSERT INTO `cms_visa_countries` VALUES ('100', '190', '20', '3', '2019-05-14 12:50:34', '2019-05-14 12:50:34');
INSERT INTO `cms_visa_countries` VALUES ('101', '190', '174', '1', '2019-05-14 12:50:46', '2019-05-14 12:50:46');
INSERT INTO `cms_visa_countries` VALUES ('102', '190', '175', '1', '2019-05-14 12:50:57', '2019-05-14 12:50:57');
INSERT INTO `cms_visa_countries` VALUES ('103', '190', '173', '3', '2019-05-14 12:51:07', '2019-05-14 12:51:07');
INSERT INTO `cms_visa_countries` VALUES ('104', '190', '18', '4', '2019-05-14 12:51:17', '2019-05-14 12:51:17');
INSERT INTO `cms_visa_countries` VALUES ('105', '190', '32', '3', '2019-05-14 12:51:27', '2019-05-14 12:51:27');
INSERT INTO `cms_visa_countries` VALUES ('106', '190', '39', '1', '2019-05-14 12:51:37', '2019-05-14 12:51:37');
INSERT INTO `cms_visa_countries` VALUES ('107', '190', '40', '1', '2019-05-14 12:51:47', '2019-05-14 12:51:47');
INSERT INTO `cms_visa_countries` VALUES ('108', '190', '88', '3', '2019-05-14 12:51:58', '2019-05-14 12:51:58');
INSERT INTO `cms_visa_countries` VALUES ('109', '190', '171', '2', '2019-05-14 12:52:08', '2019-05-14 12:52:08');
INSERT INTO `cms_visa_countries` VALUES ('110', '190', '85', '3', '2019-05-14 12:52:18', '2019-05-14 12:52:18');
INSERT INTO `cms_visa_countries` VALUES ('111', '190', '113', '3', '2019-05-14 12:52:27', '2019-05-14 12:52:27');
INSERT INTO `cms_visa_countries` VALUES ('112', '190', '207', '1', '2019-05-14 12:52:36', '2019-05-14 12:52:36');
INSERT INTO `cms_visa_countries` VALUES ('113', '190', '124', '3', '2019-05-14 12:52:47', '2019-05-14 12:52:47');
INSERT INTO `cms_visa_countries` VALUES ('114', '190', '168', '3', '2019-05-14 12:52:57', '2019-05-14 12:52:57');
INSERT INTO `cms_visa_countries` VALUES ('115', '190', '62', '3', '2019-05-14 12:53:11', '2019-05-14 12:53:11');
INSERT INTO `cms_visa_countries` VALUES ('116', '190', '147', '4', '2019-05-14 12:53:21', '2019-05-14 12:53:21');
INSERT INTO `cms_visa_countries` VALUES ('117', '190', '152', '1', '2019-05-14 12:53:31', '2019-05-14 12:53:31');
INSERT INTO `cms_visa_countries` VALUES ('118', '190', '148', '3', '2019-05-14 12:53:41', '2019-05-14 12:53:41');
INSERT INTO `cms_visa_countries` VALUES ('119', '190', '37', '1', '2019-05-14 12:53:50', '2019-05-14 12:53:50');
INSERT INTO `cms_visa_countries` VALUES ('120', '190', '218', '1', '2019-05-14 12:54:12', '2019-05-14 12:54:12');
INSERT INTO `cms_visa_countries` VALUES ('121', '190', '205', '3', '2019-05-14 12:54:23', '2019-05-14 12:54:23');
INSERT INTO `cms_visa_countries` VALUES ('122', '190', '206', '3', '2019-05-14 12:54:33', '2019-05-14 12:54:33');
INSERT INTO `cms_visa_countries` VALUES ('123', '190', '214', '0', '2019-05-14 12:54:42', '2019-05-14 12:54:42');
INSERT INTO `cms_visa_countries` VALUES ('124', '243', '26', '1', '2019-05-14 12:55:35', '2019-05-14 12:55:35');
INSERT INTO `cms_visa_countries` VALUES ('125', '243', '226', '2', '2019-05-14 12:55:44', '2019-05-14 12:55:44');
INSERT INTO `cms_visa_countries` VALUES ('126', '243', '49', '1', '2019-05-14 12:55:55', '2019-05-14 12:55:55');
INSERT INTO `cms_visa_countries` VALUES ('127', '243', '46', '1', '2019-05-14 12:56:06', '2019-05-14 12:56:06');
INSERT INTO `cms_visa_countries` VALUES ('128', '243', '63', '3', '2019-05-14 12:56:14', '2019-05-14 12:56:14');
INSERT INTO `cms_visa_countries` VALUES ('129', '243', '237', '2', '2019-05-14 12:56:23', '2019-05-14 12:56:23');
INSERT INTO `cms_visa_countries` VALUES ('130', '243', '242', '4', '2019-05-14 12:56:32', '2019-05-14 12:56:32');
INSERT INTO `cms_visa_countries` VALUES ('131', '243', '236', '3', '2019-05-14 12:56:40', '2019-05-14 12:56:40');
INSERT INTO `cms_visa_countries` VALUES ('132', '243', '241', '1', '2019-05-14 12:56:50', '2019-05-14 12:56:50');
INSERT INTO `cms_visa_countries` VALUES ('133', '243', '47', '1', '2019-05-14 12:57:02', '2019-05-14 12:57:02');
INSERT INTO `cms_visa_countries` VALUES ('134', '243', '248', '1', '2019-05-14 12:57:11', '2019-05-14 12:57:11');
INSERT INTO `cms_visa_countries` VALUES ('135', '243', '12', '4', '2019-05-14 12:57:18', '2019-05-14 12:57:18');
INSERT INTO `cms_visa_countries` VALUES ('136', '243', '112', '3', '2019-05-14 12:57:28', '2019-05-14 12:57:28');
INSERT INTO `cms_visa_countries` VALUES ('137', '243', '109', '1', '2019-05-14 12:57:40', '2019-05-14 12:57:40');
INSERT INTO `cms_visa_countries` VALUES ('138', '243', '108', '4', '2019-05-14 12:57:51', '2019-05-14 12:57:51');
INSERT INTO `cms_visa_countries` VALUES ('139', '243', '23', '3', '2019-05-14 12:58:00', '2019-05-14 12:58:00');
INSERT INTO `cms_visa_countries` VALUES ('140', '243', '44', '2', '2019-05-14 12:58:11', '2019-05-14 12:58:11');
INSERT INTO `cms_visa_countries` VALUES ('141', '243', '186', '3', '2019-05-14 12:58:19', '2019-05-14 12:58:19');
INSERT INTO `cms_visa_countries` VALUES ('142', '243', '38', '3', '2019-05-14 12:58:27', '2019-05-14 12:58:27');
INSERT INTO `cms_visa_countries` VALUES ('143', '243', '58', '3', '2019-05-14 12:58:36', '2019-05-14 12:58:36');
INSERT INTO `cms_visa_countries` VALUES ('144', '243', '83', '3', '2019-05-14 12:58:44', '2019-05-14 12:58:44');
INSERT INTO `cms_visa_countries` VALUES ('145', '243', '104', '3', '2019-05-14 12:58:54', '2019-05-14 12:58:54');
INSERT INTO `cms_visa_countries` VALUES ('147', '61', '26', '1', '2019-05-14 12:59:39', '2019-05-14 12:59:39');
INSERT INTO `cms_visa_countries` VALUES ('148', '61', '226', '3', '2019-05-14 12:59:48', '2019-05-14 12:59:48');
INSERT INTO `cms_visa_countries` VALUES ('149', '61', '49', '1', '2019-05-14 12:59:57', '2019-05-14 12:59:57');
INSERT INTO `cms_visa_countries` VALUES ('150', '61', '46', '1', '2019-05-14 13:00:12', '2019-05-14 13:00:12');
INSERT INTO `cms_visa_countries` VALUES ('151', '61', '63', '3', '2019-05-14 13:00:22', '2019-05-14 13:00:22');
INSERT INTO `cms_visa_countries` VALUES ('152', '61', '237', '3', '2019-05-14 13:00:32', '2019-05-14 13:00:32');
INSERT INTO `cms_visa_countries` VALUES ('153', '61', '242', '4', '2019-05-14 13:00:44', '2019-05-14 13:00:44');
INSERT INTO `cms_visa_countries` VALUES ('154', '61', '236', '3', '2019-05-14 13:00:53', '2019-05-14 13:00:53');
INSERT INTO `cms_visa_countries` VALUES ('155', '61', '241', '3', '2019-05-14 13:01:01', '2019-05-14 13:01:01');
INSERT INTO `cms_visa_countries` VALUES ('156', '61', '47', '1', '2019-05-14 13:01:09', '2019-05-14 13:01:09');
INSERT INTO `cms_visa_countries` VALUES ('157', '61', '248', '1', '2019-05-14 13:01:18', '2019-05-14 13:01:18');
INSERT INTO `cms_visa_countries` VALUES ('158', '61', '12', '3', '2019-05-14 13:01:27', '2019-05-14 13:01:32');
INSERT INTO `cms_visa_countries` VALUES ('159', '61', '112', '3', '2019-05-14 13:01:41', '2019-05-14 13:01:41');
INSERT INTO `cms_visa_countries` VALUES ('160', '61', '109', '1', '2019-05-14 13:01:56', '2019-05-14 13:01:56');
INSERT INTO `cms_visa_countries` VALUES ('161', '61', '108', '2', '2019-05-14 13:02:05', '2019-05-14 13:02:05');
INSERT INTO `cms_visa_countries` VALUES ('162', '61', '23', '3', '2019-05-14 13:02:15', '2019-05-14 13:02:15');
INSERT INTO `cms_visa_countries` VALUES ('163', '61', '44', '2', '2019-05-14 13:02:25', '2019-05-14 13:02:25');
INSERT INTO `cms_visa_countries` VALUES ('164', '61', '186', '1', '2019-05-14 13:02:33', '2019-05-14 13:02:33');
INSERT INTO `cms_visa_countries` VALUES ('165', '61', '38', '3', '2019-05-14 13:02:44', '2019-05-14 13:02:44');
INSERT INTO `cms_visa_countries` VALUES ('166', '61', '58', '3', '2019-05-14 13:02:53', '2019-05-14 13:02:53');
INSERT INTO `cms_visa_countries` VALUES ('167', '61', '83', '3', '2019-05-14 13:03:01', '2019-05-14 13:03:01');
INSERT INTO `cms_visa_countries` VALUES ('168', '61', '104', '3', '2019-05-14 13:03:08', '2019-05-14 13:03:08');
INSERT INTO `cms_visa_countries` VALUES ('169', '90', '26', '1', '2019-05-14 13:10:01', '2019-05-14 13:10:01');
INSERT INTO `cms_visa_countries` VALUES ('170', '90', '226', '2', '2019-05-14 13:10:12', '2019-05-14 13:10:12');
INSERT INTO `cms_visa_countries` VALUES ('171', '90', '49', '3', '2019-05-14 13:10:25', '2019-05-14 13:10:25');
INSERT INTO `cms_visa_countries` VALUES ('172', '90', '46', '1', '2019-05-14 13:10:34', '2019-05-14 13:10:34');
INSERT INTO `cms_visa_countries` VALUES ('173', '90', '63', '3', '2019-05-14 13:10:44', '2019-05-14 13:10:44');
INSERT INTO `cms_visa_countries` VALUES ('174', '90', '237', '2', '2019-05-14 13:10:54', '2019-05-14 13:10:54');
INSERT INTO `cms_visa_countries` VALUES ('175', '90', '242', '4', '2019-05-14 13:11:05', '2019-05-14 13:11:05');
INSERT INTO `cms_visa_countries` VALUES ('176', '90', '236', '3', '2019-05-14 13:11:15', '2019-05-14 13:11:15');
INSERT INTO `cms_visa_countries` VALUES ('177', '90', '241', '3', '2019-05-14 13:11:24', '2019-05-14 13:11:24');
INSERT INTO `cms_visa_countries` VALUES ('178', '90', '47', '1', '2019-05-14 13:11:32', '2019-05-14 13:11:32');
INSERT INTO `cms_visa_countries` VALUES ('179', '90', '248', '1', '2019-05-14 13:11:39', '2019-05-14 13:11:39');
INSERT INTO `cms_visa_countries` VALUES ('180', '90', '12', '4', '2019-05-14 13:11:49', '2019-05-14 13:11:49');
INSERT INTO `cms_visa_countries` VALUES ('181', '90', '112', '3', '2019-05-14 13:11:57', '2019-05-14 13:11:57');
INSERT INTO `cms_visa_countries` VALUES ('182', '90', '109', '1', '2019-05-14 13:12:07', '2019-05-14 13:12:07');
INSERT INTO `cms_visa_countries` VALUES ('183', '90', '108', '2', '2019-05-14 13:12:18', '2019-05-14 13:12:18');
INSERT INTO `cms_visa_countries` VALUES ('184', '90', '23', '3', '2019-05-14 13:12:28', '2019-05-14 13:12:28');
INSERT INTO `cms_visa_countries` VALUES ('185', '90', '44', '2', '2019-05-14 13:12:37', '2019-05-14 13:12:37');
INSERT INTO `cms_visa_countries` VALUES ('186', '90', '186', '3', '2019-05-14 13:12:47', '2019-05-14 13:12:47');
INSERT INTO `cms_visa_countries` VALUES ('187', '90', '38', '3', '2019-05-14 13:12:55', '2019-05-14 13:12:55');
INSERT INTO `cms_visa_countries` VALUES ('188', '90', '58', '3', '2019-05-14 13:13:03', '2019-05-14 13:13:03');
INSERT INTO `cms_visa_countries` VALUES ('189', '90', '83', '3', '2019-05-14 13:13:13', '2019-05-14 13:13:13');
INSERT INTO `cms_visa_countries` VALUES ('190', '90', '104', '3', '2019-05-14 13:13:21', '2019-05-14 13:13:21');
INSERT INTO `cms_visa_countries` VALUES ('191', '65', '26', '1', '2019-05-14 13:15:11', '2019-05-14 13:15:11');
INSERT INTO `cms_visa_countries` VALUES ('192', '65', '226', '2', '2019-05-14 13:15:23', '2019-05-14 13:15:23');
INSERT INTO `cms_visa_countries` VALUES ('193', '65', '49', '1', '2019-05-14 13:15:30', '2019-05-14 13:15:30');
INSERT INTO `cms_visa_countries` VALUES ('194', '65', '46', '1', '2019-05-14 13:15:39', '2019-05-14 13:15:39');
INSERT INTO `cms_visa_countries` VALUES ('195', '65', '63', '3', '2019-05-14 13:15:49', '2019-05-14 13:15:49');
INSERT INTO `cms_visa_countries` VALUES ('196', '65', '237', '2', '2019-05-14 13:15:57', '2019-05-14 13:15:57');
INSERT INTO `cms_visa_countries` VALUES ('197', '65', '242', '1', '2019-05-14 13:16:08', '2019-05-14 13:16:08');
INSERT INTO `cms_visa_countries` VALUES ('198', '65', '236', '2', '2019-05-14 13:16:16', '2019-05-14 13:16:16');
INSERT INTO `cms_visa_countries` VALUES ('199', '65', '241', '3', '2019-05-14 13:16:26', '2019-05-14 13:16:26');
INSERT INTO `cms_visa_countries` VALUES ('200', '65', '47', '1', '2019-05-14 13:16:35', '2019-05-14 13:16:35');
INSERT INTO `cms_visa_countries` VALUES ('201', '65', '248', '1', '2019-05-14 13:16:44', '2019-05-14 13:16:44');
INSERT INTO `cms_visa_countries` VALUES ('202', '65', '12', '1', '2019-05-14 13:16:58', '2019-05-14 13:16:58');
INSERT INTO `cms_visa_countries` VALUES ('203', '65', '112', '3', '2019-05-14 13:17:09', '2019-05-14 13:17:09');
INSERT INTO `cms_visa_countries` VALUES ('204', '65', '109', '1', '2019-05-14 13:17:19', '2019-05-14 13:17:19');
INSERT INTO `cms_visa_countries` VALUES ('205', '65', '108', '2', '2019-05-14 13:17:32', '2019-05-14 13:17:32');
INSERT INTO `cms_visa_countries` VALUES ('206', '65', '23', '3', '2019-05-14 13:17:48', '2019-05-14 13:17:48');
INSERT INTO `cms_visa_countries` VALUES ('207', '65', '44', '2', '2019-05-14 13:17:58', '2019-05-14 13:17:58');
INSERT INTO `cms_visa_countries` VALUES ('208', '65', '186', '1', '2019-05-14 13:18:14', '2019-05-14 13:18:14');
INSERT INTO `cms_visa_countries` VALUES ('209', '65', '38', '3', '2019-05-14 13:18:32', '2019-05-14 13:18:32');
INSERT INTO `cms_visa_countries` VALUES ('210', '65', '58', '3', '2019-05-14 13:18:43', '2019-05-14 13:18:43');
INSERT INTO `cms_visa_countries` VALUES ('211', '65', '83', '3', '2019-05-14 13:18:51', '2019-05-14 13:18:51');
INSERT INTO `cms_visa_countries` VALUES ('212', '65', '104', '3', '2019-05-14 13:19:00', '2019-05-14 13:19:00');
INSERT INTO `cms_visa_countries` VALUES ('213', '191', '26', '1', '2019-05-14 13:19:49', '2019-05-14 13:19:49');
INSERT INTO `cms_visa_countries` VALUES ('214', '191', '226', '2', '2019-05-14 13:19:59', '2019-05-14 13:19:59');
INSERT INTO `cms_visa_countries` VALUES ('215', '191', '49', '1', '2019-05-14 13:20:08', '2019-05-14 13:20:08');
INSERT INTO `cms_visa_countries` VALUES ('216', '191', '46', '1', '2019-05-14 13:20:17', '2019-05-14 13:20:17');
INSERT INTO `cms_visa_countries` VALUES ('217', '191', '63', '3', '2019-05-14 13:20:30', '2019-05-14 13:20:30');
INSERT INTO `cms_visa_countries` VALUES ('218', '191', '237', '1', '2019-05-14 13:20:41', '2019-05-14 13:20:41');
INSERT INTO `cms_visa_countries` VALUES ('219', '191', '242', '1', '2019-05-14 13:20:53', '2019-05-14 13:20:53');
INSERT INTO `cms_visa_countries` VALUES ('220', '191', '236', '2', '2019-05-14 13:21:03', '2019-05-14 13:21:03');
INSERT INTO `cms_visa_countries` VALUES ('221', '191', '241', '1', '2019-05-14 13:21:14', '2019-05-14 13:21:14');
INSERT INTO `cms_visa_countries` VALUES ('222', '191', '47', '1', '2019-05-14 13:21:22', '2019-05-14 13:21:22');
INSERT INTO `cms_visa_countries` VALUES ('223', '191', '248', '1', '2019-05-14 13:21:32', '2019-05-14 13:21:32');
INSERT INTO `cms_visa_countries` VALUES ('224', '191', '12', '2', '2019-05-14 13:21:40', '2019-05-14 13:21:40');
INSERT INTO `cms_visa_countries` VALUES ('225', '191', '112', '3', '2019-05-14 13:21:49', '2019-05-14 13:21:49');
INSERT INTO `cms_visa_countries` VALUES ('226', '191', '109', '1', '2019-05-14 13:21:57', '2019-05-14 13:21:57');
INSERT INTO `cms_visa_countries` VALUES ('227', '191', '108', '2', '2019-05-14 13:22:07', '2019-05-14 13:22:07');
INSERT INTO `cms_visa_countries` VALUES ('228', '191', '23', '3', '2019-05-14 13:22:17', '2019-05-14 13:22:17');
INSERT INTO `cms_visa_countries` VALUES ('229', '191', '44', '2', '2019-05-14 13:22:27', '2019-05-14 13:22:27');
INSERT INTO `cms_visa_countries` VALUES ('230', '191', '186', '1', '2019-05-14 13:22:35', '2019-05-14 13:22:35');
INSERT INTO `cms_visa_countries` VALUES ('231', '191', '38', '3', '2019-05-14 13:22:47', '2019-05-14 13:22:47');
INSERT INTO `cms_visa_countries` VALUES ('232', '191', '58', '3', '2019-05-14 13:22:56', '2019-05-14 13:22:56');
INSERT INTO `cms_visa_countries` VALUES ('233', '191', '83', '3', '2019-05-14 13:23:05', '2019-05-14 13:23:05');
INSERT INTO `cms_visa_countries` VALUES ('234', '191', '104', '3', '2019-05-14 13:23:13', '2019-05-14 13:23:13');

-- ----------------------------
-- Table structure for web_customers
-- ----------------------------
DROP TABLE IF EXISTS `web_customers`;
CREATE TABLE `web_customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_customers
-- ----------------------------
INSERT INTO `web_customers` VALUES ('1', 'sin', '123', '234', '2019-05-07 11:12:53', '2019-05-07 11:12:53');
INSERT INTO `web_customers` VALUES ('2', 'sin', '123@sin.com', '23434', '2019-05-07 11:23:14', '2019-05-07 11:23:14');
INSERT INTO `web_customers` VALUES ('3', '11', 'yang@patpat.com', '22', '2019-05-13 12:34:53', '2019-05-13 12:34:53');
