/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : muzuoyx

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-01-11 11:29:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for index
-- ----------------------------
DROP TABLE IF EXISTS `index`;
CREATE TABLE `index` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of index
-- ----------------------------
INSERT INTO `index` VALUES ('2', 'attitude', 'http://muzuoyx.com/images/dJZicBNDLA1513755918.jpg', '有态度', '2017-12-20 13:23:13', '2017-12-20 15:45:18');
INSERT INTO `index` VALUES ('3', 'deep', 'http://muzuoyx.com/images/Vkx60e7K3k1513754488.png', '有深度', '2017-12-20 13:23:13', '2017-12-20 15:21:28');
INSERT INTO `index` VALUES ('4', 'brand', null, '合作品牌', '2017-12-20 13:23:13', '2017-12-20 13:23:13');
INSERT INTO `index` VALUES ('5', 'about', null, '关于我们', '2017-12-20 13:23:13', '2017-12-20 13:23:13');

-- ----------------------------
-- Table structure for picture
-- ----------------------------
DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of picture
-- ----------------------------
INSERT INTO `picture` VALUES ('6', '2', 'http://muzuoyx.com/images/ZZBoPRBiLY1513761302.png', '3232', null, '2017-12-20 16:50:57', '2017-12-20 17:15:02');
INSERT INTO `picture` VALUES ('8', '1', 'http://muzuoyx.com/images/B4BGasVhGs1513761526.jpg', '3333', '3333333333333111311111131133', '2017-12-20 16:52:14', '2017-12-20 17:18:47');
INSERT INTO `picture` VALUES ('9', '3', null, '1212', '1212', '2017-12-20 16:53:28', '2017-12-20 16:53:28');
INSERT INTO `picture` VALUES ('10', '1', 'http://muzuoyx.com/images/zEguZq7yW51513761536.jpg', '22', '22222222222', '2017-12-20 17:18:49', '2017-12-20 17:18:56');

-- ----------------------------
-- Table structure for video
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of video
-- ----------------------------
INSERT INTO `video` VALUES ('11', '1', '2222222222222222222333', '22333', '2222222222222333', '2017-12-20 17:14:30', '2017-12-20 17:14:41');
INSERT INTO `video` VALUES ('12', '1', '33333333333', '3', '33', '2017-12-20 17:14:42', '2017-12-20 17:14:42');

-- ----------------------------
-- Table structure for wcms_access
-- ----------------------------
DROP TABLE IF EXISTS `wcms_access`;
CREATE TABLE `wcms_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci COMMENT '权限名称',
  `path` text COLLATE utf8mb4_unicode_ci COMMENT '权限路径',
  `user` text COLLATE utf8mb4_unicode_ci,
  `group` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wcms_access
-- ----------------------------

-- ----------------------------
-- Table structure for wcms_category
-- ----------------------------
DROP TABLE IF EXISTS `wcms_category`;
CREATE TABLE `wcms_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0' COMMENT '上级id',
  `idx` int(11) DEFAULT '0' COMMENT '排序',
  `path` varchar(255) DEFAULT '0' COMMENT '路径',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wcms_category
-- ----------------------------
INSERT INTO `wcms_category` VALUES ('1', '0', '1', '0-0-1-0-1', '所有分类');
INSERT INTO `wcms_category` VALUES ('2', '1', '2', '0-0-1-0-1-2', '菜单管理');
INSERT INTO `wcms_category` VALUES ('75', '2', '3', '0-0-1-0-1-2-75', '后台菜单');
INSERT INTO `wcms_category` VALUES ('76', '75', '4', '0-0-1-0-1-2-75-76', '前台菜单');
INSERT INTO `wcms_category` VALUES ('77', '0', '6', '0-0-1-0-77', '前台菜单');
INSERT INTO `wcms_category` VALUES ('78', '76', '5', '0-0-1-0-1-2-75-76-78', '4324');

