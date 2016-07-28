<div class="about--footer">
    <div class="section-title">
        <?php the_field("about_us_title", $acfw); ?>
    </div> <!-- /.section-title -->
    <p class="paragraph--footer">
        <?php the_field("about_us_content", $acfw); ?>
    </p>
</div> <!-- /.about--footer -->
<!-- temp -->
<div class="form--footer">
    <div class="section-title">
        newsletter
    </div> <!-- /.section-title -->
    <p class="paragraph--footer">Donec maximus gravida justo vel facilisis. Proin pulvinar, at iaculis felis.</p>
    <form class="base-form" action="">
        <input type="email" class="base-form__item--full" id="emailInput" placeholder="Your email address">
        <button type="submit" class="base-form__item--full btn--primary">subscribe</button>
    </form> <!-- /.base-form -->    
</div> <!-- /.form--footer -->
<!-- temp -->
<div class="sub-nav--footer">
    <div class="section-title">
        <?php the_field("footer_nav_title", $acfw); ?>
    </div> <!-- /.section-title -->
    <nav>
        <ul class="v-list--footer">
            <?php if(have_rows("categories_nav", $acfw)): ?>
                <?php while(have_rows("categories_nav", $acfw)): the_row(); ?>
                    <li class="v-list__item"><a class="v-list__link" href="<?php the_sub_field("cat_link", $acfw); ?>"><?php the_sub_field("cat_name", $acfw); ?></a></li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul> <!-- /.v-list -->
    </nav>
    <nav>
        <ul class="v-list--footer">
            <?php if(have_rows("custom_nav", $acfw)): ?>
                <?php while(have_rows("custom_nav", $acfw)): the_row(); ?>
                    <li class="v-list__item"><a class="v-list__link" href="<?php the_sub_field("custom_nav_link", $acfw); ?>"><?php the_sub_field("custom_nav_name", $acfw); ?></a></li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul> <!-- /.v-list -->
    </nav>
</div> <!-- /.sub-nav--footer --> 