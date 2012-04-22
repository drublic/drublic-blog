<?php
/**
 * TwentyTen functions and definitions
 *
 * @package WordPress
 * @subpackage drublic-blog
 * @since drublic-blog 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
 
/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
	) );

}
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Twenty Ten 1.0
 * @return int
 */
function twentyten_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twenty Ten 1.0
 * @return string "Continue Reading" link
 */
function twentyten_continue_reading_link() {
	return '<p class="readmore"><a href="'. get_permalink() . '"><span>&rsaquo;</span> Read more</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function twentyten_auto_excerpt_more( $more ) {
	return twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function twentyten_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyten_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 *
 * @since Twenty Ten 1.2
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 *
 * @since Twenty Ten 1.0
 * @deprecated Deprecated in Twenty Ten 1.2 for WordPress 3.1
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function twentyten_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backwards compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
	add_filter( 'gallery_style', 'twentyten_remove_gallery_css' );

if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="avatar"><?php echo get_avatar( $comment, 64 ); ?></div>
		
		<p class="author"><cite><?php comment_author_link() ?></cite></p>

		<time><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php comment_date() ?> - <?php comment_time(); ?></a></time>
    <?php print edit_comment_link( '(Edit)' ) ?>
    
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<p class="comment-awaiting-moderation"><em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em></p>
		<?php endif; ?>

		<?php comment_text(); ?>

		<div class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
	</div>
	<?php
			break;
		case 'pingback'  :
		
	?>
	<div class="pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
  </div>
	<?php
			break;
		case 'trackback' :
	?>
	<div class="pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
  </div>
	<?php
			break;
	endswitch;
	?>
  <hr>
  <?php
}
endif;




if ( ! function_exists( 'twentyten_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_posted_on() {
}
endif;

if ( ! function_exists( 'twentyten_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Twenty Ten 1.0
 */
function twentyten_posted_in() {
}
endif;






if ( ! function_exists( 'drublic_comment_form' ) ) :


function drublic_comment_form() {
  return comment_form( array(
    'fields' => array(
    	'author' => '<fieldset>' .
    	               '<label for="author">' . __( 'Name' ) . '<span class="required">*</span>' . '</label> ' .
    	               '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . '>' .
    	             '</fieldset>',
    	'email'  => '<fieldset>' .
    	               '<label for="email">' . __( 'E-Mail' ) . '<span class="required">*</span>' . '</label> ' .
    	               '<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . '>' .
    	            '</fieldset>',
    	'url'    => '<fieldset>' .
    	               '<label for="url">' . __( 'Website' ) . '</label>' .
    	               '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '">' .
    	             '</fieldset>',
    ),
    'comment_field' => '<fieldset>' .
                          '<label for="comment">' . _x( 'Comment', 'noun' ) . '</label>' .
                          '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' .
                        '</fieldset>',
    'comment_notes_before' => '<p>Remember what your mother told you: Be friendly. <small>Your email address will not be published.</small><br>There are <a href="#/markdown">some Markdown-Goodies</a> available.',
    'comment_notes_after' => '',
    'title_reply' => __('Leave a Comment')
  ) );

}


endif;









// Remove Feed
remove_action( 'wp_head', 'feed_links_extra'); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links'); // Display the links to the general feeds: Post and Comment Feed









if ( !function_exists( 'drublic_preprocess_comment' ) ) :
function drublic_preprocess_comment( $comment ) {
  // Replace all appereances of __ and ** with <i>
  $comment['comment_content'] = preg_replace( '/__(.*?)__/is', '<b>$1</b>', $comment['comment_content'] );
  $comment['comment_content'] = preg_replace( '/\*\*(.*?)\*\*/is', '<strong>$1</strong>', $comment['comment_content'] );
  
  // Replace all appereances of _ and * with <i> and <em>
  $comment['comment_content'] = preg_replace( '/_(.*?)_/is', '<i>$1</i>', $comment['comment_content'] );
  $comment['comment_content'] = preg_replace( '/\*(.*?)\*/is', '<em>$1</em>', $comment['comment_content'] );
  
  // Replace all appereances of ` with <code>
  $comment['comment_content'] = preg_replace( '/`(.*?)`/is', '<code>$1</code>', $comment['comment_content'] );

  return $comment;
}
endif;
add_filter('preprocess_comment', 'drublic_preprocess_comment');






// Markdown-Text
if ( isset( $_GET['get_markdown'] ) ) {
  include ( 'ajax/markdown.php' );
}




require('functions/includes.php');




