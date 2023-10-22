<?php
/**
 * ACF Custom Block Register
 */

 function acf_block_register() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a hero block
		acf_register_block(array(
			'name'				=> 'hero',
			'title'				=> __('Hero Intro Block'),
			'description'		=> __('A custom block for hero.'),
			'render_template'	=> 'template-parts/blocks/block-hero.php',
			'category'			=> 'layout',
			'icon'				=> 'info',
			'keywords'			=> array( 'hero block' ),
		));

		// register list block
		acf_register_block(array(
			'name'				=> 'list-items',
			'title'				=> __('List Item Block'),
			'description'		=> __('A custom block for list item.'),
			'render_template'	=> 'template-parts/blocks/block-list-item.php',
			'category'			=> 'layout',
			'icon'				=> 'list-view',
			'keywords'			=> array( 'list item block' ),
		));
	}
}

add_action('acf/init', 'acf_block_register');