<?php

// Template Name: SILO Content Page - Big header

// remove_action('genesis_header', 'site_header');

// require(THEME_PATH_DIR.'/lib/site/structure/silo-header.php');

// add_action('wp_enqueue_scripts', 'ci_dequeue_css_from_site');
// function ci_dequeue_css_from_site() {
	
// 	wp_dequeue_style('general-style');
// 	wp_deregister_style('general-style');
	
// }

//=======================LOOP==========================

remove_action('genesis_loop', 'loop_for_internal_page_content');

add_action('genesis_loop','ri_silo_content_loop');

function ri_silo_content_loop()
{	
	require(THEME_PATH_DIR.'/lib/silo-page-content.php');
}

//=======================LOOP==========================


genesis();
