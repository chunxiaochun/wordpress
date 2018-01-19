<!DOCTYPE html>
<html>
<head profile="http://gmpg.org/xfn/11">
	<meta charset="<?php bloginfo( 'charset' ); ?>" /> 
	<title><?php if (is_home () ) { bloginfo('name'); } elseif ( is_category() ) { single_cat_title();
	echo " - "; bloginfo('name'); } elseif (is_single() || is_page() ) { single_post_title(); echo " - "; bloginfo('name'); }
	elseif (is_search() ) { bloginfo('name'); echo "search results:"; echo
	wp_specialchars($s); } else { wp_title('',true); } ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php 
		if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		wp_head();
	?>
</head>

<body>
<div id="wrap">
	<div id="header">
		<div id="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>
		<?php wp_nav_menu( array('menu' => 'header-menu', 'menu_class' => 'menu' )); ?>
	</div>
	<div id="descr">
		<ul>
			<li><a id="rss_icon" href="https://plus.google.com/115277884508074505636/about?
   rel=author">about me</a></li>
		</ul>
		<?php bloginfo('description'); ?>
	</div>
	<div id="content">