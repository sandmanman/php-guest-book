# Host: localhost  (Version: 5.5.38)
# Date: 2016-08-24 13:33:43
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "gb_guestbook"
#

DROP TABLE IF EXISTS `gb_guestbook`;
CREATE TABLE `gb_guestbook` (
  `cid` bigint(20) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(20) DEFAULT NULL COMMENT '用户昵称',
  `email` varchar(60) DEFAULT NULL COMMENT '邮箱',
  `content` text NOT NULL COMMENT '留言内容',
  `create_time` datetime DEFAULT NULL COMMENT '留言时间',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '是否有回复的状态',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COMMENT='留言表';

#
# Data for table "gb_guestbook"
#

/*!40000 ALTER TABLE `gb_guestbook` DISABLE KEYS */;
INSERT INTO `gb_guestbook` VALUES (42,'全球单身狗反秀恩爱联盟荣誉会长',NULL,'现在想来 我们这波第一批老去的90后还是挺幸运的 在我们最好的年龄遇到了最好的华语乐坛（周杰伦巅峰 林俊杰 SHE 潘玮柏 蔡依林…）遇到了巅峰的星爷 遇到了最好的西科东艾北卡南麦 动画城陪我们成长 周杰伦陪我们成熟 我们看着星爷老去 见证科比退役 或许我们不是最好的一代 但一定是最精彩的一代','2016-08-03 00:00:00',1),(43,'全球单身狗反秀恩爱联盟荣誉会长',NULL,'现在想来 我们这波第一批老去的90后还是挺幸运的 在我们最好的年龄遇到了最好的华语乐坛（周杰伦巅峰 林俊杰 SHE 潘玮柏 蔡依林…）遇到了巅峰的星爷 遇到了最好的西科东艾北卡南麦 动画城陪我们成长 周杰伦陪我们成熟 我们看着星爷老去 见证科比退役 或许我们不是最好的一代 但一定是最精彩的一代','2016-08-03 00:00:00',1),(44,'全球单身狗反秀恩爱联盟荣誉会长',NULL,'现在想来 我们这波第一批老去的90后还是挺幸运的 在我们最好的年龄遇到了最好的华语乐坛（周杰伦巅峰 林俊杰 SHE 潘玮柏 蔡依林…）遇到了巅峰的星爷 遇到了最好的西科东艾北卡南麦 动画城陪我们成长 周杰伦陪我们成熟 我们看着星爷老去 见证科比退役 或许我们不是最好的一代 但一定是最精彩的一代','2016-08-03 00:00:00',1),(60,'全球单身狗反秀恩爱联盟荣誉会长',NULL,'现在想来 我们这波第一批老去的90后还是挺幸运的 在我们最好的年龄遇到了最好的华语乐坛（周杰伦巅峰 林俊杰 SHE 潘玮柏 蔡依林…）遇到了巅峰的星爷 遇到了最好的西科东艾北卡南麦 动画城陪我们成长 周杰伦陪我们成熟 我们看着星爷老去 见证科比退役 或许我们不是最好的一代 但一定是最精彩的一代','2016-08-03 00:00:00',1),(61,'全球单身狗反秀恩爱联盟荣誉会长',NULL,'现在想来 我们这波第一批老去的90后还是挺幸运的 在我们最好的年龄遇到了最好的华语乐坛（周杰伦巅峰 林俊杰 SHE 潘玮柏 蔡依林…）遇到了巅峰的星爷 遇到了最好的西科东艾北卡南麦 动画城陪我们成长 周杰伦陪我们成熟 我们看着星爷老去 见证科比退役 或许我们不是最好的一代 但一定是最精彩的一代','2016-08-03 00:00:00',1),(62,'全球单身狗反秀恩爱联盟荣誉会长',NULL,'现在想来 我们这波第一批老去的90后还是挺幸运的 在我们最好的年龄遇到了最好的华语乐坛（周杰伦巅峰 林俊杰 SHE 潘玮柏 蔡依林…）遇到了巅峰的星爷 遇到了最好的西科东艾北卡南麦 动画城陪我们成长 周杰伦陪我们成熟 我们看着星爷老去 见证科比退役 或许我们不是最好的一代 但一定是最精彩的一代','2016-08-03 00:00:00',1),(63,'全球单身狗反秀恩爱联盟荣誉会长',NULL,'现在想来 我们这波第一批老去的90后还是挺幸运的 在我们最好的年龄遇到了最好的华语乐坛（周杰伦巅峰 林俊杰 SHE 潘玮柏 蔡依林…）遇到了巅峰的星爷 遇到了最好的西科东艾北卡南麦 动画城陪我们成长 周杰伦陪我们成熟 我们看着星爷老去 见证科比退役 或许我们不是最好的一代 但一定是最精彩的一代','2016-08-03 00:00:00',1),(64,'全球单身狗反秀恩爱联盟荣誉会长',NULL,'现在想来 我们这波第一批老去的90后还是挺幸运的 在我们最好的年龄遇到了最好的华语乐坛（周杰伦巅峰 林俊杰 SHE 潘玮柏 蔡依林…）遇到了巅峰的星爷 遇到了最好的西科东艾北卡南麦 动画城陪我们成长 周杰伦陪我们成熟 我们看着星爷老去 见证科比退役 或许我们不是最好的一代 但一定是最精彩的一代','2016-08-03 00:00:00',1);
/*!40000 ALTER TABLE `gb_guestbook` ENABLE KEYS */;

#
# Structure for table "gb_reply"
#

DROP TABLE IF EXISTS `gb_reply`;
CREATE TABLE `gb_reply` (
  `cid` bigint(20) NOT NULL DEFAULT '0',
  `content` text COMMENT '回复内容',
  `create_time` datetime DEFAULT NULL COMMENT '回复时间'
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

#
# Data for table "gb_reply"
#

/*!40000 ALTER TABLE `gb_reply` DISABLE KEYS */;
INSERT INTO `gb_reply` VALUES (60,'大幅度放大的','0000-00-00 00:00:00'),(64,'豆腐干豆腐干广东会馆和规范化规范化风格','0000-00-00 00:00:00'),(64,'淡淡的方法','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `gb_reply` ENABLE KEYS */;

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

#
# Data for table "gb_user"
#

/*!40000 ALTER TABLE `gb_user` DISABLE KEYS */;
INSERT INTO `gb_user` VALUES (1,'sandman','89a26cb42e040afc6e74da22a3e1cfe2',1470045525,1);
/*!40000 ALTER TABLE `gb_user` ENABLE KEYS */;
