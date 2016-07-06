<?php
/*
Plugin Name: Admin Category Tree
Plugin URI:
Description: Changes the Admin Category-View (in all Post-Types) to an collapsed Tree-View with (+)/(-) buttons
Version: 1.1
Author: Stefan Andernach
Author URI:
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Copyright: Stefan Andernach
GitHub Plugin URI: https://github.com/nos3b3ar/admin-category-tree
GitHub Branch: master
*/

if ( ! defined( 'ABSPATH' ) ) die( 'No direct access allowed' );

add_action( 'admin_enqueue_scripts', 'actree_enqueue_styles_and_scripts' );

define('ACTREE_VERSION','1.1');
define('ACTREE_NAME','admin-category-tree');


function actree_enqueue_styles_and_scripts($hook)
{
	$path = pathinfo( dirname( plugin_basename( __FILE__ ) ) );
	$plugin_url = plugins_url($path['filename']);
	
  if ('post.php' !== $hook && 'post-new.php' !== $hook) {
    return;
  }

	// import backend styles
	wp_enqueue_style(ACTREE_NAME, $plugin_url . '/admin.css', array('wp-mediaelement'), ACTREE_VERSION, 'all' );

	// import backend scripts
	wp_enqueue_script(ACTREE_NAME, $plugin_url . '/admin.js', array('wp-mediaelement'), ACTREE_VERSION, 'all' );
}