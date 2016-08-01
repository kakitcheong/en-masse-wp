<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package En_Masse_Magazine
 */

get_header();
$categories = get_the_category();
while ( have_posts() ) : the_post(); 
?>
<div class="breadcrumb-bar">
    <ol class="breadcrumb-bar__list h-list">
        <li class="breadcrumb-bar__item h-list__item"><a class="breadcrumb-bar__link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
        <li class="breadcrumb-bar__item h-list__item">
        	<a class="breadcrumb-bar__link" href="
        	<?php
				if (!empty($categories)) {
    				foreach($categories as $category) {
    					echo esc_url(get_category_link($category->term_id));
    				}
				}
			?>">
			<?php 
				if (!empty($categories)) {
						echo esc_html($categories[0]->name);   
					}
			?>
			</a>
		</li>
        <li class="breadcrumb-bar__item h-list__item"><a class="breadcrumb-bar__link--active" href="#"><?php the_title(); ?></a></li>
    </ol>
</div> <!-- /.breadcrumb-bar -->
<div class="post-opening bg__img" data-bg="<?php if(has_post_thumbnail()){ the_post_thumbnail_url('full'); } ?>">
    <div class="post-opening__container-outer">
        <div class="post-opening__container-inner">
            <h1 class="h1--single-opening"><?php the_title(); ?></h1>
        </div> <!-- /.post-opening__container-inner -->
    </div> <!-- /.post-opening__container-outer -->
</div> <!-- /.post-opening -->
<div class="row">
	<section class="post-content">
	<?php
	get_template_part( 'template-parts/content', 'single' );
	wpb_get_post_views(get_the_ID());
	//the_post_navigation(); ?>
	
	<div class="post-content__social-share">
        <div class="section-title--share">
            Share Post    
        </div> <!-- /.section-title -->
        <ul class="h-list--lg pull--center">
            <li class="h-list__item"><a class="h-list__link ss-icon ss-social-circle" href="#">facebook</a></li>
            <li class="h-list__item"><a class="h-list__link ss-icon ss-social-circle" href="#">twitter</a></li>
            <li class="h-list__item"><a class="h-list__link ss-icon ss-social-circle" href="#">linkedin</a></li>
            <li class="h-list__item"><a class="h-list__link ss-icon ss-social-circle" href="#">pinterest</a></li>
        </ul> <!-- /.h-list -->
    </div> <!-- /.post-content__social-share -->
	
	<?php 
	// If comments are open or we have at least one comment, load up the comment template. -- temporally off
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif; 
	endwhile; // End of the loop.
	?>
	    <div class="post-content__navigation single-navigation">
            <div class="single-navigation__prev">
            	<?php $prev_post = get_previous_post();
            	if (!empty($prev_post)): ?>
	                <a href="<?php echo $prev_post->guid; ?>">
	                    <span class="single-navigation__indicator">&#10094;</span>
	                    <h4 class="single-navigation__post-title--prev h4"><?php echo $prev_post->post_title; ?></h4>
	                </a>
                <?php endif; ?>    
            </div> <!-- /.single-navigation__prev -->
            <div class="single-navigation__next">
            	<?php $next_post = get_next_post();
            	if (!empty($next_post)): ?>
	                <a href="<?php echo $next_post->guid; ?>">
	                    <h4 class="single-navigation__post-title--next h4"><?php echo $next_post->post_title; ?></h4>
	                    <span class="single-navigation__indicator">&#10095;</span>
	                </a>
                <?php endif; ?>   
            </div> <!-- /.single-navigation__next -->  
        </div> <!-- /.post-content__navigation -->
        <section class="related-posts">
        <div class="section-title--no-spacer">
            Related Posts
        </div>
        <div class="row">
        <?php 
        	$args = array(
				'posts_per_page' => 3,
				'orderby'	=> 'rand',
				'category_name' => $categories[0]->name,
			);
			$query = new WP_Query($args);
			while ($query->have_posts()) : $query->the_post(); 
		?>
			<article class="post--sm">
                <a href="<?php esc_url(get_permalink()); ?>" class="post__link--img">
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
                	<?php the_title('<h4 class="h4--alt"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>'); ?>
                </div> <!-- /.post__title -->
            </article> <!-- /.post -->
        <?php 
        	endwhile;
        	wp_reset_postdata();
        ?>  
        </div> <!-- /.row -->
    </section> <!-- /.related-posts -->
	</section> <!-- /.post-content -->
	<aside class="aside">
		<?php get_sidebar(); ?>
	</aside>
</div> <!-- /.row -->	
<?php
get_footer();
