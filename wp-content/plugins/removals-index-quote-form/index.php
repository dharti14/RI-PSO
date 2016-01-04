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
			
// 			echo  plugin_dir_path( __FILE__ );
// 			die();
			
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
			
			add_shortcode('ri_quote_form', array( &$this, 'quoteFormHtml' ) );
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
				if( get_option('ci_quote_form') )
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
			
			wp_enqueue_style( 'ri-jquery-ui-css', RI_QUOTE_FORM_URL.'css/datepicker.css' );
					
			wp_enqueue_script( 'ri-jquery-datepicker',RI_QUOTE_FORM_URL.'js/jquery.datetimepicker.js', array( 'jquery' ), '', true );
			
			wp_enqueue_script( 'ri-jquery-validation', RI_QUOTE_FORM_URL.'js/jquery.validate.min.js', array( 'jquery' ), '', true );

			wp_enqueue_script( 'ri-jquery-display-message', RI_QUOTE_FORM_URL.'js/site.min.js', array( 'jquery' ), '', true );
			
			//wp_enqueue_style('ci-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
		}
		
		/**
		 * function to display Removals Index Quote Form.
		 */
		public function quoteFormHtml( $atts ) {
			
			$ri_heading = (isset($atts['form_title']) && $atts['form_title'] != "") ? $atts['form_title'] : "";						
						
			$ri_submitBtn_class = (isset($atts['submit_button']) && $atts['submit_button'] != "") ? $atts['submit_button'] : 'btn btn-info btn-block';
			
			if( $_POST && isset($_POST['quoteFormSubmit']) && $_POST['quoteFormSubmit'] == 'yes' ) {
				
				include 'quoteFormSubmit.php';
			}
                       
			if(isset($atts['template_name']) && !empty($atts['template_name']))
			{
			  
			   $template_name=$atts['template_name'];  
			   
			   
			  if(file_exists(plugin_dir_path( __FILE__ )."html/".$template_name.".php"))
			  {
			    
                             include 'html/'.$template_name.'.php';
				
			  }
                          else
			  {
			     echo $template_name.'.php Not Found';
                          }	
              		  
			}
                        else
                        {                                                            
				include 'html/ri-quote-form.php';
                        }                       
		   }
                   
		 public function loadCss($css)
		 {
			 wp_enqueue_style( 'ri-quote-form-css', RI_QUOTE_FORM_URL.'css/'.$css.'.css' );
			 
		 } 
		 
		 public function loadJs($js)
		 {
			wp_enqueue_script( 'ri-quote-form-js', RI_QUOTE_FORM_URL.'js/'.$js.'.js'); 
			
			// Now we can localize the script with our data.
// 			$data = array( 'url' => plugin_dir_url( __FILE__ ) );
// 			wp_localize_script( 'ri-quote-form-js', 'CIURL', $data);
		 }

		 public function setContext($context_name)
		 {
		 	$this->context = $context_name;
		 }
		 public function getContext()
		 {
		 	echo  $this->context;
		 }
		 
		 public function getInputId($id)
		 {
		 	return $this->context ."_". $id;
		 }
		 
	}
	
	new RI_QuoteForm( );
}
?>