<?php 

add_action('genesis_footer', 'lp1_footer');

function lp1_footer(){
	
	
	wp_register_style('open-sans', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,300,400,600&subset=latin,latin-ext');
	wp_enqueue_style('open-sans');
?>


<!-- W3TC-include-js-head -->


	<div class="footer">
	 <div class="container">
	  <div class="footer-link"> 

    
    <?php 
    
    // If we Want dynamic menu then uncomment this code. We can set pages from dashboard 
    //which we want to display in menu.
    

		            $defaults = array(
		              'theme_location'  => 'footer',
		              'container'       => false,
		              'menu_class'      => 'menu',
		              'echo'            => true,
		              'items_wrap'      => '<ul id="footer">%3$s</ul>',
		              'depth'           => 1
		            );
		
		            genesis_nav_menu( $defaults );
     
		?>
   
  </div>
  
  <div class="copyright">
  
   <p>Copyright &copy; 2013 removals-index.com All rights reserved</p>
   <p>Removals Index, Communications House, 26 York St, London, W1U 6PZ</p>
   
  </div>
 </div>
</div>
	
<?php  
} 


?>