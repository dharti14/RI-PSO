<?php
add_action('wp_enqueue_scripts', 'site_load_scripts');
function site_load_scripts() {
	
	wp_dequeue_style('open-sans');
	wp_deregister_style('open-sans');
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('site_customizer', THEME_PATH_URI.'/lib/site/assets/js/customizer.js',array('jquery'),'',true );
	wp_enqueue_script('bootstrapjs', THEME_PATH_URI.'/lib/site/assets/js/bootstrap.min.js',array('jquery'),'',true );
	wp_enqueue_script('trustpilot', '//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js', '', '', true);

	// LOAD MAIN STYLE
	wp_enqueue_style('bootstrapcss', THEME_PATH_URI.'/lib/site/assets/css/bootstrap.min.css');
	wp_enqueue_style('style_css', THEME_PATH_URI.'/lib/site/assets/css/style.css');
	wp_enqueue_style('fontawsome', THEME_PATH_URI.'/lib/site/assets/css/font-awesome.min.css');
}
?>