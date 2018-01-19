<?php get_header(); ?>
	<div id="main">
		<ul id="post_list">
			<?php while ( have_posts() ) : the_post(); ?>
			<li <?php post_class(); ?>>
				<?php if ( is_sticky() ) : ?>
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<div class="meta"><?php the_time('Y-m-d'); ?></div>
					<div class="excerpt">
						<?php if (has_post_thumbnail()) { ?>
							<div class="thumbnail"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a></div>
						<?php } ?>
						<?php the_content(__('阅读全文 &raquo;')); ?>
<div >
<script type="text/javascript"><!--
google_ad_client = "ca-pub-5087082544666994";
/* 广告3 */
google_ad_slot = "1037161173";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
						<div class="meta"><?php _e("Author:"); ?><?php the_author(); ?> | <?php _e("Categories:"); ?><?php the_category('、') ?> | <?php _e("Tags:"); ?><?php the_tags(__(' '), '、'); ?></div>
						<div class="comments_num"><?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments')); ?></div>
					</div>
				<?php else : ?>
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<div class="meta"><?php the_time('Y-m-d'); ?></div>
					<div class="excerpt">
						<?php if (has_post_thumbnail()) { ?>
							<div class="thumbnail"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a></div>
						<?php } ?>
						<?php the_content(__('阅读全文 &raquo;')); ?>
						<div class="meta"><?php _e("Author:"); ?><?php the_author(); ?> | <?php _e("Categories:"); ?><?php the_category('、') ?> | <?php _e("Tags:"); ?><?php the_tags(__(' '), '、'); ?></div>
						<div class="comments_num"><?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments')); ?></div>
					</div>
				<?php endif; ?>
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