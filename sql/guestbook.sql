﻿# Host: localhost  (Version: 5.5.38)
# Date: 2016-08-25 17:22:30
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "gb_guestbook"
#

DROP TABLE IF EXISTS `gb_guestbook`;
CREATE TABLE `gb_guestbook` (
  `cid` bigint(20) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(20) DEFAULT NULL COMMENT '用户昵称',
  `content` text NOT NULL COMMENT '留言内容',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '留言时间',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COMMENT='留言表';

#
# Structure for table "gb_reply"
#

DROP TABLE IF EXISTS `gb_reply`;
CREATE TABLE `gb_reply` (
  `cid` bigint(20) NOT NULL DEFAULT '0',
  `content` text COMMENT '回复内容',
  `reply_time` int(10) NOT NULL DEFAULT '0' COMMENT '回复时间'
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

#
# Structure for table "gb_user"
#

DROP TABLE IF EXISTS `gb_user`;
CREATE TABLE `gb_user` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `createtime` int(10) NOT NULL DEFAULT '0' COMMENT '用户创建的时间',
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户等级',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';
