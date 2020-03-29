<?php
/**
 * 
 * Template Name: Full Width Clean Style
 * Template Post Type: post, page
 * The template for displaying one single post.
 *
 * @package majadc_coffee
 */

get_header(); ?>

	<div id="primary" class="page-main page-main--full-width">
		<main id="main" class="page-main__inner" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single_clean_style' ); ?>
			


			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>