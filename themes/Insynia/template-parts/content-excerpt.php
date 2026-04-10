<?php
/**
 * Post excerpt card (archives, etc.).
 *
 * @package BH_Modern
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article <?php post_class( 'post-card post-card--compact' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="post-card__media" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php the_post_thumbnail( 'medium_large', array( 'class' => 'post-card__image' ) ); ?>
		</a>
	<?php endif; ?>
	<div class="post-card__body">
		<h2 class="post-card__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
		<div class="post-card__excerpt">
			<?php the_excerpt(); ?>
		</div>
		<time class="post-card__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
			<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date() ); ?></a>
		</time>
	</div>
</article>
