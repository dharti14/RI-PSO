<?php 

add_action('genesis_footer', 'lp1_footer');

function lp1_footer(){
	
	
	wp_register_style('open-sans', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,300,400,600&subset=latin,latin-ext');
	wp_enqueue_style('open-sans');
	wp_enqueue_script('trustpilot', '//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js', array( 'jquery' ), '', true);
	wp_enqueue_style('lp1_font_opensans', '//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300');
?>


<?php //Please don't remove this piece of code as it is used to include js file at the bottom of page before </body> ?> 
<!-- W3TC-include-js-head -->
<?php //Please don't remove this piece of code as it is used to include js file at the bottom of page before </body> ?>


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
  
    <?php //Displaying copyright information and ri address, getting from functions.php ?>
    
		   <p><?php echo ri_copyright_information(); ?></p>
		   <p><?php echo ri_display_address(); ?></p>
		   
	<?php //Displaying copyright information and ri address, getting from functions.php ?>
   
  </div>
 </div>
 
 <div class="regulatory-info-container">
	<div class="container">
		<div class="regulatory-info center">
			<?php echo get_regulatory_info(); 	?>
		</div>
	</div>	
</div>
 
</div>
	
<?php  
} 


?>