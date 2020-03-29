<?php
/**
 *The template part used for displaying post title and excerpt on post lists.
 *
 * @package majadc_coffee
 */
?>

<li id="post-<?php the_ID(); ?>" <?php post_class($class="post-list__item"); ?>>	
	<?php if ( is_home() ) : ?>
		<?php the_title( sprintf( '<h1 class="post-list__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	<?php else : ?>
		<?php the_title( sprintf( '<h2 class="post-list__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	<?php endif; ?>

	<div class="post-list_desc">
		<?php
			/* translators: %s: Name of current post */
			the_excerpt();
		?>
		<div class="post-list__more"><a href="<?php the_permalink(); ?>" class="button-1" title="<?php the_title(); ?>">Read more</a></div>

		
	</div><!-- .entry__content -->
	<div class="post-list__footer">
		<?php majadc_coffee_entry_footer(); ?>
	</div><!-- .entry__footer -->
</li><!-- #post-## -->