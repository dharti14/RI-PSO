<?php

/*
 * 
 * Plugin Name: Pinlocal Sites CSS Optimizer
 * Plugin URI: http://www.regur.net
 * Description: This plugin is used to eliminate render-blocking CSS in above-the-fold content suggested by Google PageSpeed Insights. It will read all enqueued css files and dump it in the head.
 * Author: Regur Technology Solutions
 * Version: 1.0
 * Author URI: http://www.regur.net
 * 
 */



//Minifying the css files (stripping whitespaces except spaces before and after tags)
function pinlocal_minify_css_files($cssFile) {		

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
	
	//Replacing the line breaks too
	$cssFile = preg_replace( "/\r|\n/", "", $cssFile );

	return $cssFile;

}

//Getting enqueued css files, reading it, minifying it and dumping into head.
function pinlocal_get_all_css_files() {

	require_once(ABSPATH . 'wp-admin/includes/file.php');
	
	global $wp_styles, $wp_query;
	
	//Checking for wp_query object and post not empty
	if(!empty($wp_query) && !empty($wp_query->post)){
		
		//Getting the template name
		$templateName = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
		
		//Extracting directory name from templateName
		$path = explode('/',$templateName);
		$directory = $path[0];
		
		$path = get_home_path();
				
		echo '<style>';

		foreach( $wp_styles->queue as $handleName ){

			 $file = $wp_styles->registered[$handleName]->src;
					 
			 //Ignoring admin-bar.css 
			 if($handleName !="admin-bar"){
				
				$replaceFonts = '';
				$replaceFontsWith = '';
				$replaceImages = '';
				$replaceImagesWith = '';
				
				//Checking for plugins directory from full path($file)
				if (strpos($file, '/wp-content/plugins/') !== false){ //For PLUGIN
							
					/*
					 * As of now handling our plugin css file only.
					 */

					
					//Handling the plugin date-picker.css file for our plugin only
					if($handleName == "ri-jquery-datepicker-css"){
						$replaceImages = 'images/';
						$replaceImagesWith = '/wp-content/plugins/removals-index-quote-form/images/';
						
					}
					//Handling the plugin date-picker.css file for our plugin only
					
					
									
				}else { // For THEME
					
					
					//Note :- Please define "SITE_URL" Constant in your functions.php file. ex.  define('SITE_URL',get_site_url());
					
					//getting child theme path, i.e /wp-content/themes/genesis-removals-index
					$themePath = str_replace(SITE_URL, '', THEME_PATH_URI);
					
					//Setting Fonts path with absolute path
					$replaceFonts = '../fonts/';
					$replaceFontsWith = $themePath.'/'.$directory.'/lib/assets/fonts/';
					
					
					//Setting Images path with absolute path
					$replaceImages = '../images/';
					$replaceImagesWith = $themePath.'/'.$directory.'/lib/assets/images/';
					

					//For site and its internal pages
					if(empty($directory) || $directory == "default" || $directory == "lib" || $directory== "site"){
						
						//Setting directory to site only
						$directory = "site";
						
						$replaceFontsWith = $themePath.'/lib/'.$directory.'/assets/fonts/';
						$replaceImagesWith = $themePath.'/lib/'.$directory.'/assets/images/';
						
					}else{
												
						$replaceFontsWith = $themePath.'/'.$directory.'/lib/assets/fonts/';
						$replaceImagesWith = $themePath.'/'.$directory.'/lib/assets/images/';
					}
				
					
				}

				$file = str_replace(SITE_URL,$path,$file);
				
				$file = str_replace('/wp-content','wp-content',$file);

				$file = str_replace('/wp-includes','wp-includes',$file);
				
				if(!empty($file))
				{
					//reads entire file into string
					$cssFile = file_get_contents($file);
							
					//Replacing Fonts path
					$cssFile = str_replace($replaceFonts,$replaceFontsWith,$cssFile);
					
					//Replacing Images path
					$cssFile = str_replace($replaceImages,$replaceImagesWith,$cssFile);

					//minifying css files removing whitspaces before and after tags
					echo $minifiedCssFile =  pinlocal_minify_css_files($cssFile);
		    	}
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

}

add_action( 'wp_print_styles', 'pinlocal_get_all_css_files' );

?>