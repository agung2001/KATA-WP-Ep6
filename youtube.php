<?php
/*
 * Plugin Name:       My YouTube Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Agung Sundoro
 * Author URI:        https://agung2001.github.io
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-youtube-plugin
 * Domain Path:       /languages
 */

/**
 * YouTube shortcode
 */
function youtube_shortcode( $atts, $content = null ) {
    // Simple shortcode
    return 'Hello YouTube!';

    // Shortcode with parameters
    // return 'Hello YouTube! The video ID is ' . $atts['id'];

    // Shortcode with default parameters
//    $atts = shortcode_atts(
//        array(
//			'id'     => 'abc123',
//			'width'  => 640,
//			'height' => 480,
//        ),
//        $atts
//    );

    // Shortcode with parameters and content
    // return 'Hello YouTube! The video ID is ' . $atts['id'] . '. The content is ' . $content;

    // Shortcode with parameters and YouTube video
    // return '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="https://www.youtube.com/embed/' . $atts['id'] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
}
add_shortcode( 'youtube', 'youtube_shortcode' );


/**
 * YouTube container shortcode
 */
function youtube_container_shortcode( $atts, $content = null ) {
    // Default shortcode parameters
    $atts = shortcode_atts(
        array(
			'title'       => 'YouTube video',
			'description' => 'Just another YouTube video',
        ),
        $atts
    );

    // Shortcode with filtered content
    $content = apply_filters( 'youtube_container_shortcode_content', $content );

    // Include container template
    include plugin_dir_path( 'template/container.php' );
}
add_shortcode( 'youtube_container', 'youtube_container_shortcode' );

/**
 * Filter YouTube container shortcode content
 */
function youtube_container_filter( $content ) {
    // Add paragraph
    $content .= '<p>Thanks for watching!</p>';

    // Return filtered content
    return $content;
}
//add_filter('youtube_container_shortcode_content', 'youtube_container_filter');