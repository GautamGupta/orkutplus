<div id="leftbar" class="fixheight">
<div class="left-rbroundbox">
	<div class="left-rbtop"><div></div></div>
		<div class="left-rbcontent">

			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-left') ) : else : ?>
			<p>Please enable widgets or modify leftbar.php to add content to this sidebar.</p>
			<?php endif; ?>
			
		</div><!-- /rbcontent -->
	<div class="left-rbbot"><div></div></div>
</div><!-- /rbroundbox -->

</div> <?php /* sidebar */ ?>



