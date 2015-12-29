<?php

require('lib/site/common.php');
require('lib/site/header.php');

add_action('genesis_loop','ri_genesis_loop');

function ri_genesis_loop()
{
	require('site-content.php');
}

require('lib/site/footer.php');

//Initialize the genesis framework
genesis();
?>