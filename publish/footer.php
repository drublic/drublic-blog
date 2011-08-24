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
?> </div> <footer> <div class="inner clearfix"> <?php
        	/* A sidebar in the footer? Yep. You can can customize
        	 * your footer with four columns of widgets.
        	 */
        	get_sidebar( 'footer' );
        ?> </div> </footer> </div> <?php wp_footer(); ?> <script>window.jQuery||document.write('<script src="<?php bloginfo( 'template_url' ); ?>/js/libs/jquery-1.6.2.min.js"><\/script>');</script> <script defer src='<?php bloginfo( 'template_url' ); ?>/js/24acdfa736eadf78fee0ee14b1902c7cd49a722f.js'></script> <script defer src="https://apis.google.com/js/plusone.js"></script> <script defer src="http://platform.twitter.com/widgets.js"></script> <script>var pkBaseURL=(("https:"==document.location.protocol)?"https://drublic.de/piwik/":"http://drublic.de/piwik/");document.write('<script src="'+pkBaseURL+'piwik.js"><\/script>');</script><script>try{var piwikTracker=Piwik.getTracker(pkBaseURL+"piwik.php",1);piwikTracker.trackPageView();piwikTracker.enableLinkTracking()}catch(err){};</script><noscript><p><img src="http://drublic.de/piwik/piwik.php?idsite=1" style="border:0" alt=""/></p></noscript> </body> </html>