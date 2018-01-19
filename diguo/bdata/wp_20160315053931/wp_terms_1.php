<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8mb4');
E_D("DROP TABLE IF EXISTS `wp_terms`;");
E_C("CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
E_D("replace into `wp_terms` values('1','存档','backup','0');");
E_D("replace into `wp_terms` values('2','好友链接','%e5%a5%bd%e5%8f%8b%e9%93%be%e6%8e%a5','0');");
E_D("replace into `wp_terms` values('3','软件工程','software','0');");
E_D("replace into `wp_terms` values('4','生活在别处','life','0');");
E_D("replace into `wp_terms` values('6','我的链接','%e6%88%91%e7%9a%84%e9%93%be%e6%8e%a5','0');");
E_D("replace into `wp_terms` values('7','生活','%e7%94%9f%e6%b4%bb','0');");
E_D("replace into `wp_terms` values('8','GFW','gfw','0');");
E_D("replace into `wp_terms` values('9','邂逅','%e9%82%82%e9%80%85','0');");
E_D("replace into `wp_terms` values('10','电影','%e7%94%b5%e5%bd%b1','0');");
E_D("replace into `wp_terms` values('13','阅读','%e9%98%85%e8%af%bb','0');");
E_D("replace into `wp_terms` values('16','软件工程','%e8%bd%af%e4%bb%b6%e5%b7%a5%e7%a8%8b','0');");
E_D("replace into `wp_terms` values('17','科幻','%e7%a7%91%e5%b9%bb','0');");
E_D("replace into `wp_terms` values('18','时间','%e6%97%b6%e9%97%b4','0');");
E_D("replace into `wp_terms` values('19','青春','%e9%9d%92%e6%98%a5','0');");
E_D("replace into `wp_terms` values('20','梦想','%e6%a2%a6%e6%83%b3','0');");
E_D("replace into `wp_terms` values('21','十年','%e5%8d%81%e5%b9%b4','0');");
E_D("replace into `wp_terms` values('22','购物','%e8%b4%ad%e7%89%a9','0');");
E_D("replace into `wp_terms` values('23','选择','%e9%80%89%e6%8b%a9','0');");
E_D("replace into `wp_terms` values('24','博弈','%e5%8d%9a%e5%bc%88','0');");
E_D("replace into `wp_terms` values('25','创业','%e5%88%9b%e4%b8%9a','0');");
E_D("replace into `wp_terms` values('26','JAVA','java','0');");
E_D("replace into `wp_terms` values('27','C++','c','0');");
E_D("replace into `wp_terms` values('28','设计模式','%e8%ae%be%e8%ae%a1%e6%a8%a1%e5%bc%8f','0');");
E_D("replace into `wp_terms` values('29','程序员','%e7%a8%8b%e5%ba%8f%e5%91%98','0');");
E_D("replace into `wp_terms` values('30','chinajoy','chinajoy','0');");
E_D("replace into `wp_terms` values('31','算法','%e7%ae%97%e6%b3%95','0');");
E_D("replace into `wp_terms` values('32','哲学','%e5%93%b2%e5%ad%a6','0');");
E_D("replace into `wp_terms` values('33','终极问题','%e7%bb%88%e6%9e%81%e9%97%ae%e9%a2%98','0');");
E_D("replace into `wp_terms` values('34','UML','uml','0');");
E_D("replace into `wp_terms` values('35','用例','%e7%94%a8%e4%be%8b','0');");
E_D("replace into `wp_terms` values('37','学习','%e5%ad%a6%e4%b9%a0','0');");
E_D("replace into `wp_terms` values('38','方法','%e6%96%b9%e6%b3%95','0');");
E_D("replace into `wp_terms` values('39','测试','%e6%b5%8b%e8%af%95','0');");
E_D("replace into `wp_terms` values('40','数据结构','%e6%95%b0%e6%8d%ae%e7%bb%93%e6%9e%84','0');");
E_D("replace into `wp_terms` values('41','时间管理','timemanagement','0');");
E_D("replace into `wp_terms` values('42','爱情','%e7%88%b1%e6%83%85','0');");
E_D("replace into `wp_terms` values('43','影像','%e5%bd%b1%e5%83%8f','0');");
E_D("replace into `wp_terms` values('44','回忆','%e5%9b%9e%e5%bf%86','0');");
E_D("replace into `wp_terms` values('45','阅读感悟','reading','0');");
E_D("replace into `wp_terms` values('46','书籍','%e4%b9%a6%e7%b1%8d','0');");
E_D("replace into `wp_terms` values('47','工作','%e5%b7%a5%e4%bd%9c','0');");
E_D("replace into `wp_terms` values('48','后来','%e5%90%8e%e6%9d%a5','0');");
E_D("replace into `wp_terms` values('49','吉光片羽','%e5%90%89%e5%85%89%e7%89%87%e7%be%bd','0');");
E_D("replace into `wp_terms` values('50','昨日少年昨日事','%e6%98%a8%e6%97%a5%e5%b0%91%e5%b9%b4%e6%98%a8%e6%97%a5%e4%ba%8b','0');");

require("../../inc/footer.php");
?>