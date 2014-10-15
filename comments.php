<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>

	<div class="navigation">
        <div class="prev-posts"><?php next_comments_link() ?></div>
		<div class="next-posts"><?php previous_comments_link() ?></div>
	</div>

		<ul class="commentlist">
            <?php wp_list_comments( 'type=comment&callback=pyle_life_comment' ); ?>
        </ul>

	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>
	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<p>Comments are closed.</p>

	<?php endif; ?>
	
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond">
    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to comment.</p>
	<?php else : ?>
	<h5>
        <?php comment_form_title( 'Leave a Reply' ); ?>
        <?php if ( is_user_logged_in() ) : ?>
             as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php">
                    <?php echo $user_identity; ?>
                </a>.
            <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">
                Log out &raquo;
            </a>
        <?php endif; ?>
        <?php cancel_comment_reply_link('Cancel'); ?>
    </h5>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( !is_user_logged_in() ) : ?>

			<div class="form-group">
				<label  for="author">name<?php if ($req) echo "*"; ?></label>
				<input class="form-control" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			</div>

			<div class="form-group">
				<label  for="email">e-mail<?php if ($req) echo "*"; ?></label>
				<input class="form-control" type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			</div>

			<div class="form-group">
				<label  for="url">website</label>
				<input class="form-control" type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />	
			</div>

		<?php endif; ?>

		<div>
			<label for="comment">comment</label>
			<textarea class="form-control" name="comment" id="comment" tabindex="4"></textarea>
		</div>

		<div>
			<input name="submit" type="submit" id="submit" tabindex="5" value="submit" />
			<?php comment_id_fields(); ?>
		</div>
		
		<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; // If registration required and not logged in ?>
	
</div>

<?php endif; ?>
