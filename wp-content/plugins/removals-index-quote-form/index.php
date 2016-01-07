<?php ob_start();
/**
 * @package RI_QuoteForm
 * @version 1.0
 */
/*
Plugin Name: Removals Index Quote Form
Plugin URI: 
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
		
		protected $apiKey = '';
		
		protected $successPage = '';
		
		private $context = '';
		
		
		
		
		/**
		 * Constructor function.
		 */
		public function __construct( ) {
									
			/* Admin page action */
			add_action( 'admin_menu', array( &$this, 'quoteFormAdminMenu' ) );
						
			/* Fron page action */
			
			$defaults = array(
				'apiUrl'		=> '',
				'apiKey'		=> '',
			);
			
			$options = get_option('ri_quote_form', $defaults);
		
			$this->apiUrl = $options['apiUrl'];
			
			$this->apiKey = $options['apiKey'];
			
			define( 'RI_QUOTE_FORM_URL' , plugin_dir_url( __FILE__ ) );
			
			define( 'RI_QUOTE_FORM_PATH' ,plugin_dir_path( __FILE__ ) );
			
			add_action('wp_enqueue_scripts', array( &$this, 'quoteFormAssets' ) );
			
			//Ajax action fo all users(no-priviledges are set)
			// also use wp_ajax_action_name for logged in users only
			add_action( 'wp_ajax_nopriv_getAddressByPostCode',  array( &$this, 'getAddressByPostCode'));
			
			add_shortcode('ri_quote_form', array( &$this, 'quoteFormHtml' ) );
		}
		
		/**
		 * Include file for crafty Api
		*/
		
		function getAddressByPostCode() {
		
			include 'inc/ajaxaddress.php';
		
		}
		
		/**
		 * Add "Removals Quotes" menu under "Settings" menu.
		 */
		public function quoteFormAdminMenu( ) {
			
			add_options_page('Removals Index Quote Form Settings', 'RI Quote Form', 'manage_options', 'ri-quote-form', array( &$this, 'quoteFormOptions' ) );
		}
		
		/**
		 * 
		 */
		public function quoteFormOptions( ) {
			
			$message = "";
			
			$defaults = array(
				'apiUrl'		=> '',
				'apiKey'		=> '',
			);
				
			if($_POST) {
				
				$options = array(
					'apiUrl'		=> $_POST['apiUrl'],
					'apiKey'		=> $_POST['apiKey'],
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
		public function quoteFormAssets( ) {		
				
			wp_enqueue_script( 'ri-jquery-display-message', RI_QUOTE_FORM_URL.'js/site.min.js', array( 'jquery' ), '', true );
			
			wp_enqueue_style( 'ri-jquery-ui-css', RI_QUOTE_FORM_URL.'css/datepicker.css' );
					
			wp_enqueue_script( 'ri-jquery-datepicker',RI_QUOTE_FORM_URL.'js/jquery.datetimepicker.js', array( 'jquery' ), '', true );
			
			wp_enqueue_script( 'ri-jquery-validation', RI_QUOTE_FORM_URL.'js/jquery.validate.min.js', array( 'jquery' ), '', true );
			
		}
		

		/**
		 * function to display Removals Index Quote Form.
		 */
		public function quoteFormHtml( $atts ) {
						
			if( $_POST ) {	
				
				include 'quoteFormSubmit.php';
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
                   
		 public function loadCss($css) {
		 	
			 wp_enqueue_style( 'ri-quote-form-css', RI_QUOTE_FORM_URL.'css/'.$css.'.css' );
			 
		 } 
		 
		 public function loadJs($js) {
		 	
			wp_enqueue_script( 'ri-quote-form-js', RI_QUOTE_FORM_URL.'js/'.$js.'.js'); 
			
			wp_localize_script('ri-quote-form-js', 'addressObject', array('ajaxurl' => admin_url("admin-ajax.php")));
			
		 }

		 public function setContext($context_name) {
		 	
		 	$this->context = $context_name;
		 }
		 
		 public function getContext() {
		 	
		 	echo  $this->context;
		 }
		 
		 public function getInputId($id) {
		 	
		 	return $this->context ."_". $id;
		 }
		 		 
	}
	
	new RI_QuoteForm( );
}
?>