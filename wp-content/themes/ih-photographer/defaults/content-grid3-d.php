<?php
/**
 * @package IH Photography
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4 col-sm-6 col-xs-12 grid3'); ?>>
	<div class="artgrid">
		<div class="featured-thumb col-md-12">
				<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img src="<?php echo get_template_directory_uri()."/defaults/images/dimg".mt_rand(1,6).".jpg"; ?>"></a>
		</div><!--.featured-thumb-->
			
		<div class="out-thumb col-md-12">
			<div class="out-content">
				<header class="entry-header row">
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo (strlen(get_the_title()) > 90 ? substr(get_the_title(),0,90)."..." : get_the_title() ); ?></a></h1>
					<span class="viewpost"><a href="<?php the_permalink() ?>"><?php _e('View','ih-photographer') ?></a></span>
				</header><!-- .entry-header -->
			</div>
		</div><!--.out-thumb-->		
	</div>		
</article><!-- #post-## -->