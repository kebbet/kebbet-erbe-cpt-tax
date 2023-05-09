<?php
/**
 * Plugin activation.
 *
 * @package kebbet-erbe-cpt-tax
 * @subpackage taxonomy-arttype
 * @author Erik Betshammar
 */

namespace kebbet\erbe\cpt_tax\taxonomy\arttype\activation;

/**
 * Register taxonomy and flush rewrite rules on registration.
 *
 * @since 1.1.0
 */
function activate() {
	// First, we "add" the custom taxonomy via the above written function.
	\kebbet\erbe\cpt_tax\taxonomy\arttype\register\register();

	// ATTENTION: This is *only* done during plugin activation hook in this example!
	// You should *NEVER EVER* do this on every page load!!
	\flush_rewrite_rules();
}
