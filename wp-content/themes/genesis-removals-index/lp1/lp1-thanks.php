<?php
/*
* Template Name: LP1 Thanks
*/

require(TD.'/lp1/lib/structure/common.php');

require(TD.'/lp1/lib/structure/header.php');

add_action('genesis_loop','lp1_thanks_content_genesis_loop');

function lp1_thanks_content_genesis_loop()
{
	require(TD.'/lp1/lib/structure/thanks-content.php');
}

require(TD.'/lp1/lib/structure/footer.php');

genesis();
?>