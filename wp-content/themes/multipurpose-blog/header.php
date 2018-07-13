<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package multipurpose blog
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
<div id="header">
  <div class="top_headbar row">
    <div class="top-contact col-md-3 col-xs-12 col-sm-4">
      <?php if( get_theme_mod( 'multipurpose_blog_contact','' ) != '') { ?>
        <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('multipurpose_blog_contact',__('+14 256 265 2589','multipurpose-blog') )); ?></span>
       <?php } ?>
    </div>   
    <div class="top-contact col-md-3 col-xs-12 col-sm-4">
      <?php if( get_theme_mod( 'multipurpose_blog_email','' ) != '') { ?>
        <span class="email"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('multipurpose_blog_email',__('example@123.com','multipurpose-blog')) ); ?></span>
      <?php } ?>
    </div>
    <div class="col-md-6 socialbox">
      <?php if( get_theme_mod( 'multipurpose_blog_cont_facebook','' ) != '') { ?>
        <a href="<?php echo esc_url( get_theme_mod( 'multipurpose_blog_cont_facebook','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
      <?php } ?>
      <?php if( get_theme_mod( 'multipurpose_blog_cont_twitter','' ) != '') { ?>
        <a href="<?php echo esc_url( get_theme_mod( 'multipurpose_blog_cont_twitter','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a>
      <?php } ?>
      <?php if( get_theme_mod( 'multipurpose_blog_google_plus','' ) != '') { ?>
        <a href="<?php echo esc_url( get_theme_mod( 'multipurpose_blog_google_plus','' ) ); ?>"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a>
      <?php } ?>
      <?php if( get_theme_mod( 'multipurpose_blog_pinterest','' ) != '') { ?>
        <a href="<?php echo esc_url( get_theme_mod( 'multipurpose_blog_pinterest','' ) ); ?>"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
      <?php } ?>
      <?php if( get_theme_mod( 'multipurpose_blog_tumblr','' ) != '') { ?>
        <a href="<?php echo esc_url( get_theme_mod( 'multipurpose_blog_tumblr','' ) ); ?>"><i class="fab fa-tumblr" aria-hidden="true"></i></a>
      <?php } ?>
    </div>
    <div class="clearfix"></div>  
  </div>

  <div class="logo_bar">
    <div class="logo">
      <?php if( has_custom_logo() ){ multipurpose_blog_the_custom_logo();
         }else{ ?>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?> 
          <p class="site-description"><?php echo esc_html($description); ?></p>       
      <?php endif; }?>       
    </div>
  </div>
  <div class="container">
    <div class="menus"> 
      <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','multipurpose-blog'); ?></a></div>     
      <div class="menubox header">
        <div class="nav">
         <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</div>