<?php
/**
 * Template part for displaying posts in category.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package En_Masse_Magazine
 */

?>
<article id="post-<?php the_ID(); ?>" class="post--sm">
	<a href="<?php esc_url(the_permalink()); ?>" class="post__link--img">
        <div class="post__img bg__img">
            <div class="post__img-overlay">
                <?php 
                	if (has_post_thumbnail()) {
					    the_post_thumbnail();
					}
                ?>
            </div> 
        </div> <!-- /.post__img -->
    </a> <!-- /.post__link--img -->
    <div class="post__title">
        <?php 
        	the_title('<h4 class="h4--alt"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>'); 
        ?>  
    </div> <!-- /.post__title -->
</article><!-- #post-## -->