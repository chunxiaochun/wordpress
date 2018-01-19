<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8mb4');
E_D("DROP TABLE IF EXISTS `wp_term_taxonomy`;");
E_C("CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
E_D("replace into `wp_term_taxonomy` values('1','1','category','','0','21');");
E_D("replace into `wp_term_taxonomy` values('2','2','link_category','','0','12');");
E_D("replace into `wp_term_taxonomy` values('3','3','category','','0','23');");
E_D("replace into `wp_term_taxonomy` values('4','4','category','','0','62');");
E_D("replace into `wp_term_taxonomy` values('6','6','link_category','','0','0');");
E_D("replace into `wp_term_taxonomy` values('7','7','post_tag','','0','10');");
E_D("replace into `wp_term_taxonomy` values('8','8','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('9','9','post_tag','','0','2');");
E_D("replace into `wp_term_taxonomy` values('10','10','post_tag','','0','2');");
E_D("replace into `wp_term_taxonomy` values('13','13','post_tag','','0','3');");
E_D("replace into `wp_term_taxonomy` values('16','16','post_tag','','0','6');");
E_D("replace into `wp_term_taxonomy` values('17','17','post_tag','','0','2');");
E_D("replace into `wp_term_taxonomy` values('18','18','post_tag','','0','8');");
E_D("replace into `wp_term_taxonomy` values('19','19','post_tag','','0','7');");
E_D("replace into `wp_term_taxonomy` values('20','20','post_tag','','0','2');");
E_D("replace into `wp_term_taxonomy` values('21','21','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('22','22','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('23','23','post_tag','','0','3');");
E_D("replace into `wp_term_taxonomy` values('24','24','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('25','25','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('26','26','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('27','27','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('28','28','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('29','29','post_tag','','0','5');");
E_D("replace into `wp_term_taxonomy` values('30','30','post_tag','','0','2');");
E_D("replace into `wp_term_taxonomy` values('31','31','post_tag','','0','2');");
E_D("replace into `wp_term_taxonomy` values('32','32','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('33','33','post_tag','','0','2');");
E_D("replace into `wp_term_taxonomy` values('34','34','post_tag','','0','2');");
E_D("replace into `wp_term_taxonomy` values('35','35','post_tag','','0','2');");
E_D("replace into `wp_term_taxonomy` values('37','37','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('38','38','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('39','39','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('40','40','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('41','41','category','','0','2');");
E_D("replace into `wp_term_taxonomy` values('42','42','post_tag','','0','2');");
E_D("replace into `wp_term_taxonomy` values('43','43','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('44','44','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('45','45','category','','0','14');");
E_D("replace into `wp_term_taxonomy` values('46','46','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('47','47','post_tag','','0','1');");
E_D("replace into `wp_term_taxonomy` values('48','48','post_tag','','0','3');");
E_D("replace into `wp_term_taxonomy` values('49','49','post_tag','','0','3');");
E_D("replace into `wp_term_taxonomy` values('50','50','post_tag','','0','3');");

require("../../inc/footer.php");
?>