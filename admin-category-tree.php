<?php
/*
Plugin Name: Admin Category Tree
Plugin URI:
Description: Changes the Admin Category-View (in all Post-Types) to an collapsed Tree-View with (+)/(-) buttons
Version: 1.0
Author: Stefan Andernach
Author URI:
Copyright: Stefan Andernach
*/

add_action( 'admin_enqueue_scripts', 'enqueue' );

function enqueue($hook)
{
	$version = "1.0";
	$shortcode = "admin-category-tree";

	$path = pathinfo( dirname( plugin_basename( __FILE__ ) ) );
	$plugin_url = plugins_url($path['filename']);
	
  if ('post.php' !== $hook && 'post-new.php' !== $hook) {
    return;
  }

	// import backend styles
	wp_enqueue_style($shortcode, $plugin_url . '/admin.css', array('wp-mediaelement'), $version, 'all' );

	// import backend scripts
	wp_enqueue_script($shortcode, $plugin_url . '/admin.js', array('wp-mediaelement'), $version, 'all' );
}