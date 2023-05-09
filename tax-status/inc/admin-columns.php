<?php
/**
 * Modifies the admin columns, for the taxonomy.
 *
 * @package kebbet-erbe-cpt-tax
 * @subpackage taxonomy-artstatus
 * @author Erik Betshammar
 */

namespace kebbet\erbe\cpt_tax\taxonomy\artstatus\admin_columns;

use const kebbet\erbe\cpt_tax\taxonomy\artstatus\TAXONOMY;
use const kebbet\erbe\cpt_tax\taxonomy\artstatus\HIDE_DESC;
use const kebbet\erbe\cpt_tax\taxonomy\artstatus\HIDE_SLUG;

/**
 * Hide column from the table in 'edit-tags.php'
 *
 * @since 1.0.0
 *
 * @param array $columns Columns in taxonomy table.
 * @return array
*/
function modify_column_visibility( $columns ) {
	if ( true === HIDE_SLUG ) {
		if ( isset( $columns['slug'] ) ) {
			unset( $columns['slug'] );
		}
	}

	if ( true === HIDE_DESC ) {
		if ( isset( $columns['description'] ) ) {
			unset( $columns['description'] );
		}
	}

	return $columns;
}
add_filter( 'manage_edit-' . TAXONOMY . '_columns', __NAMESPACE__ . '\modify_column_visibility' );
