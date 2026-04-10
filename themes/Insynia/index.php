<?php
/**
 * Main template (blog index).
 *
 * @package BH_Modern
 */

get_header();
?>

<main id="main-content" class="site-main layout-container" tabindex="-1">
	<h1 class="page-title"><?php esc_html_e( 'Blog', 'bh-modern' ); ?></h1>

	<?php if ( have_posts() ) : ?>
		<div class="post-list">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class( 'post-card' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="post-card__media" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
							<?php the_post_thumbnail( 'large', array( 'class' => 'post-card__image' ) ); ?>
						</a>
					<?php endif; ?>
					<div class="post-card__body">
						<h2 class="post-card__title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<div class="post-card__content entry-content">
							<?php the_content(); ?>
						</div>
						<time class="post-card__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
							<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date() ); ?></a>
						</time>
					</div>
				</article>
			<?php endwhile; ?>
		</div>

		<nav class="pagination" aria-label="<?php esc_attr_e( 'Posts pagination', 'bh-modern' ); ?>">
			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 1,
					'prev_text' => __( 'Previous', 'bh-modern' ),
					'next_text' => __( 'Next', 'bh-modern' ),
				)
			);
			?>
		</nav>
	<?php else : ?>
		<p class="no-results"><?php echo esc_html_x( 'Sorry, but nothing was found. Please try a search with different keywords.', 'No posts message', 'bh-modern' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</main>

<?php
get_footer();
