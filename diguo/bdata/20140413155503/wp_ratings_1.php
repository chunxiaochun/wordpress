<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `wp_ratings`;");
E_C("CREATE TABLE `wp_ratings` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `rating_postid` int(11) NOT NULL,
  `rating_posttitle` text NOT NULL,
  `rating_rating` int(2) NOT NULL,
  `rating_timestamp` varchar(15) NOT NULL,
  `rating_ip` varchar(40) NOT NULL,
  `rating_host` varchar(200) NOT NULL,
  `rating_username` varchar(50) NOT NULL,
  `rating_userid` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rating_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>