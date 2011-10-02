<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?> <?php /* If there are no posts to display, such as an empty archive page */ ?> <?php if ( ! have_posts() ) : ?> <article id=post-0 class="post error404 not-found"> <header> <hgroup> <h1><?php _e( 'Not Found', 'twentyten' ); ?></h1> </hgroup> </header> <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p> <?php get_search_form(); ?> </div> <?php endif; ?> <?php
  // Start the Loop.
  while ( have_posts() ) : the_post();
?> <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <header> <?php comments_popup_link( __( '0', 'twentyten' ), __( '1', 'twentyten' ), __( '%', 'twentyten' ), 'comment-count' ); ?> <hgroup> <h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel=bookmark><?php the_title(); ?></a></h1> </hgroup> <time> <?php the_date(); ?> - <?php print get_the_time() ;?> </time> <span class=author> by <a href="<?php print get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php print sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ); ?>"><?php the_author(); ?></a> <?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?> </span> <span class=tags><?php the_category( ', ' ); ?></span> </header> <?php if ( get_the_post_thumbnail() != "" ) : ?> <figure class=alignleft> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel=bookmark><?php the_post_thumbnail( 'thumbnail' ); ?></a> </figure> <?php endif; ?> <?php the_excerpt(); ?> </article> <hr> <?php endwhile; // End the loop. Whew. ?> <?php // Display navigation to next/previous pages when applicable ?> <?php if (  $wp_query->max_num_pages > 1 ) : ?> <nav id=post-nav class=nav-loop> <div class=prev><?php previous_posts_link( '<span class="meta-nav">' . _x( '&larr;', 'Previous Posts', 'twentyten' ) . '</span> Previous Posts' ); ?></div> <div class=next><?php next_posts_link( 'Next posts <span class="meta-nav">' . _x( '&rarr;', 'Next posts', 'twentyten' ) . '</span>' ); ?></div> <div class=clearfix></div> </nav> <?php endif; ?>