<?php
/**
 * 404 template.
 *
 * @package BH_Modern
 */

get_header();

$img = get_template_directory_uri() . '/assets/images/404-image.webp';
?>

<main id="main-content" class="site-main layout-container" tabindex="-1">
	<div class="error-404">
		<div class="error-404__visual" aria-hidden="true">
			<?php
			$path = get_template_directory() . '/assets/images/404-image.webp';
			if ( file_exists( $path ) ) :
				?>
				<img
					class="error-404__image"
					src="<?php echo esc_url( $img ); ?>"
					alt="<?php echo esc_attr_x( 'Small totara tree on ridge above Long Point', '404 image description', 'bh-modern' ); ?>"
					loading="lazy"
					width="800"
					height="600"
				>
			<?php else : ?>
				<div class="error-404__placeholder"></div>
			<?php endif; ?>
		</div>
		<div class="error-404__content">
			<h1 class="error-404__title"><?php echo esc_html_x( 'Page not found', '404 heading', 'bh-modern' ); ?></h1>
			<p class="error-404__text">
				<?php
				echo esc_html_x(
					"The page you are looking for doesn't exist, or it has been moved. Please try searching using the form below.",
					'404 message',
					'bh-modern'
				);
				?>
			</p>
			<div class="search-form-wrap">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
