<?php
/*
* Template Name: LP4 Thanks
*/
?>

<?php

require(THEME_PATH_DIR.'/lp4/lib/structure/common.php');

//No Header in PPC page
require(THEME_PATH_DIR.'/lp4/lib/structure/header.php');

add_action('genesis_loop','lp4_thanks_content_genesis_loop');

function lp4_thanks_content_genesis_loop()
{
	require(THEME_PATH_DIR.'/lp4/lib/structure/thanks-content.php');
}

require(THEME_PATH_DIR.'/lp4/lib/structure/footer.php');

genesis();
?>