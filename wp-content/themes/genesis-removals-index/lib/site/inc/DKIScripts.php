<?php

function dki_exact_string( $query ) {

	$query = str_replace('_', ' ', $query);
	$c = strlen($query);
	$l = ( $c > 42 ) ? ceil( $c/42 ) : 1;
	$break_point = ceil( $c / $l );
	$wrapped_txt = $query;
	$wrapped_txt = str_replace('Looking For ', 'Looking For <span class="nobr">', $wrapped_txt);
	$wrapped_txt = $wrapped_txt.'</span>';
	return $wrapped_txt;
}


function get_dki_param($var_name, $default_value) {
	/** makes a case-insensitive match*/
		
	if(isset($_GET[$var_name]))	{ //try uppercase, passed by default
	
		return dki_get_var($var_name, $default_value);
	} else {
		
		if(isset($_GET[strtolower($var_name)]))	{ //try to lower case
		
			return dki_get_var(strtolower($var_name), $default_value);
		}				
	}
	
	return dki_get_var($var_name, $default_value);
	
}

function dki_get_var($var_name, $default_value) {
	
	if(isset($_GET[$var_name]) && $_GET[$var_name] != ''){
		$val = str_replace("_", " ", escapeshellcmd(htmlspecialchars(strip_tags(urldecode($_GET[$var_name])))));
	}else{
		$val = $default_value;
	}
	
	return $val;
	
}


function dki_get_hln() {

	$post_id = get_the_ID();

	if(!empty($post_id)) {
		$isPageDKI = get_post_meta( $post_id, 'isPageDKI', true );
	}

	$hln = 'Trusted Local Removal Companies';
	
	if($isPageDKI == 'yes') {
		$hln = get_dki_param("HLN",'Trusted Local Removal Companies');
	}
	
	return $hln;

}

function dki_get_loc() {

	$post_id = get_the_ID();

	if(!empty($post_id)) {
		$isPageDKI = get_post_meta( $post_id, 'isPageDKI', true );
	}

	$loc = 'your area';

	if($isPageDKI == 'yes') {
		$loc = get_dki_param("LOC",'your area');
	}

	return $loc;

}

function dki_get_metakeywords(){

	$meta_keywords = array();
	$meta_keywords_string = '';

	$hln = dki_get_hln();
	$loc = dki_get_loc();
	$typ = get_dki_param("TYP",'');

	if($hln != 'Trusted Local Removal Companies') array_push($meta_keywords,$hln);
	if($typ != '') array_push($meta_keywords,$typ);
	if($loc != 'your area') array_push($meta_keywords,$loc);

	if(count($meta_keywords)>0) {
		
		$meta_keywords_string = implode(",", $meta_keywords);

		$meta_keywords_string .= ',';
	}
	
	return $meta_keywords_string;
}