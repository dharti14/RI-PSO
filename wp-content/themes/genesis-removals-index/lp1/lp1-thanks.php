<?php
/*
* Template Name: LP1 Thanks
*/

require(THEME_PATH_DIR.'/lp1/lib/structure/common.php');

require(THEME_PATH_DIR.'/lp1/lib/structure/header.php');

add_action('genesis_loop','lp1_thanks_content_genesis_loop');

function lp1_thanks_content_genesis_loop()
{
	require(THEME_PATH_DIR.'/lp1/lib/structure/thanks-content.php');
}

require(THEME_PATH_DIR.'/lp1/lib/structure/footer.php');

genesis();
?>