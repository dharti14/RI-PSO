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
		$val = str_replace("_", " ", htmlspecialchars(strip_tags(urldecode($_GET[$var_name]))));
	}else{
		$val = $default_value;
	}
		
	return $val;
	
}


function dki_get_hln() {

	$isPageDKI = genesis_get_custom_field( '_is_page_dki' );

	
	if ( is_page_template('anyvan/anyvan.php')){ //For AnyVan page only
		
		$dki_hln = 'Looking For A Reliable Man With A Van ?';
		
		if($isPageDKI == 'yes') {
			$dki_hln = get_dki_param("hln0",$dki_hln);
		}
		
	}else{
		
		$dki_hln = 'Trusted Local Removal Companies';
		
		if($isPageDKI == 'yes') {
			$dki_hln = get_dki_param("HLN",$dki_hln);
		}
	
	}

	$dki_hln = sanitize_text_field($dki_hln);
	
	
	return $dki_hln;

}

function dki_get_loc() {

	$isPageDKI = genesis_get_custom_field( '_is_page_dki' );

	$dki_loc = 'your area';

	if($isPageDKI == 'yes') {
		$dki_loc = get_dki_param("LOC",$dki_loc);
	}

	return $dki_loc;

}

function dki_get_metakeywords(){

	$dki_meta_keywords = array();
	$dki_meta_keywords_string = '';

	$dki_hln = dki_get_hln();
	$dki_loc = dki_get_loc();
	$dki_typ = get_dki_param("TYP",'');

	if($dki_hln != 'Trusted Local Removal Companies') array_push($dki_meta_keywords,$dki_hln);
	if($dki_typ != '') array_push($dki_meta_keywords,$dki_typ);
	if($dki_loc != 'your area') array_push($dki_meta_keywords,$dki_loc);

	if(count($dki_meta_keywords)>0) {
		
		$dki_meta_keywords_string = implode(",", $dki_meta_keywords);

		$dki_meta_keywords_string .= ',';
	}
	
	return $dki_meta_keywords_string;
}

//For hln2 DKI param
function dki_get_hln2() {

	$isPageDKI = genesis_get_custom_field( '_is_page_dki' );

	$dki_hln2 = 'Remove The Headache From Your House Move In Under 60 Seconds ...';

	if($isPageDKI == 'yes') {
		$dki_hln2 = get_dki_param("hln2",$dki_hln2);
	}

	return $dki_hln2;

}

//For keyword DKI param
function dki_get_keyword() {

	$isPageDKI = genesis_get_custom_field( '_is_page_dki' );

	$dki_keyword = '';

	if($isPageDKI == 'yes') {
		$dki_keyword = get_dki_param("keyword",'');
	}

	return $dki_keyword;

}

//For hln3 DKI param
function dki_get_hln3() {

	$isPageDKI = genesis_get_custom_field( '_is_page_dki' );

	$dki_hln3 = 'Get Access to Over 60,000 Reliable Man and Van Specialists.';

	if($isPageDKI == 'yes') {
		$dki_hln3 = get_dki_param("hln3",$dki_hln3);
	}

	return $dki_hln3;

}
