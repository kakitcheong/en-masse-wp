<?php
/**
 * Template part for displaying single-post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package En_Masse_Magazine
 */

?>
<?php
    $author = get_the_author();
    $categories = get_the_category();
?>
<div class="post-content__meta">
    <div class="meta">                            
        <div class="meta__author-avatar--post-header">
            <img src="<?php echo get_avatar_url(get_the_author_meta("ID")); ?>" alt="<?php echo $author; ?>">
        </div> <!-- /.meta__author-avatar--post-header -->
        <div class="meta__data--post-header">
            <div class="meta__author-name">
                <h2 class="h3--author-name-meta"><a href="<?php echo get_author_posts_url(get_the_author_meta("ID")); ?>"><?php echo $author; ?></a></h2>
                <iron-icon src="<?php echo get_template_directory_uri(); ?>/images/global/icons/clock-16px.svg"></iron-icon>
                <span><?php the_date();?></span>
                <span>&nbsp;|&nbsp;</span>
                <span>UNDER <?php echo strtoupper($categories[0]->name); ?></span>
            </div> <!-- /.meta__author-name -->
        </div> <!-- /.meta__data--post-header -->
        <div class="clearfix"></div>
    </div> <!-- /.meta -->        
</div> <!-- /.post-content__meta -->
<div class="post-content__section">
    <!-- acf - text content -->
    <?php 
        if(have_rows("content")):
            while(have_rows("content")): the_row();
                if(get_row_layout() == "content_text"):
                    echo '<div class="post-content__text"><h3 class="paragraph--opening">' . get_sub_field("opening_text") . '</h3><p class="paragraph">'. get_sub_field("paragraph_text") .'</p></div> <!-- /.post-content__text -->';
                elseif(get_row_layout() == "content_blockquote"):
                    echo '<div class="post-content__text"><blockquote>' . get_sub_field("blockquote") . '</blockquote></div> <!-- /.post-content__text -->';
                elseif(get_row_layout() == "content_image_lg"):
                    $image_lg = get_sub_field("image_lg");
                    echo '<div class="post-content__img--lg bg__img"><div><img src="' . $image_lg['url'] . '" alt="' . $image_lg['alt'] .  '"></div></div> <!-- /.post-content__img--lg -->';
                elseif(get_row_layout() == "content_image_sm"):
                    while(have_rows("image_sm_container")): the_row();
                        $image_sm = get_sub_field("image_sm");
                        echo '<div class="post-content__img"><div><img src="' . $image_sm['url'] . '" alt="' . $image_sm['alt'] .  '"></div></div> <!-- /.post-content__img -->';
                    endwhile;
                elseif(get_row_layout() == "content_gallery"):
                    $images = get_sub_field("gallery");
                    if($images):
                        echo '<div class="post-content__gallery"><div class="carousel--in-post">';
                        foreach($images as $image):
                            echo '<div class="carousel--in-post__item carousel__item--alpha">
                                    <div class="carousel--in-post__img bg__img">
                                        <div><img src="' . $image['url'] . '" alt="' . $image['alt'] . '"></div>
                                    </div>
                                </div> <!-- /.carousel--in-post__item -->';
                        endforeach;
                        echo '</div> <!-- /.carousel--in-post --></div> <!-- /.post-content__gallery --><div>';
                    endif;
                endif;
            endwhile;
        else:
            // no layouts found        
        endif;
    ?>
    <div class="clearfix"></div>
</div> <!-- /.post-content__section -->