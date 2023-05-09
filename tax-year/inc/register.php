<?php
/**
 * Taxonomy registration.
 *
 * @package kebbet-erbe-cpt-tax
 * @subpackage taxonomy-artyear
 * @author Erik Betshammar
 */

namespace kebbet\erbe\cpt_tax\taxonomy\artyear\register;

use const kebbet\erbe\cpt_tax\taxonomy\artyear\TAXONOMY;
use const kebbet\erbe\cpt_tax\taxonomy\artyear\POST_TYPES;

/**
 * Register the taxonomy
 *
 * @since 1.0.0
 */
function register() {
	$tax_labels = array(
		'name'                       => _x( 'Art year', 'taxonomy general name', 'kebbet-erbe-cpt-tax' ),
		'menu_name'                  => __( 'Art year', 'kebbet-erbe-cpt-tax' ),
		'singular_name'              => _x( 'Art year', 'taxonomy singular name', 'kebbet-erbe-cpt-tax' ),
		'all_items'                  => __( 'All art year tags', 'kebbet-erbe-cpt-tax' ),
		'edit_item'                  => __( 'Edit tag', 'kebbet-erbe-cpt-tax' ),
		'view_item'                  => __( 'View tag', 'kebbet-erbe-cpt-tax' ),
		'update_item'                => __( 'Update tag', 'kebbet-erbe-cpt-tax' ),
		'add_new_item'               => __( 'Add new tag', 'kebbet-erbe-cpt-tax' ),
		'new_item_name'              => __( 'New tag name', 'kebbet-erbe-cpt-tax' ),
		'separate_items_with_commas' => __( 'Separate art year tags with commas', 'kebbet-erbe-cpt-tax' ),
		'search_items'               => __( 'Search tags', 'kebbet-erbe-cpt-tax' ),
		'add_or_remove_items'        => __( 'Add or remove tags', 'kebbet-erbe-cpt-tax' ),
		'choose_from_most_used'      => __( 'Choose from the most used tags', 'kebbet-erbe-cpt-tax' ),
		'not_found'                  => __( 'No tags found.', 'kebbet-erbe-cpt-tax' ),
		'popular_items'              => __( 'Popular tags', 'kebbet-erbe-cpt-tax' ),
		'parent_item'                => __( 'Parent tag', 'kebbet-erbe-cpt-tax' ),
		'parent_item_colon'          => __( 'Parent tag:', 'kebbet-erbe-cpt-tax' ),
		'back_to_items'              => __( '&larr; Back to tags', 'kebbet-erbe-cpt-tax' ),
		'name_field_description'     => __( 'The name is how it appears in the user interface.', 'kebbet-erbe-cpt-tax' ),
		'slug_field_description'     => __( 'The &#8220;slug&#8221; is a sanitized version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens. Do not change if not needed.', 'kebbet-erbe-cpt-tax' ),
		'desc_field_description'     => __( 'The description is not used.', 'kebbet-erbe-cpt-tax' ),
	);

	$capabilities = array(
		'manage_terms' => 'manage_categories', // Previous 'manage_options'.
		'edit_terms'   => 'manage_categories', // Previous 'manage_options'.
		'delete_terms' => 'manage_categories', // Previous 'manage_options'.
		'assign_terms' => 'publish_posts',
	);

	$tax_args = array(
		'capabilities'          => $capabilities,
		'hierarchical'          => false,
		'has_archive'           => false,
		'labels'                => $tax_labels,
		'public'                => false,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => false,
		'show_in_rest'          => true,
		'rewrite'               => false,
		'description'           => __( 'Metadata tag for sorting and grouping posts.', 'kebbet-erbe-cpt-tax' ),
	);

	register_taxonomy( TAXONOMY, POST_TYPES, $tax_args );
}
