<?php
/*
* Template Name: LP2 Thanks
*/
?>

<?php

require(TD.'/lp2/lib/structure/common.php');

//No Header in PPC page
require(TD.'/lp2/lib/structure/header.php');

add_action('genesis_loop','lp2_thanks_content_genesis_loop');

function lp2_thanks_content_genesis_loop()
{
	require(TD.'/lp2/lib/structure/thanks-content.php');
}

require(TD.'/lp2/lib/structure/footer.php');

genesis();
?>