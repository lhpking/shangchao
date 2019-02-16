/*
Navicat MySQL Data Transfer

Source Server         : lyorcw2017.mysql.rds.aliyuncs.com_3306
Source Server Version : 50718
Source Host           : lyorcw2017.mysql.rds.aliyuncs.com:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2019-01-11 11:59:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `shop_admin`
-- ----------------------------
DROP TABLE IF EXISTS `shop_admin`;
CREATE TABLE `shop_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` char(255) DEFAULT '0',
  `type` char(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_admin
-- ----------------------------
INSERT INTO `shop_admin` VALUES ('94', 'admin', '202cb962ac59075b964b07152d234b70', '0', '1', '2147483647', '1', '1541733645');
INSERT INTO `shop_admin` VALUES ('95', '卢海平', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', '2147483647', '1', '1541743017');
INSERT INTO `shop_admin` VALUES ('96', 'User', '202cb962ac59075b964b07152d234b70', '0', '0', '2147483647', '1', '1541746628');
INSERT INTO `shop_admin` VALUES ('97', '11232', 'e034fb6b66aacc1d48f445ddfb08da98', '0', '1', '2147483647', '1', '1541993196');
INSERT INTO `shop_admin` VALUES ('98', '3232', '202cb962ac59075b964b07152d234b70', '0', '0', '2147483647', '1', '1541993746');
INSERT INTO `shop_admin` VALUES ('99', '123', '202cb962ac59075b964b07152d234b70', '0', '1', '123', '1', '1542175214');
INSERT INTO `shop_admin` VALUES ('100', '11', '111', '0', null, null, null, null);
INSERT INTO `shop_admin` VALUES ('101', null, null, '0', null, null, null, null);

-- ----------------------------
-- Table structure for `shop_goods`
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods`;
CREATE TABLE `shop_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `orderid` char(255) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT NULL,
  `stock` int(255) DEFAULT NULL,
  `remarks` text,
  `status` int(11) DEFAULT '0',
  `shop_time` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_goods
-- ----------------------------
INSERT INTO `shop_goods` VALUES ('75', '2', '菊花茶', '6970678980987', '0.01', '100', '无异常', '0', '1542698311', '8');
INSERT INTO `shop_goods` VALUES ('76', '4', '笔记本', '6921734976611', '30.00', '100', '100', '0', '1542705464', '8');
INSERT INTO `shop_goods` VALUES ('77', '4', '袋子', '6922646112166', '4.00', '41', '111', '0', '1542715063', '8');
INSERT INTO `shop_goods` VALUES ('80', '2', '正清源矿泉水', '6942319400086', '1.50', '100', '', '0', '1542766833', '8');
INSERT INTO `shop_goods` VALUES ('81', '4', '原木纸巾', '6922266445057', '12.00', '100', '', '0', '1542958930', '8');
INSERT INTO `shop_goods` VALUES ('93', '4', '华为管理书', '9787505739789', '39.80', '10', '', '0', '1543203109', '8');
INSERT INTO `shop_goods` VALUES ('94', '4', '管理书2', '9787505738430', '39.80', '10', '', '0', '1543203341', '8');
INSERT INTO `shop_goods` VALUES ('97', '1', '测试', '123123123123', '12.00', '100', '无', '0', '1545467316', null);

-- ----------------------------
-- Table structure for `shop_order`
-- ----------------------------
DROP TABLE IF EXISTS `shop_order`;
CREATE TABLE `shop_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) DEFAULT NULL,
  `shop_id` varchar(255) DEFAULT NULL,
  `order_time` varchar(255) DEFAULT NULL,
  `shop_monepay` decimal(10,2) DEFAULT NULL,
  `orderid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_order
-- ----------------------------
INSERT INTO `shop_order` VALUES ('195', '1', '8', '1543463157', '1.50', '6942319400086');
INSERT INTO `shop_order` VALUES ('196', '1', '8', '1543463198', '12.00', '6922266445057');
INSERT INTO `shop_order` VALUES ('197', '2', '8', '1543463246', '42.00', '6921734976611');
INSERT INTO `shop_order` VALUES ('198', '6', '8', '1543483571', '162.00', '6921734976611');
INSERT INTO `shop_order` VALUES ('199', '18', '8', '1543540697', '289.50', '6942319400086');
INSERT INTO `shop_order` VALUES ('200', '2', '8', '1545127460', '31.50', '6970678980987');

-- ----------------------------
-- Table structure for `shop_pay`
-- ----------------------------
DROP TABLE IF EXISTS `shop_pay`;
CREATE TABLE `shop_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_name` varchar(255) DEFAULT NULL,
  `pay_money` decimal(10,2) DEFAULT NULL,
  `pay_order_id` int(11) DEFAULT NULL,
  `pay_shop_id` int(11) DEFAULT NULL,
  `pay_state` int(11) DEFAULT '1',
  `pay_time` varchar(255) DEFAULT NULL,
  `pay_typename` varchar(255) DEFAULT NULL,
  `orderid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_pay
-- ----------------------------
INSERT INTO `shop_pay` VALUES ('127', '原木纸巾', '12.00', '4', '8', '1', '1543463192', '美宜佳超市', '6922266445057');
INSERT INTO `shop_pay` VALUES ('128', '笔记本', '30.00', '4', '8', '1', '1543463240', '美宜佳超市', '6921734976611');
INSERT INTO `shop_pay` VALUES ('129', '正清源矿泉水', '1.50', '2', '8', '1', '1543540681', '美宜佳超市', '6942319400086');
INSERT INTO `shop_pay` VALUES ('130', '菊花茶', '0.01', '2', '8', '1', '1545128737', '美宜佳超市', '6970678980987');

-- ----------------------------
-- Table structure for `shop_stock`
-- ----------------------------
DROP TABLE IF EXISTS `shop_stock`;
CREATE TABLE `shop_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_stock
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_store`
-- ----------------------------
DROP TABLE IF EXISTS `shop_store`;
CREATE TABLE `shop_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) DEFAULT NULL,
  `store_phone` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `state` char(255) DEFAULT '0',
  `type_id` int(11) DEFAULT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `moneyname` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `detailed` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_store
-- ----------------------------
INSERT INTO `shop_store` VALUES ('8', '美宜佳超市', '0797-3910', '123', '123', '0', null, '徐永幸', '卢海平', '江西', '赣州市', '章贡区', '中央城黄金大道南6路13号', '1542248669');

-- ----------------------------
-- Table structure for `shop_structure`
-- ----------------------------
DROP TABLE IF EXISTS `shop_structure`;
CREATE TABLE `shop_structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_structure
-- ----------------------------
INSERT INTO `shop_structure` VALUES ('1', '1', '店长');
INSERT INTO `shop_structure` VALUES ('2', '2', '收银员');

-- ----------------------------
-- Table structure for `shop_type`
-- ----------------------------
DROP TABLE IF EXISTS `shop_type`;
CREATE TABLE `shop_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeid` int(11) DEFAULT NULL,
  `typename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_type
-- ----------------------------
INSERT INTO `shop_type` VALUES ('1', '1', '烟酒');
INSERT INTO `shop_type` VALUES ('2', '2', '饮料');
INSERT INTO `shop_type` VALUES ('3', '3', '便利食品');
INSERT INTO `shop_type` VALUES ('4', '4', '生活用品');
INSERT INTO `shop_type` VALUES ('5', '5', '个人护理用品');
INSERT INTO `shop_type` VALUES ('6', '6', '服务商品');
INSERT INTO `shop_type` VALUES ('7', '7', '医药品');

-- ----------------------------
-- Table structure for `shop_user`
-- ----------------------------
DROP TABLE IF EXISTS `shop_user`;
CREATE TABLE `shop_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT '0',
  `time` varchar(255) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_user
-- ----------------------------
INSERT INTO `shop_user` VALUES ('1', '卢海平', '17687976910', '0', '123123', '2', '0');
INSERT INTO `shop_user` VALUES ('2', '徐永幸', '12312312', '0', '12312', '1', '0');
INSERT INTO `shop_user` VALUES ('4', '谢文涛', '123', '0', '1542188514', '1', '1');
INSERT INTO `shop_user` VALUES ('5', '魏继桢', '12312', '0', '1542189663', '1', '1');
INSERT INTO `shop_user` VALUES ('6', '小美', '123123', '0', '1542189680', '2', '1');
