<?php 

// Custom function to display a default profile picture for users who haven't set one
// Check if the user has the 'administrator' role
if (is_user_logged_in() && current_user_can('administrator')) {
    // This user has the 'administrator' role, apply custom avatar settings
    define('BP_AVATAR_DEFAULT', get_template_directory_uri() . '/assets/images/default-avatar.png');
    define('BP_AVATAR_DEFAULT_THUMB', get_template_directory_uri() . '/assets/images/default-avatar.png');
    add_filter('bp_core_fetch_avatar_no_grav', '__return_true');
}