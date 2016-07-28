<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package En_Masse_Magazine
 */

?>
		<section class="mobile-social">
            <ul class="h-list center">
                <li class="h-list__item"><a class="h-list__link ss-icon ss-social-circle" href="#">facebook</a></li>
                <li class="h-list__item"><a class="h-list__link ss-icon ss-social-circle" href="#">instagram</a></li>
                <li class="h-list__item"><a class="h-list__link ss-icon ss-social-circle" href="#">twitter</a></li>
            </ul> <!-- /.h-list -->   
        </section> <!-- /.mobile-social -->
	</main>
	<footer class="footer">
        <section class="footer-top">
            <div class="footer-top__inner">
                <div class="row">
                    <div class="footer__social">
                        <ul class="h-list">
                            <li class="h-list__item"><a class="h-list__link" href="#"><span class="ss-icon color__accent">facebook</span>&nbsp;facebook</a>&nbsp;&nbsp;&nbsp;</li>
                            <li class="h-list__item"><a class="h-list__link" href="#"><span class="ss-icon color__accent">instagram</span>&nbsp;instagram</a>&nbsp;&nbsp;&nbsp;</li>
                            <li class="h-list__item"><a class="h-list__link" href="#"><span class="ss-icon color__accent">twitter</span>&nbsp;twitter</a>&nbsp;&nbsp;&nbsp;</li>
                        </ul> <!-- /.h-list -->    
                    </div> <!-- /.footer__social -->
                </div> <!-- /.row -->
                <div class="row">
                    <ul id="instafeed" class="instagram-feed gallery">
                    </ul> <!-- /.instagram-feed -->     
                </div> <!-- /.row -->
                <div class="row">
                    <?php dynamic_sidebar('footer-sidebar'); ?>
                </div> <!-- /.row -->
            </div> <!-- /.footer-top__inner -->
        </section> <!-- /.footer-top -->
        <section class="footer-bottom">
            <div class="footer-bottom__inner">
                <div class="logo-alt">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/global/logo-alt.svg" alt="Logo Alt">
                </div> <!-- /.logo-alt -->
                <div class="footer-copy">
                    <p class="paragraph--copy">&copy; 2016 All Rights Reserved</p>
                </div> <!-- /.footer-copy -->
                <div class="clearfix"></div>
            </div> <!-- /.footer-bottom__inner -->
        </section> <!-- /.footer-bottom -->
    </footer> 
<?php wp_footer(); ?>
</body>
</html>
