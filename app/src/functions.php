<?php

define( 'RMBT_TEXT_DOMAIN_THEME', 'dvc-test' );
define( 'rmbt_PATH_THEME', get_template_directory() );
define( 'rmbt_URL_THEME', esc_url( get_template_directory_uri() ) );

require_once get_template_directory() . '/inc/functions/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/functions/general-front.php';
// require_once get_template_directory() . '/inc/functions/ajax.php';

if ( class_exists( 'ReduxFramework' ) ) {
	define( 'RMBT_PATH_REDUX_SECTIONS', array(
		'/app/src/inc/Redux/sections',
		'/app/src/template-parts',
	) );
	require_once get_template_directory() . '/inc/Redux/redux-options.php';
}


function rmbt_theme_scripts() {

	wp_enqueue_style( 'swiper-bundle', get_template_directory_uri() . '/assets/styles/libs/swiper-bundle.min.css', array(), '1.0', 'all' );
	wp_enqueue_style( RMBT_TEXT_DOMAIN_THEME . '-main', get_template_directory_uri() . '/assets/styles/main-style.min.css', array(), '1.0', 'all' );

	wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/assets/js/libs/swiper-bundle.min.js', array(), '', true );
	wp_enqueue_script( RMBT_TEXT_DOMAIN_THEME . '-app', get_template_directory_uri() . '/assets/js/app.main.min.js', array( 'jquery' ), '1.0', true );


	wp_localize_script(
		'dvc-test-app',
		'dvcAppData',
		[ 
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		]
	);
}
add_action( 'wp_enqueue_scripts', 'rmbt_theme_scripts', 20 );

function rmbt_site_setup() {


	add_theme_support( 'custom-logo' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	register_nav_menus(
		array(
			'header_nav_lang' => esc_html__( 'rmbt_header_language', RMBT_TEXT_DOMAIN_THEME ),
		)
	);

	load_theme_textdomain( RMBT_TEXT_DOMAIN_THEME, get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'rmbt_site_setup' );


function rmbt_theme_register_required_plugins() {
	$plugins = array(
		array(
			'name' => RMBT_TEXT_DOMAIN_THEME . ' core',
			'slug' => RMBT_TEXT_DOMAIN_THEME . '-core',
			'source' => WP_PLUGIN_DIR . '/' . RMBT_TEXT_DOMAIN_THEME . '-core',
			'required' => true,
			'version' => '1.0',
			'force_activation' => false,
			'force_deactivation' => false,
		),

		array(
			'name' => 'Redux Framework',
			'slug' => 'redux-framework',
			'required' => true,
		),

	);

	$config = array(
		'id' => 'rombt-tgmpa-plugin',
		'default_path' => '',
		'menu' => 'tgmpa-install-plugins',
		'has_notices' => true,
		'dismissable' => true,
		'dismiss_msg' => '',
		'is_automatic' => false,
		'message' => '',

	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'rmbt_theme_register_required_plugins' );



function add_class_to_nav_menu_links( $atts, $item, $args ) {
	if ( $args->theme_location == 'header_nav_lang' ) {
		$atts['class'] = 'navigation-button';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_nav_menu_links', 10, 3 );

function custom_posts_per_page( $query ) {
	if ( $query->is_main_query() && ! is_admin() ) {
		$query->set( 'posts_per_page', 3 );
	}
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );