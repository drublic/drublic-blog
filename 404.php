<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
  <div id="content" role="main">

    <section class="error404 not-found">
		  <h1><?php _e( 'Not Found', 'twentyten' ); ?></h1>
      <p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</section>
		
  </div>
	<script>
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>
	<hr>

<?php get_footer(); ?>