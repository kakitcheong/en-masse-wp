<?php
/**
 * En Masse Magazine functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package En_Masse_Magazine
 */

if ( ! function_exists( 'en_masse_magazine_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function en_masse_magazine_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on En Masse Magazine, use a find and replace
	 * to change 'en-masse-magazine' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'en-masse-magazine', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'en-masse-magazine' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'en_masse_magazine_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'en_masse_magazine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function en_masse_magazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'en_masse_magazine_content_width', 640 );
}
add_action( 'after_setup_theme', 'en_masse_magazine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function en_masse_magazine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'en-masse-magazine' ),
		'id'            => 'main-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'en-masse-magazine' ),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="section-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Featured Carousel', 'en-masse-magazine' ),
		'id'            => 'feat-carousel',
		'description'   => esc_html__( 'Add widgets here.', 'en-masse-magazine' ),
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Before Footer', 'en-masse-magazine' ),
		'id'            => 'before-footer',
		'description'   => esc_html__( 'Add widgets here.', 'en-masse-magazine' ),
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'en-masse-magazine' ),
		'id'            => 'footer-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'en-masse-magazine' ),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>'
	) );
}
add_action( 'widgets_init', 'en_masse_magazine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function en_masse_magazine_scripts() {
	/* temp directory for main stylesheet */
	wp_enqueue_style( 'en-masse-magazine-style', get_template_directory_uri() . '/stylesheets/style.css' );
	/* google font */
	wp_enqueue_style( 'en-masse-magazine-google-font', 'https://fonts.googleapis.com/css?family=Noto+Sans|Playfair+Display:400italic,400|Raleway:300,700,500');
	/* just font */
	wp_enqueue_style( 'en-masse-magazine-just-font', 'http://fonts.googleapis.com/css?family=Alegraya:400');
	wp_enqueue_script( 'en-masse-magazine-just-font-script', 'http://s3-ap-northeast-1.amazonaws.com/justfont-user-script/jf-41223.js');
	/* owl carousel style */
	wp_enqueue_style( 'en-masse-magazine-owl-carousel-style', get_template_directory_uri() . '/bower_components/owl/owl-carousel/owl.carousel.css');
	wp_enqueue_style( 'en-masse-magazine-owl-carousel-theme', get_template_directory_uri() . '/bower_components/owl/owl-carousel/owl.theme.css');
	/* font awesome */
	wp_enqueue_style( 'en-masse-magazine-font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
	/* Jquery */
	wp_enqueue_script( 'en-masse-magazine-jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js', array(), '1.12.2', true);
	/* Bootstrap */
	wp_enqueue_script( 'en-masse-magazine-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array(), '3.3.6', true);
	/* Owl carousel script */
	wp_enqueue_script( 'en-masse-magazine-owl-carousel-script', get_template_directory_uri(). '/bower_components/owl/owl-carousel/owl.carousel.min.js', array(), '1.3.2', true);
	/* Lazyload xt */
	wp_enqueue_script( 'en-masse-magazine-lazyload-xt', get_template_directory_uri(). '/bower_components/lazyloadxt/dist/jquery.lazyloadxt.js', array(), '1.0.5', true);
	wp_enqueue_script( 'en-masse-magazine-lazyload-xt-bg', get_template_directory_uri(). '/bower_components/lazyloadxt/dist/jquery.lazyloadxt.bg.js', array(), '1.0.5', true);
	/* Instafeed */
	wp_enqueue_script( 'en-masse-magazine-instafeed', get_template_directory_uri(). '/bower_components/instafeed.js/instafeed.min.js');
	/* Custom */
	wp_enqueue_script( 'en-masse-magazine-main-script', get_template_directory_uri(). '/js/script.js', array(), '0.0.1', true );
	/* Instagram API */
	wp_enqueue_script( 'en-masse-magazine-instagram-api', get_template_directory_uri(). '/js/instagram-app.js', array('en-masse-magazine-jquery'), '0.0.1', true );
	wp_enqueue_script( 'en-masse-magazine-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'en-masse-magazine-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'en_masse_magazine_scripts' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Adding custom class to main navigation
 */
function add_menuclass($ulclass) {
	$menuItemsCount = count(wp_get_nav_menu_items('Main Nav Menu'));
	return preg_replace('/<a rel="main-navigation__link"/', '<a class="main-navigation__link"', $ulclass, $menuItemsCount);
}
add_filter('wp_nav_menu','add_menuclass');
/**
 * Identify the first widget in sidebar
 */
function widget_first_last_classes($params) {

	global $my_widget_num; // Global a counter array
	$this_id = $params[0]['id']; // Get the id for the current sidebar we're processing
	$arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets	

	if(!$my_widget_num) {// If the counter array doesn't exist, create it
		$my_widget_num = array();
	}

	if(!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) { // Check if the current sidebar has no widgets
		return $params; // No widgets in this sidebar... bail early.
	}

	if(isset($my_widget_num[$this_id])) { // See if the counter array has an entry for this sidebar
		$my_widget_num[$this_id] ++;
	} else { // If not, create it starting with 1
		$my_widget_num[$this_id] = 1;
	}

	$class = 'class=" '; // Add a widget number class for additional styling options

	if($my_widget_num[$this_id] == 1) { // If this is the first widget
		$class .= 'widget--alpha ';
	} elseif($my_widget_num[$this_id] == count($arr_registered_widgets[$this_id])) { // If this is the last widget
		$class .= 'widget--omega ';
	}

	$params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']); // Insert our new classes into "before widget"

	return $params;

}
add_filter('dynamic_sidebar_params','widget_first_last_classes');

function wpmm_setup() {
    register_nav_menus( array(
        'mega_menu' => 'Mega Menu'
    ) );
}
add_action( 'after_setup_theme', 'wpmm_setup' );

function wpmm_init() {
    $location = 'mega_menu';
    $css_class = 'has-mega-menu';
    $locations = get_nav_menu_locations();
    if ( isset( $locations[ $location ] ) ) {
        $menu = get_term( $locations[ $location ], 'nav_menu' );
        if ( $items = wp_get_nav_menu_items( $menu->name ) ) {
            foreach ( $items as $item ) {
                if ( in_array( $css_class, $item->classes ) ) {
                    register_sidebar( array(
                        'id'   => 'mega-menu-widget-area-' . $item->ID,
                        'name' => $item->title . ' - Mega Menu',
                    ) );
                }
            }
        }
    }
}
add_action( 'widgets_init', 'wpmm_init' );