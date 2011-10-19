<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage drublic-blog
 * @since drublic-blog 1.0
 */

get_header(); ?> <section class="error404 not-found"> <h1 class=page-title><?php _e( 'Not Found', 'twentyten' ); ?></h1> <p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'twentyten' ); ?></p> <h2>Use the search!</h2> <?php get_search_form(); ?> <h2>Tags</h2> <?php wp_tag_cloud(); ?> </section> <hr> <?php get_footer(); ?>