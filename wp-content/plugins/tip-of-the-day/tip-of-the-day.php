<?php
/*
    Plugin Name: Tip of the Day
    Description: Display a daily tip set by the admin.
    Version: 1.0
    Author: Ragavan
*/

// Register activation hook (if needed)
register_activation_hook(__FILE__, 'tip_of_the_day_install');

function tip_of_the_day_install() {
    // Initialize the tip of the day option on activation
    update_option('tip_of_the_day', array(
        'tips' => array(),
        'last_displayed' => '',
    ));
}

// Add a menu item in the admin panel
add_action('admin_menu', 'tip_of_the_day_menu');

function tip_of_the_day_menu() {
    add_menu_page('Tip of the Day', 'Tip of the Day', 'manage_options', 'tip-of-the-day', 'tip_of_the_day_admin_page');
}

function tip_of_the_day_admin_page() {
    if (current_user_can('manage_options')) {

        wp_enqueue_style('tip-of-the-day-admin-styles', plugin_dir_url(__FILE__) . 'tip_of_the_day-styles.css');

        // Handle form submissions and tip management
        if (isset($_POST['tip_of_the_day_submit'])) {
            // Retrieve the current tips
            $tip_data = get_option('tip_of_the_day', array(
                'tips' => array(),
                'last_displayed' => '',
            ));
            $tips = $tip_data['tips'];

            if($_POST['add']) {
                // Sanitize and add the new tip
                $new_tip_title = sanitize_text_field($_POST['tip_text']);
                $new_tip_description = sanitize_text_field($_POST['tip_description']);
                $tips[] = array("id" => count($tips) + 1, "title" =>$new_tip_title, "description" => $new_tip_description);
            }
          
            if (isset($_GET['delete_tip'])) {
                // Delete a specific tip
                $delete_index = intval($_GET['delete_tip']) - 1;
                unset($tips[$delete_index]);
                $tips = array_values($tips); // Re-index the array
            }

            // Update the tips
            update_option('tip_of_the_day', array(
                'tips' => $tips,
                'last_displayed' => $tip_data['last_displayed'],
            ));
        }
        
        ?>

        <div class="wrap">
            <h2>Tip of the Day Settings</h2>
            <form method="post" action="">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Tip Title</th>
                        <td>
                            <input type="text" name="tip_text" class="regular-text" placeholder="Tip Title" required>
                            <input type="hidden" value="add" name="add" class="regular-text">
                            <p class="description">Enter a tip title to be displayed to users.</p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Tip Description</th>
                        <td>
                            <textarea value="" rows="5" name="tip_description" class="regular-text" placeholder="Tip Description" required></textarea>
                            <p class="description">Enter a tip description to be displayed to users.</p>
                        </td>
                    </tr>
                </table>
                <?php submit_button('Add Tip', 'primary', 'tip_of_the_day_submit'); ?>
            </form>
        </div>

        <?php

        // Display the list of tips with edit and delete options
        $tips = get_option('tip_of_the_day', array('tips' => array())); ?>

        <div class="">
            <h2>Manage Tips of the Day</h2>
            <form method="post" action="">
                <table border class="" style="width:100%; margin: 2rem 0 ;">
                    <thead>
                        <tr>
                            <th style="text-align:left; padding:.5rem;">Title</th>
                            <th style="text-align:left; padding:.5rem;">Description</th>
                            <th style="text-align:center; padding:.5rem;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tips['tips'] as $index => $tip) { ?>
                            <tr>
                                <td style="padding:.5rem;"><?php echo esc_attr($tip['title']); ?></td>
                                <td style="padding:.5rem;"><?php echo esc_attr($tip['description']); ?></td>
                                <td style="text-align:center;padding:.5rem;">
                                    <div class="">
                                        <a style="padding:.5rem;" href="?page=tip-of-the-day&delete_tip=<?php echo $index + 1; ?>">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
                <input class="button button-primary" type="submit" name="tip_of_the_day_submit" value="Save Changes">
            </form>
        </div>
        
        <?php 
    }
}

// Add the front-end display function
function tip_of_the_day_display() {
    // Retrieve the stored tips
    $tip_data = get_option('tip_of_the_day', array(
        'tips' => array(),
        'last_displayed' => '',
    ));
    $tips = $tip_data['tips'];
    $last_displayed = $tip_data['last_displayed'];

    if (empty($tips)) {
        // No tips available
        return;
    }

    // Get the current date and day of the year
    $current_date = current_time('Y-m-d');
    $current_day = date('z', strtotime($current_date));

    // Determine the index of the tip to display
    $tip_index = $current_day % count($tips);

    // Ensure we don't display the same tip on the same day
    if ($last_displayed === $current_date) {
        $tip_index = ($tip_index + 1) % count($tips);
    }

    // Store the date of the displayed tip
    $tip_data['last_displayed'] = $current_date;
    update_option('tip_of_the_day', $tip_data);

    // Display the selected tip
    $tip = $tips[$tip_index];
 
    // Create the tip modal (visible by default)
    echo '<div id="tipModal" class="tip-modal">';
    echo '<div class="tip-modal-content">';
    echo '<span class="tip-close" id="closeTipPopup">&times;</span>';
    echo '<h5 class="mb-2">Tip of the day!!</h5>';
    echo '<h6 class="text-lg mb-2 font-bold text-gray-700">' . esc_html($tips[$tip_index]['title']) . '</h6>';
    echo '<p class=" mb-2 text-gray-500">' . esc_html($tips[$tip_index]['description']) . '</p>';
    echo '</div>';
    echo '</div>';
  
}
