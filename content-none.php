<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package majadc_coffee
 */
?>
<main id="main" class="page-main__inner page-no-resualts not-found" role="main">
	<header class="page-header">
		<h1 class="page-header__title"><?php _e( 'Nothing Found', 'majadc_coffee' ); ?></h1>
	</header><!-- .page-header -->

	
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'majadc_coffee' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'majadc_coffee' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'majadc_coffee' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
</main><!-- .no-results -->
