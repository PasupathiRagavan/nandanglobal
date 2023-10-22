<?php

function wordpress_enqueue_scripts()
{
    $getDateTime = new DateTime("now");
    $getCurrentDateTime = $getDateTime->format('U');

    // Enqueue Main Script: 
    if ($script_script_uri = get_theme_file_uri("/dist/js/script.js"))
    wp_enqueue_script("script", $script_script_uri, [], $getCurrentDateTime, true);

}

function wordpress_enqueue_styles()
{
    $getDateTime = new DateTime("now");
    $getCurrentDateTime = $getDateTime->format('U');

    // Enqueue Main Style:
    wp_enqueue_style("theme", get_theme_file_uri("/dist/css/style.css"), [], $getCurrentDateTime, "all");
}


// Frontend Enqueue Hook: 
function wordpress_enqueue_theme()
{

    // Setup Enqueue Scripts
    wordpress_enqueue_scripts();

    // Setup Enqueue Styles
    wordpress_enqueue_styles();

}

add_action("wp_enqueue_scripts", "wordpress_enqueue_theme");