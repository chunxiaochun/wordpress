<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8mb4');
E_D("DROP TABLE IF EXISTS `wp_links`;");
E_C("CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
E_D("replace into `wp_links` values('8','http://lightory.net/','LiGht&#039;s BloG','','_blank','刘白光','Y','1','0','0000-00-00 00:00:00','','','');");
E_D("replace into `wp_links` values('9','http://pipitu.org/','pipitu','','_blank','','N','1','0','0000-00-00 00:00:00','','','');");
E_D("replace into `wp_links` values('10','http://www.yyh.im','OK York!','','_blank','余有海','Y','1','0','0000-00-00 00:00:00','','','');");
E_D("replace into `wp_links` values('12','http://brightconan.com/','岚涟小筑','','_blank','周亮','Y','1','0','0000-00-00 00:00:00','','','');");
E_D("replace into `wp_links` values('16','http://jinther.com/','锦瑟年华','','_blank','方方 叶莉莎','Y','1','0','0000-00-00 00:00:00','','','');");
E_D("replace into `wp_links` values('18','http://yankay.com','自然','','_blank','颜开','N','1','0','0000-00-00 00:00:00','','','');");
E_D("replace into `wp_links` values('20','http://wwtvanessa.blogbus.com/','wwtvanessa','','_blank','王文婷mm','Y','1','0','0000-00-00 00:00:00','','','');");
E_D("replace into `wp_links` values('21','http://www.hellosnow.net/','冬至未至','','_blank','黄雪源mm','N','1','0','0000-00-00 00:00:00','','','');");
E_D("replace into `wp_links` values('22','http://www.jjzhou.com','Mellow Soul · 沉酣游筆','','_blank','周健','N','1','0','0000-00-00 00:00:00','','','');");
E_D("replace into `wp_links` values('23','http://www.mazr.in','我爱技术爱艺术更爱生活','','','毛苏晗','Y','1','0','0000-00-00 00:00:00','','','');");
E_D("replace into `wp_links` values('25','http://zishuo.com/','子说','','_blank','无码评论，独立思考','Y','1','0','0000-00-00 00:00:00','','','');");
E_D("replace into `wp_links` values('29','http://www.ikeji123.com','罗超','','_blank','','Y','1','0','0000-00-00 00:00:00','','','');");

require("../../inc/footer.php");
?>