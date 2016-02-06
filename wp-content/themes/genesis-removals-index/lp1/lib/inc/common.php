<?php
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

ob_start('minify_callback');

function getHLN(){


	if (!isset($isPageDKI)){
		$isPageDKI = '';
	}

	$post_id = get_the_ID();

	if(!empty($post_id)){
		$isPageDKI = get_post_meta( $post_id, 'isPageDKI', true );

	}


	$hln = getDKIParam("HLN",'Trusted Local Removal Companies');

	if($isPageDKI == 'no')
	{
		$hln = 'Trusted Local Removal Companies';
	}

	return $hln;

}

function getLOC(){

	if (!isset($isPageDKI)){
		$isPageDKI = '';
	}

	$post_id = get_the_ID();

	if(!empty($post_id)){
		$isPageDKI = get_post_meta( $post_id, 'isPageDKI', true );
	}

	$loc = getDKIParam("LOC",'your area');

	if($isPageDKI == 'no')
	{
		$loc = 'your area';
	}

	return $loc;

}

function getMetaKeywords(){

	$meta_keywords = array();
	$meta_keywords_string = '';

	$hln = getHLN();
	$loc = getLOC();
	$typ = getDKIParam("TYP",'');

	if($hln != 'Trusted Local Removal Companies') array_push($meta_keywords,$hln);
	if($typ != '') array_push($meta_keywords,$typ);
	if($loc != 'your area') array_push($meta_keywords,$loc);

	if(count($meta_keywords)>0)
		{
			$meta_keywords_string = implode(",", $meta_keywords);

			$meta_keywords_string .= ',';
		}

	//end meta keywords fix

	$wordsCount=str_word_count($hln);
	$wordsCount;
	if($wordsCount==4){
		$spacebr=2;
	}else{
		$spacebr=$wordsCount-3;
	}
}