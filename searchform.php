<?php
/**
 * Template for displaying search forms in ebw
 *
 * @package WordPress
 * @subpackage ebw
 * @since ebw 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="form-control search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'ebw' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
</form>
