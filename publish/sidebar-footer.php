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
	if (   ! is_active_sidebar( 'first-footer-widget-area'  )
		&& ! is_active_sidebar( 'second-footer-widget-area' )
		&& ! is_active_sidebar( 'third-footer-widget-area'  )
		&& ! is_active_sidebar( 'fourth-footer-widget-area' )
	) {
		return;
	}
?>

<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
  <div class=col-1>
    <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
  </div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
  <div class=col-2>
    <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
  </div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
  <div class=col-3>
		<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
  </div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
  <div class=col-4>
    <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
  </div>
<?php endif; ?>