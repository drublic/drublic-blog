<?php
/**
 * The template for displaying attachments.
 *
 * @package WordPress
 * @subpackage drublic-blog
 * @since drublic-blog 1.0
 */

get_header(); ?>
  <?php get_template_part( 'loop', 'attachment' ); ?>
<?php get_footer(); ?>