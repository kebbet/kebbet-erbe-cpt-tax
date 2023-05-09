<?php
/**
 * Adds and modifies the admin columns for the post type.
 *
 * @package kebbet-erbe-cpt-tax
 */

namespace kebbet\erbe\cpt_tax\cpt_work;

const POSTTYPE  = 'project';
const SLUG      = 'item';
const IS_PUBLIC = true;
const ICON      = 'admin-customizer';
const MENU_POS  = 9;
const THUMBNAIL = true;

/**
 * Register Custom Post Type
 */
function register() {

	$labels_args = array(
		'name'                     => _x( 'Works', 'Post Type General Name', 'kebbet-erbe-cpt-tax' ),
		'singular_name'            => _x( 'Work', 'Post Type Singular Name', 'kebbet-erbe-cpt-tax' ),
		'menu_name'                => __( 'Works', 'kebbet-erbe-cpt-tax' ),
		'name_admin_bar'           => __( 'Work-post', 'kebbet-erbe-cpt-tax' ),
		'parent_item_colon'        => __( 'Parent post:', 'kebbet-erbe-cpt-tax' ),
		'all_items'                => __( 'All posts', 'kebbet-erbe-cpt-tax' ),
		'add_new_item'             => __( 'Add new', 'kebbet-erbe-cpt-tax' ),
		'add_new'                  => __( 'Add new post', 'kebbet-erbe-cpt-tax' ),
		'new_item'                 => __( 'New post', 'kebbet-erbe-cpt-tax' ),
		'edit_item'                => __( 'Edit post', 'kebbet-erbe-cpt-tax' ),
		'update_item'              => __( 'Update post', 'kebbet-erbe-cpt-tax' ),
		'view_item'                => __( 'View post', 'kebbet-erbe-cpt-tax' ),
		'view_items'               => __( 'View posts', 'kebbet-erbe-cpt-tax' ),
		'search_items'             => __( 'Search posts', 'kebbet-erbe-cpt-tax' ),
		'not_found'                => __( 'Not found', 'kebbet-erbe-cpt-tax' ),
		'not_found_in_trash'       => __( 'No posts found in Trash', 'kebbet-erbe-cpt-tax' ),
		'featured_image'           => __( 'Artwork image', 'kebbet-erbe-cpt-tax' ),
		'set_featured_image'       => __( 'Set artwork image', 'kebbet-erbe-cpt-tax' ),
		'remove_featured_image'    => __( 'Remove artwork image', 'kebbet-erbe-cpt-tax' ),
		'use_featured_image'       => __( 'Use as artwork image', 'kebbet-erbe-cpt-tax' ),
		'insert_into_item'         => __( 'Insert into item', 'kebbet-erbe-cpt-tax' ),
		'uploaded_to_this_item'    => __( 'Uploaded to this post', 'kebbet-erbe-cpt-tax' ),
		'items_list'               => __( 'Items list', 'kebbet-erbe-cpt-tax' ),
		'items_list_navigation'    => __( 'Items list navigation', 'kebbet-erbe-cpt-tax' ),
		'filter_items_list'        => __( 'Filter items list', 'kebbet-erbe-cpt-tax' ),
		'archives'                 => __( 'Work-posts archive', 'kebbet-erbe-cpt-tax' ),
		'attributes'               => __( 'Work-post attributes', 'kebbet-erbe-cpt-tax' ),
		'item_published'           => __( 'Post published', 'kebbet-erbe-cpt-tax' ),
		'item_published_privately' => __( 'Post published privately', 'kebbet-erbe-cpt-tax' ),
		'item_reverted_to_draft'   => __( 'Post reverted to Draft', 'kebbet-erbe-cpt-tax' ),
		'item_scheduled'           => __( 'Post scheduled', 'kebbet-erbe-cpt-tax' ),
		'item_updated'             => __( 'Post updated', 'kebbet-erbe-cpt-tax' ),
		// 5.7 + 5.8
		'filter_by_date'           => __( 'Filter posts by date', 'kebbet-erbe-cpt-tax' ),
		'item_link'                => __( 'Work post link', 'kebbet-erbe-cpt-tax' ),
		'item_link_description'    => __( 'A link to a work post', 'kebbet-erbe-cpt-tax' ),
	);

	$supports_args = array(
		'title',
		'page-attributes',
		'editor',
	);

	if ( true === THUMBNAIL ) {
		$supports_args = array_merge( $supports_args, array( 'thumbnail' ) );
	}

	$rewrite_args      = array(
		'slug'       => SLUG,
		'with_front' => false,
		'pages'      => false,
		'feeds'      => true,
	);
	$capabilities_args = \kebbet\erbe\cpt_tax\cpt_work\roles\capabilities();
	$post_type_args    = array(
		'label'               => __( 'Work post type', 'kebbet-erbe-cpt-tax' ),
		'description'         => __( 'Custom post type for artistic work', 'kebbet-erbe-cpt-tax' ),
		'labels'              => $labels_args,
		'supports'            => $supports_args,
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => IS_PUBLIC,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => MENU_POS,
		'menu_icon'           => 'dashicons-' . ICON,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => IS_PUBLIC,
		'rewrite'             => $rewrite_args,
		'capabilities'        => $capabilities_args,
		// Adding map_meta_cap will map the meta correctly.
		'show_in_rest'        => true,
		'map_meta_cap'        => true,
	);
	register_post_type( POSTTYPE, $post_type_args );
}

/**
 * Enqueue plugin scripts and styles.
 *
 * @since 1.2.0
 *
 * @param string $page The page/file name.
 * @return void
 */
function enqueue_scripts( $page ) {
	$assets_pages = array(
		'index.php',
	);
	if ( in_array( $page, $assets_pages, true ) || 'edit-' . POSTTYPE === get_current_screen()->id ) {
		wp_enqueue_style( POSTTYPE . '_scripts', plugin_dir_url( __FILE__ ) . 'assets/style.css', array(), '1.2.0' );
	}
}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\enqueue_scripts' );

/**
 * Add the content to the `At a glance`-widget.
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/at-a-glance.php';

/**
 * Allow blocks for post type.
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/blocks.php';

/**
 * Adds and modifies the admin columns for the post type.
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/admin-columns.php';

/**
 * Adds admin messages for the post type.
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/admin-messages.php';

/**
 * Adjust roles and capabilities for post type
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/roles.php';
