<?php
/**
 * multipurpose blog functions and definitions
 *
 * @package multipurpose blog
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'multipurpose_blog_setup' ) ) :

/* Theme Setup */
function multipurpose_blog_setup() {

	$GLOBALS['content_width'] = apply_filters( 'multipurpose_blog_content_width', 640 );
	
	load_theme_textdomain( 'multipurpose-blog', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('multipurpose-blog-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'multipurpose-blog' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', multipurpose_blog_font_url() ) );

}
endif; // multipurpose_blog_setup
add_action( 'after_setup_theme', 'multipurpose_blog_setup' );

/* Theme Widgets Setup */
function multipurpose_blog_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'multipurpose-blog' ),
		'description'   => __( 'Appears on posts and pages', 'multipurpose-blog' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'multipurpose-blog' ),
		'description'   => __( 'Appears on posts and pages', 'multipurpose-blog' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'multipurpose-blog' ),
		'description'   => __( 'Appears on posts and pages', 'multipurpose-blog' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'multipurpose-blog' ),
		'description'   => __( 'Appears on posts and pages', 'multipurpose-blog' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'multipurpose-blog' ),
		'description'   => __( 'Appears on posts and pages', 'multipurpose-blog' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'multipurpose-blog' ),
		'description'   => __( 'Appears on posts and pages', 'multipurpose-blog' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'multipurpose-blog' ),
		'description'   => __( 'Appears on posts and pages', 'multipurpose-blog' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'multipurpose_blog_widgets_init' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function multipurpose_blog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'multipurpose_blog_pingback_header' );

/* Theme Font URL */

function multipurpose_blog_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Open Sans';
	$font_family[] = 'Alex Brush';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Dancing Script';
	
	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}


/* Theme enqueue scripts */
function multipurpose_blog_scripts() {
	wp_enqueue_style( 'multipurpose-blog-font', multipurpose_blog_font_url(), array() );
	wp_enqueue_style( 'multipurpose-blog-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'multipurpose-blog-style', 'rtl', 'replace' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_script( 'nivo-slider-jquery', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'tether-jquery', get_template_directory_uri() . '/js/tether.js', array('jquery') ,'',true);
	wp_enqueue_script( 'bootstrap-jquery', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'multipurpose-blog-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'multipurpose_blog_scripts' );

function multipurpose_blog_ie_stylesheet(){
	wp_enqueue_style('multipurpose-blog-ie', get_template_directory_uri().'/css/ie.css', array('multipurpose-blog-basic-style'));
	wp_style_add_data( 'multipurpose-blog-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','multipurpose_blog_ie_stylesheet');

define('MULTIPURPOSE_BLOG_LIVE_DEMO','https://buywptemplates.com/multipurpose-blog-wordpress-theme/','multipurpose-blog');
define('MULTIPURPOSE_BLOG_BUY_PRO','https://www.buywptemplates.com/premium/multipurpose-blog-wordpress-theme/','multipurpose-blog');
define('MULTIPURPOSE_BLOG_PRO_DOC','https://buywptemplates.com/docs/multipurpose-blog-pro/','multipurpose-blog');
define('MULTIPURPOSE_BLOG_FREE_DOC','https://buywptemplates.com/docs/free-multipurpose-blog/','multipurpose-blog');
define('MULTIPURPOSE_BLOG_PRO_SUPPORT','https://www.buywptemplates.com/topic/multipurpose-blog-pro/','multipurpose-blog');
define('MULTIPURPOSE_BLOG_FREE_SUPPORT','https://www.buywptemplates.com/free-theme-support/','multipurpose-blog');
define('MULTIPURPOSE_BLOG_CREDIT','https://www.buywptemplates.com/','multipurpose-blog');

if ( ! function_exists( 'multipurpose_blog_credit' ) ) {
	function multipurpose_blog_credit(){
		echo "<a href=".esc_url(MULTIPURPOSE_BLOG_CREDIT)." target='_blank'>". esc_html__( 'Buy WordPress Template','multipurpose-blog')."</a>";
	}
}

/*radio button sanitization*/
 function multipurpose_blog_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}
/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Load customizer file. */
require get_template_directory() . '/inc/customizer.php';