<?php
/**
 * Plugin deactivation.
 *
 * @package kebbet-erbe-cpt-tax
 * @subpackage taxonomy-arttype
 * @author Erik Betshammar
 */

namespace kebbet\erbe\cpt_tax\taxonomy\arttype\deactivation;

use const kebbet\erbe\cpt_tax\taxonomy\arttype\TAXONOMY;

/**
 * Un-register taxonomy and flush rewrite rules on deactivation.
 *
 * @since 1.1.0
 */
function deactivate() {
	// Unregister the taxonomy.
	\unregister_taxonomy( TAXONOMY );

	// Flush rules after unregistration.
	\flush_rewrite_rules();
}
