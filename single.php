<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage drublic-blog
 * @since drublic-blog 1.0
 */

get_header(); ?>


<?php if (!function_exists('is_linked_list')) { ?>
	<section class="message">
		<p>Please install the <a href='http://wordpress.org/extend/plugins/daring-fireball-linked-list/'>Daring Fireball-style Linked List</a> plugin!</p>
	</section>
<?php
		function is_linked_list() {
			return false;
		}
	}
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<?php if (is_linked_list()) : ?>
				<h1><a href="<?php the_linked_list_link(); ?>" title="<?php printf( esc_attr__( '%s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="entry-title"><?php the_title(); ?> &rarr;</a></h1>
			<?php else : ?>
				<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="entry-title"><?php the_title(); ?></a></h1>
			<?php endif; ?>

			<time datetime="<?php print get_the_date('c'); ?>" rel="updated"><?php the_date(); ?></time>

			<span class="author">
				by
				<a href="<?php print get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php print sprintf( esc_attr__( 'View all posts by %s', 'drublic-blog' ), get_the_author() ); ?>" rel="author"><?php the_author(); ?></a>
			</span>

			<?php if (is_linked_list()) : ?>
				<span class="permalink"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink for %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>">&#9776;</a></span>
			<?php endif; ?>

			<span class="categories"><?php the_category(' '); ?></span>
		</header>

		<?php if ( get_post_meta( get_the_ID(), 'posts-header', true ) != '' ) : ?>
			<?php print get_post_meta( get_the_ID(), 'posts-header', true ); ?>
		<?php endif; ?>

		<?php if ( get_the_post_thumbnail() != "" ) : ?>
			<figure class="aligncenter">
				<?php the_post_thumbnail( 'medium' ); ?>
			</figure>
		<?php endif; ?>

		<?php
			$oldness = ( time() - mktime(0, 0, 0, get_the_date('n'), get_the_date('j'), get_the_date('Y')) ) / 60 / 60 / 24 ;
			$oldness = (int) $oldness;
		?>
		<?php if ($oldness > 180 ) : ?>
			<div class="message">
				<h3>Hey there&hellip;</h3>
				<p>This post is <?php print $oldness; ?> days old. It was written on <?php print get_the_date('d.m.Y'); ?>. Please make sure to be careful with the information provided and check a more recent source on this topic.</p>
			</div>
		<?php endif; ?>

		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'drublic-blog' ), 'after' => '</div>' ) ); ?>
		<p class="tags"><?php the_tags('', ' ', ''); ?></p>

		<div class="share-post">
			<script type="text/x-handlebars-template" id="share-post">
				<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-count="horizontal" data-via="drublic" data-related="drublic">Tweet</a>

				<g:plusone size="medium"></g:plusone>
			</script>
		</div>
	</article>
	<hr>

	<?php comments_template( '', true ); ?>

	<nav id="post-nav">
		<div class="prev"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'drublic-blog' ) . '</span> %title' ); ?></div>
		<div class="next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'drublic-blog' ) . '</span>' ); ?></div>
		<div class="clearfix"></div>
	</nav>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
