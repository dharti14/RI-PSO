<?php
/*
* Template Name: LP2 PPC Thanks
*/
?>

<?php

require(TD.'/lp2/lib/structure/common.php');

//No Header in PPC page
require(TD.'/lp2/lib/structure/header.php');

add_action('genesis_loop','ri_genesis_loop');

function ri_genesis_loop()
{
	require(TD.'/lp2/lib/structure/thanks-content.php');
}

require(TD.'/lp2/lib/structure/footer.php');

genesis();
?>