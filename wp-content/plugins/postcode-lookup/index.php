<?php
/*
 Plugin Name: Postcode Lookup
 Plugin URI: http://www.regur.net
 Description: This plugin is used for autocomplete input text field.
 Author: Regur Technology Solutions
 Version: 1.0
 Author URI: http://www.regur.net
 */

class PostcodeLookup {
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array($this,'postcode_lookup_scripts' ));
		add_action('admin_menu', array($this,'postcode_lookup_add_page'));
		
	}
	public function postcode_lookup_add_page() {
	     add_menu_page(
	        __( 'Postcode', 'textdomain' ),
	        __( 'Postcode Lookup','textdomain' ),
	        'manage_options',
	        'postcode-lookup-autocomplete',
	        array($this,'postcode_lookup_page_callback')
	        
	    );
	}
	public function postcode_lookup_page_callback() {
	 ?>
	    <h2>Postcode Lookup Page API Setting</h2>
	    
	<?php
	 }
	public function postcode_lookup_scripts()
	{
		 wp_register_script( 'postcode-jquery', plugins_url( '/js/jquery.min.js', __FILE__ ) );
		 wp_enqueue_script( 'postcode-jquery' );
		 
	   	 wp_register_script( 'postcode-lookup', plugins_url( '/js/postcode_lookup.js', __FILE__ ) );
	   	 wp_enqueue_script( 'postcode-lookup' );
	   	 
	   	 wp_register_script( 'postcode-jquery-ui-min', plugins_url( '/js/jquery-ui.min.js', __FILE__ ) );
	   	 wp_enqueue_script( 'postcode-jquery-ui-min' );
	   	 
	   	 wp_enqueue_style( 'postcode-jquery-ui', plugins_url( '/css/jquery-ui.min.css', __FILE__ ) );
	   	 wp_enqueue_style( 'postcode-style', plugins_url( '/css/style.css', __FILE__ ) );
	   	 
	   	 
   	}
}

new PostcodeLookup();
?>