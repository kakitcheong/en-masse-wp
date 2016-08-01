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
<!-- added compoents 20160728 -->
<section class="hero-grid">
	<?php
    	$args = array(
			'showposts' => 4,
			//'category_name' => $cat_name[$i],
			//'post__in'  => get_option( 'sticky_posts' ),
			//'ignore_sticky_posts' => 1
		);
		$query = new WP_Query($args);
		if ($query->have_posts()) : $counter = 0; 
			while ($query->have_posts()) : $query->the_post(); 
	?>
		<?php if ($counter == 0) : ?>
			<article class="hero-grid__item hero-grid__item--sm bg__img">
				<div class="post__img-overlay">
		        	<img src="<?php echo the_post_thumbnail_url("full"); ?>" alt="hero-article-img-001">    
		        </div> <!-- /.post__img-overlay -->
		        <?php the_title('<h2 class="h2--hero"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
		        <p class="paragraph--hero post--hero__excerpt"><?php echo custom_excerpts(30); ?></p>
				<!-- <div class="hero-grid__item__overlay"></div> -->
			</article> <!-- /.hero-grid__item--sm -->
		<?php elseif ($counter == 1) : ?>
			<article class="hero-grid__item hero-grid__item--lg bg__img">
				<div class="post__img-overlay">
		        	<img src="<?php echo the_post_thumbnail_url("full"); ?>" alt="hero-article-img-002">    
		        </div> <!-- /.post__img-overlay --> 
		        <?php the_title('<h2 class="h2--hero--hidden"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
		        <p class="paragraph--hero post--hero__excerpt--hidden"><?php echo custom_excerpts(40); ?></p>
				<div class="hero-grid__item__overlay"></div>
			</article> <!-- /.hero-grid__itme--lg -->
		<?php elseif($counter == 2) : ?>
			<article class="hero-grid__item hero-grid__item--lg bg__img">
				<div class="post__img-overlay">
		        	<img src="<?php echo the_post_thumbnail_url("full"); ?>" alt="hero-article-img-003">
		        </div> <!-- /.post__img-overlay --> 
		        <?php the_title('<h2 class="h2--hero--hidden"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
		        <p class="paragraph--hero post--hero__excerpt--hidden"><?php echo custom_excerpts(40); ?></p>
				<div class="hero-grid__item__overlay"></div>
			</article> <!-- /.hero-grid__itme--lg -->
		<?php elseif($counter == 3) : ?>
			<article class="hero-grid__item hero-grid__item--sm bg__img">
				<div class="post__img-overlay">
		        	<img src="<?php echo the_post_thumbnail_url("full"); ?>" alt="hero-article-img-003">
		        </div> <!-- /.post__img-overlay -->
		        <?php the_title('<h2 class="h2--hero"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
		        <p class="paragraph--hero post--hero__excerpt"><?php echo custom_excerpts(30); ?></p>
				<!-- <div class="hero-grid__item__overlay"></div> -->
			</article> <!-- /.hero-grid__item--sm -->	 
		<?php endif; $counter++;?>	
	<?php
			endwhile;
			wp_reset_postdata();
		endif;
	?>	 
</section> <!-- /.hero-grid -->
<section class="feature-posts">
    <div class="row">
            <div class="hero-carousel">
            	<!-- replace display method here from first sticky post in each category to popular post -->
            	<?php
					//$cat_name = array('trending', 'lifestyle', 'art_design', 'fashion');
					//for ($i = 0; $i < count($cat_name); $i++) :
				    	$args = array(
							'posts_per_page' => 5,
							//'showposts' => 4
							//'category_name' => $cat_name[$i],
							//'post__in'  => get_option( 'sticky_posts' ),
							//'ignore_sticky_posts' => 1
							'meta_key' => 'wpb_post_views_count', 
							'orderby' => 'meta_value_num', 
							'order' => 'DESC'
						);
						$popularPosts = new WP_Query($args);
						while ($popularPosts->have_posts()) : $popularPosts->the_post();
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
					//endfor; 
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