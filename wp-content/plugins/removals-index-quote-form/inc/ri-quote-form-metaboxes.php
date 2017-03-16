<?php

//Create metabox for quote form settings
function create_quote_form_metabox() {
	add_meta_box('quote_form_metabox','Form Settings','create_html_for_quote_form_settings','page','side','low');
}

add_action('add_meta_boxes','create_quote_form_metabox');

//Creating HTML Structure for Quote Form Setings Meta Box
function create_html_for_quote_form_settings() {

	wp_nonce_field( 'creating_nonce_for_quote_form_settings', 'quote_form_settings_nonce' );

	?>
	
			<table>
	
				<tr>
					<td>
						<label for="lookup_functionality">Lookup Setting</label>
					</td>
					<td>
						<select name="quote_form_settings[_lookup_functionality]" id="_lookup_functionality">
			            
			            <option value="bvdata8" <?php selected ( genesis_get_custom_field( '_lookup_functionality' ), 'bvdata8' ); ?>>Briteverify & Data8</option>
			            <option value="data8" <?php selected ( genesis_get_custom_field( '_lookup_functionality' ), 'data8' ); ?>>Data8</option>
			            <option value="normal" <?php selected ( genesis_get_custom_field( '_lookup_functionality' ), 'normal' ); ?>>Normal</option>
			            
			        	</select>
			        </td>
			        
				</tr>

				<tr>
					<td>
						<label for="_template_id">Template Name </label>
					</td>
					<td>
						<select name="quote_form_settings[_template]" id="_template">
			                <?php 
			                		                
			                    foreach($GLOBALS['quote_form_templates'] as $key => $value) { ?>
			                    	<option value="<?php echo $key;?>" <?php selected ( genesis_get_custom_field( '_template' ), $key ); ?>><?php echo $value;?></option>        
			               <?php } ?>
	           			 </select>
			            
			        	</select>
			        </td>
			        
				</tr>
			</table>

	<?php 
	
}


//Saving the value of fields of quote form settings meta box
add_action( 'save_post', 'save_quote_form_settings_value' );
function save_quote_form_settings_value() {

	if ( ! isset( $_POST['quote_form_settings'] ) )
		return;
	
	$field_names = wp_parse_args( $_POST['quote_form_settings'], array(
				
			'_lookup_functionality'          => '',
			'_template'   	=> '',				
	) );


	//Please see genesis/lib/functions/options.php for more info. about genesis_save_custom_fields
	genesis_save_custom_fields( $field_names, 'creating_nonce_for_quote_form_settings', 'quote_form_settings_nonce', $post );


}