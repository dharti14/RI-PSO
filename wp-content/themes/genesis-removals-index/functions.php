<?php
/** Start the engine */
require_once( TEMPLATEPATH . '/lib/init.php' );

//* We tell the name of our child theme
define( 'Child_Theme_Name', __( 'Genesis Child', 'genesis-removals-index' ) );
//* We tell the web address of our child theme (More info & demo)
define( 'Child_Theme_Url', 'http://my.studiopress.com/themes/genesis/' );
//* We tell the version of our child theme
define( 'Child_Theme_Version', '2.1.2' );

// DEFINE CHILD THEME DIRS
define('THEME_PATH_DIR', get_stylesheet_directory()); 
define('THEME_PATH_URI', get_stylesheet_directory_uri()); 

define('RI_SITE_URL',get_site_url());

define('THEME_PATH',get_template_directory());


//* Add HTML5 markup structure from Genesis
add_theme_support( 'html5' );

//* Add HTML5 responsive recognition
add_theme_support( 'genesis-responsive-viewport' );

//Removing default favicon 
remove_action('genesis_meta', 'genesis_load_favicon');



//********************* remove default genesis action *********************//

remove_action( 'genesis_meta', 'genesis_load_stylesheet' );

//remove_action( 'genesis_title', 'genesis_do_title' );

remove_action('genesis_header', 'genesis_header_markup_open', 5);
remove_action('genesis_header', 'genesis_do_header');
remove_action('genesis_header', 'genesis_header_markup_close', 15);

//remove_action( 'after_setup_theme', 'genesis_register_nav_menus' );

remove_action('genesis_loop', 'genesis_do_loop');
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

remove_action('genesis_footer', 'genesis_footer_markup_open',5);
remove_action('genesis_footer', 'genesis_do_footer');
remove_action('genesis_footer', 'genesis_footer_markup_close',15);




function ri_get_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}


//* Rewrite url

function ri_rewrite_rules($rules) {
	$newrules = array();
	$newrules["^2\/thanks/?$"] 		=  'index.php?page_id='.ri_get_id_by_slug('/2thanks');
	$rules = $newrules + $rules;

	return $rules;
}
add_filter('rewrite_rules_array', 'ri_rewrite_rules' , 1 , 1);


function ri_page_template_redirect(){
	$req_uri = $_SERVER['REQUEST_URI'];
	$req_uri_array = explode('?', $req_uri);
    if( $req_uri_array[0] == '/2thanks/' ) {
    	wp_redirect(home_url().'/2/thanks/');
        exit();
    }
}
add_action( 'template_redirect', 'ri_page_template_redirect' );


//********************* remove default genesis action *********************//


//Including ri custom metaboxes
require(THEME_PATH_DIR.'/lib/inc/ri-custom-metaboxes.php');
//Including ri custom metaboxes


//Keeping the ri phone number central,so that you can change it here if you want to and the changes are reflected overall
function ri_display_phone_number(){
	return '0333 444 8710';
}


//*************** Copyright Section *****************//

//Setting copyright information
function ri_copyright_information(){
	return 'Copyright &copy; ' . date("Y") . ' removals-index.com All rights reserved';
}

//Setting removals-index address
function ri_display_address(){
	return 'Removals Index, Communications House, 26 York St, London, W1U 6PZ';
}

//*************** Copyright Section *****************//

function ri_minify_css_files($cssFile) {		

	$search = array(
			'/\>[^\S ]+/s',  // strip whitespaces after tags, except space
			'/[^\S ]+\</s',  // strip whitespaces before tags, except space
			'/(\s)+/s'       // shorten multiple whitespace sequences
	);

	$replace = array(
			'>',
			'<',
			'\\1'
	);

	$cssFile = preg_replace($search, $replace, $cssFile);

	return $cssFile;

}


