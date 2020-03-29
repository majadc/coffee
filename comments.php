<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package majadc_coffee
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments has-border-top">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments__title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'majadc_coffee' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="navigation comments__navigation" role="navigation">
			<h3 class="screen-reader-text"><?php _e( 'Comment navigation', 'majadc_coffee' ); ?></h3>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'majadc_coffee' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'majadc_coffee' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation comments__navigation" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'majadc_coffee' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'majadc_coffee' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'majadc_coffee' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'majadc_coffee' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
