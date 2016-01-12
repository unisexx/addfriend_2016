/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : addfriend_2016

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-01-12 07:12:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for provinces
-- ----------------------------
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `area_id` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of provinces
-- ----------------------------
INSERT INTO `provinces` VALUES ('1', 'กรุงเทพมหานคร   ', '1');
INSERT INTO `provinces` VALUES ('2', 'สมุทรปราการ   ', '3');
INSERT INTO `provinces` VALUES ('3', 'นนทบุรี   ', '1');
INSERT INTO `provinces` VALUES ('4', 'ปทุมธานี   ', '1');
INSERT INTO `provinces` VALUES ('5', 'พระนครศรีอยุธยา   ', '1');
INSERT INTO `provinces` VALUES ('6', 'อ่างทอง   ', '2');
INSERT INTO `provinces` VALUES ('7', 'ลพบุรี   ', '2');
INSERT INTO `provinces` VALUES ('8', 'สิงห์บุรี   ', '2');
INSERT INTO `provinces` VALUES ('9', 'ชัยนาท   ', '2');
INSERT INTO `provinces` VALUES ('10', 'สระบุรี', '2');
INSERT INTO `provinces` VALUES ('11', 'ชลบุรี   ', '3');
INSERT INTO `provinces` VALUES ('12', 'ระยอง   ', '3');
INSERT INTO `provinces` VALUES ('13', 'จันทบุรี   ', '3');
INSERT INTO `provinces` VALUES ('14', 'ตราด   ', '3');
INSERT INTO `provinces` VALUES ('15', 'ฉะเชิงเทรา   ', '3');
INSERT INTO `provinces` VALUES ('16', 'ปราจีนบุรี   ', '3');
INSERT INTO `provinces` VALUES ('17', 'นครนายก   ', '3');
INSERT INTO `provinces` VALUES ('18', 'สระแก้ว   ', '3');
INSERT INTO `provinces` VALUES ('19', 'นครราชสีมา   ', '5');
INSERT INTO `provinces` VALUES ('20', 'บุรีรัมย์   ', '5');
INSERT INTO `provinces` VALUES ('21', 'สุรินทร์   ', '5');
INSERT INTO `provinces` VALUES ('22', 'ศรีสะเกษ   ', '7');
INSERT INTO `provinces` VALUES ('23', 'อุบลราชธานี   ', '7');
INSERT INTO `provinces` VALUES ('24', 'ยโสธร   ', '7');
INSERT INTO `provinces` VALUES ('25', 'ชัยภูมิ   ', '5');
INSERT INTO `provinces` VALUES ('26', 'อำนาจเจริญ   ', '7');
INSERT INTO `provinces` VALUES ('27', 'หนองบัวลำภู   ', '6');
INSERT INTO `provinces` VALUES ('28', 'ขอนแก่น   ', '6');
INSERT INTO `provinces` VALUES ('29', 'อุดรธานี   ', '6');
INSERT INTO `provinces` VALUES ('30', 'เลย   ', '6');
INSERT INTO `provinces` VALUES ('31', 'หนองคาย   ', '6');
INSERT INTO `provinces` VALUES ('32', 'มหาสารคาม   ', '6');
INSERT INTO `provinces` VALUES ('33', 'ร้อยเอ็ด   ', '6');
INSERT INTO `provinces` VALUES ('34', 'กาฬสินธุ์   ', '6');
INSERT INTO `provinces` VALUES ('35', 'สกลนคร   ', '7');
INSERT INTO `provinces` VALUES ('36', 'นครพนม   ', '7');
INSERT INTO `provinces` VALUES ('37', 'มุกดาหาร   ', '7');
INSERT INTO `provinces` VALUES ('38', 'เชียงใหม่   ', '10');
INSERT INTO `provinces` VALUES ('39', 'ลำพูน   ', '10');
INSERT INTO `provinces` VALUES ('40', 'ลำปาง   ', '10');
INSERT INTO `provinces` VALUES ('41', 'อุตรดิตถ์   ', '9');
INSERT INTO `provinces` VALUES ('42', 'แพร่   ', '10');
INSERT INTO `provinces` VALUES ('43', 'น่าน   ', '10');
INSERT INTO `provinces` VALUES ('44', 'พะเยา   ', '10');
INSERT INTO `provinces` VALUES ('45', 'เชียงราย   ', '10');
INSERT INTO `provinces` VALUES ('46', 'แม่ฮ่องสอน   ', '10');
INSERT INTO `provinces` VALUES ('47', 'นครสวรรค์   ', '8');
INSERT INTO `provinces` VALUES ('48', 'อุทัยธานี   ', '8');
INSERT INTO `provinces` VALUES ('49', 'กำแพงเพชร   ', '8');
INSERT INTO `provinces` VALUES ('50', 'ตาก   ', '9');
INSERT INTO `provinces` VALUES ('51', 'สุโขทัย   ', '9');
INSERT INTO `provinces` VALUES ('52', 'พิษณุโลก   ', '9');
INSERT INTO `provinces` VALUES ('53', 'พิจิตร   ', '8');
INSERT INTO `provinces` VALUES ('54', 'เพชรบูรณ์   ', '9');
INSERT INTO `provinces` VALUES ('55', 'ราชบุรี   ', '4');
INSERT INTO `provinces` VALUES ('56', 'กาญจนบุรี   ', '4');
INSERT INTO `provinces` VALUES ('57', 'สุพรรณบุรี   ', '4');
INSERT INTO `provinces` VALUES ('58', 'นครปฐม   ', '4');
INSERT INTO `provinces` VALUES ('59', 'สมุทรสาคร   ', '4');
INSERT INTO `provinces` VALUES ('60', 'สมุทรสงคราม   ', '4');
INSERT INTO `provinces` VALUES ('61', 'เพชรบุรี   ', '4');
INSERT INTO `provinces` VALUES ('62', 'ประจวบคีรีขันธ์   ', '4');
INSERT INTO `provinces` VALUES ('63', 'นครศรีธรรมราช   ', '11');
INSERT INTO `provinces` VALUES ('64', 'กระบี่   ', '11');
INSERT INTO `provinces` VALUES ('65', 'พังงา   ', '11');
INSERT INTO `provinces` VALUES ('66', 'ภูเก็ต   ', '11');
INSERT INTO `provinces` VALUES ('67', 'สุราษฎร์ธานี   ', '11');
INSERT INTO `provinces` VALUES ('68', 'ระนอง   ', '11');
INSERT INTO `provinces` VALUES ('69', 'ชุมพร   ', '11');
INSERT INTO `provinces` VALUES ('70', 'สงขลา   ', '12');
INSERT INTO `provinces` VALUES ('71', 'สตูล   ', '12');
INSERT INTO `provinces` VALUES ('72', 'ตรัง   ', '12');
INSERT INTO `provinces` VALUES ('73', 'พัทลุง   ', '12');
INSERT INTO `provinces` VALUES ('74', 'ปัตตานี   ', '12');
INSERT INTO `provinces` VALUES ('75', 'ยะลา   ', '12');
INSERT INTO `provinces` VALUES ('76', 'นราธิวาส   ', '12');
INSERT INTO `provinces` VALUES ('77', 'บึงกาฬ', '6');
INSERT INTO `provinces` VALUES ('79', 'ไม่ระบุจังหวัด', '0');

