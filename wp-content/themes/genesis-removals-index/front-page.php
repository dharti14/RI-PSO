<?php
remove_action('genesis_loop', 'loop_for_internal_page_content');

add_action('genesis_loop','genesis_loop_front_page_content');

function genesis_loop_front_page_content()
{
	require('front-page-content.php');
}

//Initialize the genesis framework
genesis();
?>