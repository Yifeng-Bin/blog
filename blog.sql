
DROP database IF EXISTS `blog`;
CREATE database `blog`;

USE `blog`;


-- ----------------------------
-- create table user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '' COMMENT '用户名',
  `pass` varchar(255) DEFAULT '' COMMENT '密码',
  `nick` varchar(255) NOT NULL DEFAULT '' COMMENT '昵称',
  `login_num` INT (11) DEFAULT '0' COMMENT '登录次数',
  `dat` INT (11) DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`uid`),
  KEY `name`(`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员';

INSERT INTO `user` VALUES ('1','admin','eyJpdiI6IitWZERBNDZ4RjNOY1VKTXNURlNTamc9PSIsInZhbHVlIjoiUjd3cUhqekoxamJGTU5QZUtiM052QT09IiwibWFjIjoiYjQ5NzQ3MmUwMzBmMDVhYmMxMTI0NGVmZjc1NDc1ODg5Y2NjMjgzZmI5ZTI3MzMwZGZhM2RjYjI5MjE3ZjZlMCJ9','admin','0','0');

-- ----------------------------
-- create table cate
-- ----------------------------
DROP TABLE IF EXISTS `cate`;
create table `cate` (
  `cid` int(11) NOT NULL auto_increment,
  `pid` int (11) DEFAULT '0' comment '上级id',
  `name` VARCHAR (100) DEFAULT '' comment '分类名称',
  `order` int(11) DEFAULT '0' comment '排序',
  `dat` int(11) DEFAULT '0' comment '更新时间',
  PRIMARY KEY (`cid`),
  KEY `pid` (`pid`)
) engine=MyISAM DEFAULT charset=utf8 comment='分类';


-- ----------------------------
-- create table article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT '0' COMMENT '分类id',
  `fig` varchar(255) DEFAULT '' COMMENT '缩略图',
  `title` varchar(100) DEFAULT '' COMMENT '文章标题',
  `tag` varchar(100) DEFAULT '' COMMENT '关键词',
  `desc` varchar(255) DEFAULT '' COMMENT '描述',
  `content` text COMMENT '内容',
  `dat` int(11) DEFAULT '0' COMMENT '发布时间',
  `author` varchar(50) DEFAULT '' COMMENT '作者',
  `view` int(11) DEFAULT '0' COMMENT '查看次数',
  PRIMARY KEY (`aid`),
  KEY `cid`(`cid`),
  KEY `author`(`author`),
  KEY `dat`(`dat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章';



-- ----------------------------
-- create table config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '' COMMENT '标题',
  `name` varchar(50) DEFAULT '' COMMENT '变量名',
  `content` text COMMENT '变量值',
  `order` int(11) DEFAULT '0' COMMENT '排序',
  `tips` varchar(255) DEFAULT '' COMMENT '描述',
  `type` varchar(50) DEFAULT '' COMMENT '字段类型',
  `value` varchar(255) DEFAULT '' COMMENT '类型值',
  `dat` int(11) DEFAULT '0' comment '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- ----------------------------
-- create table links
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '名称',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '链接',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `dat` int(11) DEFAULT '0' comment '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- ----------------------------
-- create table navs
-- ----------------------------
DROP TABLE IF EXISTS `navs`;
CREATE TABLE `navs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '' COMMENT '名称',
  `alias` varchar(50) DEFAULT '' COMMENT '别名',
  `url` varchar(255) DEFAULT '' COMMENT 'url',
  `order` int(11) DEFAULT '0' COMMENT '排序',
  `dat` int(11) DEFAULT '0' comment '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
