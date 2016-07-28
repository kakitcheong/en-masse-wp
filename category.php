<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package En_Masse_Magazine
 */

get_header(); 
$current_category = strtolower(single_cat_title("", false));
?>
<!-- elements for sub pages -->
<div class="breadcrumb-bar">
    <ol class="breadcrumb-bar__list h-list">
        <li class="breadcrumb-bar__item h-list__item"><a class="breadcrumb-bar__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a></li>
        <li class="breadcrumb-bar__item h-list__item"><a class="breadcrumb-bar__link--active" href="#"><?php echo $current_category; ?></a></li>
    </ol>
</div> <!-- /.breadcrumb-bar -->
<div class="page-opening">
	<h1 class="page-opening__title page-opening__title--category h1--opening"><?php echo $current_category; ?></h1>
</div> <!-- /.page-opening -->
<div class="row">
	<section class="latest-articles">
		<div class="row">
			<?php if(have_posts()): ?>
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part('template-parts/content', 'category');
				endwhile;
				the_posts_pagination();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; ?>
		</div> <!-- /.row -->
	</section> <!-- /.latest-articles -->
	<aside class="aside">
		<?php get_sidebar(); ?>
	</aside>
</div> <!-- /.row -->
<?php
get_footer();