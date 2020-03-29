<?php
/**
 * The template used for displaying page content in page.php no footer and page links
 *
 * @package majadc_coffee
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class="entry"); ?>>
	<header class="entry__header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry__header -->

	<div class="entry__content">
		<?php the_content(); ?>
		
	</div><!-- .entry__content -->
	<?php edit_post_link( __( 'Edit', 'majadc_coffee' ), '<span class="edit-link">', '</span>' ); ?>
	
</article><!-- #post-## -->
