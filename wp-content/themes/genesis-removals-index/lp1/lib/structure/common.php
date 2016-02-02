<?php

//Remove Default title 
remove_action( 'genesis_title', 'genesis_do_title' );

//Removing Header and Footer Of Site
remove_action('genesis_loop', 'loop_for_internal_page_content');
remove_action('genesis_before_header', 'site_before_header');
remove_action('genesis_header', 'site_header');
remove_action('genesis_after_header', 'site_after_header');
remove_action('genesis_footer', 'site_footer');


add_action('wp_enqueue_scripts', 'lp1_load_scripts');
function lp1_load_scripts() {
	
	//De registering styles of site
	wp_dequeue_style('style_css');
	wp_dequeue_style('fontawsome');
	
	// Enqueuing Scripts and Styles for lp1 
	wp_enqueue_script('jquery');
	wp_enqueue_script('lp1_customizer', THEME_PATH_URI.'/lp1/lib/assets/js/customizer.js' );
	wp_enqueue_script('lp1_bootstrapjs', THEME_PATH_URI.'/lp1/lib/assets/js/bootstrap.min.js' );
	wp_enqueue_script('trustpilot', '//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js', '', '', true);

	// LOAD MAIN STYLE
	wp_enqueue_style('lp1_bootstrapcss', THEME_PATH_URI.'/lp1/lib/assets/css/bootstrap.min.css');
	wp_enqueue_style('lp1_style_css', THEME_PATH_URI.'/lp1/lib/assets/css/style.css');
	wp_enqueue_style('lp1_fontawsome', THEME_PATH_URI.'/lp1/lib/assets/css/font-awesome.min.css');

}
?>