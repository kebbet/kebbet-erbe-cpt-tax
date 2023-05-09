<?php
/**
 * Modifies fields in the form, for the taxonomy.
 *
 * @package kebbet-erbe-cpt-tax
 * @subpackage taxonomy-artstatus
 * @author Erik Betshammar
 */

namespace kebbet\erbe\cpt_tax\taxonomy\artstatus\fields;

use const kebbet\erbe\cpt_tax\taxonomy\artstatus\TAXONOMY;
use const kebbet\erbe\cpt_tax\taxonomy\artstatus\HIDE_DESC;

/**
 * Hide form fields with CSS, based on plugin constants.
 *
 * @since 1.0.0
 *
 * @return string|null Print style tag or return nothing.
 */
function hide_form_fields() {
	$style = '';

	if ( ! is_admin() ) {
		return;
	}

	if ( 'edit-' . TAXONOMY !== get_current_screen()->id ) {
		return;
	}

	if ( true === HIDE_DESC ) {
		$style  = '<style type="text/css">';
		$style .= '.term-description-wrap{';
		$style .= 'display:none;visibility:hidden;opacity:0';
		$style .= '}';
		$style .= '</style>';
	}

	if ( $style ) {
		echo $style;
	} else {
		return;
	}
}
add_filter( 'admin_head', __NAMESPACE__ . '\hide_form_fields' );
