<div id="rightbar" class="fixheight">
<div class="right-rbroundbox">
	<div class="right-rbtop"><div></div></div>
		<div class="right-rbcontent">

			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-right') ) : else : ?>
		<p>Please enable widgets or modify leftbar.php to add content to this sidebar.</p>
			<?php endif; ?>
			
		</div><!-- /rbcontent -->
	<div class="right-rbbot"><div></div></div>
</div><!-- /rbroundbox -->
</div> <?php /* sidebar */ ?>

