<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package En_Masse_Magazine
 */

get_header(); ?>
<section class="hero-post">
	
</section> <!-- /.hero-post -->
<section class="feature-posts">
    <div class="row">
            <div class="hero-carousel">
            	<!-- replace display method here from first sticky post in each category to popular post -->
            	<?php
					$cat_name = array('trending', 'lifestyle', 'art_design', 'fashion');
					for ($i = 0; $i < count($cat_name); $i++) :
				    	$args = array(
							'posts_per_page' => 1,
							'category_name' => $cat_name[$i],
							//'post__in'  => get_option( 'sticky_posts' ),
							//'ignore_sticky_posts' => 1
						);
						$query = new WP_Query($args);
						while ($query->have_posts()) : $query->the_post();
							$categories = get_the_category(); ?>
							<div class="hero-carousel__item">
			                    <div class="hero-carousel-slide">
			                        <div class="hero-carousel-slide__img bg__img">
			                            <div>
			                                <?php 
							                	if (has_post_thumbnail()) {
												    the_post_thumbnail();
												}
							                ?>
			                            </div>
			                        </div> <!-- /.hero-carousel-slide__img -->
			                        <div class="hero-carousel-slide__overlay"></div>
			                        <div class="hero-carousel-slide__container">
			                            <div class="hero-carousel-slide__post-category">
			                                <h3 class="h3--wht">
			                                	<a href="
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
											</h3>
			                            </div> <!-- /.hero-carousel-slide__post-category --> 
			                            <div class="hero-carousel-slide__post-title">
			                            	<?php the_title('<h3 class="h3--popular"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
			                            </div> <!-- /.hero-carousel-slide__post-title --> 
			                            <div class="hero-carousel-slide__meta">
			                                <iron-icon src="<?php echo get_template_directory_uri() ?>/images/global/icons/clock-16px-wht.svg"></iron-icon>&nbsp;
			                                <span><?php echo get_the_date(); ?></span>
			                            </div> <!-- /.hero-carousel-slide__post-meta -->
			                        </div> <!-- /.hero-carousel-slide__container -->
			                    </div> <!-- /.hero-carousel-slide -->
			                </div> <!-- /.hero-carousel__item -->
						<?php	
						endwhile;
						wp_reset_postdata();	
					endfor; 
				?>
            </div> <!-- /.hero-carousel -->
    </div> <!-- /.row -->
</section> <!-- /.feature-posts -->
<!-- WP posts loop -->
<!-- owl carousel for featured products / authors-->
<section class="featured-products">
	<?php if(is_active_sidebar('feat-carousel')) : ?>
		<div class="row">
		    <?php dynamic_sidebar('feat-carousel'); ?>
		</div> <!-- /.row -->
	<?php endif; ?>
</section> <!-- /.featured-products -->
<div class="row">
	<section class="latest-articles">
		<div class="section-title--no-spacer">latest articles</div> <!-- /.section-title -->
		<div id="ajax-more-posts" class="row">
			<?php 
				//$query = new WP_Query(array('post__not_in' => get_option('sticky_posts')));
				if (have_posts()) :
					/* Start the Loop */
					while (have_posts()) : the_post();
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile;
					//wp_reset_postdata();
					//posts_nav_link();
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
			?>
			
		</div> <!-- .row -->
	</section> <!-- /.latest-articles -->
	<aside class="aside">
		<?php get_sidebar(); ?>
	</aside>
</div> <!-- /.row -->
<?php if(is_active_sidebar('before-footer')) : ?>
	<div class="row">
	    <?php dynamic_sidebar('before-footer'); ?>
	</div> <!-- /.row -->
<?php endif; ?>
<?php
get_footer();
