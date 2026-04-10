<?php
/**
 * Search results.
 *
 * @package BH_Modern
 */

get_header();
?>

<main id="main-content" class="site-main layout-container" tabindex="-1">
	<header class="archive-header">
		<h1 class="archive-header__title">
			<?php
			printf(
				/* translators: %s: Search query. */
				esc_html__( 'Search results for "%s"', 'bh-modern' ),
				esc_html( get_search_query() )
			);
			?>
		</h1>
	</header>

	<div class="search-form-wrap">
		<?php get_search_form(); ?>
	</div>

	<?php if ( have_posts() ) : ?>
		<div class="post-list">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'excerpt' );
			endwhile;
			?>
		</div>
		<nav class="pagination" aria-label="<?php esc_attr_e( 'Search results pagination', 'bh-modern' ); ?>">
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
	<?php endif; ?>

	<section class="more-posts more-posts--subtle" aria-labelledby="search-more-heading">
		<h2 id="search-more-heading" class="more-posts__heading"><?php esc_html_e( 'More posts', 'bh-modern' ); ?></h2>
		<?php
		$recent = new WP_Query(
			array(
				'post_type'      => 'post',
				'posts_per_page' => 4,
				'no_found_rows'  => true,
			)
		);
		if ( $recent->have_posts() ) :
			echo '<ul class="more-posts__list">';
			while ( $recent->have_posts() ) :
				$recent->the_post();
				?>
				<li class="more-posts__item">
					<a class="more-posts__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<time class="more-posts__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
						<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date() ); ?></a>
					</time>
				</li>
				<?php
			endwhile;
			echo '</ul>';
			wp_reset_postdata();
		endif;
		?>
	</section>
</main>

<?php
get_footer();
