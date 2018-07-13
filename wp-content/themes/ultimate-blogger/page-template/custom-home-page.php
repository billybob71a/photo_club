<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<?php /** slider section **/ ?>
<div class="slider-main">
  <?php
    // Get pages set in the customizer (if any)
    $pages = array();
    for ( $count = 1; $count <= 5; $count++ ) {
      $mod = absint( get_theme_mod( 'multipurpose_blog_slidersettings-page-' . $count ) );
      if ( 'page-none-selected' != $mod ) {
        $pages[] = $mod;
      }
    }
    
    if( !empty($pages) ) :
      $args = array(
        'posts_per_page' => 5,
        'post_type' => 'page',
        'post__in' => $pages,
        'orderby' => 'post__in'
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        $count = 1;
        ?>
        <div id="slider" class="nivoSlider">
          <?php
            $multipurpose_blog_n = 0;
          while ( $query->have_posts() ) : $query->the_post();
              
              $multipurpose_blog_n++;
              $multipurpose_blog_slideno[] = $multipurpose_blog_n;
              $multipurpose_blog_slidetitle[] = get_the_title();
              $multipurpose_blog_slidelink[] = esc_url( get_permalink() );
              ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $multipurpose_blog_n ); ?>" />
              <?php
            $count++;
          endwhile;
          ?>
        </div>

        <?php
        $multipurpose_blog_k = 0;
          foreach( $multipurpose_blog_slideno as $multipurpose_blog_sln ){ ?>
            <div id="slidecaption<?php echo esc_attr( $multipurpose_blog_sln ); ?>" class="nivo-html-caption">
              <div class="slide-cap  ">
                <div class="container">
                  <h2><?php echo esc_html( $multipurpose_blog_slidetitle[$multipurpose_blog_k] ); ?></h2>
                  <a class="read-more" href="<?php echo esc_url( $multipurpose_blog_slidelink[$multipurpose_blog_k] ); ?>"><?php esc_html_e( 'Learn More','ultimate-blogger' ); ?></a>
                </div>
              </div>
            </div>
            <?php $multipurpose_blog_k++;
        }
        wp_reset_postdata();
      else : ?>
          <div class="header-no-slider"></div>
        <?php
      endif;
    else : ?>
        <div class="header-no-slider"></div>
    <?php
    endif; 
  ?>
</div>

<?php /** Category section **/ ?>
<section id="photography" class="darkbox" >
  <div class="row margin-remove">
    <?php 
      $page_query = new WP_Query(array( 'category_name' => get_theme_mod('multipurpose_blog_photo_setting','theblog')));?>
      <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
        <div class="col-md-3 col-sm-3 padremove"> 
          <div class="imagebox">
            <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
          </div>
          <div class="contentbox">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <p><?php the_excerpt(); ?></p>
          </div>
        </div>
        <?php endwhile; 
        wp_reset_postdata();
    ?>
  </div>
  <div class="clearfix"></div>
</section>

<?php /** Category section **/ ?>
<div id="our_blog">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8">
        <div class="row">
          <?php 
            $page_query = new WP_Query(array( 'category_name' => get_theme_mod('ultimate_blogger_our_category','theblog')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="col-md-6 col-sm-6">
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
              </div>
              <?php endwhile; 
              wp_reset_postdata();
          ?>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div id="sidebar"><?php dynamic_sidebar('home'); ?></div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>