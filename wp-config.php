<?php
$services_json = json_decode(getenv("VCAP_SERVICES"),true);
$mysql_config = $services_json["mysql-5.1"][0]["credentials"];
/**
 * WordPress 基础配置文件。
 *
 * 本文件包含以下配置选项: MySQL 设置、数据库表名前缀、
 * 密匙、WordPress 语言设定以及 ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/Editing_wp-config.php 编辑
 * wp-config.php} Codex 页面。MySQL 设置具体信息请咨询您的空间提供商。
 *
 * 这个文件用在于安装程序自动生成 wp-config.php 配置文件，
 * 您可以手动复制这个文件，并重命名为 wp-config.php，然后输入相关信息。
 *
 * @package WordPress
 */
define('WP_MEMORY_LIMIT', '512M');


// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress 数据库的名称 */
define('DB_NAME', 'qdm206883164_db');

/** MySQL 数据库用户名 */

/** MySQL 数据库密码 */
define('DB_PASSWORD','Passw0rd');

/** MySQL 主机 */
define('DB_HOST', 'qdm206883164.my3w.com:3306');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份密匙设定。
 *
 * 您可以随意写一些字符
 * 或者直接访问 {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org 私钥生成服务}，
 * 任何修改都会导致 cookie 失效，所有用户必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/K:N,x>wj9O_rcm(]E||4k&^VN~9QYAWR:0LU487:|%znYM4OYIee)|rn6:?]]= ');
define('SECURE_AUTH_KEY',  '%kH:])) 8MmKw%3{xq@:$C:[<23DALUO)~8f>J3X1owQ55L:+Jvkgy{+<,r-gSO;');
define('LOGGED_IN_KEY',    'CVAq(4+BNii<e36F=:3+pM|<v2gIA%6+gsXTZXhKtcMd0$F9&l^0|kw;>SwLLo#y');
define('NONCE_KEY',        'j!&+2-qesWm>%yfy+%C.gh9|J0`(dGuv5umgNvx2-nXvL5;1|VBDfY`;jo(In~J$');
define('AUTH_SALT',        'N81<k*uKkMtPvsLz9OK^cagd_4xHPO{(Ou6O|-v!:]:0w|[$VL/9Lkq16&]Ir{L]');
define('SECURE_AUTH_SALT', 'C3=+qad-a2X)jFL=+_1D_K#}K{1%I;|N U&!Gq,$Qr0!>7?NN2ZCeB+CUl.t%rZ:');
define('LOGGED_IN_SALT',   'td)JnlE^g_YaFgvHjjm^.`Bml-Np}#HUdX2eVp8fmU[>Q1k}mAKCsjd`w}|1Pgp$');
define('NONCE_SALT',       '*g=R60!<y%GxEC8%4&qUEX7(XGsK rn_`VTZZ4FO$?MEbH@DIO32v[vCV-e%{ino');

/**#@-*/

/**
 * WordPress 数据表前缀。
 *
 * 如果您有在同一数据库内安装多个 WordPress 的需求，请为每个 WordPress 设置不同的数据表前缀。
 * 前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * WordPress 语言设置，默认为英语。
 *
 * 本项设定能够让 WordPress 显示您需要的语言。
 * wp-content/languages 内应放置同名的 .mo 语言文件。
 * 要使用 WordPress 简体中文界面，只需填入 zh_CN。
 */
define ('WPLANG', 'zh_CN');

/**
 * 开发者专用：WordPress 调试模式。
 *
 * 将这个值改为“true”，WordPress 将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用本功能。
 */
define('WP_DEBUG', false);

/* 好了！请不要再继续编辑。请保存该文件。使用愉快！ */

/** WordPress 目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置 WordPress 变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
