<?php

// Disable Gutenberg on the back end.
add_filter('use_block_editor_for_post', '__return_false');
// Disable Gutenberg for widgets.
add_filter('use_widgets_block_editor', '__return_false');
// Disable default front-end styles.
add_action('wp_enqueue_scripts', function () {
    // Remove CSS on the front end.
    wp_dequeue_style('wp-block-library');
    // Remove Gutenberg theme.
    wp_dequeue_style('wp-block-library-theme');
    // Remove inline global CSS on the front end.
    wp_dequeue_style('global-styles');
}, 20);

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_print_comments');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_generator');