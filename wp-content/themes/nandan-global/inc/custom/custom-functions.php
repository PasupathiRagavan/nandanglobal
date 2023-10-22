<?php

// Custom functions

/**
 * Enqueue scripts and styles.
 */

 include( get_template_directory() . '/inc/custom/enqueue.php' );


/**
 * Custom Admin Init Functions
 * Only for Admin
 */

 include( get_template_directory() . '/inc/custom/acf-fields.php' );

/**
 * ACF Custom Blocks
 */

 include( get_template_directory() . '/inc/custom/register-blocks.php' );

/**
 * Custom Menu
 */

 include( get_template_directory() . '/inc/custom/custom-menu.php' );