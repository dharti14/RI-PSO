<?php 

add_action('genesis_footer', 'lp2_footer');

function lp2_footer(){
	
	wp_register_style('open-sans', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,300,400,600&subset=latin,latin-ext');
	wp_enqueue_style('open-sans');
	
?>	

<!-- W3TC-include-js-head -->

<footer class="main">
	 <div class="container">
	

    
     <?php 

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
   

  
  <div class="copyright">
  
   <p>Copyright &copy; <?php echo date("Y");?> removals-index.com All rights reserved</p>
   <p>Removals Index, Communications House, 26 York St, London, W1U 6PZ</p>
   
  </div>
 </div>
</div>
	
<?php  } ?>