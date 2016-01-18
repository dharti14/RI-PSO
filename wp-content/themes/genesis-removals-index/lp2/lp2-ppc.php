<?php
/*
* Template Name: LP2
*/

require(TD.'/lp2/lib/structure/common.php');

require(TD.'/lp2/lib/structure/header.php');

add_action('genesis_loop','lp2_content_genesis_loop');

function lp2_content_genesis_loop()
{
	require(TD.'/lp2/lib/structure/ppc-content.php');
}

require(TD.'/lp2/lib/structure/footer.php');

genesis();
?>