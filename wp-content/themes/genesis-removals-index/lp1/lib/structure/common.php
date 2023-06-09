<?php

//Remove Default title 
//remove_action( 'genesis_title', 'genesis_do_title' );

//Removing Header and Footer Of Site
remove_action('genesis_loop', 'loop_for_internal_page_content');
remove_action('genesis_before_header', 'site_before_header');
remove_action('genesis_header', 'site_header');
remove_action('genesis_after_header', 'site_after_header');
remove_action('genesis_footer', 'site_footer');

//De-queuing Unwanted css file which are applied in site
add_action('wp_enqueue_scripts','dequeue_unwanted_css',100);

function dequeue_unwanted_css(){

	wp_dequeue_style('bootstrapcss');
	wp_deregister_style('bootstrapcss');

	wp_dequeue_style('font_opensans');
	wp_deregister_style('font_opensans');
	
	wp_dequeue_script('site_customizer');
	wp_deregister_script('site_customizer');
	
	wp_dequeue_script('bootstrapjs');
	wp_deregister_script('bootstrapjs');
	
	wp_dequeue_style('open-sans');
 	wp_deregister_style('open-sans');


}
//De-queuing Unwanted css file which are applied in site


add_action('wp_enqueue_scripts', 'lp1_load_scripts');
function lp1_load_scripts() {
	
	//De registering styles of site
	wp_dequeue_style('style_css');
	wp_dequeue_style('fontawsome');
	
	// Enqueuing Scripts and Styles for lp1 
	wp_enqueue_script('jquery');
	wp_enqueue_script('lp1_customizer', THEME_PATH_URI.'/lp1/lib/assets/js/customizer.js',array('jquery'),'',true );
	//wp_enqueue_script('lp1_bootstrapjs', THEME_PATH_URI.'/lp1/lib/assets/js/bootstrap.min.js',array('jquery'),'',true );
	

	// LOAD MAIN STYLE
	wp_enqueue_style('lp1_bootstrapcss', THEME_PATH_URI.'/lp1/lib/assets/css/bootstrap.min.css');
	wp_enqueue_style('lp1_style_css', THEME_PATH_URI.'/lp1/lib/assets/css/style.css');
	wp_enqueue_style('lp1_fontawsome', THEME_PATH_URI.'/lp1/lib/assets/css/font-awesome.min.css');
	

}
?>