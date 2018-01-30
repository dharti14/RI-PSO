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
		add_action( 'admin_post_postcode_lookup_option', array($this,'postcode_lookup_options' ));
		include 'postcode-lookup.php';
	}
	public function postcode_lookup_add_page() {
	     add_submenu_page( 'options-general.php' , 'Postcode Lookup', 'Postcode Lookup' , 'manage_options' , 'postcode_lookup' , array($this,'postcode_lookup_contents'));
	}
	public function postcode_lookup_contents() {
		
		$options = get_option( 'postcode_lookup_array' );
		?>
	   
	      <h2>Postcode Lookup Page Setteing</h2>
	      <form method="post" action="admin-post.php">
	         <input type="hidden" name="action" value="postcode_lookup_option" />
	 
	         <?php wp_nonce_field( 'postcode_lookup_verify' ); ?>
	 
	         Postcode Lookup URL: <input type="text" style="width:27%" name="postcode_lookup_url" value="<?php echo esc_html( $options['postcode_lookup_url_value'] ); ?>"/>
	         <br />
	         Postcode Lookup Key: <input type="text" style="width:27%" name="postcode_lookup_key" value="<?php echo esc_html( $options['postcode_lookup_key_value'] ); ?>"/>
	         <br/>
	         <input type="submit" value="Submit" class="button-primary"/>
	      </form>
	   
	<?php
	

	}
	public function postcode_lookup_options()
	{
	   if ( !current_user_can( 'manage_options' ) )
	   {
	      wp_die( 'You are not allowed to be on this page.' );
	   }
	   // Check that nonce field
	   check_admin_referer( 'postcode_lookup_verify' );
	
	   $options = get_option( 'postcode_lookup_array' );
	
	   if ( isset( $_POST['postcode_lookup_url'] ) )
	   {
	      $options['postcode_lookup_url_value'] = sanitize_text_field( $_POST['postcode_lookup_url'] );
	   }
	   if ( isset( $_POST['postcode_lookup_key'] ) )
	   {
	   	$options['postcode_lookup_key_value'] = sanitize_text_field( $_POST['postcode_lookup_key'] );
	   }
	   
	
	   update_option( 'postcode_lookup_array', $options );
	
	   wp_redirect(  admin_url( 'options-general.php?page=postcode_lookup' ) );
	   
	   exit;
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