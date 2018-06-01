<?php
/*
* Template Name: LP4 - New Design
*/

require(THEME_PATH_DIR.'/lp4/lib/structure/common.php');

require(THEME_PATH_DIR.'/lp4/lib/structure/header.php');

add_action('genesis_loop','lp4_content_genesis_loop');

function lp4_content_genesis_loop()
{
	require(THEME_PATH_DIR.'/lp4/lib/structure/ppc-content.php');
}

require(THEME_PATH_DIR.'/lp4/lib/structure/footer.php');

//Initialize the genesis framework
genesis();
?>