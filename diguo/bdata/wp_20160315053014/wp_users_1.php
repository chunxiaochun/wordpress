<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8mb4');
E_D("DROP TABLE IF EXISTS `wp_users`;");
E_C("CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
E_D("replace into `wp_users` values('1','xiezezhun','\$P\$BYUdu0BfZqeBEkxIU69nvpzprZyCja.','xiezezhun','xiezezhun@qq.com','','2010-11-25 18:17:10','kfrqIHmMHNNb2XTBSKf3','0','xiezezhun');");
E_D("replace into `wp_users` values('29','yliexnce','\$P\$BTLibemWW5Q8b7R9JuuvocraMTF0pq1','yliexnce','lpupzlst@72w.com','','2013-06-27 13:53:24','','0','yliexnce');");

require("../../inc/footer.php");
?>