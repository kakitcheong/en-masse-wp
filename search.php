<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package En_Masse_Magazine
 */
get_header(); ?>
<!-- elements for sub pages -->
<div class="breadcrumb-bar">
    <ol class="breadcrumb-bar__list h-list">
        <li class="breadcrumb-bar__item h-list__item"><a class="breadcrumb-bar__link" href="#">Home</a></li>
        <li class="breadcrumb-bar__item h-list__item"><a class="breadcrumb-bar__link--active" href="#">Search Result</a></li>
    </ol>
</div> <!-- /.breadcrumb -->
<div class="page-opening">
    <h1 class="page-opening__title page-opening__title--search h1--opening"><?php the_search_query(); ?></h1>
</div> <!-- /.page-opening -->
<div class="row">
	<section class="latest-articles">
		<div class="row">
			<?php
			if ( have_posts() ) : ?>
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );
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
