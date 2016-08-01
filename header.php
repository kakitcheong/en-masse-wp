<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package En_Masse_Magazine
 */

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<!-- polymer elements -->
<link rel="import" href=<?php echo get_template_directory_uri(). "/bower_components/iron-icon/iron-icon.html" ?>>
</head>

<body <?php body_class(); ?>>
	<!--[if lt IE 7]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<header class="header">
            <nav class="header__navigation">
                <div class="navigation-header">
                    <button class="navigation-header__toggle collapsed">
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button> <!-- /.navigation__toggle -->
                    <div class="navigation-header__soical">
                        <ul class="h-list">
                            <li class="h-list__item"><a class="h-list__link" href="#"><span class="ss-icon">facebook</span>facebook</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                            <li class="h-list__item"><a class="h-list__link" href="#"><span class="ss-icon">instagram</span>instagram</a>&nbsp;&nbsp;&nbsp;</li>
                            <li class="h-list__item"><a class="h-list__link" href="#"><span class="ss-icon">twitter</span>twitter</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                        </ul> <!-- /.h-list -->  
                    </div> <!-- /.navigation-header__soical -->
                    <div class="clearfix"></div>
                </div> <!-- /.navigation-header -->
                <div class="navigation-header__masthead">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <!-- link to home -->
                        <picture>
                            <source srcset="<?php echo get_template_directory_uri() ?>/images/global/mastheads/masthead-xs.svg" media="(max-width:767px)"> <!-- x-small logo -->
                            <source srcset="<?php echo get_template_directory_uri() ?>/images/global/mastheads/masthead-sm.svg" media="(min-width:768px) and (max-width: 991px)"> <!-- small logo -->
                            <source srcset="<?php echo get_template_directory_uri() ?>/images/global/mastheads/masthead-sm.svg" media="(min-width:992px) and (max-width: 1119px)"> <!-- medium logo -->
                            <source srcset="<?php echo get_template_directory_uri() ?>/images/global/mastheads/masthead-sm.svg" media="(min-width:1119px)"> <!-- large logo -->
                            <img src="<?php echo get_template_directory_uri() ?>/images/global/mastheads/masthead-xs.svg" alt="">  
                        </picture>
                    </a>
                </div> <!-- /.navigation-header__masthead -->
                <ul class="main-navigation <?php if (is_user_logged_in()){ echo "is__logged-in";} ?>">
                    <div class="main-navigation__wrapper">
                    <?php
                        $locations = get_nav_menu_locations();
                        if ( isset( $locations[ "mega_menu" ] ) ) {
                            $menu = get_term( $locations[ "mega_menu" ], "nav_menu" );
                            if ( $items = wp_get_nav_menu_items( $menu->name ) ) {  
                                $idCollection = [];
                                $counter = 0;
                                foreach ( $items as $item ) {
                                    $idCollection[$counter] = "$item->ID";
                                    echo "<li class='main-navigation__item mega-dropdown'>";
                                        echo "<a class=\"main-navigation__link mega-dropdown__toggle {$item->ID}\" href=\"{$item->url}\">{$item->title}</a>";
                                        if ( is_active_sidebar( "mega-menu-widget-area-" . $item->ID ) ) {
                                            echo "<ul class=\"mega-dropdown__menu {$item->ID}\">";
                                            echo "<div class=\"container\">";
                                            echo "<li>";
                                            echo "<div id=\"mega-menu-{$item->ID}\" class=\"mega-menu\">";
                                                dynamic_sidebar( 'mega-menu-widget-area-' . $item->ID );
                                            echo "</div>";
                                            echo "</li>";
                                            echo "</div>"; 
                                            echo "</ul>";
                                        }
                                    echo "</li>";
                                    $counter++;
                                }
                                wp_localize_script( 'en-masse-magazine-main-script', 'idCollection', $idCollection );
                            }
                        }
                    ?>
                    </div>  <!-- /.main-navigation__wrapper -->
                </ul>
            </nav> <!-- /.header__navigation -->
    </header> <!-- /.header -->
    <main class="main">