<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package multipurpose blog
 */

get_header(); ?>

<?php do_action( 'multipurpose_blog_header_page' ); ?>

<div id="content-blog" class="container">
    <div class="middle-align">
        <?php while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title();?></h1>
            <?php if(has_post_thumbnail()) { ?>
                <div class="feature-box">   
                    <img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
                </div>
            <?php } ?>
            <?php the_content();

            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'multipurpose-blog' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'multipurpose-blog' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );

            //If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                    comments_template();
            ?>
        <?php endwhile; // end of the loop. ?> 
        <div class="clear"></div>    
    </div>
</div>

<?php do_action( 'multipurpose_blog_footer_page' ); ?>

<?php get_footer(); ?>