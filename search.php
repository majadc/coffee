<?php
/**
 * The template for displaying search results pages.
 *
 * @package majadc_coffee
 */

get_header(); ?>

	<div id="primary" class="page-main">
		<main id="main" class=" " role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-header__title"><?php printf( __( 'Search Results for: %s', 'majadc_coffee' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<ul class="post-list">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'content', 'search' );
					?>

				<?php endwhile; ?>
			</ul>
			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
