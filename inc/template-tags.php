<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package majadc_coffee
 */

if ( ! function_exists( 'the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h3 class="screen-reader-text"><?php _e( 'Posts navigation', 'majadc_coffee' ); ?></h3>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'majadc_coffee' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'majadc_coffee' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'majadc_coffee' ); ?></h3>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'majadc_coffee_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function majadc_coffee_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	
	

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'majadc_coffee' ),
		 $time_string
	);
	
	
	$modified_on = sprintf(
		_x( 'Last updated on %s','modify date', 'majadc_coffee' ),
		 $time_string
	);
	
	$byline = sprintf(
		_x( 'by %s', 'post author', 'majadc_coffee' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	if ( get_the_time( 'U' ) == get_the_modified_time( 'U' ) ) {
		echo '<p class="post-date posted-on">' . $posted_on . '</p>';
	} else {
		echo '<p class="post-date modified-on">' . $modified_on . '</p>';
	}

}
endif;

if ( ! function_exists( 'majadc_coffee_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function majadc_coffee_entry_footer() {
	// Hide category and tag text for pages.
	?><?php
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'majadc_coffee' ) );
		if ( $categories_list && majadc_coffee_categorized_blog() ) {
			printf( '<p class="post-list__cat-links">' . __( 'Posted in %1$s ', 'majadc_coffee' ) . '</p>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		//$tags_list = get_the_tag_list( '', __( ', ', 'majadc_coffee' ) );
		//if ( $tags_list ) {
			//printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'majadc_coffee' ) . '</span>', $tags_list );
		//}
	}
	?>
	<?php

	edit_post_link( __( 'Edit', 'majadc_coffee' ), '<p class="edit-link">', '</p>' );
	?>
	<?php
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'majadc_coffee' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'majadc_coffee' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'majadc_coffee' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'majadc_coffee' ), get_the_date( _x( 'Y', 'yearly archives date format', 'majadc_coffee' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'majadc_coffee' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'majadc_coffee' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'majadc_coffee' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'majadc_coffee' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'majadc_coffee' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'majadc_coffee' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'majadc_coffee' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'majadc_coffee' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'majadc_coffee' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'majadc_coffee' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'majadc_coffee' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'majadc_coffee' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'majadc_coffee' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'majadc_coffee' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'majadc_coffee' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'majadc_coffee' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function majadc_coffee_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'majadc_coffee_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'majadc_coffee_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so majadc_coffee_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so majadc_coffee_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in majadc_coffee_categorized_blog.
 */
function majadc_coffee_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'majadc_coffee_categories' );
}
add_action( 'edit_category', 'majadc_coffee_category_transient_flusher' );
add_action( 'save_post',     'majadc_coffee_category_transient_flusher' );


/**
 * Get unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
 *
 * @staticvar int $id_counter
 *
 * @param string $prefix Prefix for the returned ID.
 * @return string Unique ID.
 */
function majadc_coffee_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}
