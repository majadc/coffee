<?php
/**
 * Category template for displaing posts form CSS Reference category
 *
 * @package majadc_coffee
 */

get_header(); ?>

	<div id="primary" class="page-main">
		<main id="main" class="page-main__inner m-posts-list" role="main">
			<header class="m-posts-list-header">
				<?php
					single_cat_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header><!-- .page-header -->
			<div class="clearfix">
				
				<?php
				$argCSSproperty = array(
					'category_name' => 'css-reference',
					'tag' => 'css-properties',
					'order' => 'ASC',
					'orderby' => 'name',
					'posts_per_page' => '-1'
				);
				$queryCSSproperty = new WP_Query($argCSSproperty);
				?>
				<?php if ( $queryCSSproperty->have_posts() ) : ?>
				<section class="l-col-md-6 l-col-sm-6">
					<h2 class="title-v1"><?php _e('CSS Properties', 'majadc_coffee'); ?></h2>
					<ul class="m-list-v1">
					<?php while ( $queryCSSproperty->have_posts() ) : $queryCSSproperty->the_post(); ?>
						<li>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</li>
					<?php endwhile; ?>
					</ul>
					<?php wp_reset_postdata(); ?>
				</section>
				<?php endif; ?>
		
				
				
					<?php
					$argCSSselector = array(
						'category_name' => 'css-reference',
						'tag' => 'css-selectors',
						'order' => 'ASC',
						'orderby' => 'name',
						'posts_per_page' => '-1'
					);
					$queryCSSselector = new WP_Query($argCSSselector);
					?>
					<?php if ( $queryCSSselector->have_posts() ) : ?>
					<section class="l-col-md-6 l-col-sm-6">
						<h2 class="title-v1"><?php _e('CSS Selectors', 'majadc_coffee'); ?></h2>
						<ul class="m-list-v1">
						<?php while ( $queryCSSselector->have_posts() ) : $queryCSSselector->the_post(); ?>
							<li>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</li>
						<?php endwhile; ?>
						</ul>
						<?php wp_reset_postdata(); ?>
					</section>
					<?php endif; ?>
				
				
					<?php
					$argCSSpseudoclasses = array(
						'category_name' => 'css-reference',
						'tag' => 'css-pseudo-classes',
						'order' => 'ASC',
						'orderby' => 'name',
						'posts_per_page' => '-1'
					);
					$queryCSSpseudoclasses = new WP_Query($argCSSpseudoclasses);
					?>
					<?php if ( $queryCSSpseudoclasses->have_posts() ) : ?>
					<section class="l-col-md-6 l-col-sm-6">
						<h2 class="title-v1"><?php _e('CSS pseudo-classes', 'majadc_coffee'); ?></h2>
						<ul class="m-list-v1">
						<?php while ( $queryCSSpseudoclasses->have_posts() ) : $queryCSSpseudoclasses->the_post(); ?>
							<li>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</li>
						<?php endwhile; ?>
						</ul>
						<?php wp_reset_postdata(); ?>
					</section>
					<?php endif; ?>
					
					<?php
					$argCSSlengths = array(
						'category_name' => 'css-reference',
						'tag' => 'css-lengths',
						'order' => 'ASC',
						'orderby' => 'name',
						'posts_per_page' => '-1'
					);
					$queryCSSlengths = new WP_Query($argCSSlengths);
					?>
					<?php if ( $queryCSSlengths->have_posts() ) : ?>
					<section class="l-col-md-6 l-col-sm-6">
						<h2 class="title-v1"><?php _e('CSS Lenghts', 'majadc_coffee'); ?></h2>
						<ul class="m-list-v1">
						<?php while ( $queryCSSlengths->have_posts() ) : $queryCSSlengths->the_post(); ?>
							<li>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</li>
						<?php endwhile; ?>
						</ul>
						<?php wp_reset_postdata(); ?>
					</section>
					<?php endif; ?>
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
