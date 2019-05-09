/*
Navicat MySQL Data Transfer

Source Server         : 192.168.11.119
Source Server Version : 50639
Source Host           : 192.168.11.119:3306
Source Database       : visa

Target Server Type    : MYSQL
Target Server Version : 50639
File Encoding         : 65001

Date: 2019-05-09 13:40:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cms_countries
-- ----------------------------
DROP TABLE IF EXISTS `cms_countries`;
CREATE TABLE `cms_countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL COMMENT '国旗',
  `region` varchar(255) NOT NULL COMMENT '所属州',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8 COMMENT='国家';

-- ----------------------------
-- Records of cms_countries
-- ----------------------------
INSERT INTO `cms_countries` VALUES ('1', 'Afghanistan', 'https://restcountries.eu/data/afg.svg', 'Asia', '2019-05-05 08:48:28', '2019-05-05 08:48:28');
INSERT INTO `cms_countries` VALUES ('2', 'Åland Islands', 'https://restcountries.eu/data/ala.svg', 'Europe', '2019-05-05 08:48:28', '2019-05-05 08:48:28');
INSERT INTO `cms_countries` VALUES ('3', 'Albania', 'https://restcountries.eu/data/alb.svg', 'Europe', '2019-05-05 08:48:28', '2019-05-05 08:48:28');
INSERT INTO `cms_countries` VALUES ('4', 'Algeria', 'https://restcountries.eu/data/dza.svg', 'Africa', '2019-05-05 08:48:28', '2019-05-05 08:48:28');
INSERT INTO `cms_countries` VALUES ('5', 'American Samoa', 'https://restcountries.eu/data/asm.svg', 'Oceania', '2019-05-05 08:48:28', '2019-05-05 08:48:28');
INSERT INTO `cms_countries` VALUES ('6', 'Andorra', 'https://restcountries.eu/data/and.svg', 'Europe', '2019-05-05 08:48:28', '2019-05-05 08:48:28');
INSERT INTO `cms_countries` VALUES ('7', 'Angola', 'https://restcountries.eu/data/ago.svg', 'Africa', '2019-05-05 08:48:28', '2019-05-05 08:48:28');
INSERT INTO `cms_countries` VALUES ('8', 'Anguilla', 'https://restcountries.eu/data/aia.svg', 'Americas', '2019-05-05 08:48:28', '2019-05-05 08:48:28');
INSERT INTO `cms_countries` VALUES ('9', 'Antarctica', 'https://restcountries.eu/data/ata.svg', 'Polar', '2019-05-05 08:48:28', '2019-05-05 08:48:28');
INSERT INTO `cms_countries` VALUES ('10', 'Antigua and Barbuda', 'https://restcountries.eu/data/atg.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('11', 'Argentina', 'https://restcountries.eu/data/arg.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('12', 'Armenia', 'https://restcountries.eu/data/arm.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('13', 'Aruba', 'https://restcountries.eu/data/abw.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('14', 'Australia', 'https://restcountries.eu/data/aus.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('15', 'Austria', 'https://restcountries.eu/data/aut.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('16', 'Azerbaijan', 'https://restcountries.eu/data/aze.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('17', 'Bahamas', 'https://restcountries.eu/data/bhs.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('18', 'Bahrain', 'https://restcountries.eu/data/bhr.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('19', 'Bangladesh', 'https://restcountries.eu/data/bgd.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('20', 'Barbados', 'https://restcountries.eu/data/brb.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('21', 'Belarus', 'https://restcountries.eu/data/blr.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('22', 'Belgium', 'https://restcountries.eu/data/bel.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('23', 'Belize', 'https://restcountries.eu/data/blz.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('24', 'Benin', 'https://restcountries.eu/data/ben.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('25', 'Bermuda', 'https://restcountries.eu/data/bmu.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('26', 'Bhutan', 'https://restcountries.eu/data/btn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('27', 'Bolivia (Plurinational State of)', 'https://restcountries.eu/data/bol.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('28', 'Bonaire, Sint Eustatius and Saba', 'https://restcountries.eu/data/bes.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('29', 'Bosnia and Herzegovina', 'https://restcountries.eu/data/bih.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('30', 'Botswana', 'https://restcountries.eu/data/bwa.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('31', 'Bouvet Island', 'https://restcountries.eu/data/bvt.svg', '', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('32', 'Brazil', 'https://restcountries.eu/data/bra.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('33', 'British Indian Ocean Territory', 'https://restcountries.eu/data/iot.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('34', 'United States Minor Outlying Islands', 'https://restcountries.eu/data/umi.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('35', 'Virgin Islands (British)', 'https://restcountries.eu/data/vgb.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('36', 'Virgin Islands (U.S.)', 'https://restcountries.eu/data/vir.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('37', 'Brunei Darussalam', 'https://restcountries.eu/data/brn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('38', 'Bulgaria', 'https://restcountries.eu/data/bgr.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('39', 'Burkina Faso', 'https://restcountries.eu/data/bfa.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('40', 'Burundi', 'https://restcountries.eu/data/bdi.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('41', 'Cambodia', 'https://restcountries.eu/data/khm.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('42', 'Cameroon', 'https://restcountries.eu/data/cmr.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('43', 'Canada', 'https://restcountries.eu/data/can.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('44', 'Cabo Verde', 'https://restcountries.eu/data/cpv.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('45', 'Cayman Islands', 'https://restcountries.eu/data/cym.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('46', 'Central African Republic', 'https://restcountries.eu/data/caf.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('47', 'Chad', 'https://restcountries.eu/data/tcd.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('48', 'Chile', 'https://restcountries.eu/data/chl.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('49', 'China', 'https://restcountries.eu/data/chn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('50', 'Christmas Island', 'https://restcountries.eu/data/cxr.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('51', 'Cocos (Keeling) Islands', 'https://restcountries.eu/data/cck.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('52', 'Colombia', 'https://restcountries.eu/data/col.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('53', 'Comoros', 'https://restcountries.eu/data/com.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('54', 'Congo', 'https://restcountries.eu/data/cog.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('55', 'Congo (Democratic Republic of the)', 'https://restcountries.eu/data/cod.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('56', 'Cook Islands', 'https://restcountries.eu/data/cok.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('57', 'Costa Rica', 'https://restcountries.eu/data/cri.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('58', 'Croatia', 'https://restcountries.eu/data/hrv.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('59', 'Cuba', 'https://restcountries.eu/data/cub.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('60', 'Curaçao', 'https://restcountries.eu/data/cuw.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('61', 'Cyprus', 'https://restcountries.eu/data/cyp.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('62', 'Czech Republic', 'https://restcountries.eu/data/cze.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('63', 'Denmark', 'https://restcountries.eu/data/dnk.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('64', 'Djibouti', 'https://restcountries.eu/data/dji.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('65', 'Dominica', 'https://restcountries.eu/data/dma.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('66', 'Dominican Republic', 'https://restcountries.eu/data/dom.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('67', 'Ecuador', 'https://restcountries.eu/data/ecu.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('68', 'Egypt', 'https://restcountries.eu/data/egy.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('69', 'El Salvador', 'https://restcountries.eu/data/slv.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('70', 'Equatorial Guinea', 'https://restcountries.eu/data/gnq.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('71', 'Eritrea', 'https://restcountries.eu/data/eri.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('72', 'Estonia', 'https://restcountries.eu/data/est.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('73', 'Ethiopia', 'https://restcountries.eu/data/eth.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('74', 'Falkland Islands (Malvinas)', 'https://restcountries.eu/data/flk.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('75', 'Faroe Islands', 'https://restcountries.eu/data/fro.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('76', 'Fiji', 'https://restcountries.eu/data/fji.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('77', 'Finland', 'https://restcountries.eu/data/fin.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('78', 'France', 'https://restcountries.eu/data/fra.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('79', 'French Guiana', 'https://restcountries.eu/data/guf.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('80', 'French Polynesia', 'https://restcountries.eu/data/pyf.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('81', 'French Southern Territories', 'https://restcountries.eu/data/atf.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('82', 'Gabon', 'https://restcountries.eu/data/gab.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('83', 'Gambia', 'https://restcountries.eu/data/gmb.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('84', 'Georgia', 'https://restcountries.eu/data/geo.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('85', 'Germany', 'https://restcountries.eu/data/deu.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('86', 'Ghana', 'https://restcountries.eu/data/gha.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('87', 'Gibraltar', 'https://restcountries.eu/data/gib.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('88', 'Greece', 'https://restcountries.eu/data/grc.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('89', 'Greenland', 'https://restcountries.eu/data/grl.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('90', 'Grenada', 'https://restcountries.eu/data/grd.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('91', 'Guadeloupe', 'https://restcountries.eu/data/glp.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('92', 'Guam', 'https://restcountries.eu/data/gum.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('93', 'Guatemala', 'https://restcountries.eu/data/gtm.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('94', 'Guernsey', 'https://restcountries.eu/data/ggy.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('95', 'Guinea', 'https://restcountries.eu/data/gin.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('96', 'Guinea-Bissau', 'https://restcountries.eu/data/gnb.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('97', 'Guyana', 'https://restcountries.eu/data/guy.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('98', 'Haiti', 'https://restcountries.eu/data/hti.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('99', 'Heard Island and McDonald Islands', 'https://restcountries.eu/data/hmd.svg', '', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('100', 'Holy See', 'https://restcountries.eu/data/vat.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('101', 'Honduras', 'https://restcountries.eu/data/hnd.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('102', 'Hong Kong', 'https://restcountries.eu/data/hkg.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('103', 'Hungary', 'https://restcountries.eu/data/hun.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('104', 'Iceland', 'https://restcountries.eu/data/isl.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('105', 'India', 'https://restcountries.eu/data/ind.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('106', 'Indonesia', 'https://restcountries.eu/data/idn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('107', 'Côte d\'Ivoire', 'https://restcountries.eu/data/civ.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('108', 'Iran (Islamic Republic of)', 'https://restcountries.eu/data/irn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('109', 'Iraq', 'https://restcountries.eu/data/irq.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('110', 'Ireland', 'https://restcountries.eu/data/irl.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('111', 'Isle of Man', 'https://restcountries.eu/data/imn.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('112', 'Israel', 'https://restcountries.eu/data/isr.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('113', 'Italy', 'https://restcountries.eu/data/ita.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('114', 'Jamaica', 'https://restcountries.eu/data/jam.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('115', 'Japan', 'https://restcountries.eu/data/jpn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('116', 'Jersey', 'https://restcountries.eu/data/jey.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('117', 'Jordan', 'https://restcountries.eu/data/jor.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('118', 'Kazakhstan', 'https://restcountries.eu/data/kaz.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('119', 'Kenya', 'https://restcountries.eu/data/ken.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('120', 'Kiribati', 'https://restcountries.eu/data/kir.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('121', 'Kuwait', 'https://restcountries.eu/data/kwt.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('122', 'Kyrgyzstan', 'https://restcountries.eu/data/kgz.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('123', 'Lao People\'s Democratic Republic', 'https://restcountries.eu/data/lao.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('124', 'Latvia', 'https://restcountries.eu/data/lva.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('125', 'Lebanon', 'https://restcountries.eu/data/lbn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('126', 'Lesotho', 'https://restcountries.eu/data/lso.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('127', 'Liberia', 'https://restcountries.eu/data/lbr.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('128', 'Libya', 'https://restcountries.eu/data/lby.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('129', 'Liechtenstein', 'https://restcountries.eu/data/lie.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('130', 'Lithuania', 'https://restcountries.eu/data/ltu.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('131', 'Luxembourg', 'https://restcountries.eu/data/lux.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('132', 'Macao', 'https://restcountries.eu/data/mac.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('133', 'Macedonia (the former Yugoslav Republic of)', 'https://restcountries.eu/data/mkd.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('134', 'Madagascar', 'https://restcountries.eu/data/mdg.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('135', 'Malawi', 'https://restcountries.eu/data/mwi.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('136', 'Malaysia', 'https://restcountries.eu/data/mys.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('137', 'Maldives', 'https://restcountries.eu/data/mdv.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('138', 'Mali', 'https://restcountries.eu/data/mli.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('139', 'Malta', 'https://restcountries.eu/data/mlt.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('140', 'Marshall Islands', 'https://restcountries.eu/data/mhl.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('141', 'Martinique', 'https://restcountries.eu/data/mtq.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('142', 'Mauritania', 'https://restcountries.eu/data/mrt.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('143', 'Mauritius', 'https://restcountries.eu/data/mus.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('144', 'Mayotte', 'https://restcountries.eu/data/myt.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('145', 'Mexico', 'https://restcountries.eu/data/mex.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('146', 'Micronesia (Federated States of)', 'https://restcountries.eu/data/fsm.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('147', 'Moldova (Republic of)', 'https://restcountries.eu/data/mda.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('148', 'Monaco', 'https://restcountries.eu/data/mco.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('149', 'Mongolia', 'https://restcountries.eu/data/mng.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('150', 'Montenegro', 'https://restcountries.eu/data/mne.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('151', 'Montserrat', 'https://restcountries.eu/data/msr.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('152', 'Morocco', 'https://restcountries.eu/data/mar.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('153', 'Mozambique', 'https://restcountries.eu/data/moz.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('154', 'Myanmar', 'https://restcountries.eu/data/mmr.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('155', 'Namibia', 'https://restcountries.eu/data/nam.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('156', 'Nauru', 'https://restcountries.eu/data/nru.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('157', 'Nepal', 'https://restcountries.eu/data/npl.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('158', 'Netherlands', 'https://restcountries.eu/data/nld.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('159', 'New Caledonia', 'https://restcountries.eu/data/ncl.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('160', 'New Zealand', 'https://restcountries.eu/data/nzl.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('161', 'Nicaragua', 'https://restcountries.eu/data/nic.svg', 'Americas', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('162', 'Niger', 'https://restcountries.eu/data/ner.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('163', 'Nigeria', 'https://restcountries.eu/data/nga.svg', 'Africa', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('164', 'Niue', 'https://restcountries.eu/data/niu.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('165', 'Norfolk Island', 'https://restcountries.eu/data/nfk.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('166', 'Korea (Democratic People\'s Republic of)', 'https://restcountries.eu/data/prk.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('167', 'Northern Mariana Islands', 'https://restcountries.eu/data/mnp.svg', 'Oceania', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('168', 'Norway', 'https://restcountries.eu/data/nor.svg', 'Europe', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('169', 'Oman', 'https://restcountries.eu/data/omn.svg', 'Asia', '2019-05-05 08:48:29', '2019-05-05 08:48:29');
INSERT INTO `cms_countries` VALUES ('170', 'Pakistan', 'https://restcountries.eu/data/pak.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('171', 'Palau', 'https://restcountries.eu/data/plw.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('172', 'Palestine, State of', 'https://restcountries.eu/data/pse.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('173', 'Panama', 'https://restcountries.eu/data/pan.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('174', 'Papua New Guinea', 'https://restcountries.eu/data/png.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('175', 'Paraguay', 'https://restcountries.eu/data/pry.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('176', 'Peru', 'https://restcountries.eu/data/per.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('177', 'Philippines', 'https://restcountries.eu/data/phl.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('178', 'Pitcairn', 'https://restcountries.eu/data/pcn.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('179', 'Poland', 'https://restcountries.eu/data/pol.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('180', 'Portugal', 'https://restcountries.eu/data/prt.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('181', 'Puerto Rico', 'https://restcountries.eu/data/pri.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('182', 'Qatar', 'https://restcountries.eu/data/qat.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('183', 'Republic of Kosovo', 'https://restcountries.eu/data/kos.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('184', 'Réunion', 'https://restcountries.eu/data/reu.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('185', 'Romania', 'https://restcountries.eu/data/rou.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('186', 'Russian Federation', 'https://restcountries.eu/data/rus.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('187', 'Rwanda', 'https://restcountries.eu/data/rwa.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('188', 'Saint Barthélemy', 'https://restcountries.eu/data/blm.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('189', 'Saint Helena, Ascension and Tristan da Cunha', 'https://restcountries.eu/data/shn.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('190', 'Saint Kitts and Nevis', 'https://restcountries.eu/data/kna.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('191', 'Saint Lucia', 'https://restcountries.eu/data/lca.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('192', 'Saint Martin (French part)', 'https://restcountries.eu/data/maf.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('193', 'Saint Pierre and Miquelon', 'https://restcountries.eu/data/spm.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('194', 'Saint Vincent and the Grenadines', 'https://restcountries.eu/data/vct.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('195', 'Samoa', 'https://restcountries.eu/data/wsm.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('196', 'San Marino', 'https://restcountries.eu/data/smr.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('197', 'Sao Tome and Principe', 'https://restcountries.eu/data/stp.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('198', 'Saudi Arabia', 'https://restcountries.eu/data/sau.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('199', 'Senegal', 'https://restcountries.eu/data/sen.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('200', 'Serbia', 'https://restcountries.eu/data/srb.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('201', 'Seychelles', 'https://restcountries.eu/data/syc.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('202', 'Sierra Leone', 'https://restcountries.eu/data/sle.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('203', 'Singapore', 'https://restcountries.eu/data/sgp.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('204', 'Sint Maarten (Dutch part)', 'https://restcountries.eu/data/sxm.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('205', 'Slovakia', 'https://restcountries.eu/data/svk.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('206', 'Slovenia', 'https://restcountries.eu/data/svn.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('207', 'Solomon Islands', 'https://restcountries.eu/data/slb.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('208', 'Somalia', 'https://restcountries.eu/data/som.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('209', 'South Africa', 'https://restcountries.eu/data/zaf.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('210', 'South Georgia and the South Sandwich Islands', 'https://restcountries.eu/data/sgs.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('211', 'Korea (Republic of)', 'https://restcountries.eu/data/kor.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('212', 'South Sudan', 'https://restcountries.eu/data/ssd.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('213', 'Spain', 'https://restcountries.eu/data/esp.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('214', 'Sri Lanka', 'https://restcountries.eu/data/lka.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('215', 'Sudan', 'https://restcountries.eu/data/sdn.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('216', 'Suriname', 'https://restcountries.eu/data/sur.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('217', 'Svalbard and Jan Mayen', 'https://restcountries.eu/data/sjm.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('218', 'Swaziland', 'https://restcountries.eu/data/swz.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('219', 'Sweden', 'https://restcountries.eu/data/swe.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('220', 'Switzerland', 'https://restcountries.eu/data/che.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('221', 'Syrian Arab Republic', 'https://restcountries.eu/data/syr.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('222', 'Taiwan', 'https://restcountries.eu/data/twn.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('223', 'Tajikistan', 'https://restcountries.eu/data/tjk.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('224', 'Tanzania, United Republic of', 'https://restcountries.eu/data/tza.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('225', 'Thailand', 'https://restcountries.eu/data/tha.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('226', 'Timor-Leste', 'https://restcountries.eu/data/tls.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('227', 'Togo', 'https://restcountries.eu/data/tgo.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('228', 'Tokelau', 'https://restcountries.eu/data/tkl.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('229', 'Tonga', 'https://restcountries.eu/data/ton.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('230', 'Trinidad and Tobago', 'https://restcountries.eu/data/tto.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('231', 'Tunisia', 'https://restcountries.eu/data/tun.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('232', 'Turkey', 'https://restcountries.eu/data/tur.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('233', 'Turkmenistan', 'https://restcountries.eu/data/tkm.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('234', 'Turks and Caicos Islands', 'https://restcountries.eu/data/tca.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('235', 'Tuvalu', 'https://restcountries.eu/data/tuv.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('236', 'Uganda', 'https://restcountries.eu/data/uga.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('237', 'Ukraine', 'https://restcountries.eu/data/ukr.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('238', 'United Arab Emirates', 'https://restcountries.eu/data/are.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('239', 'United Kingdom of Great Britain and Northern Ireland', 'https://restcountries.eu/data/gbr.svg', 'Europe', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('240', 'United States of America', 'https://restcountries.eu/data/usa.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('241', 'Uruguay', 'https://restcountries.eu/data/ury.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('242', 'Uzbekistan', 'https://restcountries.eu/data/uzb.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('243', 'Vanuatu', 'https://restcountries.eu/data/vut.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('244', 'Venezuela (Bolivarian Republic of)', 'https://restcountries.eu/data/ven.svg', 'Americas', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('245', 'Viet Nam', 'https://restcountries.eu/data/vnm.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('246', 'Wallis and Futuna', 'https://restcountries.eu/data/wlf.svg', 'Oceania', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('247', 'Western Sahara', 'https://restcountries.eu/data/esh.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('248', 'Yemen', 'https://restcountries.eu/data/yem.svg', 'Asia', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('249', 'Zambia', 'https://restcountries.eu/data/zmb.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
INSERT INTO `cms_countries` VALUES ('250', 'Zimbabwe', 'https://restcountries.eu/data/zwe.svg', 'Africa', '2019-05-05 08:48:30', '2019-05-05 08:48:30');
