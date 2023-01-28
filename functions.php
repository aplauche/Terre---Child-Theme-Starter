<?php


// Child Theme setup
function childtheme_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'childtheme', get_template_directory() . '/languages' );

	// Enqueue editor styles.
	add_editor_style( get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'after_setup_theme', 'childtheme_setup', 99 );


// Add our child theme stylesheet to enqueue after parent
function childtheme_enqueue_styles(){
  wp_enqueue_style( 'childtheme-styles', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'childtheme_enqueue_styles', 99 );


// Add our custom block pattern categories
function childtheme_block_pattern_category() {
	register_block_pattern_category( 'childtheme-patterns', array(
		'label' => __( 'Custom Theme Blocks', 'childtheme' )
	) );
}

add_action( 'init', 'childtheme_block_pattern_category', 5 );


/**
 * Enqueue editor JS file for Gutenberg mods.
 *
 * @since 0.0.1
 */
function childtheme_blocktheme_gutenberg_styles() {
  wp_enqueue_script( 
		'childtheme-editor-script', 
		get_stylesheet_directory_uri() . '/scripts/editor.js', 
		array(), 
		wp_get_theme( 'childtheme' )->get( 'Version' ), 
		true 
	);
}
add_action( 'enqueue_block_editor_assets', 'childtheme_blocktheme_gutenberg_styles', 99 );