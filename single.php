<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage drublic-blog
 * @since drublic-blog 1.0
 */

get_header(); ?>



<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
      <hgroup>
        <h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
      </hgroup>
		  <time datetime="<?php print get_the_date('c'); ?>"><?php the_date(); ?></time>
		  <span class="author">
		    by
		    <a href="<?php print get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php print sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ); ?>"><?php the_author(); ?></a>
		    <?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
		  </span>
		  
		  <span class="categories"><?php the_category( ', ' ); ?></span>
		</header>
    
    
    <?php if ( get_post_meta( get_the_ID(), 'posts-header', true ) != '' ) : ?>
      <?php print get_post_meta( get_the_ID(), 'posts-header', true ); ?>
    <?php endif; ?>
    
    <?php if ( get_the_post_thumbnail() != "" ) : ?>
      <figure class="aligncenter">
        <?php the_post_thumbnail( 'medium' ); ?>
      </figure>
    <?php endif; ?>
    
    <?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
		
		
		<div class="share-post">
		  <iframe src="http://www.facebook.com/plugins/like.php?href=<?php print urlencode( wp_get_shortlink() ); ?>&amp;layout=button_count&amp;show-faces=false&amp;width=90&amp;action=like&amp;font=arial&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:100px; height:20px"></iframe> 
		  
		  <a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-count="horizontal" data-via="drublic" data-related="drublic">Tweet</a>
		  
		  <g:plusone size="medium"></g:plusone>
		</div>
    
    <div class="instapaper">
		  <a href="http://www.instapaper.com/hello2?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Diesen Artikel später mit Instapaper lesen?" target="_blank" class="button">Instapaper</a>
		</div>
		
		
		<p class="tags"><?php the_tags( 'Tagged with: ' ); ?></p>
		
	</article>
	<hr>
	
	<?php comments_template( '', true ); ?>
	
  <nav id="post-nav">
    <div class="prev"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
    <div class="next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
    <div class="clearfix"></div>
  </nav>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
