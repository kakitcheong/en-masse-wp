<?php
/**
 * Template part for displaying posts in category.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package En_Masse_Magazine
 */

?>
<?php
	if($wp_query->current_post <= 1){
		$lg_post = true;
	} else{
		$lg_post = false;
	}
?>
<article id="post-<?php the_ID(); ?>" class="post<?php if($lg_post){ echo "--lg"; if($wp_query->current_post == 0){ echo "--alpha"; }} ?>">
	<a href="<?php esc_url(the_permalink()); ?>" class="post__link--img">
        <div class="post<?php if($lg_post){ echo "--lg"; } ?>__img bg__img">
            <div class="post__img-overlay">
                <?php 
                	if (has_post_thumbnail()) {
					    the_post_thumbnail();
					}
                ?>
            </div> 
        </div> <!-- /.post<?php if($lg_post){ echo "--lg"; } ?>__img -->
    </a> <!-- /.post__link--img -->
    <?php if($lg_post){ echo '<div class="post--lg__wrap">'; } ?>
	    <div class="post__title">
	        <?php
	        	if($lg_post){ 
	        		the_title('<h2 class="h2--lg"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); 
	        	} else{
	        		the_title('<h3 class="h3"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
	        	}	
	        ?>  
	    </div> <!-- /.post__title -->
	    <p class="post__excerpt<?php if($lg_post){ echo "--lg"; } ?>">
	    	<?php echo get_the_excerpt(); ?>
	    </p> <!-- /.post__excerpt -->
	    <div class="post__meta">
	        <iron-icon src="<?php echo get_template_directory_uri() ?>/images/global/icons/clock-16px.svg"></iron-icon>&nbsp;
	        <span><?php echo get_the_date(); ?>&nbsp;|&nbsp;by&nbsp;<?php the_author_posts_link(); ?></span>
	        <div class="read-more">
                <iron-icon src="<?php echo get_template_directory_uri() ?>/images/global/icons/read-16px-lighter.svg"></iron-icon>
                <span><a href="<?php the_permalink(); ?>" class="read-more__link">read more</a></span>   
            </div> <!-- /.read-more -->
	        <div class="clearfix"></div>
	    </div> <!-- /.post__meta -->
	<?php if($lg_post){ echo '</div> <!-- /.post--lg__wrap -->'; } ?>
</article><!-- #post-## -->