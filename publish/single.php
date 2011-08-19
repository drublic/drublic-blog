<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?> <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?> <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <header> <?php comments_popup_link( __( '0', 'twentyten' ), __( '1', 'twentyten' ), __( '%', 'twentyten' ), 'comment-count' ); ?> <hgroup> <h1><?php the_title(); ?></h1> </hgroup> <time> <?php the_date(); ?> - <?php print get_the_time() ;?> </time> <span class=author> by <a href="<?php print get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php print sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ); ?>"><?php the_author(); ?></a> <?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?> </span> <span class=tags><?php the_category( ', ' ); ?></span> </header> <?php if ( get_the_post_thumbnail() != "" ) : ?> <figure class=aligncenter> <?php the_post_thumbnail( 'medium' ); ?> </figure> <?php endif; ?> <?php the_content(); ?> <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?> </article> <hr> <?php comments_template( '', true ); ?> <nav id=post-nav> <div class=prev><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div> <div class=next><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div> <div class=clearfix></div> </nav> <?php endwhile; // end of the loop. ?> <?php get_footer(); ?>