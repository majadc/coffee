<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * List of the posts on main page if check your latest post
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package majadc_coffee
 */

get_header(); ?>

	<div id="primary" class="page-main">
		<main id="main" class="page-main__inner m-posts-list" role="main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>
			<?php endwhile; ?>
			<?php the_posts_navigation(); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
