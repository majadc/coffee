<?php
/**
 * Template Name: Home Page
 * The template for displaying all pages.
 *
 * 
 *
 * @package majadc_coffee
 */

get_header(); ?>

	<div id="primary" class="page-main page-home">
		<main id="main" class="page-main__inner" role="main">

			<div id="index-cards" class="index-cards page-home__container">
			<?php
			$query = new WP_Query( array(
				'posts_per_page' => -1,
				'no_found_rows'  => true,
				'tag'            => 'project'
			) );
			
			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) : $query->the_post();
			?>
					<?php
						$arrayPostClasses = get_post_class();
						$postNoteImg = has_post_thumbnail(); 
						
					if ( $postNoteImg ) {
					?>
					<div class="index-cards__card page-home__item index-cards__card--img <?php echo $arrayPostClasses[0] ?>">
					<?php } else {
					?>
					<div class="index-cards__card page-home__item <?php echo $arrayPostClasses[0] ?>">
					<?php } ?>
						<article class="index-cards__article">
							<a class="index-cards__link--preload index-cards__link" href="<?php the_permalink() ?>">
							<?php if ( $postNoteImg ) {?>
								<div class="index-cards__inner index-cards__thumbnail">
									<?php the_post_thumbnail(); ?>
									<div class="index-cards__thumbnail-text">
										<h3 class="index-cards__title"><?php the_title() ?></h3>    
											
									</div>
									
								</div>
								
								<?php } else { ?>
								<div class="index-cards__inner index-cards__note">
									<div>
										<h3 class="index-cards__title"><?php the_title() ?></h3>    
										<?php if ( has_excerpt() ) :?>
												<div class="index-cards__entry">
													<?php the_excerpt() ?>
												</div>
										<?php endif; ?>
									</div>
								</div>
							<?php } ?>
							</a>
						</article>
					</div>
			<?php  endwhile; wp_reset_postdata();
			endif; ?>
			</div><!--page-home__container-->
			
		</main><!-- #main -->
	</div><!-- #primary -->
			
<?php get_footer(); ?>