-- ----------------------------
-- Table structure for wcms_menu
-- ----------------------------
DROP TABLE IF EXISTS `wcms_menu`;
CREATE TABLE `wcms_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0' COMMENT '上级id',
  `idx` int(11) DEFAULT '0' COMMENT '排序',
  `path` varchar(255) DEFAULT '0' COMMENT '路径',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `url` varchar(255) DEFAULT NULL COMMENT '地址',
  `icon` varchar(255) DEFAULT NULL COMMENT '图表',
  `class` varchar(255) DEFAULT NULL,
  `tip` varchar(255) DEFAULT NULL,
  `display` varchar(4) DEFAULT NULL COMMENT '显示',
  `enable` varchar(4) DEFAULT NULL COMMENT '启用                      ',
  `navtitle` varchar(255) DEFAULT NULL,
  `navtext` varchar(255) DEFAULT NULL,
  `seotitle` varchar(255) DEFAULT NULL,
  `seotext` varchar(255) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wcms_menu
-- ----------------------------
INSERT INTO `wcms_menu` VALUES ('1', '62', '2', '0-62-1', '后台菜单', '/admin/menu/list/0', '', 'iframe', null, 'on', 'on', null, null, null, null, '0');
INSERT INTO `wcms_menu` VALUES ('67', '64', '6', '0-64-67', '视觉设计', '/admin/muzuo/picture/3', '', 'iframe', null, 'on', 'on', '', '', '', '', '0');
INSERT INTO `wcms_menu` VALUES ('69', '64', '3', '0-64-69', '视频案例', '/admin/muzuo/video/1', '', 'iframe', null, 'on', 'on', '', '', '', '', '0');
INSERT INTO `wcms_menu` VALUES ('8', '2', '8', '0-2-8', '模型列表', '/admin/model/list', '', 'iframe', null, 'on', 'on', null, null, null, null, '0');
INSERT INTO `wcms_menu` VALUES ('11', '10', '2', '0-10-11', '基本设置', '/admin/mitem/list/wcms_setting', '', 'iframe', null, 'on', 'on', '', '', '', '', '0');
INSERT INTO `wcms_menu` VALUES ('66', '64', '5', '0-64-66', '静物摄影', '/admin/muzuo/picture/2', '', 'iframe', null, 'on', 'on', '', '', '', '', '0');
INSERT INTO `wcms_menu` VALUES ('13', '2', '9', '0-2-13', '新增模型', '', '', 'iframe', null, 'on', 'on', null, null, null, null, '0');
INSERT INTO `wcms_menu` VALUES ('14', '12', '11', '0-12-14', '用户列表', '', '', 'iframe', null, 'on', 'on', null, null, null, null, '0');
INSERT INTO `wcms_menu` VALUES ('15', '12', '12', '0-12-15', '用户组', '', '', 'iframe', null, 'on', 'on', null, null, null, null, '0');
INSERT INTO `wcms_menu` VALUES ('65', '64', '4', '0-64-65', '广告摄影', '/admin/muzuo/picture/1', '', 'iframe', null, 'on', 'on', '', '', '', '', '0');
INSERT INTO `wcms_menu` VALUES ('17', '10', '4', '0-10-17', '缓存设置', '/admin/cache/list', '', 'iframe', null, 'on', 'on', '', '', '', '', '0');
INSERT INTO `wcms_menu` VALUES ('68', '64', '2', '0-64-68', '首页管理', '/admin/muzuo/index', '', 'iframe', null, 'on', 'on', '', '', '', '', '0');
INSERT INTO `wcms_menu` VALUES ('20', '10', '3', '0-10-20', '邮件设置', '', '', 'iframe', null, 'on', 'on', null, null, null, null, '0');
INSERT INTO `wcms_menu` VALUES ('22', '19', '4', '0-19-22', '文章管理', '', '', 'iframe', null, 'on', 'on', null, null, null, null, '0');
INSERT INTO `wcms_menu` VALUES ('23', '19', '5', '0-19-23', '留言管理', '', '', 'iframe', null, 'on', 'on', null, null, null, null, '0');
INSERT INTO `wcms_menu` VALUES ('24', '16', '14', '0-16-24', '用户组权限', '', '', 'iframe', null, 'on', 'on', null, null, null, null, '0');
INSERT INTO `wcms_menu` VALUES ('25', '19', '6', '0-19-25', '幻灯管理', '', '', 'iframe', null, 'on', 'on', null, null, null, null, '0');
INSERT INTO `wcms_menu` VALUES ('26', '16', '15', '0-16-26', '用户权限', '', '', 'iframe', null, 'on', 'on', null, null, null, null, '0');
INSERT INTO `wcms_menu` VALUES ('64', '0', '1', '0-64', '内容管理', '', 'fa-paper-plane', 'opened', null, 'on', 'on', '', '', '', '', '0');
INSERT INTO `wcms_menu` VALUES ('28', '27', '17', '0-27-28', '关于框架', '', '', 'iframe', null, 'on', 'on', null, null, null, null, '0');
INSERT INTO `wcms_menu` VALUES ('29', '27', '18', '0-27-29', '开发文档', '', '', 'iframe', null, 'on', 'on', null, null, null, null, '0');
INSERT INTO `wcms_menu` VALUES ('63', '0', '7', '0-63', '菜单管理', '/admin/menu/list/0', 'fa-bars', 'opened iframe', null, 'on', 'on', '', '', '', '', '0');

-- ----------------------------
-- Table structure for wcms_menu_type
-- ----------------------------
DROP TABLE IF EXISTS `wcms_menu_type`;
CREATE TABLE `wcms_menu_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wcms_menu_type
-- ----------------------------
INSERT INTO `wcms_menu_type` VALUES ('4', '后台菜单');
INSERT INTO `wcms_menu_type` VALUES ('1', '前台菜单');
INSERT INTO `wcms_menu_type` VALUES ('2', '应用菜单');

