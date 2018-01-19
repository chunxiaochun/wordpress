<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8mb4');
E_D("DROP TABLE IF EXISTS `wp_usermeta`;");
E_C("CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM AUTO_INCREMENT=383 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
E_D("replace into `wp_usermeta` values('1','1','first_name','');");
E_D("replace into `wp_usermeta` values('2','1','last_name','');");
E_D("replace into `wp_usermeta` values('3','1','nickname','xiezezhun');");
E_D("replace into `wp_usermeta` values('4','1','description','');");
E_D("replace into `wp_usermeta` values('5','1','rich_editing','true');");
E_D("replace into `wp_usermeta` values('6','1','comment_shortcuts','false');");
E_D("replace into `wp_usermeta` values('7','1','admin_color','fresh');");
E_D("replace into `wp_usermeta` values('8','1','use_ssl','0');");
E_D("replace into `wp_usermeta` values('9','1','aim','');");
E_D("replace into `wp_usermeta` values('10','1','yim','');");
E_D("replace into `wp_usermeta` values('11','1','jabber','');");
E_D("replace into `wp_usermeta` values('12','1','wp_capabilities','a:1:{s:13:\"administrator\";s:1:\"1\";}');");
E_D("replace into `wp_usermeta` values('13','1','wp_user_level','10');");
E_D("replace into `wp_usermeta` values('14','1','wp_user-settings','m5=o&m7=o&m8=o&m9=o&editor=html&m6=o&m1=o&m4=o&hidetb=1&m0=o&m11=o&m3=o&imgsize=full&m2=o&align=center&mfold=o&ed_size=533&libraryContent=browse');");
E_D("replace into `wp_usermeta` values('15','1','wp_user-settings-time','1381127598');");
E_D("replace into `wp_usermeta` values('16','1','wp_dashboard_quick_press_last_post_id','871');");
E_D("replace into `wp_usermeta` values('17','1','managenav-menuscolumnshidden','a:4:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";}');");
E_D("replace into `wp_usermeta` values('18','1','metaboxhidden_nav-menus','a:2:{i:0;s:8:\"add-post\";i:1;s:12:\"add-post_tag\";}');");
E_D("replace into `wp_usermeta` values('20','1','meta-box-order_post','a:3:{s:4:\"side\";s:65:\"gdsr-meta-box,submitdiv,categorydiv,tagsdiv-post_tag,postimagediv\";s:6:\"normal\";s:71:\"postexcerpt,trackbacksdiv,postcustom,commentstatusdiv,slugdiv,authordiv\";s:8:\"advanced\";s:23:\"aiosp,gdsr-meta-box-mur\";}');");
E_D("replace into `wp_usermeta` values('21','1','screen_layout_post','2');");
E_D("replace into `wp_usermeta` values('22','1','closedpostboxes_dashboard','a:4:{i:0;s:17:\"dashboard_plugins\";i:1;s:19:\"dashboard_secondary\";i:2;s:17:\"dashboard_primary\";i:3;s:24:\"dashboard_incoming_links\";}');");
E_D("replace into `wp_usermeta` values('23','1','metaboxhidden_dashboard','a:0:{}');");
E_D("replace into `wp_usermeta` values('24','1','meta-box-order_dashboard','a:4:{s:6:\"normal\";s:154:\"dashboard_right_now,dashboard_recent_drafts,dashboard_gdstarrating_latest,dashboard_plugins,dashboard_secondary,dashboard_primary,dashboard_incoming_links\";s:4:\"side\";s:47:\"dashboard_quick_press,dashboard_recent_comments\";s:7:\"column3\";s:0:\"\";s:7:\"column4\";s:0:\"\";}');");
E_D("replace into `wp_usermeta` values('25','1','screen_layout_dashboard','2');");
E_D("replace into `wp_usermeta` values('26','1','dismissed_wp_pointers','wp330_toolbar,wp330_media_uploader,wp340_customize_current_theme_link,wp350_media,aioseop_menu_202,aioseop_welcome_202,aioseop_menu_203,aioseop_menu_211,aioseop_menu_220');");
E_D("replace into `wp_usermeta` values('27','1','show_admin_bar_front','true');");
E_D("replace into `wp_usermeta` values('40','1','closedpostboxes_post','a:0:{}');");
E_D("replace into `wp_usermeta` values('41','1','metaboxhidden_post','a:6:{i:0;s:11:\"postexcerpt\";i:1;s:13:\"trackbacksdiv\";i:2;s:10:\"postcustom\";i:3;s:16:\"commentstatusdiv\";i:4;s:7:\"slugdiv\";i:5;s:9:\"authordiv\";}');");
E_D("replace into `wp_usermeta` values('42','1','closedpostboxes_nav-menus','a:1:{i:0;s:8:\"add-page\";}');");
E_D("replace into `wp_usermeta` values('358','29','first_name','');");
E_D("replace into `wp_usermeta` values('359','29','last_name','');");
E_D("replace into `wp_usermeta` values('360','29','nickname','yliexnce');");
E_D("replace into `wp_usermeta` values('361','29','description','');");
E_D("replace into `wp_usermeta` values('362','29','rich_editing','true');");
E_D("replace into `wp_usermeta` values('363','29','comment_shortcuts','false');");
E_D("replace into `wp_usermeta` values('364','29','admin_color','fresh');");
E_D("replace into `wp_usermeta` values('365','29','use_ssl','0');");
E_D("replace into `wp_usermeta` values('366','29','show_admin_bar_front','true');");
E_D("replace into `wp_usermeta` values('367','29','wp_capabilities','a:1:{s:10:\"subscriber\";b:1;}');");
E_D("replace into `wp_usermeta` values('368','29','wp_user_level','0');");
E_D("replace into `wp_usermeta` values('369','29','default_password_nag','1');");
E_D("replace into `wp_usermeta` values('382','1','session_tokens','a:1:{s:64:\"a28ee98f19d36e85a7a23d547001bf42bd2867122c20838415965b70925542ca\";a:4:{s:10:\"expiration\";i:1459229919;s:2:\"ip\";s:10:\"127.5.40.1\";s:2:\"ua\";s:182:\"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36 AppEngine-Google; (+http://code.google.com/appengine; appid: s~xxnet-55)\";s:5:\"login\";i:1458020319;}}');");

require("../../inc/footer.php");
?>