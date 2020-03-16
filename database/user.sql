/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : user

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 16/03/2020 21:13:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for classes
-- ----------------------------
DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes`  (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `People_num` int(11) NOT NULL,
  `createtime` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of classes
-- ----------------------------
INSERT INTO `classes` VALUES (1, '一班', 48, 0);
INSERT INTO `classes` VALUES (2, '三班', 60, 0);
INSERT INTO `classes` VALUES (3, '四班', 55, 0);
INSERT INTO `classes` VALUES (4, '五班', 46, 0);
INSERT INTO `classes` VALUES (5, '二班', 43, 0);
INSERT INTO `classes` VALUES (6, '六班', 49, 0);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `register_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'aaa@163.com', 'aa', 1582097779);
INSERT INTO `users` VALUES (2, 'cc1@12', 'c', 1582097779);
INSERT INTO `users` VALUES (3, 'ccf@13', 'd', 1582097779);
INSERT INTO `users` VALUES (4, 'cc2@14', 'r', 1582097779);
INSERT INTO `users` VALUES (5, 'vd@15', 'r', 1582097779);
INSERT INTO `users` VALUES (6, 'ak@16', 'w', 1582097779);
INSERT INTO `users` VALUES (7, 'vb@17', 'wq', 1582097779);
INSERT INTO `users` VALUES (8, 'rf@18', 'qw', 1582097779);
INSERT INTO `users` VALUES (9, 'ed@19', 'qwwq', 1582097779);
INSERT INTO `users` VALUES (10, 'bb1@163.com', 'dfg', 1582097779);
INSERT INTO `users` VALUES (11, 'bb2@164.com', 'ewq', 1582097779);
INSERT INTO `users` VALUES (12, 'bb3@165.com', 'grfd', 1582097779);
INSERT INTO `users` VALUES (13, 'bbf@166.com', 'sd', 1582097779);
INSERT INTO `users` VALUES (14, 'bbrf@167.com', 'x', 1582097779);
INSERT INTO `users` VALUES (15, 'bbvf@168.com', 'ds', 1582097779);
INSERT INTO `users` VALUES (17, 'qq', 'wq', 1582097779);

SET FOREIGN_KEY_CHECKS = 1;
