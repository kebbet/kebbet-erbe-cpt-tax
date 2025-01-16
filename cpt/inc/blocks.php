<?php
/**
 * Add allowed blocks to post type.
 *
 * @package kebbet-erbe-cpt-tax
 */

namespace kebbet\erbe\cpt_tax\cpt_work\blocks;

use const kebbet\erbe\cpt_tax\cpt_work\POSTTYPE;

/**
 * Returns allowed block types
 *
 * @param array  $allowed_blocks The allowed block types.
 * @param object $editor_context The editor.
 * @return array
 */
function allowed_block_types( $allowed_blocks, $editor_context ) {

	$disabled = array(
		'core/image',
		'core/gallery',
		'core/video',
		'core/separator',
		'core/table',
		'core/shortcode',
		'core/file',
		'core/button',
		'core/buttons',
		'core/columns',
		'core/group',
		'core/shortcode',
		'core/more',
	);

	if ( empty( $editor_context->post ) ) {
		return $allowed_blocks;
	}

	if ( POSTTYPE !== $editor_context->post->post_type ) {
		return $allowed_blocks;
	}

	$allowed_blocks_custom = array(
		'core/audio',
		'core/embed',
	);

	$allowed_blocks = array_merge( $allowed_blocks, $allowed_blocks_custom );

	return $allowed_blocks;
}
add_filter( 'allowed_block_types_all', __NAMESPACE__ . '\allowed_block_types', 80, 2 );
