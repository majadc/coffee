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

			<?php while ( have_posts() ) : the_post(); ?>
            <header class="page-home__header">
                <div class="page-home__header-inner">
                    <?php the_title( '<h1 class="page-home__title">', '</h1>' ); ?>
                </div>
            </header>
            <?php endwhile; // end of the loop. ?>
            <div class="index-cards page-home__container">
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
                    ?>
                    <div class="index-cards__card page-home__item <?php echo $arrayPostClasses[0] ?>">
                        <article class="index-cards__article">
                            <a class="index-cards__link" href="<?php the_permalink() ?>">
                            <div>
                                <h3 class="index-cards__title"><?php the_title() ?></h3>    
                                <div class="index-cards__entry"><?php the_excerpt() ?></div>
                            </div>
                            </a>
                        </article>
                    </div>
            <?php  endwhile; wp_reset_postdata();
            endif; ?>
            </div><!--page-home__container-->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
