<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage drublic-blog
 * @since drublic-blog 1.0
 */
?>
	</div>

	<footer class="footer">
		<img src="//drublic.de/img/me.jpg" class="le-me">

		<div class="footer__follow">
			<a href="https://twitter.com/drublic" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @drublic</a>
		</div>

		<p>Made with love. <?php print date('Y'); ?>. Köln, Germany. <a href="//drublic.de/#imprint" title="Who does this stuff?">Legal</a>.</p>

		<ul class="social-media-links">
			<li class="rss"><a href="http://feeds.feedburner.com/drublic">Subscribe to Feed</a></li>
			<li class="github"><a href="https://github.com/drublic">Github</a></li>
			<li class="twitter"><a href="https://twitter.com/drublic">Twitter</a></li>
			<li class="google-plus"><a href="https://plus.google.com/112019818423540363330?rel=author">Google+</a></li>
		</ul>

		<a href="#" class="visuallyhidden">go back up to top</a>
	</footer>


	<!-- JavaScript at the bottom for fast page loading -->
	<?php wp_footer(); ?>


	<script src="//drublic.de/js/headroom.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/main.js"></script>
	<script src="//drublic.de/js/main.js"></script>

	<script>
		!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];
		if(!d.getElementById(id)){js=d.createElement(s);js.id=id;
		js.src='//platform.twitter.com/widgets.js';
		fjs.parentNode.insertBefore(js,fjs);}}(document,'script','twitter-wjs');
	</script>

	<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-41497561-1');ga('send','pageview');
	</script>
</body>
</html>
