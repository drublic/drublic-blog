<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) : ?>
				<h1 class="page-title"><?php printf( __( 'Search Results for %s', 'twentyten' ), '<i>' . get_search_query() . '</i>' ); ?></h1>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
	<article id="post-0" class="post no-results not-found">
    <header>
      <hgroup>
        <h1><?php _e( 'Not Found', 'twentyten' ); ?></h1>
      </hgroup>
    </header>
    
    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
		<?php get_search_form(); ?>
  </article>

<?php endif; ?>

<?php get_footer(); ?>
