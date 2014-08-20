<?php
/**
 * The template for displaying Comments.
 *
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
<div class="clearfix"></div>
<?php if ( comments_open() || get_comments_number() ) {?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : 	?>
    <h2 class="comments-title">
		<?php
			printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'mywiki' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
		?>
	</h2>
    <ul><?php wp_list_comments( array( 'callback' => 'mywiki_comment', 'style' => 'ul' ) ); ?></ul>
       <?php paginate_comments_links(); ?>     
	<?php endif; // have_comments() ?>
	<?php
	$args = array('comment_notes_after'=>'',
				  'comment_notes_before'=>'',
				  'title_reply' => 'LEAVE A COMMENT',
				  'label_submit'=>'Submit Comment',
				  'fields' => apply_filters( 'comment_form_default_fields', array(
						'author' =>
						  '<p class="comment-form-author">' .						  
						  '<input id="author" name="author" type="text" placeholder="Your Name*" value="' . esc_attr( $commenter['comment_author'] ) .
						  '" size="30" /></p>',
					
						'email' =>
						  '<p class="comment-form-email">'.
						  '<input id="email" name="email" type="text" placeholder="E-mail*" value="' . esc_attr(  $commenter['comment_author_email'] ) .
						  '" size="30" /></p>'
						  )),
						  'comment_field' => '<p>' .
						  '<textarea id="comment" name="comment" placeholder="Comment*" cols="45" rows="8" aria-required="true"></textarea>' .
						  '</p>',						 
    'comment_notes_after' => '',
				  );
	?>
	<?php comment_form($args); ?>
</div><!-- #comments .comments-area -->
<?php } ?>