<?php
/**
 * Custom search form (Twenty Twenty-Five–style labels).
 *
 * @package BH_Modern
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$unique_id = wp_unique_id( 'search-form-' );
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="<?php echo esc_attr( $unique_id ); ?>">
		<?php echo esc_html_x( 'Search', 'Search form label', 'bh-modern' ); ?>
	</label>
	<input
		type="search"
		id="<?php echo esc_attr( $unique_id ); ?>"
		class="search-form__input"
		name="s"
		value="<?php echo esc_attr( get_search_query() ); ?>"
		placeholder="<?php echo esc_attr_x( 'Type here...', 'Search placeholder', 'bh-modern' ); ?>"
	>
	<button type="submit" class="search-form__submit">
		<?php echo esc_html_x( 'Search', 'Search button', 'bh-modern' ); ?>
	</button>
</form>
