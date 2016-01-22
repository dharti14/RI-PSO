<?php
/*
* Template Name: LP2 Thanks
*/
?>

<?php

require(THEME_PATH_DIR.'/lp2/lib/structure/common.php');

//No Header in PPC page
require(THEME_PATH_DIR.'/lp2/lib/structure/header.php');

add_action('genesis_loop','lp2_thanks_content_genesis_loop');

function lp2_thanks_content_genesis_loop()
{
	require(THEME_PATH_DIR.'/lp2/lib/structure/thanks-content.php');
}

require(THEME_PATH_DIR.'/lp2/lib/structure/footer.php');

genesis();
?>