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
		
		protected $apiKey = '';
		
		protected $successPage = '';
		
		private $context = '';
		
		
		
		
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
			
			add_action('wp_enqueue_scripts', array( &$this, 'quote_form_assets' ) );
			
			//Ajax action fo all users(no-priviledges are set)
			// also use wp_ajax_action_name for logged in users only
			add_action( 'wp_ajax_nopriv_get_address_by_postcode',  array( &$this, 'get_address_by_postcode'));
			
			add_shortcode('ri_quote_form', array( &$this, 'quote_form_html' ) );
			
		}
		
		/**
		 * Include file for crafty Api
		*/
		
		function get_address_by_postcode() {
		
			include 'inc/crafty_click.php';
		
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
				
			wp_enqueue_script( 'ri-jquery', RI_QUOTE_FORM_URL.'js/jquery.min.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'ri-jquery-ui', RI_QUOTE_FORM_URL.'js/jquery.ui.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'ri-jquery-scrollTo-js', RI_QUOTE_FORM_URL.'js/scrollTo.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'ri-jquery-validate-js', RI_QUOTE_FORM_URL.'js/jquery.validate.min.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'ri-jquery-datepicker',RI_QUOTE_FORM_URL.'js/jquery.datetimepicker.js', array( 'jquery' ), '', true );
			wp_enqueue_style( 'ri-jquery-datepicker-css', RI_QUOTE_FORM_URL.'css/datepicker.css' );
				
		}
		

		/**
		 * function to display Removals Index Quote Form.
		 */
		public function quote_form_html( $atts ) {
					
			if( $_POST ) {	
				
				include 'quote_form_submit.php';
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
		 	
			 wp_enqueue_style( 'ri-quote-form-css', RI_QUOTE_FORM_URL.'css/'.$css.'.css' );
			 
		 } 
		 
		 public function ri_load_js($js) {
		 	
			wp_enqueue_script( 'ri-quote-form-js', RI_QUOTE_FORM_URL.'js/'.$js.'.js'); 
			
			wp_localize_script('ri-quote-form-js', 'post_code_address_object', array('ajaxurl' => admin_url("admin-ajax.php")));
			
		 }	
		 		 
	}
	
	new RI_QuoteForm( );
	

}
?>