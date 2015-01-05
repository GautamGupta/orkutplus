<?php bb_get_header(); ?>

<h3 class="bbcrumb"><a href="<?php bb_option('uri'); ?>"><?php bb_option('name'); ?></a><?php bb_forum_bread_crumb(); ?></h3>
<p><center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* orkutplus/forum - front page - 468x60 */
google_ad_slot = "9669682987";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center></p>
<?php if ( $topics || $stickies ) : ?>

<table id="latest">
<tr>
	<th><?php _e('Topic'); ?> &#8212; <?php new_topic(); ?></th>
	<th><?php _e('Posts'); ?></th>
	<th><?php _e('Last Poster'); ?></th>
	<th><?php _e('Freshness'); ?></th>
</tr>

<?php if ( $stickies ) : foreach ( $stickies as $topic ) : ?>
<tr<?php topic_class(); ?>>
	<td><?php bb_topic_labels(); ?> <big><a href="<?php topic_link(); ?>"><?php topic_title(); ?></a></big></td>
	<td class="num"><?php topic_posts(); ?></td>
	<td class="num"><?php topic_last_poster(); ?></td>
	<td class="num"><a href="<?php topic_last_post_link(); ?>"><?php topic_time(); ?></a></td>
</tr>
<?php endforeach; endif; ?>

<?php if ( $topics ) : foreach ( $topics as $topic ) : ?>
<tr<?php topic_class(); ?>>
	<td><?php bb_topic_labels(); ?> <a href="<?php topic_link(); ?>"><?php topic_title(); ?></a></td>
	<td class="num"><?php topic_posts(); ?></td>
	<td class="num"><?php topic_last_poster(); ?></td>
	<td class="num"><a href="<?php topic_last_post_link(); ?>"><?php topic_time(); ?></a></td>
</tr>
<?php endforeach; endif; ?>
</table>
<p><a href="<?php forum_rss_link(); ?>" class="rss-link"><?php _e('RSS feed for this forum'); ?></a></p>
<center><p><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* op/forum menu link ads - 468x15 */
google_ad_slot = "9740372737";
google_ad_width = 468;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p></center>
<div class="nav">
<?php forum_pages(); ?>
</div>
<?php endif; ?>

<?php if ( bb_forums( $forum_id ) ) : ?>
<h2><?php _e('Subforums'); ?></h2>
<table id="forumlist">

<tr>
	<th><?php _e('Main Theme'); ?></th>
	<th><?php _e('Topics'); ?></th>
	<th><?php _e('Posts'); ?></th>
</tr>

<?php while ( bb_forum() ) : ?>
<tr<?php bb_forum_class(); ?>>
	<td><?php bb_forum_pad( '<div class="nest">' ); ?><a href="<?php forum_link(); ?>"><?php forum_name(); ?></a><p><small><?php forum_description(); ?></small></p><?php bb_forum_pad( '</div>' ); ?></td>
	<td class="num"><?php forum_topics(); ?></td>
	<td class="num"><?php forum_posts(); ?></td>
</tr>
<?php endwhile; ?>
</table>
<?php endif; ?>

<?php post_form(); ?>

<?php bb_get_footer(); ?>
