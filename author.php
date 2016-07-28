<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package En_Masse_Magazine
 */

get_header(); ?>
<?php 
	$author = get_the_author();
?>
<!-- elements for sub pages -->
<div class="breadcrumb-bar">
    <ol class="breadcrumb-bar__list h-list">
        <li class="breadcrumb-bar__item h-list__item"><a class="breadcrumb-bar__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a></li>
        <li class="breadcrumb-bar__item h-list__item"><a class="breadcrumb-bar__link--active" href="#">Articles by <?php echo $author; ?></a></li>
    </ol>
</div> <!-- /.breadcrumb -->
<div class="page-opening">
    <h1 class="page-opening__title page-opening__title--author h1--opening"><?php echo $author; ?></h1>
</div> <!-- /.page-opening -->
<div class="row">
	<section class="latest-articles">
		<section class="author--opening">
            <div class="row">
                <div class="author__avatar--opening">
                    <img src="<?php echo get_avatar_url(get_the_author_meta("ID")); ?>" alt="<?php echo $author; ?>">
                </div> <!-- /.author__avatar -->
                <div class="clearfix visible-xs-block"></div>
                <div class="author__profile--opening">
                    <div class="author__name--opening">
                        <h3 class="h3--author-name"><a href="#"><?php echo $author; ?></a></h3>
                    </div> <!-- /.author__name -->
                    <div class="author__title--opening">
                        <h4 class="h4--author-title">/ <?php echo get_the_author_meta("user_title"); ?></h4>
                    </div> <!-- /.author__title -->
                    <p class="author__email--opening"><a href="mailto:<?php echo get_the_author_meta("email"); ?>"><?php echo get_the_author_meta("email")?></a></p>
                    <p class="paragraph"><?php echo nl2br(get_the_author_meta('description')); ?></p>
                </div> <!-- /.author__profile -->
            </div> <!-- /.row -->
        </section> <!-- /.author--opening -->
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
					get_template_part('template-parts/content', 'author');
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