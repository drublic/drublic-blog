<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage drublic-blog
 * @since drublic-blog 1.0
 */

get_header(); ?>
  <h1 class="page-title"><?php printf( __( 'Tag Archives: %s', 'twentyten' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>

	<?php get_template_part( 'loop', 'tag' ); ?>
<?php get_footer(); ?>
