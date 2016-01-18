<?php
add_action('wp_enqueue_scripts', 'site_load_scripts');
function site_load_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', TDU.'/lib/site/assets/js/bootstrap.min.js' );
	wp_enqueue_script('trustpilot', '//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js', '', '', true);

	// LOAD MAIN STYLE
	wp_enqueue_style('bootstrapcss', TDU.'/lib/site/assets/css/bootstrap.min.css');
	wp_enqueue_style('style_css', TDU.'/lib/site/assets/css/style.css');
	wp_enqueue_style('fontawsome', TDU.'/lib/site/assets/css/font-awesome.min.css');
	wp_enqueue_style('font_opensans', '//fonts.googleapis.com/css?family=Open+Sans:400,800,700');

}
?>