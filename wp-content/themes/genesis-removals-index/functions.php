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

define('SITE_URL',get_site_url());

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



/**
 * overrides the default WordPress redirect of trailing /index.php to /
 *
 *
 * For historical reasons RI/Pinlocal needs to maintain/preserve trailing /index.php in their PPC URLs
 * and this filter handles the same.
 *
 *
 * @param string $redirect_url
 * @param string $requested_url
 * @return string
 */
function handle_ri_main_url_redirects($redirect_url, $requested_url)
{

	//if it is RI PPC URL /ri/main/index.php then we need to preserve the URL

	if(stripos($requested_url, 'ri/main/index.php')!==FALSE)
	{
		return $requested_url; //this will prevent redirect
	}
	else
	{
		return $redirect_url; //normal WP redirect

	}
}
add_filter('redirect_canonical', 'handle_ri_main_url_redirects',1,2);



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
	
	//Fallback for ri/main
	$newrules["^ri\/main?$"]			  		=  'index.php?page_id='.ri_get_id_by_slug('ri-1');
	
	$newrules["^ri\/main\/index.php$"]  		=  'index.php?page_id='.ri_get_id_by_slug('ri-1');
	$newrules["^ri\/main\/index-3.php$"] 		=  'index.php?page_id='.ri_get_id_by_slug('ri-3');
	$newrules["^ri\/main\/index-5.php$"] 		=  'index.php?page_id='.ri_get_id_by_slug('ri-5');
	$newrules["^ri\/main\/index-m.php$"] 		=  'index.php?page_id='.ri_get_id_by_slug('ri-m');
	
	$newrules["^2\/thanks/?$"] 					=  'index.php?page_id='.ri_get_id_by_slug('/2thanks');
	
	$rules = $newrules + $rules;

	return $rules;
}
add_filter('rewrite_rules_array', 'ri_rewrite_rules' , 1 , 1);


function ri_page_template_redirect(){
	
	$req_uri = $_SERVER['REQUEST_URI'];
	$req_uri_array = explode('?', $req_uri);
    if( $req_uri_array[0] == '/2thanks/' || $req_uri_array[0] == '/2thanks' ) {
    	
    	$queryString = '';
    	if(count($req_uri_array) > 1) {
    		$queryString = "?{$req_uri_array[1]}";
    	}
    	
    	wp_redirect(home_url().'/2/thanks/'.$queryString);
        exit();
    }
}
add_action( 'template_redirect', 'ri_page_template_redirect' );


//********************* remove default genesis action *********************//


//Including ri custom metaboxes
require(THEME_PATH_DIR.'/lib/inc/ri-custom-metaboxes.php');
//Including ri custom metaboxes


//Keeping the ri phone number central,so that you can change it here if you want to and the changes are reflected overall

//For landing page template only
function ri_display_phone_number(){
	return '0203 514 9040';
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

//Adding js for preview the h1 (schema) tag for silo pages
add_action( 'admin_enqueue_scripts', 'ri_add_js_for_silo_page_metabox' );
function ri_add_js_for_silo_page_metabox($hook){
	wp_enqueue_script('ri-silo-metabox-js', THEME_PATH_URI.'/lib/site/assets/js/ri_silo_page_metaboxes.js', array( 'jquery' ), true );
}


?>