-- ----------------------------
-- Table structure for wcms_messages
-- ----------------------------
DROP TABLE IF EXISTS `wcms_messages`;
CREATE TABLE `wcms_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `extra` text COLLATE utf8_unicode_ci,
  `is_read` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of wcms_messages
-- ----------------------------

-- ----------------------------
-- Table structure for wcms_models
-- ----------------------------
DROP TABLE IF EXISTS `wcms_models`;
CREATE TABLE `wcms_models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `formcfg` varchar(255) DEFAULT NULL COMMENT '表单配置',
  `listcfg` varchar(255) DEFAULT NULL COMMENT '列表配置',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wcms_models
-- ----------------------------
INSERT INTO `wcms_models` VALUES ('1', 'wcms_menu', '菜单', null, null);
INSERT INTO `wcms_models` VALUES ('2', 'wcms_menu_type', '菜单类型', null, null);
INSERT INTO `wcms_models` VALUES ('3', 'wcms_models', '模型数据', null, null);
INSERT INTO `wcms_models` VALUES ('4', 'wcms_setting', '网站设置', null, null);
INSERT INTO `wcms_models` VALUES ('5', 'wcms_patent', '专利应用', null, null);

-- ----------------------------
-- Table structure for wcms_notifications
-- ----------------------------
DROP TABLE IF EXISTS `wcms_notifications`;
CREATE TABLE `wcms_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `extra` text COLLATE utf8_unicode_ci,
  `is_read` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of wcms_notifications
-- ----------------------------

-- ----------------------------
-- Table structure for wcms_setting
-- ----------------------------
DROP TABLE IF EXISTS `wcms_setting`;
CREATE TABLE `wcms_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wcms_setting
-- ----------------------------
INSERT INTO `wcms_setting` VALUES ('1', 'login_url', '/auth/user/login', '登录地址');
INSERT INTO `wcms_setting` VALUES ('2', 'admin_login_url', '/auth/admin/login', '管理员登录地址');
INSERT INTO `wcms_setting` VALUES ('3', 'site_title', 'WCMS', '网站标题');
INSERT INTO `wcms_setting` VALUES ('4', 'guest_name', '匿名者', '游客名称');
INSERT INTO `wcms_setting` VALUES ('5', 'logout_url', '/auth/logout', '退出地址');

-- ----------------------------
-- Table structure for wcms_user
-- ----------------------------
DROP TABLE IF EXISTS `wcms_user`;
CREATE TABLE `wcms_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) DEFAULT NULL,
  `nickname` varchar(16) DEFAULT NULL,
  `email` varchar(48) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wcms_user
-- ----------------------------
INSERT INTO `wcms_user` VALUES ('1', 'woldy', '无所不能的魂大人', 'king@woldy.net', '$2y$10$1a2a7nHy5wPHdpsGSXBECOn3wOvjjMQU1KMo5RWYfXGbFPGc/y1iG', '13184357942', null, '1', '0', '2016-11-14 17:27:14', '2016-11-14 17:27:14', null);

-- ----------------------------
-- Table structure for wcms_wiki
-- ----------------------------
DROP TABLE IF EXISTS `wcms_wiki`;
CREATE TABLE `wcms_wiki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `author_id` varchar(255) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `tags` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=329 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wcms_wiki
-- ----------------------------
