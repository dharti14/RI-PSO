<?php ob_start();
/**
 * @package RI_QuoteForm
 * @version 1.0
 */
/*
Plugin Name: Removals Index Quote Form
Plugin URI: http://www.regur.net
Description: This plugin is used to generate Removals index quote form.
Author: Regur Technology Solutions
Version: 1.0
Author URI: http://www.regur.net
*/

if( !class_exists( 'RI_QuoteForm' ) ) {
	
	class RI_QuoteForm {
		
		/**
		 * @var
		 */
		protected $apiUrl = '';
		
		protected $api_key = '';
		
		private $mode = '';
		
		
		/**
		 * Constructor function.
		 */
		public function __construct( ) {
			
			/* Admin page action */
			add_action( 'admin_menu', array( &$this, 'quote_form_admin_menu' ) );
			
			
						
			/* Fron page action */
			
			$defaults = array(
				'apiUrl'		=> ''
				
			);
			
			$options = get_option('ri_quote_form', $defaults);
		
			$this->apiUrl = $options['apiUrl'];
					
			define( 'RI_QUOTE_FORM_URL' , plugin_dir_url( __FILE__ ) );
			
			define( 'RI_QUOTE_FORM_PATH' ,plugin_dir_path( __FILE__ ) );
			
			add_action('wp_enqueue_scripts', array( &$this, 'quote_form_assets' ),11 );
			
			//Ajax action fo all users(no-priviledges are set)
			// also use wp_ajax_action_name for logged in users only
			add_action( 'wp_ajax_nopriv_get_address_by_postcode',  array( &$this, 'get_address_by_postcode'));
			add_action( 'wp_ajax_get_address_by_postcode',  array( &$this, 'get_address_by_postcode'));
			
			add_action( 'wp_ajax_ri_email_verify', array('RI_QuoteForm','ri_email_verify'));
			add_action( 'wp_ajax_nopriv_ri_email_verify', array('RI_QuoteForm','ri_email_verify'));
			
			add_action( 'wp_ajax_ri_validate_phone_data8', array('RI_QuoteForm','ri_validate_phone_data8'));
			add_action( 'wp_ajax_nopriv_ri_validate_phone_data8', array('RI_QuoteForm','ri_validate_phone_data8'));
			
			add_shortcode('ri_quote_form', array( &$this, 'quote_form_html' ) );
			
			
			
			if(strpos(get_site_url(),'local')!==false) {
				$this->mode = 'development';
			} else {	
				$this->mode = 'production';
			}
			
			
			//Creating global array for the list of the quote form templates available.
			global $quote_form_templates;
				
			//Passing the name of the template file(.php) as key and the value will be Name (which is to be visible on front end).
			$quote_form_templates = array(
					'quote-form-template-02' => 'Template 02',
					'quote-form-template-01' => 'Template 01'
			);
				
			//Including ci plugin metaboxes file
			include 'inc/ri-quote-form-metaboxes.php';
			//Including ci plugin metaboxes file
			
			
		}
		
		/**
		 * Include file for crafty Api
		*/
		
		function get_address_by_postcode() {
			
			include 'inc/crafty-click.php';
		
		}
		
		/**
		 * Add "Removals Quotes" menu under "Settings" menu.
		 */
		public function quote_form_admin_menu( ) {
			
			add_options_page('Removals Index Quote Form Settings', 'RI Quote Form', 'manage_options', 'ri-quote-form', array( &$this, 'quote_form_options' ) );
		}
		
		/**
		 * 
		 */
		public function quote_form_options( ) {
			
			$message = "";
			
			$defaults = array(
				'apiUrl'		=> ''
				
			);
				
			if($_POST) {
				
				$options = array(
					'apiUrl'		=> $_POST['apiUrl']
				);
				
				if( get_option('ri_quote_form') )
					$check = update_option('ri_quote_form', $options);
				else
					$check = add_option('ri_quote_form', $options);
				
				if($check)
					$message = __( ' Settings saved.' );
			}
				
			$options = get_option('ri_quote_form', $defaults);
				
			include 'html/ri-quote-form-options.php';
		}
		
		/**
		 * insert js and css files.
		 */
		public function quote_form_assets( ) {		
				
			wp_enqueue_script( 'ri-jquery-ui', RI_QUOTE_FORM_URL.'js/jquery.ui.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'ri-jquery-scrollTo-js', RI_QUOTE_FORM_URL.'js/scrollTo.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'ri-jquery-validate-js', RI_QUOTE_FORM_URL.'js/jquery.validate.min.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'ri-jquery-datepicker',RI_QUOTE_FORM_URL.'js/jquery.datetimepicker.js', array( 'jquery' ), '', true );
			wp_enqueue_style( 'ri-jquery-datepicker-css', RI_QUOTE_FORM_URL.'css/datepicker.min.css' );
			
			
			//Checking for the lookup functionality selected
			$lookup_functionality = genesis_get_custom_field('_lookup_functionality');
				
			//Enqueuing the required files if data8 lookup functionality is selected
			if($lookup_functionality == "data8"){
			
				wp_enqueue_script( 'data8-js', 'https://webservices.data-8.co.uk/javascript/jqueryvalidation_min.js', array('ri-jquery-validate-js' ), '', true );
				wp_enqueue_script( 'data8-api', 'https://webservices.data-8.co.uk/javascript/loader.ashx?key=QvTZrK4u5NnULY8cN7h9r4WKAKhW97G_EqpdccenV_w', array('data8-js' ), '', true );
			
			}
			//Enqueuing the required files if data8 lookup functionality is selected
					
			
				
		}
		

		/**
		 * function to display Removals Index Quote Form.
		 */
		public function quote_form_html( $atts ) {
					
			if( $_POST ) {	
				
				include 'quote-form-submit.php';
			}
       
			if(isset($atts['template_name']) && !empty($atts['template_name'])) {
			  
				   $template_name=$atts['template_name'];  
				     
				   if(file_exists(plugin_dir_path( __FILE__ )."html/".$template_name.".php")) {
				    
	                 	include 'html/'.$template_name.'.php';
					
				   } else {
				  	
				     	echo $template_name.'.php Not Found';
	                 }	
              		  
			} else {   
            	                                                         
				include 'html/ri-quote-form.php';
            } 
                                  
		}
                   
		 public function ri_load_css($css) {
		 			 			 	
		 	//If development mode(local) then enqueue normal.css else enqueue minified css file
		 	$css_mode = $this->mode == "development" ? '.css' :'.min.css';
		 	
		 	wp_enqueue_style( 'ri-quote-form-css', RI_QUOTE_FORM_URL.'css/'.$css. $css_mode);
		 				 
		 }
		 
		 public function ri_load_js($js) {
		 	
			wp_enqueue_script( 'ri-quote-form-js', RI_QUOTE_FORM_URL.'js/'.$js.'.js'); 
			
			wp_localize_script('ri-quote-form-js', 'post_code_address_object', array('ajaxurl' => admin_url("admin-ajax.php")));
			
		 }

		 public function get_plocal_tags_var() {
		 	
		 	$requestUrl = explode('?', $_SERVER['REQUEST_URI']);
		 	
		 	$requestUrl = $requestUrl[0];
		 	if($requestUrl == '/ri/main' || $requestUrl == '/ri/main/') {
		 		$requestUrl = '/ri/main/index.php';
		 	}
		 	
		 	$pageUrl = str_replace('www.','',$_SERVER['HTTP_HOST']).$requestUrl;
		 	
		 	$params = array_merge(array('sourcepage' => $pageUrl),$_GET);
		 	
		 	$hiddenVars = '';
	 		foreach($params as $key => $val) 
	 		{
	 			$val = sanitize_text_field(urldecode($val));
	 			$val = preg_replace('/\\\"/','',$val);
	 			$hiddenVars .= '<input type="hidden" name="static_tags['.$key.']" value="'.$val.'" />';
	 		}
		 	
		 	return $hiddenVars;
		 	
		 }
		 
		 /**
		  * Validated email id
		  */
		 
		 public static function ri_email_verify( ) {
		 		
		 	/**
		 	 * Brite Verify API Key.
		 	 */
		 	$apiKey = "2aa0cffd-73b8-41f9-ae2c-232d644a09cf";
		 		
		 	$apiUrl = "https://bpi.briteverify.com/emails.json?";
		 		
		 	if( $_POST && isset( $_POST['emailAddress'] ) ) {
		 
		 		$initUrl = $apiUrl."address=".urlencode($_POST['emailAddress'])."&apikey=".urlencode($apiKey);
		 
		 		$ch = curl_init();
		 
		 		curl_setopt($ch, CURLOPT_URL, $initUrl);
		 
		 		//curl_setopt($ch, CURLOPT_HEADER, 0);
		 
		 		//curl_setopt($ch, CURLOPT_POST, 1);
		 
		 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 
		 		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		 
		 		$output = curl_exec($ch);
		 
		 			
		 
		 			
		 		if($output === false)
		 		{
		 			//echo 'Curl error: ' . curl_error($ch);
		 			echo "true";
		 		}
		 		else
		 		{
		 			$output = json_decode($output, true);
		 				
		 			if($output['status'] == 'valid' || $output['status'] == 'accept_all')
		 				echo "true";
		 			else if($output['status'] == 'invalid')
		 				echo "false";
		 				
		 		}
		 	}
		 	else {
		 		echo "false";
		 	}
		 	die();
		 		
		 }
		 
		 
		 
		 //It will check the phone number is valid or not after the format is passed.
		 public static function ri_validate_phone_data8( ) {
		 		
		 		
		 	if( $_POST && isset( $_POST['phoneNumber'] ) ) {
		 			
		 		$number = $_POST['phoneNumber'];
		 
		 		function IsValid($number)
		 		{
		 				
		 			$defaultCountry = 'United Kingdom';
		 				
		 			$options = array(
		 					array(
		 							"Name" => "UseMobileValidation",
		 							"Value" => "true"
		 					),
		 					array(
		 							"Name" => "UseLineValidation",
		 							"Value" => "true"
		 					)
		 			);
		 				
		 
		 			$params = array(
		 					"username" => 'rob@pinlocal.com',
		 					"password" => '$dxJ0Hxh',
		 					"telephoneNumber" => $number,
		 					"defaultCountry" => $defaultCountry,
		 					"options" => $options
		 			);
		 				
		 				
		 			$client = new SoapClient("http://webservices.data-8.co.uk/InternationalTelephoneValidation.asmx?WSDL");
		 			$result = $client->IsValid($params, $defaultCountry);
		 				
		 			// No access to the service
		 			if($result->IsValidResult->Status->CreditsRemaining == 0) {
		 					
		 				echo "false";
		 			}
		 
		 			else if ($result->IsValidResult->Result->ValidationResult == "Valid") {
		 
		 				echo "true"; //Phone number found valid
		 
		 			} else {
		 
		 				echo "false"; // Phone number invalid or other problem
		 
		 			}
		 				
		 		}
		 			
		 		IsValid($number);
		 
		 	}else{
		 
		 		// No post request made for validating phone number
		 		echo "false";
		 
		 	}
		 		
		 	die();
		 		
		 }
		 
		 		 
	}
	
	new RI_QuoteForm( );
	

}
?>