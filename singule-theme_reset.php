<?php
/**
 * Template Name: Set Width Theme Reset Style
 * Template Post Type: post, page
 * The template for displaying one single post with theme reset.
 *
 * @package majadc_coffee
 */

get_header(); ?>

	<div id="primary" class="page-main page--theme-reset">
		<main id="main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

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
