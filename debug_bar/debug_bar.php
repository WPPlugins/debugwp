<?php
global $wpdb,$wp_query,$wp_scripts,$wp_styles;
?>

<div id="dbwp_bar_wrap">

	<div id="dbwp_bar">
		<ul>
			<li class="first">DebugWP Bar</li>
			<li class="last"><span class="icon_plus"></span><a onclick="javascript:dbwp_bar_toggle();">Expand</a></li>
		</ul>
	</div>
	
	<div id="dbwp_slide" class="">
		<div class="dbwp_panel">
			<div class="dbwp_heading">Query Information</div>
			<dl>
				<dt>Total Queries</dt>
				<dd><?php echo $wpdb->num_queries; ?></dd>
				<dt>Execution Time</dt>
				<dd><?php round(timer_stop(1), 3); ?> Seconds</dd>
			</dl>	
		</div>
		
		<div class="dbwp_panel">
			<div class="dbwp_heading">Object Information</div>
			<dl>
				<dt>Page Type</dt>
				<dd><?php echo get_current_page_type(); ?></dd>
				<dt>Post Type</dt>
				<dd><a href="<?php echo get_admin_url(); ?>edit.php?post_type=<?php echo $wp_query->post->post_type; ?>"><?php echo $wp_query->post->post_type; ?></a></dd>
				<?php if (is_page()): ?>
				<dt>Post ID</dt>
				<dd><?php echo get_current_page_id(); ?></dd>
				<?php endif; ?>
				<dt>Page Template</dt>
				<?php $template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true ); ?>
				<dd><?php echo $template_name; ?></dd>
			</dl>
		</div>
		
		<div class="dbwp_panel">
			<div class="dbwp_heading">Includes Information</div>
			<dl>
				<dt>Queued Scripts</dt>
				<dd><?php echo count($wp_scripts->queue); ?></dd>
				<dt>Done Scripts</dt>
				<dd><?php echo count($wp_scripts->done); ?></dd>
				<dt>Queued Styles</dt>
				<dd><?php echo count($wp_styles->queue); ?></dd>
				<dt>Done Styles</dt>
				<dd><?php echo count($wp_styles->done); ?></dd>
			</dl>
		</div>
		 
		<div class="dbwp_panel">
			<div class="dbwp_heading">Loaded Scripts</div>
			<ul>
			<?php foreach($wp_scripts->done as $value) : ?>
				<li><?php echo $value; ?></li>
			<?php endforeach; ?>
			</ul>
		</div>
		 
		<div class="dbwp_panel">
			<div class="dbwp_heading">Loaded Styles</div>
			<ul>
			<?php foreach($wp_styles->done as $value) : ?>
				<li><?php echo $value; ?></li>
			<?php endforeach; ?>
			</ul>
		</div> 
		
		<div class="dbwp_panel last">
			<div class="dbwp_heading">Site Information</div>
			<dl>
				<dt>Bot Status</dt>
				<dd><?php if (get_option('blog_public')): ?>
				<a href="<?php echo get_admin_url(); ?>options-reading.php#blog_public">Bots allowed</a>
				<?php else: ?>
				<a href="<?php echo get_admin_url(); ?>options-reading.php#blog_public">Bots disallowed</a>
				<?php endif; ?></dd>
				<dt>Posts Per Page</dt>
				<dd><a href="<?php echo get_admin_url(); ?>options-reading.php#posts_per_page"><?php echo get_option('posts_per_page'); ?></a></dd>
				<dt>Active Theme</dt>
				<dd><a href="<?php echo get_admin_url(); ?>themes.php"><?php echo get_option('template'); ?></a></dd>
			</dl>
		</div> 
	</div>
	
</div>