-- ----------------------------
-- Table structure for sexs
-- ----------------------------
DROP TABLE IF EXISTS `sexs`;
CREATE TABLE `sexs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `color` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sexs
-- ----------------------------
INSERT INTO `sexs` VALUES ('1', 'ชาย', 'themes/line/images/man.png', '#0064cd');
INSERT INTO `sexs` VALUES ('2', 'หญิง', 'themes/line/images/women.png', '#FF69B4');
INSERT INTO `sexs` VALUES ('3', 'ทอม', 'themes/line/images/tom.png', '#e43a3a');
INSERT INTO `sexs` VALUES ('4', 'ดี้', 'themes/line/images/diiz.png', '#3ac7bc');
INSERT INTO `sexs` VALUES ('5', 'เกย์', 'themes/line/images/gay.png', '#b72ee0');
INSERT INTO `sexs` VALUES ('7', 'เลสเบี้ยน', null, '#A9245F');
INSERT INTO `sexs` VALUES ('8', 'สาวประเภทสอง', 'themes/line/images/trans.png', '#e43ade');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook_id` varchar(255) DEFAULT NULL,
  `facebook_name` varchar(255) DEFAULT NULL,
  `facebook_email` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sex_id` int(1) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `detail` text,
  `line` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1122018497830648', 'เดียร์ ชริลแมว', 'unisexx@hotmail.com', 'เดียร์ ชริลแมว', '', '1', '1', '30', 'คนโสดแอดมาคุยกันนะคะ ไม่หยิ่งค่ะ...ก่อนแอดกด รักนะ', 'ratasak1234', '', '', '', '2016-01-11 17:05:17', '2016-01-11 23:45:00', '::1', '1');
INSERT INTO `users` VALUES ('4', '551941938306385', 'วอรัส น่ารัก', 'unisexx@gmail.com', 'วอรัส น่ารัก', '', '8', '1', '18', 'หาเพื่อน Facebook, LINE, Twitter, Instagram, ง่ายๆ เพียงแค่ login เข้าสู่ระบบแล้วกรอกข้อมูลส่วนตัวได้เลยจ้า', 'ratasak1234', '', '', '', '2016-01-11 17:06:56', '2016-01-11 17:06:56', '::1', '1');
