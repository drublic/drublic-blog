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
    </footer>
  </div>


  <!-- JavaScript at the bottom for fast page loading -->
  <?php wp_footer(); ?>

  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="<?php bloginfo( 'template_url' ); ?>/js/plugins.js"></script>
  <script defer src="<?php bloginfo( 'template_url' ); ?>/js/main.js"></script>
  <!-- end scripts-->

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
