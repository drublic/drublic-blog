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
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<!--
        Feel free to view and copy my source-code if you want to.
        Contact me if you have questions and check out the GitHub-Repo:
        https://github.com/drublic/drublic-blog

        This is under MIT licence, so take it!
	-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

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

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="//drublic.de/css/main.css">
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/style.css">

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

	<header class="header">

		<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="visuallyhidden">/drublic - <?php bloginfo( 'description' ); ?></a>
		<h1 role="banner">Front-End Development and Architecture</h1>
		<p>Hans Christian Reinl &ndash; @drublic</p>

		<nav class="header__navigation" role="navigation">
			<a href="#content" class="visuallyhidden">Skip to Content</a>

			<a href="#!" class="header__navigation__target" id="navigation"></a>

			<ul>
				<li><a href="//drublic.de/" title="@drublic - Front-End Architecture">Home</a></li>
				<li><a href="//drublic.de/resume/" title="Read more about me">About</a></li>
				<li class="is-active"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>">Blog</a></li>
				<li><a href="//drublic.de/#work" title="View some of the work I do">Portfolio</a></li>
				<li><a href="//drublic.de/#hire-me" title="I do client work and propably would love to work with you">Hire me</a></li>
				<li><a href="//drublic.de/#contact" title="Contact me if you have any questions">Contact</a></li>
			</ul>

			<a href="#navigation" class="header__navigation__toggle">☰</a>
		</nav>

		<div class="search" id="search">
			<a href="#/search" title="Try searching&hellip;" class="search-icon">Search</a>

			<form action="<?php bloginfo( 'home' ); ?>/" method="post">
				<label for="s">Search the articles</label>
				<input type="search" id="s" name="s">
				<input type="submit" id="submit-search" name="submit-search" value="Search">
			</form>
		</div>
	</header>


	<div id="main" class="site-main" role="main">

		<div class="bling-bling">
			<script src="//cdn.adpacks.com/adpacks.js?legacyid=1286691&zoneid=1386&key=f9595f19d8c79ead2bfaf64d7b4f4b6e&serve=C6SI42Y&placement=drublicde&circle=dev" id="_adpacks_js"></script>
		</div>

