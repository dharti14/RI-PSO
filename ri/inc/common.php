<?php
if(strpos($_SERVER['HTTP_HOST'],'local-ri')!==false)
{
	$jsmode = $cssmode = 'development';
}
else
{
	error_reporting(0);
	$jsmode = $cssmode = 'production';
}

function addBrTag($string, $position){
	$ex = explode(" ",$string);
	$count = count($ex);
	$i = 1;
	$string = "";
	foreach($ex as $s){
		if(($position < $count) && ($i == ($count - $position))){
			$tag = '<br> ';
		}else{
			$tag = ' ';
		}
		$string .= $s.$tag;
		$i++;
	}
	return rtrim($string,' ');
}

function exact_string( $query ){

	$query = str_replace('_', ' ', $query);
	$c = strlen($query);
	$l = ( $c > 42 ) ? ceil( $c/42 ) : 1;
	$break_point = ceil( $c / $l );
	//$wrapped_txt = wordwrap($query, $break_point, "<br>\n");
	$wrapped_txt = $query;
	$wrapped_txt = str_replace('Looking For ', 'Looking For <span class="nobr">', $wrapped_txt);
	$wrapped_txt = $wrapped_txt.'</span>';
	return $wrapped_txt;
}


function getDKIParam($var_name, $default_value)
{
	/** makes a case-insensitive match*/
		
	if(isset($_GET[$var_name]))	//try uppercase, passed by default
	{
		return getVar($var_name, $default_value);
	}
	else
	{
		if(isset($_GET[strtolower($var_name)]))	//try to lower case
		{
			return getVar(strtolower($var_name), $default_value);
		}				
	}
	
	return getVar($var_name, $default_value);
	
}

function getVar($var_name, $default_value)
{
	
	
	
	if(isset($_GET[$var_name]) && $_GET[$var_name] != ''){
		$val = str_replace("_", " ", escapeshellcmd(htmlspecialchars(strip_tags(urldecode($_GET[$var_name])))));
	}else{
		$val = $default_value;
	}
	
	return $val;
	
}

//callback function that minifies the respone HTML
function minify_callback($buffer)
{


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

	$buffer = preg_replace($search, $replace, $buffer);

	return $buffer;

}


/**
 * dynamically loads the appropriate JS files based on the $jsmode
 * if $jsmode = production we load the single minified js file
 * if $jsmode = development we load the unminified separate files
 * 
 * @param unknown $base_path
 * @param unknown $location
 */

function load_js_files($timestamp)
{
	
	global $jsmode;
	
	if($jsmode == 'development')	//load minified
	{
		echo '
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.ui.js"></script>
			<script src="js/jquery.validate.min.js"></script>
			<script src="js/customizer.js"></script>				
			';
	}
	else
	{

		echo '<script src="js/site.min.'. $timestamp .'.js"></script>';
	}
	
	
	
}

function load_css_files($timestamp)
{
	global $cssmode;
	if($cssmode == 'development')	//load minified
	{
		echo '<link href="css/site.min.css" rel="stylesheet">';
	}
	else
	{
		echo '<link href="css/site.min.'. $timestamp  .'.css" rel="stylesheet">';
	}



}

//returns tags parameter hidden html
function get_plocal_tags_var() {

	$hiddenVars = '';

	if(!empty($_GET)) {
		 
		foreach($_GET as $key => $val) {
			
			$val = addslashes(urldecode($val));
 			$val = strip_tags($val);
 			$val = preg_replace('/\\\"/','',$val);
			$val = preg_replace('/\\\"/','',$val);
			$hiddenVars .= '<input type="hidden" name="static_tags['.$key.']" value="'.$val.'" />';
		}
		 
	}

	return $hiddenVars;

}