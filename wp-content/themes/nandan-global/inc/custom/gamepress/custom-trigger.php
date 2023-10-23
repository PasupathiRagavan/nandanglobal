<?php 

function my_prefix_custom_register_specific_activity_triggers( $triggers ) {
    // The array key will be the group label
    $triggers['My Custom Specific Events'] = array(
        // Every event of this group is formed with:
        'my_prefix_custom_specific_event' => __( 'Custom specific event', 'gamipress' ),
       
    );
    return $triggers;
}
add_filter( 'gamipress_activity_triggers', 'my_prefix_custom_register_specific_activity_triggers' );


function my_prefix_specific_activity_trigger_label( $specific_trigger_labels ) {
    // %s will be replaced with the post title
    $specific_trigger_labels['my_prefix_custom_specific_event'] = __( 'Specific event for %s', 'gamipress' );
    return $specific_trigger_labels;
}
add_filter( 'gamipress_specific_activity_trigger_label', 'my_prefix_specific_activity_trigger_label' );

function my_prefix_custom_specific_listener( $post_ID, $post ) {
    // Call to the gamipress_trigger_event() function to let know GamiPress this event was happened
    // current user id
    $user_id = get_current_user_id();

    // Check if the user has met the criteria and award the achievement
    // user publish post count
    $published_posts_count = count_user_posts($user_id);
   
    if ($published_posts_count % 2 === 0) {
       
        gamipress_trigger_event( array(
            // Mandatory data, the event triggered, the user ID to be awarded and specific ID
            'event' => 'my_prefix_custom_specific_event',
            'user_id' => $user_id,
            'specific_id' => $post_ID,
            'post_count' => $published_posts_count
        ) );

        // Award the points to the user
        gamipress_award_points_to_user( $user_id, '20', 'awards' );
    }
}
// The listener should be hooked to the desired action through the WordPress function add_action()
add_action( 'publish_post', 'my_prefix_custom_specific_listener', 10, 2 );