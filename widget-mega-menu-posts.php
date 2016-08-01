<div class="row">
<?php
$catName = get_field('cat_name', $acfw); 
$args = array(
    'post_type' => 'post',
    //'posts_per_page' => 1,
    'category_name' => $catName,
    'showposts' => 6,
    'orderby' => 'rand'
);
$query = new WP_Query($args);
if($query->have_posts()):
    while ($query->have_posts()) : $query->the_post();
?>
<div class="col-xs-2 hook" style="overflow: hidden;">
    <img src="<?php 
        echo the_post_thumbnail_url( 'thumbnail' ); 
    ?>">
    <?php the_title('<h4 class="h4"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>'); ?>   
</div>
<?php
    endwhile;
    endif;
?>
</div>