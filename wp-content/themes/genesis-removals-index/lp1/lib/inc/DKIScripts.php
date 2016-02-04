<?php
// Scripts and code  required for dki scripts

ob_start('minify_callback');	//minify the output

//$isPageDKI = get_post_meta( get_the_ID(), 'isPageDki', true );

$post_id = get_the_ID();

if(!empty($post_id)){
	$isPageDKI = get_post_meta( get_the_ID(), 'isPageDKI', true );

}

$loc = getDKIParam("LOC",'your area');
$typ = getDKIParam("TYP",'');
$hln = getDKIParam("HLN",'Trusted Local Removal Companies');

if($isPageDKI == 'no')
{
	$hln = 'Trusted Local Removal Companies';
	$loc = 'your area';
}


//meta keywords fix added 25 Feb 2015
$meta_keywords = array();
$meta_keywords_string = '';

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

// Dki scripts over
?>