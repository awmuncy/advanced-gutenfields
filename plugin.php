<?php
/**
 * Plugin Name: Block: blockslug
 * Author: Allen Muncy
 * Tags: Advanced GutenFields (AGF)
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


add_filter('acf/settings/load_json', 'agf_blockslug_register_acf'); // Load the ACF from json in the plugin
add_action('acf/init', 'my_agf_blockslug_init'); // Register the block
add_action( 'enqueue_block_assets', 'agf_blockslug_styles' ); // Styles
// add_action( 'enqueue_block_editor_assets', 'agf_blockslug_backend_styles' ); // Styles in the editor
// add_action( 'enqueue_block_editor_assets', 'agf_blockslug_frontend_scripts' ); // Scripts needed for front end

function agf_blockslug_register_acf( $paths ) {

    $paths[] = plugin_dir_path( __FILE__ );

    return $paths;    

}

function my_agf_blockslug_init() {

    if( function_exists('acf_register_block') ) {
		acf_register_block(array(
		    'name'				=> 'blockslug',
		    'title'				=> __('Block Slug'),
		    'description'		=> __('A custom blockslug cta block.'),
		    'render_callback'	=> 'agf_blockslug_output_callback',
		    'category'			=> 'layout',
		    'icon'				=> 'editor-table',
		    'keywords'			=> array( 'form', 'cta' ),
		    'align' 			=> 'wide',
		));

	}
}

function agf_blockslug_output_callback( $block ) {

    $slug = str_replace('acf/', '', $block['name']);

    if( file_exists(plugin_dir_path( __FILE__ ) . "output.php") ) {
        include(plugin_dir_path( __FILE__ ) . "output.php" );
    }
}

function agf_blockslug_styles() {
	wp_enqueue_style(
		'agf_blockslug-styles',
		plugin_dir_url(__FILE__) . '/block-style.css',
		array( 'wp-editor' )

	);
}

function agf_blockslug_backend_styles() { 

	wp_enqueue_style(
		'agf_blockslug-backend',
		plugin_dir_url(__FILE__) . '/back-end-style.css',
		array( 'wp-edit-blocks' )
	);
}

function agf_blockslug_frontend_scripts() {
	wp_enqueue_scripts(
		'agf_blockslug-scripts',
		plugin_dir_url(__FILE__) . '/scripts.js'
	);
}