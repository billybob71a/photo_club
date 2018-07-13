<?php
/**
 * The template part for displaying slider
 *
 * @package multipurpose blog 
 * @subpackage multipurpose_blog
 * @since 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>    
  <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>
  <div class="date-box"><i class="far fa-calendar-alt"></i><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></div>
  <div class="box-image">
    <?php
        if ( ! is_single() ) {

          // If not a single post, highlight the gallery.
          if ( get_post_gallery() ) {
            echo '<div class="entry-gallery">';
              echo ( get_post_gallery() );
            echo '</div>';
          };

        };
      ?>
  </div>
  <div class="new-text">
    <?php the_excerpt();?>
  </div>  
  <div class="cat-box">
    <i class="fas fa-folder-open"></i><?php foreach((get_the_category()) as $category) { echo esc_html($category->cat_name) . ' '; } ?>
  </div>
  <div class="clearfix"></div>
</div>