<?php
/**
 * BH Modern theme setup.
 *
 * @package BH_Modern
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'BH_MODERN_VERSION', '1.0.0' );

/**
 * Sets up theme defaults and registers support for WordPress features.
 */
function bh_modern_setup() {
	load_theme_textdomain( 'bh-modern', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
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
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary'       => __( 'Primary menu', 'bh-modern' ),
			'footer_one'    => __( 'Footer column one', 'bh-modern' ),
			'footer_two'    => __( 'Footer column two', 'bh-modern' ),
		)
	);
}
add_action( 'after_setup_theme', 'bh_modern_setup' );

/**
 * Enqueue scripts and styles.
 */
function bh_modern_assets() {
	$theme_uri = get_template_directory_uri();
	$ver       = BH_MODERN_VERSION;

	wp_enqueue_style(
		'bh-modern-fonts',
		'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Fraunces:ital,opsz,wght@0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,400&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'bh-modern-main',
		$theme_uri . '/assets/css/main.css',
		array( 'bh-modern-fonts' ),
		$ver
	);

	wp_enqueue_script(
		'bh-modern-main',
		$theme_uri . '/assets/js/main.js',
		array(),
		$ver,
		true
	);

	wp_localize_script(
		'bh-modern-main',
		'bhModernStrings',
		array(
			'openMenu'  => __( 'Open menu', 'bh-modern' ),
			'closeMenu' => __( 'Close menu', 'bh-modern' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'bh_modern_assets' );

/**
 * Primary menu fallback when no menu is assigned.
 */
function bh_modern_primary_fallback() {
	wp_page_menu(
		array(
			'menu_class' => 'site-nav__list',
			'container'  => false,
		)
	);
}

/**
 * Default footer menu fallback (Twenty Twenty-Five link labels).
 *
 * @param string $column One or two.
 */
function bh_modern_footer_fallback( $column ) {
	$links_one = array(
		__( 'Blog', 'bh-modern' )     => '#',
		__( 'About', 'bh-modern' )    => '#',
		__( 'FAQs', 'bh-modern' )     => '#',
		__( 'Authors', 'bh-modern' )  => '#',
	);
	$links_two = array(
		__( 'Events', 'bh-modern' )   => '#',
		__( 'Shop', 'bh-modern' )     => '#',
		__( 'Patterns', 'bh-modern' ) => '#',
		__( 'Themes', 'bh-modern' )   => '#',
	);
	$links     = ( 'two' === $column ) ? $links_two : $links_one;
	echo '<ul class="footer-nav__list">';
	foreach ( $links as $label => $url ) {
		printf(
			'<li><a href="%s">%s</a></li>',
			esc_url( $url ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}
