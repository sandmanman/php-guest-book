# Host: localhost  (Version: 5.5.38)
# Date: 2016-08-01 18:00:38
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "guestbook"
#

DROP TABLE IF EXISTS `guestbook`;
CREATE TABLE `guestbook` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nickname` char(16) NOT NULL DEFAULT '' COMMENT '昵称',
  `email` varchar(60) DEFAULT '' COMMENT '邮箱',
  `content` text NOT NULL COMMENT '留言内容',
  `createtime` int(10) NOT NULL DEFAULT '0' COMMENT '留言发表时间',
  `reply` text NOT NULL COMMENT '回复内容',
  `replytime` int(11) DEFAULT NULL COMMENT '回复时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='留言表';

#
# Data for table "guestbook"
#

/*!40000 ALTER TABLE `guestbook` DISABLE KEYS */;
/*!40000 ALTER TABLE `guestbook` ENABLE KEYS */;

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `createtime` int(10) NOT NULL DEFAULT '0' COMMENT '用户创建的时间',
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户等级',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表';

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'sandman','89a26cb42e040afc6e74da22a3e1cfe2',1470045525,9);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
