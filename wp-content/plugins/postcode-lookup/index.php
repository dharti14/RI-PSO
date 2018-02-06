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
		add_action('wp_enqueue_scripts', array($this,'postcode_lookup_scripts' ));
		add_action('admin_enqueue_scripts', array($this,'postcode_lookup_admin_scripts' ));
		add_action('admin_menu', array($this,'postcode_lookup_add_page'));
		add_action('admin_post_postcode_lookup_option', array($this,'postcode_lookup_options' ));
		
		add_action('wp_ajax_postcode_lookup', array($this,'postcode_lookup_ajax')); // admin login
		add_action('wp_ajax_nopriv_postcode_lookup', array($this,'postcode_lookup_ajax')); //fronted
		
	}
	public function postcode_lookup_add_page() {
	     add_submenu_page( 'options-general.php' , 'Postcode Lookup', 'Postcode Lookup' , 'manage_options' , 'postcode_lookup' , array($this,'postcode_lookup_contents'));
	}
	public function postcode_lookup_contents() {
		
		$options = get_option( 'postcode_lookup_array' );
		?>
	   
	      <h2>Postcode Lookup Setting</h2>
	      <form method="post" action="admin-post.php">
	         <input type="hidden" name="action" value="postcode_lookup_option" />
	         <?php wp_nonce_field( 'postcode_lookup_verify' );?>
					
			<table class="form-table">	
				<tbody>
					<tr class="form-required">
						<th scope="row">
							<label for="postcode_lookup_api_url">API URL</label>
						</th>
						<td>
							<input type="text" class="pl-width" name="postcode_lookup_api_url" value="<?php echo esc_html( $options['postcode_lookup_url'] ); ?>"/>
						</td>
					</tr>
					<tr class="form-required">
						<th scope="row">
							<label for="postcode_lookup_api_key">API Key</label>
						</th>
						<td>
							<input type="text"  class="pl-width" name="postcode_lookup_api_key" value="<?php echo esc_html( $options['postcode_lookup_key'] ); ?>"/>
						</td>
					</tr>
					<tr>
					 <td> <input type="submit" value="Submit" class="button-primary"/></td>
					</tr>
					
				</tbody>
			</table>
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
	   
	  
	   if ( isset( $_POST['postcode_lookup_api_url'] ) && !empty($_POST['postcode_lookup_api_url'] ) )
	   {
	      $options['postcode_lookup_url'] = sanitize_text_field( $_POST['postcode_lookup_api_url'] );
	   }
	   if ( isset( $_POST['postcode_lookup_api_key'] ) && !empty($_POST['postcode_lookup_api_key'] ) )
	   {
	   	$options['postcode_lookup_key'] = sanitize_text_field( $_POST['postcode_lookup_api_key'] );
	   }
	   update_option( 'postcode_lookup_array', $options );
	
	   wp_redirect(  admin_url( 'options-general.php?page=postcode_lookup' ) );
	   
	   exit;
	}
	public function postcode_lookup_ajax(){
		
		 $searchedKeyword = $_GET['searchedKeyword'];
		 // pl means postcode lookup	
		 $options=get_option( 'postcode_lookup_array' );
		 $pl_url= $options['postcode_lookup_url'];
		 if(substr($pl_url, -1) == '/') {
			$pl_url = substr($pl_url, 0, -1);
		 }
		 $pl_key = $options['postcode_lookup_key'];
		 $initUrl = $pl_url.'/'.$pl_key.'?searchedKeyword='.$searchedKeyword;
			
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $initUrl);
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 curl_setopt($ch, CURLOPT_TIMEOUT, 3);
		 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		 $output = trim(curl_exec($ch));
		 echo $output;
		 curl_close($ch);  
		 wp_die();

	}
	
	public function postcode_lookup_scripts()
	{
		 wp_enqueue_style( 'postcode-style', plugins_url( '/css/style.css', __FILE__ ) );
	   	 
	   	 wp_enqueue_script('postcode_lookup', plugins_url( '/js/postcode_lookup.js' , __FILE__ ), array('jquery'), 1.0, true);
	   	 wp_localize_script('postcode_lookup', 'postcode_lookup', array('ajaxurl' => admin_url('admin-ajax.php'))); //create ajaxurl 
	   	 
   	}
	public function postcode_lookup_admin_scripts()
	{
		wp_enqueue_style( 'postcode-admin-style', plugins_url( '/css/admin-style.css', __FILE__ ) );
	}
}

new PostcodeLookup();
?>