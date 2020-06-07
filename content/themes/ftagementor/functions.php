<?php
/**
 * ftagementor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ftagementor
 */

if ( ! function_exists( 'ftagementor_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ftagementor_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ftagementor, use a find and replace
	 * to change 'ftagementor' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ftagementor', get_template_directory() . '/languages' );
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style('css/editor-style.css');
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

	/**
	* Add Image Size
	*/
	add_image_size('ftagementorsize_1170x540',1170,540,true); // blog single
	add_image_size('ftagementorsize_970x500',970,500,true); // blog single
	add_image_size('ftagementorsize_570x385',570,385,true);
	add_image_size('ftagementorsize_375x225',375,325,true);
	add_image_size('ftagementor_size_80X80',80,80,true);
	add_image_size('ftagementor_size_100X100',100,100,true);
	

	/**
	* This theme uses wp_nav_menu() in one location.
	*/
	register_nav_menus( array(
		'primary'        => esc_html__( 'Primary', 'ftagementor' ),
		'onepage'        => esc_html__( 'One Page Menu', 'ftagementor' ),
		'left-menu'      => esc_html__( 'Top Bar Left menu', 'ftagementor' ),
		'right-menu' 	 => esc_html__( 'Top Bar Right menu', 'ftagementor' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'link',
		'quote',
		'gallery',
		'audio',
		'video',
	) );

	/**
	* Set up the WordPress core custom background feature.
	*/
	add_theme_support( 'custom-background', apply_filters( 'ftagementor_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	* Add theme support for selective refresh for widgets.
	*/
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'ftagementor_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

 if ( !function_exists( 'ftagementor_content_width')){
	 	function ftagementor_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'ftagementor_content_width', 640 );
	}
} 
add_action( 'after_setup_theme', 'ftagementor_content_width', 0 );

/**
 * Register custom fonts.
 */
 if ( !function_exists( 'ftagementor_fonts_url' ) ) :
function ftagementor_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'ftagementor' ) ) {
		$fonts[] = 'Roboto:100,300,300i,400,500,700,900';
	}

	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Orbitron font: on or off', 'ftagementor' ) ) {
		$fonts[] = 'Orbitron:400,500,700,900';
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


/**
 * Enqueue scripts and styles.
 */
function ftagementor_scripts() {
	
	wp_enqueue_style('ftagementor-font',ftagementor_fonts_url());
	wp_enqueue_style('bootstrap',get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome',get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style('icofont',get_template_directory_uri() . '/css/icofont.min.css');
	wp_enqueue_style('magnific-popup',get_template_directory_uri() . '/css/magnific-popup.css');
	wp_enqueue_style('fancybox',get_template_directory_uri() . '/css/jquery.fancybox.css');
	wp_enqueue_style('animate',get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style('slick',get_template_directory_uri() . '/css/slick.css');
	wp_enqueue_style('owl-carousels',get_template_directory_uri() . '/css/owl.carousel.min.css');
	wp_enqueue_style('mean-menu',get_template_directory_uri() . '/css/meanmenu.min.css');
	wp_enqueue_style('ftagementor-default-style',get_template_directory_uri() . '/css/theme-default.css');
	wp_enqueue_style('ftagementor-blog-style',get_template_directory_uri() . '/css/blog-post.css');
	wp_enqueue_style('ftagementor-main-style',get_template_directory_uri() . '/css/theme-style.css');
	wp_enqueue_style( 'ftagementor-style', get_stylesheet_uri() );
	wp_enqueue_style('ftagementor-responsive',get_template_directory_uri() . '/css/responsive.css');

	wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.js', array('jquery'), '4.0.1', true );
	wp_enqueue_script( 'countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array('jquery'), '2.2.0', true );
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('imagesloaded'), '3.0.3', false );
	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/js/jquery.counterup.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'ripples', get_template_directory_uri() . '/js/jquery.ripples-min.js', array('jquery'), '0.6.2', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true );
	wp_enqueue_script( 'ytplayer', get_template_directory_uri() . '/js/jquery.mb.YTPlayer.js', array('jquery'), '1.1.0', true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), '3.1.20', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.1.2', false );
	wp_enqueue_script( 'owl-carousels', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.2.1', false );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow-min.js', array('jquery'), '1.1.2', true );
	wp_enqueue_script( 'ftagementor-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );
	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );
	wp_enqueue_script( 'mean-menu', get_template_directory_uri() . '/js/jquery.meanmenu.min.js', array(), '', true );
	wp_enqueue_script( 'retina', get_template_directory_uri() . '/js/retina.min.js', array(), '1.3.0', true );
	wp_enqueue_script( 'onepage-nav', get_template_directory_uri() . '/js/jquery.onepage.nav.js', array(), '', true );
	wp_enqueue_script( 'ftagementor-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ftagementor_scripts' );


// ftagementor Company Info widget js
if( !function_exists('ftagementor_media_scripts') ) {
  function ftagementor_media_scripts() {
	wp_enqueue_style( 'ftagementor-wp-admin', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
	wp_enqueue_style( 'ftagementor-metabox-expand', get_template_directory_uri() . '/css/metabox-expand.css', false, '1.0.0' );
	wp_enqueue_style( 'font-awesome-admin', get_template_directory_uri() . '/css/font-awesome.min.css', false, '4.7.0' );
    wp_enqueue_media();
    wp_enqueue_script( 'jquery-ui-tabs' );
    wp_enqueue_script( 'ftagementor-metabox-expand', get_template_directory_uri() .'/js/metabox-expand.js', false, '', true );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-alpha', get_template_directory_uri() .'/js/wp-color-picker-alpha.min.js', array( 'wp-color-picker' ), '2.1.3', true );
    wp_enqueue_script( 'metabox-condition', get_template_directory_uri() .'/js/metabox-conditionals.js', array( 'jquery', 'cmb2-scripts' ), '1.0.0', true );
    wp_enqueue_script( 'ftagementor-logo-uploader', get_template_directory_uri() .'/js/site-logo-uploader.js', false, '', true );
    if ( get_post_type() == 'post' ){
	    wp_enqueue_script( 'ftagementor-post-formats', get_template_directory_uri() . '/js/post-formate.js', array(), '1.0.0', true );
	    $data = array(
		    'post_formate_name' => ( get_post_format( get_the_ID() ) ) ? get_post_format( get_the_ID() ) : '0',
		    'currentwpversion' 	=> get_bloginfo( 'version' ),
		    'classiceditorst' 	=> ( class_exists( 'Classic_Editor' ) ) ? '1' : '0',
		);
		wp_localize_script( 'ftagementor-post-formats', 'Post_Formate_Data', $data );
	}
	 
  }
}
add_action('admin_enqueue_scripts', 'ftagementor_media_scripts');


// enqueue style for login page
add_action( 'login_enqueue_scripts', 'ftagementor_login_page_scripts');
function ftagementor_login_page_scripts() {
	wp_enqueue_style( 'ftagementorlogin-style', get_template_directory_uri(). '/css/login-style.css');

	$ftagementor_opt = ftagementor_get_opt();
	$login_logo_image_url = ( isset( $ftagementor_opt['ftagementor_custom_login_logo']['url'] ) ) ? $ftagementor_opt['ftagementor_custom_login_logo']['url'] : '' ;

	if($login_logo_image_url){
		$custom_css = ".login h1 a {
    background-image:url({$login_logo_image_url}) !important;
    background-size: auto !important;
    width: auto !important;
    height: 100px !important;
    background-position: center center;
}";
		wp_add_inline_style( 'ftagementorlogin-style', $custom_css );
	}
}


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
/*
	Load options framework
*/
require get_template_directory().'/inc/admin/option-framework.php';

/*
	Load metabox
*/
require get_template_directory().'/inc/metabox/metabox.php';
/*
	Load breadcrumb
*/
require get_template_directory().'/inc/page-header/breadcrumb.php';

/*
	Load widget
*/
require get_template_directory().'/inc/widgets/widget-register.php';
/*
	Load custom function
*/
require get_template_directory().'/inc/tgm-plugin/required-plugins.php';
/*
	Load global function
*/
require get_template_directory().'/inc/global-functions.php';
/*
	Comment form
*/
require get_template_directory().'/inc/comment-form.php';

/*
 Inline CSS form reduxframework
*/
require get_template_directory().'/inc/dynamic-css.php';
/*
 CMB2 Tabs
*/
require get_template_directory().'/inc/metabox-expand.php';
/*
 Demo Import
*/
require get_template_directory().'/inc/demo-import.php';

/**
* Blog Pagination 
*/
if(!function_exists('ftagementor_blog_pagination')){
	function ftagementor_blog_pagination(){
		?>
		<div class="post-pagination"> <?php
			the_posts_pagination(array(
				'prev_text'          => '<i class="fa fa-angle-left"></i>',
				'next_text'          => '<i class="fa fa-angle-right"></i>',
				'type'               => 'list'
			)); ?>
		</div>
		<?php
	}
}

/**
*  Convert Get Theme Option global to function
*/
if(!function_exists('ftagementor_get_opt')){
	function ftagementor_get_opt(){
		global $ftagementor_opt;
		return $ftagementor_opt;
	}
}

/**
* Get terms 
*/
function ftagementor_get_terms_gb( $term_type = null, $hide_empty = false ) {
    if(!isset( $term_type )){
        return;
    }
    $ftagementor_custom_terms = array();
    $terms = get_terms( $term_type, array( 'hide_empty' => $hide_empty ) );
    array_push( $ftagementor_custom_terms, esc_html__( '--- Select ---', 'ftagementor' ) );
    if ( is_array( $terms ) && ! empty( $terms ) ) {
        foreach ( $terms as $single_term ) {
            if ( is_object( $single_term ) && isset( $single_term->name, $single_term->slug ) ) {
                $ftagementor_custom_terms[ $single_term->slug ] = $single_term->name;
            }
        }
    }
    return $ftagementor_custom_terms;
}

/**
* Inline mobile menu
*/
if(!function_exists('ftagementor_mobile_script')){
	function ftagementor_mobile_script() {
 		$ftagementor_opt = ftagementor_get_opt();
 		if( isset( $ftagementor_opt['ftagementor_mobile_menu_width'] ) && !empty( $ftagementor_opt['ftagementor_mobile_menu_width'] ) ){
			$ftagementor_mobile_menu = $ftagementor_opt['ftagementor_mobile_menu_width'];
		}else{
			$ftagementor_mobile_menu = 991;
		}

	    $mobile_menu_arr = array(
	       "menu_width" => "$ftagementor_mobile_menu"
	    );
	
	    wp_localize_script( "ftagementor-main", "mobile_menu_data", $mobile_menu_arr );
	}
}
add_action( "wp_enqueue_scripts", "ftagementor_mobile_script",100 );


/**
* Comment navigation
*/
function ftagementor_get_post_navigation(){
	if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ):
		require( get_template_directory() . '/inc/comment-nav.php' );
	endif;
}

/**
* Get Image ID Form Database
*/
function ftagementor_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}