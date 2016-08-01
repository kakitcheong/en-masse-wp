<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package En_Masse_Magazine
 */

?>
<?php 
	$categories = get_the_category();
?>
<article id="post-<?php the_ID(); ?>" 
	<?php 
		if($wp_query->current_post == 0){
			post_class('post post--alpha'); 	
		} else{
			post_class('post');
		}
	?>>
	<div class="post__label">
		<h4 class="h4--reversed">
			<a class="post__cat-link" href="
				<?php
					if (!empty($categories)) {
	    				foreach($categories as $category) {
	    					echo esc_url(get_category_link($category->term_id));
	    				}
					}
				?>
			">
				<?php
					if (!empty($categories)) {
    					echo esc_html($categories[0]->name);   
					}
				?>
			</a>
		</h4>
	</div> <!-- /.post__label -->
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
        <?php the_title('<h3 class="h3"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>  
    </div> <!-- /.post__title -->
    <p class="post__excerpt">
    	<?php echo custom_excerpts(30); ?>
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
</article><!-- #post-## -->