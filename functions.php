<?php

/**
 * Enqueue styles and scripts
 */

function starter_theme_scripts() {
	
	// main stylesheet
	wp_enqueue_style( 
		'main', 
		get_template_directory_uri() . '/css/main.css'
	);
	
	// modernizr
	wp_enqueue_script(
		'modernizr', 
		get_template_directory_uri() . '/js/vendor/modernizr-2.8.2.min.js',
		array(), // dependencies
		false,   // version
		false    // in footer
	);

	// special stuff for jquery
	wp_deregister_script('jquery');
	wp_register_script(
		'jquery',
		get_template_directory_uri() . '/js/vendor/jquery-1.11.1.min.js',
        array(),
		false,
		true
	);
	wp_enqueue_script( 'jquery' );

	// plugins
	wp_enqueue_script(
		'plugins',
		get_template_directory_uri() . '/js/plugins.js',
		array(
				'jquery'
			),
		false,
		true

	);

	// main javascript
	wp_enqueue_script(
		'main',
		get_template_directory_uri() . '/js/main.js',
		array(
				'jquery',
				'plugins'
			),
		false,
		true

	);
}

if ( !is_admin() ) add_action( 'wp_enqueue_scripts', 'starter_theme_scripts' );


add_action( 'admin_head' , 'add_museo_sans' );
function add_museo_sans() { ?>
	<script src="//use.typekit.net/gbd2brz.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
<?php }

/**
 * Add support for menus
 */

function register_starter_theme_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'extra-menu' => __( 'Extra Menu' )
		)
	);
}
add_action( 'init', 'register_starter_theme_menus' );


/**
 * Add featured images support
 */

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}

/**
 * Add image size
 * 
 * example if needed
 * not active by default because WordPress will save images in the example sizes
 */

// if ( function_exists( 'add_image_size' ) ) { 
// 	add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
// 	add_image_size( 'homepage-thumb', 220, 180, true ); //(cropped)
// }


/**
 * Add custom content types
 */

require_once('post-types/team-members.php');


/**
 * Custom editor styles
 */

function greenwichmarketinggroup_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'after_setup_theme', 'greenwichmarketinggroup_add_editor_styles' );


/**
 * Add button for custom styles in editor
 */

// Callback function to insert 'styleselect' into the $buttons array
function greenwichmarketinggroup_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'greenwichmarketinggroup_buttons_2');


/**
 * Add custom buttons to style copy in editor
 */
// Callback function to filter the MCE settings
function greenwichmarketinggroup_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Blue Hightlighted Text',  
			'inline' => 'span',  
			'classes' => 'gmg-em-text',
			'wrapper' => false,
			
		),  
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'greenwichmarketinggroup_before_init_insert_formats' );  


?>
