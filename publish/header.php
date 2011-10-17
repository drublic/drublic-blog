<?php
/**
 * The Header for the theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage @drublic
 * @since @drublic 1.0
 */
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js ie7 oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--> <html class=no-js <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  
  

  
  <meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">

  <title><?php
	// Print the <title> tag based on what is being viewed.
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>

  
  <meta name=viewport content="width=device-width, initial-scale=1.0">

  
  
  <link rel=profile href="http://gmpg.org/xfn/11">
  
  
  <link rel=stylesheet href='<?php bloginfo( 'template_url' ); ?>/css/aedf011356a3ffe086ef5cd32845fac456486ce4.css'>

  
  <link rel=pingback href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel=alternate type="application/rss+xml" title="@drublic &raquo; Feed" href="http://feeds.feedburner.com/drublic">

  
  <script src="<?php bloginfo( 'template_url' ); ?>/js/libs/modernizr.custom.65404.js"></script>
  
  
  <script src="http://use.typekit.com/nls7qda.js"></script>
  <script>try{Typekit.load()}catch(e){};</script>
  
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>

  <div id=container>
    <header id=header>
      <div id=inner-header class=clearfix>
        <div id=logo>
          <a href="http://drublic.de">@drublic</a> / <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel=home>blog</a>
          <div class=visuallyhidden><?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?></div>
        </div>
        
        <ul id=misc>
          <li class=search-icon><a href="#/search" title="Try searching&hellip;">Search</a></li>
        </ul>
        
        <div id=search class=content-widget>
          <a href="#/close/search" title="Close the search" class=close>&times;</a>
          <div class=inner>
            <form action="<?php bloginfo( 'home' ); ?>/" method=post>
              <fieldset>
                <label for=s>Search the articles</label>
                <input type=search id=s name=s>
              </fieldset>
              
              <fieldset>
                <input type=submit id=submit-search name=submit-search value=Search>
              </fieldset>
            </form>
          </div>
        </div>
        
      </div>
    </header>
    
    <div id=main role=main>