function ri_get_all_css_files() {

	global $wp_styles, $wp_query;
	
	//Getting the template name
	$templateName = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
	
	//Extracting directory name from templateName
	$path = explode('/',$templateName);
	$directory = $path[0];

	echo '<style>';

	foreach( $wp_styles->queue as $handleName ){

		 $file = $wp_styles->registered[$handleName]->src;
		 		 
		 //Ignoring admin-bar.css 
		 if($handleName !="admin-bar"){
		 	
		 	//Checking for plugins directory from full path($file)
		 	if (strpos($file, '/plugins/') !== false){ //For PLUGIN
		 				
		 		
		 		/* get_option('active_plugins') will give the list of all activate plugins
		 		 * Reference :- http://wordpress.stackexchange.com/questions/54742/how-to-do-i-get-a-list-of-active-plugins-on-my-wordpress-blog-programmatically
		 		 * 
		 		 * 
		 		 * get_plugins() will give list of all plugins (activated and deactivated)
		 		 * Reference :- https://codex.wordpress.org/Function_Reference/get_plugins
		 		 * 
		 		 */
		 		
			 		/*
			 		foreach (get_option('active_plugins') as $activePluginsList){
			 			$pluginspath = explode('/', $activePluginsList);
			 			$pluginDirectory =  $pluginspath[0];
			 		}
			 		
			 		$cssFile = str_replace('images/','/wp-content/plugins/'.$pluginDirectory.'/images/',$cssFile);
			 		*/
		 		
		 		
		 		//handle the plugin files and directory path dynamically
		 		
		 	}else { // For THEME
		 		
		 		//getting child theme path, i.e /wp-content/themes/genesis-removals-index
			    $themePath = str_replace(RI_SITE_URL, '', THEME_PATH_URI);
		 		
		 		//Setting Fonts path with absolute path
		 		$replaceFonts = '../fonts/';
		 		$replaceFontsWith = $themePath.'/'.$directory.'/lib/assets/fonts/';
		 		
		 		
		 		//Setting Images path with absolute path
		 		$replaceImages = '../images/';
		 		$replaceImagesWith = $themePath.'/'.$directory.'/lib/assets/images/';
		 		
		 		
		 		//For site and its internal pages
		 		if($directory == "default"){
		 			$directory = "site";
		 			$replaceFontsWith = $themePath.'/'.$directory.'/assets/fonts/';
		 			$replaceImagesWith = $themePath.'/'.$directory.'/assets/images/';
		 		}
		 		//For site and its internal pages
		 		
		 	}
		 			 	
		 	//reads entire file into string
		 	$cssFile = file_get_contents($file);
		 	
		 	
		 	
		 	
		 	//Handling the plugin date-picker.css file for our plugin only
		 	if($handleName == "ri-jquery-datepicker-css"){
		 		$cssFile = str_replace('images/','/wp-content/plugins/removals-index-quote-form/images/',$cssFile);	 
		 	}
		 	//Handling the plugin date-picker.css file for our plugin only
		 	
		 	
		 	
		 	
		 	
		 	//Replacing Fonts path
		 	$cssFile = str_replace($replaceFonts,$replaceFontsWith,$cssFile);
		 	
		 	//Replacing Images path
		 	$cssFile = str_replace($replaceImages,$replaceImagesWith,$cssFile);

			echo $minifiedCssFile =  ri_minify_css_files($cssFile);
		 }
	}
	echo '</style>';
	
	
	//Dequeuing the css files after reading it and dumping to style tag
	foreach( $wp_styles->queue as $handleName ){

		if($handleName !="admin-bar")
			wp_dequeue_style( $handleName );
	}
	//Dequeuing the css files after reading it and dumping to style tag

}

add_action( 'wp_print_styles', 'ri_get_all_css_files' );


// Setting Site header and footer for all pages
require(THEME_PATH_DIR.'/lib/site/structure/common.php');
require(THEME_PATH_DIR.'/lib/site/structure/header.php');
require(THEME_PATH_DIR.'/lib/site/structure/footer.php');
// Setting Site header and footer for all pages



//Including file for dki and non-dki scripts
require(THEME_PATH_DIR.'/lib/inc/DKIScripts.php');
//Including file for dki and non-dki scripts

//Including the wp-bootstrap-navwalker menu
require(THEME_PATH_DIR.'/lib/inc/ri-bootstrap-navwalker-menu.php');
//Including the wp-bootstrap-navwalker menu


//Checking for page is conversion? If yes then get the conversion scripts
function get_conversion_page_scripts() {

	$is_conversion_page = genesis_get_custom_field('_is_conversion_page');
	
	$conversion_scripts='';

	if($is_conversion_page == 'yes'){
		$conversion_scripts = genesis_get_custom_field('_conversion_script');
	}
	
	return $conversion_scripts;
}


//Getting the Page Id and from that we will get the pinlocal source key and thanks page id
function ri_get_page_id(){
	return get_the_ID();
}


//Adding action (genesis_loop) to get the contents of the page (ex. Terms and Conditions, Private Policy, etc.)
add_action('genesis_loop','loop_for_internal_page_content');

//Looping through the content for the site pages (Internal Pages)

function loop_for_internal_page_content() {
	?>

<article id="main_article">
	<div class="container">
		<?php if (have_posts()) :?>
			<?php while (have_posts()) : the_post();?>
				<h1 class="title"><?php the_title();?></h1>
				<?php the_content();?>
			<?php endwhile;?>
		<?php endif;?>
		
	</div>
</article>
<!-- /#main_article -->	

<?php
}

//Looping through the content for the site pages (Internal Pages)

// ADD DEFER/ASYNC TAG TO LOADED SCRIPTS

add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
function add_async_attribute($tag, $handle) {
    if ( 'font_opensans' !== $handle && 'bootstrapjs' !== $handle && 'trustpilot' !== $handle)
        return $tag;
    return str_replace( ' src', ' async="async" src', $tag );
}




//Register nav menus by wordpress way
/*
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'genesis' ),
	'ppc_footer' => __( 'PPC Footer Navigation', 'genesis' ),
	'secondary' => __('Secondary Navigation', 'genesis')
) );
*/

//If you don't want genesis menus then remove it
//remove_theme_support ( 'genesis-menus' );

//Registering nav menus by Genesis framework way
add_theme_support ( 'genesis-menus' , array (
		'primary' => __( 'Primary Navigation', 'genesis' ),
		'secondary' => __( 'Secondary Navigation', 'genesis' ),
		'footer' => __( 'Footer Navigation', 'genesis' )
) );


add_action('genesis_footer', 'lp2_dequeue_scripts',9999);
add_action('wp_enqueue_scripts', 'lp2_dequeue_scripts',9999);


function lp2_dequeue_scripts(){
	global $wp_styles;

	foreach( $wp_styles->queue as $handleName ){
// 		echo $handleName;

		//wp_dequeue_style( $handleName );
		//wp_deregister_style( $handleName );
	}
}

?>