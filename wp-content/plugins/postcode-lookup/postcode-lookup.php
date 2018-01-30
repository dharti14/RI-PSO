<?php
	$options=get_option( 'postcode_lookup_array' );
	$postcode_lookup_url= $options['postcode_lookup_url_value'];
	$postcode_lookup_api = $options['postcode_lookup_key_value'];
	?>
	<input type="hidden" name="url" id="postcode_lookup_url" value="<?php echo $postcode_lookup_url; ?>">
	<input type="hidden" name="url" id="postcode_lookup_api" value="<?php echo $postcode_lookup_api; ?>">
	<?php 
	
?>