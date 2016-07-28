<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package En_Masse_Magazine
 */

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'main-sidebar' ); ?>
<!-- temp -->
<div class="widget--newsletter">
    <div class="section-title--centered">
        newsletter
    </div> <!-- /.section-title--centered -->
    <div class="widget__description--centered">
        <p class="paragraph">Donec maximus gravida justo vel facilisis. Proin pulvinar, at iaculis felis.</p>    
    </div> <!-- /.widget__description -->
    <div class="widget__form">
        <form class="base-form" action="">
            <input type="email" class="base-form__item--full" id="emailInput" placeholder="Your email address">
            <button type="submit" class="base-form__item--full btn--primary">subscribe</button>
        </form> <!-- /.base-form -->
    </div> <!-- /.widget__form -->
</div> <!-- /.widget--newsletter -->
<!-- temp -->