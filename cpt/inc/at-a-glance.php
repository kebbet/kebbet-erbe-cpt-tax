<?php
/**
 * Adds post-type info to 'At a Glance'-dashboard widget.
 *
 * @package kebbet-erbe-cpt-tax
 */

namespace kebbet\erbe\cpt_tax\cpt_work\at_a_glance;

use const kebbet\erbe\cpt_tax\cpt_work\POSTTYPE;
use const kebbet\erbe\cpt_tax\cpt_work\ICON;

/**
 * Adds post-type info to 'At a Glance'-dashboard widget.
 *
 * @param array $items The items to display in the `At a Glance-dashboard`.
 * @return array $items All existing plus the new items.
 */
function at_a_glance_items( $items = array() ) {

	$post_types = array( POSTTYPE );

	foreach ( $post_types as $type ) {

		if ( ! post_type_exists( $type ) ) {
			continue;
		}
		$num_posts = wp_count_posts( $type );

		if ( $num_posts ) {
			$published = intval( $num_posts->publish );
			$post_type = get_post_type_object( $type );
			/* translators: %s: counter of how many posts. */
			$text      = _n( '%s work post', '%s work posts', $published, 'kebbet-erbe-cpt-tax' );
			$text      = sprintf( $text, number_format_i18n( $published ) );
			$edit_link = 'edit.php?post_type=' . $type;
			$css_class = $type . '-count';
			if ( ICON ) {
				$css_class .= ' dashicon-before dashicon-' . ICON;
			}

			if ( current_user_can( $post_type->cap->edit_posts ) ) {
				echo sprintf(
					'<li class="%1$s"><a href="%3$s">%2$s</a></li>',
					esc_attr( $css_class ),
					esc_html( $text ),
					esc_url ( $edit_link )
				) . "\n";
			} else {
				echo sprintf(
					'<li class="%1$s">%2$s</li>',
					esc_attr( $css_class ),
					esc_html( $text ),
				) . "\n";
			}
		}
	}
	return $items;
}
add_filter( 'dashboard_glance_items', __NAMESPACE__ . '\at_a_glance_items', 10, 1 );
