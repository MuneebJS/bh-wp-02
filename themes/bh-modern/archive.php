<?php
/**
 * Archive template.
 *
 * @package BH_Modern
 */

get_header();
?>

<main id="main-content" class="site-main layout-container" tabindex="-1">
	<header class="archive-header">
		<h1 class="archive-header__title"><?php the_archive_title(); ?></h1>
		<?php the_archive_description( '<div class="archive-header__desc">', '</div>' ); ?>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="post-list">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'excerpt' );
			endwhile;
			?>
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
