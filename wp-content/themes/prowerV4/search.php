<?php get_header(); ?>
	<div id="main">
		<h1><?php _e("Search"); ?>: <?php the_search_query(); ?></h1>
		<ul id="post_list" class="search_list">
			<?php while ( have_posts() ) : the_post(); ?>
			<li <?php post_class(); ?>>
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<div class="meta"><?php the_time('Y-m-d'); ?> | <?php _e("Author:"); ?><?php the_author(); ?> | <?php _e("Categories:"); ?><?php the_category('、') ?> | <?php _e("Tags:"); ?><?php the_tags(__(' '), '、'); ?></div>
			</li>
			<?php endwhile; ?>
		</ul>
		<div class="navigation">
			<span class="alignleft"><?php previous_posts_link(__('&laquo; Previous Page')) ?></span>
			<span class="alignright"><?php next_posts_link(__('Next Page &raquo;')) ?></span>
		</div>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>