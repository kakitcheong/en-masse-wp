<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package En_Masse_Magazine
 */

?>
<article id="post-<?php the_ID(); ?>" class="post--lg<?php if($wp_query->current_post == 0){ echo "--alpha"; } ?>">
	<div class="post--lg__wrap">
		<div class="post__title--result">
        	<?php the_title('<h2 class="h2--lg"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');  ?>
        </div> <!-- /.post__title--result -->
        <p class="post__excerpt--lg">
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
	</div> <!-- /.post--lg__wrap -->
</article><!-- #post-## -->
