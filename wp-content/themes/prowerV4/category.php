<?php get_header(); ?>
	<div id="main">
		<ul id="post_list">
			<?php while ( have_posts() ) : the_post(); ?>
			<li <?php post_class(); ?>>
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<div class="meta"><?php the_time('Y-m-d'); ?></div>
				<div class="excerpt">
					<?php if (has_post_thumbnail()) { ?>
						<div class="thumbnail"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a></div>
					<?php } ?>
					<?php the_content(__('Read More &raquo;')); ?>
					<div class="meta"><?php _e("Author:"); ?><?php the_author(); ?> | <?php _e("Categories:"); ?><?php the_category('、') ?> | <?php _e("Tags:"); ?><?php the_tags(__(' '), '、'); ?></div>
					<div class="comments_num"><?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments')); ?></div>
				</div>
			</li>
			<?php endwhile; ?>
		</ul>
		<div class="navigation">
			<span class="alignleft"><?php previous_posts_link(__('&laquo; Previous Page')) ?></span>
			<span class="alignright"><?php next_posts_link(__('Next Page &raquo;')) ?></span>
		</div>
	</div>
	<?php get_sidebar('category'); ?>
<?php get_footer(); ?>