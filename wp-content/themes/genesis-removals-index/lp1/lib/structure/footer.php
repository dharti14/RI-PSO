<?php 

add_action('genesis_footer', 'lp1_footer');

function lp1_footer(){
?>	
	<div class="footer">
 <div class="container">
  <div class="footer-link"> 
  
  <!-- If you don't want hard code menu then please remove this part of code -->
	   <ul>
	    <li><a href="#">Removal Companies Join Us</a></li>
	    <li><a href="<?php echo get_permalink(get_page_by_title('Terms and conditions')); ?>" target="_blank" />Terms and Conditions</a></li>
	    <li><a href="#">Privacy Policy</a></li>
	    <li><a href="#">Removals Price Guide</a> </li>
	   </ul>
   <!-- If you don't want hard code menu then please remove this part of code -->
    
    <?php 
    
    // If we Want dynamic menu then uncomment this code. We can set pages from dashboard 
    //which we want to display in menu.
    
    /*
		            $defaults = array(
		              'theme_location'  => 'ppc_footer',
		              'container'       => false,
		              'menu_class'      => 'menu',
		              'echo'            => true,
		              'items_wrap'      => '<ul id="ppc_footer">%3$s</ul>',
		              'depth'           => 1
		            );
		
		            genesis_nav_menu( $defaults );
     */
		?>
   
  </div>
  
  <div class="copyright">
  
   <p>Copyright &copy; 2013 removals-index.com All rights reserved</p>
   <p>Pinlocal Leads, Communications House, 26 York St, London, W1U 6PZ</p>
   
  </div>
 </div>
</div>
	
<?php  
} 


?>