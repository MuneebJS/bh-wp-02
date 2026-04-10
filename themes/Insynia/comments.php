<?php
/**
 * Comments template.
 *
 * @package BH_Modern
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	return;
}
?>

<section id="comments" class="comments-area">
	<h2 class="comments-title"><?php esc_html_e( 'Comments', 'bh-modern' ); ?></h2>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-count screen-reader-text">
			<?php comments_number( __( 'No comments', 'bh-modern' ), __( 'One comment', 'bh-modern' ), __( '% comments', 'bh-modern' ) ); ?>
		</h3>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 50,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation(
			array(
				'prev_text' => __( 'Older comments', 'bh-modern' ),
				'next_text' => __( 'Newer comments', 'bh-modern' ),
			)
		);
		?>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'title_reply' => __( 'Leave a comment', 'bh-modern' ),
		)
	);
	?>
</section>
