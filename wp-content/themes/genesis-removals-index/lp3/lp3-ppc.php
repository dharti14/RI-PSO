<?php
/*
* Template Name: LP3 - New Design
*/

require(THEME_PATH_DIR.'/lp3/lib/structure/common.php');

require(THEME_PATH_DIR.'/lp3/lib/structure/header.php');

add_action('genesis_loop','lp3_content_genesis_loop');

function lp3_content_genesis_loop()
{
	require(THEME_PATH_DIR.'/lp3/lib/structure/ppc-content.php');
}

require(THEME_PATH_DIR.'/lp3/lib/structure/footer.php');

//Initialize the genesis framework
genesis();
?>