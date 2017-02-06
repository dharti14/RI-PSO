<?php if($message != "") : ?>
	<div id="message">
		<p>
			<?php echo $message; ?>
		</p>
	</div>
<?php endif; ?>

<div>
	<h2>
		<?php echo esc_html( 'Removals Index Quote Form Settings' ); ?>
	</h2>
	
	<form id="ri_quoteForm_settings" class="validate" name="ri_quoteForm_settings" method="post" action="">
		<table class="form-table">	
			<tbody>
				<tr class="form-required">
					<th scope="row">
						<label for="delay">API Url</label>
					</th>
					<td>
						<input type="text" aria-required="true" value="<?php echo $options['apiUrl'] ?>" id="apiUrl" name="apiUrl" class="regular-text">
					</td>
				</tr>
				
				<tr class="form-required">
					<th scope="row">
						<label for="default_pinlocal_source_key">Default Pinlocal Source Key</label>
					</th>
					<td>
						<input type="text" aria-required="true" value="<?php echo $options['default_pinlocal_source_key'] ?>" id="default_pinlocal_source_key" name="default_pinlocal_source_key" class="regular-text">
						<em>It will be default source key if not specified in page</em>
					</td>
				</tr>
				
				<tr class="form-required">
					<th scope="row">
						<label for="default_conversion_page">Default Conversion Page</label>
					</th>
					<td>
						<select name="default_conversion_page_id" id="default_conversion_page" style="width: 25em;">
							<option value="">Please Select Default Conversion Page</option>
							<?php
							$args = array(
									'meta_key'         => '_is_conversion_page',
									'meta_value'       => 'yes',
									'post_type'        => 'page'
							);
							$conversion_pages = get_posts($args);	//Conversion page arrray
							
							foreach($conversion_pages as $conversion_page){ ?>
								<option value="<?php echo $conversion_page->ID;?>" <?php selected( $options['default_conversion_page_id'], $conversion_page->ID ); ?>><?php echo $conversion_page->post_title; ?></option>
							<?php } ?>
						</select>
						<em>It will be default conversion page if not selected in page</em>
					</td>
				</tr>
				
				
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" value="Save Changes" class="button button-primary" id="save_ri_quoteForm_settings" name="save_ri_quoteForm_settings">
		</p>
	</form>
</div>