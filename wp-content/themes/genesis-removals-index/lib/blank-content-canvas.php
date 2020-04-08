<?php

// Template Name: Blank Content Canvas (With Header/Footer/Full Width)


//=======================LOOP==========================

//remove the default content page design of CI website (@see the functions.php) 
remove_action('genesis_loop', 'loop_for_internal_page_content');

//don't want the title displayed..
add_filter('genesis_post_title_text', 'ci_canvas_page_notitle');

//restore the original genesis framework loop.. 
add_action('genesis_loop','genesis_do_loop');


function ci_canvas_page_notitle($title)
{
	return '';
}

genesis();
