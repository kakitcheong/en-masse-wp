<div class="section-title">
    <?php the_field("section_title", $acfw); ?>
</div> <!-- /.section-title -->
<div class="carousel owl-carousel--feat">
    <?php if(have_rows("carousel_item", $acfw)): $counter = 0; ?>
        <?php while(have_rows("carousel_item", $acfw)): the_row(); 
            $item_image = get_sub_field("item_image", $acfw);
            $item_name = get_sub_field("item_name", $acfw);
            $item_link = get_sub_field("item_link", $acfw);
        ?>
            <div class="carousel__item<?php if($counter == 0){echo "--alpha";} ?>">
                <div class="carousel__img bg__img">
                    <a href="<?php echo $item_link; ?>">
                        <img src="<?php echo $item_image; ?>" alt="<?php echo $item_name; ?>">
                    </a>
                </div> <!-- /.carousel__img -->
                <div class="carousel__item-title">
                    <h4 class="h4"><a href="<?php echo $item_link; ?>"><?php echo $item_name; ?></a></h4>
                </div> <!-- /.carousel__item-title -->
            </div> <!-- /.carousel__item -->  
        <?php 
            $counter++;
            endwhile;
        ?>
    <?php endif; ?> 
</div> <!-- /.carousel -->