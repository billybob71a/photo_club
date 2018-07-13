<?php
/**
 * Theme Functions.
 */

add_action( 'wp_enqueue_scripts', 'ultimate_blogger_enqueue_styles' );
function ultimate_blogger_enqueue_styles() {
	$parent_style = 'multipurpose-blog-style'; // Style handle of parent theme.
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'ultimate-blogger-style', get_stylesheet_uri(), array( $parent_style ) );
}

// Customizer Section
function ultimate_blogger_customizer ( $wp_customize ) {

	//Our Blog Category section
  	$wp_customize->add_section('ultimate_blogger_our_blog_cat_section',array(
	    'title' => __('Our Blog Category Section','ultimate-blogger'),
	    'description' => '',
	    'priority'  => null,
	    'panel' => 'multipurpose_blog_panel_id',
	)); 

	$categories = get_categories();
	$cats = array();
	$i = 0;
  	foreach($categories as $category){
  	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('ultimate_blogger_our_category',array(
	    'default' => 'select',
	    'sanitize_callback' => 'sanitize_text_field',
  	));
  	$wp_customize->add_control('ultimate_blogger_our_category',array(
	    'type'    => 'select',
	    'choices' => $cats,
	    'label' => __('Select Category to display Latest Post','ultimate-blogger'),
	    'section' => 'ultimate_blogger_our_blog_cat_section',
	));
}
add_action( 'customize_register', 'ultimate_blogger_customizer' );

/*------------------------------section-pro.php part----------------------------------------*/
require_once( ABSPATH . WPINC . '/class-wp-customize-section.php' );

class Ultimate_Blogger_Customize_Section_Pro extends WP_Customize_Section {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'ultimate-blogger';

	/**
	 * Custom button text to output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_text = '';

	/**
	 * Custom pro button URL.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_url = '';

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function json() {
		$json = parent::json();

		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );

		return $json;
	}

	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	protected function render_template() { ?>

		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

			<h3 class="accordion-section-title">
				{{ data.title }}

				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}

/*------------------------------customizer.php part----------------------------------------*/
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class multipurpose_blog_customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Register custom section types.
		$manager->register_section_type( 'Ultimate_Blogger_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Ultimate_Blogger_Customize_Section_Pro(
				$manager,
				'ultimate_blogger',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Ultimate Blog Pro', 'ultimate-blogger' ),
					'pro_text' => esc_html__( 'Go Pro', 'ultimate-blogger' ),
					'pro_url'  => 'https://www.buywptemplates.com/themes/premium-ultimate-blogger-wordpress-theme/'
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */

	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ultimate-blogger-customize-controls', get_stylesheet_directory_uri() . '/js/customize-controls-child.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ultimate-blogger-customize-controls', get_stylesheet_directory_uri() . '/css/customize-controls-child.css' );
	}
}

// Doing this customizer thang!
multipurpose_blog_customize::get_instance();


/* Theme Widgets Setup */
function ultimate_blogger_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Home Sidebar', 'ultimate-blogger' ),
		'description'   => __( 'Appears on Home Page', 'ultimate-blogger' ),
		'id'            => 'home',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ultimate_blogger_widgets_init' );

define('ULTIMATE_BLOGGER_LINK_CREDIT','https://www.buywptemplates.com','ultimate-blogger');

if ( ! function_exists( 'ultimate_blogger_link_credit' ) ) {
	function ultimate_blogger_link_credit(){
		echo "<a href=".esc_url(ULTIMATE_BLOGGER_LINK_CREDIT)." target='_blank'>".esc_html__('Buywptemplates','ultimate-blogger')."</a>";
	}
}