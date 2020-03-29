<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package majadc_coffee
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class="entry-entry-page"); ?>>
	<header class="entry__header">
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
		<?php edit_post_link( __( 'Edit', 'majadc_coffee' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry__footer -->
</article><!-- #post-## -->
