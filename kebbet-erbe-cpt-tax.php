<?php
/**
 * Plugin Name:       Kebbet plugins - Custom Post Type and Taxonomies for Erik Betshammar.
 * Plugin URI:        https://github.com/kebbet/kebbet-erbe-cpt-tax
 * Description:       Registers a Custom Post Type and some taxonomies.
 * Author:            Erik Betshammar
 * Version:           1.2.1
 * Network:           true
 * Author URI:        https://verkan.se
 * Requires at least: 6.1
 * Requires PHP:      7.4
 * Update URI:        false
 * Text domain:       kebbet-erbe-cpt-tax
 *
 * @author Erik Betshammar
 * @package kebbet-erbe-cpt-tax
 */

namespace kebbet\erbe\cpt_tax;

use const kebbet\erbe\cpt_tax\cpt_work\THUMBNAIL;

/**
 * Hook into the 'init' action
 */
function init() {
	load_textdomain();
	\kebbet\erbe\cpt_tax\cpt_work\register();
	if ( true === THUMBNAIL ) {
		add_theme_support( 'post-thumbnails' );
	}
}
add_action( 'init', __NAMESPACE__ . '\init', 0 );

/**
 * Flush rewrite rules on registration.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 */
function rewrite_flush() {
	// First, we "add" the custom post type via the above written function.
	// Note: "add" is written with quotes, as CPTs don't get added to the DB,
	// They are only referenced in the post_type column with a post entry,
	// when you add a post of this CPT.
	\kebbet\erbe\cpt_tax\cpt_work\register();

	// ATTENTION: This is *only* done during plugin activation hook in this example!
	// You should *NEVER EVER* do this on every page load!!
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, __NAMESPACE__ . '\rewrite_flush' );

/**
 * Load plugin textdomain.
 */
function load_textdomain() {
	load_plugin_textdomain( 'kebbet-erbe-cpt-tax', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

// Add post type.
require_once plugin_dir_path( __FILE__ ) . 'cpt/post-type-work.php';

// Add taxonomy `art status`.
require_once plugin_dir_path( __FILE__ ) . 'tax-status/index.php';

// Add taxonomy `art type`.
require_once plugin_dir_path( __FILE__ ) . 'tax-type/index.php';

// Add taxonomy `art year`.
require_once plugin_dir_path( __FILE__ ) . 'tax-year/index.php';
