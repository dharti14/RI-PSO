<?php

//Removing Header and Footer Of Site
remove_action('genesis_loop', 'loop_for_internal_page_content');
remove_action('genesis_before_header', 'site_before_header');
remove_action('genesis_header', 'site_header');
remove_action('genesis_after_header', 'site_after_header');
remove_action('genesis_footer', 'site_footer');


add_action('wp_enqueue_scripts', 'lp2_load_scripts');
function lp2_load_scripts() {
	
	//De registering styles of site
	wp_dequeue_style('style_css');
	wp_dequeue_style('fontawsome');
	
	
	// Enqueuing Scripts and Styles for lp2
	wp_enqueue_script('jquery');
	wp_enqueue_script('lp2_bootstrapjs', TDU.'/lp2/lib/assets/js/bootstrap.min.js' );
	wp_enqueue_script('trustpilot', '//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js', '', '', true);

	// LOAD MAIN STYLE
	wp_enqueue_style('lp2_bootstrapcss', TDU.'/lp2/lib/assets/css/bootstrap.min.css');
	wp_enqueue_style('lp2_style_css', TDU.'/lp2/lib/assets/css/style.css');
	wp_enqueue_style('lp2_fontawsome', TDU.'/lp2/lib/assets/css/font-awesome.min.css');
	wp_enqueue_style('lp2_font_opensans', '//fonts.googleapis.com/css?family=Open+Sans:400,800,700');

}
?>