<?php
/*
* The template part used for displaying single post travel card type
*/
?>


<article class="travel-cards__item">
	<div class="travel-cards__arena-flip">
		<div class="travel-cards__scene-flip">
			<div class="travel-cards__actor-flip travel-cards__actor-flip--front">
				<div class="travel-cards__actor-front--inner">
					<p><?php the_excerpt() ?> </p>
				</div>
			</div>
			<div class="travel-cards__actor-flip travel-cards__actor-flip--back">
				<div class="travel-cards__actor-back--inner">
					<?php the_post_thumbnail(); ?>
					<h3><span><?php the_title() ?></span></h3>
					
				</div>
			</div>
		</div>
	</div>
</article>
	