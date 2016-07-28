<?php
/*
Template Name: Random Post
*/
?>

<?php 
$args = array(
    'post_type' => 'post',
    //'posts_per_page' => 1,
    'showposts' => 4,
    'orderby' => 'rand'
);
$query = new WP_Query($args);
if($query->have_posts()):
    while ($query->have_posts()) : $query->the_post();
?>
<li class="random-post__item">
    <div class="post--random">
        <div class="post--random__title">
            <?php the_title('<h4 class="h4"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>'); ?>
        </div> <!-- /.post--random__title --> 
        <div class="post--random__meta">
            <iron-icon src="<?php echo get_template_directory_uri() ?>/images/global/icons/clock-16px.svg"></iron-icon>&nbsp;
            <span><?php echo get_the_date(); ?></span>
        </div> <!-- /.post--random__meta -->    
    </div> <!-- /.post--random --> 
</li> <!-- /.random-post__item -->
<?php
    endwhile;
    endif;
?>