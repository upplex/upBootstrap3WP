<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to upbootwp_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 1.1
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

	<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h4 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'upbootwp' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h4>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'upbootwp' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'upbootwp' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'upbootwp' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use upbootwp_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define upbootwp_comment() and that will be used instead.
				 * See upbootwp_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'upbootwp_comment' ) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'upbootwp' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'upbootwp' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'upbootwp' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'upbootwp' ); ?></p>
	<?php endif; ?>
	
	<?php
	// Arguments to edit the comment form
	
	$args = array(
		'id_form'           => 'commentform',
		'id_submit'         => 'submit',
		'title_reply'       => __( 'Leave a Reply' ),
		'title_reply_to'    => __( 'Leave a Reply to %s' ),
		'cancel_reply_link' => __( 'Cancel Reply' ),
		'label_submit'      => __( 'Post Comment' ),
	
		'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
		'</label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true">' .
		'</textarea></p>',
	
		'must_log_in' => '<p class="must-log-in">' .
		sprintf(
			__( 'You must be <a href="%s">logged in</a> to post a comment.' ),
			wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
		) . '</p>',
	
		'logged_in_as' => '<p class="logged-in-as">' .
		sprintf(
			__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
			admin_url( 'profile.php' ),
			$user_identity,
			wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
		) . '</p>',
	
		'comment_notes_before' => '<p class="comment-notes">' .
		__( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
		'</p>',
	
		'comment_notes_after' => '<p class="form-allowed-tags">' .
		sprintf(
			__( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
			' <code style="white-space: normal !important;">' . allowed_tags() . '</code>'
		) . '</p>',
	
		'fields' => apply_filters( 'comment_form_default_fields', array(
	
				'author' =>
				'<p class="comment-form-author">' .
				'<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
				( $req ? '<span class="required">*</span>' : '' ) .
				'<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
				'" size="30"' . $aria_req . ' /></p>',
	
				'email' =>
				'<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
				( $req ? '<span class="required">*</span>' : '' ) .
				'<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30"' . $aria_req . ' /></p>',
	
				'url' =>
				'<p class="comment-form-url"><label for="url">' .
				__( 'Website', 'domainreference' ) . '</label>' .
				'<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
				'" size="30" /></p>'
			)
		),
	);
	
	comment_form($args); ?>

</div><!-- #comments -->
