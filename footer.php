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

	<!-- scripts concatenated and minified via ant build script-->
	<script defer src="<?php bloginfo( 'template_url' ); ?>/js/plugins.js"></script>
	<script defer src="<?php bloginfo( 'template_url' ); ?>/js/main.js"></script>
	<!-- end scripts-->

	<!-- AdPacks.com Ad Code -->
	<script type="text/javascript">
		(function(){
			var bsa = document.createElement('script');
				bsa.type = 'text/javascript';
				bsa.async = true;
				bsa.src = '//s3.buysellads.com/ac/bsa.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
		}());
	</script>
	<!-- End AdPacks.com Ad Code -->

	<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-41497561-1');ga('send','pageview');
	</script>

	<!-- Piwik -->
	<script>
		var pkBaseURL = (("https:" == document.location.protocol) ? "https://piwik.drublic.de/" : "http://piwik.drublic.de/");
		document.write('<script src="' + pkBaseURL + 'piwik.js"><\/script>');
	</script><script>
		try {
			var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);
			piwikTracker.trackPageView();
			piwikTracker.enableLinkTracking();
		} catch( err ) {}
	</script><noscript><p><img src="http://piwik.drublic.de/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>
	<!-- End Piwik Tracking Code -->

</body>
</html>
