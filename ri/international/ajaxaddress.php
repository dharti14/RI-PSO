<?php
$text = '1 GREENWOOD DRIVE';
$text1 = preg_replace('/\d/','',$text);
//echo $text1;

define ('CRAFTY_KEY',	'b6e12-06b5f-e1c4d-00fca');
define ('CRAFTY_URL',	'http://pcls1.craftyclicks.co.uk/xml/rapidaddress');

$postcode = $_REQUEST["postcode_from"];

// try 2 response styles
$response_style = 'data_formatted';
//$response_style = 'paf_compact';

$url = CRAFTY_URL.'?key='.CRAFTY_KEY.'&postcode='.$postcode.'&response='.$response_style;

if ($response_style == 'data_formatted') {
	// optional, default is 2, sets number of address lines
	$url.='&lines=3';
}

$xml_data = simplexml_load_file ($url);

if ($response_style == 'data_formatted') {
	print_xml_data_formatted($xml_data);
}

die(0);

function print_xml_data_formatted($xml_data) {
	
	$result = $xml_data->address_data_formatted;
	
	if($result){
		$line_1 = preg_replace('/\d/','', $result->delivery_point->line_1);
		$output_array_from = array(
              'town' => $result->town,
              'postal_county' => $result->postal_county,
              'traditional_county' => $result->traditional_county,
			  'postcode' => $result->postcode,
			  'department_name' => $result->delivery_point->department_name,
              'organisation_name' => $result->delivery_point->organisation_name,
              'line_1' => $line_1
          );
		  
	}else{
		$output_array_from = array(
              'town' => '',
              'postal_county' => '',
              'traditional_county' => '',
			  'postcode' => '',
			  'department_name' => '',
              'organisation_name' => '',
              'line_1' => '',
          );
	}
	
	$output_array = array_merge($output_array_from);
	echo json_encode($output_array);
}

?>