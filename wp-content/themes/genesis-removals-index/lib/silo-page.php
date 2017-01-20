<?php

// Template Name: SILO Content Page - Big header

remove_action('genesis_loop', 'loop_for_internal_page_content');
remove_action('genesis_before_header', 'site_before_header');
remove_action('genesis_header', 'site_header');
remove_action('genesis_after_header', 'site_after_header');
remove_action('genesis_footer', 'site_footer');

require(THEME_PATH_DIR.'/lib/site/structure/silo-header.php');


//=======================LOOP==========================

add_action('genesis_loop','ri_silo_content_loop');

function ri_silo_content_loop()
{	
	require(THEME_PATH_DIR.'/lib/silo-page-content.php');
}

//=======================LOOP==========================

require(THEME_PATH_DIR.'/lib/site/structure/silo-footer.php');

genesis();
