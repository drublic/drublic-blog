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
			<?php get_sidebar( 'footer' ); ?>

			<div class="follow-me">
				<a href="https://twitter.com/drublic" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @drublic</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
		</footer>
	</div>


	<!-- JavaScript at the bottom for fast page loading -->
	<?php wp_footer(); ?>

	<script defer src="<?php bloginfo( 'template_url' ); ?>/js/plugins.js"></script>
	<script defer src="<?php bloginfo( 'template_url' ); ?>/js/main.js"></script>

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
