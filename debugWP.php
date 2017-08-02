<?php
/**
 * @package debugWP
 */
/*
Plugin Name: debugWP
Plugin URI: http://www.soapmedia.co.uk/
Description: Adds extra information to the frontend for debugging purposes.
Version: 0.1.0
Author: Soap Media
Author URI: http://www.soapmedia.co.uk/
License: GPLv2 or later
*/

function dbwp_init()
{
    wp_register_script('dbwpScript', plugins_url().'/debugwp/debug_bar/scripts.js');
    wp_register_style('dbwpStyle', plugins_url().'/debugwp/debug_bar/style.css');
}
add_action('init', 'dbwp_init');

//Include the bar to the bottom of frontend
function dbwp_bar() {
    if (current_user_can('administrator'))
        include ('debug_bar/debug_bar.php');
}
add_action('wp_footer', 'dbwp_bar');

//Include the style in the header and jQuery.
function dbwp_bar_style() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'dbwpScript' );
    wp_enqueue_style( 'dbwpStyle' );
    
}
add_action('wp_enqueue_scripts', 'dbwp_bar_style');

//Get the type of page the user is looking at
function get_current_page_type()
{
	global $post;

	if ( is_page() ) {
		$content = 'Page';
	}
    elseif (is_tax()) {
        $content = 'Taxonomy';
    }
    elseif (is_author()) {
        $content = 'Author';
    }
    elseif (is_category()) {
        $content = 'Category';
    }
	elseif ( is_singular() ) {
		$content = 'Single';
	}
	elseif ( is_archive() ) {
		$content = 'Archive';
	}
	elseif ( is_front_page() ) {
		$content = 'Front Page';
	}
    elseif (is_preview()) {
        $content = 'Preview';
    }
	else {
		$content = 'Multi Page';
	}

	echo $content;
}

function get_current_page_id()
{
	global $post;
	
	return $post->ID;
}






























?>