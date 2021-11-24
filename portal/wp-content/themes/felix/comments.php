<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */


if (post_password_required()) {
    return;
}

?>


<div class="comments">

    <?php
    /*
     * function to construct comments
     */


    ?>

    <?php if (have_comments()) : ?>

        <div class="comments-list-area">

            <ol class="comment-list">
                <?php
                //show comments
                wp_list_comments(array(

	                'style'       => 'ol',
	                'short_ping'  => true,
	                'avatar_size' => 56,


                ));

                ?>
            </ol>
        </div>
        <?php
    endif; // have_comments()
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'felix'); ?></p>
    <?php endif;
    ?>


</div><!-- .comments-area -->



    <?php
    //We get the option to comment form


    ob_start();
    $args = array(
        'comment_notes_before' => '',
        'title_reply_before' => '  <h2 class="comment-reply-title">',
        'title_reply_after' => '</h2>',
        'title_reply' =>  esc_html__(  'Post a comment', 'felix'),
        'title_reply_to' =>  esc_html__(  'Leave a comment to %s', 'felix'),
        'fields' => array(
            'author' => '<div class="form-double">
<div class="form-group">
                                <input type="text" class="" name="author" required="" placeholder=" ' .  esc_html__(  'Name *', 'felix') . '" >
                            </div>
',
            'email' => '
<div class="form-group last">
                                <input type="email" class="" name="email" required="" placeholder=" ' .  esc_html__(  'Email *', 'felix') . '">
                            </div></div>',
        ),
        'comment_field' => ' <div class="form-group">
                                    <textarea class="" rows="3" name="comment"
                                              placeholder="' . esc_html__(  'Comment', 'felix') .'" maxlength="65525" required="required"></textarea>
                            </div>',
        'submit_button' => '   <button type="submit" class="btn" data-text-hover=" ' .  esc_html__(  'Submit', 'felix') . '">
                                    <span class="btn-text">
                                    ' .  esc_html__(  'Post comment', 'felix') . '</span>
                        <span class="line-top">
                          <span class="line-square-l-t line-square"></span>
                          <span class="line-square-r-t line-square"></span>
                        </span>
                        <span class="line-bottom">
                          <span class="line-square-l-b line-square"></span>
                          <span class="line-square-r-b line-square"></span>
                        </span>
                                </button>'

    );
    comment_form($args);

    $str = ob_get_clean();
    echo str_replace('comment-form', 'form-comment js-comment-form2  ', $str)
    ?>





