<?php
/**
 * Theme header.
 *
 * @package BH_Modern
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e( 'Skip to content', 'bh-modern' ); ?></a>

<header class="site-header" role="banner">
	<div class="site-header__inner layout-container">
		<div class="site-branding">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
				?>
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				<?php
			}
			?>
		</div>

		<button type="button" class="nav-toggle" aria-expanded="false" aria-controls="primary-navigation" aria-label="<?php esc_attr_e( 'Open menu', 'bh-modern' ); ?>">
			<span class="nav-toggle__bar" aria-hidden="true"></span>
			<span class="nav-toggle__bar" aria-hidden="true"></span>
			<span class="nav-toggle__bar" aria-hidden="true"></span>
		</button>

		<nav id="primary-navigation" class="site-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'bh-modern' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'site-nav__list',
					'fallback_cb'    => 'bh_modern_primary_fallback',
				)
			);
			?>
		</nav>
	</div>
</header>
