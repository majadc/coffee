<?php
/**
 * The template part used for displaying single post with clean style in entry
 *
 * @package majadc_coffee
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class="entry"); ?>>
	<header class="entry__header has-border-bottom">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
	</header><!-- .entry__header -->

	<div class="entry__content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'majadc_coffee' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry__content -->

	<footer class="entry__footer">
		<?php majadc_coffee_entry_footer(); ?>
	</footer><!-- .entry__footer -->
</article><!-- #post-## -->
