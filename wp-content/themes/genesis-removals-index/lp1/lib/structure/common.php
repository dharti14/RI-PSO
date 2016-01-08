<?php
add_action('wp_enqueue_scripts', 'ri_load_scripts');
function ri_load_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('customizer', TDU.'/lp1/lib/assets/js/customizer.js');
	wp_enqueue_script('bootstrapjs', TDU.'/lp1/lib/assets/js/bootstrap.min.js' );
	wp_enqueue_script('trustpilot', '//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js', '', '', true);

	// LOAD MAIN STYLE
	wp_enqueue_style('bootstrapcss', TDU.'/lp1/lib/assets/css/bootstrap.min.css');
	wp_enqueue_style('style_css', TDU.'/lp1/lib/assets/css/style.css');
	wp_enqueue_style('fontawsome', TDU.'/lp1/lib/assets/css/font-awesome.min.css');

}
?>