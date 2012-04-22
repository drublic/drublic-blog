<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage drublic-blog
 * @since drublic-blog 1.0
 */
?>

<?php
	//If none of the sidebars have widgets, then let's bail early.
	if (!is_active_sidebar('footer-widget-area')) {
		return;
	}
?>

<?php
  if ( is_active_sidebar( 'footer-widget-area' ) ) :
    dynamic_sidebar( 'footer-widget-area' );
  endif;
?>


