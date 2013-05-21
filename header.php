<?php
/**
 * The Header for the theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage drublic-blog
 * @since drublic-blog 1.0
 */
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<!--
             _            _     _ _
          __| |_ __ _   _| |__ | (_) ___
         / _` | '__| | | | '_ \| | |/ __|
        | (_| | |  | |_| | |_) | | | (__
         \__,_|_|   \__,_|_.__/|_|_|\___|

        Feel free to view and copy my source-code if you want to.
        Contact me if you have questions and check out the GitHub- Repo:
        https://github.com/drublic/drublic-blog

        This is under MIT licence, so take it!

        Thanks for visiting,
        Hans

	-->

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
			 Remove this if you use the .htaccess -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

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

	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/style-12e.css">

	<!-- Feed -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="alternate" type="application/rss+xml" title="drublic &raquo; Feed" href="http://feeds.feedburner.com/drublic">

	<!-- All JavaScript at the bottom, except for Modernizr. -->
	<script src="<?php bloginfo( 'template_url' ); ?>/js/vendor/modernizr.custom.65404.js"></script>

<?php
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_head();
?>
</head>

<body <?php body_class(); ?>>

	<div id="container">
		<header id="header">
			<div id="logo">
				<a href="<?php echo home_url( '/' ); ?>" class="icon">&#x25B5;</a>
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">/drublic<span class="visuallyhidden"> - <?php bloginfo( 'description' ); ?></span></a>
			</div>

			<nav id="nav">
				<div class="visuallyhidden"><a href="#main">Skip to content</a></div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

				<div id="search">
					<a href="#/search" title="Try searching&hellip;" class="search-icon">Search</a>

					<form action="<?php bloginfo( 'home' ); ?>/" method="post">
						<label for="s">Search the articles</label>
						<input type="search" id="s" name="s">
						<input type="submit" id="submit-search" name="submit-search" value="Search">
					</form>
				</div>
			</nav>

			<ul class="social-media-links">
				<li class="rss"><a href="http://feeds.feedburner.com/drublic">Subscribe to Feed</a></li><li
					class="github"><a href="https://github.com/drublic">Github</a></li><li
					class="twitter"><a href="https://twitter.com/drublic">Twitter</a></li><li
					class="google-plus"><a href="https://plus.google.com/112019818423540363330?rel=author">Google+</a></li>
			</ul>
		</header>

		<div id="main" role="main">

			<div class="bling-bling">
				<div id="bsap_1286691" class="bsarocks bsap_f9595f19d8c79ead2bfaf64d7b4f4b6e"></div>
				<a href="http://adpacks.com" class="link">via Ad Packs</a>
			</div>
