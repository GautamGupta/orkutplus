<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // if there's a password
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
	?>
	<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?><p>
	<?php return;
	} /* endif */
	} /* endif */ ?>

<?php /* This variable is for alternating comment background */
$oddcomment = '1'; ?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
<h3 id="comments" class="respond">Comments » <?php comments_number('No Comment', 'One Comment', '% Comments' );?> So Far. </h3>
<?php foreach ($comments as $comment) : ?>
	<?php if($comment->comment_author_email == get_the_author_email()) { ?>
		<div class="comment_author">
	<?php } else { ?>
		<div class="<?php echo "comment_". $oddcomment; ?>">
	<?php } ?>
		<div class="top">
		<div class="right">
		<div class="bottom">
		<div class="left">
		<div class="tl">
		<div class="tr">
		<div class="br">
		<div class="bl">
		
<div class="commenthead"><?php comment_author_link() ?> - <?php comment_date('F jS, Y') ?></div>
<div class="content">
<p align="left"><?php $lowercase = strtolower($comment->comment_author_email);
$md5 = md5( $lowercase );
$gravatar = "http://www.gravatar.com/avatar.php?gravatar_id=";
$gravatar .= $md5;
$gravatar .= "&amp;size=60";
?><img src="<?php echo $gravatar; ?>" align="right" alt="" /><?php comment_text() ?></p>
			<p class="commentmetadata">
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>
			<?php edit_comment_link(' edit comment','',''); ?> <?php if(function_exists("yus_reply")) yus_reply(); ?></p>
		</div></div></div></div></div></div></div></div></div></div> <?php /* comment or comment_author */ ?>

	<?php /* Changes every other comment to a different class */	
		if ('1' == $oddcomment) $oddcomment = '2';
		else $oddcomment = '1';
	?>

	<?php endforeach; /* end for each comment */ ?>



 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post-> comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>
		
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post-> comment_status) : ?>

<p id="respond" class="respond">Post a comment</p>
<div class="content">All Comments are Moderated in accordance with our <a href="http://www.orkutplus.net/comments-policy">Comments Policy</a>. Please be relevant, explain your problem properly. We love to help.

<p><b>Note</b> - If your comment is not related to this post, please use our <a href="http://www.orkutplus.net/forum/">Orkut Help and Support Forums</a>.</p></div>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>">Logout &raquo;</a></p>

<?php else : ?>

<p><input class="textform" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Name <?php if ($req) _e('(required)'); ?></small></label></p>

<p><input class="textform" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Mail (will not be published) <?php if ($req) _e('(required)'); ?></small></label></p>

<p><input class="textform" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

<p><textarea class="textform" name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
<?php show_subscription_checkbox(); ?>
<p><input type="submit" id="submit" tabindex="5" value="Submit" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>
</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
