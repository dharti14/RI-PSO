<?php
/*
* Template Name: LP1
*/

require(TD.'/lp1/lib/structure/common.php');

require(TD.'/lp1/lib/structure/header.php');

add_action('genesis_loop','lp1_content_genesis_loop');

function lp1_content_genesis_loop()
{
	require(TD.'/lp1/lib/structure/ppc-content.php');
}

require(TD.'/lp1/lib/structure/footer.php');

//Initialize the genesis framework
genesis();
?>