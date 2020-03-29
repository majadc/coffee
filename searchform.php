<?php
/**
 *
 *The searchform.php template.
*/ ?>
<?php
$unique_id = majadc_coffee_unique_id( 'search-form-' );
$aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';
?>
<form role="search" <?php echo $aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $unique_id ); ?>">
		<span class="screen-reader-text sr-only"><?php _e( 'Search for:', 'majadc_coffee' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></span>
		<input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'majadc_coffee' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="button-search">
	<span class="sr-only">Search</span>
		<svg class="icon-magnifying-glass">
			<use href="<?php bloginfo( 'template_url' ); ?>/images/sprite.svg#icon-magnifying-glass"></use>
		</svg>
	</button>

</form>