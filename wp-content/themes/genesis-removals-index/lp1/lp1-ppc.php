<?php
/*
* Template Name: LP1 - Old Design
*/

require(THEME_PATH_DIR.'/lp1/lib/structure/common.php');

require(THEME_PATH_DIR.'/lp1/lib/structure/header.php');

add_action('genesis_loop','lp1_content_genesis_loop');

function lp1_content_genesis_loop()
{
	require(THEME_PATH_DIR.'/lp1/lib/structure/ppc-content.php');
}

require(THEME_PATH_DIR.'/lp1/lib/structure/footer.php');

//Initialize the genesis framework
genesis();
?>