<?php
/**
 * Theme footer.
 *
 * @package BH_Modern
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<footer class="site-footer" role="contentinfo">
	<div class="site-footer__inner layout-container">
		<div class="site-footer__top">
			<div class="site-footer__brand">
				<?php
				if ( has_custom_logo() ) {
					the_custom_logo();
				}
				?>
				<a class="site-footer__title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description ) {
					echo '<p class="site-footer__tagline">' . esc_html( $description ) . '</p>';
				}
				?>
			</div>

			<div class="site-footer__columns">
				<div class="footer-nav">
					<?php
					if ( has_nav_menu( 'footer_one' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'footer_one',
								'container'      => false,
								'menu_class'     => 'footer-nav__list',
								'depth'          => 1,
							)
						);
					} else {
						bh_modern_footer_fallback( 'one' );
					}
					?>
				</div>
				<div class="footer-nav">
					<?php
					if ( has_nav_menu( 'footer_two' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'footer_two',
								'container'      => false,
								'menu_class'     => 'footer-nav__list',
								'depth'          => 1,
							)
						);
					} else {
						bh_modern_footer_fallback( 'two' );
					}
					?>
				</div>
			</div>
		</div>

		<div class="site-footer__bottom">
			<p class="site-footer__credit"><?php bloginfo( 'name' ); ?></p>
			<p class="site-footer__wp">
				<?php
				printf(
					/* translators: %s: WordPress.org link. */
					esc_html__( 'Designed with %s', 'bh-modern' ),
					'<a href="' . esc_url( __( 'https://wordpress.org', 'bh-modern' ) ) . '" rel="nofollow noopener">WordPress</a>'
				);
				?>
			</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
