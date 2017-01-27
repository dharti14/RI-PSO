<?php
/*
* Template Name: AnyVan
*/

require(THEME_PATH_DIR.'/anyvan/lib/structure/common.php');

require(THEME_PATH_DIR.'/anyvan/lib/structure/header.php');

add_action('genesis_loop','anyvan_content_genesis_loop');

function anyvan_content_genesis_loop()
{
	require(THEME_PATH_DIR.'/anyvan/lib/structure/anyvan-content.php');
}

require(THEME_PATH_DIR.'/anyvan/lib/structure/footer.php');

//Initialize the genesis framework
genesis();
?>