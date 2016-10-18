
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
  `login_num` INT (11) DEFAULT '0' COMMENT '登录次数',
  `dat` INT (11) DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`uid`),
  KEY `name`(`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员';

INSERT INTO `user` VALUES ('1','admin','','0','0');

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