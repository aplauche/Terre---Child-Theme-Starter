<?php

// Child Theme setup
function terrechild_setup() {

	// Make theme available for translation.
	// load_theme_textdomain( 'terrechild', get_template_directory() . '/languages' );

	// Enqueue editor styles.
	add_editor_style( get_stylesheet_directory_uri() . '/style.css' );
	
}
add_action( 'after_setup_theme', 'terrechild_setup', 11 );



// Add our child theme stylesheet to enqueue after parent
function terrechild_enqueue_styles(){
  wp_enqueue_style( 'terrechild-styles', get_stylesheet_directory_uri() . '/style.css', array('terre'), wp_get_theme( 'terrechild' )->get( 'Version' ));
}
add_action( 'wp_enqueue_scripts', 'terrechild_enqueue_styles');



// Add our custom block pattern categories
function terrechild_block_pattern_category() {
	register_block_pattern_category( 'terrechild-patterns', array(
		'label' => __( 'Custom Patterns', 'terrechild' )
	) );
}

add_action( 'init', 'terrechild_block_pattern_category', 5 );



/**
 * Enqueue editor JS file for Gutenberg mods.
 *
 * @since 0.1.0
 */
function terrechild_blocktheme_gutenberg_styles() {
  wp_enqueue_script( 
		'terrechild-editor-script', 
		get_stylesheet_directory_uri() . '/scripts/editor.js', 
		array('terre-editor-script'), 
		wp_get_theme( 'terrechild' )->get( 'Version' ), 
		true 
	);
}
add_action( 'enqueue_block_editor_assets', 'terrechild_blocktheme_gutenberg_styles');