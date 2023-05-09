<?php
/**
 * Modifies fields in the form, for the taxonomy.
 *
 * @since 1.2.1
 *
 * @package kebbet-erbe-cpt-tax
 * @subpackage taxonomy-arttype
 * @author Erik Betshammar
 */

namespace kebbet\erbe\cpt_tax\taxonomy\arttype\acf;

use const kebbet\erbe\cpt_tax\taxonomy\arttype\TAXONOMY;

if ( class_exists( 'ACF' ) ) :
	/**
	 * Add field group for post type meta data
	 * 
	 * @since 1.2.1
	 *
	 * @return void
	 */
	function add_group() {
		acf_add_local_field_group( options() );
	}
	add_action( 'acf/init', __NAMESPACE__ . '\add_group' );

	/**
	 * Return the options for the field group
	 * 
	 * @since 1.2.1
	 *
	 * @return array
	 */
	function options() {
		return array(
			'key' => 'group_6458dd3fc4cab',
			'title'                 => __( 'Plural label', 'kebbet-erbe-cpt-tax' ),
			'fields'                => array(
				array(
					'key'               => 'field_6458dd409c0c5',
					'label'             => __( 'Plural version of label', 'kebbet-erbe-cpt-tax' ),
					'name'              => 'plural_label',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value' => '',
					'maxlength'     => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'taxonomy',
						'operator' => '==',
						'value'    => TAXONOMY,
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
			'show_in_rest'          => 0,
		);
	}
endif;
