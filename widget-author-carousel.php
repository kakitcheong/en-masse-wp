<div class="carousel--author">
    <?php if(have_rows("auth_carousel_item", $acfw)): ?>
        <?php while(have_rows("auth_carousel_item", $acfw)): the_row();
            $auth_carousel_avatar = get_sub_field("auth_carousel_avatar", $acfw);
            $auth_carousel_name = get_sub_field("auth_carousel_name", $acfw);
            $auth_carousel_handle = get_sub_field("auth_carousel_handle", $acfw);

            $auth_name_split = explode(" ", strtolower($auth_carousel_name));
        ?>
            <div class="carousel--author__item author--main">
                <div class="author--main__avatar">
                    <a href="#"><img src="<?php echo $auth_carousel_avatar; ?>" alt="<?php echo $auth_carousel_name; ?>"></a>
                </div> <!-- /.author--main__avatar -->
                <div class="author--main__profile">
                    <div class="author--main__name">
                        <h3 class="h3--author-name"><a href="<?php echo esc_url(home_url("/")). "author/" .$auth_name_split[0]. "-" .$auth_name_split[1]; ?>"><?php echo $auth_carousel_name; ?></a></h3>
                    </div> <!-- /.author--main__name -->
                    <div class="author--main__handle">
                        <h4 class="h4--author-handle"><a href="#"><?php echo $auth_carousel_handle; ?></a></h4> 
                    </div> <!-- /.author--main__handle -->
                </div> <!-- /.author--main__info -->
            </div> <!-- /.author-carousel__item -->
        <?php endwhile; ?>
    <?php endif; ?>
</div> <!-- /.author-carousel -->