<?php
/**
 * Template Name:Page with Left Sidebar
 */

get_header(); ?>

<?php do_action( 'multipurpose_blog_header_pageleft' ); ?>

<div class="container">
    <div class="middle-align">
        <div class="row">
    		<div id="sidebar" class="col-md-4">
    			<?php dynamic_sidebar('sidebar-2'); ?>
    		</div>		 
    		<div class="col-md-8" id="content-blog" >
    			<?php while ( have_posts() ) : the_post(); ?>
                    <img src="<?php the_post_thumbnail_url(); ?>">
                    <h1><?php the_title();?></h1>
                    <?php the_content();
                    
                    //If comments are open or we have at least one comment, load up the comment template
                    	if ( comments_open() || '0' != get_comments_number() )
                        	comments_template();
                    ?>
                <?php endwhile; // end of the loop. ?>
            </div>
            <div class="clear"></div>    
        </div>
    </div>
</div>

<?php do_action( 'multipurpose_blog_footer_pageleft' ); ?>

<?php get_footer(); ?>