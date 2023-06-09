<?php

/*
 * Template Name: Home Page
 */

//Removing the default loop of genesis (used for internal pages in our case)
remove_action('genesis_loop', 'loop_for_internal_page_content');

add_action('genesis_loop','genesis_loop_front_page_content');

function genesis_loop_front_page_content()
{
	require(THEME_PATH_DIR.'/lib/site-home-page-content.php');
}

//Initialize the genesis framework
genesis();
?>