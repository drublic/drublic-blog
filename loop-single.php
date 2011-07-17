<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <?php comments_popup_link( __( '0', 'twentyten' ), __( '1', 'twentyten' ), __( '%', 'twentyten' ), 'comment-count' ); ?>
        <hgroup>
          <h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        </hgroup>
  		  <time>
  		    <?php the_date(); ?> - <?php print get_the_time() ;?>
  		  </time>
  		  <span class="author">
  		    by
  		    <a href="<?php print get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php print sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ); ?>"><?php the_author(); ?></a>
  		    <?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
  		  </span>
  		  
  		  <span class="tags"><?php the_tags( 'Tags: ', ', ' ); ?></span>
  		</header>

      <?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
		</article>
		
		<?php comments_template( '', true ); ?>
		
    <div class="navigation">
      <div class="prev"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
      <div class="next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
    </div><!-- #nav-below -->

<?php endwhile; // end of the loop. ?>