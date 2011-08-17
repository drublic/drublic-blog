<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage drublic
 * @since drublic 1.0
 */
?>
    </div>
    
    
    <footer>
      <div class="inner clearfix">
        <?php
        	/* A sidebar in the footer? Yep. You can can customize
        	 * your footer with four columns of widgets.
        	 */
        	get_sidebar( 'footer' );
        ?>
      </div>
    </footer>
  </div>


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php bloginfo( 'template_url' ); ?>/js/libs/jquery-1.6.1.min.js"><\/script>')</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="<?php bloginfo( 'template_url' ); ?>/js/plugins.js"></script>
  <script defer src="<?php bloginfo( 'template_url' ); ?>/js/script.js"></script>
  <!-- end scripts-->


<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
