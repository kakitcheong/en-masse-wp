<div class="section-title">
    <?php the_field("section_title", $acfw); ?>
</div>
<div class="widget__gallery">
    <ul class="gallery">
        <?php if(have_rows("sgw_item", $acfw)): $counter = 1; ?>
            <?php while(have_rows("sgw_item", $acfw)): the_row(); 
                $sgw_img_link = get_sub_field("sgw_img_link", $acfw);
                $sgw_img_src = get_sub_field("sgw_img_src", $acfw);
                $sgw_img_alt = get_sub_field("sgw_img_src", $acfw);
            ?>
            <a href="<?php echo $sgw_img_link; ?>">
            <li class="gallery__item--product bg__img <?php if($counter > 0 && $counter %3 == 0){echo "gallery__omega";}?>">
                <div>
                    <img src="<?php echo $sgw_img_src; ?>" alt="<?php echo $sgw_img_alt; ?>">
                </div>
            </li> <!-- /.gallery__item--product -->
            </a>
            <?php
                //echo $counter;  
                $counter++;
                endwhile; 
            ?>
            <div class="clearfix"></div>
        <?php endif; ?>
    </ul> <!-- /.gallery -->
</div> <!-- /.widget__gallery -->