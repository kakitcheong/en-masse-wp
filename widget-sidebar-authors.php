<div class="section-title">
    <?php the_field("section_title", $acfw); ?>
</div> <!-- /.section__title -->
<div class="widget__author">
    <?php if(have_rows("side_auth_item", $acfw)): ?>
        <?php while(have_rows("side_auth_item", $acfw)): the_row();
            $auth_avatar = get_sub_field("auth_avatar", $acfw);
            $auth_name = get_sub_field("auth_name", $acfw);
            $auth_title = get_sub_field("auth_title", $acfw);

            $auth_name_split = explode(" ", strtolower($auth_name));
        ?>
            <div class="author">
                <div class="row">
                    <div class="author__avatar">
                        <img src="<?php echo $auth_avatar; ?>" alt="<?php echo $auth_name; ?>">
                    </div> <!-- /.author__avatar -->
                    <div class="author__profile">
                        <div class="author__name">
                            <h3 class="h3--author-name"><a href="<?php echo esc_url(home_url("/")). "author/" .$auth_name_split[0]. "-" .$auth_name_split[1]; ?>"><?php echo $auth_name; ?></a></h3>
                        </div> <!-- /.author__name -->
                        <div class="author__title">
                            <h4 class="h4--author-title"><?php echo $auth_title; ?></h4>
                        </div> <!-- /.author__title -->
                        <div class="author__social">
                            <ul class="h-list">
                                <?php if(have_rows("auth_social", $acfw)): ?>
                                    <?php while(have_rows("auth_social", $acfw)): the_row(); 
                                        $social_media_name = get_sub_field("social_media_name", $acfw);
                                        $social_media_link = get_sub_field("social_media_link", $acfw);
                                    ?>  
                                        <li class="h-list__item"><a class="h-list__link ss-icon ss-social-circle color__accent" href="<?php echo $social_media_link; ?>"><?php echo $social_media_name; ?></a></li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul> <!-- /.h-list -->
                        </div> <!-- /.author__social -->
                    </div> <!-- /.author__profile -->
                </div> <!-- /.row -->
            </div> <!-- /.author -->
        <?php endwhile; ?>
    <?php endif;?>
</div> <!-- /.widget__author -->