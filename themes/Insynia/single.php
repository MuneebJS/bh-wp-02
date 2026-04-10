<?php
/**
 * Single post.
 *
 * @package BH_Modern
 */

get_header();
?>

<main id="main-content" class="site-main layout-container layout-container--narrow" tabindex="-1">
	<?php
	$bh_single_id = null;
	while ( have_posts() ) :
		the_post();
		$bh_single_id = get_the_ID();
		?>
		<article <?php post_class( 'single-post' ); ?>>
			<header class="single-post__header">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="single-post__featured">
						<?php the_post_thumbnail( 'large', array( 'class' => 'single-post__image' ) ); ?>
					</div>
				<?php endif; ?>

				<h1 class="single-post__title"><?php the_title(); ?></h1>

				<p class="single-post__meta meta-byline">
					<?php esc_html_e( 'Written by ', 'bh-modern' ); ?>
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a>
					<?php esc_html_e( 'in', 'bh-modern' ); ?>
					<?php the_category( ', ' ); ?>
				</p>
			</header>

			<div class="single-post__content entry-content">
				<?php the_content(); ?>
			</div>

			<?php if ( has_tag() ) : ?>
				<footer class="single-post__tags">
					<?php the_tags( '<span class="tags-label">' . esc_html__( 'Tags:', 'bh-modern' ) . '</span> ', ' ', '' ); ?>
				</footer>
			<?php endif; ?>

			<nav class="post-nav" aria-label="<?php esc_attr_e( 'Post navigation', 'bh-modern' ); ?>">
				<?php
				the_post_navigation(
					array(
						'prev_text' => '<span class="post-nav__label">' . esc_html__( 'Previous', 'bh-modern' ) . '</span><span class="post-nav__title">%title</span>',
						'next_text' => '<span class="post-nav__label">' . esc_html__( 'Next', 'bh-modern' ) . '</span><span class="post-nav__title">%title</span>',
					)
				);
				?>
			</nav>

			<?php
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			?>
		</article>
	<?php endwhile; ?>

	<section class="more-posts" aria-labelledby="more-posts-heading">
		<h2 id="more-posts-heading" class="more-posts__heading"><?php esc_html_e( 'More posts', 'bh-modern' ); ?></h2>
		<?php
		$more = new WP_Query(
			array(
				'post_type'           => 'post',
				'posts_per_page'      => 4,
				'post__not_in'        => $bh_single_id ? array( $bh_single_id ) : array(),
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
			)
		);
		if ( $more->have_posts() ) :
			echo '<ul class="more-posts__list">';
			while ( $more->have_posts() ) :
				$more->the_post();
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
