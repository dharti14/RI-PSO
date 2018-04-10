<?php
/*
* Template Name: LP3 Thanks
*/
?>

<?php

require(THEME_PATH_DIR.'/lp3/lib/structure/common.php');

//No Header in PPC page
require(THEME_PATH_DIR.'/lp3/lib/structure/header.php');

add_action('genesis_loop','lp3_thanks_content_genesis_loop');

function lp3_thanks_content_genesis_loop()
{
	require(THEME_PATH_DIR.'/lp3/lib/structure/thanks-content.php');
}

require(THEME_PATH_DIR.'/lp3/lib/structure/footer.php');

genesis();
?>