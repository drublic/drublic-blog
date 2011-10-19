<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage drublic-blog
 * @since drublic-blog 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) : ?>
  <h1 class="page-title"><?php printf( __( 'Search Results for %s', 'twentyten' ), '<i>' . get_search_query() . '</i>' ); ?></h1>
	<?php get_template_part( 'loop', 'search' ); ?>
<?php else : ?>
	<article id="post-0" class="post no-results not-found">
    <header>
      <hgroup>
        <h1><?php _e( 'Not Found', 'twentyten' ); ?></h1>
      </hgroup>
    </header>
    
    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some other keyword.', 'twentyten' ); ?></p>
		<?php get_search_form(); ?>
		
  </article>
  <hr>

<?php endif; ?>

<?php get_footer(); ?>
