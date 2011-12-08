<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage drublic-blog
 * @since drublic-blog 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) the_post(); ?>
  <h1 class=page-title><?php printf( __( 'Author Archives for %s', 'twentyten' ), "<a href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h1>

<?php
if ( get_the_author_meta( 'description' ) ) : ?>
					<div id=entry-author-info>
						<div id=author-avatar>
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
						</div>
						<div id=author-description>
							<h2><?php printf( __( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
						</div>
					</div>
<?php endif; ?>

  <?php
    rewind_posts();
    get_template_part( 'loop', 'author' );
  ?>
<?php get_footer(); ?>