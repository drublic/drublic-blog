<?php
/**
 * The loop that displays posts.
 *
 * @package WordPress
 * @subpackage drublic-blog
 * @since drublic-blog 1.0
 */
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<article id="post-0" class="post error404 not-found">
    <header>
      <hgroup>
        <h1><?php _e( 'Not Found', 'twentyten' ); ?></h1>
      </hgroup>
    </header>
    
    <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
		<?php get_search_form(); ?>
	</div>
<?php endif; ?>



<?php
  // Start the Loop.
  $iterator = 0;
  while ( have_posts() ) : the_post();
?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
      <hgroup>
        <h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="entry-title"><?php the_title(); ?></a></h1>
      </hgroup>
		  <time datetime="<?php print get_the_date('c'); ?>" rel="updated"><?php the_date(); ?></time>
		  <span class="author">
		    by
		    <a href="<?php print get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php print sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ); ?>" rel="author"><?php the_author(); ?></a>
		    <?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
		  </span>
		</header>

    <?php if ( get_the_post_thumbnail() != "" ) : ?>
      <figure class="alignleft">
        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
      </figure>
    <?php endif; ?>
    <?php if ($iterator++ == 0) : ?>
      <?php the_content(); ?>
    <?php else : ?>
      <?php the_excerpt(); ?>
    <?php endif; ?>

  </article>
  
  <hr>

<?php endwhile; // End the loop. Whew. ?>

<?php // Display navigation to next/previous pages when applicable ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
  <nav id="post-nav" class="nav-loop">
    <div class="prev"><?php next_posts_link( '<span class="meta-nav">' . _x( '&larr;', 'Next posts', 'twentyten' ) . '</span> Older posts' ); ?></div>
    <div class="next"><?php previous_posts_link( 'Newer Posts <span class="meta-nav">' . _x( '&rarr;', 'Previous Posts', 'twentyten' ) . '</span> ' ); ?></div>
    <div class="clearfix"></div>
  </nav>
<?php endif; ?>
