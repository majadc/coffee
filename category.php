<?php
/**
 * Template for display category - list of post
 *
 * @package majadc_coffee
 */

get_header(); ?>

	<div id="primary" class="page-main">
		<main id="main" class="page-main__inner page-category" role="main">
			<header class="page-header">
				<h1 class="page-header__tiltle"><?php single_cat_title( ); ?></h1>
			</header>
			<?php if ( have_posts() ) : ?>
			<ul class="post-list">
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
			</ul>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
