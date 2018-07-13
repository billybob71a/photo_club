<?php
/**
 * The Header for our theme.
 *
 * @package Ultimate Blogger
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','ultimate-blogger'); ?></a></div>
<div id="header">
  <div class="top_headbar">
    <div class="container">
      <div class="row">
        <div class="logo_bar col-md-3">
          <div class="logo wow bounceInDown">
            <?php if( has_custom_logo() ){ multipurpose_blog_the_custom_logo();
               }else{ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
              <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?> 
                <p class="site-description"><?php echo esc_html($description); ?></p>       
            <?php endif; }?>
          </div>
          <div class="clear"></div>
        </div>
        <div class="col-md-6 menus">
          <div class="menubox header">
            <div class="nav">
             <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-3 socialbox">
          <?php if( get_theme_mod( 'multipurpose_blog_cont_facebook','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'multipurpose_blog_cont_facebook','https://www.facebook.com/' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'multipurpose_blog_cont_twitter','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'multipurpose_blog_cont_twitter','https://twitter.com/' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'multipurpose_blog_google_plus','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'multipurpose_blog_google_plus','https://plus.google.com/' ) ); ?>"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'multipurpose_blog_pinterest','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'multipurpose_blog_pinterest','https://www.pinterest.com/' ) ); ?>"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'multipurpose_blog_tumblr','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'multipurpose_blog_tumblr','https://www.tumblr.com/' ) ); ?>"><i class="fab fa-tumblr" aria-hidden="true"></i></a>
          <?php } ?>         
        <div class="contact">
          <?php if( get_theme_mod( 'multipurpose_blog_contact','' ) != '') { ?>
            <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('multipurpose_blog_contact',__('(518) 356-5373','ultimate-blogger') )); ?></span>
          <?php } ?>
          <?php if( get_theme_mod( 'multipurpose_blog_email','' ) != '') { ?>
            <span class="email"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('multipurpose_blog_email',__('support@vwthemes.com','ultimate-blogger')) ); ?></span>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div><?php /** header **/ ?>