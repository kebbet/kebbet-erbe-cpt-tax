<?php
/**
 * Plugin deactivation.
 *
 * @package kebbet-erbe-cpt-tax
 * @subpackage taxonomy-artyear
 * @author Erik Betshammar
 */

namespace kebbet\erbe\cpt_tax\taxonomy\artyear\deactivation;

use const kebbet\erbe\cpt_tax\taxonomy\artyear\TAXONOMY;

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
