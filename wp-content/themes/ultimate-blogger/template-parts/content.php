<?php
/**
 * The template part for displaying slider
 *
 * @package Ultimate Blogger
 * @subpackage ultimate_blogger
 * @since 1.0
 */
?>
<div class="main-box">
  <div class="cat-box">
    <?php foreach((get_the_category()) as $category) { echo esc_html($category->cat_name) . ' '; } ?>           
  </div>
  <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
  <div class="date-box"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></div>
  <div class="main_image">
    <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
  </div>
  <p><?php the_excerpt(); ?></p>
  <div class="blogbtn">
    <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Continue Reading', 'ultimate-blogger' ); ?>"><?php esc_html_e('Read Full','ultimate-blogger'); ?></a>
  </div>
</div>