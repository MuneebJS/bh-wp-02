<?php
/**
 * Page template.
 *
 * @package BH_Modern
 */

get_header();
?>

<main id="main-content" class="site-main layout-container layout-container--narrow" tabindex="-1">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class( 'page-content' ); ?>>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="page-content__featured">
					<?php the_post_thumbnail( 'large', array( 'class' => 'page-content__image' ) ); ?>
				</div>
			<?php endif; ?>

			<h1 class="page-content__title"><?php the_title(); ?></h1>

			<div class="page-content__body entry-content">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_footer();
