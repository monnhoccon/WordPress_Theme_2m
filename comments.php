<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // if there's a password
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>

<h2><?php _e('Password Protected'); ?></h2>
<p><?php _e('Enter the password to view comments.'); ?></p>

<?php return;
	}
}

	/* This variable is for alternating comment background */

$oddcomment = 'alt';

?>

<?php if ('open' == $post->comment_status) : ?>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>

<?php else : ?>
<div id="respond" class="comment-respond" name="respond">
<div class="comment-title">
						<span class="comt-title">发表评论吧</span>
						<div id="cancel-comment-reply"> 
<small><?php cancel_comment_reply_link() ?></small>
</div>
					</div>
<form class="comment-form" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<div class="textarea-p" id="textarea-p"><textarea name="comment" id="comment-textarea"  rows="4" tabindex="4" required="您必须填写什么"></textarea></div>

<p style="margin: 0;">
<input name="submit" type="submit" id="submit" tabindex="5" value="提交评论" class="comment-submit"/>
<a class="biaoqing" id="biaoqing"> <i class="iconfont">&#xe618</i>表情</a>
<?php comment_id_fields(); ?>
</p>
<p><i class="mm-arrow" id="mm-arrow"></i></p>
<div class="all-biaoqing" id="all-biaoqings">
	<ul id="all-biaoqing">
		<li title="开心">(^o^)</li><li title="撒花">*\(^_^)/*</li><li title="拜托了">(^人^)</li><li title="纳尼">ლ(°Д°ლ)</li><li title="无奈">╮(－_－)╭</li>
		<li title="害羞">#^_^#</li><li title="哭泣">(T_T)</li><li title="瞥">→_→</li><li title="惊讶">(⊙o⊙)</li><li title="已晕">@_@</li>
		<li title="打脸">（￣#）3￣）</li><li title="掀桌">（╯－_－）╯╧╧</li><li title="膜拜">m（_　_）m</li><li title="嘻嘻">（～￣▽￣～）</li><li title="亲亲"><(￣3￣)></li>
	</ul>
</div>
<?php if ( $user_ID ) : ?>

<p>正在以<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>的身份登录. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">登出 &raquo;</a></p>

<?php else : ?>
<div class="form-main">
	<div class="form-left">
		<p>填写邮箱和昵称就能评论了哦</p>
	</div>
	<div class="form-right">
	<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="40" tabindex="1" placeholder="请输入昵称" required="昵称必填"/>
	<label for="author"><small>昵称<?php if ($req) echo "*"; ?></small></label></p>
	
	<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" placeholder="请输入邮箱" required="昵称必填" />
	<label for="email"><small>邮箱<?php if ($req) echo "*"; ?></small></label></p>
	
	<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" />
	<label for="url"><small>您的网址</small></label></p>
	</div>
</div>


<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> <?php _e('You can use these tags&#58;'); ?> <?php echo allowed_tags(); ?></small></p>-->



<?php do_action('comment_form', $post->ID); ?>

</form>
</div>
<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

<!-- You can start editing here. -->

<div id="postcomments" name="comments">
<?php if ( have_comments() ) : ?>
		<span class="comments-title">
			<?php
				echo "一共".get_comments_number()."句吐槽";
			?>
		</span>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size'       => 32,
					'callback'   => 'mm_comment'
				) );
			?>
		</ol><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

</div>
