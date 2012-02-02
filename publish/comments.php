<?php
/**
 * The template for displaying Comments.
 *
 * @package WordPress
 * @subpackage drublic-blog
 * @since drublic-blog 1.0
 */
?> <section id=comments> <?php if ( have_comments() ) : ?> <?php wp_list_comments( array( 'callback' => 'twentyten_comment' ) ); ?> <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?> <div class=navigation> <div class=prev><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'twentyten' ) ); ?></div> <div class=next><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div> </div> <?php endif; ?> <?php endif; ?> <?php drublic_comment_form(); ?> </section> <hr>