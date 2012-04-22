<?php
/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override wpak_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since WordPress Admin-Kit 1.0
 * @uses register_sidebar
 */

if (!function_exists('wpak_widgets_init')) :
function wpak_widgets_init() {


	// Sidebar. Empty by default.
	register_sidebar( array(
		'name' => 'Footer Widget Area',
		'id' => 'footer-widget-area',
		'description' => 'The footer widget area',
		'before_widget' => '<div class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );

}
endif;

/** Register sidebars by running wpak_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'wpak_widgets_init' );







