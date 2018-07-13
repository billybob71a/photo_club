<?php
/**
 * Multipurpose Blog Theme Customizer
 *
 * @package Multipurpose Blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function multipurpose_blog_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'multipurpose_blog_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'multipurpose-blog' ),
	    'description' => __( 'Description of what this panel does.', 'multipurpose-blog' ),
	) );

	//layout setting
	$wp_customize->add_section( 'multipurpose_blog_left_right', array(
    	'title'      => __( 'Layout Settings', 'multipurpose-blog' ),
		'priority'   => 30,
		'panel' => 'multipurpose_blog_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('multipurpose_blog_theme_options',array(
	        'default' => __('One Column','multipurpose-blog'),
	        'sanitize_callback' => 'multipurpose_blog_sanitize_choices'	        
	    )
    );
	$wp_customize->add_control('multipurpose_blog_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Do you want this section','multipurpose-blog'),
	        'section' => 'multipurpose_blog_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','multipurpose-blog'),
	            'Right Sidebar' => __('Right Sidebar','multipurpose-blog'),
	            'One Column' => __('One Column','multipurpose-blog'),
	            'Three Columns' => __('Three Columns','multipurpose-blog'),
	            'Four Columns' => __('Four Columns','multipurpose-blog'),
	            'Grid Layout' => __('Grid Layout','multipurpose-blog')
	        ),
	    )
    );

    //Topbar section
	$wp_customize->add_section('multipurpose_blog_topbar',array(
		'title'	=> __('Topbar Section','multipurpose-blog'),
		'description'	=> __('Add Header Content here','multipurpose-blog'),
		'priority'	=> null,
		'panel' => 'multipurpose_blog_panel_id',
	));

	$wp_customize->add_setting('multipurpose_blog_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_blog_contact',array(
		'label'	=> __('Add Phone Number','multipurpose-blog'),
		'section'	=> 'multipurpose_blog_topbar',
		'setting'	=> 'multipurpose_blog_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_blog_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_blog_email',array(
		'label'	=> __('Add Email','multipurpose-blog'),
		'section'	=> 'multipurpose_blog_topbar',
		'setting'	=> 'multipurpose_blog_email',
		'type'		=> 'text'
	));


	//Social Icons(topbar)
	$wp_customize->add_section('multipurpose_blog_topbar_header',array(
		'title'	=> __('Social Icon Section','multipurpose-blog'),
		'description'	=> __('Add Socail Link here','multipurpose-blog'),
		'priority'	=> null,
		'panel' => 'multipurpose_blog_panel_id',
	));

	$wp_customize->add_setting('multipurpose_blog_cont_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multipurpose_blog_cont_facebook',array(
		'label'	=> __('Add Facebook link','multipurpose-blog'),
		'section'	=> 'multipurpose_blog_topbar_header',
		'setting'	=> 'multipurpose_blog_cont_facebook',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('multipurpose_blog_cont_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multipurpose_blog_cont_twitter',array(
		'label'	=> __('Add Twitter link','multipurpose-blog'),
		'section'	=> 'multipurpose_blog_topbar_header',
		'setting'	=> 'multipurpose_blog_cont_twitter',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('multipurpose_blog_google_plus',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multipurpose_blog_google_plus',array(
		'label'	=> __('Add Google Plus link','multipurpose-blog'),
		'section'	=> 'multipurpose_blog_topbar_header',
		'setting'	=> 'multipurpose_blog_google_plus',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('multipurpose_blog_pinterest',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multipurpose_blog_pinterest',array(
		'label'	=> __('Add Pintrest link','multipurpose-blog'),
		'section'	=> 'multipurpose_blog_topbar_header',
		'setting'	=> 'multipurpose_blog_pinterest',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('multipurpose_blog_tumblr',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multipurpose_blog_tumblr',array(
		'label'	=> __('Add Tumblr link','multipurpose-blog'),
		'section'	=> 'multipurpose_blog_topbar_header',
		'setting'	=> 'multipurpose_blog_tumblr',
		'type'		=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'multipurpose_blog_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'multipurpose-blog' ),
		'priority'   => 30,
		'panel' => 'multipurpose_blog_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'multipurpose_blog_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'multipurpose_blog_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'multipurpose-blog' ),
			'section'  => 'multipurpose_blog_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//photography section
  	$wp_customize->add_section('multipurpose_blog_photo_section',array(
	    'title' => __('Photography Section','multipurpose-blog'),
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

	$wp_customize->add_setting('multipurpose_blog_photo_setting',array(
	    'default' => 'select',
	    'sanitize_callback' => 'multipurpose_blog_sanitize_choices',
  	));
  	$wp_customize->add_control('multipurpose_blog_photo_setting',array(
	    'type'    => 'select',
	    'choices' => $cats,
	    'label' => __('Select Category to display Latest Post','multipurpose-blog'),
	    'section' => 'multipurpose_blog_photo_section',
	));

	//Footer section
  	$wp_customize->add_section('multipurpose_blog_footer',array(
	    'title' => __('Footer Section','multipurpose-blog'),
	    'description' => '',
	    'priority'  => null,
	    'panel' => 'multipurpose_blog_panel_id',
	));  

  	$wp_customize->add_setting('multipurpose_blog_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_blog_footer_copy',array(
		'label'	=> __('Footer Text','multipurpose-blog'),
		'section'	=> 'multipurpose_blog_footer',
		'setting'	=> 'multipurpose_blog_footer_copy',
		'type'		=> 'text'
	));

}
add_action( 'customize_register', 'multipurpose_blog_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
if ( ! class_exists ( 'multipurpose_blog_customize' ) ) {
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

			// Load custom sections.
			load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

			// Register custom section types.
			$manager->register_section_type( 'Multipurpose_Blog_Customize_Section_Pro' );

			// Register sections.
			$manager->add_section(
				new Multipurpose_Blog_Customize_Section_Pro(
					$manager,
					'example_1',
					array(
						'priority'   => 9,
						'title'    => esc_html__( 'Multipurpose Blog Pro', 'multipurpose-blog' ),
						'pro_text' => esc_html__( 'Go Pro', 'multipurpose-blog' ),
						'pro_url'  => esc_url('https://www.buywptemplates.com/premium/multipurpose-blog-wordpress-theme/'),
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

			wp_enqueue_script( 'multipurpose-blog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

			wp_enqueue_style( 'multipurpose-blog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
		}
	}

	// Doing this customizer thang!
	multipurpose_blog_customize::get_instance();
}