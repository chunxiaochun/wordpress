<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `wp_commentmeta`;");
E_C("CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM AUTO_INCREMENT=2335 DEFAULT CHARSET=utf8");
E_D("replace into `wp_commentmeta` values('1','88','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('2','88','akismet_history','a:4:{s:4:\"time\";s:13:\"1293780762.78\";s:7:\"message\";s:28:\"Akismet cleared this comment\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('4','88','akismet_history','a:4:{s:4:\"time\";s:13:\"1293935422.85\";s:7:\"message\";s:48:\"xiezezhun changed the comment status to approved\";s:5:\"event\";s:15:\"status-approved\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('5','89','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('6','89','akismet_history','a:4:{s:4:\"time\";s:13:\"1303545886.88\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('8','89','akismet_history','a:4:{s:4:\"time\";s:13:\"1303566020.04\";s:7:\"message\";s:40:\"xiezezhun 将评论状态改为 approved\";s:5:\"event\";s:15:\"status-approved\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('12','91','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('13','91','akismet_history','a:4:{s:4:\"time\";s:13:\"1303572867.87\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('18','92','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('19','92','akismet_history','a:4:{s:4:\"time\";s:13:\"1303614576.24\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('21','92','akismet_history','a:4:{s:4:\"time\";s:13:\"1303629072.96\";s:7:\"message\";s:40:\"xiezezhun 将评论状态改为 approved\";s:5:\"event\";s:15:\"status-approved\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('28','95','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('29','95','akismet_history','a:4:{s:4:\"time\";s:13:\"1305537079.95\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('31','96','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('32','96','akismet_history','a:4:{s:4:\"time\";s:13:\"1305537625.14\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('34','97','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('35','97','akismet_history','a:4:{s:4:\"time\";s:13:\"1305538701.59\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('37','97','akismet_history','a:4:{s:4:\"time\";s:13:\"1305652348.15\";s:7:\"message\";s:40:\"xiezezhun 将评论状态改为 approved\";s:5:\"event\";s:15:\"status-approved\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('38','95','akismet_history','a:4:{s:4:\"time\";s:13:\"1305652351.52\";s:7:\"message\";s:40:\"xiezezhun 将评论状态改为 approved\";s:5:\"event\";s:15:\"status-approved\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('39','96','akismet_history','a:4:{s:4:\"time\";s:13:\"1305652352.94\";s:7:\"message\";s:40:\"xiezezhun 将评论状态改为 approved\";s:5:\"event\";s:15:\"status-approved\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('40','98','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('41','98','akismet_history','a:4:{s:4:\"time\";s:13:\"1305695416.05\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('60','102','akismet_result','true');");
E_D("replace into `wp_commentmeta` values('61','102','akismet_history','a:4:{s:4:\"time\";s:13:\"1311986497.12\";s:7:\"message\";s:32:\"Akismet 认为这是垃圾评论\";s:5:\"event\";s:10:\"check-spam\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('63','102','akismet_history','a:4:{s:4:\"time\";s:13:\"1312022580.22\";s:7:\"message\";s:37:\"xiezezhun 认定这不是垃圾评论\";s:5:\"event\";s:10:\"report-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('64','102','akismet_user_result','false');");
E_D("replace into `wp_commentmeta` values('65','102','akismet_user','xiezezhun');");
E_D("replace into `wp_commentmeta` values('69','102','akismet_history','a:4:{s:4:\"time\";s:13:\"1312024137.04\";s:7:\"message\";s:40:\"xiezezhun 将评论状态改为 approved\";s:5:\"event\";s:15:\"status-approved\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('73','105','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('74','105','akismet_history','a:4:{s:4:\"time\";s:13:\"1316586769.44\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('106','112','akismet_result','true');");
E_D("replace into `wp_commentmeta` values('107','112','akismet_history','a:4:{s:4:\"time\";s:13:\"1331742214.15\";s:7:\"message\";s:32:\"Akismet 认为这是垃圾评论\";s:5:\"event\";s:10:\"check-spam\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('109','112','akismet_history','a:4:{s:4:\"time\";s:13:\"1331784011.66\";s:7:\"message\";s:37:\"xiezezhun 认定这不是垃圾评论\";s:5:\"event\";s:10:\"report-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('110','112','akismet_user_result','false');");
E_D("replace into `wp_commentmeta` values('111','112','akismet_user','xiezezhun');");
E_D("replace into `wp_commentmeta` values('142','117','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('143','117','akismet_history','a:4:{s:4:\"time\";s:13:\"1331896891.11\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('148','119','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('149','119','akismet_history','a:4:{s:4:\"time\";s:13:\"1331946689.94\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('154','121','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('155','121','akismet_history','a:4:{s:4:\"time\";s:13:\"1332040220.86\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('157','122','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('158','122','akismet_history','a:4:{s:4:\"time\";s:13:\"1332041291.24\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('160','123','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('161','123','akismet_history','a:4:{s:4:\"time\";s:12:\"1332153035.4\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('200','130','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('201','130','akismet_history','a:4:{s:4:\"time\";s:13:\"1332168666.08\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('203','131','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('204','131','akismet_history','a:4:{s:4:\"time\";s:13:\"1332168724.86\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('233','141','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('234','141','akismet_history','a:4:{s:4:\"time\";s:13:\"1333946871.87\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('236','142','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('237','142','akismet_history','a:4:{s:4:\"time\";s:13:\"1333947357.28\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('239','143','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('240','143','akismet_history','a:4:{s:4:\"time\";s:13:\"1334024875.59\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('242','144','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('243','144','akismet_history','a:4:{s:4:\"time\";s:13:\"1334027278.63\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('245','145','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('246','145','akismet_history','a:4:{s:4:\"time\";s:13:\"1334027338.16\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('251','147','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('252','147','akismet_history','a:4:{s:4:\"time\";s:13:\"1334652382.59\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('276','153','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('277','153','akismet_history','a:4:{s:4:\"time\";s:13:\"1339086930.82\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('760','158','akismet_history','a:4:{s:4:\"time\";s:14:\"1341066864.155\";s:7:\"message\";s:74:\"Akismet 无法复查此条评论（回应：），将尽快自动重试。\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('870','158','akismet_history','a:4:{s:4:\"time\";s:15:\"1341616712.3389\";s:7:\"message\";s:59:\"Akismet 经自动重试后，认定它不是垃圾评论。\";s:5:\"event\";s:10:\"cron-retry\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('888','163','akismet_user_result','false');");
E_D("replace into `wp_commentmeta` values('889','163','akismet_user','xiezezhun');");
E_D("replace into `wp_commentmeta` values('890','163','akismet_history','a:4:{s:4:\"time\";s:15:\"1342860542.6347\";s:7:\"message\";s:40:\"xiezezhun 将评论状态改为 approved\";s:5:\"event\";s:15:\"status-approved\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('873','159','akismet_history','a:4:{s:4:\"time\";s:15:\"1341616712.5149\";s:7:\"message\";s:59:\"Akismet 经自动重试后，认定它不是垃圾评论。\";s:5:\"event\";s:10:\"cron-retry\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('763','159','akismet_history','a:4:{s:4:\"time\";s:15:\"1341067083.2647\";s:7:\"message\";s:74:\"Akismet 无法复查此条评论（回应：），将尽快自动重试。\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('884','163','akismet_result','true');");
E_D("replace into `wp_commentmeta` values('885','163','akismet_history','a:4:{s:4:\"time\";s:15:\"1342844106.1666\";s:7:\"message\";s:32:\"Akismet 认为这是垃圾评论\";s:5:\"event\";s:10:\"check-spam\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('887','163','akismet_history','a:4:{s:4:\"time\";s:15:\"1342860489.3534\";s:7:\"message\";s:37:\"xiezezhun 认定这不是垃圾评论\";s:5:\"event\";s:10:\"report-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('869','158','akismet_rechecking','1');");
E_D("replace into `wp_commentmeta` values('871','158','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('872','159','akismet_rechecking','1');");
E_D("replace into `wp_commentmeta` values('874','159','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1027','177','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1028','177','akismet_history','a:4:{s:4:\"time\";s:15:\"1347863893.9783\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('1045','183','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1030','178','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1031','178','akismet_history','a:4:{s:4:\"time\";s:15:\"1348468277.4208\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1046','183','akismet_history','a:4:{s:4:\"time\";s:15:\"1349441124.3349\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('1024','176','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1025','176','akismet_history','a:4:{s:4:\"time\";s:15:\"1347553215.6126\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1071','189','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1072','189','akismet_history','a:4:{s:4:\"time\";s:15:\"1350565236.7273\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1596','366','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1597','366','akismet_history','a:4:{s:4:\"time\";s:15:\"1359678381.6196\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('1738','408','akismet_history','a:4:{s:4:\"time\";d:1364957168.150281;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('1737','408','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1668','389','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1669','389','akismet_history','a:4:{s:4:\"time\";s:15:\"1363333951.8583\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1671','390','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1672','390','akismet_history','a:4:{s:4:\"time\";s:15:\"1363334015.7809\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1710','403','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1711','403','akismet_history','a:4:{s:4:\"time\";d:1364899977.5766821;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1764','416','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1765','416','akismet_history','a:4:{s:4:\"time\";d:1366250865.7244861;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1722','407','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1723','407','akismet_history','a:4:{s:4:\"time\";d:1364957036.6584909;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('1566','356','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1567','356','akismet_history','a:4:{s:4:\"time\";s:15:\"1359432172.7226\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1569','357','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1570','357','akismet_history','a:4:{s:4:\"time\";s:15:\"1359472616.6763\";s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1740','409','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1741','409','akismet_history','a:4:{s:4:\"time\";d:1365173010.315717;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1761','415','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1762','415','akismet_history','a:4:{s:4:\"time\";d:1365934416.6869991;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('1794','426','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1795','426','akismet_history','a:4:{s:4:\"time\";d:1371889705.6295829;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1800','428','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1801','428','akismet_history','a:4:{s:4:\"time\";d:1372316141.246393;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1844','442','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1845','442','akismet_history','a:4:{s:4:\"time\";d:1375412249.438885;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1809','428','akismet_history','a:4:{s:4:\"time\";d:1372767833.6369519;s:7:\"message\";s:42:\"xiezezhun 将评论状态改为 unapproved\";s:5:\"event\";s:17:\"status-unapproved\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('1810','428','akismet_history','a:4:{s:4:\"time\";d:1372767845.068835;s:7:\"message\";s:40:\"xiezezhun 将评论状态改为 approved\";s:5:\"event\";s:15:\"status-approved\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('1811','431','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1812','431','akismet_history','a:4:{s:4:\"time\";d:1372767958.333967;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('1814','432','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1815','432','akismet_history','a:4:{s:4:\"time\";d:1372769031.1602471;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1847','443','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1848','443','akismet_history','a:4:{s:4:\"time\";d:1375412367.3056049;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:9:\"xiezezhun\";}');");
E_D("replace into `wp_commentmeta` values('1850','444','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1851','444','akismet_history','a:4:{s:4:\"time\";d:1375412753.676687;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1982','488','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1983','488','akismet_history','a:4:{s:4:\"time\";d:1377308176.510927;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1991','491','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1992','491','akismet_history','a:4:{s:4:\"time\";d:1378829202.928848;s:7:\"message\";s:31:\"Akismet检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('1994','492','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('1995','492','akismet_history','a:4:{s:4:\"time\";d:1379124103.6825299;s:7:\"message\";s:31:\"Akismet检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('2000','494','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('2001','494','akismet_history','a:4:{s:4:\"time\";d:1379204423.840328;s:7:\"message\";s:31:\"Akismet检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('2037','505','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('2038','505','akismet_history','a:4:{s:4:\"time\";d:1382186873.6887319;s:7:\"message\";s:31:\"Akismet检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");
E_D("replace into `wp_commentmeta` values('2323','587','akismet_result','false');");
E_D("replace into `wp_commentmeta` values('2324','587','akismet_history','a:4:{s:4:\"time\";d:1392790747.2908399;s:7:\"message\";s:32:\"Akismet 检查通过了此评论\";s:5:\"event\";s:9:\"check-ham\";s:4:\"user\";s:0:\"\";}');");

require("../../inc/footer.php");
?>