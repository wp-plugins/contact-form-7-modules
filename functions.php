<?php

add_action('admin_notices', 'contact_form_7_modules_gf');

function contact_form_7_modules_gf() {
	global $pagenow;
	
	if(!current_user_can('install_plugins')) { return; }
	
	$message = (int)get_option('cf7_modules_hide_gf_message');
	
	if(isset($_REQUEST['hide']) && $_REQUEST['hide'] == 'cf7_modules_gf_message') {
		$message = 2;
		update_option('cf7_modules_hide_gf_message', $message);
	} 
	
	if($pagenow == 'admin.php' && isset($_REQUEST['page']) && $_REQUEST['page'] == 'wpcf7' && $message !== 2) {
	?>
	<div class="updated" style="font-size:1.1em">
	<?php 
		// If this is new.
		if($message !== 1) {
	?>
		<p><a href="http://katz.si/gf?con=banner" title="Gravity Forms Contact Form Plugin for WordPress"><img src="http://gravityforms.s3.amazonaws.com/banners/728x90.gif" alt="Gravity Forms Plugin for WordPress" width="728" height="90" style="border:none;" /></a></p>
		<h3>If you like Contact Form 7, you'll love <a href="http://katz.si/gf?con=headline" target="_blank">Gravity Forms</a>.</h3>
		<p>Gravity Forms is a revolutionary contact form plugin that does everything Contact Form 7 does...and tons of amazing stuff Contact Form 7 can not. Gravity Forms has awesome support and out-of-the-box functionality. <a href="http://katz.si/gf" target="_blank" style="white-space:nowrap; font-weight:bold;">Check out Gravity Forms today!</a></p>
	<?php } ?>
		<h2>Want to integrate your form with a newsletter?</h2>
		<h4>Don't have a Constant Contact account? <a href="http://katz.si/4i">Try Constant Contact for free</a> for 15 days!</h4>
		<p>The Contact Form 7 Constant Contact Module makes it <em>super-simple</em> to add your contacts to an email newsletter. Simply sign up for a free trial at Constant Contact, enter your details, and you're ready to rock.</p>
		<p class="submit"><a href="<?php echo admin_url('plugin-install.php?tab=plugin-information&amp;plugin=contact-form-7-newsletter&amp;TB_iframe=true&amp;width=600&amp;height=800'); ?>" class="button button-primary thickbox" style="display:inline-block; margin-bottom:1em;" title="Install Contact Form 7 - Constant Contact Module">Add Newsletter Support</a><strong> - It's easy to add newsletter support to Contact Form 7!</strong></p>
		<hr style="outline:none; border:none; border-bottom:1px solid #efefef;"/>
		<p class="description"><a href="<?php echo add_query_arg('hide', 'cf7_modules_gf_message'); ?>" class="button alignright" style="font-style:normal; margin-bottom:.5em;">Hide this message</a></p>
		<div class="clear"></div>
	</div>
	<?php
	}
}

add_filter( 'wpcf7_cf7com_links', 'contact_form_7_modules_links' );

function contact_form_7_modules_links($links) {
	return str_replace('</div>', ' - <a href="http://katz.si/gf?con=link" target="_blank" title="Gravity Forms is the best WordPress contact form plugin." style="font-size:1.2em;">Try Gravity Forms</a></div>', $links);
}

?>