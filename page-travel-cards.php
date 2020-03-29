<?php
/*
* Template Name: Travel Cards
* The template for displaying page with the list of custom posts travel cards.
*/
?>
<?php get_header(); ?>

<div id="primary" class="page-main page-main--full-width page-main--no-bg">
	<main id="main" class="page-main__inner" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<header class="page-home__header">
				<?php the_title( '<h1 class="page-home__title">', '</h1>' ); ?>
		</header>
    
		<section class="travel-cards">
			<header class="travel-cards__header">
				<?php the_content() ?>
			</header>
		<?php endwhile; // end of the loop. ?>
			<div class="travel-cards__container">
				<?php
				$argsTravelCards = array(
					'post_type' => 'travel_card',
					'posts_per_page' => -1
				);
				$queryTravelCards = new WP_Query($argsTravelCards);
				if ( $queryTravelCards->have_posts( ) ) :
				?>
					<?php
					while ( $queryTravelCards->have_posts() ) :
						$queryTravelCards->the_post();
						get_template_part( 'content', 'travel_card' );
					endwhile;
					 ?>

				<?php endif;?>
			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>