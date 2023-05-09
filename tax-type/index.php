<?php
/**
 * Add custom taxonomy: arttype
 *
 * @package kebbet-erbe-cpt-tax
 * @subpackage taxonomy-arttype
 * @author Erik Betshammar
 */

namespace kebbet\erbe\cpt_tax\taxonomy\arttype;

use const kebbet\erbe\cpt_tax\cpt_work\POSTTYPE;

const TAXONOMY   = 'arttype';
const POST_TYPES = array( POSTTYPE );
const HIDE_SLUG  = false;
const HIDE_DESC  = true;

/**
 * On plugin activation.
 */
function activation() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/activation.php';
	activation\activate();
}
register_activation_hook( __FILE__, __NAMESPACE__ . '\activation' );

/**
 * On plugin de-activation.
 */
function deactivation() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/deactivation.php';
	deactivation\deactivate();
}
register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivation' );

/**
 * Main taxonomy registration.
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/register.php';
/**
 * Hook into the 'init' action
 *
 * @since 1.0.0
 */
function init() {
	\kebbet\erbe\cpt_tax\taxonomy\arttype\register\register();
}
add_action( 'init', __NAMESPACE__ . '\init', 0 );

/**
 * Modifies the admin columns, for the taxonomy.
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/admin-columns.php';

/**
 * Modifies fields in the form, for the taxonomy.
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/fields.php';

/**
 * Modifies fields in the form, for the taxonomy.
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/acf-fields.php';

/**
 * Adds possibility to sort terms
 *
 * @since 1.2.0
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/sorting.php';
