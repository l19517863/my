/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : bookdb

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-03-05 20:18:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图书编号',
  `bookname` varchar(50) NOT NULL COMMENT '图书名称',
  `author` varchar(50) NOT NULL,
  `press` varchar(50) NOT NULL COMMENT '出版社',
  `price` decimal(10,2) NOT NULL,
  `booknum` int(11) NOT NULL,
  `pubtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('1', 'MySQL数据库应用从入门到精通（附光盘）', '崔洋，贺亚茹', '中国铁道出版社', '47.20', '10', '2018-01-16 23:19:09');
INSERT INTO `books` VALUES ('2', '解放军精神', '孙军正', '中华工商联合出版社', '15.80', '15', '2018-01-16 23:19:39');
INSERT INTO `books` VALUES ('3', '锋利的jQuery（第2版）', '单东林，张晓菲，魏然', '人民邮电出版社', '38.70', '32', '2018-01-16 23:20:08');
INSERT INTO `books` VALUES ('4', 'O\'Reilly：Head First PHP & MySQL（中文版）', '林恩·贝伊利，迈克尔·莫里森', '中国电力出版社', '77.40', '18', '2018-01-16 23:20:42');
INSERT INTO `books` VALUES ('5', '史蒂夫 乔布斯传', 'Walter Isaacs', '中信出版社', '44.90', '13', '2018-01-16 23:21:19');
INSERT INTO `books` VALUES ('6', '世界因你而不同', '李开复 范海涛', '中信出版社', '42.00', '11', '2018-01-16 23:21:53');
INSERT INTO `books` VALUES ('7', '十万个冷笑话', '李开复', '动漫出版社', '9.90', '10', '2018-01-16 23:22:10');
INSERT INTO `books` VALUES ('8', 'gf', 'dfsd', 'dfgd', '12.00', '2', '2018-01-18 17:09:41');
INSERT INTO `books` VALUES ('9', 'sgr', 'erg', 'ert', '4.00', '90', '2018-01-18 17:15:27');
